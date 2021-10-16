<?php

namespace App\Services;

use Closure;
use App\Contracts\PasswordBrokerContracts;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class PasswordBroker implements PasswordBrokerContracts
{
    /**
     * Send a password reset code to a user.
     *
     * @param  array  $credentials
     * @return string
     */
    public function sendResetCode(array $credentials)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);

        if (is_null($user)) {
            return static::INVALID_USER;
        }

        $code = $this->generateCode($user);
        $message = "Your account reset password code: $code";

        SmsService::send($user->phone, $message);

        return static::RESET_LINK_SENT;
    }

    /**
     * Reset the password for the given token.
     *
     * @param  array  $credentials
     * @param  \Closure  $callback
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback)
    {
        $user = $this->validateReset($credentials);

        // If the responses from the validate method is not a user instance, we will
        // assume that it is a redirect and simply return it from this method and
        // the user is properly redirected having an error message on the post.
        if (! $user instanceof CanResetPasswordContract) {
            return $user;
        }

        $password = $credentials['password'];

        // Once the reset has been validated, we'll call the given callback with the
        // new password. This gives the user an opportunity to store the password
        // in their persistent storage. Then we'll delete the token and return.
        $callback($user, $password);

        Cache::forget("user-$user->id-code");

        return static::PASSWORD_RESET;
    }

    /**
     * Return a user object from database with phone
     * 
     * @param  array  $credentials
     * @return User
     */
    private function getUser(array $credentials)
    {
        return User::where('phone', $credentials['phone'])->first();
    }

    /**
     * Generate a disposable code for reset a user password
     * 
     * @param User $user
     * @return String 
     */
    private function generateCode($user)
    {
        return Cache::remember("user-$user->id-code", expirationTime('00:05:00'), function () {
            return rand(1000, 9999);
        });
    }

    /**
     * Validate a password reset for the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\CanResetPassword|string
     */
    protected function validateReset(array $credentials)
    {
        if (is_null($user = $this->getUser($credentials))) {
            return static::INVALID_USER;
        }

        if(Cache::get("user-$user->id-code") == $credentials['code']) {
            return $user;
        }

        return static::INVALID_CODE;
    }
}
