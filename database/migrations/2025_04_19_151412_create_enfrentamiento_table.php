<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enfrentamiento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre1');
            $table->string('imagen1');
            $table->string('nombre2');
            $table->string('imagen2');
            $table->string('fecha');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enfrentamiento');
    }
};
