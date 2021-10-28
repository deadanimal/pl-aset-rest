@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 5</h6>
        </div>
        <div class="col text-end">

          <a class="btn btn-sm btn-primary" href="/kewatk5pdf/" id="tambah"><i class="fas fa-print"></i></a>

        </div>
      </div>
    </div>
    </br>
    <div class="card-body pt-0">

      <table class="table" id="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No Siri Pendaftaran</th>
            <th scope="col">Tajuk</th>
            <th scope="col">Cara Aset Diperolehi</th>
            <th scope="col">Tarikh Terima</th>
            <th scope="col">Harga Perolehan Asal(RM)</th>
            <th scope="col">Anggaran Nilai Semasa(RM)</th>
            <th scope="col">Status Aset</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk5 as $kewatk5)
          <tr>
            <td scope="col">NA</td>
            <td scope="col">{{$kewatk5->rajuk}}</td>
            <td scope="col">{{$kewatk5->cara_aset_diperolehi}}</td>
            <td scope="col">{{$kewatk5->tarikh_dibeli}}</td>
            <td scope="col">{{$kewatk5->harga_perolehan_asal}}</td>
            <td scope="col">NA</td>
            <td scope="col">NA</td>
         </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk5_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);
      $("#updateForm input[name=status]").val(obj.status);

      $("#updateForm action").val("/kewatk5/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk5/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);


      $("#updateForm action").val("/kewatk5/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk5/" + obj.id)
      
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
        url: "/kewatk5/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk5";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_kewatk5_create").append(
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
      $("#button_tambah").show();

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk1/" + obj.value,
        type: "GET",
        success: function (data) {
          no_kod = data;
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
