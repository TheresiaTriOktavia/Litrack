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
                                            {{ $lokasi->nama_lok }}
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
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Register</th>
                                <th>Device</th>
                                <th>IPAL</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($regdev as $i => $d)
                                <tr>
                                    <td>{{ $i + $regdev->firstItem() }}</td>
                                    <td>{{ $d->nama_rd }}</td>
                                    <td>{{ $d->device->nama_dev ?? '-' }}</td>
                                    <td>{{ $d->ipal->nama ?? '-' }}</td>
                                    <td>{{ $d->lokasi->nama_lok ?? '-' }}</td>
                                    <td>{{ $d->status ? 'ON' : 'OFF' }}</td>
                                    <td>{{ $d->ket }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-danger">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $regdev->links() !!}
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
@endsection
