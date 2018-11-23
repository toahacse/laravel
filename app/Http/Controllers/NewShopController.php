<?php

namespace App\Http\Controllers;

use App\Category;
use App\coustmer;
use App\order;
use App\orderDetails;
use App\payment;
use App\product;
use App\shipping;
use Cart;
use Illuminate\Http\Request;
use Session;
use Mail;

class NewShopController extends Controller
{
    public function index(){
       $category = Category::where('publicationStatus' , 1)->get();
       $newProduct= product::where('publication_Status',1)
                    ->orderBy('id','DESC')
                    ->take(8)
                    ->get();
        return view('front-end.home.home',[
            'category'=>$category,
            'newProduct'=>$newProduct
        ]);
    }

     public function categoryProduct($id){
        $category = Category::where('publicationStatus' , 1)->get();
        $category1 = Category::where('id',$id)->get();
        $categoryProduct= product::where('category_id',$id)
                    ->where('publication_Status',1)
                    ->get();
        return view('front-end.category.category-content',[
            'category'=>$category,
            'category1'=>$category1,
            'categoryProduct'=>$categoryProduct,
            'categoryProduct1'=>$categoryProduct,
        ]);
    }

    public function productDetails($id){
        $category = Category::where('publicationStatus' , 1)->get();
        $product = product::find($id);
        return view('front-end.product.product_details',[
            'category'=>$category,
            'product'=>$product
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addCart(Request $request){
        $product = product::find($request->id);

        Cart::add([
            'id'=>$request->id,
            'name'=>$product->product_name,
            'price'=>$product->product_price,
            'qty'=>$request->qty,
            'options'=>[
                'image' =>$product->product_image
            ]
        ]);
        return redirect('/show/cart');
    }

    public function show_cart(){
        $cartProducts= Cart::content();
        $category = Category::where('publicationStatus' , 1)->get();
        return view('front-end.cart.show-cart',[
            'cartProducts'=>$cartProducts,
            'category'=>$category,
            ]);

    }
    public function deleteCart($id){
       Cart::remove($id);
       return redirect('/show/cart');
    }
    public function updateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
       return redirect('/show/cart');
    }
    public function checkout(){
        $category = Category::where('publicationStatus' , 1)->get();
        return view('front-end.checkout.checkout-content',[
            'category'=>$category]);
    }
    public function customerSingUp(Request $request){
        $this->validate($request,[
           'email'=>'email|unique:coustmers,email'
        ]);

        $customer = new coustmer();
        $customer->f_name=$request->f_name;
        $customer->l_name=$request->l_name;
        $customer->email=$request->email;
        $customer->password=bcrypt($request->password);
        $customer->number=$request->number;
        $customer->address=$request->address;
        $customer->save();

        $customerId= $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->f_name.' '.$customer->l_name);

//        $data = $customer->toArray();
//
//        Mail::send('front-end.mail.confirmation-mail',$data, function ($message) use ($data){
//            $message->to($data['email']);
//            $message->subject('Confirmation Mail');
//        });


        return redirect('/checkout/shipping');
    }

    public function customerLogin(Request $request){
        $customer = coustmer::where('email',$request->email)->first();
        if(password_verify($request->Password, $customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->f_name.' '.$customer->l_name);
            return redirect('/checkout/shipping');
        }else{
            return redirect('/checkout')->with('massage','Faul,,valid password de.....');
        }
    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');

    }
    public function newCustomerLogin(){
        $category = Category::where('publicationStatus' , 1)->get();
        return view('front-end.customer.customer-login',[
        'category'=>$category
            ]);
    }

    public function shippingForm(){
        $category = Category::where('publicationStatus' , 1)->get();
        $customer = coustmer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',[
            'category'=>$category,
            'customer'=>$customer
        ]);
    }
    public function saveShippingInfo(Request $request){
        $shipping= new shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->number = $request->number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }
    public function paymentForm(){
        $category = Category::where('publicationStatus' , 1)->get();
        return view('front-end.checkout.payment',[
            'category'=>$category,
        ]);
    }
    public function newOrder(Request $request){
       $paymentType = $request->payment_type;
       if($paymentType == 'Cash'){
           $order= new order();
           $order->customer_id = Session::get('customerId');
           $order->shipping_id = Session::get('shippingId');
           $order->order_total = Session::get('orderTotal');
           $order->save();

           $payment= new payment();
           $payment->order_id = $order->id;
           $payment->payment_type = $paymentType;
           $payment->save();

           $cartProducts = Cart::content();
           foreach ($cartProducts as $cartProduct){
              $orderDetail = new orderDetails();
              $orderDetail->order_id = $order->id;
              $orderDetail->product_id = $cartProduct->id;
              $orderDetail->product_name = $cartProduct->name;
              $orderDetail->product_price = $cartProduct->price;
              $orderDetail->product_quantity = $cartProduct->qty;
              $orderDetail->save();
           }

           Cart::destroy();
           return redirect('/complete/order');

       }
        else if($paymentType == 'Paypel'){

       }
       else if($paymentType == 'Bkash'){

       }
    }
    public function completeOrder(){
        return 'success';
    }
}
