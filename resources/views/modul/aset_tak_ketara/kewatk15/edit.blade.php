@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">Senarai Aset Tak Ketara Yang Dipindah Untuk No.permohonan {{$kewatk15->id}}</h6>
        </div>
        <div class="col text-end">
          <button class="btn btn-sm btn-primary" id="tambah"><i class="fas fa-plus"></i></button>

        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Bil</th>
            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Catatan</th>
            <th scope="col">Jenis Pindahan</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($info_kewatk15 as $ik15)
          <tr>
            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$ik15->no_siri_pendaftaran}}</td>
            <td scope="col">{{$ik15->catatan}}</td>
            <td scope="col">{{$ik15->jenis_pindahan}}</td>


            <td scope="col">
              <a href="/info_kewatk15/{{$ik15->id}}" ><i class="fas fa-pen"></i></a>
              <a href="/kewatk15/{{$kewatk15->id}}" onclick="deleteData({{$ik15}})"><i class="fas fa-trash"></i></a>
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/info_kewatk15" enctype="multipart/form-data">
      @csrf
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
                  <option value="" selected disabled hidden>Pilih Aset</option>
                  @foreach ($kewatk3a as $k3)
                  <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                  @endforeach
                </select>
                </div>
              </div>

      
              <div class="col">
                <label for="">Catatan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="catatan" value="">
                </div>
              </div>

              <div class="col">
                 <label for="">Jenis Pindahan</label>
                 <div class="input-group">
                   <select class="form-control mb-3" name="jenis_pindahan">
                   <option value="" selected>Pilih jenis pindahan</option>
                   <option value="Terimaan">Terimaan</option>
                   <option value="Pengeluaran">Pengeluaran</option>
                 </select>
                 </div>
               </div>


              <input class="form-control mb-3" type="hidden" name="kewatk15_id" value="{{$kewatk15->id}}">

            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>



<script type="text/javascript">

    $(document).ready(function () {
      initiateDatatable();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });


    function initiateDatatable() {
      const dataTableBasic = new simpleDatatables.DataTable("#table", {
          searchable: true,
          fixedHeight: true,
          sortable: false
      });
    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk15/" + id,
        type: "DELETE",
        success: function () {
				}
      })
    } 


    </script>

@endsection
