<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        @include('layouts.dashboard.menu')


    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('/') }}/desgin/adminlte/dist/img/user2-160x160.jpg" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> {{ trans('site.dashboard') }}
                </a>
            </li>


            <li>
                <a href="{{ route('users.index')  }}"><i class="fa fa-users"></i>
                {{ trans('site.users') }}
                <a/>
            </li>

            <li>
                <a href="{{ route('categories.index')  }}"><i class="fa fa-circle-o"></i>
                {{ trans('site.categories') }}
                </a>
            </li>

            <li>
                <a href="{{ route('products.index')  }}"><i class="fa fa-circle-o"></i>
                {{ trans('site.products') }}
                </a>
            </li>

            <li>
                <a href="{{ route('clients.index')  }}"><i class="fa fa-circle-o"></i>
                    {{ trans('site.clients') }}
                </a>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
