@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/kewpa34">Kewpa34</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewpa34/{{ $kewpa34->id }}">
            @csrf
            @method('PUT')
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelantikan Jawatankuasa Penyiasat Kehilangan Aset Alih</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4">
                            <label for="">ID Kewpa33</label>
                            <select name="kewpa34_id" class="form-control mb-3">
                                @foreach ($kewpa33 as $k33)
                                    <option {{ $k33->id == $kewpa34->kewpa33_id ? 'selected' : '' }}
                                        value="{{ $k33->id }}">
                                        {{ $k33->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh</label>
                            <input class="form-control mb-3" type="date" name="tarikh" value="{{ $kewpa34->tarikh }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Tamat</label>
                            <input class="form-control mb-3" type="date" name="tarikh_tamat"
                                value="{{ $kewpa34->tarikh_tamat }}" required>
                        </div>
                    </div>

                    <button class="my-2 btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
