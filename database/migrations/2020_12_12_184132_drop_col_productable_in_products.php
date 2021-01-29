<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColProductableInProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // $table->dropIndex('productable_type');
            // $table->dropIndex('productable_id');
            // $table->dropColumn('productable_type');
            // $table->dropColumn('productable_id');
            $table->unsignedBigInteger('business_id')->nullable();

            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('business_id');
            $table->dropColumn('business_id');
        });
    }
}
