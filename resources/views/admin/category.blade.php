<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')

    <style>

        .category-wrapper{
            width: 100%;
            text-align: center;
            margin: auto;
        }

        .category-title{
            color: #fff;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .category-form{
            margin-bottom: 40px;
        }

        .category-input{
            width: 500px;
            height: 42px;
            padding: 0 12px;
        }

        .category-table{
            width: 70%;
            margin: 40px auto;
            text-align: center;
            border: 2px solid #fff;
            table-layout: fixed;
        }

        .category-table th{
            background: #168b88;
            color: white;
            padding: 12px;
        }

        .category-table td{
            border: 2px solid #fff;
            color: white;
            padding: 12px;
        }

        .action-box{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
        }

        .edit-btn{
            padding:6px 16px;
            background:#0d6efd;
            color:#fff;
            text-decoration:none;
            border-radius:4px;
        }

        .delete-btn{
            padding:6px 14px;
            background:#dc3545;
            color:#fff;
            border:none;
            cursor:pointer;
            border-radius:4px;
        }

    </style>

</head>
<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show text-center mx-auto"
                     style="max-width:600px; margin-top:20px;">

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        x
                    </button>

                    {{ session()->get('message') }}

                </div>

            @endif

            <div class="category-wrapper">

                <h2 class="category-title">Add Category</h2>

                <form class="category-form"
                      action="{{ url('made_category') }}"
                      method="POST">

                    @csrf

                    <label>Add Category</label>

                    <input
                        type="text"
                        name="category"
                        class="category-input"
                        required>

                    <input
                        type="submit"
                        value="Add Category"
                        class="btn btn-primary">

                </form>

            </div>

            <table class="category-table">

                <thead>

                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($data as $category)

                    <tr>

                        <td>{{ $category->cat_title }}</td>

                        <td>

                            <div class="action-box">

                                <a href="{{ url('edit_category',$category->id) }}"
                                   class="edit-btn">
                                    Edit
                                </a>

                                <form action="{{ route('cat_delete',$category->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this category?')">

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

@include('admin.footer')

</body>
</html>

                    
        