<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_ratings', function (Blueprint $table) {
            $table->bigInteger('buyer_id')->unsigned()->index()->after('seller_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('seller_ratings', 'buyer_id')){
            Schema::table('seller_ratings', function (Blueprint $table) {
                $table->dropColumn('buyer_id');
            });
        }
    }
};