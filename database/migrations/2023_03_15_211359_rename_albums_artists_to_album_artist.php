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
        Schema::rename('albums_artists', 'album_artist');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('album_artist', 'albums_artists');
    }
};
