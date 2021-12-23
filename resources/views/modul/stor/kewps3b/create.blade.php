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
                                <li class="breadcrumb-item"><a href="">Kew.ps-3(B)</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/kewps3b">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Transaksi Stok</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="col-4">
                            <label for="">No Kod </label>
                            <select name="no_transaksi" class="form-control mb-3" id="k3b_nokod" required>
                                <option selected>Pilih</option>
                                @foreach ($kewps3a as $k3a)
                                    <option value="{{ $k3a->id }}">{{ $k3a->no_kad }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Tarikh Transaksi</label>
                            <input class="form-control mb-3" type="date" name="tarikh" required>
                        </div>
                        <div class="col-4">
                            <label for="">Terima Daripada</label>
                            <input class="form-control mb-3" type="text" name="terima" id="k3b_terima" required>
                        </div>
                        <div class="col-3">
                            <label for="">Keluar Kepada</label>
                            <input class="form-control mb-3" type="text" name="terima_keluar" required>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Diterima</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_terima" id="k3b_kuantiti_diterima"
                                required>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Seunit Terima</label>
                            <input class="form-control mb-3" type="text" name="harga_seunit_terima"
                                id="k3b_harga_seunit_terima" required>
                        </div>
                        <div class="col-3">
                            <label for="">Jumlah Harga Terima</label>
                            <input class="form-control mb-3" type="text" name="jumlah_harga_terima"
                                id="k3b_jumlah_harga_terima" required>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Keluar</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_keluar" id="k3b_kuantiti_keluar"
                                required>
                        </div>
                        <div class="col-3">
                            <label for="">Harga Jumlah Keluar</label>
                            <input class="form-control mb-3" type="text" name="harga_jumlah_keluar"
                                id="k3b_harga_jumlah_keluar" required>
                        </div>
                        <div class="col-3">
                            <label for="">Kuantiti Baki</label>
                            <input class="form-control mb-3" type="number" name="kuantiti_baki" id="k3b_kuantiti_baki"
                                required>
                        </div>
                        <div class="col-3">
                            <label for="">Jumlah Harga Baki</label>
                            <input class="form-control mb-3" type="text" name="jumlah_harga_baki" id="k3b_jumlah_harga_baki"
                                required>
                        </div>

                    </div>


                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>

                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#k3b_nokod").change(function() {
                var val = this.value;
                var a = @json($kewps3a->toArray());
                a.forEach(b => {
                    if (b.id == val) {
                        $("#k3b_terima").val(b.nama_stor);
                        $("#k3b_kuantiti_diterima").val(b.kewps1.kuantiti_diterima);
                        $("#k3b_harga_seunit_terima").val(b.kewps1.harga_seunit);
                        $("#k3b_jumlah_harga_terima").val(b.kewps1.jumlah_harga);
                    }
                });
            });


            //setup before functions
            var typingTimer; //timer identifier
            var doneTypingInterval = 500; //time in ms, 5 second for example
            var $input = $('#k3b_kuantiti_keluar');

            //on keyup, start the countdown
            $input.on('keyup', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            //on keydown, clear the countdown 
            $input.on('keydown', function() {
                clearTimeout(typingTimer);
            });

            //user is "finished typing," do something
            function doneTyping() {
                //do something
                var kk = $('#k3b_kuantiti_keluar').val();
                var seunit = $("#k3b_harga_seunit_terima").val();
                var jkk = kk * seunit;
                $("#k3b_harga_jumlah_keluar").val(jkk);

                var kt = $("#k3b_kuantiti_diterima").val();
                var kb = kt - kk;
                $("#k3b_kuantiti_baki").val(kb);

                var jkb = kb * seunit;
                $("#k3b_jumlah_harga_baki").val(jkb);
            }

        });
    </script>

@endsection
