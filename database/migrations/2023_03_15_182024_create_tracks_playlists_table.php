<?php

use App\Models\Track;
use App\Models\Playlist;

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
        Schema::create('tracks_playlists', function (Blueprint $table) {
            $table->foreignIdFor(Track::class);
            $table->foreignIdFor(Playlist::class);
            $table->integer('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks_playlists');
    }
};
