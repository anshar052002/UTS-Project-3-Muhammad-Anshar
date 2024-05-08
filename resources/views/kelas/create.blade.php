@extends('layouts.main')

@section('container')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Kelas</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('kelas.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Nama Kelas</label>
                                <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Nama Kelas">
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
