<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        "id",
    	"Name",
        "UnitMeasure",
        "AmountStock",
        "AmountMinimumStock",
        "PurchaseDate"
    ];

    // funcao que referencia a compra pelo fornecedor
    public function purchases(){
        return $this->hasMany('App\Purchases', 'product_id');
    }

    public function requisitions(){
        return $this->hasMany('App\Requisitions', 'product_id');
    }
}
