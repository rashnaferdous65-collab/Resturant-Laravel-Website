<style>
    .custom-category-nav {
        gap: 10px; 
        flex-wrap: wrap; 
        border: none;
    }

    .category-pill {
        background-color: transparent;
        color: #ff214f !important; 
        border: 2px solid #ff214f;
        border-radius: 30px;
        padding: 8px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 14px;
    }

    .category-pill:hover {
        background-color: rgba(255, 33, 79, 0.1);
        transform: translateY(-2px); 
    }

   
    .custom-category-nav .nav-link.active {
        background-color: #ff214f !important;
        color: #fff !important;
        box-shadow: 0 4px 15px rgba(255, 33, 79, 0.3);
        border-color: #ff214f;
    }

    .category-container {
        padding: 20px 0;
    }

    .nav-item{

        padding-bottom: 50px;
    }
</style>
<!-- BLOG Section   --> 
  <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    <h2 class="section-title py-5">EVENTS AT THE FOOD HUT</h2>
    
   

    <div class="row justify-content-center">
        @if($data->count() > 0)
            @foreach($data as $item)
                <div class="col-md-4 p-3">
                    <div class="card bg-transparent border-light">
                        <img src="{{asset('foodimage/' . $item->image)}}"
                         class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <div class="badge bg-danger mb-2" style="font-size: 1.2rem; padding: 10px 20px;">
                                {{ $item->price }}
                            </div>
                            <h4 class="text-white">{{ $item->title }}</h4>
                            
                            <p class="text-muted">{{ $item->category->cat_title ?? 'No Category' }}</p>
                            
                            <p class="small text-white-50">
                                {{$item->description }}
                            </p>
                        </div>

                        <form action="{{url('user_cart', $item->id)}}" method="POST">
                            @csrf
                            <input type="number" min="1" value="1" style="width:150px; height:40px;" name="qty" required>
                            <input type="submit" class="btn btn-danger" value="Add to Cart">
                        </form>

                        <br> <br> <br>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <h4 class="text-warning">No food found in this category!</h4>
            </div>
        @endif
    </div>
</div>
  <!-- End BLOG Section   --> 

         


            </div>
        </div>
    </div>

