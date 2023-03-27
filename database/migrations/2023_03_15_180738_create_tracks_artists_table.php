<?php

use App\Models\Track;
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
        Schema::create('tracks_artists', function (Blueprint $table) {
            $table->foreignIdFor(Track::class);
            $table->foreignIdFor(Artist::class);
            $table->integer('priority');
            $table->timestamps();
        });
    }

    /**art
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks_artists');
    }
};
