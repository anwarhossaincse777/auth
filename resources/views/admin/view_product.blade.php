<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product view</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
        <body>

        @include('sweetalert::alert')
      <div class="card m-5">


      <div class="card-header">

           <h4>All Products List</h4>

          <div class="float-end">

              <a href="{{route('admin.dashboard')}}">Add Product</a>

          </div>
          <table class="table table-bordered" >
              <thead>
              <tr>
                  <th scope="col">Index</th>
                  <th scope="col">Name</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Price</th>
                  <th scope="col">Discount Price</th>
                  <th scope="col">Color</th>
                  <th scope="col">Size</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>

              @foreach($products as $index=>$items)
              <tr>
                  <th scope="row">{{$index+1}}</th>
                  <td>{{$items->name}}</td>
                  <td>{{$items->slug}}</td>
                  <td>{{$items->price}} Tk </td>
                  <td>{{$items->discount_price}} Tk </td>
                  <td>{{$items->color}}</td>
                  <td>{{$items->size}}</td>

                  <td>
                      @if($items->stock==1)


                      <h4 style="color: green">In stock</h4>

                          @else

                          <h4 style="color: red">Not In stock</h4>

                      @endif

                  </td>
                  <td>{{$items->description}}</td>

                  <td>

                      @if ($items->stock == 1)
                          <a href="{{ url('admin/product-inactive/'.$items->id) }}" class="btn btn-sm btn-success" title="inactive">Stock</a>
                      @else
                          <a href="{{ url('admin/product-active/'.$items->id) }}" class="btn btn-sm btn-danger" title="active now data">Not In stock</a>
                      @endif

                      <a href="{{ url('admin/product-edit/'.$items->id) }}" class="btn btn-sm btn-primary" title="edit data">Edit</a>

                      <a href="{{ url('admin/product-delete/'.$items->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data">Delete</a>
                  </td>
              </tr>

              @endforeach


              </tbody>
          </table>




      </div>


      </div>



        </body>
</html>
