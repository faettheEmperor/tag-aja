<?php

namespace Database\Seeders;

use App\Models\Sls;
use App\Models\Shop;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Shop::factory(30)->create();

        // User::factory()->withPersonalTeam()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            ['name' => 'Nur Ihklas, SST, M.Ec.Dev', 'email' => 'nur.ikhlas@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edy Purnomo, S.E.', 'email' => 'edyp@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mukhlisul Amal Mustofa, S.Tr.Stat.', 'email' => 'amal.mustofa@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nurul Wafiqah Tarihoran, S.Tr.Stat.', 'email' => 'nurultarihoran@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shela Yulfia Hadist, A.Md.Stat.', 'email' => 'shelayulfia@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Farabi Arsy Edodivano Tauhid, S.Tr.Stat.', 'email' => 'farabi.arsy@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Saputra Noviansyah, SST', 'email' => 'saputra.noviansyah@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tengku Natasya Auzea Fahyumi A.Md.Stat.', 'email' => 'tengku.natasya@bps.go.id', 'email_verified_at' => now(), 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($users as $user) {
            User::create($user);
        };
    }
}
