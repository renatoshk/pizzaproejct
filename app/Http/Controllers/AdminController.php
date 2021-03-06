<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shipping;
use App\Payment;
use App\Category;
use App\Product_image;
use App\Product_attribute;
use App\Attribute_set;
use App\Attribute;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payment::all();
        $shippings = Shipping::all();
        $total_price = Order::orderBy('created_at')->where('status', 'purchase')->sum('total_price');
        $available_products = Product::where('status','available')->count();
        $unavailable_products = Product::where('status','unavailable')->count();
        $purchase_orders = Order::where('status','purchase')->count();
        $cart_orders = Order::where('status','none')->count();
        $users = User::where('role_id', '2')->count();
        return view('admin.dashboard', compact('purchase_orders','cart_orders','users','available_products','unavailable_products','total_price', 'payments','shippings'));
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
    public function store(Request $request)
    {
        //
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
