@extends('layouts.admin')

@section('title', 'Notifications')

@section('content')
    <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
        <h1 class="text-xl font-bold text-gray-900">Notifications</h1>
        <div class="flex items-center gap-3">
            <button class="text-sm text-brand-600 hover:underline">Mark all as read</button>
        </div>
    </header>

    <main class="flex-1 overflow-y-auto p-8">
        <div class="max-w-3xl mx-auto space-y-4">

            <div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase mb-3">Today</h3>
                <div class="space-y-3">
                    <div class="bg-blue-50 border border-blue-100 p-4 rounded-xl flex gap-4 transition-all hover:shadow-sm">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shrink-0">
                            <i data-lucide="info" class="w-5 h-5"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <h4 class="font-semibold text-gray-900">System Update</h4>
                                <span class="text-xs text-blue-600 font-medium">New</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Parkirek system updated to v1.2. New analytics features are now available.</p>
                            <p class="text-xs text-gray-400 mt-2">10 mins ago</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 p-4 rounded-xl flex gap-4 transition-all hover:shadow-sm">
                        <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center shrink-0">
                            <i data-lucide="alert-triangle" class="w-5 h-5"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900">Gate A Malfunction</h4>
                            <p class="text-sm text-gray-600 mt-1">Sensor at Gate A reported intermittent connectivity. Please check connection.</p>
                            <p class="text-xs text-gray-400 mt-2">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <h3 class="text-xs font-semibold text-gray-500 uppercase mb-3">Yesterday</h3>
                <div class="space-y-3">
                    <div class="bg-white border border-gray-200 p-4 rounded-xl flex gap-4 transition-all hover:shadow-sm opacity-75 hover:opacity-100">
                        <div class="w-10 h-10 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center shrink-0">
                            <i data-lucide="file-text" class="w-5 h-5"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900">Weekly Report Ready</h4>
                            <p class="text-sm text-gray-600 mt-1">The weekly transaction report for Oct 16 - Oct 22 is ready for download.</p>
                            <p class="text-xs text-gray-400 mt-2">Yesterday, 09:00 AM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
@endsection
