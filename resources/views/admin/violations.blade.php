@extends('layouts.admin')

@section('title', 'Violations')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Violation Management</h1>
            <p class="text-gray-500 text-sm mt-1">Track parking violations and fines.</p>
        </div>
        <button onclick="openModal()" class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium shadow-sm shadow-red-200">
            <i data-lucide="triangle-alert" class="w-4 h-4"></i> Report Violation
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div onclick="showStatDetails('active')" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between cursor-pointer hover:shadow-md transition-all hover:border-red-200 group">
            <div>
                <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider group-hover:text-red-600">Active Violations</p>
                <p class="text-2xl font-bold text-red-600 mt-1">5</p>
            </div>
            <div class="p-3 bg-red-50 text-red-600 rounded-lg group-hover:bg-red-100">
                <i data-lucide="ban" class="w-6 h-6"></i>
            </div>
        </div>

        <div onclick="showStatDetails('unpaid')" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between cursor-pointer hover:shadow-md transition-all hover:border-orange-200 group">
            <div>
                <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider group-hover:text-orange-600">Unpaid Fines</p>
                <p class="text-2xl font-bold text-orange-600 mt-1">Rp 150.000</p>
            </div>
            <div class="p-3 bg-orange-50 text-orange-600 rounded-lg group-hover:bg-orange-100">
                <i data-lucide="wallet" class="w-6 h-6"></i>
            </div>
        </div>

        <div onclick="showStatDetails('resolved')" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between cursor-pointer hover:shadow-md transition-all hover:border-green-200 group">
            <div>
                <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider group-hover:text-green-600">Resolved Today</p>
                <p class="text-2xl font-bold text-green-600 mt-1">2</p>
            </div>
            <div class="p-3 bg-green-50 text-green-600 rounded-lg group-hover:bg-green-100">
                <i data-lucide="check-check" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        <div class="p-4 border-b border-gray-200 bg-gray-50 flex flex-col lg:flex-row gap-4 justify-between items-center">
            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                <div class="relative w-full sm:w-64">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                    <input type="text" id="tableSearch" placeholder="Search Plate No..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-red-200 outline-none transition-all">
                </div>
            </div>

            <div class="flex gap-2 w-full lg:w-auto">
                <select id="filterStatus" onchange="filterTable()" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2 cursor-pointer">
                    <option value="">All Status</option>
                    <option value="Unpaid">Unpaid</option>
                    <option value="Paid">Paid</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-white text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">License Plate</th>
                        <th class="px-6 py-4">Violation Type</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Fine</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="violationTableBody">
                    <tr class="hover:bg-red-50/20 transition-colors group" data-status="Unpaid">
                        <td class="px-6 py-4 font-mono font-medium text-gray-500">#V-1024</td>
                        <td class="px-6 py-4 font-bold text-gray-900 group-hover:text-red-600 transition-colors">B 1234 XYZ</td>
                        <td class="px-6 py-4">Illegal Parking</td>
                        <td class="px-6 py-4">Oct 24, 10:00 AM</td>
                        <td class="px-6 py-4 font-medium text-gray-900">Rp 50.000</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold border border-red-200">Unpaid</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="alert('Mark as paid?')" class="text-gray-400 hover:text-green-600 p-2 rounded-lg transition-all" title="Mark Paid">
                                <i data-lucide="check-square" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors group" data-status="Paid">
                        <td class="px-6 py-4 font-mono font-medium text-gray-500">#V-1022</td>
                        <td class="px-6 py-4 font-bold text-gray-900">D 5541 ZZ</td>
                        <td class="px-6 py-4">No Ticket</td>
                        <td class="px-6 py-4">Oct 23, 02:30 PM</td>
                        <td class="px-6 py-4 font-medium text-gray-900">Rp 25.000</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold border border-green-200">Paid</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-300 cursor-not-allowed p-2" disabled>
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="violationModal" class="hidden fixed inset-0 bg-gray-900/60 z-50 flex items-center justify-center backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-[500px] max-w-[95%] transform transition-all scale-100 overflow-hidden m-4">
            <div class="bg-red-600 px-6 py-4 flex justify-between items-center">
                <div class="text-white">
                    <h3 class="text-lg font-bold">Report New Violation</h3>
                    <p class="text-red-100 text-xs mt-0.5">Issue a fine for rule breaking</p>
                </div>
                <button onclick="closeModal()" class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 p-1.5 rounded-full transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">License Plate</label>
                    <input type="text" placeholder="e.g. B 1234 ABC" class="w-full border border-gray-300 rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-red-500 uppercase">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Violation Type</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-red-500 cursor-pointer">
                        <option>Illegal Parking</option>
                        <option>Overnight without Permit</option>
                        <option>No Ticket / Lost Ticket</option>
                        <option>Blocking Road</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fine Amount (Rp)</label>
                    <input type="number" placeholder="50000" class="w-full border border-gray-300 rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Evidence (Photo)</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:bg-gray-50 cursor-pointer transition-colors">
                        <i data-lucide="camera" class="w-6 h-6 text-gray-400 mx-auto mb-2"></i>
                        <span class="text-xs text-gray-500">Click to upload photo</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-200">
                <button onclick="closeModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium transition-colors">Cancel</button>
                <button onclick="submitViolation()" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-medium shadow-sm transition-colors">Issue Fine</button>
            </div>
        </div>
    </div>

    <div id="statDetailModal" class="hidden fixed inset-0 bg-gray-900/60 z-50 flex items-center justify-center backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-[400px] max-w-[95%] transform transition-all scale-100 overflow-hidden m-4">
            <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900" id="statDetailTitle">Detail</h3>
                <button onclick="closeStatDetailModal()" class="text-gray-400 hover:text-gray-600 bg-white hover:bg-gray-100 p-1.5 rounded-full border border-gray-200 transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <div class="p-6" id="statDetailContent">

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openModal() {
        document.getElementById('violationModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('violationModal').classList.add('hidden');
    }
    function submitViolation() {
        closeModal();
        if (typeof window.showToast === 'function') {
            window.showToast('Violation reported successfully.', 'success');
        } else {
            alert('Violation Reported');
        }
    }

    function filterTable() {
        const searchTerm = document.getElementById('tableSearch').value.toLowerCase();
        const statusValue = document.getElementById('filterStatus').value;
        const rows = document.querySelectorAll('#violationTableBody tr');

        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const rowStatus = row.getAttribute('data-status');

            const matchesSearch = text.includes(searchTerm);
            const matchesStatus = statusValue === '' || rowStatus === statusValue;

            if (matchesSearch && matchesStatus) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function showStatDetails(type) {
        const modal = document.getElementById('statDetailModal');
        const title = document.getElementById('statDetailTitle');
        const content = document.getElementById('statDetailContent');

        modal.classList.remove('hidden');

        if (type === 'active') {
            title.innerText = 'Active Violations';
            content.innerHTML = `
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm font-medium text-gray-600">Illegal Parking</span>
                        <span class="text-sm font-bold text-red-600">3 Cases</span>
                    </div>
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm font-medium text-gray-600">Overnight</span>
                        <span class="text-sm font-bold text-red-600">2 Cases</span>
                    </div>
                    <div class="pt-2 text-xs text-gray-500">
                        Total 5 active violations requiring attention.
                    </div>
                </div>
            `;
        } else if (type === 'unpaid') {
            title.innerText = 'Unpaid Fines Breakdown';
            content.innerHTML = `
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm font-medium text-gray-600">Cars</span>
                        <span class="text-sm font-bold text-orange-600">Rp 100.000</span>
                    </div>
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm font-medium text-gray-600">Motorcycles</span>
                        <span class="text-sm font-bold text-orange-600">Rp 50.000</span>
                    </div>
                    <div class="pt-2 text-xs text-gray-500">
                        Total outstanding: Rp 150.000
                    </div>
                </div>
            `;
        } else if (type === 'resolved') {
            title.innerText = 'Resolved Today';
            content.innerHTML = `
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm font-medium text-gray-600">Paid Fines</span>
                        <span class="text-sm font-bold text-green-600">1</span>
                    </div>
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm font-medium text-gray-600">Warnings Issued</span>
                        <span class="text-sm font-bold text-green-600">1</span>
                    </div>
                    <div class="pt-2 text-xs text-gray-500">
                        Good job! 2 cases closed today.
                    </div>
                </div>
            `;
        }
    }

    function closeStatDetailModal() {
        document.getElementById('statDetailModal').classList.add('hidden');
    }

    document.getElementById('tableSearch').addEventListener('input', filterTable);
</script>
@endpush
