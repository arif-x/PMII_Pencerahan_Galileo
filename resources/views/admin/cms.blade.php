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
            Kelola Data Artikel
          </h5>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Data Artikel
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

        </div>
        <br />
        <div class="table-responsive">
          <table class="table stripe row-border order-column data-table" style="width: 100% !important">
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Lihat</th>
                <th>Status</th>
                <th>Verifikasi</th>
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
                  <form id="articleForm" name="articleForm" class="form-horizontal">
                    <input type="hidden" name="artikel_id" id="artikel_id" value="">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="title" class="col-sm-12 control-label">Judul</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" value="" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="text" class="col-sm-12 col-form-label">Verifikasi</label>
                          <div class="col-sm-12">
                            <select id="status" class="form-control" name="status">
                              <option value="Terverifikasi">Terverifikasi</option>
                              <option value="Ditolak">Ditolak</option>
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
            ajax: "{{ route('article.index') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'lihat', name: 'lihat'},
            {data: 'status', name: 'status'},
            {data: 'verification', name: 'verification', orderable: false, searchable: false},
            ]
          });

          $('body').on('click', '.verify', function () {
            var artikel_id = $(this).data('id');
            $.get("{{ route('article.index') }}" +'/' + artikel_id +'/edit', function (data) {
              $('#modelHeading').html("Edit Artikel");
              $('#saveBtn').val("edit-artikel");
              $('#ajaxModel').modal('show');
              $('#artikel_id').val(data.id);
              $('#title').val(data.title);
              $('#status').val(data.status);
            })
          });
          
          $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Memproses..');

            $.ajax({
              data: $('#articleForm').serialize(),
              url: "{{ route('article.store') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) {
                $('#articleForm').trigger("reset");
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