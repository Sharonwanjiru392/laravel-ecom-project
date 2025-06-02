<!DOCTYPE html>
<html>
    <head>
  @include('admin.css')
  <style type="text/css">
    .div-deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    lable{
        display: inline-block;
        width: 250px;
        font-size: 20px !important;
        color: white !important;
    }
    input[type="text"]{
        width: 400px;
        height: 50px;
    }
    textarea{
        width: 400px;
        height: 100px;
    }
    .input_deg{
        padding: 15px;
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
            <h3 style="color:white">Add Product</h3>
                <div class="div-deg">
                    <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input_deg">
                            <lable>Product title</lable>
                            <input type="text" name="title" required>
                        </div>

                        <div class="input_deg">
                            <lable>Description</lable>
                            <textarea name="description" required></textarea>
                        </div>

                        <div class="input_deg">
                            <lable>Price</lable>
                            <input type="text" name="price" required>
                        </div>

                        <div class="input_deg">
                            <lable>Quantity</lable>
                            <input type="number" name="qty">
                        </div>
                        <div class="input_deg">
                            <lable>Product Category</lable>
                            <select name="category" required>
                                <option>
                                    Select a option
                                </option>
                                @foreach ($category as $category)
                                <option value= " {{$category->category_name}}">
                                    {{$category->category_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input_deg">
                            <lable>Product Image</lable>
                            <input type="file" name="image">
                        </div>

                         <div class="input_deg">
                            <input type="submit" value="Add Product" class="btn btn-success">
                         </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    <!-- JavaScript files-->
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
