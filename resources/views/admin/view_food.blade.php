<!DOCTYPE html>
<html>

@include('admin.css')

<style>
    .page-title {
        text-align: center;
        color: #fff;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .table-wrapper {
        width: 95%;
        margin: 0 auto;
        overflow-x: auto;
    }

    .food-table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #fff;
    }

    .food-table th {
        background: #0f8d8d;
        color: #fff;
        padding: 14px;
        text-align: center;
    }

    .food-table td {
        border: 2px solid #fff;
        color: #fff;
        padding: 12px;
        text-align: center;
        vertical-align: middle;
    }

    .food-table img {
        width: 90px;
        border-radius: 6px;
    }

    .action-box {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .edit-btn {
        background: #0f8d8d;
        color: #fff;
        padding: 6px 16px;
        border-radius: 4px;
        text-decoration: none;
    }

    .delete-btn {
        background: crimson;
        color: #fff;
        border: none;
        padding: 6px 16px;
        cursor: pointer;
        border-radius: 4px;
    }
</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <h2 class="page-title">Food List</h2>

            <div class="table-wrapper">

                <table class="food-table">

                    <thead>
                        <tr>
                            <th>Food Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Food Image</th>
                            <th>Manage</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($data as $item)

                            <tr>

                                <td>{{ $item->title }}</td>

                                <td>{{ Str::limit($item->description, 50) }}</td>

                                <td>{{ $item->category->cat_title }}</td>

                                <td>{{ $item->price }}</td>

                                <td>
                                    <img src="{{ asset('foodimage/' . $item->image) }}" alt="Food Image">
                                </td>

                                <td>
                                    <div class="action-box">

                                        <a href="{{ url('edit_food', $item->id) }}" class="edit-btn">
                                            Edit
                                        </a>

                                        <form action="{{ route('delete_food', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-btn">
                                                Delete
                                            </button>

                                        </form>

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