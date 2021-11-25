@extends('layouts.base_stor') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps20</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps20/{{ $kewps20->id }}">
            @method('put')
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelupusan Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="">Kuasa Melulus</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="kuasa_melulus"
                                    value="{{ $kewps20->kuasa_melulus }}">
                            </div>
                        </div>
                        <input type="hidden" name="nama_pemeriksa1" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="nama_pemeriksa2" value="{{ Auth::user()->id }}">

                    </div>
                    <div class="row">
                        <div class="col-12 mt-2 mb-2">
                            <h3 class="mt-4">Aset</h3>
                        </div>
                        @foreach ($kewps20->infokewps20 as $k20)
                            <input type="hidden" name="info20_id[]" value="{{ $k20->id }}">
                            <div class="col-4">
                                <label for="">No Kod</label>
                                <select class="form-control mb-3" name="kewps3a_id[]">
                                    <option selected value="{{ $k20->kewps3a_id }}">{{ $k20->kewps3a->nama_stor }} -
                                        {{ $k20->kewps3a->perihal_stok }}
                                    </option>
                                    @foreach ($kewps3a as $k3)
                                        @if ($k3->id != $k20->kewps3a_id)
                                            <option value="{{ $k3->id }}">{{ $k3->nama_stor }} -
                                                {{ $k3->perihal_stok }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Kuantiti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="number" name="kuantiti[]"
                                        value="{{ $k20->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keadaan Stok</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keadaan_stok[]"
                                        value="{{ $k20->keadaan_stok }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Kaedah Pelupusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kaedah_pelupusan[]"
                                        value="{{ $k20->kaedah_pelupusan }}">

                                </div>
                                <select class="form-control mb-3" name="kaedah_pelupusan[]">

                                    <?= $text = DB::table('kaedah_pelupusan')
                                            ->where('value', $k20->kaedah_pelupusan)
                                            ->value('text') ?>

                                    <option selected value="{{ $k20->kaedah_pelupusan }}">{{ $text }}</option>
                                    @foreach ($kaedah as $k)
                                        @if ($k->value != $k20->kaedah_pelupusan)
                                            <option value="{{ $k->value }}">{{ $k->text }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Justifikasi</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="justifikasi[]"
                                        value="{{ $k20->justifikasi }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Keputusan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="keputusan[]"
                                        value="{{ $k20->keputusan }}">
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>


@endsection
