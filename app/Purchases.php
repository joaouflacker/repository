<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = [
        "Name",
        "PurchaseDate",
        "user_id",
        "supplier_id"
    ];

    // funcao que referencia o usuario com a compra
    public function user(){
        return $this->belongsTo('App\Users', 'user_id');
    }

    // funcao que referencia o fornecedor com a compra
    public function supplier(){
        return $this->belongsTo('App\Suppliers', 'supplier_id');
    }

    // funcao que referencia o produto com a compra
    public function product(){
        return $this->belongsTo('App\Products', 'product_id');
    }
}
