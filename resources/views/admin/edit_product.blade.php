<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

@include('sweetalert::alert')
<div class="container m-5">


    <div class="card">
        <div class="card-header">
            <a href="{{route('show.product')}}">View Product</a>


            <div class="float-end">

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-left"></i><span>Log Out</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('update-product-data')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product Name: </label>
                            <input class="form-control" type="text" name="name" value="{{$product->name}}" placeholder="Product Name ">
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product Size: </label>
                            <input class="form-control" type="text" name="size" value="{{$product->size}}" placeholder="Product size">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product price: </label>
                            <input class="form-control" type="text" name="price" value="{{$product->price}}" placeholder="Product Name ">
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product Discount Price: </label>
                            <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}" placeholder="Product Name ">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product Color: </label>
                            <input class="form-control" type="text" name="color" value="{{$product->color}}" placeholder="Product Name ">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                            <textarea class="form-control" type="text" name = 'description'  rows="3" >{{ old('body', $product->description ?? null) }}</textarea>
                        </div>


                        <br>
                        <div class="float-end">
                            <button type="submit" class="btn btn-info">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</div>




<script href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
