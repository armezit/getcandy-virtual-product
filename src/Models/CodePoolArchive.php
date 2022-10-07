<?php

namespace Armezit\Lunar\VirtualProduct\Models;

use Armezit\Lunar\VirtualProduct\Database\Factories\CodePoolArchiveFactory;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lunar\Models\OrderLine;

class CodePoolArchive extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $casts = [
        'data' => AsArrayObject::class,
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('lunarphp-virtual-product.code_pool.archive_table');
    }

    /**
     * Return a new factory instance for the model.
     *
     * @return CodePoolArchiveFactory
     */
    protected static function newFactory(): CodePoolArchiveFactory
    {
        return CodePoolArchiveFactory::new();
    }

    /**
     * Get the code pool batch that owns the item.
     */
    public function codePoolBatch()
    {
        return $this->belongsTo(CodePoolBatch::class, 'batch_id');
    }

    /**
     * Get the order line that owns the item.
     */
    public function orderLine()
    {
        return $this->belongsTo(OrderLine::class, 'order_line_id');
    }
}
