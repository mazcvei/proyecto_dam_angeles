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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('description',150)->nullable(true);
            $table->string('email_contact',50)->nullable(true);
            $table->string('phone_contact',15)->nullable(true);
            $table->string('url_instagram',200)->nullable(true);
            $table->json('photos_carousel')->nullable(true);
            $table->string('logo',250)->nullable(true);
            $table->string('primary_color',250)->nullable(true);
            $table->string('secondary_color',250)->nullable(true);
            $table->string('auxiliar_color',250)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
