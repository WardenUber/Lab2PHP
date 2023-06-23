<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(string $slug)
    {
        try {
            /** @var Product $productModel $product */
             $product = Product::where('slug', $slug)->firstOrFail();
             $product->setCategory($product->category->name);

             return view('welcome', compact('product'));
         } catch (ModelNotFoundException) {
             abort(404);
         }
    }

}
