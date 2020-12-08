<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SiteImage;
use App\SubCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        // return $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::with('image')->get();
        $products = Product::with('images')->orderBy('id','desc')->take(10)->get();

        return response()->json([
            'categories' => $categories,
            'products' => $products
        ], 200);
    }

    public function get_category()
    {
        $all_category = Category::with('image')->with('subcategories')->get();
        $data = [];
        $categories = [];
        if (count($all_category) > 0) {
            $data = [
                'status' => 200
            ];
            foreach ($all_category as $category) {
                $img = $category->image != null ? $category->image->image : '';
                $subcategories = [];
                foreach ($category->subcategories as $sub) {
                    $subcategories[] = $sub->id;
                }
                //dd($subcategories);
                $categories[] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'image' => $img,
                    'subcategories' => $subcategories
                ];
            }
        } else {
            $data = [
                'status' => 404
            ];
        }

        $data['categories'] = $categories;
        return json_encode($data);
    }

    public function get_subcategory()
    {
        $all_subcategory = SubCategory::with('image')->get();
        $subcategories = [];
        $data = [];
        if (count($all_subcategory) > 0) {
            $data = [
                'status' => 200
            ];
            foreach ($all_subcategory as $sub) {
                $img = $sub->image != null ? $sub->image->image : '';

                $subcategories[] = [
                    'id' => $sub->id,
                    'category_id' => $sub->category_id,
                    'name' => $sub->name,
                    'image' => $img,
                ];
            }
        } else {
            $data = [
                'status' => 404
            ];
        }

        $data['subcategories'] = $subcategories;
        // dd($data);

        return json_encode($data);
    }

    public function get_product()
    {
        $all_product = Product::with('images')
            ->with('business')
            ->get();
        $data = [];
        $products = [];
        if (count($all_product) > 0) {
            $data = [
                'status' => 200
            ];
            foreach ($all_product as $product) {
                $images = [];
                $features = [];

                foreach ($product->images as $img) {
                    $images[] = $img->image;
                }

                $all_features = \App\ProductExtraFeatures::query()
                    ->where('product_id', $product->id)
                    ->get();
                if (count($all_features) > 0) {
                    foreach ($all_features as $feature) {
                        //dd($feature);
                        $features[] = [
                            'size' => $feature->size,
                            'color' => $feature->color,
                            'quantity' => $feature->quantity
                        ];
                    }
                }
                $products[] = [
                    'id' => $product->id,
                    'category' => $product->subCategory->category->name,
                    'subcategory' => $product->subCategory->name,
                    'title' => $product->title,
                    'code' => $product->product_code,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'slug' => $product->slug,
                    'total_product' => $product->total_product,
                    'images' => $images,
                    'business' => $product->productable->name,
                    'features' => $features,
                ];
            }
        } else {
            $data = [
                'status' => 404
            ];
        }
        $data['products'] = $products;
        //dd($data);
        return json_encode($data);
    }

    public function vendor_product($id)
    {
        $all_product = Product::with('images')
            ->where('productable_id', $id)
            ->get();
        $data = [];
        $products = [];
        if (count($all_product) > 0) {
            $data = [
                'status' => 200
            ];
            foreach ($all_product as $product) {
                $images = [];
                $features = [];

                foreach ($product->images as $img) {
                    $images[] = $img->image;
                }

                $all_features = \App\ProductExtraFeatures::query()
                    ->where('product_id', $product->id)
                    ->get();

                if (count($all_features) > 0) {
                    foreach ($all_features as $feature) {
                        //dd($feature);
                        $features[] = [
                            'size' => $feature->size,
                            'color' => $feature->color,
                            'quantity' => $feature->quantity
                        ];
                    }
                }

                $products[] = [
                    'id' => $product->id,
                    'category' => $product->subCategory->category->name,
                    'subcategory' => $product->subCategory->name,
                    'title' => $product->title,
                    'code' => $product->product_code,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'slug' => $product->slug,
                    'total_product' => $product->total_product,
                    'images' => $images,
                    'features' => $features,
                ];
            }
        } else {
            $data = [
                'status' => 404
            ];
        }
        $data['products'] = $products;
        //dd($data);
        return json_encode($data);
    }

    public function single_product($id)
    {
        $product = Product::findOrFail('id')
            ->with('images')
            ->with('business');
        $data = [];
        $spec_product = [];
        if ($product != null) {
            $data = [
                'status' => 200
            ];

            $images = [];
            $features = [];

            foreach ($product->images as $img) {
                $images[] = $img->image;
            }

            $all_features = \App\ProductExtraFeatures::query()
                ->where('product_id', $product->id)
                ->get();
            if (count($all_features) > 0) {
                foreach ($all_features as $feature) {
                    //dd($feature);
                    $features[] = [
                        'size' => $feature->size,
                        'color' => $feature->color,
                        'quantity' => $feature->quantity
                    ];
                }
            }
            $spec_product[] = [
                'id' => $product->id,
                'category' => $product->subCategory->category->name,
                'subcategory' => $product->subCategory->name,
                'title' => $product->title,
                'code' => $product->product_code,
                'price' => $product->price,
                'discount' => $product->discount,
                'slug' => $product->slug,
                'total_product' => $product->total_product,
                'images' => $images,
                'business' => $product->productable->name,
                'features' => $features,
            ];
        } else {
            $data = [
                'status' => 404
            ];
        }
        $data['product'] = $spec_product;
        //dd($data);
        return json_encode($data);
    }
}
