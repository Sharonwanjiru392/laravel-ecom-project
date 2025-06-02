<!DOCTYPE html>
<html>
    <head>
  @include('admin.css')
  <style type="text/css">
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
  </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-success" value="Search">
                </form>

         <div class="div_deg">
            <table class="table table-striped">
                <tr class="bg-dark text-white">
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($product as $products)

                <tr class="table-bordered border-primary text-light">
                    <td>{{$products->title}}</td>
                    <td>{!! Str::limit($products->description, 50) !!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                        <img src="{{asset('products/'.$products->image)}}" width="100">
                    </td>
                    <td>
                        <a href="{{url('update_product', $products->id)}}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <a href="{{url('delete_product', $products->id)}}" class="btn btn-danger"onclick="confirmation(event)">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

         </div>
         <div class="div_deg">
         {{ $product->onEachSide(1)->links() }}
        </div>
                </div>
        </div>
      </div>
    <!-- JavaScript files-->
     @include('admin.js')
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
