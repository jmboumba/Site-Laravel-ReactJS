<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * create new user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'tel_fix' => ['required', 'string',  'confirmed'],
            'fax_memb' => ['required', 'string', 'confirmed'],
            'site_web_meb' => ['required', 'string', 'confirmed'],
            'etat_memb' => ['required', 'string', 'confirmed'],
            'type_memb' => ['required', 'string', 'confirmed'],
            'adresse_memb' => ['required', 'string', 'max:50', 'confirmed']
        ]);

        if($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'fix errors', 'errors' => $validator->errors()], 500);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel_fix' => $request->tel_fix,
            'fax_memb' => $request->fax_memb,
            'site_web_meb' => $request->site_web_meb,
            'etat_memb' => $request->etat_memb,
            'type_memb' => $request->type_memb,
            'adresse_memb' => $request->adresse_memb,
        ]);

        return response()->json(['status' => true, 'user' => $user]);
    }
}