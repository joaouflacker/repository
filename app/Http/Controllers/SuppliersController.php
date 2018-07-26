<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class SuppliersController extends Controller
{

    protected function validateSupplier($request){
        $validator = Validator::make($request->all(), [
            "Name" => "required",
            "Address"=> "required",
            "Region"=> "required",
            "Number" => "required | numeric",
            "Town"=> "required",
            "CEP" => "required | numeric"
        ]);
        return $validator;
    }

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
            $suppliers = DB::table('suppliers')->where('Name', '=', $search)->paginate($qtd);
        }else{
            if($type){
                $suppliers = DB::table('suppliers')->where('type', '=', $type)->paginate($qtd);
            }else{
                $suppliers = DB::table('suppliers')->paginate($qtd);
            }
        }
        $suppliers = $suppliers->appends(Request::capture()->except('page'));

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // exibindo o formulario products
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateSupplier($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $dados = $request->all();
        Suppliers::create($dados);

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Suppliers::find($id);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Suppliers::find($id);

        $dados = $request->all();

        $supplier->update($dados);

        // devo implementar uma menssagem confirmando a atualização...

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
