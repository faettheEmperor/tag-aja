<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelurahan;
use App\Models\RtRw;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // AMBIL DATA KELURAHAN
        $kelTanjungUban = Kelurahan::where('nama', 'TANJUNG UBAN KOTA')->first();
        $kelTelukLobam = Kelurahan::where('nama', 'TELUK LOBAM')->first();
        $kelTanjungPermai = Kelurahan::where('nama', 'TANJUNG PERMAI')->first();

        // ===========================================
        // ADMIN BPS (SUDAH ADA)
        // ===========================================
        $admins = [
            ['name' => 'Nur Ihklas, SST, M.Ec.Dev', 'email' => 'nur.ikhlas@bps.go.id'],
            ['name' => 'Edy Purnomo, S.E.', 'email' => 'edyp@bps.go.id'],
            ['name' => 'Mukhlisul Amal Mustofa, S.Tr.Stat.', 'email' => 'amal.mustofa@bps.go.id'],
            ['name' => 'Nurul Wafiqah Tarihoran, S.Tr.Stat.', 'email' => 'nurultarihoran@bps.go.id'],
            ['name' => 'Shela Yulfia Hadist, A.Md.Stat.', 'email' => 'shelayulfia@bps.go.id'],
            ['name' => 'Farabi Arsy Edodivano Tauhid, S.Tr.Stat.', 'email' => 'farabi.arsy@bps.go.id'],
            ['name' => 'Saputra Noviansyah, SST', 'email' => 'saputra.noviansyah@bps.go.id'],
            ['name' => 'Tengku Natasya Auzea Fahyumi A.Md.Stat.', 'email' => 'tengku.natasya@bps.go.id'],
        ];

        foreach ($admins as $admin) {
            User::firstOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                    'kelurahan_id' => null,
                    'rt_rw_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // ===========================================
        // SUPERVISOR (DARI DATA)
        // ===========================================
        $supervisors = [
            // Teluk Lobam
            ['name' => 'Alex Triyono', 'email' => 'alexferguson183@gmail.com', 'kelurahan' => $kelTelukLobam],
            ['name' => 'Fuat Susanto', 'email' => 'susantofuat@gmail.com', 'kelurahan' => $kelTelukLobam],
            ['name' => 'Noficandra', 'email' => 'noficandra4@gmail.com', 'kelurahan' => $kelTanjungPermai],
            ['name' => 'Abri Hasibuan', 'email' => 'apri24041981@gmail.com', 'kelurahan' => $kelTanjungPermai],
            ['name' => 'Heni Ismiyati', 'email' => 'ismiheni92@gmail.com', 'kelurahan' => $kelTanjungPermai],
            ['name' => 'Nurhalimah', 'email' => 'nurhalimah1594@gmail.com', 'kelurahan' => $kelTanjungPermai],
            ['name' => 'Sulistiawati', 'email' => 'sulistiawatiadja2@gmail.com', 'kelurahan' => $kelTanjungPermai],
            // Tanjung Uban
            ['name' => 'Isan Adiyaat Rahman', 'email' => 'isanadiyaatrahman1404@gmail.com', 'kelurahan' => $kelTanjungUban],
            ['name' => 'Rahma Destika Atinah Salsabilla', 'email' => 'rahmadestika3@gmail.com', 'kelurahan' => $kelTanjungUban],
        ];

        foreach ($supervisors as $sp) {
            User::firstOrCreate(
                ['email' => $sp['email']],
                [
                    'name' => $sp['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'supervisor',
                    'kelurahan_id' => $sp['kelurahan']->id,
                    'rt_rw_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // ===========================================
        // PETUGAS (AGEN STATISTIK & KETUA RT)
        // ===========================================
        $petugas = [
            // ===== TELUK LOBAM =====
            ['name' => 'Muhammad Rauf Amrullah', 'email' => 'rauf.amrullah1@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Bambang Supriyadi', 'email' => 'bambangsupriyadi1221@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'M. Ismeth Sani', 'email' => 'tugaskls12xpa@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Dhea Amelia Safitri', 'email' => 'meliasftr285@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Nadwi Kamelia', 'email' => 'nadwikamelia77@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Baqiyyaa Kharismatul Latiifah', 'email' => 'baqiyyaaklatiifah28@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Faradilla Aisyahfitri', 'email' => 'faradilla.aisyahfitri20@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Salsabila', 'email' => 'a2732845@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Ahmad Fajar Supriyanto', 'email' => 'ahmadfajarsupriyanto@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Purwanto', 'email' => 'purwantopower1975@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => '003'],
            ['name' => 'Ahmad Rizal Nasution', 'email' => 'ahmadrizalnasution664@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null, 'note' => 'Ketua RW 007'],
            ['name' => 'Rustamaji', 'email' => 'rustamajisukses@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null, 'note' => 'Ketua RW 001'],
            ['name' => 'Sukur', 'email' => 'sukurtiens@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => '001', 'rw' => '006'],
            ['name' => 'Buyung Azril', 'email' => 'buyungn508@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null, 'note' => 'Ketua RW 002'],
            ['name' => 'Neldawati', 'email' => 'neldaw941@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => '003', 'note' => 'Ketua RT 003'],
            ['name' => 'Anhar', 'email' => 'anhar201074@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => '001', 'rw' => '001'],
            ['name' => 'Matsarip', 'email' => 'matsarip208@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => '001', 'note' => 'Ketua RT 001'],
            ['name' => 'Muhammad Zacky Brianno', 'email' => 'zackybrian92@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Syarifudin Ahmad Jamil Rambe', 'email' => 'anggamad63@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            ['name' => 'Rohman', 'email' => 'aarohman1969@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => '002', 'note' => 'Ketua RT 002'],
            ['name' => 'Katty Talsia Ong', 'email' => 'kattytalsia03@gmail.com', 'kelurahan' => $kelTelukLobam, 'rt' => null],
            
            // ===== TANJUNG PERMAI =====
            ['name' => 'Budianto', 'email' => 'budianto.permai@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '003', 'rw' => '001', 'note' => 'Ketua RT 003 RW 001'],
            ['name' => 'Baharuzzaman', 'email' => 'zaman.lobam@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '004', 'rw' => '002'],
            ['name' => 'Legiono', 'email' => 'legiono0207@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => null, 'note' => 'Ketua RW 003'],
            ['name' => 'Usman', 'email' => 'usm963459@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '003', 'rw' => '003'],
            ['name' => 'Alfidra Zanades', 'email' => 'alfidrazanades@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '005', 'rw' => '003'],
            ['name' => 'Mhd Afrizon S', 'email' => 'afrizonzon914@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => null, 'note' => 'RW 002'],
            ['name' => 'Doni Sutrana', 'email' => 'donisutrana36@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '003'],
            ['name' => 'Imam Edi Raharjo', 'email' => 'zakiyahnurul536@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => null],
            ['name' => 'Agusmar', 'email' => 'agusmar780@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '001', 'rw' => '001'],
            ['name' => 'Suharno', 'email' => 'suharno6622@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '002', 'rw' => '001'],
            ['name' => 'Muhlasin', 'email' => 'mukhlasin513@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '003', 'rw' => '002'],
            ['name' => 'Lilik Masruroh', 'email' => 'lilikmasrura@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '004'],
            ['name' => 'Zulkarnain', 'email' => 'jariszul24@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '001'],
            ['name' => 'Sukarno', 'email' => 'rtnano354@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '004'],
            ['name' => 'Jhon Masgon Saragih', 'email' => 'rtjhonsaragih@gmail.com', 'kelurahan' => $kelTanjungPermai, 'rt' => '002', 'rw' => '002'],
        ];

        foreach ($petugas as $p) {
            // Cari ID RT berdasarkan data yang diberikan
            $rtRwId = null;
            if (isset($p['rt']) && $p['rt']) {
                $rw = $p['rw'] ?? '001';
                $rtRw = RtRw::where('kelurahan_id', $p['kelurahan']->id)
                    ->where('rt', str_pad($p['rt'], 3, '0', STR_PAD_LEFT))
                    ->where('rw', str_pad($rw, 3, '0', STR_PAD_LEFT))
                    ->first();
                if ($rtRw) {
                    $rtRwId = $rtRw->id;
                }
            }

            User::firstOrCreate(
                ['email' => $p['email']],
                [
                    'name' => $p['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'petugas',
                    'kelurahan_id' => $p['kelurahan']->id,
                    'rt_rw_id' => $rtRwId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info('Seeder berhasil dijalankan!');
        $this->command->info('Total Admin: ' . count($admins));
        $this->command->info('Total Supervisor: ' . count($supervisors));
        $this->command->info('Total Petugas: ' . count($petugas));
    }
}