<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Shipping;
use App\Order;
use App\Shipping_method;
use App\Http\Requests\ShippRequest;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user){
            $shipping_methods = Shipping_method::all(); 
            return view('web.shipping', compact('shipping_methods'));
        }
        else {
            Session::flash('flash_message', 'You need to login to order products!');
            return redirect('/'); 
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippRequest $request)
    {
        //
        $user = Auth::user();
        if($user){
          $orders = Order::where('user_id', $user->id)->where('status', 'none')->pluck('id')->toArray();
          if(count($orders) > 0){
             $data = $request->all();
             $data['order_id'] = implode(',', $orders);
             $user->shippings()->create($data);
             Session::flash('flash_message', 'Your data has been successfully registered');
             return redirect('/step-2');
          }
          else {
            Session::flash('flash_message', 'Your cart is empty');
            return redirect('/');
          }
        

        }
        else {
            Session::flash('flash_message', 'You need to login');
            return redirect('/');

        }

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
        //
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
    }
}
