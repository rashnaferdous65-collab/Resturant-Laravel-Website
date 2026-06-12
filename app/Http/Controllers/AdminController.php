```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\Category;
use App\Models\Table_book;

class AdminController extends Controller
{
    /* ---------------- CATEGORY ---------------- */

    public function category()
    {
        return view('admin.category', [
            'data' => Category::all()
        ]);
    }

    public function made_category(Request $request)
    {
        Category::create([
            'cat_title' => $request->category
        ]);

        flash()->success('Category created successfully!');
        return back();
    }

    public function cat_delete($id)
    {
        Category::findOrFail($id)->delete();

        flash()->success('Category deleted successfully!');
        return back();
    }

    public function edit_category($id)
    {
        return view('admin.edit_category', [
            'data' => Category::findOrFail($id)
        ]);
    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required|max:255'
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'cat_title' => $request->cat_name
        ]);

        flash()->success('Category Updated successfully!');

        return redirect('/category');
    }

    /* ---------------- FOOD ---------------- */

    public function add_food()
    {
        return view('admin.add_food', [
            'data' => Category::all()
        ]);
    }

    public function upload_food(Request $request)
    {
        $food = new Food();

        $food->fill([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category
        ]);

        if ($request->hasFile('image')) {
            $file = $request->image;

            $imageName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('foodimage'), $imageName);

            $food->image = $imageName;
        }

        $food->save();

        flash()->success('Food Details Uploaded successfully!');

        return back();
    }

    public function view_food()
    {
        return view('admin.view_food', [
            'data' => Food::all()
        ]);
    }

    public function delete_food($id)
    {
        Food::findOrFail($id)->delete();

        flash()->success('Food Details Deleted successfully!');

        return back();
    }

    public function edit_food($id)
    {
        return view('admin.edit_food', [
            'food' => Food::findOrFail($id),
            'category' => Category::all()
        ]);
    }

    public function update_food(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $food->fill([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category
        ]);

        if ($request->hasFile('image')) {

            $image = $request->image;

            $fileName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('foodimage'), $fileName);

            $food->image = $fileName;
        }

        $food->save();

        flash()->success('Food Details Updated successfully!');

        return redirect('view_food');
    }

    /* ---------------- ORDER ---------------- */

    public function view_order()
    {
        return view('admin.view_order', [
            'data' => Order::all()
        ]);
    }

    private function updateOrderStatus($id, $status, $message)
    {
        $order = Order::findOrFail($id);

        if ($order->delivary_status !== $status) {
            $order->update([
                'delivary_status' => $status
            ]);
        }

        flash()->success($message);

        return back();
    }

    public function delivered($id)
    {
        return $this->updateOrderStatus(
            $id,
            'Delivered',
            'Food Delivered successfully!'
        );
    }

    public function cancel($id)
    {
        return $this->updateOrderStatus(
            $id,
            'Cancelled',
            'Food Item Cancelled!'
        );
    }

    public function on_the_way($id)
    {
        return $this->updateOrderStatus(
            $id,
            'On the way',
            'Food Switched to On The Way!'
        );
    }

    /* ---------------- RESERVATION ---------------- */

    public function reservation()
    {
        return view('admin.reservation', [
            'data' => Table_book::all()
        ]);
    }
}
```

