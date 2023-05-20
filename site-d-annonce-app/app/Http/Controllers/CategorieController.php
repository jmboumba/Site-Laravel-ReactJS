<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    //
    function addCategorie(Request $req){
        $cat = new Categorie;
        $cat->name= $req->input('name');
        $cat->save();
        return $cat;
    }

    function deleteCategorie(Request $req){
        
    }
}
