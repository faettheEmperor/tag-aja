<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Illuminate\Support\Facades\Auth;

class FamilyMemberController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $query = FamilyMember::with(['family.kelurahan', 'family.rtRw', 'family.creator']);

        if ($user->role === 'petugas') {
            $query->whereHas('family', fn($q) => $q->where('created_by', $user->id));
        } elseif ($user->role === 'supervisor') {
            $query->whereHas('family', fn($q) => $q->where('kelurahan_id', $user->kelurahan_id));
        }
        // admin: tanpa filter

        $members = $query->get();
        return view('family-members.index', compact('members'));
    }

    // Di FamilyMemberController
    public function export()
    {
        $user = Auth::user();
        $query = FamilyMember::with(['family.kelurahan', 'family.rtRw', 'family.creator']);

        // FILTER BERDASARKAN ROLE
        if ($user->role === 'petugas') {
            $query->whereHas('family', fn($q) => $q->where('created_by', $user->id));
        } elseif ($user->role === 'supervisor') {
            $query->whereHas('family', fn($q) => $q->where('kelurahan_id', $user->kelurahan_id));
        }

        $members = $query->get();

        $filename = "data-anggota-keluarga-" . date('Y-m-d') . ".csv";
        $handle = fopen('php://temp', 'w+');

        // HEADER
        fputcsv($handle, [
            'Nama Lengkap',
            'NIK',
            'Status Keluarga',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Status Kawin',
            'Suku',
            'Pendidikan Tertinggi',
            'Ijazah Terakhir',
            'Status Kerja',
            'Pekerjaan Utama',
            'Jaminan Kesehatan',
            'Stunting',
            'Disabilitas',
            'RT/RW',
            'Kelurahan/Desa',
            'No. KK',
        ], ';');

        foreach ($members as $member) {
            fputcsv($handle, [
                '="' . $member->full_name . '"',
                '="' . $member->nik . '"',                    // NIK biar ga berubah
                '="' . $member->status_in_family . '"',
                '="' . $member->place_of_birth . '"',
                '="' . $member->date_of_birth . '"',
                '="' . $member->gender . '"',
                '="' . $member->marital_status . '"',
                '="' . $member->ethnic . '"',
                '="' . $member->highest_education_level . '"',
                '="' . $member->highest_education_certificate . '"',
                '="' . $member->employment_status . '"',
                '="' . $member->main_occupation . '"',
                '="' . $member->health_insurance . '"',
                '="' . $member->stunting . '"',
                '="' . $member->disability . '"',
                '="' . ($member->family->rtRw ? 'RT ' . $member->family->rtRw->rt . ' RW ' . $member->family->rtRw->rw : '-') . '"',
                '="' . ($member->family->kelurahan?->nama ?? '-') . '"',
                '="' . $member->family->number_kk . '"',
            ], ';');
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        $content = "\xEF\xBB\xBF" . $content;

        return response($content)
            ->header('Content-Type', 'text/csv; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
