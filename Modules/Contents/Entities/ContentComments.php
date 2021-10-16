<?php

namespace Modules\Contents\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentComments extends Model
{
    use DeletedBy, Sluggable ,HasFactory;
    protected $table = 'contents_content_comments';

    protected $fillable = ['comment','answer', 'content_id','status', 'deleted_by', 'user_id', 'author', 'editor'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function DeletedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
    public function contents(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    public function getUserNameAttribute()
    {
        $user = User::where('id', $this->user_id)->orderby('id', 'DESC')->first();
        if ($user) {
            return $user->first_name.' '.$user->last_name;
        }
    }

    public function getContentNameAttribute()
    {
        $content = Content::where('id', $this->content_id)->orderby('id', 'DESC')->first();
        if ($content)
            return $content->title;

    }

    protected static function newFactory()
    {
        return \Modules\Contents\Database\factories\ContentCommentsFactory::new();
    }
}
