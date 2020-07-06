<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Product_image;
use App\Product_attribute;
use App\Attribute_set;
use App\Attribute;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderRequest;
class OrderController extends Controller
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
            $orders = Order::where('user_id', $user->id)->where('status','purchase')->get();
            return view('web.profile.show_orders', compact('orders'));
        }
        else {
            Session::flash('flash_message', 'You need to login to view orders');
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
    public function store(OrderRequest $request)
    {
        //
        $user =Auth::user();
        if($user){
            $data = $request->all();
            if($request->size){
                $size = $data['size'];
                $price = $data['total_price'];
                $qty = $data['qty'];
                if($size == 'small'){
                    $price = $price * $qty;
                }
                if($size == 'medium'){
                    $price = ($price + 2.5)*$qty;
                } 
                if($size == 'large'){
                    $price = ($price +4.5) * $qty;
                } 
            }
            else {
                $qty = $data['qty'];
                $price = $data['total_price'];
                $price = $price * $qty;
            }
            $data['total_price'] = $price;
            $user->orders()->create($data);
            Session::flash('flash_message', 'The product is in your shopping cart !');
            return redirect('/cart');
        
        }
        else {
             Session::flash('flash_message', 'You need to login to continue shopping!');
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
        $user = Auth::user();
        if($user){
            $orders = Order::orderBy('created_at')->where('user_id', $user->id)->where('id', $id)->where('status', 'none')->get();
            foreach($orders as $order) {
                $data = $request->all();
                $qty = $data['qty'];
                $price = $qty * $order->product->price;
                $data['total_price'] = $price;
                $user->orders()->where('id', $id)->first()->update($data);
                Session::flash('flash_message', 'Your Product has been updated!');
                return redirect()->back();

            }
        }
        else {
            Session::flash('flash_message', 'Your need to login to !');
            return redirect('/');
        }
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
        $user = Auth::user();
        if($user){
           Order::findOrFail($id)->delete();
           Session::flash('flash_message', 'Your Product has been deleted!');
           return redirect()->back();
        }
        else {
             Session::flash('flash_message', 'You need to login to make action in your cart!');
             return redirect ('/');
        } 
    }


    //cart 
   public function cart(){
        $user = Auth::user();
        if($user){
        $orders = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->paginate(3);    
        $total_price = Order::orderBy('created_at')->where('user_id', $user->id)->where('status', 'none')->sum('total_price');
         return view('web.cart' , compact('total_price', 'orders'));
        }
        else {
             Session::flash('flash_message', 'You need to login to add products in your cart!');
             return redirect ('/');
        }
    }

    //menu
    public function menu(){
        $categories = Category::all();
        return view('web.menu', compact('categories'));

    }
}
