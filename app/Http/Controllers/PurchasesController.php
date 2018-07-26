<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Purchases;
use App\User;
use App\Suppliers;
use App\Products;

class PurchasesController extends Controller
{

        // tem que trazer o id do produto e colocar na label
    public function index()
    {
        //$product = Products::find($id);

        $purchases = Purchases::all();
        return view('purchases.index', compact('purchases'));
    }

    public function create($id = null)
    {
        if (!empty($id)) {
            $product = Products::find($id);
            // se for encontrado
            if (!empty($product)) {
                $users = User::all();
                //$suppliers = Suppliers::all();
                $suppliers = Suppliers::pluck('Name', 'id')->toArray();
                return view('purchases.create', compact('product', 'users', 'suppliers'));
            }
        }
        // se o produto nao for encontrado volta a view
        return redirect()->route('purchases.index');
    }

    public function store(Request $request)
    {
        //$userId = $request->input('user_id');
        //$supplierId = $request->input('supplier_id');
        //$productId = $request->input('product_id');

        //$questionId = Input::get('user_id');
        //$questionId = Input::get('qusupplier_idestion');
        //$questionId = Input::get('question');

        $userId = $request->get('user_id');
        //$supplierId = request()->get('supplier_id');
        $supplierId = request('supplier_id');
        $productId = $request->get('product_id');

        //request()->get('supplier_id')

        //$supplierId = Suppliers::find(request('supplier_id'));

        if (!empty($userId)) {

            $user = User::find($userId);
            $supplier = Suppliers::find($supplierId);

            // busca o produto selecionado
            $productId = $request->input('product_id');

            // verifica se existe o produto
            if (!empty($productId)) {
                $product = Products::find($productId);
                // adiciona no estoque o quantidade de produto comprado
                $product->AmountStock = $product->AmountStock + $request->input('Quantity');
                $product->save();
            }

            // criando o model purchase
            $purchase = new Purchases;
            $purchase->user_id = $user->id;
            $purchase->supplier_id = $supplier->id;
            //$purchase->supplier_id = $supplier->id;
            //$purchase->product_id = $product->id;



            return redirect()->route('products.index');
        }


        //$station->save();
        //Session::flash('success','Station data added');
        //return redirect()->route('stations.show', $station->id);


        // cria o objeto de compra
        //Purchases::create($request->all());

        // adicioanando a variavel quantidade como 0 para salvar como defalt
        //Products::create($request->all() + ['AmountStock' => 0]);
        //Products::create($request->all());
    }
}
