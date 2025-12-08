<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment'
    ];

    /**
     * Review thuộc về một product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Review thuộc về một user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
