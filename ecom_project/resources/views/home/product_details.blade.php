<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_center{
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }
    .detail-box{
      display: flex;
      justify-content: space-between;
      padding: 10px;
    }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include ('home.header')
    <!-- end header section -->
    <!-- slider section -->


    <!-- end slider section -->
  </div>


  <!-- product details start -->
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">




        <div class="col-sm-10">
          <div class="box">

              <div class="div_center">
                <img src="{{asset('/products/'.$data->image)}}" alt="" width="200">
              </div>
              <div class="detail-box">
                <h6>
                  {{$data->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    Ksh{{$data->price}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>
                  Category: {{$data->category}}
                </h6>
                <h6>
                 Available Quantity
                  <span>
                    ${{$data->quantity}}$
                  </span>
                </h6>
              </div>
              <div class="detail-box">

                  <p>
                    {{$data->description}}
                  </p>

              </div>
          </div>
        </div>
    </div>
  </section>

   <!-- product details ends -->

@include('home.footer')
</body>

</html>
