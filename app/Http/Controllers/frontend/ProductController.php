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

  public function categoryProducts($slug)
  {
    $render['category'] = Category::where('slug', $slug)->first();
    $productIds = $this->getProductIds($slug);
    $render['products'] = Product::whereIn('id', $productIds)->paginate(10);
    return view('frontend.products.main_category.product_list', $render);
  }


  //Products list of sub-category

  public function subCategoryProducts($slug)
  {
    $render['sub_category'] = Category::where('slug', $slug)->first();
    $productIds = $this->getProductIds($slug);
    $render['products'] = Product::whereIn('id', $productIds)->paginate(10);
    $render['child_categories'] =  $render['sub_category']->childs()->paginate(10);
    return view('frontend.products.product_list', $render);
  }
  //List of Child-Category

  public function childCategoryProducts($slug)
  {
    $render['child_category'] = Category::where('slug', $slug)->first();
    $productIds = $this->getProductIds($slug);
    $render['products'] = Product::whereIn('id', $productIds)->paginate(10);
    return view('frontend.products.products_list_from_child', $render);
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

  public function getProductIds($slug)
  {
    $render['category'] = Category::with('child_category', 'products', 'child_category.childs.products')->where('slug', $slug)->first();
    $productIds = [];

    //Gatting products ids from category.

    if (!empty($render['category']->products)  && isset($render['category']->products)) {
      foreach ($render['category']->products as $key => $product) {
        array_push($productIds, $product->id);
      }
    }

    //Gatting products ids from sub category.

    if (!empty($render['category']->child_category) && isset($render['category']->child_category)) {
      foreach ($render['category']->child_category as $subCategory) {

        if (!empty($subCategory->products)  && isset($subCategory->products)) {
          foreach ($subCategory->products as $key => $product) {
            array_push($productIds, $product->id);
          }
        }


        if (!empty($subCategory->childs)  && isset($subCategory->childs)) {
          foreach ($subCategory->childs as $key => $childCategory) {

            foreach ($childCategory->products as $key => $product) {
              array_push($productIds, $product->id);
            }
          }
        }
      }
    }

    //Gatting products ids from child category.

    if (!empty($render['category']->childs)  && isset($render['category']->childs)) {
      foreach ($render['category']->childs as $key => $childCategory) {

        foreach ($childCategory->products as $key => $product) {
          array_push($productIds, $product->id);
        }
      }
    }

    return $productIds;
  }
}
