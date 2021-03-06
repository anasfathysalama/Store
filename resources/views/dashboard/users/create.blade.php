@extends('layouts.dashboard.app')

@section('content')
    <h3> @lang('site.users create') </h3>


    <!-- general form elements -->
    <div class="box box-primary">
    @include('partials._errors')
    <!-- form start -->
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}

            <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.first_name')</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="first_name"
                           value="{{ old('first_name') }}" placeholder="@lang('site.first_name')">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.last_name')</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="last_name"
                           value="{{ old('last_name') }}" placeholder="@lang('site.last_name')">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.email')</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                           value="{{ old('email') }}" placeholder="@lang('site.email')">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.image')</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="image"
                           placeholder="@lang('site.image')">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('site.password')</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="@lang('site.password')">
                </div>

            </div>
            <!-- /.box-body -->



            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('site.save')</button>
            </div>
        </form>
    </div>
    <!-- /.box -->


@stop
