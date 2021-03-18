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
            Kelola Data Event Pengkaderan
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
          <div class="table-responsive">
            <table class="table stripe row-border order-column data-table" style="width: 100% !important">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Event</th>
                  <th>Event Angkatan</th>
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
            ajax: "{{ route('event-pengkaderan.index') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_event', name: 'nama_event'},
            {data: 'event_angkatan', name: 'event_angkatan'},
            {data: 'tgl_mulai_regist', name: 'tgl_mulai_regist'},
            {data: 'tgl_akhir_regist', name: 'tgl_akhir_regist'},
            {data: 'tgl_mulai', name: 'tgl_mulai'},
            {data: 'tgl_akhir', name: 'tgl_akhir'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });

          $('body').on('click', '.addEvent', function () {
            $('#modelHeading').html("Edit Event");
            $('#eventForm').trigger("reset");
            $('#saveBtn').val("add-event");
            $('#ajaxModel').modal('show');
          });

          $('body').on('click', '.editEvent', function () {
            var event_id = $(this).data('id');
            $.get("{{ route('event-pengkaderan.index') }}" +'/' + event_id +'/edit', function (data) {
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

          $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Memproses..');

            $.ajax({
              data: $('#eventForm').serialize(),
              url: "{{ route('event-pengkaderan.store') }}",
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

          $('body').on('click', '.deleteEvent', function () {
            var event_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
              type: "DELETE",
              url: "{{ route('event-pengkaderan.store') }}"+'/'+event_id,
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

    </div>
    <!-- Container-fluid Ends -->
  </div>
  <!--Page Body Ends-->
</div>
@endsection