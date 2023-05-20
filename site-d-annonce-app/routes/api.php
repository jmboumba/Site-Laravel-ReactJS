<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Annonce;
use App\Models\Categorie;
use App\Models\Region;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnonceController;
use App\Models\Commune;
use App\Http\Controller\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::post('Login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']); */ 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});



Route::get('annonce/{user}', function ($userId) {
    $res = Annonce::where('user_id', $userId)->first();
    return response($res, 200);
}); 


//Users
/*
    //register
    Route::post('register', [UserController::class, 'register']);

    //login
    Route::post('login', [UserController::class, 'login']);

    //get one
    Route::get('users/{user}', function ($userId) {
        return response(User::find($userId), 200);
    });

    //get one
    Route::get('users/{user}', function ($userId) {
        $user = User::find($userId);
        if($user->password!= (Hash::make($user->password))){
            return response($user,200);
        }
    });

    //update profile
    Route::put('users/{user}', function(Request $request, $userId){
        $user = User::findOrFail($userId);
        $user->update($request->all());
        return $user;
    });
*/

//Annonces

    //get all 
    Route::get('annonces', function () {
        return response(Annonce::all(),200);
    });

    //get one
    Route::get('annonces/{annonce}', function ($annonceId) {
        return response(Annonce::find($annonceId), 200);
    });

    //add one
    Route::post('annonces', function(Request $request) {
    $resp = Annonce::create($request->all());
        return $resp;
    });

    //update one
    Route::put('annonces/{annonce}', function(Request $request, $annonceId) {
        $annonce = Annonce::findOrFail($annonceId);
        $annonce->update($request->all());
        return $annonce;
    });

    //delete one
    Route::delete('annonces/{annonce}',function($annonceId) {
        Annonce::find($annonceId)->delete();
        return 204;
    }); 




//Categories
    //get all
    Route::get('categories', function(){
        return response(Categorie::all(),200);
    });

    //get one
    Route::get('categories/{categorie}', function ($categorieId) {
        return response(Categorie::find($categorieId), 200);
    });


    //Routes Administrateur
    //add one
    Route::post('categories', function(Request $request) {
        $resp = Categorie::create($request->all());
            return $resp;
    });

    //update one
    Route::put('categories/{categorie}', function(Request $request, $categorieId) {
        $categorie = Categorie::findOrFail($categorieId);
        $categorie->update($request->all());
        return $categorie;
    });

    //delete one
    Route::delete('annonces/{annonce}',function($categorieId) {
        Categorie::find($categorieId)->delete();
        return 204;
    }); 




//Regions
    //get all
    Route::get('regions', function(){
        return response(Region::all(),200);
    });

    //get one
    Route::get('regions/{region}', function ($regionId) {
        return response(Region::find($regionId), 200);
    });


    //Routes Administrateur
    //add one
    Route::post('regions', function(Request $request) {
        $resp = Region::create($request->all());
            return $resp;
    });

    //update one
    Route::put('regions/{region}', function(Request $request, $regionId) {
        $region = Region::findOrFail($regionId);
        $region->update($request->all());
        return $region;
    });

    //delete one
    Route::delete('regions/{region}',function($regionId) {
        Region::find($regionId)->delete();
        return 204;
    }); 



//Communes
    //get all
    Route::get('communes', function(){
        return response(Commune::all(),200);
    });

    //get one
    Route::get('communes/{commune}', function ($communeId) {
        return response(Commune::find($communeId), 200);
    });


    //Routes Administrateur
    //add one
    Route::post('communes', function(Request $request) {
        $resp = Commune::create($request->all());
            return $resp;
    });

    //update one
    Route::put('communes/{commune}', function(Request $request, $communeId) {
        $region = Commune::findOrFail($communeId);
        $region->update($request->all());
        return $region;
    });

    //delete one
    Route::delete('communes/{commune}',function($communeId) {
        Commune::find($communeId)->delete();
        return 204;
    }); 


