<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use Illuminate\Support\Facades\Session;
class AjaxController extends Controller
{
    //
    public function post(Request $request){
    	$attrId = (int) $request->attr_group_id;

    	$attributes = Attribute::where('attribute_set_id', $attrId)->get();

    	$html = '';
    foreach ($attributes as $attr) {
           $html .= '<div class="prop_attr"> <div class="form-group"><input type="hidden" name="id_'.$attr->attr_code.'" value="'.$attr->id.'"><label for="'.$attr->label.'">'.$attr->label.' </label><input class="form-control" type="'.$attr->type.'" name="'.$attr->attr_code.'" id="'.$attr->attr_code.'"></div></div>'; 
    	}
      $response = array(
            'status'=>'success',
            'content'=>$html
      );  
      return response()->json($response);
    }
}
