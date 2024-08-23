<?php

namespace App\Http\Controllers;


use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{


   public function homeview(Request $request)
   {
      $sayi = Note::count();
      return view("home", compact("sayi"));
   }
}
