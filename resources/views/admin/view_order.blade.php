```blade
<!DOCTYPE html>
<html>
@include('admin.css')

<style>
    .page-title{
        text-align:center;
        color:#fff;
        font-size:26px;
        font-weight:700;
        margin-bottom:25px;
    }

    .order-wrapper{
        width:100%;
        overflow-x:auto;
    }

    .order-table{
        width:96%;
        margin:auto;
        border-collapse:collapse;
        background:#2d3035;
    }

    .order-table th{
        background:#169a95;
        color:#fff;
        padding:12px;
        text-align:center;
        border:1px solid #555;
        font-size:14px;
    }

    .order-table td{
        border:1px solid #555;
        padding:10px;
        text-align:center;
        color:#ddd;
        font-size:13px;
        vertical-align:middle;
    }

    .customer-email{
        width:170px;
        word-break:break-word;
    }

    .customer-address{
        width:170px;
        word-break:break-word;
    }

    .food-img{
        width:65px;
        height:65px;
        object-fit:cover;
        border-radius:6px;
    }

    .status-box{
        padding:5px 10px;
        border-radius:5px;
        background:#17a2b8;
        color:#fff;
        display:inline-block;
        font-size:12px;
    }

    .action-area{
        display:flex;
        justify-content:center;
        gap:6px;
        flex-wrap:wrap;
    }
</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <h2 class="page-title">Food Order Information</h2>

            <div class="order-wrapper">

                <table class="order-table">

                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Food Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Category</th>
                            <th>Food Image</th>
                            <th>Delivery Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($data as $item)

                        <tr>

                            <td>{{ $item->name }}</td>

                            <td class="customer-email">
                                {{ $item->email }}
                            </td>

                            <td>{{ $item->phone }}</td>

                            <td class="customer-address">
                                {{ $item->address }}
                            </td>

                            <td>{{ $item->title }}</td>

                            <td>{{ $item->quantity }}</td>

                            <td>{{ $item->price }}</td>

                            <td>{{ $item->category->cat_title }}</td>

                            <td>
                                <img src="foodimage/{{ $item->image }}" class="food-img" alt="">
                            </td>

                            <td>
                                <span class="status-box">
                                    {{ $item->delivary_status }}
                                </span>
                            </td>

                            <td>

                                <div class="action-area">

                                    <a href="{{ url('delivered',$item->id) }}" class="btn btn-primary btn-sm">
                                        Delivered
                                    </a>

                                    <a href="{{ url('cancel',$item->id) }}" class="btn btn-warning btn-sm">
                                        Cancel
                                    </a>

                                    <a href="{{ url('on_the_way',$item->id) }}" class="btn btn-light btn-sm">
                                        On The Way
                                    </a>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>
```
