<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    //bảng trong DB
    protected $table = 'products';
    
    //Khóa chính
    protected $primaryKey = 'product_code';

    //Nếu dùng IDENTITY, Lavarel mặc định là incrementing = true, type int
    public $incrementing = true;
    protected $keyType = 'int';

    //Nếu bảng không có created_at, updated_at
    public $timestamps = false;

    //Các cột được phép fill
    protected $fillable = [
        'product_name',
        'price',
        'drescription',
    ];
}
