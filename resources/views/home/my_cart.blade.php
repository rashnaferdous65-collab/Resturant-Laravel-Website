<!DOCTYPE html>
<html lang="en">
@include('home.css')

    
    <!-- Navbar -->
   @include('home.navbar')
     <style>
.cat{
     text-align: center;
    font-weight: bold;
    color: white;
    padding-bottom: 50px;
}
    .table {
    text-align: center;
    margin: auto;
    width: 1200px;       
    border: 2px solid white;
    table-layout: fixed; 
    margin-top: 50px;
}

th {
    background-color: rgba(21, 142, 138, 0.79);
     padding: 10px;
     color: white;
     font-weight: bold;
}      
td {
    
     color: white;
     border: 3px solid white;
     padding: 10px;
     font-weight: bold;
}



.food_image{

    width:80px;
    height: auto; 
}

    .order-form-container {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        background-color: #222831;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        color: #eeeeee;
        font-family: 'Poppins', sans-serif;
    }

    .order-form-container h2 {
        text-align: center;
        color: #ff4d4d; 
        margin-bottom: 25px;
    }

   
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #ccc;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #444;
        background-color: #393e46;
        color: #fff;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        border-color: #ff4d4d; 
    }

   
    .order-btn {
        width: 100%;
        padding: 12px;
        background-color: #ff4d4d;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .order-btn:hover {
        background-color: #e60000;
    }
  </style>
<body>

    
             

          <div>

          <h1 class="cat">View Food Details Here</h1>

    

          <table class="table">

           <tr>

           <th>Name</th>
           <th>Description</th>
           <th>Quantity</th>
            <th>Image</th>
            <th>Price</th>
           <th>Category</th>
           <th>Status</th>
           </tr>

           <?php  $total_price= 0; ?>
          @foreach($data as $item)
           <tr>

           <td>{{$item->title}}</td>
           <td>{{ Str::limit($item->description, 50) }}</td>
           <td>{{$item->quantity}}</td>
              <td><img src="foodimage/{{$item->image}}" alt="" class="food_image"></td>
                <td>${{$item->price}}</td>
           <td>{{$item->category->cat_title}}</td>
         
        
           <td style="text-align: center;">  
            <div style="display: flex; justify-content: center; gap: 10px; align-items: center;">
            <a href="" >
                               
           <form action="{{route('delete_cart', $item->id)}}" method="POST" 
             onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:5px 10px; background-color:red; color:white; border:none; cursor:pointer;">
                        Cancel
                    </button>
                </form></td> </div>
           </tr>
            <?php  $total_price= $total_price+ $item->price; ?>
          </div>
             @endforeach
          </table>
      
           <h1 style=" text-align: center; padding-top: 50px;"> Total Price ${{$total_price}}</h1>
             </div>
          </div>
         </div>
           <div class="order-form-container">
    <h2>Delivery Information</h2>
    <form action="{{route('confirm_order')}}" method="POST">
        @csrf
        <div class="form-group">
            <label> Enter Your Name</label>
            <input type="text" name="name" placeholder="Enter Your Name" value="{{Auth()->user()->name}}" required>
        </div>

        <div class="form-group">
            <label>Enter Your Email</label>
            <input type="email" name="email" placeholder="Enter Your Email" value="{{Auth()->user()->email}}" required>
        </div>

        <div class="form-group">
            <label>Enter Your Phone</label>
            <input type="tel" name="phone" placeholder="Enter Your Phone Number" value="{{Auth()->user()->phone}}" required>
        </div>

        <div class="form-group">
            <label>Enter Your Address</label>
            <input type="text" name="address" placeholder="Enter Your Delivery Address" value="{{Auth()->user()->address}}" required>
        </div>

        <button type="submit" class="order-btn">Confirm Order</button>
    </form>
</div>
    @include('home.footer')