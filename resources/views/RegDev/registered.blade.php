@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        {{-- Header --}}
        <div class="row mb-4">
            <div class="col-md-8">
                <h3 class="font-weight-bold text-primary">Registered Device</h3>
            </div>
            <div class="col-md-4 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="fa-solid fa-circle-plus"></i> Register Device
                </button>
            </div>
        </div>

        {{-- SweetAlert Success --}}
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
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

        {{-- Modal Register Device --}}
        <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register Device</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('regdev.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- Nama RD --}}
                            <div class="form-floating mb-3">
                                <input type="text" id="nama_rd" name="nama_rd"
                                    class="form-control @error('nama_rd') is-invalid @enderror"
                                    placeholder="Nama Register Device" value="{{ old('nama_rd') }}">
                                <label for="nama_rd">Nama Register Device</label>
                                @error('nama_rd')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Device --}}
                            <div class="form-floating mb-3">
                                <select id="id_dev" name="id_dev"
                                    class="form-select @error('id_dev') is-invalid @enderror">
                                    <option value="">-- Pilih Device --</option>
                                    @foreach ($devices as $device)
                                        <option value="{{ $device->id_dev }}"
                                            {{ old('id_dev') == $device->id_dev ? 'selected' : '' }}>
                                            {{ $device->nama_dev }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="id_dev">Device</label>
                                @error('id_dev')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- IPAL --}}
                            <div class="form-floating mb-3">
                                <select id="id_ipal" name="id_ipal"
                                    class="form-select @error('id_ipal') is-invalid @enderror">
                                    <option value="">-- Pilih IPAL --</option>
                                    @foreach ($ipals as $ipal)
                                        <option value="{{ $ipal->id_ipal }}"
                                            {{ old('id_ipal') == $ipal->id_ipal ? 'selected' : '' }}>
                                            {{ $ipal->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="id_ipal">IPAL</label>
                                @error('id_ipal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Lokasi --}}
                            <div class="form-floating mb-3">
                                <select id="id_lok" name="id_lok"
                                    class="form-select @error('id_lok') is-invalid @enderror">
                                    <option value="">-- Pilih Lokasi --</option>
                                    @foreach ($lokasis as $lokasi)
                                        <option value="{{ $lokasi->id_lok }}"
                                            {{ old('id_lok') == $lokasi->id_lok ? 'selected' : '' }}>
                                            {{ $lokasi->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="id_lok">Lokasi</label>
                                @error('id_lok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="form-floating mb-3">
                                <select id="status" name="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>ON</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>OFF</option>
                                </select>
                                <label for="status">Status</label>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Keterangan --}}
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

        {{-- Tabel Registered Devices --}}
        <div class="card shadow-sm rounded-3 mt-3">
            <div class="card-header bg-dark text-white rounded-top">
                <h5 class="mb-0"><i class="mdi mdi-devices me-2"></i> List Registered Devices</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive px-4">
                    <table class="table table-hover align-middle w-100">
                        <thead class="align-middle">
                            <tr>
                                <th>No</th>
                                <th>ID RegDev</th> <!-- Tambahan -->
                                <th>Nama Register</th>
                                <th>Device</th>
                                <th>IPAL</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th class="text-center" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($regdev as $i => $d)
                                <tr>
                                    <td>{{ $i + $regdev->firstItem() }}</td>
                                    <td>{{ $d->id_regDev }}</td> <!-- Tambahan -->
                                    <td>{{ $d->nama_rd }}</td>
                                    <td>{{ $d->device->nama_dev ?? '-' }}</td>
                                    <td>{{ $d->ipal->nama ?? '-' }}</td>
                                    <td>{{ $d->lokasi->nama ?? '-' }}</td>
                                    <td>{{ $d->status ? 'ON' : 'OFF' }}</td>
                                    <td class="text-wrap" style="max-width: 250px;">{{ $d->ket }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                            data-bs-target="#viewRegdevModal-{{ $d->id_rd }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                            data-bs-target="#editRegdevModal-{{ $d->id_rd }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="confirmRegdevDelete({{ $d->id_rd }}, '{{ csrf_token() }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">Data Kosong</td>
                                </tr>
                            @endforelse
                            @foreach ($regdev as $d)
                                {{-- Modal View --}}
                                <div class="modal fade" id="viewRegdevModal-{{ $d->id_rd }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content rounded-4">
                                        <div class="modal-body position-relative p-0">
                                            <button type="button"
                                                class="btn btn-light position-absolute top-0 end-0 m-2 shadow-sm rounded-circle"
                                                data-bs-dismiss="modal">
                                                <i class="fa-solid fa-xmark fs-5 text-dark"></i>
                                            </button>
                                            <div class="card border-0 shadow-sm">
                                                <img src="{{ asset('img/logo.png') }}" class="card-img-top"
                                                    style="max-height:180px; object-fit:contain; padding:1rem;">
                                                <div class="card-body px-4 pt-4 pb-4">
                                                    <h5 class="card-title fw-bold mb-3">{{ $d->nama_rd }}</h5>
                                                    
                                                    <div class="row mb-2">
                                                        <div class="col-4 fw-bold">Device</div>
                                                        <div class="col-8">: {{ $d->device->nama_dev ?? '-' }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4 fw-bold">IPAL</div>
                                                        <div class="col-8">: {{ $d->ipal->nama ?? '-' }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-4 fw-bold">Lokasi</div>
                                                        <div class="col-8">: {{ $d->lokasi->nama ?? '-' }}</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-4 fw-bold">Status</div>
                                                        <div class="col-8">: {{ $d->status ? 'ON' : 'OFF' }}</div>
                                                    </div>
                                                    
                                                    <div class="border-top pt-3 mb-3">
                                                        <p>{{ $d->ket }}</p>
                                                    </div>
                                                    
                                                    <div class="text-end mt-3">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editRegdevModal-{{ $d->id_rd }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content rounded-3">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Registered Device</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('regdev.update', $d->id_rd) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    {{-- Nama --}}
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="nama_rd" class="form-control"
                                                            value="{{ $d->nama_rd }}">
                                                        <label>Nama Register Device</label>
                                                    </div>

                                                    {{-- Device --}}
                                                    <div class="form-floating mb-3">
                                                        <select name="id_dev" class="form-select">
                                                            @foreach ($devices as $dev)
                                                                <option value="{{ $dev->id_dev }}"
                                                                    {{ $d->id_dev == $dev->id_dev ? 'selected' : '' }}>
                                                                    {{ $dev->nama_dev }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label>Device</label>
                                                    </div>

                                                    {{-- IPAL --}}
                                                    <div class="form-floating mb-3">
                                                        <select name="id_ipal" class="form-select">
                                                            @foreach ($ipals as $ipal)
                                                                <option value="{{ $ipal->id_ipal }}"
                                                                    {{ $d->id_ipal == $ipal->id_ipal ? 'selected' : '' }}>
                                                                    {{ $ipal->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label>IPAL</label>
                                                    </div>

                                                    {{-- Lokasi --}}
                                                    <div class="form-floating mb-3">
                                                        <select name="id_lok" class="form-select">
                                                            @foreach ($lokasis as $lok)
                                                                <option value="{{ $lok->id_lok }}"
                                                                    {{ $d->id_lok == $lok->id_lok ? 'selected' : '' }}>
                                                                    {{ $lok->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label>Lokasi</label>
                                                    </div>

                                                    {{-- Status --}}
                                                    <div class="form-floating mb-3">
                                                        <select name="status" class="form-select">
                                                            <option value="1"
                                                                {{ $d->status == 1 ? 'selected' : '' }}>ON</option>
                                                            <option value="0"
                                                                {{ $d->status == 0 ? 'selected' : '' }}>OFF</option>
                                                        </select>
                                                        <label>Status</label>
                                                    </div>

                                                    {{-- Keterangan --}}
                                                    <div class="form-floating mb-3">
                                                        <textarea name="ket" class="form-control" style="height:100px">{{ $d->ket }}</textarea>
                                                        <label>Keterangan</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-success" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                    {!! $regdev->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>

    {{-- Auto-show modal saat error --}}
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('registerModal'));
                myModal.show();
            });
        </script>
    @endif
    <script>
        function confirmRegdevDelete(id, token) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-danger mx-2',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.createElement('form');
                    form.action = `/register-device/${id}`; // <- PERBAIKI INI
                    form.method = 'POST';
                    form.innerHTML = `
                <input type="hidden" name="_token" value="${token}">
                <input type="hidden" name="_method" value="DELETE">
            `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endsection
