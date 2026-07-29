<style>
    .event-card {
        background: #1b1b1b;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 15px;
        overflow: hidden;
        transition: 0.3s;
        height: 100%;
    }

    .event-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(255,33,79,.25);
    }

    .event-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .event-content {
        padding: 20px;
    }

    .price-tag {
        display: inline-block;
        background: #ff214f;
        color: #fff;
        padding: 8px 18px;
        border-radius: 25px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .category-name {
        color: #ff214f;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
    }

    .cart-form input[type="number"] {
        width: 90px;
        height: 42px;
        border-radius: 5px;
        border: none;
        text-align: center;
    }

    .cart-form .btn {
        margin-left: 8px;
    }
</style>

<!-- BLOG SECTION START -->
<div id="blog" class="container-fluid bg-dark py-5">
    <div class="container">

        <div class="text-center mb-5 wow fadeIn">
            <h2 class="section-title text-light">
                EVENTS AT THE FOOD HUT
            </h2>
        </div>

        <div class="row g-4">

            @if($data->count() > 0)

                @foreach($data as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="event-card">

                        <img src="{{ asset('foodimage/' . $item->image) }}" alt="Food Image">

                        <div class="event-content">

                            <span class="price-tag">
                                {{ $item->price }}
                            </span>

                            <h4 class="text-white mt-2">
                                {{ $item->title }}
                            </h4>

                            <p class="category-name">
                                {{ $item->category->cat_title ?? 'No Category' }}
                            </p>

                            <p class="text-light small">
                                {{ $item->description }}
                            </p>

                            <form action="{{ url('user_cart', $item->id) }}" method="POST" class="cart-form mt-3">
                                @csrf

                                <div class="d-flex align-items-center">
                                    <input
                                        type="number"
                                        name="qty"
                                        value="1"
                                        min="1"
                                        required>

                                    <input
                                        type="submit"
                                        value="Add to Cart"
                                        class="btn btn-danger">
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            @else

                <div class="col-12 text-center">
                    <h4 class="text-warning">
                        No food found in this category!
                    </h4>
                </div>

            @endif

        </div>

    </div>
</div>
<!-- BLOG SECTION END -->
