<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
       Schema::create('insights', function (Blueprint $table) {
    $table->id();
    $table->text('content');
    $table->json('metrics')->nullable();
    $table->foreignId('generated_by')->constrained('users')->onDelete('cascade');
    $table->timestamps();
});
    }
    public function down(): void {
        Schema::dropIfExists('insights');
    }
};
