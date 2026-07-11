<!DOCTYPE html>
<html> 
  @include('admin.css')
  <style>
    /* Add Food Form Design */
.food-card {
    background: #2a2f34;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}

.food-card h4 {
    color: #ffffff;
    font-weight: 600;
    letter-spacing: 1px;
}

.food-label {
    color: #cfd2d6;
    font-weight: 500;
    margin-bottom: 6px;
}

.food-input {
    background: #1f2327;
    border: 1px solid #444;
    color: #fff;
    padding: 10px 12px;
    border-radius: 8px;
}

.food-input:focus {
    background: #1f2327;
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.15rem rgba(13,110,253,.25);
    color: #fff;
}

.food-btn {
    background: linear-gradient(135deg, #198754, #20c997);
    border: none;
    padding: 10px 40px;
    border-radius: 30px;
    font-weight: 600;
    color: #fff;
    transition: 0.3s ease;
}

.food-btn:hover {
    background: linear-gradient(135deg, #157347, #198754);
    transform: translateY(-2px);
}

.food_image{

    width:100px;
    height: auto; 
}
  </style>
  <body>
    @include('admin.header')
     @include('admin.slidebar')
        <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
             
         <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-dark text-white text-center rounded-top-4">
                    <h4 class="mb-0">🍔 Update Food Details</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{url('update_food' , $food->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                         @method('PUT')

                        <!-- Food Title -->
                        <div class="mb-3">
                            <label class="form-label fw-bold"> Edit Food Title</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="Enter food title" value="{{$food->title}}">
                        </div>

                        <!-- Food Description -->
                        <div class="mb-3">
                            <label class="form-label fw-bold"> Edit Food Details</label>
                            <textarea name="description" class="form-control" rows="3"
                                      placeholder="Enter food description" value="">{{$food->description}}</textarea>
                        </div>

                        <!-- Food Price -->
                        <div class="mb-3">
                            <label class="form-label fw-bold"> Edit Food Price</label>
                            <input type="number" name="price" class="form-control"
                                   placeholder="Enter food price" value="{{$food->price}}">
                        </div>

                        <!-- Food Category -->
                            <div class="mb-3">
    <label class="form-label fw-bold">Edit Food Category</label>
    <select name="category" required class="form-control custom-file">
        <option value="">Select a Category</option>
        
        @foreach($category as $cat)
            <option value="{{ $cat->id }}" {{ $food->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->cat_title }}
            </option>
        @endforeach

    </select>
</div>
                                <!-- Current Food Image -->
                        <div class="mb-4">
                            <label class="form-label fw-bold"> Current Food Image</label>
                           <img src="{{ asset('foodimage/' . $food->image) }}"  class="food_image" alt="">
                        </div>
                        <!-- Food Image -->
                        <div class="mb-4">
                            <label class="form-label fw-bold"> Edit Food Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2">
                                Update Food
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


            </div>
          </div>
         </div>
        @include('admin.footer')