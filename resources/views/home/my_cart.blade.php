<!DOCTYPE html>
<html lang="en">
@include('home.css')
@include('home.navbar')

<style>
    .cat {
        text-align: center;
        color: #fff;
        font-weight: bold;
        margin: 40px 0;
    }

    .cart-table {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
        text-align: center;
    }

    .cart-table th {
        background: #138d88;
        color: #fff;
        padding: 12px;
    }

    .cart-table td {
        border: 2px solid #fff;
        color: #fff;
        padding: 12px;
    }

    .food-image {
        width: 80px;
        border-radius: 5px;
    }

    .cancel-btn {
        background: crimson;
        color: #fff;
        border: none;
        padding: 8px 15px;
        cursor: pointer;
        border-radius: 5px;
    }

    .cancel-btn:hover {
        background: darkred;
    }

    .total-price {
        text-align: center;
        color: #fff;
        margin: 40px 0;
        font-weight: bold;
    }

    .order-box {
        width: 500px;
        margin: 40px auto;
        background: #222831;
        padding: 30px;
        border-radius: 10px;
    }

    .order-box h2 {
        text-align: center;
        color: #ff4d4d;
        margin-bottom: 25px;
    }

    .order-box label {
        color: #ddd;
        margin-bottom: 5px;
        display: block;
    }

    .order-box input {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        background: #393e46;
        border: 1px solid #555;
        color: white;
        border-radius: 5px;
    }

    .confirm-btn {
        width: 100%;
        padding: 12px;
        background: #ff4d4d;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
    }

    .confirm-btn:hover {
        background: #d90000;
    }
</style>

<body>

    <h1 class="cat">View Food Details Here</h1>

    <?php $total_price = 0; ?>

    <table class="cart-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($data as $item)

            <tr>
                <td>{{ $item->title }}</td>

                <td>{{ Str::limit($item->description,50) }}</td>

                <td>{{ $item->quantity }}</td>

                <td>
                    <img src="foodimage/{{ $item->image }}" class="food-image">
                </td>

                <td>${{ $item->price }}</td>

                <td>{{ $item->category->cat_title }}</td>

                <td>
                    <form action="{{ route('delete_cart',$item->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to remove this item?')">

                        @csrf
                        @method('DELETE')

                        <button class="cancel-btn" type="submit">
                            Cancel
                        </button>

                    </form>
                </td>
            </tr>

            <?php $total_price += $item->price; ?>

            @endforeach

        </tbody>
    </table>

    <h2 class="total-price">
        Total Price : ${{ $total_price }}
    </h2>


    <div class="order-box">

        <h2>Delivery Information</h2>

        <form action="{{ route('confirm_order') }}" method="POST">

            @csrf

            <label>Your Name</label>
            <input type="text" name="name"
                value="{{ Auth()->user()->name }}"
                placeholder="Enter Your Name" required>

            <label>Your Email</label>
            <input type="email" name="email"
                value="{{ Auth()->user()->email }}"
                placeholder="Enter Your Email" required>

            <label>Your Phone</label>
            <input type="text" name="phone"
                value="{{ Auth()->user()->phone }}"
                placeholder="Enter Phone Number" required>

            <label>Your Address</label>
            <input type="text" name="address"
                value="{{ Auth()->user()->address }}"
                placeholder="Enter Delivery Address" required>

            <button type="submit" class="confirm-btn">
                Confirm Order
            </button>

        </form>

    </div>

@include('home.footer')

</body>
</html>