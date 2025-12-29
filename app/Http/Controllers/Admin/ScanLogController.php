<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParkingRecord;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScanLogController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status'); // ACTIVE / DONE
        $platNo = $request->query('plat_no'); // like

        $query = ParkingRecord::query()
            ->with(['kendaraan', 'scanner']) // butuh relasi di model ParkingRecord (lihat catatan bawah)
            ->latest('jam_masuk');

        if ($status) {
            $query->where('status', $status);
        }

        if ($platNo) {
            $query->where('plat_snapshot', 'like', '%' . $platNo . '%');
            // Kalau kamu lebih prefer join kendaraans, boleh ganti ke relasi kendaraan.
        }

        $records = $query->paginate(20)->withQueryString();

        return view('admin.scan_logs.index', compact('records', 'status', 'platNo'));
    }
}
