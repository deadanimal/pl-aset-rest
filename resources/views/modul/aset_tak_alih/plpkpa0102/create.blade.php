@extends('layouts.base_ata') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="">PL-PK(PA)-01/02</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/plpkpa0102">
    <div class="container-fluid mt--6">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Aduan Jalan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">

                        <div class="row">

                        
                        <div class="col-12 my-3">
                            <label for=""><strong>MAKLUMAT PENGGUNA</strong></label>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">No. Arahan Kerja</label>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_arahan_kerja" value="" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Nama Kontraktor</label>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_penerima" value="" required>
                            </div>
                        </div>
                        
                        <div class="col-6 mt-3" style="display: none;">
                            <div class="input-group">
                                <input class="form-control" type="hidden" name="bil" value="deprecated field" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Lokasi/Kedudukan</label>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="lokasi" value="" required>
                            </div>
                        </div>
                        {{-- <div class="col-12" id="form_kerosakan_div">
                        </div> --}}
                        

                        
                        <div class="col-6 mt-3">
                            <label for="">Nama Pengadu</label>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="nama_pengadu" value="" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">No Telefon Pengadu</label>
                            
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="text" name="no_telefon_pengadu" value="" required>
                            </div>
                        </div>
                        
                        <div class="col-6 mt-3">
                            <label for="">Tarikh Arahan Kerja</label>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_pengesahan" value="" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Tarikh Siap Kerja</label>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <input class="form-control" type="date" name="tarikh_siap_kerja" value="" required>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Nota</label>
                        </div>

                        <div class="col-6 mt-3">
                            <div class="input-group">
                                <textarea class="form-control" name="nota" value="" rows="5" required></textarea>
                            </div>
                        </div>
                        <hr style="width: 100%; color: black;">

                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-3">
                                    <label for=""><strong>MAKLUMAT KEROSAKAN</strong> </label>&nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="col-12" id="form_kerosakan_div"></div>
                        <input type="hidden" name="" value="{{ Auth::user()->id }}">
                        </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                    <a class="mt-5 btn btn-primary text-white" onclick="tambahKerosakan()">Tambah Kerosakan</a>
                </div>
            </div>
    </div>

    <br>
    <br>
    

    </form>


    <script>
        var form_kerosakan = `
                
                    
                    <div class="row xtra">
                        <div class="col-11">
                            <div class=" row">
                            <div class="col-2 mt-3">
                                <label for="">Kerosakan</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="kerosakan[]" value="" required>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="">Catatan</label>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="catatan[]" value="" required>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-1">
                            <a class="mt-3 align-self-end btn btn-primary text-white" onclick="$(this).closest('.xtra').remove()">-</a>
                        </div>
                        
                    </div>


                    `


      $(document).ready(function() {
        $("#form_kerosakan_div").append(form_kerosakan);
           

      });


      function tambahKerosakan() {
          $("#form_kerosakan_div").append(form_kerosakan);

      }



    </script>

@endsection
