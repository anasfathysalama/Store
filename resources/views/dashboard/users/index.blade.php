@extends('layouts.dashboard.app')

@section('content')
    <h4> {{__('site.users')}} </h4>

    <form action="{{ route('users.index') }}" method="get">
        <div class="row">
            <div class="col-md-4">

                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                <a href="{{ route('users.create')  }}" class="btn btn-success"><i
                        class="fa fa-plus"></i> @lang('site.add')</a>
            </div>
        </div>
    </form>
    <br>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        @if($users->count() > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.first_name')</th>
                    <th>@lang('site.last_name')</th>
                    <th>@lang('site.email')</th>
                    <th>@lang('site.image')</th>
                    <th>@lang('site.action')</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $index=>$user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ $user->image_path }}" alt="" width="70px" height="50px" class="img-thumbnail"/></td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-info btn-sm">
                                @lang('site.edit')<i class="fa fa-edit"></i>
                            </a>

                            <a href="{{ route('users.destroy', $user->id) }}" style="display: inline-block;"
                               class="btn btn-danger btn-sm">
                                @lang('site.delete')<i class="fa fa-trash"></i>
                            </a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        @else
            <h4> @lang('site.no_data_found')</h4>
        @endif


        <div>

@stop
