<?php

// database/migrations/2025_08_14_000000_create_ai_prompts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ai_prompts', function (Blueprint $table) {
            $table->id();
            $table->text('prompt');
            $table->longText('response')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ai_prompts');
    }
};
