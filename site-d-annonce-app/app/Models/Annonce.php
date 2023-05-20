<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    
    protected  $fillable  =  [ 'title', 'description', 'price', 'availability', 'date_depot', 'nb_vue', 'heure_depot', 'commune_id', 'user_id', 'categorie_id'];
}
