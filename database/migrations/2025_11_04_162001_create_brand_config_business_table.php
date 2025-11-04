<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('brand_config_business', function (Blueprint $table) {
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->foreignId('brand_config_id')->constrained('brand_configs')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['business_id', 'brand_config_id'], 'brand_config_business_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_config_business');
    }
};
