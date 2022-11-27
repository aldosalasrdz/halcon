<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.route.files.index', [
            'files' => File::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file)
    {
        return view('dashboards.route.files.create', [
            'file' => $file
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required',
            'url' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imagePath = $request->file('url')->store('image', 'public');

        File::create([
            'invoice_id' => $request->invoice_id,
            'url' => asset('/storage/' . $imagePath)
        ]);

        return redirect()->route('files.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('dashboards.route.files.edit', [
            'file' => $file
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'invoice_id' => 'required',
            'url' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imagePath = $request->file('url')->store('image', 'public');

        File::whereId($file->id)->update([
            'invoice_id' => $request->invoice_id,
            'url' => asset('/storage/' . $imagePath)
        ]);

        return redirect()->route('files.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();

        return back();
    }
}
