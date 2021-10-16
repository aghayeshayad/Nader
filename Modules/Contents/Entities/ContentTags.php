<?php

namespace Modules\Contents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentTags extends Model
{
    use HasFactory;

    protected $table = "contents_tags";

    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['content_id', 'tag_id'];

    protected static function newFactory()
    {
        return \Modules\Contents\Database\factories\ContentTagsFactory::new();
    }
}
