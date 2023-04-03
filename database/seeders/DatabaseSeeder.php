<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // <---- USERS ---->
        DB::table('users')->insert([
            'id' => 1,
            'name' => "tagetes",
            'email' => "adam@ptmn.io",
            'password' => Hash::make("marigoldsbloom"),
        ]);

        // <---- ARTISTS ---->
        DB::table('artists')->insert([
            'id' => 1,
            'user_id' => 1,
            'name' => "Phantogram"
        ]);
        DB::table('artists')->insert([
            'id' => 2,
            'user_id' => 1,
            'name' => "Early Eyes"
        ]);
        DB::table('artists')->insert([
            'id' => 3,
            'user_id' => 1,
            'name' => "Jack Stauber"
        ]);
        DB::table('artists')->insert([
            'id' => 4,
            'user_id' => 1,
            'name' => "Modest Mouse"
        ]);

        // <---- ALBUMS ---->
        DB::table('albums')->insert([
            'id' => 1,
            'user_id' => 1,
            'album_cover_id' => 1,
            'title' => "Eyelid Movies",
            'category' => "Album",
            'release_year' => "2010"
        ]);
        DB::table('albums')->insert([
            'id' => 2,
            'user_id' => 1,
            'album_cover_id' => 2,
            'title' => "Marigolds",
            'category' => "Single",
            'release_year' => "2020"
        ]);
        DB::table('albums')->insert([
            'id' => 3,
            'user_id' => 1,
            'album_cover_id' => 3,
            'title' => "Two Time",
            'category' => "Single",
            'release_year' => "2017"
        ]);
        DB::table('albums')->insert([
            'id' => 4,
            'user_id' => 1,
            'album_cover_id' => 4,
            'title' => "Night on the Sun",
            'category' => "EP",
            'release_year' => "1999"
        ]);

        // <---- ALBUM - ARTIST PIVOT ---->
        DB::table('album_artist')->insert([
            'album_id' => 1,
            'artist_id' => 1,
            'priority' => 1
        ]);
        DB::table('album_artist')->insert([
            'album_id' => 2,
            'artist_id' => 2,
            'priority' => 1
        ]);
        DB::table('album_artist')->insert([
            'album_id' => 3,
            'artist_id' => 3,
            'priority' => 1
        ]);
        DB::table('album_artist')->insert([
            'album_id' => 4,
            'artist_id' => 4,
            'priority' => 1
        ]);

        // <---- ALBUM COVERS ---->
        DB::table('album_covers')->insert([
            'id' => 1,
            'user_id' => 1,
            'album_id' => 1,
            'color' => "195.162.66&49.35.29",
            'path' => "./img/test/covers/eyelid_movies.jpeg"
        ]);
        DB::table('album_covers')->insert([
            'id' => 2,
            'user_id' => 1,
            'album_id' => 2,
            'color' => "222.120.144&37.70.68",
            'path' => "./img/test/covers/marigolds.jpeg"
        ]);
        DB::table('album_covers')->insert([
            'id' => 3,
            'user_id' => 1,
            'album_id' => 3,
            'color' => "192.175.171&74.41.58",
            'path' => "./img/test/covers/two_time.jpeg"
        ]);
        DB::table('album_covers')->insert([
            'id' => 4,
            'user_id' => 1,
            'album_id' => 4,
            'color' => "192.175.171&74.41.58",
            'path' => "./img/test/covers/night_on_the_sun.jpeg"
        ]);

        // <---- TRACKS ---->
        DB::table('tracks')->insert([
            'id' => 1,
            'user_id' => 1,
            'album_id' => 1,
            'album_index' => 1,
            'title' => "Mouthful of Diamonds",
            'duration' => 253,
            'path' => "./audio/test/tracks/phantogram_mouthful_of_diamonds.mp3"
        ]);
        DB::table('tracks')->insert([
            'id' => 2,
            'user_id' => 1,
            'album_id' => 1,
            'album_index' => 2,
            'title' => "When I'm Small",
            'duration' => 249,
            'path' => "./audio/test/tracks/phantogram_when_im_small.mp3"
        ]);
        DB::table('tracks')->insert([
            'id' => 3,
            'user_id' => 1,
            'album_id' => 1,
            'album_index' => 3,
            'title' => "Turn It Off",
            'duration' => 241,
            'path' => "./audio/test/tracks/phantogram_turn_it_off.mp3"
        ]);
        DB::table('tracks')->insert([
            'id' => 4,
            'user_id' => 1,
            'album_id' => 1,
            'album_index' => 4,
            'title' => "Running From the Cops",
            'duration' => 237,
            'path' => "./audio/test/tracks/phantogram_running_from_the_cops.mp3"
        ]);
        DB::table('tracks')->insert([
            'id' => 5,
            'user_id' => 1,
            'album_id' => 2,
            'album_index' => 1,
            'title' => "Marigolds",
            'duration' => 221,
            'path' => "./audio/test/tracks/early_eyes_marigolds.mp3"
        ]);
        DB::table('tracks')->insert([
            'id' => 6,
            'user_id' => 1,
            'album_id' => 3,
            'album_index' => 1,
            'title' => "Two Time",
            'duration' => 138,
            'path' => "./audio/test/tracks/jack_stauber_two_time.mp3"
        ]);
        DB::table('tracks')->insert([
            'id' => 7,
            'user_id' => 1,
            'album_id' => 4,
            'album_index' => 1,
            'title' => "Night on the Sun",
            'duration' => 561,
            'path' => "./audio/test/tracks/modest_mouse_night_on_the_sun.mp3"
        ]);

        // <---- ARTIST - TRACK PIVOT ---->
        DB::table('artist_track')->insert([
            'track_id' => 1,
            'artist_id' => 1,
            'priority' => 1
        ]);
        DB::table('artist_track')->insert([
            'track_id' => 2,
            'artist_id' => 1,
            'priority' => 1
        ]);
        DB::table('artist_track')->insert([
            'track_id' => 3,
            'artist_id' => 1,
            'priority' => 1
        ]);
        DB::table('artist_track')->insert([
            'track_id' => 4,
            'artist_id' => 1,
            'priority' => 1
        ]);
        DB::table('artist_track')->insert([
            'track_id' => 5,
            'artist_id' => 2,
            'priority' => 1
        ]);
        DB::table('artist_track')->insert([
            'track_id' => 6,
            'artist_id' => 3,
            'priority' => 1
        ]);
        DB::table('artist_track')->insert([
            'track_id' => 7,
            'artist_id' => 4,
            'priority' => 1
        ]);

        // <---- PLAYLISTS ---->
        DB::table('playlists')->insert([
            'id' => 1,
            'user_id' => 1,
            'playlist_cover_id' => 1,
            'title' => "Favorites",
            'description' => "My Favorite Songs"
        ]);

        // <---- PLAYLIST - TRACK PIVOT ---->
        DB::table('playlist_track')->insert([
            'track_id' => 1,
            'playlist_id' => 1,
            'position' => 1
        ]);
        DB::table('playlist_track')->insert([
            'track_id' => 2,
            'playlist_id' => 1,
            'position' => 2
        ]);
        DB::table('playlist_track')->insert([
            'track_id' => 5,
            'playlist_id' => 1,
            'position' => 3
        ]);
        DB::table('playlist_track')->insert([
            'track_id' => 6,
            'playlist_id' => 1,
            'position' => 4
        ]);
        DB::table('playlist_track')->insert([
            'track_id' => 7,
            'playlist_id' => 1,
            'position' => 5
        ]);

        // <---- PLAYLIST COVERS ---->
        DB::table('playlist_covers')->insert([
            'id' => 1,
            'user_id' => 1,
            'playlist_id' => 1,
            'color' => "4.168.219&43.70.76",
            'path' => "./img/mg/covers/favorites.png"
        ]);

        


    }
}
