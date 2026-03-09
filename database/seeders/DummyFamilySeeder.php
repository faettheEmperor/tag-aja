<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Kelurahan;
use App\Models\RtRw;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DummyFamilySeeder extends Seeder
{
    public function run(): void
    {
        // AMBIL DATA KELURAHAN
        $kelTanjungUban = Kelurahan::where('nama', 'TANJUNG UBAN KOTA')->first();
        $kelTelukLobam = Kelurahan::where('nama', 'TELUK LOBAM')->first();
        $kelTanjungPermai = Kelurahan::where('nama', 'TANJUNG PERMAI')->first();
        
        // AMBIL DATA RT RW (RANDOM)
        $rtTanjungUban = RtRw::where('kelurahan_id', $kelTanjungUban->id)->inRandomOrder()->get();
        $rtTelukLobam = RtRw::where('kelurahan_id', $kelTelukLobam->id)->inRandomOrder()->get();
        $rtTanjungPermai = RtRw::where('kelurahan_id', $kelTanjungPermai->id)->inRandomOrder()->get();
        
        // ===========================================
        // 1. KELURAHAN TANJUNG UBAN KOTA (5 KELUARGA)
        // ===========================================
        $this->createFamiliesForKelurahan($kelTanjungUban, $rtTanjungUban, 1, 5);
        
        // ===========================================
        // 2. KELURAHAN TELUK LOBAM (5 KELUARGA)
        // ===========================================
        $this->createFamiliesForKelurahan($kelTelukLobam, $rtTelukLobam, 6, 10);
        
        // ===========================================
        // 3. KELURAHAN TANJUNG PERMAI (5 KELUARGA)
        // ===========================================
        $this->createFamiliesForKelurahan($kelTanjungPermai, $rtTanjungPermai, 11, 15);
        
        $this->command->info('15 keluarga berhasil dibuat!');
    }
    
    private function createFamiliesForKelurahan($kelurahan, $rtRwList, $startId, $count)
    {
        $kepalaData = [
            // KELUARGA 1
            [
                'kk' => '217201' . rand(100,999) . '0001',
                'kepala' => ['name' => 'Ahmad Syarif', 'nik' => '217201' . rand(100000,999999) . '0001', 'gender' => 'Laki-laki'],
                'istri' => ['name' => 'Siti Maryam', 'nik' => '217201' . rand(100000,999999) . '0101', 'gender' => 'Perempuan'],
                'anak' => [
                    ['name' => 'Muhammad Rizki', 'nik' => '217201' . rand(100000,999999) . '0201', 'gender' => 'Laki-laki', 'age' => 12],
                    ['name' => 'Aisyah Putri', 'nik' => '217201' . rand(100000,999999) . '0202', 'gender' => 'Perempuan', 'age' => 8],
                ]
            ],
            // KELUARGA 2
            [
                'kk' => '217201' . rand(100,999) . '0002',
                'kepala' => ['name' => 'Budi Santoso', 'nik' => '217201' . rand(100000,999999) . '0002', 'gender' => 'Laki-laki'],
                'istri' => ['name' => 'Dewi Lestari', 'nik' => '217201' . rand(100000,999999) . '0102', 'gender' => 'Perempuan'],
                'anak' => [
                    ['name' => 'Eko Prasetyo', 'nik' => '217201' . rand(100000,999999) . '0203', 'gender' => 'Laki-laki', 'age' => 15],
                ]
            ],
            // KELUARGA 3
            [
                'kk' => '217201' . rand(100,999) . '0003',
                'kepala' => ['name' => 'Rina Wati', 'nik' => '217201' . rand(100000,999999) . '0003', 'gender' => 'Perempuan'], // single parent
                'anak' => [
                    ['name' => 'Joko Susilo', 'nik' => '217201' . rand(100000,999999) . '0204', 'gender' => 'Laki-laki', 'age' => 10],
                    ['name' => 'Rini Susanti', 'nik' => '217201' . rand(100000,999999) . '0205', 'gender' => 'Perempuan', 'age' => 6],
                    ['name' => 'Bambang', 'nik' => '217201' . rand(100000,999999) . '0206', 'gender' => 'Laki-laki', 'age' => 3],
                ]
            ],
            // KELUARGA 4
            [
                'kk' => '217201' . rand(100,999) . '0004',
                'kepala' => ['name' => 'Hendra Wijaya', 'nik' => '217201' . rand(100000,999999) . '0004', 'gender' => 'Laki-laki'],
                'istri' => ['name' => 'Linda Kusuma', 'nik' => '217201' . rand(100000,999999) . '0104', 'gender' => 'Perempuan'],
                'anak' => [
                    ['name' => 'Kevin Wijaya', 'nik' => '217201' . rand(100000,999999) . '0207', 'gender' => 'Laki-laki', 'age' => 14],
                    ['name' => 'Jessica Wijaya', 'nik' => '217201' . rand(100000,999999) . '0208', 'gender' => 'Perempuan', 'age' => 11],
                    ['name' => 'Steven Wijaya', 'nik' => '217201' . rand(100000,999999) . '0209', 'gender' => 'Laki-laki', 'age' => 5],
                ]
            ],
            // KELUARGA 5
            [
                'kk' => '217201' . rand(100,999) . '0005',
                'kepala' => ['name' => 'Maman Suherman', 'nik' => '217201' . rand(100000,999999) . '0005', 'gender' => 'Laki-laki'],
                'istri' => ['name' => 'Tati Sumiati', 'nik' => '217201' . rand(100000,999999) . '0105', 'gender' => 'Perempuan'],
                'anak' => [
                    ['name' => 'Asep Kurniawan', 'nik' => '217201' . rand(100000,999999) . '0210', 'gender' => 'Laki-laki', 'age' => 22],
                ]
            ],
        ];
        
        for ($i = 0; $i < $count; $i++) {
            $data = $kepalaData[$i % 5]; // Rotate data
            $rt = $rtRwList[$i % count($rtRwList)]; // Ambil RT bergantian
            
            // HITUNG JUMLAH ANGGOTA
            $jumlahAnggota = 1; // kepala
            if (isset($data['istri'])) $jumlahAnggota++;
            $jumlahAnggota += count($data['anak']);
            
            // BUAT KELUARGA
            $family = Family::create([
                'number_kk' => $data['kk'],
                'ownership_kk' => rand(0,1) ? 'KK' : 'Non KK',
                'number_of_family_member' => $jumlahAnggota,
                'kelurahan_id' => $kelurahan->id,
                'rt_rw_id' => $rt->id,
                'ktp_address' => 'Jl. Contoh No. ' . rand(1,100),
                'city_address' => 'Kota Contoh',
                'latitude' => 1.1 . rand(100,999),
                'longitude' => 104.1 . rand(100,999),
                'bpnt' => rand(0,1) ? 'Ya' : 'Tidak',
                'pkh' => rand(0,1) ? 'Ya' : 'Tidak',
                'blt_elderly' => rand(0,1) ? 'Ya' : 'Tidak',
                'blt_village' => rand(0,1) ? 'Ya' : 'Tidak',
                'other_assistance' => 'Tidak',
                'created_by' => 1, // Admin pertama
            ]);
            
            // KEPALA KELUARGA
            FamilyMember::create([
                'family_id' => $family->id,
                'full_name' => $data['kepala']['name'],
                'nik' => $data['kepala']['nik'],
                'status_in_family' => 'Kepala Keluarga',
                'place_of_birth' => 'Tanjungpinang',
                'date_of_birth' => Carbon::now()->subYears(rand(30,50))->format('Y-m-d'),
                'gender' => $data['kepala']['gender'],
                'marital_status' => isset($data['istri']) ? 'Kawin' : 'Cerai mati',
                'ethnic' => ['Melayu', 'Jawa', 'Sunda', 'Batak'][rand(0,3)],
                'highest_education_level' => ['SMA/MA/SMLB/PAKET C', 'S1/Diploma IV'][rand(0,1)],
                'highest_education_certificate' => ['SMA/MA/SMLB/PAKET C', 'S1/Diploma IV'][rand(0,1)],
                'employment_status' => 'Bekerja',
                'employment_position' => 'Buruh/Karyawan/Pegawai Swasta',
                'main_occupation' => 'Karyawan',
                'health_insurance' => rand(0,1) ? 'BPJS Kesehatan PBI' : 'Tidak memiliki',
                'stunting' => 'Tidak',
                'disability' => 'Tidak',
            ]);
            
            // ISTRI (JIKA ADA)
            if (isset($data['istri'])) {
                FamilyMember::create([
                    'family_id' => $family->id,
                    'full_name' => $data['istri']['name'],
                    'nik' => $data['istri']['nik'],
                    'status_in_family' => 'Istri/Suami',
                    'place_of_birth' => 'Tanjungpinang',
                    'date_of_birth' => Carbon::now()->subYears(rand(25,45))->format('Y-m-d'),
                    'gender' => $data['istri']['gender'],
                    'marital_status' => 'Kawin',
                    'ethnic' => ['Melayu', 'Jawa', 'Sunda', 'Batak'][rand(0,3)],
                    'highest_education_level' => 'SMA/MA/SMLB/PAKET C',
                    'highest_education_certificate' => 'SMA/MA/SMLB/PAKET C',
                    'employment_status' => 'Mengurus Rumah Tangga',
                    'employment_position' => 'Pekerja tidak dibayar',
                    'main_occupation' => 'Ibu Rumah Tangga',
                    'health_insurance' => rand(0,1) ? 'BPJS Kesehatan PBI' : 'Tidak memiliki',
                    'stunting' => 'Tidak',
                    'disability' => 'Tidak',
                ]);
            }
            
            // ANAK-ANAK
            foreach ($data['anak'] as $anak) {
                FamilyMember::create([
                    'family_id' => $family->id,
                    'full_name' => $anak['name'],
                    'nik' => $anak['nik'],
                    'status_in_family' => 'Anak',
                    'place_of_birth' => 'Tanjungpinang',
                    'date_of_birth' => Carbon::now()->subYears($anak['age'])->format('Y-m-d'),
                    'gender' => $anak['gender'],
                    'marital_status' => 'Belum kawin',
                    'ethnic' => ['Melayu', 'Jawa', 'Sunda', 'Batak'][rand(0,3)],
                    'highest_education_level' => $anak['age'] > 15 ? 'SMA/MA/SMLB/PAKET C' : 'SD/MI/SDLB/PAKET A',
                    'highest_education_certificate' => $anak['age'] > 15 ? 'SMA/MA/SMLB/PAKET C' : 'SD/MI/SDLB/PAKET A',
                    'employment_status' => $anak['age'] > 15 ? 'Bekerja' : 'Sekolah',
                    'employment_position' => $anak['age'] > 15 ? 'Pekerja bebas (Freelance)' : 'Pekerja tidak dibayar',
                    'main_occupation' => $anak['age'] > 15 ? 'Freelancer' : 'Pelajar',
                    'health_insurance' => rand(0,1) ? 'BPJS Kesehatan PBI' : 'Tidak memiliki',
                    'stunting' => 'Tidak',
                    'disability' => 'Tidak',
                ]);
            }
        }
    }
}