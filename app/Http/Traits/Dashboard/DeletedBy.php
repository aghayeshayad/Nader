<?php
/**
 * Created by Bahram Shahabi.
 * Email: bahramshahabi@gmail.com
 * Phone: +98-9155001695
 * Date: 3/28/19
 * Time: 1:30 PM
 */

namespace App\Http\Traits\Dashboard;


use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

trait DeletedBy
{
    use SoftDeletes;
    /*force implement user_id on delete*/
    protected $safeDelete = true;


    /**
     * Soft Delete Override
     * @return mixed
     * @throws Exception
     */
    public function delete()
    {
        if ($this->safeDelete && Auth::check()) {
            $this->deleted_by = Auth::user()->id;
            $this->save();
            return parent::delete();
        }
        throw new Exception("Safe Delete is On, User Must Be Logged In!");
    }

    public function restore()
    {
        $this->deleted_by = $this->deleted_at = null;
        $this->save();

        return $this;
    }

    abstract public function DeletedBy();
}
