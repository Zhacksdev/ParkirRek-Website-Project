@extends('layouts.admin')

@section('title', 'Locations & Slots')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Locations & Slots</h1>
            <p class="text-gray-500 text-sm mt-1">Real-time slot availability monitoring.</p>
        </div>

        <div class="flex items-center gap-3 bg-white p-2 rounded-lg border border-gray-200 shadow-sm">
            <div class="flex items-center gap-1.5 px-2">
                <span class="w-3 h-3 bg-green-500 rounded-sm"></span>
                <span class="text-xs font-medium text-gray-600">Available</span>
            </div>
            <div class="h-4 w-px bg-gray-200"></div>
            <div class="flex items-center gap-1.5 px-2">
                <span class="w-3 h-3 bg-red-500 rounded-sm"></span>
                <span class="text-xs font-medium text-gray-600">Occupied</span>
            </div>
            <div class="h-4 w-px bg-gray-200"></div>
            <div class="flex items-center gap-1.5 px-2">
                <span class="w-3 h-3 bg-orange-400 rounded-sm"></span>
                <span class="text-xs font-medium text-gray-600">Reserved</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-4 rounded-xl border border-gray-200 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs text-gray-500 uppercase font-semibold">Total Capacity</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">442</p>
            </div>
            <div class="w-10 h-10 bg-gray-100 text-gray-600 rounded-lg flex items-center justify-center shrink-0">
                <i data-lucide="maximize" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-200 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs text-gray-500 uppercase font-semibold">Occupied</p>
                <p class="text-2xl font-bold text-brand-600 mt-1">301</p>
            </div>
            <div class="w-10 h-10 bg-brand-50 text-brand-600 rounded-lg flex items-center justify-center shrink-0">
                <i data-lucide="car" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-200 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs text-gray-500 uppercase font-semibold">Available</p>
                <p class="text-2xl font-bold text-green-600 mt-1">141</p>
            </div>
            <div class="w-10 h-10 bg-green-50 text-green-600 rounded-lg flex items-center justify-center shrink-0">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-200 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs text-gray-500 uppercase font-semibold">Maintenance</p>
                <p class="text-2xl font-bold text-orange-600 mt-1">0</p>
            </div>
            <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-lg flex items-center justify-center shrink-0">
                <i data-lucide="wrench" class="w-5 h-5"></i>
            </div>
        </div>
    </div>

    <div class="mb-6 border-b border-gray-200">
        <div class="flex gap-6 overflow-x-auto">
            <button onclick="switchZone('A')" id="btnZoneA" class="pb-3 text-sm font-medium border-b-2 border-brand-600 text-brand-600 transition-colors whitespace-nowrap">
                Zone A (Cars)
            </button>
            <button onclick="switchZone('B')" id="btnZoneB" class="pb-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 transition-colors whitespace-nowrap">
                Zone B (Motorcycles)
            </button>
            <button onclick="switchZone('VIP')" id="btnZoneVIP" class="pb-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 transition-colors whitespace-nowrap">
                VIP Area
            </button>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm min-h-[400px]">

        <div id="zoneA" class="zone-content">
            <div class="mb-5 flex justify-between items-end">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Zone A - Car Parking</h3>
                    <p class="text-sm text-gray-500">70 Total Slots • Ground Floor</p>
                </div>
                <div class="text-sm font-medium text-green-600 bg-green-50 px-3 py-1 rounded-full border border-green-100">
                    20 Slots Available
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3">
                @for($i = 1; $i <= 70; $i++)
                    @php
                        $isOccupied = rand(1, 100) <= 70;

                        $status = $isOccupied ? 'occupied' : 'available';

                        $bgClass = $status == 'occupied' ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200 hover:bg-green-100 cursor-pointer';
                        $textClass = $status == 'occupied' ? 'text-red-700' : 'text-green-700';
                        $iconColor = $status == 'occupied' ? 'text-red-500' : 'text-green-500';
                        $label = $status == 'occupied' ? 'Occupied' : 'Empty';
                        $icon = $status == 'occupied' ? 'car' : 'check';
                        $plate = $status == 'occupied' ? 'B ' . rand(1000,9999) . ' XX' : '';
                    @endphp

                    <div class="border rounded-lg p-3 flex flex-col items-center justify-center gap-1 transition-all {{ $bgClass }} relative group h-24">
                        <span class="text-xs font-bold opacity-60 {{ $textClass }}">A-{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>

                        <i data-lucide="{{ $icon }}" class="w-6 h-6 {{ $iconColor }} my-1"></i>

                        @if($status == 'occupied')
                            <span class="text-[10px] font-mono font-bold {{ $textClass }} truncate w-full text-center">{{ $plate }}</span>
                        @else
                            <span class="text-[10px] font-medium uppercase {{ $textClass }}">{{ $label }}</span>
                        @endif

                        @if($status == 'occupied')
                            <div class="absolute bottom-full mb-2 hidden group-hover:block bg-gray-900 text-white text-xs p-2 rounded shadow-lg w-24 text-center z-10">
                                {{ $plate }}<br>In: {{ rand(7,12) }}:{{ str_pad(rand(0,59), 2, '0', STR_PAD_LEFT) }}
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <div id="zoneB" class="zone-content hidden">
            <div class="mb-5 flex justify-between items-end">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Zone B - Motorcycle Parking</h3>
                    <p class="text-sm text-gray-500">360 Total Slots • Ground Floor (Side)</p>
                </div>
                <div class="text-sm font-medium text-green-600 bg-green-50 px-3 py-1 rounded-full border border-green-100">
                    110 Slots Available
                </div>
            </div>

            <div class="overflow-y-auto max-h-[600px] pr-2">
                <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-12 gap-2">
                    @for($i = 1; $i <= 360; $i++)
                        @php
                            $isOccupied = rand(1, 100) <= 75;

                            $status = $isOccupied ? 'occupied' : 'available';
                            $bgClass = $status == 'occupied' ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200 hover:bg-green-100 cursor-pointer';
                            $icon = $status == 'occupied' ? 'bike' : 'check';
                        @endphp

                        <div class="border rounded-md p-2 flex flex-col items-center justify-center gap-1 transition-all {{ $bgClass }} h-16">
                            <span class="text-[9px] font-bold opacity-60 text-gray-600">B-{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</span>
                            <i data-lucide="{{ $icon }}" class="w-4 h-4 {{ $status == 'occupied' ? 'text-red-500' : 'text-green-500' }}"></i>
                            @if($status == 'occupied')
                                <span class="text-[8px] font-mono font-bold text-red-700 truncate w-full text-center">D {{ rand(100,999) }}</span>
                            @else
                                <span class="text-[8px] font-medium text-green-700">Empty</span>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div id="zoneVIP" class="zone-content hidden">
            <div class="mb-5 flex justify-between items-end">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">VIP Area</h3>
                    <p class="text-sm text-gray-500">12 Reserved Slots • Main Entrance</p>
                </div>
                <div class="text-sm font-medium text-green-600 bg-green-50 px-3 py-1 rounded-full border border-green-100">
                    5 Slots Available
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="bg-brand-50 border-2 border-brand-300 rounded-xl p-6 h-48 flex flex-col items-center justify-center shadow-sm relative">
                    <div class="absolute top-3 right-3 bg-brand-200 text-brand-700 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider">Reserved</div>
                    <span class="text-lg font-bold text-brand-900 mb-2">VIP-01</span>
                    <i data-lucide="car" class="w-10 h-10 text-brand-700 mb-2"></i>
                    <span class="font-mono font-bold text-brand-800">RI 1</span>
                    <span class="text-sm text-brand-600 mt-1 font-medium">Bapak Rektor</span>
                </div>

                @for($i = 2; $i <= 12; $i++)
                    @php
                        $isVipOccupied = rand(1, 100) <= 40;
                    @endphp

                    @if($isVipOccupied)
                        <div class="bg-brand-50 border border-brand-200 rounded-xl p-6 h-48 flex flex-col items-center justify-center shadow-sm">
                            <span class="text-lg font-bold text-brand-800 mb-2">VIP-{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                            <i data-lucide="car" class="w-10 h-10 text-brand-600 mb-2"></i>
                            <span class="font-mono font-bold text-brand-700">D {{ rand(10,99) }} VIP</span>
                            <span class="text-sm text-brand-500 mt-1">Guest</span>
                        </div>
                    @else
                        <div class="bg-white border-2 border-dashed border-gray-300 rounded-xl p-6 h-48 flex flex-col items-center justify-center cursor-pointer hover:border-green-500 hover:bg-green-50 transition-all group">
                            <span class="text-lg font-bold text-gray-400 mb-2 group-hover:text-green-600">VIP-{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mb-2 group-hover:bg-green-100">
                                <i data-lucide="plus" class="w-6 h-6 text-gray-400 group-hover:text-green-600"></i>
                            </div>
                            <span class="text-sm text-gray-500 group-hover:text-green-700 font-medium">Available</span>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    function switchZone(zone) {
        document.querySelectorAll('.zone-content').forEach(el => el.classList.add('hidden'));

        document.getElementById('zone' + zone).classList.remove('hidden');

        const btnBaseClass = "pb-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 transition-colors whitespace-nowrap";
        const btnActiveClass = "pb-3 text-sm font-medium border-b-2 border-brand-600 text-brand-600 transition-colors whitespace-nowrap";

        ['A', 'B', 'VIP'].forEach(z => {
            const btn = document.getElementById('btnZone' + z);
            if (z === zone) {
                btn.className = btnActiveClass;
            } else {
                btn.className = btnBaseClass;
            }
        });

        lucide.createIcons();
    }
</script>
@endpush
