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
        // ADMIN BPS
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
        // SUPERVISOR
        // ===========================================
        $supervisors = [
            // Teluk Lobam
            ['name' => 'Alex Triyono', 'email' => 'alexferguson183@gmail.com', 'kelurahan' => $kelTelukLobam],
            ['name' => 'Fuat Susanto', 'email' => 'susantofuat@gmail.com', 'kelurahan' => $kelTelukLobam],
            // Tanjung Permai
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
        // PETUGAS (SEMUA)
        // ===========================================
        
        // Teluk Lobam
        $petugasTelukLobam = [
            ['name' => 'Muhammad Rauf Amrullah', 'email' => 'rauf.amrullah1@gmail.com'],
            ['name' => 'Bambang Supriyadi', 'email' => 'bambangsupriyadi1221@gmail.com'],
            ['name' => 'M. Ismeth Sani', 'email' => 'tugaskls12xpa@gmail.com'],
            ['name' => 'Dhea Amelia Safitri', 'email' => 'meliasftr285@gmail.com'],
            ['name' => 'Nadwi Kamelia', 'email' => 'nadwikamelia77@gmail.com'],
            ['name' => 'Baqiyyaa Kharismatul Latiifah', 'email' => 'baqiyyaaklatiifah28@gmail.com'],
            ['name' => 'Faradilla Aisyahfitri', 'email' => 'faradilla.aisyahfitri20@gmail.com'],
            ['name' => 'Salsabila', 'email' => 'a2732845@gmail.com'],
            ['name' => 'Ahmad Fajar Supriyanto', 'email' => 'ahmadfajarsupriyanto@gmail.com'],
            ['name' => 'Muhammad Zacky Brianno', 'email' => 'zackybrian92@gmail.com'],
            ['name' => 'Syarifudin Ahmad Jamil Rambe', 'email' => 'anggamad63@gmail.com'],
            ['name' => 'Katty Talsia Ong', 'email' => 'kattytalsia03@gmail.com'],
            // Ketua RT/RW Teluk Lobam
            ['name' => 'Purwanto', 'email' => 'purwantopower1975@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Ahmad Rizal Nasution', 'email' => 'ahmadrizalnasution664@gmail.com', 'note' => 'Ketua RW 007'],
            ['name' => 'Rustamaji', 'email' => 'rustamajisukses@gmail.com', 'note' => 'Ketua RW 001'],
            ['name' => 'Sukur', 'email' => 'sukurtiens@gmail.com', 'rt' => '001', 'rw' => '006'],
            ['name' => 'Buyung Azril', 'email' => 'buyungn508@gmail.com', 'note' => 'Ketua RW 002'],
            ['name' => 'Neldawati', 'email' => 'neldaw941@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Anhar', 'email' => 'anhar201074@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Matsarip', 'email' => 'matsarip208@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Rohman', 'email' => 'aarohman1969@gmail.com', 'rt' => '002', 'rw' => '001'],
        ];

        // Tanjung Permai
        $petugasTanjungPermai = [
            ['name' => 'Budianto', 'email' => 'budianto.permai@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Baharuzzaman', 'email' => 'zaman.lobam@gmail.com', 'rt' => '004', 'rw' => '002'],
            ['name' => 'Legiono', 'email' => 'legiono0207@gmail.com', 'note' => 'Ketua RW 003'],
            ['name' => 'Usman', 'email' => 'usm963459@gmail.com', 'rt' => '003', 'rw' => '003'],
            ['name' => 'Alfidra Zanades', 'email' => 'alfidrazanades@gmail.com', 'rt' => '005', 'rw' => '003'],
            ['name' => 'Mhd Afrizon S', 'email' => 'afrizonzon914@gmail.com', 'note' => 'RW 002'],
            ['name' => 'Doni Sutrana', 'email' => 'donisutrana36@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Imam Edi Raharjo', 'email' => 'zakiyahnurul536@gmail.com'],
            ['name' => 'Agusmar', 'email' => 'agusmar780@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Suharno', 'email' => 'suharno6622@gmail.com', 'rt' => '002', 'rw' => '001'],
            ['name' => 'Muhlasin', 'email' => 'mukhlasin513@gmail.com', 'rt' => '003', 'rw' => '002'],
            ['name' => 'Lilik Masruroh', 'email' => 'lilikmasrura@gmail.com', 'rt' => '004', 'rw' => '001'],
            ['name' => 'Zulkarnain', 'email' => 'jariszul24@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Sukarno', 'email' => 'rtnano354@gmail.com', 'rt' => '004', 'rw' => '001'],
            ['name' => 'Jhon Masgon Saragih', 'email' => 'rtjhonsaragih@gmail.com', 'rt' => '002', 'rw' => '002'],
            ['name' => 'Suwarni', 'email' => 'sajasuwarni172@gmail.com', 'rt' => '004', 'rw' => '001'],
        ];

        // Tanjung Uban Kota
        $petugasTanjungUban = [
            // Agen Pojok & Mahasiswa
            ['name' => 'Rendy Syahputra', 'email' => 'rendygufasyahputra@gmail.com'],
            ['name' => 'Giska Fitriani', 'email' => 'giskafitriani10@gmail.com'],
            // Ketua RT/RW Tanjung Uban
            ['name' => 'Eddy Soesanto', 'email' => 'esoesanto16@gmail.com', 'note' => 'Ketua RW 03'],
            ['name' => 'Hidayat', 'email' => 'hidayat65709@gmail.com', 'note' => 'Ketua RW 01'],
            ['name' => 'Rachmad Sanusi', 'email' => 'sanusi.rachmad.08@gmail.com', 'rt' => '001', 'rw' => '007'],
            ['name' => 'Anjas Asmara', 'email' => 'anjasasmara2299@gmail.com', 'rt' => '004', 'rw' => '001'],
            ['name' => 'Elvira Andriani', 'email' => 'elvirandriani@gmail.com', 'rt' => '002', 'rw' => '003'],
            ['name' => 'Eko Sukarelawanto', 'email' => 'ekosukarelawanto@gmail.com', 'note' => 'Ketua RW 09'],
            ['name' => 'Rahimah', 'email' => 'jaluaqsa124@gmail.com', 'rt' => '004', 'rw' => '002'],
            ['name' => 'Acin', 'email' => 'ekinsura2017@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Defrizal', 'email' => 'defrizal5373@gmail.com', 'rt' => '001', 'rw' => '005'],
            ['name' => 'Muhammad Daud', 'email' => 'virahardapuspita3390@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Suhartoyo', 'email' => 'suhartoyo1511@gmail.com', 'rt' => '002', 'rw' => '002'],
            ['name' => 'Rudi Optiadi', 'email' => 'optiadirudi@gmail.com', 'note' => 'Ketua RW 004'],
            ['name' => 'Yudi Arfiandi', 'email' => 'wwawanet@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Hasmiati', 'email' => 'atik85496@gmail.com', 'rt' => '001', 'rw' => '004'],
            ['name' => 'Kusmahandi', 'email' => 'kusmahandi@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Muhammad Rustam', 'email' => 'pulaubintan132@gmail.com', 'rt' => '004', 'rw' => '004'],
            ['name' => 'Ernawati', 'email' => 'ernaw15091974@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Taufik Ali Akbar', 'email' => 'taufik.akbar.1977@gmail.com', 'rt' => '002', 'rw' => '001'],
            ['name' => 'Mardi Siswoyo', 'email' => 'siswoyomardi46@gmail.com', 'rt' => '002', 'rw' => '004'],
            ['name' => 'Jumiati', 'email' => 'jumiatibeny@gmail.com', 'rt' => '002', 'rw' => '007'],
            ['name' => 'Desmawati Suriani Simanjuntak', 'email' => 'echsanm6@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Syafruddin', 'email' => 'syafabie555@gmail.com', 'note' => 'RW 02'],
            ['name' => 'Jufri', 'email' => 'jufri0301@gmail.com', 'note' => 'RW'],
            ['name' => 'Agus Mulyadi', 'email' => 'agusmulyad289@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Nur Soleman', 'email' => 'mancho2574@gmail.com', 'rt' => '001', 'rw' => '001'],
            ['name' => 'Abdul Rahman', 'email' => 'aabdulrahman0272@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Suhatno', 'email' => 's2884435@gmail.com', 'rt' => '002', 'rw' => '009'],
            ['name' => 'Tedi Seno Putra', 'email' => 'putrasenotedi@gmail.com', 'rt' => '003', 'rw' => '001'],
            ['name' => 'Fadly', 'email' => 'judexs.fadly@gmail.com', 'rt' => '002', 'rw' => '001'],
        ];

        // Fungsi helper untuk mencari RT RW
        function getRtRwId($kelurahan, $rt, $rw = '001') {
            if (!$rt) return null;
            $rtRw = RtRw::where('kelurahan_id', $kelurahan->id)
                ->where('rt', str_pad($rt, 3, '0', STR_PAD_LEFT))
                ->where('rw', str_pad($rw, 3, '0', STR_PAD_LEFT))
                ->first();
            return $rtRw ? $rtRw->id : null;
        }

        // Insert Teluk Lobam
        foreach ($petugasTelukLobam as $p) {
            $rtRwId = isset($p['rt']) ? getRtRwId($kelTelukLobam, $p['rt'], $p['rw'] ?? '001') : null;
            User::firstOrCreate(
                ['email' => $p['email']],
                [
                    'name' => $p['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'petugas',
                    'kelurahan_id' => $kelTelukLobam->id,
                    'rt_rw_id' => $rtRwId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Insert Tanjung Permai
        foreach ($petugasTanjungPermai as $p) {
            $rtRwId = isset($p['rt']) ? getRtRwId($kelTanjungPermai, $p['rt'], $p['rw'] ?? '001') : null;
            User::firstOrCreate(
                ['email' => $p['email']],
                [
                    'name' => $p['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'petugas',
                    'kelurahan_id' => $kelTanjungPermai->id,
                    'rt_rw_id' => $rtRwId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Insert Tanjung Uban
        foreach ($petugasTanjungUban as $p) {
            $rtRwId = isset($p['rt']) ? getRtRwId($kelTanjungUban, $p['rt'], $p['rw'] ?? '001') : null;
            User::firstOrCreate(
                ['email' => $p['email']],
                [
                    'name' => $p['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'petugas',
                    'kelurahan_id' => $kelTanjungUban->id,
                    'rt_rw_id' => $rtRwId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info('Seeder berhasil dijalankan!');
        $this->command->info('Total Admin: ' . count($admins));
        $this->command->info('Total Supervisor: ' . count($supervisors));
        $this->command->info('Total Petugas Teluk Lobam: ' . count($petugasTelukLobam));
        $this->command->info('Total Petugas Tanjung Permai: ' . count($petugasTanjungPermai));
        $this->command->info('Total Petugas Tanjung Uban: ' . count($petugasTanjungUban));
    }
}