<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'admin', // <-- Tambahkan role admin
        ]);

        // Buat Staff User
        User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@gmail.com',
            'role' => 'staff', // <-- Tambahkan role staff
        ]);

        // Buat Viewer User
        User::factory()->create([
            'name' => 'Viewer User',
            'email' => 'viewer@gmail.com',
            'role' => 'viewer', // <-- Tambahkan role viewer
        ]);

        // Buat 10 authors
        $authors = Author::factory(10)->create();

        // Buat 50 books dengan random authors
        Book::factory(50)->create([
            'author_id' => fn() => $authors->random()->id,
        ]);
    }
}