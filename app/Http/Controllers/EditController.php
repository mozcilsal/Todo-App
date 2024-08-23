<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Log;
use App\Models\Note;

class EditController extends Controller
{
    public function editShow($id)
    {
        $note = Note::find($id); //id ye göre notu bul 
        return view('edit', ['note' => $note]); //notu edit görünümüne


    }
    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        $note->update([
            'not_isim' => $request->input('notname'),
            'durumu' => $request->input('notdurum'),
            'notlar' => $request->input('noticerik'),
        ]);

        //log ekledik      
        Log::create([
            'user_id' => 1,
            'action' => 'todo_update',
            'data' => json_encode([
                'not_isim' => $request->input('notname'),
                'notdurum' => $request->input('notdurum'),
                'noticerik' => $request->input('noticerik'),
            ]),

        ]);

        return Redirect::route('main.show')->with('success', 'succes');
    }
}
