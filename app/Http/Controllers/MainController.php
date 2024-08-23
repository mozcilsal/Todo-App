<?php

namespace App\Http\Controllers;


use App\Models\Log;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function addView()
    {
        return view("add");
    }
    public function add(Request $request)
    {

        $validatedData = $request->validate([
            'notname' => ['required', 'max:255'],
            'notdurum' => ['required', 'in:Aktif,Tamamlanan,İptal Edilen'],
            'noticerik' => ['required'],
        ]);

        $notadi = $request->input("notname");
        $notdurum = $request->input("notdurum");
        $noticerik = $request->input("noticerik");

        $yeninot = Note::create([
            'not_isim' => $notadi,
            'durumu' => $notdurum,
            'notlar' => $noticerik,
            'user_id' => Auth::id(), // hangi kullanıcıya ait olduğuyla ilişkilendir

        ]);
        Log::create([
            'user_id' => 1,
            'action' => 'todo_add',
            'data' => json_encode([
                'not_isim' => $request->input('notname'),
                'notdurum' => $request->input('notdurum'),
                'noticerik' => $request->input('noticerik'),
            ]),
        ]);

        $notes = Note::all();     // tekrar maine dönerken yazma sebebimiz güncel halini görebilmek
        //eklendikten sonraki halini
        return redirect()->route('main.show')->with("notes", $notes)
            ->with('success', 'Succes!');
    }
    public function delete(Request $request, $id)
    {
        $delete = Note::where("id", $id)->delete();
        Log::create([
            'user_id' => 1,
            'action' => 'todo_delete',
            'data' => json_encode([
                'not_isim' => $request->input('notname'),
                'notdurum' => $request->input('notdurum'),
                'noticerik' => $request->input('noticerik'),
            ]),

        ]);
        if ($delete) {
            $notes = Note::all();
            return redirect()->route('main.show')->with("notes", $notes)
                ->with('success', 'Not Silindi!');
        } else {
            return redirect()->route('main.show')->with('error', 'Not silinemedi.');
        }
    }


    public function viewStatus(Request $request, $id)
    {
        $gör = Note::where("id", $id)->first();
        if ($gör) {
            echo "Not Adi =" . htmlspecialchars($gör->not_isim), "<br>";
            echo "Durumu =" . htmlspecialchars($gör->durumu), "<br>";
            echo "İçeriği =" . htmlspecialchars($gör->notlar), "<br>";
        } else {
            echo "not bulunamadu";
        }
    }
    public function sort(Request $request)
    {

        $notdurumu = $request->input('not_durumu');

        if ($notdurumu) {
            $notes = Note::where('durumu', 'like', '%' . $notdurumu . '%')->get();
            return view('main', ['notes' => $notes]);
        } else {
            $notes = Note::all();
        }
        return view('main', ['notes' => $notes]);
    }
    public function removeFilter()
    {

        $notes = Note::all();
        return view('main', compact('notes'));  //güncel halini görenilmek için notes=>$notes de yapabilirdik bu daha kolay 
    }

    public function show()
    {

        $notes = Note::where('user_id', Auth::id())->get(); //sadece giriş yapan kullanıcının notunu getir
        return view("main", ["notes" => $notes]);
    }

    public function settingsShow()
    {

        $user = auth()->user();

        return view('settings', compact('user'));
    }
}
