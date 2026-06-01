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
    Schema::table('kosts', function ($table) {

        $table->boolean('wifi')->default(false);
        $table->boolean('ac')->default(false);
        $table->boolean('kamar_mandi')->default(false);
        $table->boolean('parkiran')->default(false);
        $table->boolean('dapur')->default(false);
        $table->boolean('laundry')->default(false);
        $table->boolean('cctv')->default(false);

    });
    } 
};
