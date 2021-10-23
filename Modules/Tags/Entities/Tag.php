<?php

namespace Modules\Tags\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, DeletedBy;

    /**
     * Tags table fillable fields
     * 
     * @var array
     */
    protected $fillable = ['type', 'title', 'deketed_at'];

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
