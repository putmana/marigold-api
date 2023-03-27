<?php

use App\Models\Album;
use App\Models\Artist;

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
        Schema::create('albums_artists', function (Blueprint $table) {
            $table->foreignIdFor(Album::class);
            $table->foreignIdFor(Artist::class);
            $table->integer('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums_artists');
    }
};
