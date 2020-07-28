@extends('layouts.dashboard.app')

@section('content')
    <h3> @lang('site.categories create') </h3>


    <!-- general form elements -->
    <div class="box box-primary">
    @include('partials._errors')
    <!-- form start -->
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}

            <div class="box-body">

               @foreach(config('translatable.locales') as $locale)

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            @lang('site.' . $locale .'.name')
                        </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="{{ $locale }}[name]"
                               value="{{ old( $locale . '.name') }}" placeholder="@lang('site.' . $locale .'.name')" >
                    </div>

                @endforeach




            </div>
            <!-- /.box-body -->



            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('site.save')</button>
            </div>
        </form>
    </div>
    <!-- /.box -->


@stop
