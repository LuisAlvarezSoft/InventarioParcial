<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Movement extends Model
{
    protected $table = 'movements';

    protected $fillable = [
        'product_id',
        'type',
        'in',
        'out',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}