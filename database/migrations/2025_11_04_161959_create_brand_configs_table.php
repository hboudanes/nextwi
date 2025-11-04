<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('brand_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->string('logo_url')->nullable();
            $table->string('headline')->nullable();
            $table->string('subheading')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('background_color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('background_image_url')->nullable();
            $table->string('favicon_url')->nullable();
            $table->integer('background_blur')->default(0);
            $table->integer('background_opacity')->default(100);
            $table->integer('background_contrast')->default(100);
            $table->string('redirection_url')->nullable();
            $table->string('font_family')->nullable();
            $table->text('terms_url')->nullable();
            $table->text('privacy_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_configs');
    }
};
