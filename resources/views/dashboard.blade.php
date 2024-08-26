@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-12">
    <!-- Placeholder pentru conținutul specific -->
  </div>

  <!-- Clienti -->
  @php
    // Obține numărul total de clienți
    $totalClients = \App\Models\Client::count();

    // Date pentru graficul de clienți
    $clientData = \App\Models\Client::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get()
        ->pluck('count', 'date')
        ->toArray();

    // Formatăm datele pentru ultimele 7 zile
    $days = [];
    $clientCounts = [];
    foreach (range(-6, 0) as $i) {
        $date = \Carbon\Carbon::now()->addDays($i)->format('Y-m-d');
        $days[] = $date;
        $clientCounts[] = $clientData[$date] ?? 0;
    }

    // Obține numărul total de leads
    $totalLeads = \App\Models\Lead::count();

    // Date pentru graficul de leads
    $leadData = \App\Models\Lead::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get()
        ->pluck('count', 'date')
        ->toArray();

    // Formatăm datele pentru ultimele 7 zile pentru leads
    $leadCounts = [];
    foreach ($days as $date) {
        $leadCounts[] = $leadData[$date] ?? 0;
    }
  @endphp

<div class="col-md-6 col-xxl-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="avtar avtar-s bg-light-primary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M13 9H7" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M22.0002 10.9702V13.0302C22.0002 13.5802 21.5602 14.0302 21.0002 14.0502H19.0402C17.9602 14.0502 16.9702 13.2602 16.8802 12.1802C16.8202 11.5502 17.0602 10.9602 17.4802 10.5502C17.8502 10.1702 18.3602 9.9502 18.9202 9.9502H21.0002C21.5602 9.9702 22.0002 10.4202 22.0002 10.9702Z" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.48 10.55C17.06 10.96 16.82 11.55 16.88 12.18C16.97 13.26 17.96 14.05 19.04 14.05H21V15.5C21 18.5 19 20.5 16 20.5H7C4 20.5 2 18.5 2 15.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.50999 16.75 3.54999C19.33 3.84999 21 5.76 21 8.5V9.95001H18.92C18.36 9.95001 17.85 10.17 17.48 10.55Z" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">Clienți</h6>
                </div>
                <div class="flex-shrink-0 ms-3">
                    <div class="dropdown">
                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical f-18"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-body p-3 mt-3 rounded">
                <div class="mt-3 row align-items-center">
                    <div class="col-7">
                        <div id="clients-chart"></div>
                    </div>
                    <div class="col-5">
                        <h5 class="mb-1">{{ $totalClients }}</h5>
                        <p class="text-primary mb-0"><i class="ti ti-arrow-up-right"></i> 100%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leads -->
<div class="col-md-6 col-xxl-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="avtar avtar-s bg-light-warning">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path opacity="0.4" d="M13 9H7" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M22.0002 10.9702V13.0302C22.0002 13.5802 21.5602 14.0302 21.0002 14.0502H19.0402C17.9602 14.0502 16.9702 13.2602 16.8802 12.1802C16.8202 11.5502 17.0602 10.9602 17.4802 10.5502C17.8502 10.1702 18.3602 9.9502 18.9202 9.9502H21.0002C21.5602 9.9702 22.0002 10.4202 22.0002 10.9702Z" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M17.48 10.55C17.06 10.96 16.82 11.55 16.88 12.18C16.97 13.26 17.96 14.05 19.04 14.05H21V15.5C21 18.5 19 20.5 16 20.5H7C4 20.5 2 18.5 2 15.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.50999 16.75 3.54999C19.33 3.84999 21 5.76 21 8.5V9.95001H18.92C18.36 9.95001 17.85 10.17 17.48 10.55Z" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">Leads</h6>
                </div>
                <div class="flex-shrink-0 ms-3">
                    <div class="dropdown">
                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical f-18"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-body p-3 mt-3 rounded">
                <div class="mt-3 row align-items-center">
                    <div class="col-7">
                        <div id="leads-chart"></div>
                    </div>
                    <div class="col-5">
                        <h5 class="mb-1">{{ $totalLeads }}</h5>
                        <p class="text-warning mb-0"><i class="ti ti-arrow-up-right"></i> 100%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Restul card-urilor (Page Views, Total Task, etc.) -->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script>
    // Script pentru graficul de clienți
    var clientOptions = {
        series: [{
            name: 'Clienți',
            data: @json(array_values($clientCounts))
        }],
        chart: {
            height: 100,
            type: 'line',
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        xaxis: {
            categories: @json($days),
            labels: {
                show: false
            }
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        colors: ['#4680FF'],
    };

    var clientChart = new ApexCharts(document.querySelector("#clients-chart"), clientOptions);
    clientChart.render();

    // Script pentru graficul de leads
    var leadOptions = {
        series: [{
            name: 'Leads',
            data: @json(array_values($leadCounts))
        }],
        chart: {
            height: 100,
            type: 'line',
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        xaxis: {
            categories: @json($days),
            labels: {
                show: false
            }
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        colors: ['#E58A00'],
    };

    var leadChart = new ApexCharts(document.querySelector("#leads-chart"), leadOptions);
    leadChart.render();
</script>
@endsection
