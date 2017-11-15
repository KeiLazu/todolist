<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(10);
        return view('image_upload.images-list')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image_upload.add-new-image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi di controller
        $validation = Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'     => 'required|mimes:jpg,png|min:1|max:10000'
        ]);

        // jikalau gagal
        if ($validation->fails()) {
            return redirect()->back()->withInput()->with('errors', $validation->errors());

        }

        $image = new Image;
        
        // uploading

        DB::transaction(function () {
                $file = DB::table('images')->insertGetId($request->file('userfile'));
                $destination_path = "uploads/";
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $file->move($destination_path, $filename);

                $image->file = $destination_path . $filename;
                $imae->caption = $request->input('caption');
                $image->description = $request->input('description');
                $image->save();
        });

        // $file = $request->file('userfile');
        // $destination_path = 'uploads/';
        // $filename = str_random(6).'_'.$file->getClientOriginalName();
        // $file->move($destination_path, $filename);

        // // Save image in db
        // $image->file = $destination_path . $filename;
        // $image->caption = $request->input('caption');
        // $image->description = $request->input('description');
        // $image->save();

        return redirect('/')->with('message', 'upload successfull');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::findorfail($id);
        return view('image_upload.image-detail')->with('image', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('image_upload.image-detail')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        // Validation
        $validation = Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'    => 'sometimes|image|mimes:jpeg,jpg,png|min:1|max:250'
        ]);

        // if fails
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors() );
        }

        // valid
        $image = Image::find($id);

        // Choose file
        if( $request->hasFile('userfile') ){
            $file = $request->file('userfile');
            $destination_path = 'uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $image->file = $destination_path . $filename;
        }

        // replacing
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();

        return redirect('/')->with('message','Edit Image Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('/')->with('message','Image has been deleted');
    }

    public function iseng($id)
    {
        $image = Image::find($id);
        return view('image_upload.edit-image')->with('image', $image);
    }

}