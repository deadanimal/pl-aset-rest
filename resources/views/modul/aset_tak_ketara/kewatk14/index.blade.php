@extends('layouts.base') @section('content')
<div id="show">
  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 14</h6>
        </div>
        <div class="col text-end">
        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">
      <label for="">Laporan Penyelenggaraan Aset Tak Ketara</label>
        <div class="input-group">
          <select onchange="janaLaporan()" class="form-control mb-3" name="tahun_pilihan">
            <option value="" selected disabled hidden>Pilih Tahun</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
          </select>
        </div>

          <a id="button_cetak" href="" class="btn btn-sm btn-primary text-white">Cetak Laporan</a>        
        </div>

        </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  var tahun_dipilih = "";
  var data_document;
  function janaLaporan() {
    tahun_dipilih = $("[name=tahun_pilihan]").val();
    $("#button_cetak").attr("href", "/kewatk14pdf/" + tahun_dipilih)

  }


</script>

@endsection
