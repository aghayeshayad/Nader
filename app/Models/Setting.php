<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    /**
     * Social media items
     *
     * @var array
     */
    public const SOCIALS = [
        [
            'type' => 1,
            'title' => 'Instagram'
        ],
        [
            'type' => 2,
            'title' => 'Twitter'
        ]

    ];

    /**
     * Setting types
     *
     * @var array
     */
    public const TYPES = [
        'about_us' => 0,
        'contact_us' => 1,
        'socials' => 2,
        'fast_links'=> 3,
    ];

    /**
     * Settings table fillable fields
     *
     * @var array
     */
    protected $fillable = ['type', 'data'];


    /**
     * Convert data attribute value to json
     *
     * @param array $value
     */
 /*   public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }*/
    public function getDataAttribute($value)
    {
        if ($value) {
            if (json_decode($value, true) == null) { return $value;}
            return json_decode($value, true);
        }
    }
    /**
     * Decode data json value
     *
     * @return array
     */
 /*   public function getDataAttribute($value)
    {
        return $value ? json_decode($value, true)['data'] : [];
    }*/

    /**
     * Return aboutUs image
     *
     * @return String||null
     */
 /*   public function getImageAttribute()
    {
        return $this->data ? Storage::url($this->data['image']) : null;
    }*/
}
