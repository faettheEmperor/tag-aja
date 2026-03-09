<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelurahan;
use App\Models\RtRw;

class KelurahanRtSeeder extends Seeder
{
    public function run(): void
    {
        // ===========================================
        // 1. KELURAHAN TANJUNG UBAN KOTA
        // ===========================================
        $tanjungUban = Kelurahan::create([
            'nama' => 'TANJUNG UBAN KOTA',
            'kecamatan' => 'BINTAN UTARA',
            'kode_prov' => '21',
            'kode_kab' => '02',
            'kode_kec' => '050',
            'kode_desa' => '005'
        ]);
        
        // DATA RT/RW TANJUNG UBAN KOTA (32 data)
        $rtDataTanjungUban = [
            ['rt' => '001', 'rw' => '001', 'kode_sls' => '0001'],
            ['rt' => '002', 'rw' => '001', 'kode_sls' => '0002'],
            ['rt' => '003', 'rw' => '001', 'kode_sls' => '0003'],
            ['rt' => '004', 'rw' => '001', 'kode_sls' => '0004'],
            ['rt' => '001', 'rw' => '002', 'kode_sls' => '0005'],
            ['rt' => '002', 'rw' => '002', 'kode_sls' => '0006'],
            ['rt' => '003', 'rw' => '002', 'kode_sls' => '0007'],
            ['rt' => '004', 'rw' => '002', 'kode_sls' => '0008'],
            ['rt' => '001', 'rw' => '003', 'kode_sls' => '0009'],
            ['rt' => '002', 'rw' => '003', 'kode_sls' => '0010'],
            ['rt' => '003', 'rw' => '003', 'kode_sls' => '0011'],
            ['rt' => '001', 'rw' => '004', 'kode_sls' => '0012'],
            ['rt' => '002', 'rw' => '004', 'kode_sls' => '0013'],
            ['rt' => '003', 'rw' => '004', 'kode_sls' => '0014'],
            ['rt' => '004', 'rw' => '004', 'kode_sls' => '0015'],
            ['rt' => '001', 'rw' => '005', 'kode_sls' => '0016'],
            ['rt' => '002', 'rw' => '005', 'kode_sls' => '0017'],
            ['rt' => '003', 'rw' => '005', 'kode_sls' => '0018'],
            ['rt' => '001', 'rw' => '006', 'kode_sls' => '0019'],
            ['rt' => '002', 'rw' => '006', 'kode_sls' => '0020'],
            ['rt' => '003', 'rw' => '006', 'kode_sls' => '0021'],
            ['rt' => '001', 'rw' => '007', 'kode_sls' => '0022'],
            ['rt' => '002', 'rw' => '007', 'kode_sls' => '0023'],
            ['rt' => '003', 'rw' => '007', 'kode_sls' => '0024'],
            ['rt' => '001', 'rw' => '008', 'kode_sls' => '0025'],
            ['rt' => '002', 'rw' => '008', 'kode_sls' => '0026'],
            ['rt' => '003', 'rw' => '008', 'kode_sls' => '0027'],
            ['rt' => '001', 'rw' => '009', 'kode_sls' => '0028'],
            ['rt' => '002', 'rw' => '009', 'kode_sls' => '0029'],
            ['rt' => '003', 'rw' => '009', 'kode_sls' => '0030'],
            ['rt' => '004', 'rw' => '009', 'kode_sls' => '0031'],
            ['rt' => 'PULAU BUAU', 'rw' => 'NON SLS', 'kode_sls' => '2001'], // Non SLS
        ];
        
        foreach ($rtDataTanjungUban as $rt) {
            RtRw::create([
                'kelurahan_id' => $tanjungUban->id,
                'rt' => $rt['rt'],
                'rw' => $rt['rw'],
                'kode_sls' => $rt['kode_sls']
            ]);
        }
        
        // ===========================================
        // 2. KELURAHAN TELUK LOBAM
        // ===========================================
        $telukLobam = Kelurahan::create([
            'nama' => 'TELUK LOBAM',
            'kecamatan' => 'SERI KUALA LOBAM',
            'kode_prov' => '21',
            'kode_kab' => '02',
            'kode_kec' => '052',
            'kode_desa' => '004'
        ]);
        
        // DATA RT/RW TELUK LOBAM (12 data)
        $rtDataTelukLobam = [
            ['rt' => '001', 'rw' => '001', 'kode_sls' => '0001'],
            ['rt' => '002', 'rw' => '001', 'kode_sls' => '0002'],
            ['rt' => '003', 'rw' => '001', 'kode_sls' => '0003'],
            ['rt' => '001', 'rw' => '002', 'kode_sls' => '0004'],
            ['rt' => '002', 'rw' => '002', 'kode_sls' => '0024'],
            ['rt' => '001', 'rw' => '006', 'kode_sls' => '0018'],
            ['rt' => '002', 'rw' => '006', 'kode_sls' => '0019'],
            ['rt' => '003', 'rw' => '006', 'kode_sls' => '0020'],
            ['rt' => '001', 'rw' => '007', 'kode_sls' => '0021'],
            ['rt' => '002', 'rw' => '007', 'kode_sls' => '0022'],
            ['rt' => '003', 'rw' => '007', 'kode_sls' => '0023'],
            ['rt' => '004', 'rw' => '007', 'kode_sls' => '0026'],
        ];
        
        foreach ($rtDataTelukLobam as $rt) {
            RtRw::create([
                'kelurahan_id' => $telukLobam->id,
                'rt' => $rt['rt'],
                'rw' => $rt['rw'],
                'kode_sls' => $rt['kode_sls']
            ]);
        }
        
        // ===========================================
        // 3. KELURAHAN TANJUNG PERMAI
        // ===========================================
        $tanjungPermai = Kelurahan::create([
            'nama' => 'TANJUNG PERMAI',
            'kecamatan' => 'SERI KUALA LOBAM',
            'kode_prov' => '21',
            'kode_kab' => '02',
            'kode_kec' => '052',
            'kode_desa' => '005'
        ]);
        
        // DATA RT/RW TANJUNG PERMAI (18 data)
        $rtDataTanjungPermai = [
            ['rt' => '001', 'rw' => '001', 'kode_sls' => '0001'],
            ['rt' => '002', 'rw' => '001', 'kode_sls' => '0002'],
            ['rt' => '003', 'rw' => '001', 'kode_sls' => '0003'],
            ['rt' => '004', 'rw' => '001', 'kode_sls' => '0004'],
            ['rt' => '001', 'rw' => '002', 'kode_sls' => '0007'],
            ['rt' => '002', 'rw' => '002', 'kode_sls' => '0008'],
            ['rt' => '003', 'rw' => '002', 'kode_sls' => '0009'],
            ['rt' => '004', 'rw' => '002', 'kode_sls' => '0010'],
            ['rt' => '001', 'rw' => '003', 'kode_sls' => '0011'],
            ['rt' => '002', 'rw' => '003', 'kode_sls' => '0012'],
            ['rt' => '003', 'rw' => '003', 'kode_sls' => '0013'],
            ['rt' => '004', 'rw' => '003', 'kode_sls' => '0014'],
            ['rt' => '005', 'rw' => '003', 'kode_sls' => '0019'],
            ['rt' => '001', 'rw' => '004', 'kode_sls' => '0016'],
            ['rt' => '002', 'rw' => '004', 'kode_sls' => '0017'],
            ['rt' => '003', 'rw' => '004', 'kode_sls' => '0018'],
            ['rt' => '004', 'rw' => '004', 'kode_sls' => '0015'],
        ];
        
        foreach ($rtDataTanjungPermai as $rt) {
            RtRw::create([
                'kelurahan_id' => $tanjungPermai->id,
                'rt' => $rt['rt'],
                'rw' => $rt['rw'],
                'kode_sls' => $rt['kode_sls']
            ]);
        }
        
        $this->command->info('Data kelurahan dan RT/RW berhasil dibuat!');
        $totalRt = count($rtDataTanjungUban) + count($rtDataTelukLobam) + count($rtDataTanjungPermai);
        $this->command->info('Total RT/RW: ' . $totalRt);
    }
}