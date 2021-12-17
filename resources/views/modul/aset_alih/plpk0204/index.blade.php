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
              <li class="breadcrumb-item"><a href="/plpk_pa_0204">plpk_pa_0204</a></li>
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
            <h2 class="mb-0">PLPK PA 0204</h2>
          </div>
          <div class="text-end mr-2">
            <a href="/plpk_pa_0204/create" class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">

        <table class="table table-custom-simplified table-flush" id="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Bil</th>
              <th scope="col">Pemandu</th>
              <th scope="col">Milleage</th>
              <th scope="col">Tarikh Dijalankan</th>
              <th scope="col">Status</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($plpk_pa_0204 as $plpk_pa_0204)
            <tr>
              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$plpk_pa_0204->pemandu_ext->name}}</td>
              <td scope="col">{{$plpk_pa_0204->milleage}}</td>
              <td scope="col">{{$plpk_pa_0204->tarikh_dijalankan}}</td>

              @if ($plpk_pa_0204->status=="DERAF")
              <td scope="col"><span class="badge bg-warning">{{$plpk_pa_0204->status}}</span></th>
                @elseif ($plpk_pa_0204->status=="HANTAR")
              <td scope="col"><span class="badge bg-primary">{{$plpk_pa_0204->status}}</span></th>
                @elseif ($plpk_pa_0204->status=="LULUS")
              <td scope="col"><span class="badge bg-success">{{$plpk_pa_0204->status}}</span></th>
                @elseif ($plpk_pa_0204->status=="DITOLAK")
              <td scope="col"><span class="badge bg-danger">{{$plpk_pa_0204->status}}</span></th>
                @endif

              <td scope="col">
                <a href="/plpk_pa_0204/{{$plpk_pa_0204->id}}/edit"><i class="fas fa-pen"></i></a>
                <a href="/plpk_pa_0204pdf/{{$plpk_pa_0204->id}}"><i class="fas fa-print"></i></a>
                <a href="/plpk_pa_0204" onclick="deleteData({{$plpk_pa_0204}})"><i class="fas fa-trash"></i></a>
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
      url: "/plpk_pa_0204/" + id,
      type: "DELETE",
      success: function() {
        location.replace = "/plpk_pa_0204";;
      }
    })
  }
</script>

@endsection