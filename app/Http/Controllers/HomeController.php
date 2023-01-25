<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


use App\Models\User;

use App\Models\product;

use App\Models\Cart;

use App\Models\Order;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if($usertype == "1"){

            return view('admin.home');
        }

        else{

        $products = product::paginate(3);

         $user = auth()->user();   

         $count = Cart::where('phone',$user->phone)->count();
        
        return view('user.home',compact('products','count'));
        }
    }


    public function index(){

         if(Auth::id()){

            return redirect('redirect');

         }

         else{


         $products = product::paginate(3);

        return view('user.home',compact('products'));

        }
    }


    public function search(Request $request){

         $search = $request->search;

         if($search == ''){

              $products = product::paginate(3);

        return view('user.home',compact('products'));
         }
        
        $products = Product::where('title','Like', '%'.$search.'%')->get();


         return view('user.home',compact('products'));  

    }

    public function addcart(Request $request, $id){

        if(Auth::id()){

            $user = auth()->user();

            $products = Product::find($id);

            $carts = Cart::create([

             
            'name'=> auth()->user()->name,

             'phone' => auth()->user()->phone,
             'address' => auth()->user()->address,
              'product_title'  => $products->title,
              'price'    =>   $products->price,
              'quantity' => $request->quantity, 
  

            ]);

            return redirect()->back()->with('success','Product successfully added');
        }

        else {
              
             return redirect('login'); 

        }

    }

        public function showcart(){


           $user = auth()->user();   
           $carts = Cart::where('phone', $user->phone)->get();
           $count = Cart::where('phone',$user->phone)->count();
            return view('user.showcart',compact('count','carts'));
        }

        public function deletecart($id){
        
         $carts = Cart::find($id);

          $carts->delete();

          return redirect()->back()->with('success','Product Remove successfully');


           

        }


        public function confirmorder(Request $request){

          $user = auth()->user();

          foreach($request->productname as $key=>$productname){

          $order = Order::create([
          
           'name' => auth()->user()->name,

           'phone'=> auth()->user()->phone,

            'address'=> auth()->user()->address,

            'product_name' => $request->productname[$key],

            'quantity'  => $request->quantity[$key],

            'price'  => $request->price[$key],   

            'status' => 'not delivered'  


                 ]);

          // $carts = Cart::delete()->where('phone',$user->phone);

             DB::table('carts')->where('phone',$user->phone)->delete();
              
              return redirect()->back()->with('success','Product Ordered successfully');

        }
}


    }
