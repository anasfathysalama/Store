@extends('layouts.dashboard.app')

@section('content')
    <h3> @lang('site.clients edit') </h3>


    <!-- general form elements -->
    <div class="box box-primary">
    @include('partials._errors')
    <!-- form start -->
        <form action="{{ route('clients.update' , $client->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}


            <div class="box-body">



                <div class="form-group">
                    <label for="exampleInputEmail1">
                        @lang('site.name')
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                           value="{{ $client->name }}" placeholder="@lang('site.name')">
                </div>




                <div class="form-group">
                    <label for="exampleInputEmail1">
                        @lang('site.phone')
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone"
                           placeholder="@lang('site.phone')" value="{{ $client->phone }}">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">
                        @lang('site.address')
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                           value="{{ $client->address }}" placeholder="@lang('site.address')">
                </div>







            </div>


            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('site.save')</button>
            </div>
        </form>
    </div>
    <!-- /.box -->


@stop
