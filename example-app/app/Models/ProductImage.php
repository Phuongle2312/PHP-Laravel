<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ProductImage extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}