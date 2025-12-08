<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Apple Products
            [
                'product_name' => 'iPhone 15 Pro Max',
                'brand_id' => 1, // Apple
                'category_id' => 1, // Flagship
                'price' => 29990000,
                'discount_price' => 28990000,
                'description' => 'iPhone 15 Pro Max với chip A17 Pro, camera 48MP, màn hình Super Retina XDR',
                'storage' => '256GB',
                'ram' => '8GB',
                'color' => 'Titan Tự Nhiên',
                'screen_size' => '6.7 inch',
                'battery' => '4422mAh',
                'camera' => '48MP + 12MP + 12MP',
                'stock_quantity' => 50,
                'is_featured' => true
            ],
            [
                'product_name' => 'iPhone 14 Pro',
                'brand_id' => 1,
                'category_id' => 1,
                'price' => 25990000,
                'discount_price' => 23990000,
                'description' => 'iPhone 14 Pro với Dynamic Island, chip A16 Bionic',
                'storage' => '128GB',
                'ram' => '6GB',
                'color' => 'Tím',
                'screen_size' => '6.1 inch',
                'battery' => '3200mAh',
                'camera' => '48MP + 12MP + 12MP',
                'stock_quantity' => 30,
                'is_featured' => true
            ],
            
            // Samsung Products
            [
                'product_name' => 'Samsung Galaxy S24 Ultra',
                'brand_id' => 2, // Samsung
                'category_id' => 1,
                'price' => 29990000,
                'discount_price' => 27990000,
                'description' => 'Galaxy S24 Ultra với bút S Pen, camera 200MP, màn hình Dynamic AMOLED 2X',
                'storage' => '256GB',
                'ram' => '12GB',
                'color' => 'Titan Xám',
                'screen_size' => '6.8 inch',
                'battery' => '5000mAh',
                'camera' => '200MP + 50MP + 12MP + 10MP',
                'stock_quantity' => 45,
                'is_featured' => true
            ],
            [
                'product_name' => 'Samsung Galaxy A55',
                'brand_id' => 2,
                'category_id' => 2, // Tầm trung
                'price' => 10990000,
                'discount_price' => 9990000,
                'description' => 'Galaxy A55 với chip Exynos 1480, camera 50MP',
                'storage' => '128GB',
                'ram' => '8GB',
                'color' => 'Xanh Dương',
                'screen_size' => '6.6 inch',
                'battery' => '5000mAh',
                'camera' => '50MP + 12MP + 5MP',
                'stock_quantity' => 100,
                'is_featured' => false
            ],
            
            // Xiaomi Products
            [
                'product_name' => 'Xiaomi 14 Ultra',
                'brand_id' => 3, // Xiaomi
                'category_id' => 1,
                'price' => 24990000,
                'discount_price' => 22990000,
                'description' => 'Xiaomi 14 Ultra với camera Leica, chip Snapdragon 8 Gen 3',
                'storage' => '512GB',
                'ram' => '16GB',
                'color' => 'Đen',
                'screen_size' => '6.73 inch',
                'battery' => '5000mAh',
                'camera' => '50MP + 50MP + 50MP + 50MP',
                'stock_quantity' => 35,
                'is_featured' => true
            ],
            [
                'product_name' => 'Redmi Note 13 Pro',
                'brand_id' => 3,
                'category_id' => 2,
                'price' => 7990000,
                'discount_price' => 6990000,
                'description' => 'Redmi Note 13 Pro với camera 200MP, sạc nhanh 67W',
                'storage' => '256GB',
                'ram' => '8GB',
                'color' => 'Tím',
                'screen_size' => '6.67 inch',
                'battery' => '5000mAh',
                'camera' => '200MP + 8MP + 2MP',
                'stock_quantity' => 150,
                'is_featured' => false
            ],
            
            // Oppo Products
            [
                'product_name' => 'Oppo Find X7 Ultra',
                'brand_id' => 4, // Oppo
                'category_id' => 1,
                'price' => 22990000,
                'discount_price' => null,
                'description' => 'Oppo Find X7 Ultra với camera Hasselblad, chip Snapdragon 8 Gen 3',
                'storage' => '256GB',
                'ram' => '12GB',
                'color' => 'Xanh Đại Dương',
                'screen_size' => '6.82 inch',
                'battery' => '5000mAh',
                'camera' => '50MP + 50MP + 50MP + 50MP',
                'stock_quantity' => 40,
                'is_featured' => true
            ],
            [
                'product_name' => 'Oppo Reno11',
                'brand_id' => 4,
                'category_id' => 2,
                'price' => 9990000,
                'discount_price' => 8990000,
                'description' => 'Oppo Reno11 với thiết kế mỏng nhẹ, camera selfie 32MP',
                'storage' => '256GB',
                'ram' => '8GB',
                'color' => 'Xanh Lá',
                'screen_size' => '6.7 inch',
                'battery' => '5000mAh',
                'camera' => '50MP + 32MP + 8MP',
                'stock_quantity' => 80,
                'is_featured' => false
            ],
            
            // Vivo Products
            [
                'product_name' => 'Vivo X100 Pro',
                'brand_id' => 5, // Vivo
                'category_id' => 1,
                'price' => 21990000,
                'discount_price' => 19990000,
                'description' => 'Vivo X100 Pro với camera Zeiss, chip Dimensity 9300',
                'storage' => '256GB',
                'ram' => '12GB',
                'color' => 'Xám Titan',
                'screen_size' => '6.78 inch',
                'battery' => '5400mAh',
                'camera' => '50MP + 50MP + 50MP',
                'stock_quantity' => 30,
                'is_featured' => true
            ],
            [
                'product_name' => 'Vivo Y36',
                'brand_id' => 5,
                'category_id' => 3, // Giá rẻ
                'price' => 5990000,
                'discount_price' => 4990000,
                'description' => 'Vivo Y36 với pin 5000mAh, sạc nhanh 44W',
                'storage' => '128GB',
                'ram' => '8GB',
                'color' => 'Xanh Dương',
                'screen_size' => '6.64 inch',
                'battery' => '5000mAh',
                'camera' => '50MP + 2MP',
                'stock_quantity' => 200,
                'is_featured' => false
            ],
            
            // Realme Products
            [
                'product_name' => 'Realme GT 5 Pro',
                'brand_id' => 6, // Realme
                'category_id' => 4, // Gaming Phone
                'price' => 14990000,
                'discount_price' => 13990000,
                'description' => 'Realme GT 5 Pro với chip Snapdragon 8 Gen 3, màn hình 144Hz',
                'storage' => '256GB',
                'ram' => '12GB',
                'color' => 'Đen',
                'screen_size' => '6.78 inch',
                'battery' => '5400mAh',
                'camera' => '50MP + 50MP + 8MP',
                'stock_quantity' => 60,
                'is_featured' => true
            ],
            [
                'product_name' => 'Realme C55',
                'brand_id' => 6,
                'category_id' => 3,
                'price' => 4490000,
                'discount_price' => 3990000,
                'description' => 'Realme C55 với camera 64MP, sạc nhanh 33W',
                'storage' => '128GB',
                'ram' => '6GB',
                'color' => 'Vàng',
                'screen_size' => '6.72 inch',
                'battery' => '5000mAh',
                'camera' => '64MP + 2MP',
                'stock_quantity' => 250,
                'is_featured' => false
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
