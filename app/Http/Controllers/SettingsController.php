<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Log;

class SettingsController extends Controller
{
    public function changepassword(Request $request, $id)
    {

        $user = User::find($id);

        $user->update([
            'password' => Hash::make($request->input('new-password'))

        ]);



        Log::create([
            'user_id' => 1,
            'action' => 'todo_changepassword',
            'data' => json_encode([
                'password' => $request->input('new-password'),

            ]),

        ]);
        return redirect('settings');
    }
}
