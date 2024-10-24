<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateUserLevelSeeder extends Seeder
{
    public function run()
    {
        // Update semua user yang belum memiliki level
        User::whereNull('level')->update(['level' => 'user']);
    }
}
