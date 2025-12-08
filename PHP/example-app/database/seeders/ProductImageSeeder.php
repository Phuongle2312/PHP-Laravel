<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            // iPhone 15 Pro Max (product_id: 1)
            ['product_id' => 1, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-1.jpg', 'is_primary' => true],
            ['product_id' => 1, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-2.jpg', 'is_primary' => false],
            
            // iPhone 14 Pro (product_id: 2)
            ['product_id' => 2, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/289700/iphone-14-pro-purple-1.jpg', 'is_primary' => true],
            ['product_id' => 2, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/289700/iphone-14-pro-purple-2.jpg', 'is_primary' => false],
            
            // Samsung Galaxy S24 Ultra (product_id: 3)
            ['product_id' => 3, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-grey-1.jpg', 'is_primary' => true],
            ['product_id' => 3, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-grey-2.jpg', 'is_primary' => false],
            
            // Samsung Galaxy A55 (product_id: 4)
            ['product_id' => 4, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/320722/samsung-galaxy-a55-5g-xanh-1.jpg', 'is_primary' => true],
            ['product_id' => 4, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/320722/samsung-galaxy-a55-5g-xanh-2.jpg', 'is_primary' => false],
            
            // Xiaomi 14 Ultra (product_id: 5)
            ['product_id' => 5, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/322096/xiaomi-14-ultra-den-1.jpg', 'is_primary' => true],
            ['product_id' => 5, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/322096/xiaomi-14-ultra-den-2.jpg', 'is_primary' => false],
            
            // Redmi Note 13 Pro (product_id: 6)
            ['product_id' => 6, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/319730/redmi-note-13-pro-tim-1.jpg', 'is_primary' => true],
            ['product_id' => 6, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/319730/redmi-note-13-pro-tim-2.jpg', 'is_primary' => false],
            
            // Oppo Find X7 Ultra (product_id: 7)
            ['product_id' => 7, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/321471/oppo-find-x7-ultra-xanh-1.jpg', 'is_primary' => true],
            ['product_id' => 7, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/321471/oppo-find-x7-ultra-xanh-2.jpg', 'is_primary' => false],
            
            // Oppo Reno11 (product_id: 8)
            ['product_id' => 8, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/319730/oppo-reno11-xanh-1.jpg', 'is_primary' => true],
            ['product_id' => 8, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/319730/oppo-reno11-xanh-2.jpg', 'is_primary' => false],
            
            // Vivo X100 Pro (product_id: 9)
            ['product_id' => 9, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/320845/vivo-x100-pro-xam-1.jpg', 'is_primary' => true],
            ['product_id' => 9, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/320845/vivo-x100-pro-xam-2.jpg', 'is_primary' => false],
            
            // Vivo Y36 (product_id: 10)
            ['product_id' => 10, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/309816/vivo-y36-xanh-1.jpg', 'is_primary' => true],
            ['product_id' => 10, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/309816/vivo-y36-xanh-2.jpg', 'is_primary' => false],
            
            // Realme GT 5 Pro (product_id: 11)
            ['product_id' => 11, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/321098/realme-gt5-pro-den-1.jpg', 'is_primary' => true],
            ['product_id' => 11, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/321098/realme-gt5-pro-den-2.jpg', 'is_primary' => false],
            
            // Realme C55 (product_id: 12)
            ['product_id' => 12, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/301608/realme-c55-vang-1.jpg', 'is_primary' => true],
            ['product_id' => 12, 'image_url' => 'https://cdn.tgdd.vn/Products/Images/42/301608/realme-c55-vang-2.jpg', 'is_primary' => false],
        ];

        foreach ($images as $image) {
            ProductImage::create($image);
        }
    }
}
