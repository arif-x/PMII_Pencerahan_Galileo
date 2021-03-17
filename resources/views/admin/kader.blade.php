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
            Kelola Data Kader
          </h5>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Data Kader
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
        <div style="width: 100%">
          <div class="table-responsive">
            <table class="table stripe row-border order-column data-table" style="width: 100% !important">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Status Kaderisasi</th>
                  <th>Verifikasi</th>                
                  <th>Pas Foto</th>
                  <th>KTM</th>
                  <th>Detail</th>
                  <th width="280px">Atur</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>


          <div class="modal fade bd-example-modal-lg" id="detailModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content modal-long">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalHeadingDetail"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="kaderDetailForm" name="kaderDetailForm" class="form-horizontal">
                    <input type="hidden" name="kader_id_det" id="kader_id_det" value="">

                    <div class="row">
                      <div class="col-md-12">

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="nim" class="col-sm-12 control-label">NIM</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="nim_det" name="nim_det" placeholder="NIM" value="" readonly>
                              </div>
                            </div>  
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Nama</label>
                              <div class="col-sm-12">
                                <input id="name_det" name="name_det" placeholder="Nama" class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="email_det" class="col-sm-12 control-label">Email</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="email_det" name="email_det" value="" readonly>
                              </div>
                            </div>                        
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="tanggal_lahir_det" class="col-sm-12 control-label">Tanggal Lahir</label>
                              <div class="col-sm-12">
                                <input type="date" class="form-control" id="tanggal_lahir_det" name="tanggal_lahir_det" value="" readonly>
                              </div>
                            </div>
                          </div>
                        </div>  

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="jenis_kelamin_det" class="col-sm-12 control-label">Jenis Kelamin</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="jenis_kelamin_det" name="jenis_kelamin_det" value="" readonly>
                              </div>
                            </div>                        
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="jurusan_det" class="col-sm-12 control-label">Jurusan</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="jurusan_det" name="jurusan_det" value="" readonly>
                              </div>
                            </div>
                          </div>
                        </div>  

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="alamat_di_malang_det" class="col-sm-12 control-label">Alamat di Malang</label>
                              <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="alamat_di_malang_det" name="alamat_di_malang_det" value="" readonly></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="alamat_asli_det" class="col-sm-12 control-label">Alamat Asli</label>
                              <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="alamat_asli_det" name="alamat_asli_det" value="" readonly></textarea>
                              </div>
                            </div>
                          </div>
                        </div>  

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="nama_ayah_det" class="col-sm-12 control-label">Nama Ayah</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_ayah_det" name="nama_ayah_det" value="" readonly>
                              </div>
                            </div>                        
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="nama_ibu_det" class="col-sm-12 control-label">Nama Ibu</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_ibu_det" name="nama_ibu_det" value="" readonly>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="nomor_hp_det" class="col-sm-12 control-label">Nomor HP</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="nomor_hp_det" name="nomor_hp_det" value="" readonly>
                              </div>
                            </div>                        
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="minat_det" class="col-sm-12 control-label">Minat</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="minat_det" name="minat_det" value="" readonly>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="bakat_det" class="col-sm-12 control-label">Bakat</label>
                              <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="bakat_det" name="bakat_det" value="" readonly></textarea>
                              </div>
                            </div>                        
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="alasan_det" class="col-sm-12 control-label">Alasan Gabung</label>
                              <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="alasan_det" name="alasan_det" value="" readonly></textarea>
                              </div>
                            </div>
                          </div>
                        </div>                                         

                        <div class="form-group">
                          <label for="target_ke_depan_det" class="col-sm-12 control-label">Target ke Depan</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="target_ke_depan_det" name="target_ke_depan_det" value="" readonly>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
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
                  <form id="kaderForm" name="kaderForm" class="form-horizontal">
                    <input type="hidden" name="kader_id" id="kader_id" value="">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="nim" class="col-sm-12 control-label">NIM</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-12 control-label">Nama</label>
                          <div class="col-sm-12">
                            <input id="name" name="name" placeholder="Nama" class="form-control" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="text" class="col-sm-12 col-form-label">Status Kaderisasi</label>
                          <div class="col-sm-12">
                            <select id="status_kaderisasi" class="form-control" name="status_kaderisasi">
                              <option value="Mapaba">Mapaba</option>
                              <option value="PKD">PKD</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="text" class="col-sm-12 col-form-label">Verifikasi</label>
                          <div class="col-sm-12">
                            <select id="verifikasi" class="form-control" name="verifikasi">
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
            ajax: "{{ route('kader.index') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nim', name: 'nim'},
            {data: 'name', name: 'name'},
            {data: 'status_kaderisasi', name: 'status_kaderisasi'},
            {data: 'verifikasi', name: 'verifikasi'},
            {data: 'pasfoto', name: 'pasfoto'},
            {data: 'ktm', name: 'ktm'},
            {data: 'detail', name: 'detail', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });

          $('body').on('click', '.editKader', function () {
            var kader_id = $(this).data('id');
            $.get("{{ route('kader.index') }}" +'/' + kader_id +'/edit', function (data) {
              $('#modelHeading').html("Edit Kader");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#kader_id').val(data.id);
              $('#nim').val(data.nim);
              $('#name').val(data.name);
              $('#status_kaderisasi').val(data.status_kaderisasi);
              $('#verifikasi').val(data.verifikasi);
            })
          });
          $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Memproses..');

            $.ajax({
              data: $('#kaderForm').serialize(),
              url: "{{ route('kader.store') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) {
                $('#kaderForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
              },
              error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
              }
            });
          });
          $('body').on('click', '.deleteKader', function () {
            var kader_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
              type: "DELETE",
              url: "{{ route('kader.store') }}"+'/'+kader_id,
              success: function (data) {
                table.draw();
              },
              error: function (data) {
                console.log('Error:', data);
              }
            });
          });

          $('body').on('click', '.detailKader', function () {
            var kader_id = $(this).data('id');
            $.get("{{ route('kader.index') }}" +'/' + kader_id, function (data) {
              $('#modalHeadingDetail').html("Detail Kader");
              $('#detailModal').modal('show');
              $('#kader_id_det').val(data.id);
              $('#nim_det').val(data.nim);
              $('#name_det').val(data.name);
              $('#email_det').val(data.email);
              $('#tanggal_lahir_det').val(data.tanggal_lahir);
              $('#jenis_kelamin_det').val(data.jenis_kelamin);
              $('#jurusan_det').val(data.jurusan);
              $('#alamat_di_malang_det').val(data.alamat_di_malang);
              $('#alamat_asli_det').val(data.alamat_asli);
              $('#nama_ayah_det').val(data.nama_ayah);
              $('#nama_ibu_det').val(data.nama_ibu);
              $('#nomor_hp_det').val(data.no_hp);
              $('#minat_det').val(data.minat);
              $('#bakat_det').val(data.bakat);
              $('#alasan_det').val(data.alasan);
              $('#target_ke_depan_det').val(data.target_ke_depan);
            })
          });
        });
      </script>

    </div>
    <!-- Container-fluid Ends -->
  </div>
  <!--Page Body Ends-->
</div>
@endsection