<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{
    function _construct()
    {
            $this->middleware('auth');
    }

    protected function validateProduct($request){
        $validator = Validator::make($request->all(), [
            "Name" => "required",
            "UnitMeasure"=> "required",
            "AmountMinimumStock" => "required | numeric"
        ]);
        return $validator;
    }

    // método responsável por editar o produto.
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?: 4;
        $page = $request['page'] ?: 1;
        $search = $request['search'];
        $type = $request['type'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if($search){
            $products = DB::table('products')->where('Name', '=', $search)->paginate($qtd);
        }else{
            if($type){
                $products = DB::table('products')->where('type', '=', $type)->paginate($qtd);
            }else{
                $products = DB::table('products')->paginate($qtd);
            }
        }
        $products = $products->appends(Request::capture()->except('page'));

        return view('products.index', compact('products'));
    }

    public function create()
    {
        // exibindo o formulario products
        return view('products.create');
    }

    // método para salvar
    public function store(Request $request)
    {
        $validator = $this->validateProduct($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        // adicioanando a variavel quantidade como 0 para salvar como defalt
        //Products::create($request->all() + ['AmountStock' => 0]);
        Products::create($request->all());
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
        $product = Products::find($id);
        //$product = Products::where('id', 1);

        return view('products.show', compact('product'));
    }

    public function edit($ProductId)
    {
        $product = Products::find($ProductId);
        return view('products.edit', compact('product'));
    }

    // método para atualizar o produto que estou editando
    public function update(Request $request, $id)
    {
        $validator = $this->validateProduct($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $product = Products::find($id);
        $dados = $request->all();
        $product->update($dados);

        // devo implementar uma menssagem confirmando a atualização...
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect()->route('products.index');
    }

    // criando o metodo remover o produto
    public function remove($id)
    {
        $product = Products::find($id);
        return view('products.remove', compact('product'));

    }
}
