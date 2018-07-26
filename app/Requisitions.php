<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisitions extends Model
{
    protected $fillable = [
        "RequisitionDate",
        "Description",
        "user_id",
        "product_id"
    ];

    // funcao que referencia o usuario com a compra
    public function user(){
        return $this->belongsTo('App\Users', 'user_id');
    }

    // funcao que referencia o produto com a compra
    public function product(){
        return $this->belongsTo('App\Products', 'product_id');
    }
}
