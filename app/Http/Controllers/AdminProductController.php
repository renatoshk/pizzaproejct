<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Attribute_set;
use App\Attribute;
use App\Product_image;
use App\Product_attribute;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminProductRequest;
use App\Http\Requests\EditAdminProductRequest;
use App\Product;
use App\Category;
class AdminProductController extends Controller
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

        $data = [];
        $row = [];
        $products = Product::all();
        foreach ($products as $product) {
            $attr_set = $product->product_attributes[0]['attribute_set_id'];
           if($attr_set){
            $type = Attribute_set::where('id', $attr_set)->first()->name;
            $row['type'] = $type;
            $row['category'] = $product->category->name;
            $row['id'] = $product->id;
            $row['name']= $product->name;
            $row['description'] = $product->description;
            $row['price'] = $product->price;
            $row['status'] = $product->status;
            $row['qty'] = $product->qty;
            $row['photo'] = $product->photo->product_image;
            $data[] = $row;
            $row =[];
           } 
        }
       
        return view('admin.products.index', compact('data'));


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
       $user = Auth::user();
       if($user){
        $attributes_set = Attribute_set::pluck('name','id')->all();
        $categories = Category::pluck('name','id')->all();
        return view('admin.products.create',compact('attributes_set', 'categories'));
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductRequest $request)
    {
        //
        $user = Auth::user();
        $data = $request->all();
      
        if($user){
            //image add
            if($file = $request->file('photo_id')){
                $name = time().$file->getClientOriginalName();
                $file->move('product_photos', $name);
                $photo = Product_image::create(['product_image'=>$name]);
            }
            //product static add
            $product = $user->products()->create([
                    'category_id'=>$data['category_id'],
                    'name'=>$data['name'],
                    'description'=>$data['description'],
                    'price'=>$data['price'],
                    'qty'=>$data['qty'],
                    'photo_id' => $photo->id
            ]);
            unset($data['category_id']);
            unset($data['name']);
            unset($data['description']);
            unset($data['price']);
            unset($data['qty']);
            unset($data['photo_id']);
            unset($data['_token']);
            unset($data['product_type']);
             $i = 0; $attrId;
            foreach ($data as $key => $value) {
                  if($i % 2 == 0){
                    $attrId = $value;
                  }else{
                    Product_attribute::create([
                          'product_id'=>$product->id,
                          'attribute_set_id'=>$request->product_type,
                          'attribute_id'=>$attrId,
                          'attribute_value'=>$value
                    ]);
                  }
                  $i++;

            }
          Session::flash('flash_message', 'Your Product has been created!');
          return redirect()->back();
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
        $user = Auth::user();
        if($user){
            $product = Product::findOrFail($id);
            //attributes set get
            $attr_set_id = $product->product_attributes[0]['attribute_set_id'];
            $attr_set = Attribute_set::where('id', $attr_set_id)->first()->name;
            //attributes  get
            $attrs_id = $product->product_attributes;
            $condition = [];
            foreach ($attrs_id as $attr_id){
                $attr_id = $attr_id->attribute_id; 
            // dd($attr_id);
                $condition[] = Attribute::where('id', $attr_id)->where('attribute_set_id',$attr_set_id)->get();
            }
                     
            return view('admin.products.edit', compact('product', 'attr_set', 'condition'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminProductRequest $request, $id)
    {
        //
        $user = Auth::user();
        if($user){
              $data = $request->all();
              //if form has image
           if($file = $request->file('photo_id')){
              $name = time(). $file->getClientOriginalName();
              $file->move('product_photos', $name);
              $image = Product_image::create(['product_image'=>$name]);
              $data['photo_id'] = $image->id;
             $product = $user->products()->findOrFail($id)->update([
                'name'=>$data['name'],
                'description'=>$data['description'],
                'price'=>$data['price'],
                'qty'=>$data['qty'],
                'status'=>$data['status'],
                'photo_id' =>  $image->id
            
              ]);
           }
           //if form doesnt have image
           else {
                $product = $user->products()->findOrFail($id)->update([
                   'name'=>$data['name'],
                   'description'=>$data['description'],
                   'price'=>$data['price'],
                   'qty'=>$data['qty'],
                   'status'=>$data['status']
              ]);
           }

            unset($data['_method']);
            unset($data['_token']);
            unset($data['name']);
            unset($data['description']);
            unset($data['price']);
            unset($data['qty']);
            unset($data['photo_id']);
            unset($data['product_type']);
            unset($data['status']);
             $i = 0; $attrId;
            foreach ($data as $key => $value) {
                  if($i % 2 == 0){
                    $attrId = $value;
                  }else{
                    Product_attribute::where('product_id', $id)->where('attribute_id', $attrId,)->update([
                          'attribute_value'=>$value
                    ]);
                }
                  $i++;

            }
          Session::flash('flash_message', 'Your Product has been updated!');
          return redirect()->back();
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
        $product = Product::findOrFail($id);
       unlink(public_path() . '/product_photos/' .$product->photo->product_image);
        $product->delete();
        Session::flash('flash_message','Product has been deleted! ');
        return redirect()->back();
    }
}
