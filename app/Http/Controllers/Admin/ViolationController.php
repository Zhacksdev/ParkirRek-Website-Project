<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreViolationRequest;
use App\Models\Kendaraan;
use App\Models\Pelanggaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ViolationController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status'); // optional: OPEN/CLOSED/etc
        $platNo = $request->query('plat_no'); // optional like

        $query = Pelanggaran::query()
            ->with(['kendaraan', 'creator'])
            ->latest();

        if ($status) {
            $query->where('status', $status);
        }

        if ($platNo) {
            $query->where('plat_no', 'like', '%' . $platNo . '%');
        }

        $violations = $query->paginate(20)->withQueryString();

        return view('admin.violations.index', compact('violations', 'status', 'platNo'));
    }

    public function create(): View
    {
        return view('admin.violations.create');
    }

    public function store(StoreViolationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $adminId = $request->user()->id;

        // cari kendaraan by plat_no (optional)
        $kendaraan = Kendaraan::query()
            ->where('plat_no', $data['plat_no'])
            ->first();

        // simpan foto ke storage/app/public/violations
        $photoPath = $request->file('foto')->store('violations', 'public');

        DB::transaction(function () use ($data, $adminId, $kendaraan, $photoPath) {
            Pelanggaran::create([
                'kendaraan_id'      => $kendaraan?->id,        // nullable
                'plat_no'           => $data['plat_no'],       // tetap disimpan
                'jenis_pelanggaran' => $data['jenis_pelanggaran'],
                'deskripsi'         => $data['deskripsi'] ?? null,
                'denda'             => $data['denda'] ?? null,
                'photo_path'        => $photoPath,
                'status'            => 'OPEN',                 // default OPEN
                'created_by'        => $adminId,
            ]);
        });

        return redirect()
            ->route('admin.violations.index')
            ->with('success', 'Pelanggaran berhasil dibuat.');
    }

    /**
     * PATCH /admin/violations/{pelanggaran}/status
     * payload: status=OPEN|CLOSED|... (sesuaikan enum kamu)
     */
    public function updateStatus(Request $request, Pelanggaran $pelanggaran): RedirectResponse
    {
        // Authorization (opsional karena sudah kena middleware role:admin)
        abort_unless(($request->user()->role ?? null) === 'admin', 403);

        $validated = $request->validate([
            'status' => ['required', 'string', 'max:20', Rule::in(['OPEN', 'CLOSED'])],
        ], [
            'status.in' => 'Status harus OPEN atau CLOSED.',
        ]);

        $pelanggaran->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Status pelanggaran berhasil diperbarui.');
    }
}
