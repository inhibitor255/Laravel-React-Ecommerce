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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // category foreign key
            $table->unsignedBigInteger("category_id");
            // category foreign key joining with category table and delete all of the specify table on this table when the specify category delete
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");

            $table->string("name");
            $table->string("price");
            $table->string("image");
            $table->text("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
