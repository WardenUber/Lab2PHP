<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use App\Http\Requests\ControllerRequest;

class CategoryController extends Controller
{

       //Get product from child categories using filter by cost
       private function getProductsOfSubCat(
        string     $categoryStr,
        Category   $category,
        Collection &$products,
        float      $min = null,
        float      $max = null
    ): void
    {
        $nowCat = $categoryStr.$category->name;
        $query = $category->products();

        if (!empty($min) || !empty($max)) {
            $filter = [];
            if (!empty($min)) {
                $filter[] = ['cost', '>=', $min];
            }
            if (!empty($max)) {
                $filter[] = ['cost', '<=', $max];
            }
            $query->where($filter);
        }

        $received = $query->get();

        foreach ($received as $product) {
            $product->setCategory($nowCat);
            $products->add($product);
        }
        if (isset($category->childCategoryRec)) {
            foreach ($category->childCategoryRec as $subcat) {
                $this->getProductsOfSubCat($nowCat . '/', $subcat, $products);
            }
        }

}
    public function __invoke(ControllerRequest $request, string $slug)
    {
        //Create collection with params and send it in View with pagination
        try {

            $min = $request->get('min');
            $max = $request->get('max');
            
            $category = Category::where([
                ['slug', $slug],
                ['activity', true],
            ])->with('childCategoryRec')->firstOrFail();

            $products = new Collection();
            $this->getProductsOfSubCat('', $category, $products, $min, $max);
            $products = $products->paginate(6);

            return view('CategoryView', [
                'categoryName' => $category->name,
                'products' => $products,
            ]);
        } catch (ModelNotFoundException) {
            abort(404);
        }
    }
 
}
