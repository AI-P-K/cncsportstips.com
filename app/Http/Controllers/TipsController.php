<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Tip;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips = Tip::orderBy('created_at', 'desc')->paginate(9);
        return view('tips.index')->with('tips', $tips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->hasRole('admin')){
            return view('tips.create');
        }
        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'tip_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('tip_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('tip_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('tip_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('tip_image')->storeAs('public/tip_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Tip
        $tip = new Tip;
        $tip->title = $request->input('title');
        $tip->body = $request->input('body');
        $tip->user_id = auth()->user()->id;
        $tip->tip_image = $fileNameToStore;
        $tip->save();
        return redirect('/tips')->with('success', 'Tip Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tip = Tip::find($id);
        return view('tips.show')->with('tip', $tip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tip = Tip::find($id);

        if(\Auth::user()->hasRole('admin')){
            return view('tips.edit')->with('tip', $tip);
        }
        return redirect('/');
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
        if(!\Auth::user()->hasRole('admin')){
            return redirect('/');
        }
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        if($request->hasFile('tip_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('tip_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('tip_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('tip_image')->storeAs('public/tip_images', $fileNameToStore);
        }

        // Create Tip
        $tip = Tip::find($id);
        $tip->title = $request->input('title');
        $tip->body = $request->input('body');
        if($request->hasFile('tip_image')){
            $tip->tip_image = $fileNameToStore;
        }
        $tip->save();
        return redirect('/tips')->with('success', 'Tip Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tip = Tip::find($id);

        // Check for correct user
        if(auth()->user()->id !==$tip->user_id){
            return redirect('/tips')->with('error', 'Unauthorized Page');
        }

        if($tip->tip_image !== 'noimage.jpg'){
            // Delete image
            Storage::delete('public/tip_images/'.$tip->tip_image);
        }
            $tip->delete();
            return redirect('/tips')->with('success', 'Tip Removed');
    }
}
