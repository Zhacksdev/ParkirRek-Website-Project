<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreScanRequest;
use App\Models\Kendaraan;
use App\Models\ParkingRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ScanController extends Controller
{
    public function index(): View
    {
        return view('admin.scan.index');
    }

    public function scanMasuk(StoreScanRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Guard action biar endpoint gak disalahgunakan
        abort_unless($data['action'] === 'masuk', 422, 'Action tidak sesuai endpoint.');

        $kendaraan = Kendaraan::query()
            ->where('qr_token', $data['qr_token'])
            ->first();

        if (!$kendaraan) {
            return back()->withErrors(['qr_token' => 'Kendaraan tidak ditemukan untuk QR token ini.'])->withInput();
        }

        $adminId = $request->user()->id;

        DB::transaction(function () use ($kendaraan, $adminId) {
            ParkingRecord::create([
                'kendaraan_id'   => $kendaraan->id,
                'scanned_by'     => $adminId,
                'jam_masuk'      => now(),
                'jam_keluar'     => null,
                'plat_snapshot'  => $kendaraan->plat_no,
                'stnk_snapshot'  => $kendaraan->stnk_number,
                'status'         => 'ACTIVE',
            ]);
        });

        return redirect()
            ->route('admin.scan.index')
            ->with('success', "Scan MASUK berhasil untuk plat {$kendaraan->plat_no}.");
    }

    public function scanKeluar(StoreScanRequest $request): RedirectResponse
    {
        $data = $request->validated();

        abort_unless($data['action'] === 'keluar', 422, 'Action tidak sesuai endpoint.');

        $kendaraan = Kendaraan::query()
            ->where('qr_token', $data['qr_token'])
            ->first();

        if (!$kendaraan) {
            return back()->withErrors(['qr_token' => 'Kendaraan tidak ditemukan untuk QR token ini.'])->withInput();
        }

        $adminId = $request->user()->id;

        $updated = DB::transaction(function () use ($kendaraan, $adminId) {
            // Ambil record ACTIVE terakhir untuk kendaraan tsb yang belum keluar
            $record = ParkingRecord::query()
                ->where('kendaraan_id', $kendaraan->id)
                ->where('status', 'ACTIVE')
                ->whereNull('jam_keluar')
                ->orderByDesc('jam_masuk')
                ->lockForUpdate()
                ->first();

            if (!$record) {
                return false;
            }

            $record->update([
                'jam_keluar' => now(),
                'status'     => 'DONE',
                // scanned_by tetap admin yang scan keluar -> set ulang
                'scanned_by' => $adminId,
            ]);

            return true;
        });

        if (!$updated) {
            return back()->withErrors([
                'qr_token' => "Tidak ada parking record ACTIVE untuk plat {$kendaraan->plat_no} (mungkin belum scan masuk atau sudah keluar)."
            ])->withInput();
        }

        return redirect()
            ->route('admin.scan.index')
            ->with('success', "Scan KELUAR berhasil untuk plat {$kendaraan->plat_no}.");
    }
}
