<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use App\Models\RtRw;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // AMBIL DATA KELURAHAN
        $kelTanjungUban = Kelurahan::where('nama', 'TANJUNG UBAN KOTA')->first();
        $kelTelukLobam = Kelurahan::where('nama', 'TELUK LOBAM')->first();
        $kelTanjungPermai = Kelurahan::where('nama', 'TANJUNG PERMAI')->first();

        // AMBIL DATA RT RW (UNTUK PETUGAS)
        $rt1 = RtRw::where('kelurahan_id', $kelTanjungUban->id)->where('rt', '001')->first();
        $rt2 = RtRw::where('kelurahan_id', $kelTelukLobam->id)->where('rt', '001')->first();
        $rt3 = RtRw::where('kelurahan_id', $kelTanjungPermai->id)->where('rt', '001')->first();

        // ADMIN (SEMUA ORANG BPS)
        $users = [
            ['name' => 'Nur Ihklas, SST, M.Ec.Dev', 'email' => 'nur.ikhlas@bps.go.id', 'role' => 'admin'],
            ['name' => 'Edy Purnomo, S.E.', 'email' => 'edyp@bps.go.id', 'role' => 'admin'],
            ['name' => 'Mukhlisul Amal Mustofa, S.Tr.Stat.', 'email' => 'amal.mustofa@bps.go.id', 'role' => 'admin'],
            ['name' => 'Nurul Wafiqah Tarihoran, S.Tr.Stat.', 'email' => 'nurultarihoran@bps.go.id', 'role' => 'admin'],
            ['name' => 'Shela Yulfia Hadist, A.Md.Stat.', 'email' => 'shelayulfia@bps.go.id', 'role' => 'admin'],
            ['name' => 'Farabi Arsy Edodivano Tauhid, S.Tr.Stat.', 'email' => 'farabi.arsy@bps.go.id', 'role' => 'admin'],
            ['name' => 'Saputra Noviansyah, SST', 'email' => 'saputra.noviansyah@bps.go.id', 'role' => 'admin'],
            ['name' => 'Tengku Natasya Auzea Fahyumi A.Md.Stat.', 'email' => 'tengku.natasya@bps.go.id', 'role' => 'admin'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => $user['role'],
                'kelurahan_id' => null,
                'rt_rw_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $petugas = [
            [
                'name' => 'Petugas RT 001 TANJUNG UBAN',
                'email' => 'petugas.tanjunguban@example.com',
                'role' => 'petugas',
                'kelurahan_id' => $kelTanjungUban->id,
                'rt_rw_id' => $rt1->id ?? null,
            ],
            [
                'name' => 'Petugas RT 001 TELUK LOBAM',
                'email' => 'petugas.teluklobam@example.com',
                'role' => 'petugas',
                'kelurahan_id' => $kelTelukLobam->id,
                'rt_rw_id' => $rt2->id ?? null,
            ],
            [
                'name' => 'Petugas RT 001 TANJUNG PERMAI',
                'email' => 'petugas.tanjungpermai@example.com',
                'role' => 'petugas',
                'kelurahan_id' => $kelTanjungPermai->id,
                'rt_rw_id' => $rt3->id ?? null,
            ],
        ];

        foreach ($petugas as $p) {
            User::create([
                'name' => $p['name'],
                'email' => $p['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => $p['role'],
                'kelurahan_id' => $p['kelurahan_id'],
                'rt_rw_id' => $p['rt_rw_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $supervisor = [
            [
                'name' => 'Supervisor TANJUNG UBAN',
                'email' => 'supervisor.tanjunguban@example.com',
                'role' => 'supervisor',
                'kelurahan_id' => $kelTanjungUban->id,
                'rt_rw_id' => null,  // supervisor tidak terikat RT tertentu
            ],
            [
                'name' => 'Supervisor TELUK LOBAM',
                'email' => 'supervisor.teluklobam@example.com',
                'role' => 'supervisor',
                'kelurahan_id' => $kelTelukLobam->id,
                'rt_rw_id' => null,
            ],
            [
                'name' => 'Supervisor TANJUNG PERMAI',
                'email' => 'supervisor.tanjungpermai@example.com',
                'role' => 'supervisor',
                'kelurahan_id' => $kelTanjungPermai->id,
                'rt_rw_id' => null,
            ],
        ];

        foreach ($supervisor as $sp) {
            User::create([
                'name' => $sp['name'],
                'email' => $sp['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => $sp['role'],
                'kelurahan_id' => $sp['kelurahan_id'],
                'rt_rw_id' => $sp['rt_rw_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
