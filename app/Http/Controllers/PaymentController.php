<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Shipping;
use App\Order;
use App\Shipping_method;
use App\Http\Requests\PayRequest;
use App\Payment;
use App\Product;
class PaymentController extends Controller
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
            return view('web.payment');
        }
        else {
            Session::flash('flash_message', 'You need to login to continue order');
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
    public function store(PayRequest $request)
    {
        //
        $user = Auth::user();
        if($user){
               $orders = Order::where('user_id', $user->id)->where('status', 'none')->pluck('id')->toArray();
               $orders_status = Order::where('status', 'none')->where('user_id', $user->id)->get();
               if(count($orders)> 0){
                   $data = $request->all();
                    foreach ($orders_status as $order) {
                        $new_qty = $order->product->qty - $order['qty'];
                    if($new_qty > 0){
                         Product::where('id', $order->product->id)->update(['qty'=> $new_qty]);
                    }
                   else{
                         Product::where('id', $order->product->id)->update(['status'=>'unavailable', 'qty'=>$new_qty]);
                     }  
                   }

                   $data['order_id'] = implode(',', $orders);
                   $user->orders()->update(['status'=>'purchase']);
                   $user->payments()->create($data);
                   Session::flash('flash_message', 'Your order is completed');
                   return redirect('/order');
                        
               }
               else {
                Session::flash('flash_message', 'Your cart is empty');
                 return redirect('/');
               }
        }
        else{
            Session::flash('flash', 'You need to login');
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
