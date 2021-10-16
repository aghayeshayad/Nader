<?php

namespace Modules\Contents\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JetBrains\PhpStorm\ArrayShape;

class Category extends Model
{
    use HasFactory, Sluggable, DeletedBy;

    protected $table = 'categories_content';
    protected $fillable = ['title','order_by', 'slug', 'meta_description', 'short_description', 'title_page',
        'description','image', 'parent_id', 'path', 'status', 'author', 'editor', 'deleted_by'];


    /**
     * Content category type
     */
    const CONTENT_TYPE = [
        'content'=>[
            'title' => 'مقاله',
            'type' => 0
        ]
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    #[ArrayShape(['slug' => "string[]"])] public function sluggable(): array
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
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    //image
    public function getImageAttribute($value)
    {
        return $value ? asset("Uploads/Contents/Categories/$this->id/$value") : null;
    }

    public function Contents()
    {
        return $this->hasMany(Content::class, 'category_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Contents\Database\factories\CategoryFactory::new();
    }
}
