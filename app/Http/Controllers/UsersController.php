<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UsersController extends Controller
{
    protected function validateUser($request){
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email"=> "required",
            "password" => "required"
        ]);
        return $validator;
    }

    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()) );

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
            $users = DB::table('users')->where('name', '=', $search)->paginate($qtd);
        }else{
            if($type){
                $users = DB::table('users')->where('type', '=', $type)->paginate($qtd);
            }else{
                $users = DB::table('users')->paginate($qtd);
            }
        }
        $users = $users->appends(Request::capture()->except('page'));

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // exibindo o formulario products
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // método para salvar
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ProductId)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // método para atualizar o produto que estou editando
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    // criando o metodo remover o produto
    public function remove($id)
    {

    }


}
