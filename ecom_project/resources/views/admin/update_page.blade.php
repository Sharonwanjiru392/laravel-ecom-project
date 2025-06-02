<!DOCTYPE html>
<html>
  @include('admin.css')
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h2>Update products</h2>
                        <div class="container mt-4">
                <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data"class="p-4 border rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" value="{{$data->title}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control">{{$data->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Price</label>
                        <input type="text" name="price" value="{{$data->price}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Quantity</label>
                        <input type="number" name="quantity" value="{{$data->quantity}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" class="form-select">
                            <option value="{{$data->category}}">{{$data->category}}</option>
                            @foreach ($category as $category)
                            <option>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Current Image</label>
                        <div>
                            <img src="{{asset('products/'.$data->image)}}" alt="Current Image" class="img-thumbnail" width="120">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">New Image</label>
                        <input type="file" name="image" class="form-control">
                        <div>
                        </div>
                    </div>

                    <div>
                        <input class="btn btn-success w-100" type="submit" value="Update Product">
                    </div>

                </form>
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
