<?php

namespace Database\Seeders;

use App\Models\User;

User::create([
    'name' => 'Admin',
    'email' => 'admin@info-endo.fr',
    'password' => bcrypt('password'),
    'is_admin' => true,
]);
