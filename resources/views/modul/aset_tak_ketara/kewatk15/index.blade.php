@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 15</h6>
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
            <th scope="col">Pemohon</th>
            <th scope="col">Penerima</th>
            <th scope="col">Penyerah</th>
            <th scope="col">Pelulus</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk15 as $k15)
          <tr>
            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k15->pemohon}}</td>
            <td scope="col">{{$k15->penerima}}</td>
            <td scope="col">{{$k15->penyerah}}</td>
            <td scope="col">{{$k15->pelulus}}</td>

            @if ($k15->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k15->status}}</span></th>
            @elseif ($k15->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k15->status}}</span></th>
            @elseif ($k15->status=="SOKONG") 
              <td scope="col"><span class="badge bg-warning">{{$k15->status}}</span></th>
            @elseif ($k15->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k15->status}}</span></th>
            @elseif ($k15->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k15->status}}</span></th>
            @endif


            @if ($k15->status=="DERAF") 
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk15" onclick="updateStatus({{$k15}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk15" onclick="updateStatus({{$k15}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk15pdf/{{$k15->id}}" ><i class="fas fa-print"></i></a>


              @else
              <a href="/kewatk15" onclick="updateStatus({{$k15}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              <a href="/kewatk15/{{$k15->id}}" ><i class="fas fa-pen"></i></a>
              <a href="/kewatk15pdf/{{$k15->id}}" ><i class="fas fa-print"></i></a>
              <a href="/kewatk15" onclick="deleteData({{$k15}})"><i class="fas fa-trash"></i></a>
              @endif
            </td>

            @elseif ($k15->status=="SOKONG") 
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk15" onclick="updateStatus({{$k15}}, 'SOKONG')"><i class="fas fa-arrow-up"></i></a>
              <a href="/kewatk15pdf/"><i class="fas fa-print"></i></a>

              <a href="/kewatk15/{{$k15->id}}" ><i class="fas fa-pen"></i></a>

              @else
              <a href="/kewatk15pdf/{{$k15->id}}"><i class="fas fa-print"></i></a>
              @endif
            </td>
            @endif


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk15" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
          <h6 class="text-white">KEWATK 15</h6>
          </div>
          </br>
          <div class="card-body pt-0">


            <div id="info_kewatk15_create"></div>

            <a id="button_aset_diperiksa" class="btn btn-sm btn-primary text-white" onclick="tambahAsetDipindah()">Tambah Aset</a>
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
        url: "/kewatk15/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk15";;
				}
      })
    } 

    function tambahAsetDipindah() {
      $("#info_kewatk15_create").append(
        `<div class="row">
            
          <div class="col">
            <label for="">No Siri Pendaftaran</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_siri_pendaftaran[]">
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
              <input class="form-control mb-3" type="text" name="catatan[]" value="">
            </div>
          </div>

          <div class="col">
            <label for="">Jenis Pindahan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jenis_pindahan[]">
              <option value="" selected disabled hidden>Pilih jenis pindahan</option>
              <option value="Terimaan">Terimaan</option>
              <option value="Pengeluaran">Pengeluaran</option>
            </select>
            </div>
          </div>

      
       </div>`
     )
    }


</script>

@endsection
