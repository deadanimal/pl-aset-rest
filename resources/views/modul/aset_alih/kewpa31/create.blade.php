@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/kewpa31">Kewpa31</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/kewpa31">
        @csrf
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-0">Senarai Aset Alih Yang Dilelong</h2>
                    </div>
                </div>
            </div>

            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-3">
                        <label for="">ID Kewpa30</label>
                        <select class="form-control mb-3" name="kewpa30_id">
                            <option selected>Pilih</option>
                            @foreach ($kewpa30 as $k30)
                                <option value="{{ $k30->id }}">{{ $k30->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">Harga Simpanan</label>
                        <input class="form-control mb-3" type="text" name="harga_simpanan" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Kuantiti</label>
                        <input class="form-control mb-3" type="number" name="kuantiti" value="" required>
                    </div>
                    <div class="col-3">
                        <label for="">Deposit</label>
                        <input class="form-control mb-3" type="text" name="deposit" value="" required>
                    </div>

                    <input type="hidden" name="ketua_jabatan" value="{{ Auth::user()->id }}">
                </div>

                <button class="my-4 btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
@endsection
