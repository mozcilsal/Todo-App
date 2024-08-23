<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('loginform'); // loginform blade görünümü için
    }

    public function login(Request $request)
    {

        // İstek doğrulama
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Kullanıcı bilgilerini al
        $credentials = $request->only('name', 'password');

        // Kullanıcıyı doğrula
        if (Auth::attempt($credentials)) {
            // Başarılı giriş
            return redirect()->intended('main'); // Yönlendirme URL'sini belirt
        } else {
            // Başarısız giriş
            return redirect()->back()->withErrors([
                'username' => 'Bu kullanıcı adı ve şifre kombinasyonu geçerli değil.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('logout');
    }
}
