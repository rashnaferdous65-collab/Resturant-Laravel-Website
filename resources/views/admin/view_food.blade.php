<!DOCTYPE html>
<html> 
  @include('admin.css')
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
  </style>
<body>

    @include('admin.header')
     @include('admin.slidebar')
        <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <div>

          <h1 class="cat">View Food Details Here</h>
          <table class="table">

           <tr>
           <th>Name</th>
           <th>Description</th>
           <th>Category</th>
           <th>Price</th>
           <th>Image</th>
           <th>Action</th>
           </tr>
          @foreach($data as $item)
           <tr>
           <td>{{$item->title}}</td>
           <td>{{ Str::limit($item->description, 50) }}</td>
           <td>{{$item->category->cat_title}}</td>
           <td>{{$item->price}}</td>
           <td><img src="foodimage/{{$item->image}}" alt="" class="food_image"></td>
           <td style="text-align: center;">  
            <div style="display: flex; justify-content: center; gap: 10px; align-items: center;">
            <a href="{{url('edit_food', $item->id)}}" 
                                style="padding:5px 15px; background-color:rgba(21, 142, 138, 0.79);
                             color:white; border:none; text-decoration:none; border-radius:3px; font-size:14px;">
                                 Edit
                                     </a>  
           <form action="{{route('delete_food', $item->id)}}" method="POST" 
             onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:5px 10px; background-color:red; color:white; border:none; cursor:pointer;">
                        Delete
                    </button>
                </form></td> </div>
           </tr>
             @endforeach
          </table>
    
          </div>

             </div>
          </div>
         </div>
        @include('admin.footer')