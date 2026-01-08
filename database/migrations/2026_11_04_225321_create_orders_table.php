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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('date');
            $table->unsignedBigInteger('paper_type_id');
            $table->unsignedBigInteger('paper_size_id');
            $table->unsignedBigInteger('illustration_type_id');
            $table->unsignedBigInteger('state_id');
            $table->integer('num_photos')->default(1);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('paper_type_id')
                ->references('id')
                ->on('paper_types')
                ->onDelete('cascade');
            $table->foreign('paper_size_id')
                ->references('id')
                ->on('paper_sizes')
                ->onDelete('cascade');
            $table->foreign(columns: 'illustration_type_id')
                ->references('id')
                ->on('illustration_types')
                ->onDelete('cascade');
            $table->foreign('state_id')
                ->references('id')
                ->on('order_states')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
