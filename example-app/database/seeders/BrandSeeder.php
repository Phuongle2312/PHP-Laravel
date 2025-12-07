<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
                'description' => 'Thiết kế đẳng cấp, hệ sinh thái hoàn hảo'
            ],
            [
                'name' => 'Samsung',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg',
                'description' => 'Công nghệ tiên tiến, màn hình tuyệt đẹp'
            ],
            [
                'name' => 'Xiaomi',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/29/Xiaomi_logo.svg',
                'description' => 'Giá tốt, cấu hình mạnh'
            ],
            [
                'name' => 'Oppo',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/8/89/OPPO_Logo_wiki.png',
                'description' => 'Camera selfie đẹp, sạc nhanh'
            ],
            [
                'name' => 'Vivo',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Vivo_logo_2019.svg',
                'description' => 'Thiết kế trẻ trung, camera chất lượng'
            ],
            [
                'name' => 'Realme',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/b/b0/Realme_logo.svg',
                'description' => 'Hiệu năng vượt trội trong tầm giá'
            ]
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
