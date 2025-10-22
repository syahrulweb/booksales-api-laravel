<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // id INT(11) AUTO_INCREMENT
            $table->string('name', 255); // name VARCHAR(255)
            $table->string('photo', 255)->nullable(); // photo VARCHAR(255), boleh kosong
            $table->text('bio')->nullable(); // bio TEXT, boleh kosong
            $table->string('nationality')->nullable(); // tetap ada
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
