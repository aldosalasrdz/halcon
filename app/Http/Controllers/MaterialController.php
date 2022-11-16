<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display all materials.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboards.administrator.materials.index', [
            'materials' => Material::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Material $material)
    {
      return view('dashboards.administrator.materials.create', [
        'material' => $material
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
        'name' => 'required',
        'cost' => [
            'required',
            'numeric',
            'min:1'
        ],
        'price' => [
            'required',
            'numeric',
            'min:1'
        ],
        'amount' => [
            'required',
            'numeric',
            'min:1'
        ]
      ]);

      Material::create([
        'name' => $request->name,
        'cost' => $request->cost,
        'price' => $request->price,
        'amount' => $request->amount
      ]);

      return redirect()->route('materials.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
      return view('dashboards.administrator.materials.edit', [
        'material' => $material
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
      $request->validate([
        'name' => 'required',
        'cost' => [
            'required',
            'numeric',
            'min:1'
        ],
        'price' => [
            'required',
            'numeric',
            'min:1'
        ],
        'amount' => [
            'required',
            'numeric',
            'min:1'
        ]
      ]);

      Material::whereId($material->id)->update([
        'name' => $request->name,
        'cost' => $request->cost,
        'price' => $request->price,
        'amount' => $request->amount
      ]);

      return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
      $material->delete();

      return back();
    }
}
