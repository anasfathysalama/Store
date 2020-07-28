@extends('layouts.dashboard.app')

@section('content')
    <h3> @lang('site.products edit') </h3>


    <!-- general form elements -->
    <div class="box box-primary">
    @include('partials._errors')
    <!-- form start -->
        <form action="{{ route('products.update' , $product->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}

            <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">
                        @lang('site.categories')
                    </label>

                    <select name="category_id" class="form-control">
                        <option value="">@lang('site.all_categories')</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @foreach(config('translatable.locales') as $locale)

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            @lang('site.' . $locale .'.name')
                        </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="{{ $locale }}[name]"
                               value="{{ $product->name }}" placeholder="@lang('site.' . $locale .'.name')" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            @lang('site.' . $locale .'.description')
                        </label>
                        <textarea class="form-control ckeditor" id="exampleInputEmail1" name="{{ $locale }}[description]"
                                  placeholder="@lang('site.' . $locale .'.description')" >
                            {{ $product->description }}
                        </textarea>
                    </div>

                @endforeach

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.image')</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="image"
                           placeholder="@lang('site.image')">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.purshes_price')</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="purshes_price"
                           placeholder="@lang('site.purshes_price')" value="{{ $product->purshes_price }}">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.sale_price')</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="sale_price"
                           placeholder="@lang('site.sale_price')" value="{{ $product->sale_price }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('site.stoke')</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="stoke"
                           placeholder="@lang('site.stoke')" value="{{ $product->stoke }}">
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
