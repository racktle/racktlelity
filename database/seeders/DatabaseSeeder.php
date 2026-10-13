<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('racktility.admin.email');
        $password = config('racktility.admin.password');

        if (! $email || ! $password) {
            throw new RuntimeException('Isi ADMIN_EMAIL dan ADMIN_PASSWORD di .env sebelum menjalankan db:seed.');
        }

        if (strlen($password) < 12) {
            throw new RuntimeException('ADMIN_PASSWORD harus memiliki minimal 12 karakter.');
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => config('racktility.admin.name'),
                'password' => $password,
                'role' => 'admin',
            ],
        );
    }
}
