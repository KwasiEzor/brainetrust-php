<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\ClubSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ScGameSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AboutClubSeeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\PlayerSerieSeeder;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\PlayScrabbleSeeder;
use Database\Seeders\ScrabbleTypeSeeder;
use Database\Seeders\PlayerCategorySeeder;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\PermissionTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Storage::deleteDirectory('public/images/posts');
        // Storage::makeDirectory('public/images/posts');

        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClubSeeder::class);
        $this->call(PlayerCategorySeeder::class);
        $this->call(PlayerSerieSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(ScrabbleTypeSeeder::class);
        $this->call(AboutClubSeeder::class);
        $this->call(PlayScrabbleSeeder::class);
        $this->call(ScGameSeeder::class);
    }
}
