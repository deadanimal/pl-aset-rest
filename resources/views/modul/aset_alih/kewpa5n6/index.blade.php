@extends('layouts.base_pa') @section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
              <li class="breadcrumb-item"><a href="/kewpa5n6/create">kewpa5 & 6</a></li>
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
            <h2 class="mb-0">Penaiktarafan Aset</h2>
          </div>
          <div class="text-end mr-2">
            <a href="/kewpa5n6pdf" class="align-self-end btn btn-sm btn-primary" id="tambah">Cetak</a>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">

        <table class="table table-custom-simplified table-flush" id="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Bil</th>
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Cara Aset Diperolehi</th>
              <th scope="col">Status Aset</th>
              <th scope="col">Jumlah Nilai Semasa</th>
              <th scope="col">Jumlah Perolehan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewpa5n6 as $kewpa5n6)
            <tr>
              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$kewpa5n6->no_siri_pendaftaran}}</td>
              <td scope="col">{{$kewpa5n6->cara_aset_diperolehi}}</td>
              <td scope="col">{{$kewpa5n6->status_aset}}</td>
              <td scope="col">{{$kewpa5n6->jumlah_nilai_semasa}}</td>
              <td scope="col">{{$kewpa5n6->jumlah_perolehan}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  var no_kod = [];
  $(document).ready(function() {
    initiateDatatable();
    $("#button_tambah").hide();


  })


  function deleteData(obj) {
    var id = obj.id;
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/kewpa5n6/" + id,
      type: "DELETE",
      success: function() {
        location.replace = "/kewpa5n6";;
      }
    })
  }
</script>

@endsection