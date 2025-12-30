@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <header class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Settings & Profile</h1>
        <button class="text-gray-500 hover:text-brand-600 transition-colors">
            <i data-lucide="help-circle" class="w-6 h-6"></i>
        </button>
    </header>

    <div class="max-w-4xl mx-auto space-y-6">

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gray-50 gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-brand-600 flex items-center justify-center text-white text-2xl font-bold shrink-0">AD</div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Super Admin</h2>
                        <p class="text-sm text-gray-500 break-all">admin@parkirek.com</p>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 mt-1 rounded bg-green-100 text-green-700 text-xs font-medium">
                            <i data-lucide="shield-check" class="w-3 h-3"></i> Administrator
                        </span>
                    </div>
                </div>
                <button class="border border-gray-300 hover:bg-white text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors w-full sm:w-auto">
                    Edit Profile
                </button>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" value="Super Admin Parkirek" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-600 bg-gray-50" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="text" value="+62 812 3456 7890" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-600 bg-gray-50" readonly>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-900">System Configuration</h2>
                <p class="text-sm text-gray-500">Manage gate status and system alerts.</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Emergency Lockdown</p>
                        <p class="text-sm text-gray-500">Close all gates immediately.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-600"></div>
                    </label>
                </div>
                <hr>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Maintenance Mode</p>
                        <p class="text-sm text-gray-500">Prevent new tickets from being generated.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </label>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-900">Staff Management</h2>
                <button class="text-brand-600 text-sm font-medium hover:underline">+ Add Staff</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500">
                        <tr>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900">John Doe</td>
                            <td class="px-6 py-4">Security</td>
                            <td class="px-6 py-4"><span class="text-green-600 bg-green-50 px-2 py-1 rounded text-xs">Active</span></td>
                            <td class="px-6 py-4 text-right"><button class="text-gray-400 hover:text-brand-600">Edit</button></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900">Jane Smith</td>
                            <td class="px-6 py-4">Admin</td>
                            <td class="px-6 py-4"><span class="text-green-600 bg-green-50 px-2 py-1 rounded text-xs">Active</span></td>
                            <td class="px-6 py-4 text-right"><button class="text-gray-400 hover:text-brand-600">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pt-4">
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-full md:w-auto px-6 py-3 bg-red-50 text-red-600 hover:bg-red-100 rounded-xl font-medium transition-colors flex items-center justify-center gap-2">
                <i data-lucide="log-out" class="w-5 h-5"></i> Sign Out
            </button>
        </div>

    </div>
@endsection
