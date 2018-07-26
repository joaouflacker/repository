<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisitions;
use App\User;
use App\Products;

class RequisitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisitions::all();
        return view('requisitions.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // exibindo o select usuarios
         $users = User::all();
         // exibindo o select produtos
         $products = Products::all();

        return view('requisitions.create', compact('users'), compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');

        if (!empty($productId)) {
                $product = Products::find($productId);
                // adiciona no estoque o quantidade de produto comprado
                $product->AmountStock = $product->AmountStock + $request->input('Quantity');
                $product->save();
            }
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $dados = $request->all();
        $product->update($dados);

        // devo implementar uma menssagem confirmando a atualização...
        return redirect()->route('products.index');
    }
}
