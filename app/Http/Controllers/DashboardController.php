<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Kelurahan;
use App\Models\RtRw;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // FILTER BERDASARKAN ROLE
        $keluargaQuery = Family::query();
        $anggotaQuery = FamilyMember::query();
        
        if ($user->role === 'petugas') {
            $keluargaQuery->where('created_by', $user->id);
            $anggotaQuery->whereHas('family', fn($q) => $q->where('created_by', $user->id));
        } elseif ($user->role === 'supervisor') {
            $keluargaQuery->where('kelurahan_id', $user->kelurahan_id);
            $anggotaQuery->whereHas('family', fn($q) => $q->where('kelurahan_id', $user->kelurahan_id));
        }
        
        // STATISTIK UMUM
        $totalKeluarga = $keluargaQuery->count();
        $totalAnggota = $anggotaQuery->count();
        $totalKelurahan = Kelurahan::count();
        $totalRtRw = RtRw::count();
        
        // STATISTIK BANTUAN (dengan filter role)
        $bpntCount = (clone $keluargaQuery)->where('bpnt', 'Ya')->count();
        $pkhCount = (clone $keluargaQuery)->where('pkh', 'Ya')->count();
        $bltElderlyCount = (clone $keluargaQuery)->where('blt_elderly', 'Ya')->count();
        $bltVillageCount = (clone $keluargaQuery)->where('blt_village', 'Ya')->count();
        
        // PERSENTASE
        $bpntPercentage = $totalKeluarga > 0 ? round(($bpntCount / $totalKeluarga) * 100) : 0;
        $pkhPercentage = $totalKeluarga > 0 ? round(($pkhCount / $totalKeluarga) * 100) : 0;
        $bltElderlyPercentage = $totalKeluarga > 0 ? round(($bltElderlyCount / $totalKeluarga) * 100) : 0;
        $bltVillagePercentage = $totalKeluarga > 0 ? round(($bltVillageCount / $totalKeluarga) * 100) : 0;
        
        // DATA TERBARU
        $latestFamilies = (clone $keluargaQuery)->with(['kelurahan', 'rtRw', 'creator'])
                          ->latest()
                          ->take(5)
                          ->get();
                          
        $latestMembers = (clone $anggotaQuery)->with(['family.kelurahan'])
                          ->latest()
                          ->take(5)
                          ->get();
        
        return view('dashboard', compact(
            'totalKeluarga',
            'totalAnggota',
            'totalKelurahan',
            'totalRtRw',
            'bpntCount',
            'pkhCount',
            'bltElderlyCount',
            'bltVillageCount',
            'bpntPercentage',
            'pkhPercentage',
            'bltElderlyPercentage',
            'bltVillagePercentage',
            'latestFamilies',
            'latestMembers'
        ));
    }
}