@extends('layouts.admin')

@section('title', 'Statistics')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Statistics & Analytics</h1>
                <p class="text-gray-500 text-sm mt-1">Data insights and performance metrics.</p>
            </div>

            <div class="hidden md:flex bg-gray-100 p-1 rounded-lg">
                <button id="btnOverview" onclick="switchStatTab('overview')" class="px-4 py-1.5 bg-white shadow-sm text-brand-700 rounded-md text-sm font-medium transition-all">Overview</button>
                <button id="btnOccupancy" onclick="switchStatTab('occupancy')" class="px-4 py-1.5 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded-md text-sm font-medium transition-all">Occupancy</button>
                <button id="btnVehicles" onclick="switchStatTab('vehicles')" class="px-4 py-1.5 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded-md text-sm font-medium transition-all">Vehicles</button>
            </div>
        </div>

        <div class="flex items-center gap-2 bg-white p-1 rounded-lg border border-gray-200 shadow-sm">
            <div class="relative">
                <i data-lucide="calendar" class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <select id="periodFilter" onchange="updateCharts()" class="pl-9 pr-8 py-1.5 text-sm border-none rounded-md bg-transparent focus:ring-0 text-gray-700 font-medium cursor-pointer outline-none">
                    <option value="7days">Last 7 Days</option>
                    <option value="30days">This Month</option>
                    <option value="year">This Year</option>
                </select>
            </div>
            <div class="h-6 w-px bg-gray-200"></div>
            <button onclick="showToast('Downloading report...', 'info')" class="px-3 py-1.5 text-brand-600 hover:bg-brand-50 rounded-md transition-colors">
                <i data-lucide="download" class="w-4 h-4"></i>
            </button>
        </div>
    </div>

    <div class="md:hidden flex bg-gray-100 p-1 rounded-lg mb-6 overflow-x-auto">
        <button id="btnOverviewMobile" onclick="switchStatTab('overview')" class="flex-1 px-4 py-1.5 bg-white shadow-sm text-brand-700 rounded-md text-sm font-medium transition-all whitespace-nowrap">Overview</button>
        <button id="btnOccupancyMobile" onclick="switchStatTab('occupancy')" class="flex-1 px-4 py-1.5 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded-md text-sm font-medium transition-all">Occupancy</button>
        <button id="btnVehiclesMobile" onclick="switchStatTab('vehicles')" class="flex-1 px-4 py-1.5 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded-md text-sm font-medium transition-all">Vehicles</button>
    </div>

    <div id="statsContent">

        <div id="overviewSection" class="stat-tab transition-opacity duration-300">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Peak Occupancy</p>
                        <span class="text-xs font-semibold text-red-600 bg-red-50 px-2 py-0.5 rounded-full border border-red-100">High</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">92%</h3>
                        <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                            <i data-lucide="clock" class="w-3 h-3"></i> at 10:00 AM
                        </p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Avg. Duration</p>
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-0.5 rounded-full border border-green-100">-5m</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">2h 15m</h3>
                        <p class="text-xs text-gray-400 mt-1">vs last week</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total In</p>
                        <div class="p-1.5 bg-brand-50 rounded-lg">
                            <i data-lucide="arrow-down-left" class="w-4 h-4 text-brand-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">1,250</h3>
                        <p class="text-xs text-gray-400 mt-1">Vehicles today</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Turnover Rate</p>
                        <div class="p-1.5 bg-gray-100 rounded-lg">
                            <i data-lucide="refresh-cw" class="w-4 h-4 text-gray-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">4.5x</h3>
                        <p class="text-xs text-gray-400 mt-1">Cars per slot</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Traffic Volume Trend</h3>
                        <p class="text-sm text-gray-500">Incoming vs Outgoing vehicles over time</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex items-center gap-1 text-xs text-gray-600"><span class="w-2 h-2 rounded-full bg-brand-600"></span> In</span>
                        <span class="flex items-center gap-1 text-xs text-gray-600"><span class="w-2 h-2 rounded-full bg-gray-400"></span> Out</span>
                    </div>
                </div>
                <div class="relative h-80 w-full">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>
        </div>

        <div id="occupancySection" class="stat-tab hidden transition-opacity duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="lg:col-span-2 bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Weekly Peak Hours</h3>
                            <p class="text-sm text-gray-500">Average occupancy percentage by day</p>
                        </div>
                        <span class="text-xs font-medium text-brand-700 bg-brand-50 px-3 py-1 rounded-full border border-brand-100 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3 h-3"></i> Busiest: Tuesday
                        </span>
                    </div>
                    <div class="relative h-72 w-full">
                        <canvas id="peakHourChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Slot Efficiency</h3>
                    <div class="space-y-4 flex-1 overflow-y-auto pr-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Zone A (Cars)</p>
                                <div class="w-32 bg-gray-100 rounded-full h-1.5 mt-1">
                                    <div class="bg-brand-600 h-1.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">85%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Zone B (Bikes)</p>
                                <div class="w-32 bg-gray-100 rounded-full h-1.5 mt-1">
                                    <div class="bg-orange-500 h-1.5 rounded-full" style="width: 60%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">60%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">VIP Area</p>
                                <div class="w-32 bg-gray-100 rounded-full h-1.5 mt-1">
                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 20%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">20%</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Based on active sensors data.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="vehiclesSection" class="stat-tab hidden transition-opacity duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex flex-col items-center">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 w-full text-left">Vehicle Types</h3>
                    <div class="relative h-64 w-64">
                        <canvas id="typeChart"></canvas>
                    </div>
                    <div class="grid grid-cols-3 gap-4 w-full mt-6">
                        <div class="text-center">
                            <span class="block text-2xl font-bold text-brand-600">65%</span>
                            <span class="text-xs text-gray-500">Motorcycles</span>
                        </div>
                        <div class="text-center">
                            <span class="block text-2xl font-bold text-gray-600">30%</span>
                            <span class="text-xs text-gray-500">Cars</span>
                        </div>
                        <div class="text-center">
                            <span class="block text-2xl font-bold text-orange-500">5%</span>
                            <span class="text-xs text-gray-500">VIP/Staff</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Parking Duration</h3>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Short Term (< 2h)</span>
                                <span class="font-medium text-gray-900">45%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Mid Term (2h - 5h)</span>
                                <span class="font-medium text-gray-900">35%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 35%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Long Term (> 5h)</span>
                                <span class="font-medium text-gray-900">20%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-brand-600 h-2 rounded-full" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-100">
                        <div class="flex items-start gap-3">
                            <i data-lucide="info" class="w-5 h-5 text-brand-600 mt-0.5"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Insight</p>
                                <p class="text-xs text-gray-500 mt-1">Most vehicles park for short durations during lunch hours (11:00 - 13:00).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Chart === 'undefined') return;

        const trafficCtx = document.getElementById('trafficChart').getContext('2d');
        const trafficChart = new Chart(trafficCtx, {
            type: 'line',
            data: {
                labels: ['06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00'],
                datasets: [
                    {
                        label: 'Incoming',
                        data: [50, 420, 350, 200, 150, 80, 40, 20],
                        borderColor: '#9F1421',
                        backgroundColor: 'rgba(159, 20, 33, 0.05)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#9F1421',
                        pointRadius: 4
                    },
                    {
                        label: 'Outgoing',
                        data: [10, 50, 120, 300, 350, 450, 200, 100],
                        borderColor: '#94a3b8',
                        borderWidth: 2,
                        tension: 0.4,
                        borderDash: [5, 5],
                        pointRadius: 0
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top', align: 'end', labels: { usePointStyle: true, boxWidth: 8 } },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1e293b',
                        bodyColor: '#475569',
                        borderColor: '#e2e8f0',
                        borderWidth: 1,
                        padding: 10,
                        displayColors: true
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                    x: { grid: { display: false } }
                }
            }
        });

        const typeCtx = document.getElementById('typeChart').getContext('2d');
        const typeChart = new Chart(typeCtx, {
            type: 'doughnut',
            data: {
                labels: ['Motorcycles', 'Cars', 'Staff/VIP'],
                datasets: [{
                    data: [65, 30, 5],
                    backgroundColor: ['#9F1421', '#e2e8f0', '#fb923c'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: { legend: { display: false } }
            }
        });

        const peakCtx = document.getElementById('peakHourChart').getContext('2d');
        const peakChart = new Chart(peakCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'Avg. Occupancy (%)',
                    data: [85, 92, 88, 90, 75, 40],
                    backgroundColor: (ctx) => ctx.raw > 90 ? '#9F1421' : '#f87171',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, max: 100, grid: { color: '#f1f5f9' } },
                    x: { grid: { display: false } }
                }
            }
        });

        window.updateCharts = function() {
            const period = document.getElementById('periodFilter').value;
            const newData = period === 'year' ? [200, 300, 450, 400, 350, 200, 100, 50] : [50, 420, 350, 200, 150, 80, 40, 20];
            trafficChart.data.datasets[0].data = newData;
            trafficChart.update();
            window.showToast('Data updated for: ' + period, 'success');
        };
    });

    function switchStatTab(tab) {
        document.querySelectorAll('.stat-tab').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('block');
        });

        const selected = document.getElementById(tab + 'Section');
        if(selected) {
            selected.classList.remove('hidden');
            selected.classList.add('block');
        }

        const tabs = ['overview', 'occupancy', 'vehicles'];
        const activeClass = "px-4 py-1.5 bg-white shadow-sm text-brand-700 rounded-md text-sm font-medium transition-all";
        const inactiveClass = "px-4 py-1.5 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded-md text-sm font-medium transition-all";

        tabs.forEach(t => {
            const btn = document.getElementById('btn' + t.charAt(0).toUpperCase() + t.slice(1));
            if (t === tab) {
                if(btn) btn.className = activeClass;
            } else {
                if(btn) btn.className = inactiveClass;
            }
        });
    }
</script>
@endpush
