@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-primary">Device Reports</h3>
                    </div>
                </div>
            </div>
        </div>

        {{ dd($device) }}

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card shadow-sm rounded-10">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="mdi mdi-check-circle mr-2"></i> Active Devices</h5>
                    </div>
                    <div class="card-body text-center py-5">
                        <h1 class="display-4">{{ $activeDevices }}</h1>
                        <p class="text-muted">Currently Active</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card shadow-sm rounded-10">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0"><i class="mdi mdi-alert-circle mr-2"></i> Inactive Devices</h5>
                    </div>
                    <div class="card-body text-center py-5">
                        <h1 class="display-4">{{ $inactiveDevices }}</h1>
                        <p class="text-muted">Currently Inactive</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm rounded-10 mt-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="mdi mdi-chart-bar mr-2"></i> Device Status Distribution</h5>
            </div>
            <div class="card-body">
                <canvas id="deviceChart" height="100"></canvas>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('deviceChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Active Devices', 'Inactive Devices'],
                        datasets: [{
                            data: [{{ $activeDevices }}, {{ $inactiveDevices }}],
                            backgroundColor: [
                                '#4CAF50',
                                '#F44336'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            });
        </script>
    @endpush
@endsection
