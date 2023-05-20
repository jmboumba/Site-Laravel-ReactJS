<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $req){
        $user = new User;
        $user->name= $req->input('name');
        $user->email= $req->input('email');
        $user->password= $req->input('password');
        $user->tel_fix= $req->input('tel_fix');
        $user->fax_memb= $req->input('fax_memb');
        $user->site_web_meb= $req->input('site_web_meb');
        $user->etat_memb= $req->input('etat_memb');
        $user->type_memb= $req->input('type_memb');
        $user->adresse_memb= $req->input('adresse_memb');
        $user->role= $req->input('role');
        $user->save();
        return $user;
    }

    function login(Request $req){
        $user = User::where('email', $req->email)->first();
        if(!$user || !Hash::make($req->input('password'))){
            return ["error"=>"Email or password incorrect"]; 
        }
        return response()->json(['status' => true, 'user' => $user]);
    }
}
