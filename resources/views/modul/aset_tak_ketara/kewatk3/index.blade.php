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
                <li class="breadcrumb-item"><a href="">Kewatk3a</a></li>
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
            <h2 class="mb-0">Pendaftaran Aset</h2>
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
            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Agensi</th>
            <th scope="col">Bahagian</th>
            <th scope="col">Kod Nasional</th>
            <th scope="col">Kategori</th>
            <th scope="col">Sub Kategori</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk3a as $kewatk3a)
          <tr>
            <td scope="col">{{$kewatk3a->no_siri_pendaftaran}}</td>
            <td scope="col">{{$kewatk3a->agensi}}</td>
            <td scope="col">{{$kewatk3a->bahagian}}</td>
            <td scope="col">{{$kewatk3a->kod_nasional}}</td>
            <td scope="col">{{$kewatk3a->kategori}}</td>
            <td scope="col">{{$kewatk3a->sub_kategori}}</td>


            @if ($kewatk3a->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$kewatk3a->status}}</span></th>
            @elseif ($kewatk3a->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$kewatk3a->status}}</span></th>
            @elseif ($kewatk3a->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$kewatk3a->status}}</span></th>
            @elseif ($kewatk3a->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$kewatk3a->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk3a" onclick="updateStatus({{$kewatk3a}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk3a" onclick="updateStatus({{$kewatk3a}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk3apdf/"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk3a" onclick="updateStatus({{$kewatk3a}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($kewatk3a->status=="HANTAR")
              @else
              <a href="#" onclick="updateData({{$kewatk3a}})"><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk3apdf/{{$kewatk3a->id}}"><i class="fas fa-print"></i></a>
              <a href="/kewatk3a" onclick="deleteData({{$kewatk3a}})"><i class="fas fa-trash"></i></a>
              @endif
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk3a" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Pendaftaran Aset</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">
            <div class="row">

            <div class="col-4">
            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Bahagian</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="bahagian" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Kod Nasional</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kod_nasional" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kategori" value="">
            </div>

            </div>


            <div class="col-4">
            <label for="">Cara Aset Diperolehi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="cara_aset_diperolehi" value="">
            </div>

            </div>


            <div class="col-4">
            <label for="">Sub Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="sub_kategori" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Jenis</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Tajuk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="rajuk" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Penyelenggaraan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="status_selenggara">
                  <option value="" selected disabled hidden>sila pilih</option>
                  <option value="ya">ya</option>
                  <option value="tidak">tidak</option>
                </select>

            </div>

            </div>

            <div class="col-4">
            <label for="">Tempoh Penyelenggaraan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_selenggara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Nombor Dalam Negara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nombor_dalam_negara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Nombor Luar Negara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nombor_luar_negara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Tarikh Lulus Luput Dalam</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_lulus_luput_dalam" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Tarikh Lulus Luput Luar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_lulus_luput_luar" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Permohonan Dalam</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_permohonan_dalam" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Permohonan Luar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_permohonan_luar" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Cipta Dalam</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_cipta_dalam" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Usia Guna</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="usia_guna" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Spesifikasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="spesifikasi" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Harga Perolehan Asal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="harga_perolehan_asal" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dibeli</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dibeli" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">No Pesanan</label>
            <div class="input-group">
                <select onchange="getInfoKewatk1(this)" class="form-control mb-3" name="no_pesanan">
                  <option value="" required selected disabled hidden>Pilih No. Pesanan</option required>
                  @foreach ($kewatk1 as $kew1)
                  <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                  @endforeach
                </select>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tempoh Jaminan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Nama Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_pembekal" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Alamat Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="alamat_pembekal" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Ketua Jabatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="ketua_jabatan" value="">
            </div>
            </div>

            </div>


            <div id="info_kewatk3a_create"></div>


            <div class="mt-4" id="penempatan_baru_create" style="display: none;">
              <div class="row">
                <div class="col">
                  <label for="">lokasi</label>

                  <div class="input-group">
                    <select id="no_kod_select" class="form-control mb-3" name="kod_lokasi">
                    <option value="" required selected disabled hidden>Pilih Lokasi Penempatan</option required>
                    @foreach ($lokasi as $lok)
                    <option value="{{$lok->kod_lokasi}}">{{$lok->nama_lokasi}}</option>
                    @endforeach
                    </select>

                  </div>
                </div>
                <div class="col">
                  <label for="">medium storan</label>
                  <div class="input-group">
                    <select id="medium_storan_create" class="form-control mb-3" name="medium_storan">

                    <option value="" required selected disabled hidden>Pilih Medium Storan</option required>
                    </select>

                  </div>
                </div>
              </div>

            </div>


            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a id="button_penempatan" class="btn btn-sm btn-primary text-white" onclick="buatPenempatanBaru()">Penempatan Baru</a>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Sunting Pendaftaran Aset</h2>
               </div>
             </div>
           </div>


          </br>
          <div class="card-body pt-0"> <label for="">Tindakan Diterima</label>
            <div class="row">

            <div class="col-4">
            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Bahagian</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="bahagian" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Kod Nasional</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kod_nasional" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kategori" value="">
            </div>

            </div>


            <div class="col-4">
            <label for="">Cara Aset Diperolehi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="cara_aset_diperolehi" value="">
            </div>

            </div>


            <div class="col-4">
            <label for="">Sub Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="sub_kategori" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Jenis</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="jenis" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Tajuk</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="rajuk" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Penyelenggaraan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="status_selenggara">
                  <option value="" selected disabled hidden>sila pilih</option>
                  <option value="ya">ya</option>
                  <option value="tidak">tidak</option>
                </select>

            </div>

            </div>

            <div class="col-4">
            <label for="">Tempoh Penyelenggaraan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_selenggara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Nombor Dalam Negara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nombor_dalam_negara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Nombor Luar Negara</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nombor_luar_negara" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Tarikh Lulus Luput Dalam</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_lulus_luput_dalam" value="">
            </div>

            </div>

            <div class="col-4">
            <label for="">Tarikh Lulus Luput Luar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_lulus_luput_luar" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Permohonan Dalam</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_permohonan_dalam" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Permohonan Luar</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_permohonan_luar" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Cipta Dalam</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_cipta_dalam" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Usia Guna</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="usia_guna" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Spesifikasi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="spesifikasi" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Harga Perolehan Asal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="harga_perolehan_asal" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Tarikh Dibeli</label>
            <div class="input-group">
              <input class="form-control mb-3" type="date" name="tarikh_dibeli" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">No Pesanan</label>
            <div class="input-group">
                <select onchange="getInfoKewatk1(this)" class="form-control mb-3" name="no_pesanan">
                  <option value="" required selected disabled hidden>Pilih No. Pesanan</option required>
                  @foreach ($kewatk1 as $kew1)
                  <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                  @endforeach
                </select>
            </div>
            </div>

            <div class="col-4">
            <label for="">Tempoh Jaminan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tempoh_jaminan" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Nama Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="nama_pembekal" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Alamat Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="alamat_pembekal" value="">
            </div>
            </div>

            <div class="col-4">
            <label for="">Ketua Jabatan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="ketua_jabatan" value="">
            </div>
            </div>

            </div>


            <div id="info_kewatk3a_create"></div>


            <div class="mt-4" id="penempatan_baru_update" style="display: none;">
              <div class="row">
                <div class="col">
                  <label for="">lokasi</label>

                  <div class="input-group">
                    <select id="no_kod_select" class="form-control mb-3" name="kod_lokasi">
                    <option value="" required selected disabled hidden>Pilih Lokasi Penempatan</option required>
                    @foreach ($lokasi as $lok)
                    <option value="{{$lok->kod_lokasi}}">{{$lok->nama_lokasi}}</option>
                    @endforeach
                    </select>

                  </div>
                </div>
                <div class="col">
                  <label for="">medium storan</label>
                  <div class="input-group">
                    <select id="medium_storan_create" class="form-control mb-3" name="medium_storan">

                    <option value="" required selected disabled hidden>Pilih Medium Storan</option required>
                    </select>

                  </div>
                </div>
              </div>

            </div>

          <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>
</div>


<script type="text/javascript">
    
    var no_kod = [];
    var kod_lokasi = <?php echo $lokasi; ?>

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk3a_form").hide();
      $("#button_tambah").hide();


    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      // get penempatan data
      var penempatan_data = getPenempatanData(obj)
      // var pembaharuan_sijil = getPembaharuanSijil(obj)
      // var pemeriksaan = getPemeriksaan(obj)
      // var usia_guna = getUsiaGuna(obj)
      // var pindahan = getPindahan(obj)


      $("#show").hide();

      $("#updateForm input[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=agensi]").val(obj.agensi);
      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=kod_nasional]").val(obj.kod_nasional);
      $("#updateForm input[name=cara_aset_diperolehi]").val(obj.cara_aset_diperolehi);
      $("#updateForm input[name=kategori]").val(obj.kategori);
      $("#updateForm input[name=sub_kategori]").val(obj.sub_kategori);
      $("#updateForm input[name=jenis]").val(obj.jenis);
      $("#updateForm select[name=status_selenggara]").val(obj.status_selenggara);
      $("#updateForm input[name=tempoh_selenggara]").val(obj.status_selenggara);
      $("#updateForm input[name=rajuk]").val(obj.rajuk);
      $("#updateForm input[name=nombor_dalam_negara]").val(obj.nombor_dalam_negara);
      $("#updateForm input[name=nombor_luar_negara]").val(obj.nombor_luar_negara);
      $("#updateForm input[name=tarikh_lulus_luput_dalam]").val(obj.tarikh_lulus_luput_dalam);
      $("#updateForm input[name=tarikh_lulus_luput_luar]").val(obj.tarikh_lulus_luput_luar);
      $("#updateForm input[name=tarikh_permohonan_dalam]").val(obj.tarikh_permohonan_dalam);
      $("#updateForm input[name=tarikh_permohonan_luar]").val(obj.tarikh_permohonan_luar);
      $("#updateForm input[name=tarikh_cipta_dalam]").val(obj.tarikh_cipta_dalam);
      $("#updateForm input[name=usia_guna]").val(obj.usia_guna);
      $("#updateForm input[name=spesifikasi]").val(obj.spesifikasi);
      $("#updateForm input[name=harga_perolehan_asal]").val(obj.harga_perolehan_asal);
      $("#updateForm input[name=tarikh_dibeli]").val(obj.tarikh_dibeli);
      $("#updateForm input[name=no_pesanan]").val(obj.no_pesanan);
      $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
      $("#updateForm input[name=status]").val(obj.status);
      $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
      $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
      $("#updateForm input[name=staff_id]").val(obj.staff_id);
      $("#updateForm input[name=ketua_jabatan]").val(obj.ketua_jabatan);      


      $("#updateForm action").val("/kewatk3a/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk3a/" + obj.id)
      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=no_siri_pendaftaran]").val(obj.no_siri_pendaftaran);
      $("#updateForm input[name=agensi]").val(obj.agensi);
      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=kod_nasional]").val(obj.kod_nasional);
      $("#updateForm input[name=cara_aset_diperolehi]").val(obj.cara_aset_diperolehi);
      $("#updateForm input[name=kategori]").val(obj.kategori);
      $("#updateForm input[name=sub_kategori]").val(obj.sub_kategori);
      $("#updateForm input[name=jenis]").val(obj.jenis);
      $("#updateForm input[name=rajuk]").val(obj.rajuk);
      $("#updateForm input[name=nombor_dalam_negara]").val(obj.nombor_dalam_negara);
      $("#updateForm select[name=status_selenggara]").val(obj.status_selenggara);
      $("#updateForm input[name=tempoh_selenggara]").val(obj.status_selenggara);
      $("#updateForm input[name=nombor_luar_negara]").val(obj.nombor_luar_negara);
      $("#updateForm input[name=tarikh_lulus_luput_dalam]").val(obj.tarikh_lulus_luput_dalam);
      $("#updateForm input[name=tarikh_lulus_luput_luar]").val(obj.tarikh_lulus_luput_luar);
      $("#updateForm input[name=tarikh_permohonan_dalam]").val(obj.tarikh_permohonan_dalam);
      $("#updateForm input[name=tarikh_permohonan_luar]").val(obj.tarikh_permohonan_luar);
      $("#updateForm input[name=tarikh_cipta_dalam]").val(obj.tarikh_cipta_dalam);
      $("#updateForm input[name=usia_guna]").val(obj.usia_guna);
      $("#updateForm input[name=spesifikasi]").val(obj.spesifikasi);
      $("#updateForm input[name=harga_perolehan_asal]").val(obj.harga_perolehan_asal);
      $("#updateForm input[name=tarikh_dibeli]").val(obj.tarikh_dibeli);
      $("#updateForm input[name=no_pesanan]").val(obj.no_pesanan);
      $("#updateForm input[name=tempoh_jaminan]").val(obj.tempoh_jaminan);
      $("#updateForm input[name=nama_pembekal]").val(obj.nama_pembekal);
      $("#updateForm input[name=alamat_pembekal]").val(obj.alamat_pembekal);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm input[name=staff_id]").val(obj.staff_id);
      $("#updateForm input[name=ketua_jabatan]").val(obj.ketua_jabatan);      

      $("#updateForm action").val("/kewatk3a/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk3a/" + obj.id)
      
      var values = {};
      $.each($('#updateForm').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });
      console.log(values);

      var url = $("#updateForm").attr('action');

      $.ajax({
        type: "POST",
        url: url,
        data: values, // serializes the form's elements.
        success: function(data)
        {
        }
      });
    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk3a/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk3a";;
				}
      })
    } 

    function buatPenempatanBaru() {
      $("#penempatan_baru_create").show();

     }

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_kewatk3a_create").append(
          `<div class="row">
              
            <div class="col">
              <label for="">No Kod</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="no_kod[]">
                ${option_data}
                </select>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="">
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih[]" value="">
              </div>
            </div>

            <div class="col">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="">
              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="">
              </div>
            </div>

         </div>`
     )

    }

    function getInfoKewatk1(obj) {

      $("#medium_storan_create option").remove();

      var option_data = ""

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk1/" + obj.value,
        type: "GET",
        success: function (data) {

          no_kod = data;
          for (let i=0; i < no_kod.length; i++) {
            option_data = option_data + `<option value=${no_kod[i].medium}>${no_kod[i].medium}</option>`
          }

          $("#medium_storan_create").append(option_data);


				}
      })

    }

    function initiateDatatable() {
      const dataTableBasic = new simpleDatatables.DataTable("#table", {
          searchable: true,
          fixedHeight: true,
          sortable: false
      });
    }


    function getPenempatanData(obj) {
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk3a_penempatan/" + obj.id,
        type: "GET",
        success: function (data) {
          console.log("data penempatan", data);

          $("#medium_storan_create").append(option_data);


				}
      })
    }



</script>

@endsection
