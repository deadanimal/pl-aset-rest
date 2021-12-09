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
<div id="show">
  <div class="card mt-4">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h2 class="mb-0">Pindahan Aset</h2>
          </div>
          <div class="text-end mr-2">
            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
          </div>
        </div>
      </div>
    <div class="table-responsive py-4">

      <table class="table table-custom-simplified table-flush" id="table">
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
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h2 class="mb-0">Tambah Penyelenggaraan</h2>
              </div>
            </div>
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


</div>

<script type="text/javascript">

    $(document).ready(function () {
      initiateDatatable();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
      tambahAsetDipindah();
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
              <option value="" required selected disabled hidden>Pilih Aset</option>
              @foreach ($kewatk3a as $k3)
              <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
              @endforeach
            </select>
            </div>
          </div>
      
          <div class="col">
            <label for="">Catatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
            </div>
          </div>

          <div class="col">
            <label for="">Jenis Pindahan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jenis_pindahan[]">
              <option value="" required selected disabled hidden>Pilih jenis pindahan</option>
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
