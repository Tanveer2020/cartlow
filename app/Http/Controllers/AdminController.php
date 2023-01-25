<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\product;

use App\Models\Order;

class AdminController extends Controller
{
    public function product(){


    if(Auth::id()){

      if(Auth::user()->usertype == '1'){
           
       return view('admin.product'); 
      }

      else{
        return redirect()->back();
      }
    }


    else{

        return redirect('login');
    }
       
       

    }


    public function uploadproduct(Request $request){
   
       

       // dd($request->all());


        $filename = time() . '.' . $request->file->extension();


        if($filename){

        $request->file->move(public_path('images'), $filename);

                    }
         

        $uploadproduct = product::create([
          
          'title' => $request->title,
          'price' => $request->price,
          'description'   => $request->desc,
          'quantity' => $request->quantity,
           'image'  => $filename, 


        ]);
    
        return redirect()->back()->with('success','product successfully uploaded'); 
    }

   
    public function showproduct(){
       
       $products = product::all();

      return view('admin.showproduct',compact('products'));
    }

    public function deleteproduct($id){

      $products = product::find($id);

      $products->delete();

      return redirect()->back()->with('success','Deleted successfully');



    }


   

    public function updateview($id){

      $products = Product::find($id);


      return view('admin.updateview',compact('products'));
    }



    public function updateproduct(Request $request,$id){


       $filename = time() . '.' . $request->file->extension();

       $request->file->move(public_path('images'), $filename);

     $products = product::find($id);

     $products->update([
      
       'title' => $request->title,
       'price' => $request->price,

       'description'=>$request->desc,
       'quantity'=> $request->quantity,

       'image'  => $filename, 




     ]);

     
     return redirect()->back()->with('success','Product updated');

     



        

    }


    public function showorder(){

        $orders = Order::all();  

        return view('admin.showorder',compact('orders'));
    }


    public function updatestatus($id){

    
        $orders = Order::find($id);


        $orders->status = "deliverd";

        $orders->save();

         
         return redirect()->back();

    }
}
