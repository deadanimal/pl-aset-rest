@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa31">Kewpa31</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewpa31/{{ $kewpa31->id }}">
            @csrf
            @method('PUT')
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
                                    <option {{ $k30->id == $kewpa31->kewpa30_id ? 'selected' : '' }}
                                        value="{{ $k30->id }}">{{ $k30->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti</label>
                            <input class="form-control mb-3" type="number" name="kuantiti"
                                value="{{ $kewpa31->kuantiti }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Simpanan</label>
                            <input class="form-control mb-3" type="text" name="harga_simpanan"
                                value="{{ $kewpa31->harga_simpanan }}" required>
                        </div>
                        <div class="col-3">
                            <label for="">Deposit</label>
                            <input class="form-control mb-3" type="text" name="deposit" value="{{ $kewpa31->deposit }}"
                                required>
                        </div>
                    </div>

                    <button class="my-2 btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
