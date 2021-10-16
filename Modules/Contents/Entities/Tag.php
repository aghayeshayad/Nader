<?php

namespace Modules\Contents\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use DeletedBy, Sluggable, HasFactory;

    protected $table = 'contents_tags';

    protected $fillable = ['title', 'slug', 'title_page', 'deleted_by', 'status', 'author', 'editor', 'meta_description', 'short_description', 'description'];

    protected static function newFactory()
    {
        return \Modules\Contents\Database\factories\TagFactory::new();
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function Contents() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Content::class, 'contents_content_tags', 'tag_id', 'content_id')
            ->withTimestamps();
    }
}
