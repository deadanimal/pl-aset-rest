@extends('layouts.base') @section('content')
<div id="show">

  <div class="card mt-4">
    <div class="card-header text-end" style="
    background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
    ">
      <div class="row">
        <div class="col text-start">
          <h6 class="text-white">KEWATK 2</h6>
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
            <th scope="col">Tindakan Diterima</th>
            <th scope="col">Pegawai Penerima</th>
            <th scope="col">Pembekal</th>
            <th scope="col">No Rujukan Kewatk1</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk2 as $kewatk2)
          <tr>
            <td scope="col">{{$kewatk2->tindakan_diterima}}</td>
            <td scope="col">{{$kewatk2->pegawai_penerima}}</td>
            <td scope="col">{{$kewatk2->pembekal}}</td>
            <td scope="col">{{$kewatk2->no_rujukan_atk1}}</td>


            @if ($kewatk2->status=="DRAFT") 
              <td scope="col"><span class="badge bg-warning">{{$kewatk2->status}}</span></th>
            @elseif ($kewatk2->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$kewatk2->status}}</span></th>
            @elseif ($kewatk2->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$kewatk2->status}}</span></th>
            @elseif ($kewatk2->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$kewatk2->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk2" onclick="updateStatus({{$kewatk2}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk2" onclick="updateStatus({{$kewatk2}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk2pdf/"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk2" onclick="updateStatus({{$kewatk2}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($kewatk2->status=="HANTAR")
              @else
              <a href="/kewatk2/{{$kewatk2->id}}"><i class="fas fa-file"></i></a>
              <a href="#" onclick="updateData({{$kewatk2}})"><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk2pdf/{{$kewatk2->id}}"><i class="fas fa-print"></i></a>
              <a href="/kewatk2" onclick="deleteData({{$kewatk2}})"><i class="fas fa-trash"></i></a>
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
  <form method="POST" action="/kewatk2" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header" style="
          background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
          ">
              <h6 class="text-white">KEWATK 2</h6>
          </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Tindakan Diterima</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tindakan_diterima" value="">
            </div>
            <label for="">Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pembekal" value="">
            </div>

            <label for="">Jenis Penolakan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jenis_penolakan">
                <option value=""></option>
                <option value="ditolak">Kuantiti Ditolak</option>
                <option value="kurang">Kuantiti Kurang</option>
                <option value="lebih">Kuantiti Lebih</option>
              </select>
            </div>

            <label for="">No Rujukan Kewatk1</label>
            <div class="input-group">
              <select onchange="getInfoKewatk1(this)" class="form-control mb-3" name="no_rujukan_atk1">
                <option value=""></option>
                @foreach ($kewatk1 as $kew1)
                <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                @endforeach
              </select>
            </div>
          

            <div id="info_kewatk2_create"></div>

          <a id="button_tambah" class="btn btn-primary text-white" onclick="tambahAsetUntukDitolak()">Tambah Aset Untuk Ditolak</a>
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
              <h6 class="text-white">KEWATK 2</h6>
          </div>
          </br>
          <div class="card-body pt-0"> <label for="">Tindakan Diterima</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tindakan_diterima" value="">
            </div>
            <label for="">Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pembekal" value="">
            </div>
            <label for="">Jenis Penolakan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jenis_penolakan">
                <option value=""></option>
                <option value="ditolak">Kuantiti Ditolak</option>
                <option value="kurang">Kuantiti Kurang</option>
                <option value="lebih">Kuantiti Lebih</option>
              </select>
            </div>

            <label for="">No Rujukan Kewatk1</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_rujukan_atk1">
                <option value=""></option>
                @foreach ($kewatk1 as $kew1)
                  <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="status" value="">
            </div>

            
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>


<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk2_form").hide();
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

      $("#updateForm action").val("/kewatk2/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk2/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);


      $("#updateForm action").val("/kewatk2/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk2/" + obj.id)
      
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
        url: "/kewatk2/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk2";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_kewatk2_create").append(
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
