@extends('layouts.dashboard.app')

@section('content')
    <h3> @lang('site.clients create') </h3>


    <!-- general form elements -->
    <div class="box box-primary">
    @include('partials._errors')
    <!-- form start -->
        <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}

            <div class="box-body">


                <div class="form-group">
                    <label for="exampleInputEmail1">
                        @lang('site.name')
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                           value="{{ old('name') }}" placeholder="@lang('site.name')">
                </div>




                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            @lang('site.phone')
                        </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone"
                               placeholder="@lang('site.phone')" value="{{ old('phone') }}">
                    </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">
                        @lang('site.address')
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                           value="{{ old('address') }}" placeholder="@lang('site.address')">
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
