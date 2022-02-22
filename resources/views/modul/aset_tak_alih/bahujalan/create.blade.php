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
                                <li class="breadcrumb-item"><a href="">BahubahuJalan</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <form method="POST" action="/bahujalan">
            @csrf
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-0">Pendaftaran BahuJalan</h2>
                        </div>
                    </div>
                </div>

                </br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="">ID Jalan</label>
                            <select name="jalan_id" class="form-control">
                                @foreach ($jalan as $j)
                                    <option value="{{ $j->id }}">{{ $j->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="">Lebar Bahu</label>
                            <input class="form-control" type="number" step="0.01" name="lebar_bahu" value="">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="">Jenis Bahu</label>
                            <select class="form-control" name="jenis_bahu" >
                              <option value="Concrete">Concrete</option>
                              <option value="Grass">Grass</option>
                              <option value="Laterite">Laterite</option>
                              <option value="Bitumen">Bitumen</option>
                           </select> 

                        </div>
                        <div class="col-4 mb-3">
                            <label for="">Jenis Longkang</label>
                            <select class="form-control" name="jenis_longkang" >
                              <option value="Concrete">Concrete</option>
                              <option value="Bitumen">Bitumen</option>
                              <option value="Earth">Earth</option>
                           </select> 


                        </div>
                        <div class="col-4 mb-3">
                            <label for="">Lebar Laluan</label>
                            <input class="form-control" type="number" step="0.01" name="lebar_laluan" value="">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="">Catatan</label>
                            <input class="form-control" type="text" name="catatan" value="">
                        </div>


                    </div>

                    <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>



@endsection
