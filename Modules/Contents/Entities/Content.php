<?php

namespace Modules\Contents\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Content extends Model
{
    use HasFactory, DeletedBy, Sluggable;

    protected $table = 'contents_contents';
    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['author', 'editor', 'category_id', 'title', 'title_page', 'slug', 'meta_description', 'description',
        'short_description', 'image', 'images', 'file', 'link_video', 'published_at', 'status', 'visit', 'like', 'deleted_by'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /* Courses Relations */

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function Related_contents()
    {
        return $this->belongsToMany(Content::class, 'content_contents', 'content_id', 'related_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(ContentComments::class);
    }

    /**
     * Create relation with content tags table
     *
     * @return BelongsToMany
     */
    public function ContentTags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'contents_content_tags', 'content_id', 'tag_id')
            ->withTimestamps();
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("Uploads/Contents/$this->id/$value") : null;
    }

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function getFileAttribute($value)
    {
        return $value ? asset("Uploads/Contents/$this->id/file/$value") : null;
    }

    protected static function newFactory()
    {
        return \Modules\Contents\Database\factories\ContentFactory::new();
    }
}
