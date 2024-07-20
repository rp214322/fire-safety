<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $product_id)
    {
        if ($request->ajax()) {
            $photos = ProductGallery::where('product_id', $product_id)->orderBy('id', 'ASC');
            return DataTables::eloquent($photos)
                ->editColumn('file_name', function ($photo) {
                    return '<img src="' . $photo->file_url() . '">';
                })
                ->editColumn('file_type', function ($photo) {
                    return $photo->file_type;
                })
                ->editColumn('is_featured', function ($photo) {
                    $status = $photo->is_featured ? "True" : 'False';
                    return $status;
                })
                ->addColumn('action', function (ProductGallery $photo) {
                    $editBtn = '<div class="dropdown"><a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
                    $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.product.galleries.update', [$photo->product_id, $photo->id]) . '" data-method="patch"><i class="dw dw-edit2"></i> Make Featured</a>';
                    $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.product.galleries.destroy', [$photo->product_id, $photo->id]) . '" data-method="delete"><i class="dw dw-delete-3"></i> Delete</a></div>';
                    return $editBtn;
                })
                ->rawColumns(["file_name", "action"])
                ->make(true);
        } else {
            return view()->make('admin.products.galleries', compact('product_id'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $rules = array(
            'files' => 'required',
        );
        $messages = [
            'files.required' => 'Please select files.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try {
            foreach ($request->get('files') as $file) {
                $photo = new ProductGallery();
                $photo->product_id = $product_id;
                $photo->file_name = $file['file'];
                $photo->file_type = substr($file['type'], 0, strpos($file['type'], "/"));
                $photo->save();
            }
            return response()->json(['success', 'Product Image added successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $product_id)
{
    try {
        // Update all images to be not featured
        ProductGallery::where('product_id', $product_id)->update(['is_featured' => false]);

        // Set the selected image as featured
        $photo = ProductGallery::find($id);

        // Check if the photo exists
        if ($photo) {
            $photo->is_featured = true;
            $photo->save();

            return response()->json(['success' => 'Product Image updated successfully.'], 200);
        } else {
            // If the photo doesn't exist
            return response()->json(['error' => 'Photo not found.'], 404);
        }
    } catch (\Exception $e) {
        // Handle any unexpected exceptions
        return response()->json(['error' => 'Something went wrong, Please try after sometime.'], 422);
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $product_id)
    {
        try {
            $photo = ProductGallery::find($id);
            $photo->delete();

            return response()->json(['success' => 'Product Images deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong, Please try after sometime.'], 422);
        }
    }
}
