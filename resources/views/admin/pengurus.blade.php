@extends('../../layouts/admin/template')
@section('content')
<!--Page Body Start-->
<div class="page-body">
  <!-- Container-fluid starts -->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6"> 
          <h5>
            Kelola Pengurus
          </h5>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Data Pengurus
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container-fluid">
      <div class="row">   

        @if(session('sukses'))
        <div class="col-md-12">
          <div class="alert alert-success" role="alert">
            {{session('sukses')}}
          </div>
        </div>
        @endif

        <div class="col-md-12" style="margin-bottom: 30px">
          <a class="btn btn-success" href="javascript:void(0)" id="createPengurus" style="padding-botton: 20px;"> Tambah Pengurus</a>
          <br />
          <br />
        </div>
        <br />
        <div style="width: 100%">
          <div class="table-responsive">
            <table class="table stripe row-border order-column data-table" style="width: 100% !important">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th width="280px">Atur</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>

          <div class="modal fade bd-example-modal-lg" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content modal-long">
                <div class="modal-header">
                  <h4 class="modal-title" id="modelHeading"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="pengurusForm" name="pengurusForm" class="form-horizontal">
                    <input type="hidden" name="pengurus_id" id="pengurus_id" value="">

                    <div class="row">
                      <div class="col-md-12">

                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM" autocomplete="off" required />
                            <div class="dropdown-menu" id="dropdown-menu">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="text" class="col-sm-12 col-form-label">Jabatan</label>
                          <div class="col-sm-12">
                            <select id="jabatan" class="form-control" required name="jabatan">
                              <option value="Ketua Rayon">Ketua Rayon</option>
                              <option value="Wakil Ketua Rayon">Wakil Ketua Rayon</option>
                              <option value="Sekretaris">Sekretaris</option>
                              <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                              <option value="Bendahara">Bendahara</option>
                              <option value="Wakil Bendahara">Wakil Bendahara</option>
                              <option value="Co. Biro Pengkaderan">Co. Biro Pengkaderan</option>
                              <option value="Anggota Biro Pengkaderan">Anggota Biro Pengkaderan</option>
                              <option value="Co. Biro Gerakan">Co. Biro Gerakan</option>
                              <option value="Anggota Biro Gerakan">Anggota Biro Gerakan</option>
                              <option value="Co. Biro Keislaman">Co. Biro Keislaman</option>
                              <option value="Anggota Biro Keislaman">Anggota Biro Keislaman</option>
                              <option value="Co. Biro Pengembangan Wawasan">Co. Biro Pengembangan Wawasan</option>
                              <option value="Anggota Biro Pengembangan Wawasan">Anggota Biro Pengembangan Wawasan</option>
                              <option value="Co. Biro FKE">Co. Biro FKE</option>
                              <option value="Anggota Biro FKE">Anggota Biro FKE</option>
                              <option value="Forum Pengembangan Jurusan Matematika">Forum Pengembangan Jurusan Matematika</option>
                              <option value="Forum Pengembangan Jurusan Biologi">Forum Pengembangan Jurusan Biologi</option>
                              <option value="Forum Pengembangan Jurusan Kimia">Forum Pengembangan Jurusan Kimia</option>
                              <option value="Forum Pengembangan Jurusan Fisika">Forum Pengembangan Jurusan Fisika</option>
                              <option value="Forum Pengembangan Jurusan Teknik Informatika">Forum Pengembangan Jurusan Teknik Informatika</option>
                              <option value="Forum Pengembangan Jurusan Teknik Arsitektur">Forum Pengembangan Jurusan Teknik Arsitektur</option>
                              <option value="Forum Pengembangan Jurusan Perpustakaan & Ilmu Informasi">Forum Pengembangan Jurusan Perpustakaan & Ilmu Informasi</option>
                              <option value="Ketua KOPRI">Ketua KOPRI</option>
                              <option value="Sekretaris KOPRI">Sekretaris KOPRI</option>
                              <option value="Bendahara KOPRI">Bendahara KOPRI</option>
                              <option value="Co. Biro Internal">Co. Biro Internal</option>
                              <option value="Anggota Biro Internal">Anggota Biro Internal</option>
                              <option value="Co. Biro Eksternal">Co. Biro Eksternal</option>
                              <option value="Anggota Biro Eksternal">Anggota Biro Eksternal</option>
                              <option value="Direktur LSO Jurnalistik">Direktur LSO Jurnalistik</option>
                              <option value="Sekretaris LSO Jurnalistik">Sekretaris LSO Jurnalistik</option>
                              <option value="Anggota LSO Jurnalistik">Anggota LSO Jurnalistik</option>
                              <option value="Direktur LSO GAPALA">Direktur LSO GAPALA</option>
                              <option value="Sekretaris LSO GAPALA">Sekretaris LSO GAPALA</option>
                              <option value="Anggota LSO GAPALA">Anggota LSO GAPALA</option>
                              <option value="Direktur LSO Kewirausahaan">Direktur LSO Kewirausahaan</option>
                              <option value="Sekretaris LSO Kewirausahaan">Sekretaris LSO Kewirausahaan</option>
                              <option value="Anggota LSO Kewirausahaan">Anggota LSO Kewirausahaan</option>
                              <option value="Direktur LSO TEGAL">Direktur LSO TEGAL</option>
                              <option value="Sekretaris LSO TEGAL">Sekretaris LSO TEGAL</option>
                              <option value="Anggota LSO TEGAL">Anggota LSO TEGAL</option>
                            </select>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="col-md-12">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create" style="width: 100%">Simpan
                     </button>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>

       <script type="text/javascript">
        $(function () {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pengurus.index') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nim', name: 'nim'},
            {data: 'nama', name: 'nama'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });

          $('#createPengurus').click(function () {
            $('#saveBtn').val("create-pengurus");
            $('#pengurus_id').val('');
            $('#pengurusForm').trigger("reset");
            $('#modelHeading').html("Tambah Pengurus");
            $('#ajaxModel').modal('show');
          }); 

          $('body').on('click', '.editPengurus', function () {
            var pengurus_id = $(this).data('id');
            $.get("{{ route('pengurus.index') }}" +'/' + pengurus_id +'/edit', function (data) {
              $('#modelHeading').html("Edit Pengurus");
              $('#saveBtn').val("edit-pengurus");
              $('#ajaxModel').modal('show');
              $('#pengurus_id').val(data.id);
              $('#nim').val(data.nim + ' * ' + data.nama);
              $('#jabatan').val(data.jabatan);
            })
          });

          $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Memproses..');

            $.ajax({
              data: $('#pengurusForm').serialize(),
              url: "{{ route('pengurus.store') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) {
                $('#pengurusForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
              },
              error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
              }
            });
          });

          $('body').on('click', '.deletePengurus', function () {
            var pengurus_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
              type: "DELETE",
              url: "{{ route('pengurus.store') }}"+'/'+pengurus_id,
              success: function (data) {
                table.draw();
              },
              error: function (data) {
                console.log('Error:', data);
              }
            });
          });

        });

      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#nim').keyup(function(){ 
            var query = $(this).val();
            if(query != ''){
              var _token = $('input[name="_token"]').val();
              $.ajax({
                url:"{{ route('search') }}",
                method:"GET",
                data:{query:query, _token:_token},
                success:function(data){
                  $('#dropdown-menu').fadeIn();  
                  $('#dropdown-menu').html(data);
                }
              });
            }
          });

          $(document).on('click', 'li', function(){  
            $('#nim').val($(this).text());  
            $('#dropdown-menu').fadeOut();  
          });  

        });
      </script>

      <style type="text/css">
        .box{
          width:600px;
          margin:0 auto;
        }
      </style>

    </div>
    <!-- Container-fluid Ends -->
  </div>
  <!--Page Body Ends-->
</div>
@endsection