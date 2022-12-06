<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        user::create([
            'email' => $request->email,
            'name' =>  $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect('/')->with('success', 'Berhasil menambahkan akun! silahkan login!');
    }
}
