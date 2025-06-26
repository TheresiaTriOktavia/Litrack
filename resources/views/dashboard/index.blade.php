@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-primary">Welcome Litrack</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Rumah Ipal Card -->
            <div class="col-lg-5 col-md-12 mb-4">
                <div class="card shadow-sm rounded-10">
                    <div class="card-header bg-dark text-white"
                        style=" border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                        <h5 class="mb-0"><i class="mdi mdi-water-pump mr-2 "></i> Rumah Ipal Monitoring</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-cog text-primary mr-2"></i>
                                    <span>Pompa Blower 1</span>
                                </div>
                                <span class="badge badge-success mr-0">ON</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-cog text-primary mr-2"></i>
                                    <span>Pompa Blower 2</span>
                                </div>
                                <span class="badge badge-success mr-0 ">ON</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-test-tube text-info mr-2"></i>
                                    <span>PH</span>
                                </div>
                                <span class="badge badge-info badge-pill">30 A</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-water text-info mr-2"></i>
                                    <span>Level Air</span>
                                </div>
                                <span class="badge badge-info badge-pill">30 A</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-flash text-warning mr-2"></i>
                                    <span>Tegangan</span>
                                </div>
                                <span class="badge badge-warning badge-pill">30 A</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="mdi mdi-power-plug text-success mr-2"></i>
                                    <span>Daya</span>
                                </div>
                                <span class="badge badge-success badge-pill">30 A</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pump Cards -->
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <!-- SUMPPIT 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-success shadow-sm h-100">
                            <div class="card-header bg-primary text-white"
                                style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                                <h6 class="mb-0"><i class="mdi mdi-water-pump mr-2"></i> SUMPPIT 1</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Pompa 1 -->
                                    <div class="col-md-6 border-right">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 1</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Pompa 2 -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 2</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUMPPIT 2 -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-success shadow-sm h-100">
                            <div class="card-header bg-info text-white"
                                style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                                <h6 class="mb-0"><i class="mdi mdi-water-pump mr-2"></i> SUMPPIT 2</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Pompa 1 -->
                                    <div class="col-md-6 border-right">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 1</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Pompa 2 -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 2</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUMPPIT 3 -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-success shadow-sm h-100">
                            <div class="card-header bg-warning text-white"
                                style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                                <h6 class="mb-0"><i class="mdi mdi-water-pump mr-2"></i> SUMPPIT 3</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Pompa 1 -->
                                    <div class="col-md-6 border-right">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 1</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Pompa 2 -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 2</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUMPPIT 4 -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-success shadow-sm h-100">
                            <div class="card-header bg-danger text-white"
                                style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                                <h6 class="mb-0"><i class="mdi mdi-water-pump mr-2"></i> SUMPPIT 4</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Pompa 1 -->
                                    <div class="col-md-6 border-right">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 1</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Pompa 2 -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge badge-success mr-2">ON</span>
                                            <small class="text-muted">POMPA 2</small>
                                        </div>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="mdi mdi-flash mr-2 text-warning"></i>
                                                <span>Tegangan: <strong>220V</strong></span>
                                            </li>
                                            <li class="mb-2">
                                                <i class="mdi mdi-power-plug mr-2 text-primary"></i>
                                                <span>Daya: <strong>350W</strong></span>
                                            </li>
                                            <li>
                                                <i class="mdi mdi-water mr-2 text-info"></i>
                                                <span>Level Air: <strong>Tinggi</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
