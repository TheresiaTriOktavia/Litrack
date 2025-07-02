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
                        <a href="{{ route('devices.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus"></i> Add New Device
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

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
                            @foreach ($devices as $device)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $device->nama_dev }}</td>
                                    <td>
                                        @if ($device->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $device->ket ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('devices.destroy', $device->id_dev) }}" method="POST">
                                            <a href="{{ route('devices.show', $device->id_dev) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="{{ route('devices.edit', $device->id_dev) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
