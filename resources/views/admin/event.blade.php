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
            Kelola Data Event
          </h5>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Data Event
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

        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Tambah Event" class="btn btn-success btn-sm addEvent">Tambah Event</a>

        <div class="col-md-12" style="margin-bottom: 30px">

        </div>
        <br />
        <div style="width: 100%">
          <div class="">
            <table class="table stripe row-border order-column data-table table-responsive" style="width: 100% !important">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Event</th>
                  <th>Tempat</th>
                  <th>Event Angkatan</th>                  
                  <th>Gambar</th>
                  <th>Tanggal Mulai Pendaftaran</th>
                  <th>Tanggal Akhir Pendaftaran</th>
                  <th>Tanggal Mulai Pelaksanaan</th>
                  <th>Tanggal Akhir Pelaksanaan</th>
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
                  <form id="eventForm" name="eventForm" class="form-horizontal">
                    <input type="hidden" name="event_id" id="event_id" value="">

                    <div class="row">
                      <div class="col-md-12">

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Nama Event</label>
                              <div class="col-sm-12">
                                <input type="text" id="nama_event" name="nama_event" placeholder="Nama Event" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">                              
                              <label class="col-sm-12 control-label">Event Angkatan</label>
                              <div class="col-sm-12">
                                <input type="number" id="event_angkatan" name="event_angkatan" class="form-control" required>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="input-group">
                            <label class="control-label">Pilih Gambar</label>
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white" type="button" style="width:100% !important">
                                <i class="fa fa-picture-o"></i> Pilih Gambar
                              </a>
                            <input id="thumbnail" class="form-control" type="hidden" name="filepath">
                          </div>
                          <div class="text-center">
                            <div id="holder" style="margin-top:15px;margin-bottom:15px;height:auto;"></div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="text" class="col-sm-12 col-form-label">Tempat</label>
                          <div class="col-sm-12">
                            <input type="text" id="tempat" name="tempat" class="form-control" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="text" class="col-sm-12 col-form-label">Tanggal Mulai Pendaftaran</label>
                              <div class="col-sm-12">
                                <input type="date" id="tgl_mulai_regist" name="tgl_mulai_regist" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="text" class="col-sm-12 col-form-label">Tanggal Akhir Pendaftaran</label>
                              <div class="col-sm-12">
                                <input type="date" id="tgl_akhir_regist" name="tgl_akhir_regist" class="form-control" required>
                              </div>
                            </div>
                          </div>
                        </div>                        

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="text" class="col-sm-12 col-form-label">Tanggal Mulai Pelaksanaan</label>
                              <div class="col-sm-12">
                                <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="text" class="col-sm-12 col-form-label">Tanggal Akhir Pelaksanaan</label>
                              <div class="col-sm-12">
                                <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" required>
                              </div>
                            </div>
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

         <div class="modal fade bd-example-modal-lg" id="ajaxModelDelete" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content modal-long">
                <div class="modal-header">
                  <h4 class="modal-title" id="modelHeadingDelete"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="eventFormDelete" name="eventFormDelete" class="form-horizontal">
                    <input type="hidden" name="event_id_delete" id="event_id_delete" value="">

                    <div class="row">
                      <div class="col-md-12">

                        <h4>Ingin Menghapus Event <strong id="nama_event_delete"></strong>?</h4>

                      </div>
                    </div>
                    <div class="col-md-12">
                     <button type="submit" class="btn btn-danger" id="saveBtnDelete" value="delete" style="width: 100%">Hapus
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
            ajax: "{{ route('event.index') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_event', name: 'nama_event'},
            {data: 'tempat', name: 'tempat'},
            {data: 'event_angkatan', name: 'event_angkatan'},
            {data: 'img', name: 'img', orderable: false, searchable: false},
            {data: 'tgl_mulai_regist', name: 'tgl_mulai_regist'},
            {data: 'tgl_akhir_regist', name: 'tgl_akhir_regist'},
            {data: 'tgl_mulai', name: 'tgl_mulai'},
            {data: 'tgl_akhir', name: 'tgl_akhir'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });

          $('body').on('click', '.addEvent', function () {
            $('#modelHeading').html("Tambah Event");
            $('#eventForm').trigger("reset");
            $('#saveBtn').val("add-event");
            $('#ajaxModel').modal('show');
          });

          $('body').on('click', '.editEvent', function () {
            var event_id = $(this).data('id');
            $.get("{{ route('event.index') }}" +'/' + event_id +'/edit', function (data) {
              $('#modelHeading').html("Edit Event");
              $('#saveBtn').val("edit-event");
              $('#ajaxModel').modal('show');
              $('#event_id').val(data.id);
              $('#nama_event').val(data.nama_event);
              $('#event_angkatan').val(data.event_angkatan);
              $('#tgl_mulai_regist').val(data.tgl_mulai_regist);
              $('#tgl_akhir_regist').val(data.tgl_akhir_regist);
              $('#tgl_mulai').val(data.tgl_mulai);
              $('#tgl_akhir').val(data.tgl_akhir);
            })
          });

          $('body').on('click', '.deleteEvent', function () {
            var event_id = $(this).data('id');
            $.get("{{ route('event.index') }}" +'/' + event_id +'/edit', function (data) {
              $('#modelHeadingDelete').html("Hapus Event");
              $('#saveBtnDelete').val("delete-event");
              $('#ajaxModelDelete').modal('show');
              $('#event_id_delete').val(data.id);
              $('#nama_event_delete').html(data.nama_event);
            })
          });

          $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Memproses..');

            $.ajax({
              data: $('#eventForm').serialize(),
              url: "{{ route('event.store') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) {
                $('#eventForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
              },
              error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
              }
            });
          });  

          $('#saveBtnDelete').click(function (e) {
            var event_id =$("#event_id_delete").val();
            e.preventDefault();
            $(this).html('Memproses..');
            $.ajax({
              data: $('#eventFormDelete').serialize(),
              url: "{{ route('event.store') }}"+'/'+event_id,
              type: "DELETE",
              dataType: 'json',
              success: function (data) {
                $('#eventFormDelete').trigger("reset");
                $('#ajaxModelDelete').modal('hide');
                table.draw();
              },
              error: function (data) {
                console.log('Error:', data);
                $('#saveBtnDelete').html('Save Changes');
              }
            });
          });          
        });
      </script>

      <script>
        var route_prefix = "/filemanager";
      </script>

      <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
      </script>
      <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
      </script>

      <style type="text/css">
        #holder img {
          max-width: 100% !important;
          height: 100% !important;
        }
      </style>

    </div>
    <!-- Container-fluid Ends -->
  </div>
  <!--Page Body Ends-->
</div>
@endsection