<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('image')->default('https://static.thenounproject.com/png/1077596-200.png');
            $table->string('industry');
            $table->date('date');

            //==============================================
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            //==============================================

            $table->string('client')->nullable();
            $table->string('link_project')->nullable();

            // الحقل الجديد
            $table->boolean('slider_type')->default(0); // 0=landscape, 1=portrait

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};