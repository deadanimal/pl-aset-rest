@extends('layouts.base') @section('content') <div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 7</h6>
        </div>
        <div class="col text-end">
          <button class="btn btn-sm btn-primary" id="tambah"><i class="fas fa-plus"></i></button>

        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Bahagian</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Pemohon</th>
            <th scope="col">Pengeluar</th>
            <th scope="col">Pemulang</th>
            <th scope="col">Pelulus</th>
            <th scope="col">Penerima</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk7 as $k7)
          <tr>
            <td scope="col">{{$k7->bahagian}}</td>
            <td scope="col">{{$k7->tujuan}}</td>
            <td scope="col">{{$k7->pemohon}}</td>
            <td scope="col">{{$k7->pengeluar}}</td>
            <td scope="col">{{$k7->pemulang}}</td>
            <td scope="col">{{$k7->pelulus}}</td>
            <td scope="col">{{$k7->penerima}}</td>

            @if ($k7->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k7->status}}</span></th>
            @elseif ($k7->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k7->status}}</span></th>
            @elseif ($k7->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k7->status}}</span></th>
            @elseif ($k7->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k7->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk7" onclick="updateStatus({{$k7}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk7" onclick="updateStatus({{$k7}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk7pdf/"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk7" onclick="updateStatus({{$k7}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($k7->status=="HANTAR")
              @else

              <!-- detail show <a href="/kewatk7/{{$k7->id}}"><i class="fas fa-file"></i></a> -->
              <a href="#" onclick="updateData({{$k7}})"><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk7pdf/{{$k7->id}}"><i class="fas fa-print"></i></a>
              <a href="/kewatk7" onclick="deleteData({{$k7}})"><i class="fas fa-trash"></i></a>
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
  <form method="POST" action="/kewatk7" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 7</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Tujuan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tujuan" value="">
            </div>
            <label for="">Pengeluar</label>
            <div class="input-group">
              <select class="form-control mb-3" name="pengeluar">
                <option value=""></option>
                @foreach ($pengeluars as $pengeluar)
                <option value="{{$pengeluar->name}}">{{$pengeluar->name}}</option>
                @endforeach
              </select>

            </div>
            <label for="">Tempat Digunakan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="kod_lokasi">
                <option value=""></option>
                @foreach ($kod_lokasis as $kod_lokasi)
                <option value="{{$kod_lokasi->id}}">{{$kod_lokasi->nama_lokasi}}</option>
                @endforeach
              </select>
            </div>
            
            <div id="info_kewatk7_create"></div>

          <a id="button_tambah" class="btn btn-primary text-white" onclick="tambahInfoKewatk7()">Tambah Aset</a>
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="          
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 7</h6>
          </div>
          </br>
          <div class="card-body pt-0"> 
            <label for="">Tujuan</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tujuan" value="">
            </div>
            <label for="">Pengeluar</label>
            <div class="input-group">
              <select class="form-control mb-3" name="pengeluar">
                <option value=""></option>
              </select>

            </div>
            <label for="">Tempat Digunakan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="kod_lokasi">
                <option value=""></option>
                @foreach ($kod_lokasis as $kod_lokasi)
                <option value="{{$kod_lokasi->id}}">{{$kod_lokasi->nama_lokasi}}</option>
                @endforeach
              </select>
            </div>

            <div id="info_kewatk7_update"></div>
            
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>


<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk7_form").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {
      console.log("ob", obj);

      $("#show").hide();

      // prepare data for kewatk7
      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=tujuan]").val(obj.tujuan);
      $("#updateForm input[name=pemohon]").val(obj.pemohon);
      $("#updateForm select[name=pengeluar]").val(obj.pengeluar);
      $("#updateForm select[name=kod_lokasi]").val(obj.kod_lokasi);
      $("#updateForm input[name=pemulang]").val(obj.pemulang);
      $("#updateForm input[name=pelulus]").val(obj.pelulus);
      $("#updateForm input[name=penerima]").val(obj.penerima);

      editInfoKewatk7(obj);
      
      $("#updateForm action").val("/kewatk7/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk7/" + obj.id)
      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      console.log(obj, mode)

      $("#updateForm input[name=status]").val(mode);

      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=tujuan]").val(obj.tujuan);
      $("#updateForm input[name=pemohon]").val(obj.pemohon);
      $("#updateForm input[name=pengeluar]").val(obj.pengeluar);
      $("#updateForm input[name=pemulang]").val(obj.pemulang);
      $("#updateForm input[name=pelulus]").val(obj.pelulus);
      $("#updateForm input[name=penerima]").val(obj.penerima);

      $("#updateForm action").val("/kewatk7/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk7/" + obj.id)
      
      var values = {};
      $.each($('#updateForm').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });

      var url = $("#updateForm").attr('action');
      console.log("v", values);

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
        url: "/kewatk7/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk7";;
				}
      })

    } 

    function tambahInfoKewatk7() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_kewatk7_create").append(
         `<div class="row">
              
            <div class="col">
              <label for="">No Siri Pendaftaran</label>
              <select onchange="updateTajukAset(this)" class="form-control mb-3" name="no_siri_pendaftaran[]">
                <option value=""></option>
                @foreach ($kewatk3a as $k3)
                <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                @endforeach
              </select>
            </div>



            <div class="col">
              <label for="">Tarikh Dipinjam</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_dipinjam[]" value="">
              </div>
            </div>
            <div class="col">
              <label for="">Tarikh Pulang</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_pulang[]" value="">
              </div>
            </div>

            <!-- cuma tunjuk element ini selepas permohonan lulus
            <div class="col">
              <label for="">Tarikh Dipulangkan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_dipulangkan[]" value="">
              </div>
            </div>
            <div class="col">
              <label for="">Tarikh Diterima</label>
              <div class="input-group">
                <input class="form-control mb-3" type="date" name="tarikh_diterima[]" value="">
              </div>
            </div>
            -->

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="">
              </div>
            </div>
          </div>`

     )

    }

    function getInfoKewatk7(obj) {
      $("#button_tambah").show();

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk7/" + obj.value,
        type: "GET",
        success: function (data) {
          no_kod = data;
				}
      })

    }

    function updateTajukAset(obj) {
      var kewatk3a = <?php echo $kewatk3a; ?>


      for (let i = 0; i < kewatk3a.length; i++) {
        if (kewatk3a[i].no_siri_pendaftaran==obj.value) {

          console.log($("#info_kewatk7_create input[name=tajuk]").val(kewatk3a[i].rajuk));
          
        }

      }


    }


    function editInfoKewatk7(obj) {
      var elements = "";
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk7/" + obj.id,
        type: "GET",
        success: function (data) {
          let element = ""
          for (let i=0; i < data.length; i++) {
            $("#info_kewatk7_update").append(
              `<div class="row">
                    
                  <div class="col">
                    <label for="">No Siri Pendaftaran</label>
                    <select class="form-control mb-3" name="no_siri_pendaftaran[]">
                      <option value="${data[i].no_siri_pendaftaran}" selected="selected">${data[i].no_siri_pendaftaran}</option>
                      @foreach ($kewatk3a as $k3)
                      <option value="{{$k3->no_siri_pendaftaran}}">{{$k3->no_siri_pendaftaran}}</option>
                      @endforeach
                    </select>
                  </div>

                  <input class="form-control mb-3" type="hidden" name="id[]" value="${data[i].id}">

                  <div class="col">
                    <label for="">Tarikh Dipinjam</label>
                    <div class="input-group">
                      <input class="form-control mb-3" type="date" name="tarikh_dipinjam[]" value="${data[i].tarikh_dipinjam}">
                    </div>
                  </div>
                  <div class="col">
                    <label for="">Tarikh Pulang</label>
                    <div class="input-group">
                      <input class="form-control mb-3" type="date" name="tarikh_pulang[]" value="${data[i].tarikh_pulang}">
                    </div>
                  </div>

                  <!-- cuma tunjuk element ini untuk pelulus sahaja 
                  <div class="col">
                    <label for="">Tarikh Dipulangkan</label>
                    <div class="input-group">
                      <input class="form-control mb-3" type="date" name="tarikh_dipulangkan[]" value="">
                    </div>
                  </div>
                  <div class="col">
                    <label for="">Tarikh Diterima</label>
                    <div class="input-group">
                      <input class="form-control mb-3" type="date" name="tarikh_diterima[]" value="">
                    </div>
                  </div>
                  -->

                  <div class="col">
                    <label for="">Catatan</label>
                    <div class="input-group">
                      <input class="form-control mb-3" type="text" name="catatan[]" value="${data[i].catatan}">
                    </div>
                  </div>
                </div>`);
          }
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

        


</script>

@endsection
