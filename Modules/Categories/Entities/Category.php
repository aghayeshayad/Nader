<?php

namespace Modules\Categories\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use DeletedBy;

    /**
     * Set categories table fillable fields
     * @var array
     */
    protected $fillable = ['parent_id', 'type', 'title', 'slug'];

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
