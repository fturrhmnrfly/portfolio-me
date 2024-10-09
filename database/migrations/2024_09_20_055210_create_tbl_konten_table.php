<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKontenTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_konten', function (Blueprint $table) {
            $table->id();
            $table->string('title');     // Judul konten
            $table->text('content');     // Isi konten
            $table->timestamps();        // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_konten');
    }
}
