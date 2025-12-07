<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Thêm brand_id
            $table->foreignId('brand_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            
            // Thông tin kỹ thuật điện thoại
            $table->string('storage')->nullable()->after('description'); // VD: 128GB, 256GB
            $table->string('ram')->nullable()->after('storage'); // VD: 8GB, 12GB
            $table->string('color')->nullable()->after('ram'); // VD: Black, White, Blue
            $table->string('screen_size')->nullable()->after('color'); // VD: 6.1 inch
            $table->string('battery')->nullable()->after('screen_size'); // VD: 4000mAh
            $table->string('camera')->nullable()->after('battery'); // VD: 48MP + 12MP
            
            // Quản lý tồn kho và giá
            $table->integer('stock_quantity')->default(0)->after('camera');
            $table->decimal('discount_price', 10, 2)->nullable()->after('price');
            $table->boolean('is_featured')->default(false)->after('stock_quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropColumn([
                'brand_id',
                'storage',
                'ram',
                'color',
                'screen_size',
                'battery',
                'camera',
                'stock_quantity',
                'discount_price',
                'is_featured'
            ]);
        });
    }
};
