<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = "notes";

  
    public $timestamps = true;

    protected $fillable = [
        'not_isim',
        'durumu',
        'notlar',
        'id',
        'user_id',
    ];
    public function user()
{
    return $this->belongsTo(User::class); //deneme
}

}
