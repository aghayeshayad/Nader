<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductInformation extends Model
{
    use HasFactory;

    /**
     * Information table fillable fields
     * @var array
     */
    protected $fillable = ['information'];

    public function getInformationAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }
}
