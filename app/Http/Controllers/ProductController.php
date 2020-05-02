<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;

use Session;
use App\Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Auth;

class ProductController extends Controller
{
    // theem vao gio hang
    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);

    	// dd($request->session()->get('cart'));
    	return redirect('LaravelShop');
    }
    // hien thi gio hang
    public function getShoppingCart(){
    	if(!Session::has('cart')){
    		return view('shop.shopping-cart', ['products'=>null]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shopping-cart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
    }
    //checkout
    public function checkout(){
        if(!Auth::check())
        {
            return redirect()->route('users.login');
        }
    	if(!Session::has('cart'))
    	{
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout', ['total'=>$total]);
    }
    public function postCheckout(Request $request){
    	if(!Session::has('cart'))
    	{
    		return redirect()->route('product.shoppingCart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);

        $user_email = $request->email;

    	Stripe::setApiKey('sk_test_KEGrVZIG4Ea4SJ9O6N1jzIhd00keMDnAz1');
        try
        {
            $customer = Customer::create(array(
                "email"=>$user_email,
                "source"=>$request->stripeToken
            ));

            $a = Charge::create(array(
                "amount"=>$cart->totalPrice * 100,
                "currency"=>"usd",
                "description"=>"Test Charge",
                "customer"=>$customer->id
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $a->id;
            
                Auth::user()->orders()->save($order);
            
        }catch(\Exception $e)
        {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
            
    	Session::forget('cart');
    	return redirect('LaravelShop')->with('success', 'Successfully purchased products.');
        }
    }	


//https://viblo.asia/p/dung-thu-stripe-phan-1-maGK7j1D5j2