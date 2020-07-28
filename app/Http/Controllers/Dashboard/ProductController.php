<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $products = Product::when(request('serach'), function ($q) {

            return $q->whereTranslationLike('name', '%' . request('serach') . '%');

        })->when(request('category_id'), function ($q) {

            return $q->where('category_id' , request('category_id'));

        })->latest()->paginate(5);

        return view('dashboard.products.index', compact('categories', 'products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',

        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => 'required'];
            $rules += [$locale . '.description' => 'required'];
        }

        $rules += [
            'purshes_price' => 'required',
            'sale_price' => 'required',
            'stoke' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/products_image/' . $request->image->hashName());
        }

        $request_data['image'] = $request->image->hashName();
        Product::create($request_data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('dashboard.products.edit' , compact('categories' , 'product'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::FindOrFail($id);
        $rules = [
            'category_id' => 'required',

        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => 'required'];
            $rules += [$locale . '.description' => 'required'];
        }

        $rules += [
            'purshes_price' => 'required',
            'sale_price' => 'required',
            'stoke' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            if ($product->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/products_image/' . $product->image);
            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/products_image/' . $request->image->hashName());

            $request_data['image'] = $request->image->hashName();

        }



        $product->update($request_data);
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image != "default.png") {
            Storage::disk('public_uploads')->delete('/products_image/' . $product->image);
        }
        $product->delete();
        return redirect()->route('products.index');
    }

}
