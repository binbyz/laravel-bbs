<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->enum('state', ['PUBLIC', 'PRIVATE', 'ANONYMOUS', 'RESTRICTED'])->default('PRIVATE');
            $table->unsignedBigInteger('localization_id');
            $table->string('description', 100)->nullable();
            $table->string('slug', 50)->unique();
            $table->json('metadata')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('localization_id')->references('id')->on('board_localizations');
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
