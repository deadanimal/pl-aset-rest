@extends('layouts.base_atk') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-8">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk19</a></li>
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
            <h2 class="mb-0">Info Kewatk9</h2>
          </div>
          <div class="text-end mr-2">
            <a class="align-self-end btn btn-sm btn-primary" href="/info_kewatk19/create">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">

      <table class="table table-custom-simplified table-flush" id="table">
        <thead class="thead-light">
          <tr>

            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Keadaan Aset</th>
            <th scope="col">Kaedah Pelupusan</th>
            <th scope="col">Justifikasi</th>
            <th scope="col">Catatan</th>

            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($info_kewatk19 as $info_kewatk19)
          <tr>

            <td scope="col">{{$info_kewatk9->no_siri_pendaftaran}}</td>
            <td scope="col">{{$info_kewatk9->keadaan_aset}}</td>
            <td scope="col">{{$info_kewatk9->kaedah_pelupusan}}</td>
            <td scope="col">{{$info_kewatk9->justifikasi}}</td>
            <td scope="col">{{$info_kewatk9->catatan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$k19}})"><i class="fas fa-pen"></i></a>
              <a href="/info_kewatk19" onclick="deleteData({{$k19}})"><i class="fas fa-trash"></i></a>
              <a href="/info_kewatk19pdf/{{$k19->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection
