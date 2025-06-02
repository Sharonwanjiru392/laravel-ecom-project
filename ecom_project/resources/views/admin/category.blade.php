<!DOCTYPE html>
<html>
    <head>
  @include('admin.css')
  <style type="text/css">
    input [type="text"]{
        width: 9000px;
        height: 40px;
    }

    .div-des{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
    }
    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid pink;
        margin-top: 50px;
        width: 600px;
    }
    th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
    }
    td{
        padding: 10px;
        border: 1px solid skyblue;
        color: while;
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

          <h3 style="color:white">Add Category</h3>
        <div class="div-des">

          <form action="{{url('add_category')}}" method="post">
            @csrf
            <div>
                <input type="text" name="category" >


                <input class="btn btn-primary"type="submit" value="Add Category">

          </form>

          </div>
          </div>
          <div>
            <table class="table_deg">
                <tr>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                     <td>{{$data->category_name}}</td>
                        <td><a class="btn btn-success"href="{{url('edit_category',$data->id)}}">Edit</a></td>
                        <td><a class="btn btn-danger"onclick="confirmation(event)"href="{{url('delete_category',$data->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
          </div>

                </div>
        </div>
      </div>
    <!-- JavaScript files-->

    @include('admin.js')
  </body>
</html>
