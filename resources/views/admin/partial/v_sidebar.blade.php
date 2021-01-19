<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte') }}/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">Master Data</li> -->
            <li {!! Request::url() == route('admin.index') ? "class='active'" : null !!}>
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-money"></i> <span>Pencairan Saldo</span>
                </a>
            </li>
            <li {!! Request::url() == route('admin.history') ? "class='active'" : null !!}>
                <a href="{{ route('admin.history') }}">
                    <i class="fa fa-money"></i> <span>Catatan Pencairan Saldo</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
    </aside>