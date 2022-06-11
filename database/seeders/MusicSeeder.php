<?php

namespace Database\Seeders;

use App\Models\Music;
use App\Models\User;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Music::factory()->times(10)->create();

        foreach (Music::all() as $music) {
            $users = User::all()->random(3)->pluck('id');
            $music->users()->attach($users, ['user_action' => array_rand(array_flip(['liked', 'disliked']))]);
        }
    }
}
