@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Today's Overview</h1>
            <p class="text-gray-500 text-sm mt-1" id="currentDateDisplay">Loading date...</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-8">

        <div onclick="openMetricModal('in')" class="group bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-brand-200 transition-all duration-300 hover:-translate-y-1 cursor-pointer relative overflow-hidden">
            <i data-lucide="arrow-down-circle" class="absolute -right-4 -bottom-4 w-24 h-24 text-brand-50 opacity-50 group-hover:scale-110 transition-transform"></i>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-brand-50 rounded-lg text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                        <i data-lucide="car" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full border border-green-100 flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3"></i> +12%
                    </span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Vehicles In</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1" id="stat-masuk">0</p>
                <p class="text-xs text-gray-400 mt-2 group-hover:text-brand-600 transition-colors flex items-center gap-1">
                    View Entry Details <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </p>
            </div>
        </div>

        <div onclick="openMetricModal('out')" class="group bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-orange-200 transition-all duration-300 hover:-translate-y-1 cursor-pointer relative overflow-hidden">
            <i data-lucide="arrow-up-circle" class="absolute -right-4 -bottom-4 w-24 h-24 text-orange-50 opacity-50 group-hover:scale-110 transition-transform"></i>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-orange-50 rounded-lg text-orange-600 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <i data-lucide="log-out" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full border border-orange-100 flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3"></i> +8.2%
                    </span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Vehicles Out</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1" id="stat-keluar">0</p>
                <p class="text-xs text-gray-400 mt-2 group-hover:text-orange-600 transition-colors flex items-center gap-1">
                    View Exit Details <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </p>
            </div>
        </div>

        <div onclick="openMetricModal('slots')" class="group bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 hover:-translate-y-1 cursor-pointer relative overflow-hidden">
            <i data-lucide="layout-grid" class="absolute -right-4 -bottom-4 w-24 h-24 text-blue-50 opacity-50 group-hover:scale-110 transition-transform"></i>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-blue-50 rounded-lg text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i data-lucide="parking-circle" class="w-6 h-6"></i>
                    </div>
                    <span id="stat-slot-badge" class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded-full border border-red-100">
                        Critical
                    </span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Available Slots</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1"><span id="stat-slot">0</span> <span class="text-sm font-normal text-gray-400">/ 200</span></p>
                <p class="text-xs text-gray-400 mt-2 group-hover:text-blue-600 transition-colors flex items-center gap-1">
                    Check Zones <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </p>
            </div>
        </div>

        <div onclick="window.location.href='{{ route('admin.violations') }}'" class="group bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-red-200 transition-all duration-300 hover:-translate-y-1 cursor-pointer relative overflow-hidden">
            <i data-lucide="alert-octagon" class="absolute -right-4 -bottom-4 w-24 h-24 text-red-50 opacity-50 group-hover:scale-110 transition-transform"></i>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-red-50 rounded-lg text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <i data-lucide="alert-triangle" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded-full border border-red-100">
                        New
                    </span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Violations</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">5</p>
                <p class="text-xs text-gray-400 mt-2 group-hover:text-red-600 transition-colors flex items-center gap-1">
                    Review Cases <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </p>
            </div>
        </div>

        <div onclick="openMetricModal('duration')" class="group bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-gray-200 transition-all duration-300 hover:-translate-y-1 cursor-pointer relative overflow-hidden">
            <i data-lucide="timer" class="absolute -right-4 -bottom-4 w-24 h-24 text-gray-100 opacity-50 group-hover:scale-110 transition-transform"></i>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-gray-100 rounded-lg text-gray-600 group-hover:bg-gray-800 group-hover:text-white transition-colors">
                        <i data-lucide="clock" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded-full border border-gray-200">Stable</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Avg. Duration</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1" id="stat-durasi">0h 00m</p>
                <p class="text-xs text-gray-400 mt-2 group-hover:text-gray-800 transition-colors flex items-center gap-1">
                    Analyze Time <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm p-6 relative group">
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('admin.statistics') }}" class="flex items-center gap-2 group-hover:text-brand-600 transition-colors cursor-pointer">
                    <h2 class="text-lg font-bold text-gray-900 group-hover:text-brand-600">Traffic Statistics</h2>
                    <i data-lucide="arrow-up-right" class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                </a>
                <select id="chartFilter" onchange="updateChartData(this.value)" class="bg-gray-50 border border-gray-200 text-sm text-gray-600 rounded-lg px-3 py-1 outline-none cursor-pointer hover:bg-gray-100 focus:ring-2 focus:ring-brand-200 transition-all">
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="year">This Year</option>
                </select>
            </div>
            <div class="relative h-72 w-full cursor-pointer" onclick="window.location='{{ route('admin.statistics') }}'">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 flex flex-col">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h2>
            <div class="space-y-4 flex-1 overflow-y-auto pr-2 custom-scroll" style="max-height: 280px;" id="recentActivityList"></div>

            <button onclick="showToast('View recent logs', 'info')" class="w-full mt-6 py-2 text-sm text-brand-600 font-medium hover:bg-brand-50 rounded-lg transition-colors border border-dashed border-brand-200 hover:border-brand-300 flex justify-center items-center">
                Refresh Logs
            </button>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-lg font-bold text-gray-900">Live Parking Status</h2>
            <div class="flex gap-2">
                 <button onclick="showToast('Filter Applied', 'success')" class="px-3 py-1.5 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors border border-gray-200">Filter</button>
                 <button onclick="downloadCSV()" class="flex items-center gap-2 px-3 py-1.5 text-sm text-white bg-brand-600 rounded-lg hover:bg-brand-700 shadow-sm shadow-brand-200 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                    <i data-lucide="download" class="w-4 h-4"></i> Export CSV
                 </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600" id="parkingTable">
                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500">
                    <tr>
                        <th class="px-6 py-4">License Plate</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Entry Time</th>
                        <th class="px-6 py-4">Gate</th>
                        <th class="px-6 py-4">Duration</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="parkingTableBody"></tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-gray-50">
            <span class="text-sm text-gray-500" id="tableInfo">...</span>
            <div class="flex gap-2">
                <button class="px-3 py-1 text-sm bg-white border border-gray-200 rounded hover:bg-gray-50 disabled:opacity-50 transition-colors shadow-sm" disabled>Prev</button>
                <button class="px-3 py-1 text-sm bg-white border border-gray-200 rounded hover:bg-gray-50 transition-colors shadow-sm">Next</button>
            </div>
        </div>
    </div>

    <div class="text-center text-xs text-gray-400 pb-4">
        &copy; 2023 ParkiRek System v1.3.
    </div>

    <div id="metricModal" class="hidden fixed inset-0 bg-gray-900/60 z-50 flex items-center justify-center backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-[600px] max-w-[95%] transform transition-all scale-100 overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-b border-gray-200">
                <div>
                    <h3 class="text-lg font-bold text-gray-900" id="metricModalTitle">Detail Metric</h3>
                    <p class="text-xs text-gray-500" id="metricModalSubtitle">Hourly Breakdown</p>
                </div>
                <button onclick="closeMetricModal()" class="text-gray-400 hover:text-gray-600 bg-white hover:bg-gray-100 p-1.5 rounded-full border border-gray-200 transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="relative h-64 w-full flex items-center justify-center">
                    <canvas id="metricChart"></canvas>
                </div>
                <div class="mt-6 p-4 bg-blue-50 border border-blue-100 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-100 rounded-full text-blue-600 shrink-0">
                            <i data-lucide="lightbulb" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-blue-900">Insight</h4>
                            <p class="text-xs text-blue-700 mt-1" id="metricModalInsight">Analysis data will appear here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-6 right-6 z-50">
        <button onclick="toggleChat()" class="bg-brand-600 hover:bg-brand-700 text-white p-4 rounded-full shadow-lg hover:shadow-brand-500/40 transition-all transform hover:scale-110 active:scale-95 flex items-center justify-center group ring-4 ring-white">
            <i data-lucide="message-square-plus" class="w-6 h-6 group-hover:rotate-12 transition-transform"></i>
        </button>
    </div>

    <div id="aiChatModal" class="hidden fixed bottom-24 right-6 w-80 md:w-96 bg-white rounded-2xl shadow-2xl border border-gray-100 z-50 overflow-hidden flex flex-col" style="height: 500px;">
        <div class="bg-brand-600 p-4 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2 text-white"><i data-lucide="bot" class="w-5 h-5"></i><span class="font-bold">Chat ParkiRek</span></div>
            <button onclick="toggleChat()" class="text-brand-100 hover:text-white"><i data-lucide="x" class="w-4 h-4"></i></button>
        </div>
        <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 scroll-smooth">
            <div class="flex items-start gap-2"><div class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center text-brand-600 shrink-0"><i data-lucide="bot" class="w-4 h-4"></i></div><div class="bg-white p-3 rounded-2xl rounded-tl-none text-sm text-gray-600 shadow-sm border border-gray-100">Hello! How can I help you? ✨</div></div>
        </div>
        <div class="p-3 bg-white border-t border-gray-100 shrink-0">
            <div class="relative">
                <input type="text" id="chatInput" placeholder="Type a message..." class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 pl-4 pr-10 text-sm focus:ring-2 focus:ring-brand-500 outline-none">
                <button onclick="sendChatMessage()" class="absolute right-2 top-1/2 transform -translate-y-1/2 p-1.5 bg-brand-600 text-white rounded-lg hover:bg-brand-700 transition-colors shadow-sm"><i data-lucide="send" class="w-3 h-3"></i></button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dashboardData = {
            stats: { masuk: 1248, keluar: 1050, slot_total: 200, slot_terisi: 158, durasi_avg: "2h 15m" },
            vehicles: [
                { plat: "B 8821 KKA", jenis: "Car (MPV)", waktu: "10:45 AM", gate: "Gate A", durasi: "2h 10m", status: "Active" },
                { plat: "D 5541 ZZ", jenis: "Motorcycle", waktu: "11:20 AM", gate: "Gate A", durasi: "1h 35m", status: "Active" },
                { plat: "AB 1992 XY", jenis: "Car (SUV)", waktu: "12:00 PM", gate: "Gate A", durasi: "55m", status: "Active" },
                { plat: "F 4422 UY", jenis: "Motorcycle", waktu: "12:15 PM", gate: "Gate A", durasi: "40m", status: "Active" },
            ],
            recent: [
                { plat: "B 1234 XYZ", action: "In", gate: "Gate A", time: "Just now", icon: "car", color: "brand" },
                { plat: "D 4567 ABC", action: "Out", gate: "Gate A", time: "2m ago", icon: "check-circle", color: "orange" },
                { plat: "F 8899 JK", action: "In", gate: "Gate A", time: "5m ago", icon: "car", color: "brand" },
            ]
        };

        function renderDashboard() {
            try {
                document.getElementById('stat-masuk').innerText = dashboardData.stats.masuk.toLocaleString();
                document.getElementById('stat-keluar').innerText = dashboardData.stats.keluar.toLocaleString();
                document.getElementById('stat-slot').innerText = dashboardData.stats.slot_total - dashboardData.stats.slot_terisi;
                document.getElementById('stat-durasi').innerText = dashboardData.stats.durasi_avg;
                document.getElementById('currentDateDisplay').innerText = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            } catch(e) { console.error("Stats render error", e); }

            renderTable(dashboardData.vehicles);
            renderActivity();
        }

        function renderTable(data) {
            const tbody = document.getElementById('parkingTableBody');
            if(!tbody) return;
            tbody.innerHTML = '';
            data.forEach(v => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-none group";
                tr.innerHTML = `
                    <td class="px-6 py-4 font-medium text-gray-900 group-hover:text-brand-600 transition-colors">${v.plat}</td>
                    <td class="px-6 py-4">${v.jenis}</td>
                    <td class="px-6 py-4">${v.waktu}</td>
                    <td class="px-6 py-4">${v.gate}</td>
                    <td class="px-6 py-4 text-orange-600 font-medium">${v.durasi}</td>
                    <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold ring-1 ring-green-200">${v.status}</span></td>
                    <td class="px-6 py-4 text-right"><button class="text-gray-400 hover:text-brand-600 p-1 hover:bg-brand-50 rounded transition-all"><i data-lucide="more-horizontal" class="w-5 h-5"></i></button></td>
                `;
                tbody.appendChild(tr);
            });
            const tableInfo = document.getElementById('tableInfo');
            if(tableInfo) tableInfo.innerText = `Showing ${data.length} records`;

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }

        function renderActivity() {
            const container = document.getElementById('recentActivityList');
            if(!container) return;
            container.innerHTML = '';
            dashboardData.recent.forEach(item => {
                const colorClass = item.color === 'brand' ? 'text-brand-600 bg-brand-50 ring-brand-100' : 'text-orange-600 bg-orange-50 ring-orange-100';
                container.innerHTML += `
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer group border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full ${colorClass} ring-1 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="${item.icon}" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-brand-600">${item.plat}</p>
                                <p class="text-xs text-gray-500">${item.action} • ${item.gate}</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium text-gray-400 group-hover:text-gray-600">${item.time}</span>
                    </div>
                `;
            });
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }

        renderDashboard();

        const ctx = document.getElementById('revenueChart');
        if (ctx && typeof Chart !== 'undefined') {
            const chart = new Chart(ctx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Volume', data: [850, 1240, 1100, 1350, 980, 450, 210],
                        borderColor: '#9F1421', backgroundColor: (context) => {
                            const grad = context.chart.ctx.createLinearGradient(0,0,0,300);
                            grad.addColorStop(0, 'rgba(159, 20, 33, 0.2)');
                            grad.addColorStop(1, 'rgba(159, 20, 33, 0)');
                            return grad;
                        },
                        borderWidth: 2, tension: 0.4, fill: true, pointRadius: 4, pointBackgroundColor: '#fff', pointBorderColor: '#9F1421'
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: {display: false} }, scales: { x: {grid: {display: false}}, y: {grid: {borderDash: [5,5]}} } }
            });

            window.updateChartData = (val) => {
                let labels, data;
                if (val === 'week') {
                    labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    data = [850, 1240, 1100, 1350, 980, 450, 210];
                } else if (val === 'month') {
                    labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
                    data = [5000, 6200, 4800, 5900];
                } else if (val === 'year') {
                    labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    data = [21000, 24000, 22000, 28000, 26000, 30000, 32000, 29000, 27000, 25000, 28000, 31000];
                }
                chart.data.labels = labels;
                chart.data.datasets[0].data = data;
                chart.update();
            };
        }

        let metricChartInstance = null;
        window.openMetricModal = (type) => {
            const modal = document.getElementById('metricModal');
            const title = document.getElementById('metricModalTitle');
            const subtitle = document.getElementById('metricModalSubtitle');
            const insight = document.getElementById('metricModalInsight');
            const canvas = document.getElementById('metricChart');

            if(!modal || !canvas) return;
            const ctxModal = canvas.getContext('2d');

            modal.classList.remove('hidden');

            if (metricChartInstance) metricChartInstance.destroy();

            let chartType, chartData;

            if (type === 'in') {
                title.innerText = 'Incoming Traffic Analysis';
                subtitle.innerText = 'Hourly Entry Breakdown (Today)';
                insight.innerText = 'Peak entry time was around 08:00 AM.';
                chartType = 'line';
                chartData = {
                    labels: ['06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00'],
                    datasets: [{ label: 'Entries', data: [20, 150, 80, 40, 60, 30, 20], borderColor: '#16a34a', backgroundColor: 'rgba(22, 163, 74, 0.1)', fill: true, tension: 0.4 }]
                };
            } else if (type === 'out') {
                title.innerText = 'Outgoing Traffic Analysis';
                subtitle.innerText = 'Hourly Exit Breakdown (Today)';
                insight.innerText = 'Exits peaked at 04:00 PM.';
                chartType = 'line';
                chartData = {
                    labels: ['06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00'],
                    datasets: [{ label: 'Exits', data: [5, 10, 30, 80, 90, 140, 100], borderColor: '#ea580c', backgroundColor: 'rgba(234, 88, 12, 0.1)', fill: true, tension: 0.4 }]
                };
            } else if (type === 'slots') {
                title.innerText = 'Zone Occupancy';
                subtitle.innerText = 'Current Availability';
                insight.innerText = 'Zone A is nearing capacity (85%).';
                chartType = 'doughnut';
                chartData = {
                    labels: ['Zone A', 'Zone B', 'VIP'],
                    datasets: [{ data: [85, 60, 20], backgroundColor: ['#9F1421', '#fb923c', '#2563eb'], borderWidth: 0 }]
                };
            } else if (type === 'duration') {
                title.innerText = 'Parking Duration';
                subtitle.innerText = 'Stay Distribution';
                insight.innerText = 'Majority park for < 2 hours.';
                chartType = 'bar';
                chartData = {
                    labels: ['< 1h', '1-3h', '3-5h', '> 5h'],
                    datasets: [{ label: 'Vehicles', data: [450, 300, 150, 80], backgroundColor: '#475569', borderRadius: 4 }]
                };
            }

            metricChartInstance = new Chart(ctxModal, {
                type: chartType,
                data: chartData,
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: type === 'slots' } }, scales: type === 'slots' ? {} : { y: { beginAtZero: true } } }
            });
        };

        window.closeMetricModal = () => document.getElementById('metricModal').classList.add('hidden');
        window.downloadCSV = () => window.showToast('Downloading CSV...', 'success');

        window.toggleChat = () => document.getElementById('aiChatModal').classList.toggle('hidden');
        window.sendChatMessage = async () => {
            const input = document.getElementById('chatInput');
            const msg = input.value.trim();
            if(!msg) return;
            const box = document.getElementById('chatMessages');
            box.innerHTML += `<div class="flex justify-end mb-2"><div class="bg-brand-600 text-white p-3 rounded-2xl rounded-tr-none text-sm max-w-[80%]">${msg}</div></div>`;
            input.value = '';

            setTimeout(() => {
                box.innerHTML += `<div class="flex gap-2 mb-2"><div class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center text-brand-600 shrink-0"><i data-lucide="bot" class="w-4 h-4"></i></div><div class="bg-white p-3 rounded-2xl rounded-tl-none text-sm text-gray-600 border border-gray-100">As a demo version, I cannot process live requests.</div></div>`;
                box.scrollTop = box.scrollHeight;
            }, 1000);
        };
        document.getElementById('chatInput').onkeypress = (e) => e.key === 'Enter' ? sendChatMessage() : null;
    });
</script>
@endpush
