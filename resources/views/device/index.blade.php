@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h3 class="font-weight-bold text-primary">Device Management</h3>
            </div>
            <div class="col-md-4 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deviceModal">
                    <i class="fa-solid fa-circle-plus"></i> Add Device
                </button>
            </div>
        </div>

        {{-- SweetAlert Success --}}
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session("success") }}',
                        icon: 'success',
                        iconColor: '#198754',
                        confirmButtonText: 'OK',
                        customClass: {
                            popup: 'rounded-4 shadow-sm p-3',
                            confirmButton: 'btn btn-success px-4'
                        },
                        buttonsStyling: false
                    });
                });
            </script>
        @endif

        {{-- Modal Tambah Device --}}
        <div class="modal fade" id="deviceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="deviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deviceModalLabel">Add Device</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('device.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" id="nama_dev" name="nama_dev"
                                    class="form-control form-control-sm @error('nama_dev') is-invalid @enderror"
                                    placeholder="Nama Device" value="{{ old('nama_dev') }}">
                                <label for="nama_dev">Nama Device</label>
                                @error('nama_dev')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror"
                                    aria-label="Status">
                                    <option value="" disabled {{ old('status') === null ? 'selected' : '' }}>-- Pilih Status
                                        --</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Non-aktif</option>
                                </select>
                                <label for="status">Status</label>
                                @error('status')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                    placeholder="Keterangan..." style="height: 100px">{{ old('ket') }}</textarea>
                                <label for="ket">Keterangan</label>
                                @error('ket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Table Device --}}
        <div class="card shadow-sm rounded-3 mt-3">
            <div class="card-header bg-dark text-white rounded-top">
                <h5 class="mb-0"><i class="mdi mdi-devices me-2"></i> Device List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
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
                            @forelse ($device as $index => $d)
                                <tr>
                                    <td>{{ $index + $device->firstItem() }}</td>
                                    <td>{{ $d->nama_dev }}</td>
                                    <td>{{ $d->status == 1 ? 'Aktif' : 'Non-aktif' }}</td>
                                    <td>{{ $d->ket }}</td>
                                    <td>
                                        {{-- Aksi seperti edit/delete bisa ditambahkan di sini --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $device->links() !!}
                </div>
            </div>
        </div>
    </div>

    {{-- Auto-open modal on validation error --}}
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var myModal = new bootstrap.Modal(document.getElementById('deviceModal'));
                myModal.show();
            });
        </script>
    @endif

@endsection