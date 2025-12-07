<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'quantity'
    ];

    /**
     * CartItem thuộc về một user (nullable cho guest)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * CartItem thuộc về một product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
