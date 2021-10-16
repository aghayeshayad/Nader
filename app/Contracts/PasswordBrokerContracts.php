<?php

namespace App\Contracts;

use Closure;

interface PasswordBrokerContracts
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT = 'passwords.sent';

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = 'passwords.reset';

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = 'passwords.user';

    /**
     * Constant representing the code not found response.
     *
     * @var string
     */
    const INVALID_CODE = 'passwords.code';

    /**
     * Send a password reset Code to a user.
     *
     * @param  array  $credentials
     * @return string
     */
    public function sendResetCode(array $credentials);

    /**
     * Reset the password for the given token.
     *
     * @param  array  $credentials
     * @param  \Closure  $callback
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback);
}