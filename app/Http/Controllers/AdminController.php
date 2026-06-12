
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\Category;
use App\Models\Table_book;

class AdminController extends Controller
{
     public function category(){
        $data= Category::all();
        return view('admin.category' , compact('data'));
    }

          
   public function made_category(Request $request)
{
    $data = new Category;
    $data->cat_title = $request->category;
    $data->save();
    flash()->success('Category created successfully!');
   return redirect()->back();
}

public function cat_delete($id){
    $data = Category::findOrFail($id); 
    $data->delete();
     flash()->success('Category deleted successfully!');
    return redirect()->back();
  
    

}
public function edit_category($id){
    $data = Category::findOrFail($id); 
    return view('admin.edit_category', compact('data')); 
}

public function update_category(Request $request, $id)
{
    $request->validate([
        'cat_name' => 'required|string|max:255',
    ]);

    $data = Category::findOrFail($id);
    $data->cat_title = $request->cat_name;
    $data->save();
    flash()->success('Category Updated successfully!');
    return redirect('/category');


}
    public function add_food(){
          $data= Category::all();
        return view('admin.add_food', compact('data'));
    }

public function upload_food(Request $request)
{
    $food = new Food();

    $food->title = $request->title;
    $food->description = $request->description;
    $food->price = $request->price;
    $food->category_id = $request->category;
    
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'_'.$image->getClientOriginalName(); 
        $image->move(public_path('foodimage'), $imagename); 
        
       
        $food->image = $imagename; 
    }

    $food->save(); 
    flash()->success('Food Details Uploaded  successfully!');
    return redirect()->back();
}

public function view_food(){
   $data=Food::all();
    return view('admin.view_food', compact('data'));
}

public function delete_food($id){


    $data= Food::find($id);

    $data->delete();
       flash()->success('Food Details Deleted  successfully!');
    return redirect()->back()->with('message', 'Book Details Deleted successfully');
}


public function edit_food($id){

$food= Food::find($id);
$category= Category::all();

    return view('admin.edit_food', compact('food', 'category'));
}

public function update_food(Request $request, $id){


    $data= Food::find($id);

    $data->title= $request->title;
    $data->description= $request->description;
    $data->price= $request->price;
    $data->category_id= $request->category;
    

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'_'.$image->getClientOriginalName(); 
        $image->move(public_path('foodimage'), $imagename); 
        
       
        $data->image = $imagename; 
    }

    $data->save();
        flash()->success('Food Details Updated  successfully!');
    return redirect('view_food')->with('message', 'Food Updated Successfully');
}

public function view_order(){
$data= Order::all();
    return view('admin.view_order', compact('data'));
}


public function delivered($id)
{
    $data = Order::findOrFail($id);

    if ($data->delivary_status !== 'Delivered') {
        $data->delivary_status = 'Delivered';
        $data->save();
    }
      flash()->success('Food Deliverd successfully!');
    return redirect()->back();
}



public function cancel($id)
{
    $data = Order::findOrFail($id);

    if ($data->delivary_status !== 'Cancelled') {
        $data->delivary_status = 'Cancelled';
        $data->save();
    }
      flash()->success('Food Item Cancelled!');
    return redirect()->back();
}

public function on_the_way($id)
{
    $data = Order::findOrFail($id);

    if ($data->delivary_status !== 'On the way') {
        $data->delivary_status = 'On the way';
        $data->save();
    }
       flash()->success('Food Swiched to On The Way!');
    return redirect()->back();
}

public function reservation(){
   $data= Table_book::all();
    return view('admin.reservation' , compact('data'));
}
}
