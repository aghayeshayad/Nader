<?php

namespace Modules\Products\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tags\Entities\Tag;

class Product extends Model
{
    use HasFactory, DeletedBy;

    /**
     * Product colors
     * 
     * @var array
     */
    public const COLORS = [
        1 => 'سبز',
        2 => 'سفید',
        3 => 'سیاه'
    ];

    /**
     * Products table fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'images', 'vip', 'best_sellers',
        'status', 'discount', 'discount_count', 'category_id', 'subcategory_id', 'sub_subcategory_id'
    ];

    /**
     * Upload product image and set these path for image attribute value
     */
    public function setImageAttribute($value)
    {
        if ($value) {
            $ext = $value->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('/uploads/products/images');
            $value->move($path, $name);
            $this->attributes['image'] = $name;
        }
    }

    public function setImagesAttribute($value)
    {
        if ($value) {
            $file_names = [];
            
            foreach ($value as $item) {
                $ext = $item->getClientOriginalExtension();
                $name = time(). rand() . '.' . $ext;
                $path = public_path('/uploads/products/images');
                $item->move($path, $name);

                array_push($file_names, $name);
            }

            $this->attributes['images'] = json_encode($file_names);
        }
    }

    public function getTypeAttribute()
    {
        if($this->best_sellers) {
            return 'پرفروش';
        } elseif($this->vip) {
            return 'ویژه';
        } elseif($this->best_sellers && $this->vip) {
            return 'پروفروش ، ویژه';
        }
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

    /**
     * Create a blongs to many relation between products and tags
     */
    public function Tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_relations', 'tag_id', 'model_id')
            ->withPivotValue(['model_type' => ltrim(self::class, "Modules\\")])->withTimestamps();
    }

    /**
     * Create hasone relation between products and informations
     */
    public function Informations()
    {
        return $this->hasOne(ProductInformation::class, 'product_id');
    }

    /**
     * Create hasone relation between products and prices
     */
    public function Prices()
    {
        return $this->hasMany(ProductPrice::class, 'product_id');
    }
}
