<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Product_image;
use App\Product_attribute;
use App\Attribute_set;
use App\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //
        $products = Product::all(); 
        $categories = Category::all();
        //attribute set pizza
        $data = [];
      foreach ($categories as $category) {
          $prods = Product::where('category_id', $category->id)->get();
          $data[] = $prods;
      }
        return view('web.index', compact('products', 'data', 'categories'));
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
    public function show($slug)
    {
        //
        $user = Auth::user();
       if($user){
        $product = Product::findBySlugOrFail($slug);
        //attrs set
        $attr_set_id = $product->product_attributes[0]['attribute_set_id'];
        $attr_set = Attribute_set::where('id', $attr_set_id)->first()->name;
        //attrs
        $attrs_id = $product->product_attributes;
        $condition = [];
            foreach ($attrs_id as $attr_id){
                $attr_id = $attr_id->attribute_id; 
            // dd($attr_id);
                $condition[] = Attribute::where('id', $attr_id)->where('attribute_set_id',$attr_set_id)->get();
            }
        return view('web.order', compact('product', 'attr_set', 'condition'));
       }
       else {
          Session::flash('flash_message', 'You need to login to continue shopping!');
          return redirect('/');
       } 
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
