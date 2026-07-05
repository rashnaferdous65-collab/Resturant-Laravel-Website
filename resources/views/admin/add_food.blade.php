<!DOCTYPE html>
<html>
@include('admin.css')

<style>
    .food-wrapper {
        max-width: 700px;
        margin: auto;
    }

    .food-form-card {
        background: #2b3035;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,.35);
    }

    .food-form-header {
        background: #1d2124;
        padding: 18px;
        text-align: center;
        color: #fff;
        font-weight: 600;
        font-size: 22px;
    }

    .food-form-body {
        padding: 30px;
    }

    .food-group {
        margin-bottom: 20px;
    }

    .food-group label {
        display: block;
        color: #ddd;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .food-control {
        width: 100%;
        background: #20252a;
        color: #fff;
        border: 1px solid #4b4f54;
        border-radius: 8px;
        padding: 10px 14px;
    }

    .food-control:focus {
        outline: none;
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(13,110,253,.3);
    }

    .food-submit {
        border: none;
        padding: 10px 40px;
        border-radius: 30px;
        color: #fff;
        font-weight: 600;
        background: linear-gradient(135deg,#0d6efd,#198754);
        transition: .3s;
    }

    .food-submit:hover {
        transform: translateY(-2px);
    }
</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="food-wrapper">

                <div class="food-form-card">

                    <div class="food-form-header">
                        🍽️ Add New Food
                    </div>

                    <div class="food-form-body">

                        <form action="{{ url('upload_food') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="food-group">
                                <label>Food Name</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="food-control"
                                    placeholder="Food title"
                                    required>
                            </div>

                            <div class="food-group">
                                <label>Description</label>
                                <textarea
                                    name="description"
                                    rows="4"
                                    class="food-control"
                                    placeholder="Write food details..."
                                    required></textarea>
                            </div>

                            <div class="food-group">
                                <label>Price</label>
                                <input
                                    type="number"
                                    name="price"
                                    class="food-control"
                                    placeholder="Food price"
                                    required>
                            </div>

                            <div class="food-group">
                                <label>Food Category</label>

                                <select name="category" class="food-control" required>

                                    <option value="">Select Category</option>

                                    @foreach($data as $data)

                                        <option value="{{ $data->id }}">
                                            {{ $data->cat_title }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="food-group">
                                <label>Upload Image</label>

                                <input
                                    type="file"
                                    name="image"
                                    class="food-control"
                                    required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="food-submit">
                                    Add Food
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>