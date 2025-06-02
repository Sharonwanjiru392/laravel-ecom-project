<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section start -->
   @include ('home.header')
    <!-- end header section -->
    <!-- slider section -->


    <!-- end slider section -->
  </div>

  <div>
    <table class="table table-bordered">
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Image</th>
          <th>Remove</th>
        </tr>

        <?php $value = 0; ?>

        @foreach($cart as $cart)
        <tr>
          <td>{{$cart->product->title}}</td>
          <td>${{$cart->product->price}}</td>
          <td>
            <img src="{{asset('products/'.$cart->product->image)}}" width="50">
          </td>
          <td>
            <a href="{{url('delete_cart',$cart->id)}}" class="btn btn-danger">Remove</a>
          </td>
        </tr>
        <?php
        // $price = floatval($cart->product->price); // Ensure it's a float
        $value += (int)$cart->product->price;
        // $value += $price; // Add to total
        ?>
        @endforeach


    </table>
  </div>
  <div class="text-center mt-4">
  <h2 class="fw-bold bg-light p-3 rounded shadow-sm">
    Total Price: <span class="text-success">Ksh{{$value}}</span>
  </h2>
</div>

  <!-- end hero area -->

  <!-- shop section -->

  <!-- end shop section -->







  <!-- contact section -->





  <!-- end contact section -->

  <!-- info section -->

            <div class="order_deg" style="display:flex; justify-content:center; align-items:center;">
                <form action="{{url('confirm_order')}}" method="post">
                    @csrf
                    <div>
                        <label>Receiver Name </label>
                        <input type="text" value="{{Auth::user()->name}}" name="name">
                    </div>
                    <div>
                        <label>Receiver Address </label>
                        <textarea name="address">{{Auth::user()->address}}</textarea>
                    </div>
                    <div>
                        <label>Receiver phone </label>
                        <input type="text" value="{{Auth::user()->phone}}" name="phone">
                    </div>
                    <div>
                        <input class="btn btn-primary"type="submit" value="cash on delivery">

                        <a href="{{url('stripe',$value)}}" class="btn btn-danger">Pay using card</a>
                        </div>
                </form>
            </div>

@include('home.footer')
</body>

</html>
