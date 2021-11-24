<?php

namespace Modules\Discounts\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Entities\Product;

class Discount extends Model
{
    use HasFactory, DeletedBy;

    /**
     * Discounts table fillable fields
     * @var array
     */
    protected $fillable = ['start_date', 'end_date', 'discount'];

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'discount_products', 'discount_id', 'product_id');
    }

    /**
     * Return start date attribute jalalian date
     * 
     * @return string
     */
    public function getPersianStartDateAttribute()
    {
        $date = Carbon::parse($this->start_date);
        
        return Verta($date)->format('Y/m/d');
    }

    /**
     * Return end date attribute jalalian date
     * 
     * @return string
     */
    public function getPersianEndDateAttribute()
    {
        $date = Carbon::parse($this->end_date);
        
        return Verta($date)->format('Y/m/d');
    }
}
