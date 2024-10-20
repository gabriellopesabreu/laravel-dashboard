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
        Schema::create('freights', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->boolean("status")->default(true);
            $table->float("tax1",2);
            $table->float("tax2",2);
            $table->float("tax3",2);
            $table->float("tax4",2);
            $table->float("tax5",2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freights');
    }
};
