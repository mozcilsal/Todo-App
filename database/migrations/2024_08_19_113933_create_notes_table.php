<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); 
            $table->string('not_isim'); 
            $table->string('durumu'); 
            $table->text('notlar'); 
            
            // Yeni eklenen foreign key
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key ekledik giriş yapan kullanıcı not erişmek için
            
          

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['note_id']); 
            $table->dropColumn('note_id'); 
        });

        Schema::dropIfExists('notes');
    }
};
