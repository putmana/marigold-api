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
        Schema::rename('tracks_artists', 'track_artist');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('track_artist', 'tracks_artists');
    }
};
