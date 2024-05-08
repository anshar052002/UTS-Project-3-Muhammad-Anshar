@extends('layouts.main')

@section('container')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Siswa</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nis" class="form-label">Nis</label>
                                <input type="text" name="nis" class="form-control" id="nis" value="{{ $siswa->nis }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $siswa->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="id_kelas" class="form-label">Kelas</label>
                                <select name="id_kelas" id="id_kelas" class="form-select">
                                    <option disabled selected>Pilih Kelas</option>
                                    @foreach ($kls as $kelas)
                                        <option value="{{ $kelas->id_kelas }}" {{ $siswa->id_kelas == $kelas->id_kelas ? 'selected' : '' }}>
                                            {{ $kelas->kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $siswa->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="Laki-laki" {{ $siswa->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $siswa->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2024</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
