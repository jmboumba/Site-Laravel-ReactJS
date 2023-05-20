<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnonceController extends Controller
{
    function addAnnonce(Request $req){
        $annonce = new Annonce;
        $annonce->title= $req->input('title');
        $annonce->description= $req->input('description');
        $annonce->price= $req->input('price');
        $annonce->availability= $req->input('availability');
        $annonce->date_depot= $req->input('date_depot');
        $annonce->nb_vue= $req->input('nb_vue');
        $annonce->heure_depot= $req->input('heure_depot');
        $annonce->commune_id= $req->input('commune_id');
        $annonce->user_id= $req->input('user_id');
        $annonce->categorie_id= $req->input('categorie_id');
        $annonce->save();
        return $annonce;
    }
}
