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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // الحقول الأساسية
            $table->string('title');
            $table->text('text_1')->nullable();
            $table->text('text_2')->nullable();
            $table->text('description')->nullable();
            $table->text('footer_about')->nullable();

            // الرؤية والرسالة
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();

            // الاقتباسات
            $table->text('service_quote')->nullable();
            $table->text('portfolio_quote')->nullable();
            $table->text('blog_quote')->nullable();

            // رابط الفيديو
            $table->longText('video_link')->nullable();

            // الإحصائيات
            $table->integer('projects_completed')->default(0);
            $table->integer('happy_customers')->default(0);
            $table->integer('years_of_experience')->default(0);
            $table->integer('award_achievement')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
