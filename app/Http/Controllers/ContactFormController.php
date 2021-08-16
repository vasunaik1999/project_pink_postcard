<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function index()
    {
        $responses = ContactForm::orderBy('id', 'desc')->get();

        return view('backend.contactForm.index', compact('responses'));
    }

    public function updatestatus(Request $request)
    {
        $response = ContactForm::find($request->r_id);

        if ($request->status == 0) {
            $response->status = 1;
        } else {
            $response->status = 0;
        }
        $response->update();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10',
            'message' => 'required',
            'category' => 'required',
        ]);

        $contactForm = new ContactForm();
        $contactForm->name = $request->name;
        $contactForm->phone = $request->phone;
        $contactForm->category = $request->category;
        $contactForm->message = $request->message;
        $contactForm->submitted_by = $request->user_id;
        $contactForm->status = '0';

        // dd($contactForm);
        $contactForm->save();
        return redirect()->back()->with('contactmessage', 'Your Response Submitted Successfully');
    }
}
