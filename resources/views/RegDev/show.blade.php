@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-primary">Device Details</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm rounded-10">
            <div class="card-header bg-dark text-white" style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="mb-0"><i class="mdi mdi-information-outline mr-2"></i> Device Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Device Name:</label>
                            <p class="font-weight-bold">{{ $device->nama_dev }}</p>
                        </div>
                        <div class="form-group">
                            <label>Status:</label>
                            <p>
                                @if ($device->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description:</label>
                            <p>{{ $device->ket ?? '-' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Created At:</label>
                            <p>{{ $device->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('devices.index') }}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
