<div class="page-sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
        <div>
            <img class="img-50 rounded-circle" src="{{ URL::asset('logo.png') }}" alt="#">
        </div>
        <h6 class="mt-3 f-12">PMII Rayon "Pencerahan" Galileo</h6>
    </div>
    <ul class="sidebar-menu">
        <li>
            <div class="sidebar-title">Home</div>
            <a href="{{ route('index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Kembali Ke Homepage</span>
            </a>
        </li>

        <li>
            <div class="sidebar-title">Data Kader</div>
            <a href="{{ route('kader.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Data Kader PMII Rayon "Pencarahan" Galileo</span>
            </a>
        </li>

        <li>
            <div class="sidebar-title">Kelola Artikel</div>
            <a href="{{ route('article.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Verifikasi Artikel Kader</span>
            </a>
        </li>

        <li>
            <div class="sidebar-title">Kelola Event</div>
            <a href="{{ route('event.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Data Event Umum</span>
            </a>            
            <a href="{{ route('event-pengkaderan.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Data Event Pengkaderan</span>
            </a>
            <a href="{{ route('absensi-event.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Data Peserta & Absensi Event Umum</span>
            </a>
            <a href="{{ route('absensi-event-pengkaderan.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Data Peserta & Absensi Event Pengkaderan</span>
            </a>
        </li>

        <li>
            <div class="sidebar-title">Kelola Pengurus</div>
            <a href="{{ route('pengurus.index') }}" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Data Pengurus</span>
            </a>
        </li>
    </ul>
    <br><br><br><br>
    <div class="sidebar-widget text-center">
        <div class="sidebar-widget-top">
            <h6 class="mb-2 fs-14">Ada Kendala?</h6>
            <i class="icon-bell"></i>
        </div>
        <div class="sidebar-widget-bottom p-20 m-20">
            <p><a href="https://api.whatsapp.com/send?phone=6282228882543" target="_blank">Whatsapp</a>
                <br><a href="https://t.me/m_ariffudin" target="_blank">Telegram</a>
                <br><strong>Moh. Ariffudin (TI 18)</strong>
            </p>            
        </div>
    </div>
</div>