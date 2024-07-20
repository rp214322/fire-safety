<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->per_page = $request->has('per_page') ? $request->get('per_page') : 10;
        $request->sort_by = $request->has('sort_by') ? $request->get('sort_by') : 'desc';
        $query = Product::query();
        $query->when($request->price,function($q) use($request){
            $price = str_replace("₹","",$request->price);
            $q->whereBetween('price',explode("-",$price));
        });
        $products = $query->orderBy('price',$request->sort_by)->paginate($request->per_page);
        return view('products.index',compact('request','products'));
    }
    public function show(Request $request, $slug)
    {
        $product = Product::where('slug',$slug)->latest()->first();
        return view('products.show',compact('request','product'));
    }
    public function StoreInquiry(Request $request)
	{
    	$rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone'=> 'numeric',
        );
        $messages = array(
            'name.required' => 'Please enter your contact name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter valid email address.',
            'phone.numeric' => 'Please enter only digits in phone number.',
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
            //   try {

                $inquiry = new Inquiry;
                $inquiry->product_id = $request->get('product_id');
                $inquiry->user_id = $request->has('user_id') ? $request->get('user_id') : NULL;
                $inquiry->name = $request->get('name');
                $inquiry->email = $request->get('email');
                $inquiry->phone = $request->get('phone');
                $inquiry->description = $request->get('description');
                $inquiry->save();

                // Mail::send('emails.contact', ['data' => $request->all()], function($message) use($request) {
                //   $message->to(config()->get('settings.email'));
                //   $message->subject('Submission from ' . title_case($request->get('name')));
                // });
                // Mail::send('emails.thank_you', ['data' => $request->all()], function($message) use($request) {
                //   $message->to($request->get('email'));
                //   $message->subject('Thank you for contact us.');
                // });
                return response()->json(['success','Thank you for inquir us. We will get back to you soon.'], 200);
            //   } catch (Exception $e) {
            //       return redirect()->back()
            //                       ->withErrors($validator)
            //                       ->withInput()
            //                       ->with('error', $e->getMessage());
            //   }
    }
}
