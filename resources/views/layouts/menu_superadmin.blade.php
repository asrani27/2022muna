<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="">
            <a href="/beranda">
                <i class="fa fa-dashboard"></i> <span>Beranda</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/m/kelompok">
                <i class="fa fa-list"></i> <span>Kelompok Tani</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/m/penyuluh">
                <i class="fa fa-list"></i> <span>Penyuluh</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/m/permohonan">
                <i class="fa fa-list"></i> <span>Permohonan</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/m/bantuan">
                <i class="fa fa-list"></i> <span>Bantuan</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/m/keluhan">
                <i class="fa fa-list"></i> <span>Keluhan</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/m/tanggapan">
                <i class="fa fa-list"></i> <span>Tanggapan</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/laporan">
                <i class="fa fa-list"></i> <span>Laporan</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="">
            <a href="/logout">
                <i class="fa fa-sign-out"></i> <span>Log Out</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>

    </ul>
</section>