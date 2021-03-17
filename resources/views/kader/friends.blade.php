@extends('layouts.friends')

@section('content')

<br>
@if ($message = Session::get('info'))
<div class="col-md-11 alert alert-info alert-block margin-tengah">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="main-container pad10">

    <div class="container pad-card-btm">
        <div class="animation-element slide-left testimonial">
            <div class="card">
                <div class="card-header card-bg"><strong><a href="#">Cari</strong></a></div>
                <div class="card-body">
                    <form action="{{ route('kader.teman.search') }}" method="GET">          
                        <label>Cari Nama & atau Angkatan Mapaba</label>    
                        <div class="row">
                            <div class="col-md-5 mb-1">
                                <input id="nama" class="form-control" name="nama" placeholder="Nama...">
                            </div>                        
                            <div class="col-md-5 mb-1">
                                <select class="form-control" name="angkatan_mapaba">
                                    <option value="">Angkatan Mapaba</option>
                                    <option value="2019">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                </select>                                                           
                            </div>
                            <div class="col-md-2 mb-1">
                                <button type="submit" class="btn btn-primary" style="width:100%;">Cari</button>
                            </div>                        
                        </div>
                    </form>
                    <div class="mt-2">
                        <label>Atau Cari Angkatan Mapaba Langsung</label>
                        <select class="form-control" onchange="location = this.value;">
                            <option value="">Angkatan Mapaba</option>
                            <option value="/friends/angkatan/2020">2020</option>
                            <option value="/friends/angkatan/2019">2019</option>
                            <option value="/friends/angkatan/2018">2018</option>
                            <option value="/friends/angkatan/2017">2017</option>
                            <option value="/friends/angkatan/2016">2016</option>
                            <option value="/friends/angkatan/2015">2015</option>
                            <option value="/friends/angkatan/2014">2014</option>
                            <option value="/friends/angkatan/2013">2013</option>
                            <option value="/friends/angkatan/2012">2012</option>
                            <option value="/friends/angkatan/2011">2011</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($all as $a)
    <div class="container pad-card-btm">
        <div class="animation-element slide-left testimonial">
            <div class="card">
                <div class="card-header card-bg"><a href="/user-profil/{{ $a->nim }}"><strong>{{ $a->name }}</strong></a></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="/friends/{{ $a->nim }}">
                                <img src="{{ asset('storage/foto/'.$a->photo) }}" class="image-size">
                            </a>
                        </div>
                        <div class="col-md-8" style="padding-right:20px">
                            <form class="form-horizontal" role="form">
                                <div class="form-group row">
                                    <label for="nama" class="col-md-3 col-form-label text-md-right">NIM</label>
                                    <div class="col-md-9">
                                        <input id="nim" class="form-control" name="nim" value="{{ $a->nim }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-md-3 col-form-label text-md-right">Nama</label>
                                    <div class="col-md-9">
                                        <input id="nama" class="form-control" name="nama" value="{{ $a->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-md-3 col-form-label text-md-right">Jurusan</label>
                                    <div class="col-md-9">
                                        <input id="jurusan" class="form-control" name="jurusan" value="{{ $a->jurusan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-md-3 col-form-label text-md-right">Angkatan</label>
                                    <div class="col-md-9">
                                        <input id="angkatan" class="form-control" name="angkatan" value="{{ $a->angkatan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-5">
                                        <a class="btn" href="/friends/{{ $a->nim }}">Lihat Profil</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                {{ $all->links() }}
            </li>
        </ul>
    </nav>
    <div class="col-md-5">
    </div>
    <script>
        var $animation_elements = $('.animation-element');
        var $window = $(window);

        function check_if_in_view() {
            var window_height = $window.height();
            var window_top_position = $window.scrollTop();
            var window_bottom_position = (window_top_position + window_height);

            $.each($animation_elements, function() {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);

                    //check to see if this current container is within viewport
                    if ((element_bottom_position >= window_top_position) &&
                        (element_top_position <= window_bottom_position)) {
                        $element.addClass('in-view');
                } else {
                    $element.removeClass('in-view');
                }
            });
        }

        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');
    </script>
</div>

@endsection