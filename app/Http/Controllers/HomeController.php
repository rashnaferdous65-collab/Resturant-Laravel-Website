<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Table_book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index(){
       $total_user=User::where('usertype', '=','user')->count();
        $total_food=Food::count();
        $total_category= Category::count();
        $total_order= Order::count();
        $total_reservation= Table_book::count();
        
        return view('admin.index', compact('total_user', 'total_food', 'total_category', 'total_order','total_reservation'));
    }

    public function home(){
        $data= Food::all();
       $category= Category::all();
         
        return view('home.index',  compact('data', 'category'));
    }

public function user_cart(Request $request,  $id){


    
    if(Auth::id()){
         $food= Food::find($id);
        $cart_title = $food->title;
        $cart_description= $food->description;
        $cart_quantity= $request->qty;
        $cart_price= $food->price * $request->qty ;
        $cart_category_id=$food->category_id;
        $cart_image= $food->image;

        $data= new Cart;

        $data->title= $cart_title;
         $data->description= $cart_description;
          $data->quantity= $cart_quantity;
           $data->price= $cart_price;
           $data->category_id= $cart_category_id;
           $data->image= $cart_image;
         $data->user_id = Auth()->user()->id;

           $data->save();
              flash()->success('Cart Added  successfully!');
           return redirect()->back();

    }

    else{

        return redirect ("login");
    }
}
 
public function my_cart()
{
    $data = Cart::where('user_id', Auth::id())->get();
    return view('home.my_cart', compact('data'));
}


public function delete_cart($id){

$data= Cart::find($id);
$data->delete();
    flash()->success('Cart deleted successfully!');
return redirect()->back();

}

public function confirm_order(Request $request){


    $user_id= Auth()->user()->id;
    $cart= Cart::where('user_id', '=', $user_id)->get();

    foreach($cart as $item){

   $order= new Order;

   $order->name= $request->name;
   $order->email= $request->email;
   $order->phone= $request->phone;
   $order->address= $request->address;

   $order->title= $item->title;
   $order->quantity= $item->quantity;
   $order->price= $item->price;
   $order->category_id= $item->category_id;
   $order->image= $item->image;

   $order->save();


   $item->delete();
  
    }
        flash()->success('Order Confirmed!');
     return redirect()->back();
}

public function book_table(Request $request){

$data= new table_book;
$data->phone= $request->phone;
$data->guest= $request->n_guest;
$data->time= $request->time;
$data->date= $request->date;

$data->save();
    flash()->success('Booked Table successfully!');
return redirect()->back();
}
}



