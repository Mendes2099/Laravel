<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function user(){
        return view('general.home');
     }

     public function fallback(){
        return view('general.fallback');
     }

     //!------------------------------------

     public function addUser()
     {
         return view('auth.register');
     }


     public function createUser(Request $request)
     {

         $myUser = $request->all();

         $request->validate(
             [
                 'email' => 'required|email|unique:users',
                 'name' => 'required|string',
                 'password' => 'required',
             ]
         );

         DB::insert([
             'email' => $request->email,
             'name' =>  $request->name,
             'password' => Hash::make($request->password)
         ]);

         return redirect('home_all_users')->with('message', 'Utilizador adicionado com sucesso');
     }
}
