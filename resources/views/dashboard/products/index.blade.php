@extends('layouts.dashboard.app')

@section('content')
    <h4> {{__('site.products')}} </h4>

    <form action="{{ route('products.index') }}" method="get">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
            </div>

            <div class="col-md-4">
                <select name="category_id" class="form-control">
                    <option value="">@lang('site.all_categories')</option>
                   @foreach($categories as $category)
                       <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                <a href="{{ route('products.create')  }}" class="btn btn-success"><i
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
        @if($products->count() > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>

                    <th>@lang('site.name')</th>
                    <th>@lang('site.description')</th>
                    <th>@lang('site.category')</th>
                    <th>@lang('site.image')</th>
                    <th>@lang('site.purshes_price')</th>
                    <th>@lang('site.sale_price')</th>
                    <th>@lang('site.profit_percent') %</th>
                    <th>@lang('site.stoke')</th>
                    <th>@lang('site.action')</th>

                </tr>
                </thead>
                <tbody>
                @foreach($products as $index=>$product)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $product->name }}</td>
                        <td>{!! $product->description !!}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><img src="{{ $product->image_path }}" alt="" width="70px" height="50px" class="img-thumbnail"/></td>
                        <td>{{ $product->purshes_price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->profit_percent }} %</td>
                        <td>{{ $product->stoke }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="btn btn-info btn-sm">
                                @lang('site.edit')<i class="fa fa-edit"></i>
                            </a>

                            <a href="{{ route('products.destroy', $product->id) }}" style="display: inline-block;"
                               class="btn btn-danger btn-sm">
                                @lang('site.delete')<i class="fa fa-trash"></i>
                            </a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        @else
            <h4 style="text-align: center; padding-bottom: 8px;"> @lang('site.no_data_found')</h4>
        @endif


        <div>

@stop
