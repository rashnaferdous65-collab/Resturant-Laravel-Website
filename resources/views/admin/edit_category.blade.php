<!DOCTYPE html>
<html lang="en">
<head>

@include('admin.css')

<style>

.wrapper{
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.edit-box{
    text-align: center;
}

.title{
    color: #fff;
    font-weight: bold;
    margin-bottom: 35px;
}

.input-box{
    width: 480px;
    height: 42px;
    padding: 8px 12px;
    margin: 15px 0 25px;
    border-radius: 5px;
    border: none;
    outline: none;
}

</style>

</head>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show mx-auto text-center" style="max-width:600px;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>

                    {{ session('message') }}
                </div>
            @endif

            <div class="wrapper">

                <div class="edit-box">

                    <h2 class="title">Update Category</h2>

                    <form action="{{ route('update_category', $data->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div>
                            <label class="text-white d-block mb-2">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="cat_name"
                                class="input-box"
                                value="{{ old('cat_name', $data->cat_title) }}"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-success px-4">
                            Save Changes
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>