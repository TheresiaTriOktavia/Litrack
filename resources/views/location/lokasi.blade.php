@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-md-8">
                <h3 class="font-weight-bold text-primary">Location Management</h3>
            </div>
            <div class="col-md-4 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModal">
                    <i class="fa-solid fa-circle-plus"></i> Add Location
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

        {{-- Modal Tambah Lokasi --}}
        <div class="modal fade" id="locationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="locationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="locationModalLabel">Add Location</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('location.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" id="nama" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lokasi"
                                    value="{{ old('nama') }}">
                                <label for="nama">Nama Lokasi</label>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="" disabled {{ old('status') === null ? 'selected' : '' }}>-- Pilih Status
                                        --</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>ON</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>OFF</option>
                                </select>
                                <label for="status">Status</label>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                    placeholder="Keterangan..." style="height: 100px">{{ old('ket') }}</textarea>
                                <label for="ket">Keterangan</label>
                                @error('ket')
                                    <div class="invalid-feedback">{{ $message }}</div>
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

        {{-- Modal View & Edit --}}
        @foreach ($location as $l)
            {{-- View Modal --}}
            <div class="modal fade" id="viewModal-{{ $l->id_lok }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content rounded-4">
                        <div class="modal-body position-relative p-0">
                            <button type="button"
                                class="btn btn-light position-absolute top-0 end-0 m-2 shadow-sm rounded-circle"
                                data-bs-dismiss="modal"><i class="fa-solid fa-xmark fs-5 text-dark"></i></button>
                            <div class="card border-0 shadow-sm">
                                <img src="{{ asset('img/logo.png') }}" class="card-img-top"
                                    style="max-height:180px; object-fit:contain; padding:1rem;">
                                <div class="card-body px-4 pt-2 pb-4">
                                    <h5 class="card-title fw-bold">{{ $l->nama }}</h5>
                                    <p class="card-text mb-2 text-wrap">{{ $l->ket }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $l->status ? 'ON' : 'OFF' }}</small>
                                    </p>
                                    <div class="text-end mt-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Modal --}}
            <div class="modal fade" id="editModal-{{ $l->id_lok }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content rounded-3">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Location</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('location.update', $l->id_lok) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="nama" class="form-control" value="{{ $l->nama }}">
                                    <label>Nama Lokasi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $l->status ? 'selected' : '' }}>ON</option>
                                        <option value="0" {{ !$l->status ? 'selected' : '' }}>OFF</option>
                                    </select>
                                    <label>Status</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="ket" class="form-control" style="height:100px">{{ $l->ket }}</textarea>
                                    <label>Keterangan</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Table --}}
        <div class="card shadow-sm rounded-3 mt-3">
            <div class="card-header bg-dark text-white rounded-top">
                <h5 class="mb-0"><i class="mdi mdi-map-marker me-2"></i> Location List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive px-4">
                    <table class="table table-hover align-middle w-100">
                        <thead class="align-middle">
                            <tr>
                                <th class="text-center" style="width: 5%;">No</th>
                                <th style="width: 25%;">Nama Lokasi</th>
                                <th style="width: 15%;">Status</th>
                                <th style="width: 40%;">Keterangan</th>
                                <th class="text-center" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($location as $index => $l)
                                <tr>
                                    <td class="text-center">{{ $index + $location->firstItem() }}</td>
                                    <td>{{ $l->nama }}</td>
                                    <td>{{ $l->status == 1 ? 'ON' : 'OFF' }}</td>
                                    <td class="text-wrap" style="max-width: 250px;">{{ $l->ket }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                            data-bs-target="#viewModal-{{ $l->id_lok }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $l->id_lok }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $l->id_lok }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $location->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>

    {{-- Auto show modal when error --}}
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var myModal = new bootstrap.Modal(document.getElementById('locationModal'));
                myModal.show();
            });
        </script>
    @endif

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Lokasi akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                allowOutsideClick: false,   
                customClass: {
                    confirmButton: 'btn btn-danger mx-2',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((res) => {
                if (res.isConfirmed) {
                    let form = document.createElement('form');
                    form.action = `/location/${id}`;
                    form.method = 'POST';
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.append(form);
                    form.submit();
                }
            });
        }
    </script>

@endsection