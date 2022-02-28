@extends('layouts.base_stor') @section('content')
    <style>
        #kewps15-table td {
            min-width: 130px;
            vertical-align: middle;
        }

    </style>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">kewps15</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps15">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pelarasan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="">Agensi</label>
                            <input type="text" name="agensi" class="form-control" value="Perbadanan Aset Labuan">
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Kategori Stor</label>
                            <select name="kategori_stor" class="form-control">
                                <option selected disabled hidden>Pilih</option>
                                <option value="Stor Alat Ganti">Stor Alat Ganti</option>
                                <option value="Stor Bekalan Pejabat">Stor Bekalan Pejabat</option>
                            </select>
                        </div>
                        <input type="hidden" name="pegawai_menyediakan" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="pegawai_mengesahkan" value="{{ auth()->user()->id }}">
                    </div>
                    <table class="table table-bordered text-center table-responsive mt-5" id="kewps15-table">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2">Select All
                                    <div>
                                        <input type="checkbox" id="check">
                                    </div>
                                </th>
                                <th scope="col" rowspan="2">No Kod</th>
                                <th scope="col" rowspan="2">Perihal Stok</th>
                                <th scope="col" rowspan="2">Tarikh Penemuan</th>
                                <th scope="col" colspan="2">Baki di Kad Daftar Stok <br> (a)</th>
                                <th scope="col" colspan="2">Baki Fizikal <br> (b)</th>
                                <th scope="col" colspan="2">Perbezaan <br> (+/-) <br> (b) - (a)</th>
                                <th scope="col" rowspan="2">Justifikasi</th>
                                <th scope="col" rowspan="2">Kelulusan Ketua Jabatan (Lulus/ Tidak Lulus)</th>
                            </tr>
                            <tr>
                                <th scope="col">Kuantiti</th>
                                <th scope="col">Nilai (RM)</th>
                                <th scope="col">Kuantiti</th>
                                <th scope="col">Nilai (RM)</th>
                                <th scope="col">Kuantiti</th>
                                <th scope="col">Nilai (RM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infokewps10 as $ik)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check-all" name="selected[]"
                                            value="{{ $loop->index }}">
                                    </td>
                                    <td>
                                        {{ $ik->kewps3a->no_kad }}
                                    </td>
                                    <td>
                                        {{ $ik->kewps3a->perihal_stok }}
                                    </td>
                                    <td>
                                        <input type="date" name="tarikh_penemuan[]" class="form-control" required>
                                    </td>
                                    <td>
                                        {{ $ik->kewps3a->parasstok->first()->maksimum_stok }}
                                        <input type="hidden" name="kuantiti_stok[]" id="kuantiti_stok-{{ $loop->index }}"
                                            value=" {{ $ik->kewps3a->parasstok->first()->maksimum_stok }}">
                                    </td>
                                    <td>
                                        {{ $ik->kewps3a->parasstok->first()->maksimum_stok * $ik->kewps3a->kewps1->harga_seunit }}

                                    </td>
                                    <td>
                                        <input type="number" name="kuantiti_fizikal[]"
                                            onkeyup="kf(this,{{ $ik->kewps3a->kewps1->harga_seunit }}, {{ $loop->index }})"
                                            class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="number" name="" class="form-control"
                                            id="nilai_fizikal-{{ $loop->index }}" readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="kuantiti_perbezaan[]"
                                            id="kuantiti_perbezaan-{{ $loop->index }}" readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control"
                                            id="nilai_perbezaan-{{ $loop->index }}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="justifikasi[]" class="form-control">
                                    </td>
                                    <td>
                                        <select name="status_kelulusan[]" class="form-control">
                                            <option selected disabled hidden>Pilih</option>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Tidak Lulus">Tidak Lulus</option>
                                        </select>
                                    </td>
                                    <input type="hidden" name="kewps3a_id[]" value="{{ $ik->kewps3a_id }}">
                                    <input type="hidden" name="infokewps10_id[]" value="{{ $ik->id }}">
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="text-right mt-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        $("#check").change(function() {
            if (this.checked) {
                $(".check-all").prop('checked', true);;
            } else {
                $(".check-all").prop('checked', false);;

            }
        });

        function kf(el, harga_seunit, index) {
            let kuantiti_fizikal = parseInt(el.value);
            let nilai = kuantiti_fizikal * parseInt(harga_seunit);
            $("#nilai_fizikal-" + index).val(nilai);

            let kuantiti_stok = $("#kuantiti_stok-" + index).val();
            let perbezaan = kuantiti_fizikal - kuantiti_stok;

            $("#kuantiti_perbezaan-" + index).val(perbezaan);

            let nilai_perbezaan = perbezaan * parseInt(harga_seunit);
            $("#nilai_perbezaan-" + index).val(nilai_perbezaan);
        }
    </script>
@endsection
