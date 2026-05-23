  @extends('layouts.app')

@section('title', 'WebGIS PKH & BPNT Kota Palopo')

@section('content')
 <!-- ============================================== -->
        <!-- TAB: DATA REKAPITULASI (CHARTS)                -->
        <!-- ============================================== -->
        <section  class="tab-section  py-12 px-4 md:px-8 max-w-7xl mx-auto">
            
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <!-- Main Analytics Chart (Bar Chart) -->
                <div class="lg:col-span-3 bg-white p-6 rounded-2xl shadow-md border border-slate-100">
                    <h3 class="text-base font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-chart-simple text-emerald-600"></i> Sebaran Penerima Bantuan Sosial Per Kecamatan (KPM)
                    </h3>
                    <div class="h-80 w-full relative">
                        <canvas id="rekapChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Aid Share Ratio (Donut Chart) -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-md border border-slate-100 flex flex-col justify-between">
                        
                        <div>
                            <h3 class="text-base font-bold text-slate-800 mb-6 flex items-center gap-2">
                                <i class="fa-solid fa-chart-line text-emerald-600"></i>
                                Tren Penerima Bantuan 5 Tahun Terakhir
                            </h3>

                            <div class="h-64 w-full relative">
                                <canvas id="ratioChart"></canvas>
                            </div>
                        </div>

                        <p class="text-[11px] text-slate-400 text-center italic border-t border-slate-100 pt-3">
                            Statistik perkembangan jumlah penerima bantuan sosial PKH dan BPNT.
                        </p>

                    </div>
            </div>


        </section>



           <script>

    // =========================
    // BAR CHART
    // =========================
    const rekapCtx = document.getElementById('rekapChart').getContext('2d');

    new Chart(rekapCtx, {
        type: 'bar',

        data: {
            labels: @json($labels),

            datasets: [
                {
                    label: 'Bantuan PKH ',
                    data: @json($pkhData),
                    backgroundColor: '#059669',
                    borderRadius: 8
                },

                {
                    label: 'Bantuan BPNT ',
                    data: @json($bpntData),
                    backgroundColor: '#f59e0b',
                    borderRadius: 8
                }
            ]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'top'
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },

                y: {
                    beginAtZero: true
                }
            }
        }
    });


// =========================
// LINE CHART 5 TAHUN
// =========================
const ratioCtx = document.getElementById('ratioChart').getContext('2d');

new Chart(ratioCtx, {

    type: 'line',

    data: {

        labels: @json($labelsTahun),

        datasets: [

            {
                label: 'PKH',

                data: @json($pkhTahun),

                borderColor: '#059669',
                backgroundColor: 'rgba(5,150,105,0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6
            },

            {
                label: 'BPNT',

                data: @json($bpntTahun),

                borderColor: '#f59e0b',
                backgroundColor: 'rgba(245,158,11,0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6
            }

        ]
    },

    options: {

        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                position: 'bottom'
            }
        },

        scales: {

            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }

        }

    }

});

</script>
@endsection
