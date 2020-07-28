@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>


        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li class="active"><a href="{{ route('users.index') }}"></a>@lang('site.users')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('layouts.dashboard.message')

        @yield('content')

    </section>
    <!-- /.content -->
</div>

@include('layouts.dashboard.footer')


