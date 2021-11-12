@extends('layouts.base_atk') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk15</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="container-fluid mt--6">
<div id="create">
  <form method="POST" action="/info_kewatk15/{{$info_kewatk15->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
           <div class="row">
             <div class="col">
               <h2 class="mb-0">Pindahan Aset</h2>
             </div>
           </div>
         </div>
          </br>
          <div class="card-body pt-0">
            <div class="row">
                 
               <div class="col">
                 <label for="">No Siri Pendaftaran</label>
                 <div class="input-group">
                   <select class="form-control mb-3" name="no_siri_pendaftaran">
                   <option value="{{$info_kewatk15->no_siri_pendaftaran}}" selected>{{$info_kewatk15->no_siri_pendaftaran}}</option>
                   @foreach ($kewatk3a as $k3)
                   <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                   @endforeach
                 </select>
                 </div>
               </div>
           
               <div class="col">
                 <label for="">Catatan</label>
                 <div class="input-group">
                   <input class="form-control mb-3" type="text" name="catatan" value="{{$info_kewatk15->catatan}}">
                 </div>
               </div>

               <div class="col">
                 <label for="">Jenis Pindahan</label>
                 <div class="input-group">
                   <select class="form-control mb-3" name="jenis_pindahan">
                   <option value="{{$info_kewatk15->jenis_pindahan}}" selected>{{$info_kewatk15->jenis_pindahan}}</option>
                   <option value="Terimaan">Terimaan</option>
                   <option value="Pengeluaran">Pengeluaran</option>
                 </select>
                 </div>
               </div>

           
                <input class="form-control mb-3" type="hidden" name="kewatk15_id" value="{{$info_kewatk15->kewatk15_id}}">

            </div>


            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>
</div>



@endsection
