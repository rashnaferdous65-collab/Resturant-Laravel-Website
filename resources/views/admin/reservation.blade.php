<!DOCTYPE html>
<html> 
  @include('admin.css')
  <style>
    .cat {
        text-align: center;
        font-weight: bold;
        color: white;
        padding-bottom: 20px;
        font-size: 24px;
    }

    .table_container {
        width: 100%;
        overflow-x: auto; /* স্ক্রিন ছোট হলে স্ক্রল হবে */
        margin-top: 30px;
    }

    .table {
        margin: auto;
        width: 95%; /* ফিক্সড ১২০০ এর বদলে পার্সেন্টেজ ব্যবহার করুন */
        border-collapse: collapse; /* ডাবল বর্ডার দূর করবে */
        background-color: #2d3035; /* ডার্ক থিমের সাথে মানানসই */
    }

    th {
        background-color: rgba(21, 142, 138, 0.9);
        padding: 12px 8px;
        color: white;
        font-weight: bold;
        text-align: center;
        border: 1px solid #555;
        font-size: 14px;
    }

    td {
        color: #dbdce1;
        border: 1px solid #555;
        padding: 10px 5px;
        font-size: 13px;
        word-wrap: break-word; /* লম্বা লেখা ভেঙে নিচে নামবে */
        vertical-align: middle;
        text-align: center;
    }

    /* নির্দিষ্ট কলামের উইথ কন্ট্রোল */
    .col-address { width: 150px; }
    .col-email { width: 150px; }

    .food_image {
        width: 60px;
        height: 60px;
        border-radius: 5px;
        object-fit: cover;
    }

    .action-btns {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .btn-edit {
        padding: 5px 10px;
        background-color: #158e8a;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-size: 12px;
    }

    .btn-delete {
        padding: 5px 10px;
        background-color: #ff4d4d;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
    }
  </style>
<body>

    @include('admin.header')
    @include('admin.slidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="cat">View Food Details Here</h1>

                <div class="table_container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Phone</th>
                                <th> Guest </th>
                                <th>Date</th>
                                <th> Time</th>
                          
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                  <td>{{$item->phone}}</td>
                                <td>{{$item->guest}}</td>
                                
                              
                               
                                <td>{{$item->date}}</td>
                                <td>{{$item->time}}</td>
                                
                  
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