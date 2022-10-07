<?php

namespace Armezit\Lunar\VirtualProduct\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Lunar\Models\Product;

class VirtualProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'product_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'sources' => AsArrayObject::class,
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('lunarphp-virtual-product.virtual_products_table');
    }

    /**
     * Scope a query to only include virtual products which have CodePool source
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeOnlyCodePool(Builder $query): Builder
    {
        return $query->whereJsonContains(
            'sources',
            \Armezit\Lunar\VirtualProduct\Sources\CodePool::class
        );
    }

    /**
     * Get the product that owns the item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
