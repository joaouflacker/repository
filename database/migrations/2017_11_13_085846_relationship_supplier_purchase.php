<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipSupplierPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function(Blueprint $table){
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function(Blueprint $table){
            $table->dropForeign('purchases_supplier_id_foreign');
            $table->dropColumn('supplier_id');
        });
    }
}
