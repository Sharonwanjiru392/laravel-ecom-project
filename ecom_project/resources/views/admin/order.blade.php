<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')
        <style type="text/css">
        .table_center {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .table_center table {
            width: 90%;
            border-collapse: collapse;
            background-color: #fce4ec; /* Soft pink background */
            color: #4a2c2a; /* Dark brown text */
            border-radius: 8px;
            overflow: hidden;
        }

        .table_center th, .table_center td {
            padding: 12px;
            text-align: center;
            border: 1px solid #d7a29e; /* Light brown border */
        }
        .table_center th {
            background-color: #e91e63; /* Deeper pink for headers */
            color: white;
            font-weight: bold;
        }

        .table_center img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 2px solid #d7a29e; /* Light brown border */
        }
        .table_center tr:nth-child(even) {
            background-color: #f8bbd0; /* Soft pink alternate row */
        }
        .table_center tr:hover {
            background-color: #f48fb1; /* Highlight row on hover */
            transition: 0.3s ease-in-out;
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
                <div class="table_center">
                    <table>
                        <tr>
                            <th>Customer name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>price</th>
                            <th>image</th>
                            <th>status</th>
                            <th>Change status</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->rec_address}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->product->title}}</td>
                            <td>{{$data->product->price}}</td>
                            <td>
                                <img src="products/{{$data->product->image}}" width="100">
                            </td>
                            <td>{{$data->status}}</td>
                            <td>
                                <a href="{{url('on_the_way',$data->id)}}" class="btn btn-secondary">on the way</a>

                            </td>
                            <td>
                                <a href="{{url('delivered',$data->id)}}" class="btn btn-success">Delivered</a>
                            </td>
                            <td>
                                <a href="{{url('print_pdf',$data->id)}}"class="btn btn-warning">Print PDF</a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
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
