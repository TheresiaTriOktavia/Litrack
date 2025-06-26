@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-primary">Device Management</h3>
                    </div>
                    <div class="col-12 col-xl-4 text-right">
                        {{-- <a href="{{ route('devices.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus"></i> Add New Device
                        </a> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-circle-plus"></i> Add Device
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {{-- {{ dd($device) }} --}}

        <div class="card shadow-sm rounded-10">
            <div class="card-header bg-dark text-white"
                style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="mb-0"><i class="mdi mdi-devices mr-2"></i> Device List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Device Name</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($device as $aku)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $aku->nama_dev }}</td>
                                    <td>{{ $aku->status }}</td>
                                    <td>{{ $aku->ket }}</td>
                                    <td></td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">Data Kosong Boyyy</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $device->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
