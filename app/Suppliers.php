<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = [
    	"Name",
        "Address",
        "Region",
        "Number",
        "Town",
        "CEP"
    ];

    // funcao que referencia a compra pelo fornecedor
    public function purchases(){
        return $this->hasMany('App\Purchases', 'supplier_id');
    }
}
