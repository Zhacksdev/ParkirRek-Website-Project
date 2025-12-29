<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\ParkingRecord;
use App\Models\Pelanggaran;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today();

        // Summary cards
        $totalKendaraanTerdaftar = Kendaraan::query()->count();

        $totalSedangParkir = ParkingRecord::query()
            ->where('status', 'ACTIVE')
            ->count();

        $totalScanHariIni = ParkingRecord::query()
            ->whereDate('jam_masuk', $today)
            ->count();

        $totalPelanggaranOpen = Pelanggaran::query()
            ->where('status', 'OPEN')
            ->count();

        // Tabel: Kendaraan Sedang Parkir
        // - admin yang scan masuk (users.nama dari scanned_by)
        $kendaraanSedangParkir = ParkingRecord::query()
            ->where('status', 'ACTIVE')
            ->whereNull('jam_keluar')
            ->with([
                // asumsi relasi ParkingRecord::scanner() -> belongsTo(User::class,'scanned_by')
                'scanner:id,nama',
            ])
            ->orderByDesc('jam_masuk')
            ->limit(20) // bebas, biar tabel dashboard gak terlalu berat
            ->get([
                'id',
                'plat_snapshot',
                'stnk_snapshot',
                'jam_masuk',
                'scanned_by',
                'status',
            ]);

        // Tabel: Scan Terbaru (limit 10)
        $scanTerbaru = ParkingRecord::query()
            ->orderByDesc('jam_masuk')
            ->limit(10)
            ->get([
                'id',
                'plat_snapshot',
                'status',
                'jam_masuk',
                'jam_keluar',
            ]);

        // Tabel: Pelanggaran Terbaru (limit 10)
        $pelanggaranTerbaru = Pelanggaran::query()
            ->orderByDesc('created_at')
            ->limit(10)
            ->get([
                'id',
                'plat_no',
                'jenis_pelanggaran',
                'status',
                'denda',
                'created_at',
            ]);

        // Data dikirim ke view (admin/dashboard/index.blade.php)
        return view('admin.dashboard.index', [
            'summary' => [
                'total_kendaraan_terdaftar' => $totalKendaraanTerdaftar,
                'total_sedang_parkir'       => $totalSedangParkir,
                'total_scan_hari_ini'       => $totalScanHariIni,
                'total_pelanggaran_open'    => $totalPelanggaranOpen,
            ],
            'kendaraanSedangParkir' => $kendaraanSedangParkir,
            'scanTerbaru'           => $scanTerbaru,
            'pelanggaranTerbaru'    => $pelanggaranTerbaru,
            'today'                 => $today, // opsional untuk header view
        ]);
    }
}
