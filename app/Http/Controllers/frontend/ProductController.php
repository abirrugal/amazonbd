<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
// use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
  //List of Categories to the home page

  public function productsIndex()
  {

    // $data['products'] = Product::where('brand','Xiomi')->get();
    if (auth()->user()) {
      $data['orders'] = auth()->user()->orders;
    }

    $data['features'] = Product::select('title', 'image', 'description', 'price', 'sale_price', 'slug')->whereNotNull('sale_price')->latest()->take(12)->get();
    $data['top_products'] = Product::select('title', 'image', 'description', 'price', 'sale_price', 'slug')->where('remaining_amount', '>', 0)->latest()->take(12)->get();
    $data['recent_products'] = Product::select('title', 'image', 'description', 'price', 'sale_price', 'slug')->latest()->take(12)->get();
    $data['categories'] = Category::select('id', 'name', 'slug', 'category_id', 'banner', 'subcategory_id')->with('child_category')->where('category_id', null)->whereNull('subcategory_id')->get();
    return view('index', $data);
  }


  //All products from Category and/or Sub-category and/or Child-category (Go this page When click to Main Category)


  public function productSub_list($slug)
  {
   return $render['category'] = Category::with('child_category.childs.products')->where('slug', $slug)->first();
    $productIds = [];

    if (!empty($render['category']->products)) {
      foreach ($render['category']->products as $key => $product) {
        array_push($productIds, $product->id);
      }
    }
    if (!empty($render['category']->child_category)) {

      foreach ($render['category']->child_category as $subCategory) {

        if (!empty($subCategory->products)) {
          foreach ($subCategory->products as $product) {
            array_push($productIds, $product->id);
          }
        }

        if (!empty($subCategory->childs)) {
          foreach ($subCategory->childs as $childCategory) {
            if (!empty($childCategory->products)) {
              foreach ($childCategory->products as $product) {
                array_push($productIds, $product->id);
              }
            }
          }
        }
      }
    }

    $render['products'] = Product::whereIn('id', $productIds)->paginate(10);
    return view('frontend.products.main_category.product_list', $render);
  }



  //Products list of sub-category

  public function productList($slug)
  {

    $data['sub_category'] = Category::select('id', 'name', 'slug', 'category_id', 'banner')->where('slug', $slug)->first();

    $child = [];


    if ($data['sub_category']->products->count() > 0) {

      foreach ($data['sub_category']->products as $product) {

        array_push($child, [
          'title' => $product->title,
          'image' => $product->image,
          'price' => $product->price,
          'sale_price' => $product->sale_price,
          'id' => $product->id,
          'slug' => $product->slug,

        ]);
      }
    }


    foreach ($data['sub_category']->child as $childcat) {


      if ($childcat->products->count() > 0) {

        foreach ($childcat->products as $product) {

          array_push($child, [
            'title' => $product->title,
            'image' => $product->image,
            'price' => $product->price,
            'sale_price' => $product->sale_price,
            'id' => $product->id,
            'slug' => $product->slug,

          ]);
        }
      }
    }
    $data['products'] = $this->paginate($child, 12, '', ['path' => Paginator::resolveCurrentPath()]);

    $data['child_categories'] =  $data['sub_category']->child()->paginate(10);
    return view('frontend.products.product_list', $data);
  }
  //List of Child-Category

  public function productListChild($slug)
  {

    $child = [];

    $data['child_category'] = Category::select('id', 'name', 'slug', 'category_id', 'banner')->where('slug', $slug)->first();

    if ($data['child_category']->products->count() > 0) {

      foreach ($data['child_category']->products as $product) {

        array_push($child, [
          'title' => $product->title,
          'image' => $product->image,
          'price' => $product->price,
          'sale_price' => $product->sale_price,
          'id' => $product->id,
          'slug' => $product->slug,

        ]);
      }
    }

    $data['products'] = $this->paginate($child, 12, '', ['path' => Paginator::resolveCurrentPath()]);

    return view('frontend.products.products_list_from_child', $data);
  }


  //Show Individual Product Info

  public function productShow($slug)
  {
    $data['product'] = Product::where('slug', $slug)->first();

    return view('frontend.products.show', $data);
  }

  //Featured Products

  public function featuredProducts()
  {
    $data['products'] = Product::select('title', 'image', 'description', 'price', 'sale_price', 'slug')->whereNotNull('sale_price')->paginate(12);
    return view('frontend.products.feature.feature_products', $data);
  }
  //Best selling Products

  public function topProducts()
  {

    $data['products'] = Product::select('title', 'image', 'description', 'price', 'sale_price', 'slug')->where('remaining_amount', '>', 0)->latest()->paginate(12);
    return view('frontend.products.top_seller.top_seller', $data);
  }
  //New Products

  public function recentProducts()
  {
    $data['products'] = Product::select('title', 'image', 'description', 'price', 'sale_price', 'slug')->latest()->paginate(12);
    return view('frontend.products.new_arrived.new_arrived_products', $data);
  }


  //Custom Pagination

  public function paginate($items, $perPage = 5, $page = null, array $options = [])
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }
}
