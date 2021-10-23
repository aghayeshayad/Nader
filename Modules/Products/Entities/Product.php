<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * Products table fillable fields
     * 
     * @var array
     */
    protected $fillable = ['title', 'description', 'image', 'images', 'vip', 'best_sellers', 
        'status', 'discount', 'discount_count'
    ];
}
