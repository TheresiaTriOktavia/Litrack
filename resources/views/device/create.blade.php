@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold text-primary">Create New Device</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm rounded-10">
            <div class="card-header bg-dark text-white"
                style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h5 class="mb-0"><i class="mdi mdi-plus-circle mr-2"></i> Add Device</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('devices.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_dev">Device Name</label>
                        <input type="text" class="form-control" id="nama_dev" name="nama_dev" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ket">Description</label>
                        <textarea class="form-control" id="ket" name="ket" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="mdi mdi-content-save"></i> Save
                    </button>
                    <a href="{{ route('devices.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection