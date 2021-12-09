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
                <li class="breadcrumb-item"><a href="">Kewatk12</a></li>
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
            <h2 class="mb-0">Penyelenggaraan Berjadual</h2>
          </div>
          <div class="text-end mr-2">
            <a href="/kewatk12pdf/" class="align-self-end btn btn-sm btn-primary" id="tambah">Jana Laporan</a>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">
  
        <table class="table table-custom-simplified table-flush" id="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Bil</th>
              <th scope="col">No Siri Pendaftaran</th>
              <th scope="col">Kumpulan Aset</th>
              <th scope="col">Tajuk</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Tempoh Penyelenggaraan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewatk12 as $k12)
            <tr>
              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">{{$k12->no_siri_pendaftaran}}</td>
              <td scope="col">{{$k12->kumpulan_aset}}</td>
              <td scope="col">{{$k12->rajuk}}</td>
              <td scope="col">{{$k12->lokasi}}</td>
              <td scope="col">{{$k12->tempoh_selenggara}}</td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
</script>

@endsection
