@extends('layouts.admin')

@section('title', 'History')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tracking History</h1>
            <p class="text-gray-500 text-sm mt-1">Archive of all past vehicle movements.</p>
        </div>
        <div class="flex gap-2">
            <button onclick="window.print()" class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <i data-lucide="printer" class="w-4 h-4"></i> Print
            </button>
            <button onclick="showToast('Exporting data to CSV...', 'info')" class="flex items-center gap-2 px-4 py-2 bg-brand-600 text-white rounded-lg hover:bg-brand-700 transition-colors text-sm font-medium shadow-sm shadow-brand-200">
                <i data-lucide="download" class="w-4 h-4"></i> Export CSV
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-indigo-50 border border-indigo-100 p-4 rounded-xl flex items-center justify-between">
            <div>
                <p class="text-xs text-indigo-600 font-semibold uppercase">Total Vehicles</p>
                <p class="text-2xl font-bold text-gray-900">1,450</p>
            </div>
            <div class="p-2 bg-white rounded-lg text-indigo-600 shadow-sm"><i data-lucide="car" class="w-5 h-5"></i></div>
        </div>
        <div class="bg-green-50 border border-green-100 p-4 rounded-xl flex items-center justify-between">
            <div>
                <p class="text-xs text-green-600 font-semibold uppercase">Average Duration</p>
                <p class="text-2xl font-bold text-gray-900">1h 45m</p>
            </div>
            <div class="p-2 bg-white rounded-lg text-green-600 shadow-sm"><i data-lucide="clock" class="w-5 h-5"></i></div>
        </div>
        <div class="bg-orange-50 border border-orange-100 p-4 rounded-xl flex items-center justify-between">
            <div>
                <p class="text-xs text-orange-600 font-semibold uppercase">Peak Hours</p>
                <p class="text-xl font-bold text-gray-900">07:00 - 09:00</p>
            </div>
            <div class="p-2 bg-white rounded-lg text-orange-600 shadow-sm"><i data-lucide="zap" class="w-5 h-5"></i></div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        <div class="p-4 border-b border-gray-200 bg-gray-50 flex flex-col lg:flex-row gap-4 justify-between items-center">
            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                <div class="relative w-full sm:w-64">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                    <input type="text" id="tableSearch" placeholder="Search Plate No..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-200 outline-none transition-all">
                </div>

                <div class="flex items-center gap-2 bg-white border border-gray-300 rounded-lg px-3 py-2 w-full sm:w-auto">
                    <i data-lucide="calendar" class="w-4 h-4 text-gray-400"></i>
                    <input type="date" class="text-sm outline-none text-gray-600 w-full sm:w-auto">
                    <span class="text-gray-400">-</span>
                    <input type="date" class="text-sm outline-none text-gray-600 w-full sm:w-auto">
                </div>
            </div>

            <div class="flex gap-2 w-full lg:w-auto">
                <select id="filterType" onchange="filterTable()" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-brand-500 focus:border-brand-500 block w-full p-2 cursor-pointer">
                    <option value="">All Types</option>
                    <option value="Car">Car</option>
                    <option value="Motorcycle">Motorcycle</option>
                </select>
                <select id="filterStatus" onchange="filterTable()" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-brand-500 focus:border-brand-500 block w-full p-2 cursor-pointer">
                    <option value="">All Status</option>
                    <option value="Completed">Completed</option>
                    <option value="Problem">Problem</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-white text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4">Exit Time</th>
                        <th class="px-6 py-4">License Plate</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Duration</th>
                        <th class="px-6 py-4">Gate In</th>
                        <th class="px-6 py-4">Gate Out</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="historyTableBody">
                    <tr class="hover:bg-gray-50 transition-colors group" data-type="Car" data-status="Completed">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Oct 24, 14:30</div>
                            <div class="text-xs text-gray-400">Entry: 10:00</div>
                        </td>
                        <td class="px-6 py-4 font-mono font-bold text-gray-800 group-hover:text-brand-600 transition-colors">B 1234 XYZ</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-blue-50 text-blue-700 text-xs font-medium border border-blue-100">
                                <i data-lucide="car" class="w-3 h-3"></i> Car
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium">4h 30m</td>
                        <td class="px-6 py-4">Gate A</td>
                        <td class="px-6 py-4">Gate A</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#B7E2C7] text-[#107435] px-2 py-1 rounded-full text-xs font-semibold">Completed</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openDetailModal('B 1234 XYZ', 'Car', 'Oct 24, 2023')" class="text-gray-400 hover:text-brand-600 hover:bg-brand-50 p-2 rounded-lg transition-all" title="View Details">
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors group" data-type="Motorcycle" data-status="Completed">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Oct 24, 14:15</div>
                            <div class="text-xs text-gray-400">Entry: 13:00</div>
                        </td>
                        <td class="px-6 py-4 font-mono font-bold text-gray-800 group-hover:text-brand-600 transition-colors">D 5541 ZZ</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-orange-50 text-orange-700 text-xs font-medium border border-orange-100">
                                <i data-lucide="bike" class="w-3 h-3"></i> Motorcycle
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium">1h 15m</td>
                        <td class="px-6 py-4">Gate A</td>
                        <td class="px-6 py-4">Gate A</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#B7E2C7] text-[#107435] px-2 py-1 rounded-full text-xs font-semibold">Completed</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openDetailModal('D 5541 ZZ', 'Motorcycle', 'Oct 24, 2023')" class="text-gray-400 hover:text-brand-600 hover:bg-brand-50 p-2 rounded-lg transition-all" title="View Details">
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-red-50/20 transition-colors group" data-type="Car" data-status="Problem">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Oct 24, 13:45</div>
                            <div class="text-xs text-gray-400">Entry: 08:00</div>
                        </td>
                        <td class="px-6 py-4 font-mono font-bold text-gray-800 group-hover:text-brand-600 transition-colors">F 9988 AA</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-blue-50 text-blue-700 text-xs font-medium border border-blue-100">
                                <i data-lucide="car" class="w-3 h-3"></i> Car
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium">5h 45m</td>
                        <td class="px-6 py-4">Gate A</td>
                        <td class="px-6 py-4">Gate A</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold flex items-center gap-1 w-fit">
                                <i data-lucide="alert-circle" class="w-3 h-3"></i> Lost Ticket
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openDetailModal('F 9988 AA', 'Car', 'Oct 24, 2023', true)" class="text-gray-400 hover:text-brand-600 hover:bg-brand-50 p-2 rounded-lg transition-all" title="View Details">
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200 flex items-center justify-between bg-gray-50">
            <span class="text-sm text-gray-500">Showing 1-10 of 1,450 records</span>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 text-sm bg-white border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1.5 text-sm bg-white border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>

    <div id="detailModal" class="fixed inset-0 bg-gray-900/60 hidden z-50 flex items-center justify-center backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-[600px] max-w-[90%] transform transition-all scale-100 overflow-hidden m-4">
            <div class="bg-brand-600 px-6 py-4 flex justify-between items-center">
                <div class="text-white">
                    <h3 class="text-lg font-bold">Vehicle Tracking Details</h3>
                    <p class="text-brand-100 text-xs mt-0.5">Tracking ID: #TRK-20231024-8821</p>
                </div>
                <button onclick="closeDetailModal()" class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 p-1.5 rounded-full transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <div class="p-6 max-h-[80vh] overflow-y-auto">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center border border-gray-200 shrink-0">
                        <i data-lucide="car" class="w-8 h-8 text-gray-400" id="modalIcon"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 font-mono" id="modalPlate">B 1234 XYZ</h2>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs font-medium border border-gray-200" id="modalType">Car</span>
                            <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-medium border border-green-200" id="modalStatus">Completed</span>
                        </div>
                    </div>
                </div>

                <div class="relative pl-4 border-l-2 border-dashed border-gray-200 ml-4 space-y-8 mb-6">
                    <div class="relative">
                        <div class="absolute -left-[23px] bg-green-500 h-4 w-4 rounded-full border-4 border-white shadow-sm"></div>
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                            <p class="text-xs font-semibold text-green-600 uppercase mb-1 flex items-center gap-1">
                                <i data-lucide="log-in" class="w-3 h-3"></i> Entry Detected
                            </p>
                            <p class="font-medium text-gray-900">10:00:00 AM</p>
                            <p class="text-xs text-gray-500">Gate A (Main Entrance)</p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute -left-[23px] bg-brand-600 h-4 w-4 rounded-full border-4 border-white shadow-sm"></div>
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                            <p class="text-xs font-semibold text-brand-600 uppercase mb-1 flex items-center gap-1">
                                <i data-lucide="log-out" class="w-3 h-3"></i> Exit Detected
                            </p>
                            <p class="font-medium text-gray-900">02:30:00 PM</p>
                            <p class="text-xs text-gray-500">Gate A (Main Exit)</p>
                        </div>
                    </div>
                </div>

                <div class="bg-brand-50 border border-brand-100 rounded-lg p-4 flex flex-col sm:flex-row justify-between items-center gap-2">
                    <div class="text-center sm:text-left">
                        <p class="text-xs text-brand-600 uppercase font-semibold">Total Duration</p>
                        <p class="text-lg font-bold text-brand-900">4 Hours 30 Minutes</p>
                    </div>
                    <div class="text-center sm:text-right">
                        <p class="text-xs text-brand-600 uppercase font-semibold">Tracking System</p>
                        <p class="text-sm font-medium text-brand-900">Auto-Gate AI</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-200">
                <button onclick="closeDetailModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium transition-colors">Close</button>
                <button class="px-4 py-2 bg-brand-600 text-white rounded-lg hover:bg-brand-700 text-sm font-medium shadow-sm transition-colors flex items-center gap-2">
                    <i data-lucide="file-text" class="w-4 h-4"></i> Download Log
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openDetailModal(plate, type, date, isProblem = false) {
        document.getElementById('modalPlate').innerText = plate;
        document.getElementById('modalType').innerText = type;

        const statusSpan = document.getElementById('modalStatus');
        if (isProblem) {
            statusSpan.innerText = 'Problem / Lost Ticket';
            statusSpan.className = 'bg-red-100 text-red-700 px-2 py-0.5 rounded text-xs font-medium border border-red-200';
        } else {
            statusSpan.innerText = 'Completed';
            statusSpan.className = 'bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-medium border border-green-200';
        }

        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    function filterTable() {
        const searchTerm = document.getElementById('tableSearch').value.toLowerCase();
        const typeValue = document.getElementById('filterType').value;
        const statusValue = document.getElementById('filterStatus').value;
        const rows = document.querySelectorAll('#historyTableBody tr');

        rows.forEach(row => {
            const plateText = row.innerText.toLowerCase();
            const rowType = row.getAttribute('data-type');
            const rowStatus = row.getAttribute('data-status');

            const matchesSearch = plateText.includes(searchTerm);
            const matchesType = typeValue === '' || rowType === typeValue;
            const matchesStatus = statusValue === '' || rowStatus === statusValue;

            if (matchesSearch && matchesType && matchesStatus) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('tableSearch').addEventListener('input', filterTable);
</script>
@endpush
