@extends('layouts.admin')

@section('title', 'Entry & Exit Logs')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Entry & Exit Logs</h1>
            <p class="text-gray-500 text-sm mt-1">Real-time monitoring of vehicle movements.</p>
        </div>
        <div class="flex gap-2">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <i data-lucide="filter" class="w-4 h-4"></i> Filter
            </button>
            <button class="flex items-center gap-2 px-4 py-2 bg-brand-600 text-white rounded-lg hover:bg-brand-700 transition-colors text-sm font-medium shadow-sm shadow-brand-200">
                <i data-lucide="download" class="w-4 h-4"></i> Export Data
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs text-gray-500 font-semibold uppercase">Today's Entry</p>
            <h3 class="text-2xl font-bold text-brand-600 mt-1">1,248</h3>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs text-gray-500 font-semibold uppercase">Today's Exit</p>
            <h3 class="text-2xl font-bold text-orange-600 mt-1">1,050</h3>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs text-gray-500 font-semibold uppercase">Currently Parked</p>
            <h3 class="text-2xl font-bold text-blue-600 mt-1">198</h3>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs text-gray-500 font-semibold uppercase">Avg. Duration</p>
            <h3 class="text-2xl font-bold text-gray-900 mt-1">2h 15m</h3>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 border-b border-gray-200 flex gap-4">
            <div class="relative flex-1">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="text" placeholder="Search License Plate..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-200 outline-none">
            </div>
            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-600 outline-none">
                <option>All Status</option>
                <option>Parked</option>
                <option>Exited</option>
            </select>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500">
                    <tr>
                        <th class="px-6 py-4">License Plate</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Entry Time</th>
                        <th class="px-6 py-4">Exit Time</th>
                        <th class="px-6 py-4">Duration</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900">B 1234 XYZ</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-blue-50 text-blue-700 text-xs border border-blue-100">
                                <i data-lucide="car" class="w-3 h-3"></i> Car
                            </span>
                        </td>
                        <td class="px-6 py-4 text-green-700 font-medium">10:00 AM</td>
                        <td class="px-6 py-4 text-orange-700 font-medium">02:30 PM</td>
                        <td class="px-6 py-4">4h 30m</td>
                        <td class="px-6 py-4"><span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs font-semibold">Exited</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900">D 5541 ZZ</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-orange-50 text-orange-700 text-xs border border-orange-100">
                                <i data-lucide="bike" class="w-3 h-3"></i> Motorcycle
                            </span>
                        </td>
                        <td class="px-6 py-4 text-green-700 font-medium">11:15 AM</td>
                        <td class="px-6 py-4 text-gray-400">-</td>
                        <td class="px-6 py-4 text-blue-600 font-medium">Running...</td>
                        <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Parked</span></td>
                    </tr>
                     <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900">AB 8899 KL</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-blue-50 text-blue-700 text-xs border border-blue-100">
                                <i data-lucide="car" class="w-3 h-3"></i> Car
                            </span>
                        </td>
                        <td class="px-6 py-4 text-green-700 font-medium">08:00 AM</td>
                        <td class="px-6 py-4 text-orange-700 font-medium">09:30 AM</td>
                        <td class="px-6 py-4">1h 30m</td>
                        <td class="px-6 py-4"><span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs font-semibold">Exited</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
            <span class="text-xs text-gray-500">Showing 3 records</span>
            <div class="flex gap-2">
                <button class="px-3 py-1 text-xs border rounded hover:bg-gray-50" disabled>Prev</button>
                <button class="px-3 py-1 text-xs border rounded hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
@endsection
