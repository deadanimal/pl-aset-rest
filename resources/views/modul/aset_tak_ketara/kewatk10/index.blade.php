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
                <li class="breadcrumb-item"><a href="/kewatk10">Kewatk10</a></li>
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
            <h2 class="mb-0">Laporan Pemeriksaan Harta</h2>
          </div>
          <div class="text-end mr-2">
            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
          </div>
        </div>
      </div>
    <br>
    <div class="card-body pt-0">
      <label for="">Laporan Pemeriksaan Harta</label>
        <div class="input-group">
          <select onchange="janaLaporan()" class="form-control mb-3" name="tahun_pilihan">
            <option value="" selected disabled hidden>Pilih Tahun</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
          </select>
        </div>

          <a id="button_cetak" href="" class="btn btn-sm btn-primary text-white">Cetak Laporan</a>&nbsp;&nbsp;<a id="button_sijil" class="btn btn-sm btn-primary text-white">Cetak Sijil</a>
        </div>

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
    $("#button_cetak").attr("href", "/kewatk10pdf/" + tahun_dipilih)
    $("#button_sijil").attr("href", "/kewatk11pdf/" + tahun_dipilih)

  }


</script>

@endsection
