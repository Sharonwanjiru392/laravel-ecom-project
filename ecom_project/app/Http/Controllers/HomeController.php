<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
// use mpesa;
// use Stripe;
use Stripe;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $user = User:: where('usertype', 'user')->get()->count();
        $product = product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status', 'delivered')->get()->count();
        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function home(){
        $product = product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index', compact('product', 'count'));
    }

    public function login_home(){
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id){
        $data = product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Added to the cart Successfully');
        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        }
        // else{
        //     $cart = '';
        // }
        return view('home.mycart', compact('count','cart'));
    }
    public function delete_cart($id)
{
    $data = Cart::find($id);

    if (!$data) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    $data->delete();

    flash()->success('The product has been Deleted successfully');

    return redirect()->back();
}


    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts)
        {
            $order= new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();

        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach ($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        flash()->success('Your Order has been placed Successfully');
        return redirect()->back();
    }


    public function myorders()
    {
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();
        $order = Order::where('user_id', $user)->get();
        return view('home.order', compact('count','order'));
    }

    // public function stripe()
    // {
    //     $stripe_key = config('services.stripe.key') ?? env('STRIPE_KEY');

    //     return view('home.stripe', compact('stripe_key'));
    // }

    // public function stripePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     Stripe\Charge::create ([
    //             "amount" => 100 * 100,
    //             "currency" => "usd",


    //             "source" => $request->stripeToken,

    //             "description" => "Test payment complete "

    //     ]);



    //     Session::flash('success', 'Payment successful!');



    //     return back();

    // }

    // public function stk(){
    //     $mpesa= new \Safaricom\Mpesa\Mpesa();
    //     $BusinessShortCode = '174379';
    //     $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    //     $TransactionType = 'CustomerPayBillOnline';
    //     $Amount = 1;
    //     $PartyA = '254707340087';
    //     $PartyB = '174379';
    //     $PhoneNumber = '254707340087';
    //     $CallBackURL = 'https://example.com/callback';
    //     $AccountReference = 'test123';
    //     $TransactionDesc = 'Payment for testing';
    //     $Remarks = 'Payment for testing';
    //     $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);

    //     dd($stkPushSimulation);
    //     return view('home.mpesa', compact('count','order'));

    // }
    // Removed misplaced return statement

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }
     public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "Kes",


                "source" => $request->stripeToken,

                "description" => "Test payment complete "

        ]);



        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()-> address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts)
        {
            $order= new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->payment_status = 'paid';
            $order->product_id = $carts->product_id;
            $order->save();

        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach ($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        flash()->success('Your Order has been placed Successfully');
        return redirect('mycart');






    }


}
