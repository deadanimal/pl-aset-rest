@extends('layouts.base') @section('content')
<div id="create">
  <form method="POST" action="/info_kewatk15/{{$info_kewatk15->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
          <h6 class="text-white">KEWATK 15</h6>
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



@endsection
