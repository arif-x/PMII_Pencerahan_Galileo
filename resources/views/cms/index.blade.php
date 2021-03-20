@extends('layouts.cms')

@section('content')

<!-- Button trigger modal -->
<div class="mt-5">
    <div class="container">
        <div style="margin-bottom: 50px;">
            <button type="button" class="btn btn-warning text-white" id="createArticle">
                <strong>Buat Artikel</strong>
            </button>
        </div>

        <div class="table-responsive">
            <table class="table stripe row-border order-column data-table mt-4" style="width: 100% !important">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Keyword</th>
                        <th>Deskripsi</th>
                        <th>Status Verifikasi</th>
                        <th>Views</th>
                        <th width="150px">Atur</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>        
</div>


<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="modelHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Buat Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form name="contentForm" id="contentForm">
                        <input type="hidden" name="artikel_id" id="artikel_id">

                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Keyword</label>
                            <input type="text" name="keyword" id="keyword" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Desckripsi</label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" name="category" id="category" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Konten</label>
                            <textarea name="contents" id="contents" rows="50" required></textarea>
                        </div>
                        <button class="btn btn-primary btn-sm" id="saveBtn" style="width: 100%">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

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
            ajax: "{{ route('manage.index') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'keyword', name: 'keyword'},
            {data: 'description', name: 'description'},
            {data: 'status', name: 'status'},
            {data: 'views', name: 'views'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createArticle').click(function () {
            $('#saveBtn').val("create-article");
            $('#artikel_id').val('');
            $('#contentForm').trigger("reset");
            $('#modelHeading').html("Tambah Artikel");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editArticle', function () {
            var artikel_id = $(this).data('id');
            $.get("{{ route('manage.index') }}" +'/' + artikel_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Artikel");
                $('#saveBtn').val("edit-artikel");
                $('#ajaxModel').modal('show');
                $('#artikel_id').val(data.id);
                $('#title').val(data.title);
                $('#keyword').val(data.keyword);
                $('#description').val(data.description);
                $('#category').val(data.category);
                CKEDITOR.instances['contents'].setData(data.content);                
                $('#contents').val(data.contents);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Memproses..');

            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances['contents'].updateElement();
            }

            $.ajax({
                data: $('#contentForm').serialize(),
                url: "{{ route('manage.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#contentForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Simpan');
                }
            });
        });        
    });
</script>

<script>
    CKEDITOR.replace('contents', {        
        filebrowserImageBrowseUrl: '/filemanager?type=Images',
        filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/filemanager?type=Files',
        filebrowserUploadUrl: '/filemanager/upload?type=Files&_token=',
        height: 500
    });
</script>

@endsection