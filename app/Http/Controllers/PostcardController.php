<?php

namespace App\Http\Controllers;

use App\Models\Postcard;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostcardController extends Controller
{
    public function index()
    {
        return view('frontend.postcard.postcards');
    }

    public function preview()
    {
        return view('frontend.postcard.previewPostcard');
    }

    public function view()
    {
        $postcards = Postcard::all();
        return view('backend.postcard.index', compact('postcards'));
    }

    public function create()
    {
        return view('backend.postcard.create');
    }

    public function edit(Postcard $postcard)
    {
        // dd($postcard);
        return view('backend.postcard.edit', compact('postcard'));
    }

    public function store(Request $request)
    {
        $postcard = new Postcard();
        $postcard->caption = $request->input('caption');
        $postcard->category = $request->input('category');
        $postcard->photograph_by = $request->input('photograph_by');

        if ($request->hasfile('image')) {
            $img_file = $request->file('image');
            $img_extension = $img_file->getClientOriginalName();
            $img_filename = time() . '.' . $img_extension;
            $img_file->move('uploads/postcards/', $img_filename);
            $postcard->image = $img_filename;
        }
        $postcard->status = $request->input('status');
        $postcard->is_available = $request->input('is_available');

        $postcard->save();
        return redirect()->back()->with('status', 'Added Successfully');
    }

    public function update(Request $request, Postcard $postcard)
    {
        $postcard->caption = $request->input('caption');
        $postcard->category = $request->input('category');
        $postcard->photograph_by = $request->input('photograph_by');

        if ($request->hasfile('image')) {

            $img_destination = 'uploads/postcards/' . $postcard->image;
            if (File::exists($img_destination)) {
                File::delete($img_destination);
            }

            $img_file = $request->file('image');
            $img_extension = $img_file->getClientOriginalName();
            $img_filename = time() . '.' . $img_extension;
            $img_file->move('uploads/postcards/', $img_filename);
            $postcard->image = $img_filename;
        }

        $postcard->status = $request->input('status');
        $postcard->is_available = $request->input('is_available');

        $postcard->update();

        return redirect()->back()->with('status', 'Updated Successfully');
    }
}
