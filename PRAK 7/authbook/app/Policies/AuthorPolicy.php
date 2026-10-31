<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;

class AuthorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Semua role (admin, staff, viewer) bisa melihat daftar author
        return in_array($user->role, ['admin', 'staff', 'viewer']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Author $author): bool
    {
        // Semua role bisa melihat detail author
        return in_array($user->role, ['admin', 'staff', 'viewer']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Hanya Admin dan Staff yang bisa menambah author baru
        return in_array($user->role, ['admin', 'staff']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Author $author): bool
    {
        // Hanya Admin dan Staff yang bisa mengedit author
        return in_array($user->role, ['admin', 'staff']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Author $author): bool
    {
        // HANYA Admin yang boleh menghapus author
        return $user->role === 'admin';
    }
}