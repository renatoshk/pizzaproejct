<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute_set;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AttributeSetRequest;
use App\Http\Requests\EditAttributeSetRequest;
class AdminAttributeSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attribute_sets = Attribute_set::all();
        return view('admin.attribute_set.index', compact('attribute_sets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.attribute_set.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeSetRequest $request)
    {
        //
        $names = $request->all();

        Attribute_set::create($names);
        Session::flash('flash_message','Attribute Set  has been created! ');
        return redirect()->back();
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
         $attribute_set = Attribute_set::findOrFail($id);
         return view('admin.attribute_set.edit', compact('attribute_set'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAttributeSetRequest $request, $id)
    {
        //
        $names_attr = $request->all();
        $attribute_set = Attribute_set::findOrFail($id);
        $attribute_set->update($names_attr);
        Session::flash('flash_message', 'Attribute Set has been updated! ');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $attr_set = Attribute_set::findOrFail($id);
        $attr_set->delete();
        Session::flash('flash_message','Attribute Set has been deleted! ');
        return redirect()->back();
    }
}
