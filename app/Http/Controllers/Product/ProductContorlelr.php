<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Storage\AlertSessionStore;
use Alert;

class ProductContorlelr extends Controller
{
    public function index(){

    $products=Product::orderBy('id','Desc')->get();

    return view('admin.view_product',compact('products'));



    }


    public function addProduct(Request $request){

        $validator=Validator::make($request->all(),[

            'name'=>'required|max:191',
            'price'=>'required|max:20',
            'discount_price'=>'required|max:20',
            'color'=>'required',
            'size'=>'required',
            'description'=>'required',
        ]);

        if ($validator->fails()){


            $notification=array(
                'message'=>'something Wrong',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);

        }

        else {

            $product = new Product();
            $product->name = $request->input('name');
            $product->slug = \Str::slug($request->name);
            $product->price = $request->input('price');
            $product->discount_price = $request->input('discount_price');
            $product->color = $request->input('color');
            $product->size = $request->input('size');
            $product->description = $request->input('description');
            $product->created_at =Carbon::now();
            $product->save();


            Alert::success('Congrats', 'You\'ve Successfully Added the product');

            return Redirect()->route('show.product');


        }

    }


            public function edit($id){

                   $product=Product::findOrFail($id);

                   return view('admin.edit_product',compact('product'));


            }



            public function update(Request $request){

                    $id=$request->id;
                $product= Product::findOrFail($id);

                if ($product){
                    $product->name = $request->input('name');
                    $product->slug = Str::slug($request->title);
                    $product->price = $request->input('price');
                    $product->discount_price = $request->input('discount_price');
                    $product->color = $request->input('color');
                    $product->size = $request->input('size');
                    $product->description = $request->input('description');
                    $product->created_at =Carbon::now();
                    $product->update();

                    Alert::success('Congrats', 'You\'ve Successfully Updated the product');

                    return Redirect()->route('show.product');

                }

                else{


                    Alert::alert('error', 'Something went Wrong ');

                    return Redirect()->back();
                }

            }


            public function delete($id){

                Alert::question('Are You Sure to Delete', 'Successfully Deleted');


                  Product::findOrFail($id)->Delete();

                Alert::alert('success', 'Successfully Delete the Product ');

                return Redirect()->route('show.product');
            }


            public function inactive($id)
            {


             $product=Product::findOrFail($id)->update(['stock' =>0]);

                Alert::alert('success', 'Successfully Out of Stock the Product ');

                return Redirect()->route('show.product');
            }
              public function active($id){



            Product::findOrFail($id)->update(['stock'=>1]);

                  Alert::alert('success', 'Successfully Added Stock the Product ');

                  return Redirect()->route('show.product');

            }


}
