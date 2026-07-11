<!DOCTYPE html>
<html lang="en">

@include('admin.css')

<style>
.edit-box{
    max-width: 750px;
    margin: 20px auto;
    background: #2b3035;
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 8px 25px rgba(0,0,0,.35);
}

.edit-box h3{
    text-align: center;
    color: #fff;
    margin-bottom: 25px;
    font-weight: 600;
}

.form-title{
    color: #d7d7d7;
    font-weight: 600;
    margin-bottom: 8px;
}

.form-control,
.form-select{
    background: #1d2125;
    border: 1px solid #4d4d4d;
    color: #fff;
    border-radius: 8px;
}

.form-control:focus,
.form-select:focus{
    background: #1d2125;
    color: #fff;
    border-color: #20c997;
    box-shadow: none;
}

.preview-image{
    width: 120px;
    border-radius: 8px;
    border: 2px solid #555;
}

.update-btn{
    background: #198754;
    border: none;
    padding: 10px 35px;
    border-radius: 30px;
    font-weight: 600;
}

.update-btn:hover{
    background: #157347;
}
</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
<div class="page-header">
<div class="container-fluid">

<div class="edit-box">

    <h3>Edit Food Information</h3>

    <form action="{{ url('update_food',$food->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-title">Food Name</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ $food->title }}"
                placeholder="Food title">
        </div>

        <div class="mb-3">
            <label class="form-title">Description</label>
            <textarea
                name="description"
                rows="4"
                class="form-control"
                placeholder="Write food description">{{ $food->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-title">Price</label>
            <input
                type="number"
                name="price"
                value="{{ $food->price }}"
                class="form-control"
                placeholder="Food price">
        </div>

        <div class="mb-3">
            <label class="form-title">Category</label>

            <select name="category" class="form-select" required>

                <option value="">Choose Category</option>

                @foreach($category as $cat)

                    <option value="{{ $cat->id }}"
                        {{ $food->category_id == $cat->id ? 'selected' : '' }}>

                        {{ $cat->cat_title }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="form-title d-block">Current Image</label>

            <img
                src="{{ asset('foodimage/'.$food->image) }}"
                class="preview-image"
                alt="Food Image">
        </div>

        <div class="mb-4">
            <label class="form-title">Upload New Image</label>

            <input
                type="file"
                name="image"
                class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn update-btn">
                Save Changes
            </button>
        </div>

    </form>

</div>

</div>
</div>
</div>

@include('admin.footer')

</body>
</html>