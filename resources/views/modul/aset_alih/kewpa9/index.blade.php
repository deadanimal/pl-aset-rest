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
              <li class="breadcrumb-item"><a href="/kewpa9">kewpa9</a></li>
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
            <h2 class="mb-0">Borang Permohonan Pergerakan/Pinjaman</h2>
          </div>
          <div class="text-end mr-2">
            <a href="/kewpa9/create" class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">

        <table class="table table-custom-simplified table-flush" id="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Bil</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Tempat Digunakan</th>
              <th scope="col">Status</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewpa9 as $kewpa9)
            <tr>
              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$kewpa9->tujuan}}</td>
              <td scope="col">{{$kewpa9->tempat_digunakan}}</td>

              @if ($kewpa9->status=="DERAF")
              <td scope="col"><span class="badge bg-warning">{{$kewpa9->status}}</span></th>
                @elseif ($kewpa9->status=="HANTAR")
              <td scope="col"><span class="badge bg-primary">{{$kewpa9->status}}</span></th>
                @elseif ($kewpa9->status=="LULUS")
              <td scope="col"><span class="badge bg-success">{{$kewpa9->status}}</span></th>
                @elseif ($kewpa9->status=="DITOLAK")
              <td scope="col"><span class="badge bg-danger">{{$kewpa9->status}}</span></th>
                @endif

              <td scope="col">
                <a href="/kewpa9/{{$kewpa9->id}}/edit"><i class="fas fa-pen"></i></a>
                <a href="/kewpa9pdf/{{$kewpa9->id}}"><i class="fas fa-print"></i></a>
                <a href="/kewpa9" onclick="deleteData({{$kewpa9}})"><i class="fas fa-trash"></i></a>
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
      url: "/kewpa9/" + id,
      type: "DELETE",
      success: function() {
        location.replace = "/kewpa9";;
      }
    })
  }
</script>

@endsection