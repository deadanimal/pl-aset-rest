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
              <li class="breadcrumb-item"><a href="/kewpa13">kewpa13</a></li>
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
            <h2 class="mb-0">Sijil Pemeriksaan</h2>
          </div>
          <div class="text-end mr-2">
            <a href="/kewpa/create" class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">

        <table class="table table-custom-simplified table-flush" id="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Bil</th>
              <th scope="col"></th>
              <th scope="col">Agensi</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Status</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewpa13 as $kewpa13)
            <tr>
              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">No Rujukan {{$kewpa1->id}}</td>
              <td scope="col">{{$kewpa1->agensi}}</td>
              <td scope="col">{{$kewpa1->bahagian}}</td>

              @if ($kewpa1->status=="DERAF")
              <td scope="col"><span class="badge bg-warning">{{$kewpa1->status}}</span></th>
                @elseif ($kewpa13->status=="HANTAR")
              <td scope="col"><span class="badge bg-primary">{{$kewpa1->status}}</span></th>
                @elseif ($kewpa13->status=="LULUS")
              <td scope="col"><span class="badge bg-success">{{$kewpa1->status}}</span></th>
                @elseif ($kewpa13->status=="DITOLAK")
              <td scope="col"><span class="badge bg-danger">{{$kewpa1->status}}</span></th>
                @endif

              <td scope="col">
                <a href="/kewpa13/{{$kewpa13->id}}/edit"><i class="fas fa-pen"></i></a>
                <a href="/kewpa13pdf/{{$kewpa13->id}}"><i class="fas fa-print"></i></a>
                <a href="/kewpa13" onclick="deleteData({{$kewpa1}})"><i class="fas fa-trash"></i></a>
              </td>

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
      url: "/ke/" + id,
      type: "DELETE",
      success: function() {
        location.replace = "/kew";;
      }
    })
  }
</script>

@endsection