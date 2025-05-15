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
        Schema::create('sliderservices', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->default("https://odoo-community.org/web/image/product.template/3936/image_1024?unique=c01040d");

            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');

            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliderservices');
    }
};
