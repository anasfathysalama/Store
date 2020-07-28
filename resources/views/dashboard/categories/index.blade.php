@extends('layouts.dashboard.app')

@section('content')
    <h4> {{__('site.categories')}} </h4>

    <form action="{{ route('categories.index') }}" method="get">
        <div class="row">
            <div class="col-md-4">

                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                <a href="{{ route('categories.create')  }}" class="btn btn-success"><i
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
        @if($categories->count() > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>

                    <th>@lang('site.name')</th>
                    <th>@lang('site.product_count')</th>
                    <th>@lang('site.related_product')</th>
                    <th>@lang('site.action')</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $index=>$category)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <a href="{{ route('products.index' , ['category_id' => $category->id ]) }}" class="btn btn-info btn-sm">@lang('site.related_product')</a>
                        </td>

                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="btn btn-info btn-sm">
                                @lang('site.edit')<i class="fa fa-edit"></i>
                            </a>

                            <a href="{{ route('categories.destroy', $category->id) }}" style="display: inline-block;"
                               class="btn btn-danger btn-sm">
                                @lang('site.delete')<i class="fa fa-trash"></i>
                            </a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        @else
            <h4 style="text-align: center; padding-bottom: 8px;"> @lang('site.no_data_found')</h4>
        @endif


        <div>

@stop
