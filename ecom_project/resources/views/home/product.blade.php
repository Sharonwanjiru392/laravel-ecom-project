<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($product as $products)




        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">

              <div class="img-box">
                <img src="{{asset('products/'.$products->image)}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$products->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    Ksh{{$products->price}}
                  </span>
                </h6>
              </div>

            <div style="padding: 15px;  display: flex; gap: 10px;">
                <a href="{{url('product_details', $products->id)}}" class="btn btn-primary">
                  View Details
                </a>

                <a href="{{url('add_cart',$products->id)}}" class="btn btn-success"> Add to Cart</a>

            </div>
          </div>
        </div>
        @endforeach
    </div>
  </section>
