<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pelanggaran;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth; 

class ViolationController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();

        // Ambil kendaraan milik mahasiswa
        $kendaraanIds = Kendaraan::query()
            ->where('user_id', $userId)
            ->pluck('id');

        $platList = Kendaraan::query()
            ->where('user_id', $userId)
            ->pluck('plat_no');

        $violations = Pelanggaran::query()
            ->with(['kendaraan', 'creator'])
            ->where(function ($q) use ($kendaraanIds, $platList) {
                // prior: by kendaraan_id
                if ($kendaraanIds->isNotEmpty()) {
                    $q->whereIn('kendaraan_id', $kendaraanIds);
                }

                // fallback: plat_no match kendaraan mahasiswa (untuk kasus kendaraan_id null)
                if ($platList->isNotEmpty()) {
                    $q->orWhereIn('plat_no', $platList);
                }
            })
            ->latest()
            ->paginate(20);

        return view('mahasiswa.violations.index', compact('violations'));
    }
}
