<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('songs')->truncate();
      factory(App\Song::class, 50)->create();

      DB::table('songs')->insert([
        'name' => 'La Mandanga',
        'description' => 'Melocotonazo',
        'image' => 'elfary.jpg',
        'audio' => 'lamandanga.mp3',
        'released_at' => '2018/01/21 18:22:00',
        'user_id' => 1
      ]);
    }
}
