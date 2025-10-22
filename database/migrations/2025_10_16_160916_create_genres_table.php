<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id(); // id INT(11) AUTO_INCREMENT
            $table->string('name', 255); // name VARCHAR(255)
            $table->text('description')->nullable(); // description TEXT, boleh kosong
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
