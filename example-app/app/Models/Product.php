<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // Bảng trong DB
    protected $table = 'products';
    
    // Khóa chính - SỬA LẠI: dùng 'id' thay vì 'product_code'
    protected $primaryKey = 'id';

    // Nếu dùng IDENTITY, Laravel mặc định là incrementing = true, type int
    public $incrementing = true;
    protected $keyType = 'int';

    // Timestamps
    public $timestamps = true;

    // Các cột được phép fill
    protected $fillable = [
        'product_name',
        'brand_id',
        'category_id',
        'price',
        'discount_price',
        'description',
        'storage',
        'ram',
        'color',
        'screen_size',
        'battery',
        'camera',
        'stock_quantity',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2'
    ];

    /**
     * Product thuộc về một category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Product thuộc về một brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Product có nhiều images
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Product có nhiều reviews
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Product có nhiều order items
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Product có nhiều cart items
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Product có trong nhiều orders thông qua order_items
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    /**
     * Accessor: Tính average rating
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    /**
     * Accessor: Lấy giá hiển thị (ưu tiên discount_price)
     */
    public function getDisplayPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }
}

