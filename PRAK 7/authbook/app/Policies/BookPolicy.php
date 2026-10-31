<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua user bisa lihat list
    }

    public function view(User $user, Book $book): bool
    {
        return true; // Semua user bisa lihat detail
    }

    public function create(User $user): bool
    {
       return in_array($user->role, ['admin', 'staff']); // Admin & Staff bisa buat
    }

    public function update(User $user, Book $book): bool
    {
       return in_array($user->role, ['admin', 'staff']); // Admin & Staff bisa edit
    }

    public function delete(User $user, Book $book): bool
    {
       return $user->role === 'admin'; // Hanya Admin yang bisa hapus
    }

    public function restore(User $user, Book $book): bool
    {
        return true;
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return true;
    }
}