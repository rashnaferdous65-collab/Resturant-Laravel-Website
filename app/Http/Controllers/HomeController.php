<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Table_book;

class HomeController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        $total_user = User::where('usertype', 'user')->count();
        $total_food = Food::count();
        $total_category = Category::count();
        $total_order = Order::count();
        $total_reservation = Table_book::count();

        return view('admin.index', compact(
            'total_user',
            'total_food',
            'total_category',
            'total_order',
            'total_reservation'
        ));
    }

    // Home Page
    public function home()
    {
        $foods = Food::all();
        $categories = Category::all();

        return view('home.index', compact('foods', 'categories'));
    }

    // Add to Cart
    public function user_cart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $food = Food::findOrFail($id);

        $cart = new Cart();
        $cart->title = $food->title;
        $cart->description = $food->description;
        $cart->quantity = $request->qty;
        $cart->price = $food->price * $request->qty;
        $cart->category_id = $food->category_id;
        $cart->image = $food->image;
        $cart->user_id = Auth::id();

        $cart->save();

        flash()->success('Cart added successfully!');
        return back();
    }

    // My Cart
    public function my_cart()
    {
        $data = Cart::where('user_id', Auth::id())->get();
        return view('home.my_cart', compact('data'));
    }

    // Delete Cart Item
    public function delete_cart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        flash()->success('Cart deleted successfully!');
        return back();
    }

    // Confirm Order
    public function confirm_order(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        foreach ($cartItems as $item) {
            Order::create([
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'address'     => $request->address,
                'title'       => $item->title,
                'quantity'    => $item->quantity,
                'price'       => $item->price,
                'category_id' => $item->category_id,
                'image'       => $item->image,
            ]);

            $item->delete();
        }

        flash()->success('Order confirmed!');
        return back();
    }

    // Book Table
    public function book_table(Request $request)
    {
        $booking = new Table_book();
        $booking->phone = $request->phone;
        $booking->guest = $request->n_guest;
        $booking->time = $request->time;
        $booking->date = $request->date;
        $booking->save();

        flash()->success('Table booked successfully!');
        return back();
    }
}



