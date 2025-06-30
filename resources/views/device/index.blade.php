@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-primary">Device Management</h3>
                </div>
                <div class="col-12 col-xl-4 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-circle-plus"></i> Add Device
                    </button>

                    <!-- Modal Tambah Device -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form action="{{ route('device.store') }}" method="post" id="deviceForm">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">Add New Device</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control form-control-sm" id="nama_dev" name="nama_dev" placeholder="Device Name">
                                            <label for="nama_dev">Device Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control form-control-sm" id="status" name="status" placeholder="Status">
                                            <label for="status">Status</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control form-control-sm" placeholder="Keterangan" id="ket" name="ket"></textarea>
                                            <label for="ket">Keterangan</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="submitDeviceBtn">Save Device</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
            </div>
        </div>
    </div>

    <!-- Card List -->
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
                            <td>--</td>
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

@push('scripts')
<script>
    document.getElementById('submitDeviceBtn').addEventListener('click', function () {
        const namaDev = document.getElementById('nama_dev').value.trim();
        const status = document.getElementById('status').value.trim();
        const ket = document.getElementById('ket').value.trim();

        if (!namaDev || !status || !ket) {
            Swal.fire({
                icon: 'warning',
                title: 'Data Belum Terisi!',
                text: 'Gagal Di Simpan BOIII!',
                showConfirmButton: true
            });
            return;
        }

        Swal.fire({
            title: 'Simpan Device?',
            text: "Mau Di Simpan BOIII!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Menyimpan...',
                    text: 'Tunggu sebentar...',
                    icon: 'info',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                setTimeout(() => {
                    document.getElementById('deviceForm').submit();
                }, 1500);
            }
        });
    });
</script>

{{-- @if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil BOIII!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal BOIII!',
        text: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script> --}}
{{-- @endif --}}
@endpush
