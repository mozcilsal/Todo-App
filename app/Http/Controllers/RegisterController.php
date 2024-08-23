<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerpage()
    {
        return view("register");
    }
    public function register(Request $request)

    {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);
        $user = $request->input("username");
        $userexist = user::where('name', $user)->exists();
        $password = $request->input("password");


        if ($userexist == true) {

            return redirect()->route('registerpage')->with('error', 'User Already Exist!');
        } else {
            $newuser = user::create([
                'name' => $user,
                'password' => Hash::make($password),

            ]);
            if ($newuser) {
                echo "<div class='alert alert-success' role='alert'>
            New User Added Please Login!
          </div>
          ";
                return redirect()->route('show');
            }
        }
    }
}
