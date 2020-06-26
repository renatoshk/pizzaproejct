<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute_set;
use App\Attribute;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\EditAttributeRequest;
class AdminAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attributes = Attribute::all();
        return view('admin.attribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $attribute_groups = Attribute_set::pluck('name','id')->all();
        return view('admin.attribute.create',compact('attribute_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        //
        $data = $request->all();
        $attributes = Attribute::create($data);
        Session::flash('flash_message', 'Attribute has been created');
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
        $attribute = Attribute::findOrFail($id);
        $attribute_groups = Attribute_set::pluck('name','id')->all();
        return view('admin.attribute.edit',compact('attribute_groups', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAttributeRequest $request, $id)
    {
        //
         $attribute = Attribute::findOrFail($id);
         $data = $request->all();
         $attribute->update($data);
         Session::flash('flash_message', 'Attribute has been updated');
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
         $attribute = Attribute::findOrFail($id);
         $attribute->delete();
         Session::flash('flash_message', 'Attribute has been deleted');
        return redirect()->back();

    }
}
