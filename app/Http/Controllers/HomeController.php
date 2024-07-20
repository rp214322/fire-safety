<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Exception;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the About page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the Contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }
    public function services()
    {
        return view('services');
    }
    public function sendMail(Request $request)
    {
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
        ];
        // Specify multiple email addresses as an array
        $recipients = ['birajdiyora1@gmail.com','avanishpatel1200@gmail.com','dhananjaypatel0471@gmail.com'];

        // Send email to multiple recipients
        Mail::to($recipients)->send(new ContactFormMail($data));
        return back()->with('success', 'Thanks for reaching out.Your Message has been sent successfully');
    }

    public function StoreInquiry(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'numeric',
        );
        $messages = array(
            'name.required' => 'Please enter your contact name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter valid email address.',
            'phone.numeric' => 'Please enter only digits in phone number.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            try {

                $inquiry = new Inquiry;
                $inquiry->name = $request->get('name');
                $inquiry->email = $request->get('email');
                $inquiry->phone = $request->get('phone');
                // $inquiry->category_id = $request->get('category_id');
                if ($request->has('description')) {
                    $inquiry->description = $request->get('description');
                }
                $inquiry->save();

                // Mail::send('emails.contact', ['data' => $request->all()], function($message) use($request) {
                //   $message->to(config()->get('settings.email'));
                //   $message->subject('Submission from ' . title_case($request->get('name')));
                // });
                // Mail::send('emails.thank_you', ['data' => $request->all()], function($message) use($request) {
                //   $message->to($request->get('email'));
                //   $message->subject('Thank you for contact us.');
                // });
                return redirect()->back()->with('success', 'Thank you for contact us. We will get back to you soon.');
            } catch (Exception $e) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', $e->getMessage());
            }
        }

        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please correct the following errors');
    }
}
