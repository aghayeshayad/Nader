<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPrice extends Model
{
    use HasFactory;

    /**
     * Product prices fillable fields
     * @var array
     */
    protected $fillable = ['color_code', 'count', 'price'];
}
