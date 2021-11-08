@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 12</h6>
        </div>
        <div class="col text-end">
          <a href="/kewatk12pdf/" class="btn btn-sm btn-primary"><i class="fas fa-print"></i></a>

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


<script type="text/javascript">

    $(document).ready(function () {
      initiateDatatable();

    })


</script>

@endsection
