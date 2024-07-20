<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $products)
    {
        if ($request->ajax()) {
            $products = $products->orderBy('id', 'desc');
            return DataTables::eloquent($products)
                ->editColumn('name', function ($product) {
                    return $product->name;
                })
                ->editColumn('price', function ($product) {
                    return $product->price;
                })
                ->addColumn('action', function (Product $product) {
                    $editBtn = '<div class="dropdown"><a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
                    $editBtn .= '<a class="dropdown-item" href="' . route('admin.product.galleries.index', $product->id) . '"><i class="dw dw-edit2"></i> Gallery</a>';
                    $editBtn .= '<a href="javascript:;" class="dropdown-item fill_data" data-url="' . route('admin.products.edit', $product->id) . '" data-method="get"><i class="dw dw-edit2"></i> Edit</a>';
                    $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.products.destroy', $product->id) . '" data-method="delete"><i class="dw dw-delete-3"></i> Delete</a></div>';
                    return $editBtn;
                })
                ->toJson();
        } else {
            return view()->make('admin.products.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view()->make('admin.products.add',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'price' => 'required'


            );
        $messages = [
            'name.required' => 'Please enter name.',
            'price.required' => 'Please enter price.'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails())
            {
                return response()->json($validator->getMessageBag()->toArray(), 422);
            }
            try{
                $product=New Product();
                $product->name=$request->get('name');
                $product->price=$request->get('price');
                $product->description=$request->get('description');
                $product->save();
                return response()->json(['success','Product add successfully.'], 200);
            }
            catch(\Exception $e)
            {
              return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view()->make('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view()->make('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'price' => 'required'


            );
        $messages = [
            'name.required' => 'Please enter name.',
            'price.required' => 'Please enter price.'
            ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails())
                {
                    return response()->json($validator->getMessageBag()->toArray(), 422);
                }
                try{
                    $product = Product::find($id);
                    $product->name=$request->get('name');
                    $product->price=$request->get('price');
                    $product->description=$request->get('description');
                    $product->save();
                    return response()->json(['success','Product updated successfully.'], 200);
                }
                catch(\Exception $e)
                {
                  return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $product = Product::find($id);
            $product->delete();
            return response()->json(['success','Product deleted successfully'], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
