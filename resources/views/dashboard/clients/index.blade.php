@extends('layouts.dashboard.app')

@section('content')
    <h4> {{__('site.clients')}} </h4>

    <form action="{{ route('clients.index') }}" method="get">
        <div class="row">
            <div class="col-md-4">

                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                <a href="{{ route('clients.create')  }}" class="btn btn-success"><i
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
        @if($clients->count() > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>

                    <th>@lang('site.name')</th>
                    <th>@lang('site.phone')</th>
                    <th>@lang('site.address')</th>
                    <th>@lang('site.add_order')</th>
                    <th>@lang('site.action')</th>


                </tr>
                </thead>
                <tbody>
                @foreach($clients as $index=>$client)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone  }}</td>
                        <td>{{ $client->address }}</td>
                        <td><a href="{{  route('orders.create' , $client->id) }}" class="btn btn-success btn-sm">@lang('site.add_order')</a></td>


                        <td>
                            <a href="{{ route('clients.edit', $client->id) }}"
                               class="btn btn-info btn-sm">
                                @lang('site.edit')<i class="fa fa-edit"></i>
                            </a>

                            <a href="{{ route('clients.destroy', $client->id) }}" style="display: inline-block;"
                               class="btn btn-danger btn-sm">
                                @lang('site.delete')<i class="fa fa-trash"></i>
                            </a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $clients->links() }}
        @else
            <h4 style="text-align: center; padding-bottom: 8px;"> @lang('site.no_data_found')</h4>
        @endif


        <div>

@stop
