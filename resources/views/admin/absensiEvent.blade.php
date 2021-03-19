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
            Kelola Data Peserta & Absensi Event Umum
          </h5>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Data Peserta & Absensi Event Umum
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container-fluid">
      <div class="row">   

        <div class="col-md-12" style="margin-bottom: 30px">          

        </div>
        <br />
        <div style="width: 100%">
          <p class="text-right">*Cari Data Berdasarkan Nama Peserta/Nama Event</p>
          <div class="table-responsive">
            <table class="table stripe row-border order-column data-table" style="width: 100% !important">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Event</th>
                  <th>Email</th>
                  <th>Nama Peserta</th>
                  <th>Rayon</th>
                  <th>Kehadiran</th>
                  <th>Atur Kehadiran</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

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
                    <form id="absensiForm" name="absensiForm" class="form-horizontal">
                      <input type="hidden" name="absensi_id" id="absensi_id" value="">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="event" class="col-sm-12 control-label">Nama Event</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="event" name="event" disabled>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="nama" class="col-sm-12 control-label">Nama</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama" name="nama" value="" disabled>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="text" class="col-sm-12 col-form-label">Absensi</label>
                            <div class="col-sm-12">
                              <select id="kehadiran" class="form-control" name="kehadiran">
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                                <option value="Tidak Hadir">Pending</option>
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
          ajax: "{{ route('absensi-event.index') }}",
          columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'event', name: 'event'},
          {data: 'email', name: 'email'},
          {data: 'nama', name: 'nama'},
          {data: 'rayon', name: 'rayon'},
          {data: 'kehadiran', name: 'kehadiran', searchable: false},
          {data: 'option', name: 'option', searchable: false},
          ]
        });

        $('body').on('click', '.opsi', function () {
          var absensi_id = $(this).data('id');
          $.get("{{ route('absensi-event.index') }}" +'/' + absensi_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Absensi");
            $('#saveBtn').val("edit-absensi");
            $('#ajaxModel').modal('show');
            $('#absensi_id').val(data.id);
            $('#event').val(data.event);
            $('#nama').val(data.nama);            
            $('#kehadiran').val(data.kehadiran);
          })
        });

        $('#saveBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Save Changes');

          $.ajax({
            data: $('#absensiForm').serialize(),
            url: "{{ route('absensi-event.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
              $('#absensiForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
            },
            error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
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