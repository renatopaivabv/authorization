<?php

namespace Database\Seeders;

use App\Models\{User, Todo};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::factory()->create(['name' => 'John Doe']);
        $user2 = User::factory()->create(['name' => 'Jane Doe']);

        Todo::factory(5)->create(['user_id' => $user1->id]);
        Todo::factory(5)->create(['user_id' => $user2->id]);
    }
}
