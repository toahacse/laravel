<?php

namespace App\Http\Controllers;

use App\brand;
use App\Category;
use App\coustmer;
use App\order;
use App\orderDetails;
use App\payment;
use App\product;
use App\shipping;
use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home.home');
    }
            //Category Start

    public function addCategory(){
        return view('admin.category.add_category');
    }
    public function manageCategory(){
        $category= Category::all();
        return view('admin.category.manage_category',['category'=>$category]);
    }
    public function addCategorySave(Request $request){
        $category = new Category();
        $category->categoryName         =$request->categoryName;
        $category->categoryDescription  =$request->categoryDescription;
        $category->publicationStatus    =$request->publicationStatus;
        $category->save();
        return redirect('/add-category') ->with('massege','Categogy Info Save Successfully');
    }
    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publicationStatus=0;
        $category->save();
        return redirect('/Manage-category') ->with('massege','Categogy Info Unpublished');
    }
    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publicationStatus=1;
        $category->save();
        return redirect('/Manage-category') ->with('massege','Categogy Info Published');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',['category'=>$category]);
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->categoryid);
        $category->categoryName         =$request->categoryName;
        $category->categoryDescription  =$request->categoryDescription;
        $category->publicationStatus    =$request->publicationStatus;
        $category->save();
        return redirect('/Manage-category') ->with('massege','Categogy Info Updeted Successfully!');

    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/Manage-category') ->with('massege','Categogy Info Delete Successfully!');
    }
            //Brand Start

    public function addBrand(){
        return view('admin.brand.add_brand');
    }
    public function manageBrand(){
        $brand= brand::all();
        return view('admin.brand.manage_brand',['brands'=>$brand]);
    }
    public function addBrandSave(Request $request){
        $brand = new brand();
        $brand->Brand_Name         =    $request->Brand_Name;
        $brand->Brand_Description  =    $request->Brand_Description;
        $brand->publication_Status =    $request->publication_Status;
        $brand->save();
        return redirect('/add-Brand') ->with('massege','Brand Info Save Successfully');
    }
    public function unpublishedBrand($id){
        $brand = brand::find($id);
        $brand->publication_Status=0;
        $brand->save();
        return redirect('/manage-Brand') ->with('massege','Brand Info Unpublished');
    }
    public function publishedBrand($id){
        $brand = brand::find($id);
        $brand->publication_Status=1;
        $brand->save();
        return redirect('/manage-Brand') ->with('massege','Brand Info Published');
    }
    public function editBrand($id){
        $brand = brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brand]);
    }
    public function updateBrand(Request $request){
        $brand = brand::find($request->Brand_id);
        $brand->Brand_Name         =$request->Brand_Name;
        $brand->Brand_Description  =$request->Brand_Description;
        $brand->publication_Status    =$request->publication_Status;
        $brand->save();
           return redirect('/manage-Brand') ->with('massege','Brand Info Updeted Successfully!');
    }
    public function deleteBrand($id){
        $brand = brand::find($id);
        $brand->delete();
        return redirect('/manage-Brand') ->with('massege','Brand Info Delete Successfully!');
    }
            //Product Start

    public function addProduct(){
       $categorys= Category::where('publicationStatus',1)->get();
       $brands= brand::where('publication_Status',1)->get();
        return view('admin.product.add_product',[
        'categorys'  => $categorys,
        'brands'     => $brands,
        ]);
    }
    protected function imageUpload($request){
        $product_image=              $request->file('product_image');
        $product_image_name=         $product_image->getClientOriginalName();
        $product_image_directory=   'product-images/';
        $product_image_url=         $product_image_directory.$product_image_name;
        $product_image->move($product_image_directory, $product_image_name);
        return $product_image_url;
    }
    protected function saveProduct($request,$product_image_url){
        $product = new product();
        $product->category_id          =$request->category_id;
        $product->brand_id             =$request->brand_id;
        $product->product_name         =$request->product_name;
        $product->product_price        =$request->product_price;
        $product->product_quantity     =$request->product_quantity;
        $product->short_diccription    =$request->short_diccription;
        $product->long_diccription     =$request->long_diccription;
        $product->product_image        =$product_image_url;
        $product->publication_Status   =$request->publication_Status;
        $product->save();
    }
    public function addProductSave(Request $request){
        $product_image_url=$this->imageUpload($request);
        $this->saveProduct($request,$product_image_url);
      return redirect('/add-Product') ->with('massege','Product Info Save Successfully');
    }

    public function manageProduct(){
        $product= DB::table('products')
                    ->join('categories', 'products.category_id','=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*','categories.categoryName','brands.Brand_Name')
                    ->get();
        return view('admin.product.manage_Product',['product'=>$product]);
    }
    public function unpublishedproduct($id){
        $product = product::find($id);
        $product->publication_Status=0;
        $product->save();
        return redirect('/manage-Product') ->with('massege','Product Info Unpublished');
    }
    public function publishedProduct($id){
        $product = product::find($id);
        $product->publication_Status=1;
        $product->save();
        return redirect('/manage-Product') ->with('massege','Product Info Published');
    }
    public function editProduct($id){
        $categorys= Category::where('publicationStatus',1)->get();
        $brands= brand::where('publication_Status',1)->get();
        $product = product::find($id);
        return view('admin.product.edit-Product',[
            'product'=>$product,
            'categorys'=>$categorys,
            'brands'=>$brands
        ]);
    }

    public function updateProduct(Request $request){
       $product_image= $request->file('product_image');
       if($product_image){
           $product = product::find($request->Product_id);
           unlink($product->product_image);
           $product_image=              $request->file('product_image');
           $product_image_name=         $product_image->getClientOriginalName();
           $product_image_directory=   'product-images/';
           $product_image_url=         $product_image_directory.$product_image_name;
           $product_image->move($product_image_directory, $product_image_name);
           $product->category_id          =$request->category_id;
           $product->brand_id             =$request->brand_id;
           $product->product_name         =$request->product_name;
           $product->product_price        =$request->product_price;
           $product->product_quantity     =$request->product_quantity;
           $product->short_diccription    =$request->short_diccription;
           $product->long_diccription     =$request->long_diccription;
           $product->product_image        =$product_image_url;
           $product->publication_Status   =$request->publication_Status;
           $product->save();
           return redirect('/manage-Product') ->with('massege','Product Info Updete Successfully!');

       }else{
           $product = product::find($request->Product_id);
        $product->category_id          =$request->category_id;
        $product->brand_id             =$request->brand_id;
        $product->product_name         =$request->product_name;
        $product->product_price        =$request->product_price;
        $product->product_quantity     =$request->product_quantity;
        $product->short_diccription    =$request->short_diccription;
        $product->long_diccription     =$request->long_diccription;
        $product->publication_Status   =$request->publication_Status;
        $product->save();
           return redirect('/manage-Product') ->with('massege','Product Info Updete Successfully!');
    }
    }
    public function deleteProduct($id){
        $product = product::find($id);
        $product->delete();
        return redirect('/manage-Product') ->with('massege','Product Info Delete Successfully!');
    }
    public function manageOrder(){
        $orders = DB::table('orders')
                    ->join('coustmers','orders.customer_id', '=', 'coustmers.id')
                    ->join('payments','orders.id', '=', 'payments.order_id')
                    ->select('orders.*', 'coustmers.f_name','coustmers.l_name', 'payments.payment_type', 'payments.payment_status')
                    ->get();

       return view('admin.order.manage-order',[
           'orders'=>$orders
       ]);
    }
    public function viewOrderDetails($id){
        $order = order::find($id);
        $customer = coustmer::find($order->customer_id);
        $shipping = shipping::find($order->shipping_id);
        $payment = payment::where('order_id', $order->id)->first();
        $orderDetails = orderDetails::where('order_id', $order->id)->get();

        return view('admin.order.view_order',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails,
            ]);
    }
    public function viewOrderInvoice($id){
        $order = order::find($id);
        $customer = coustmer::find($order->customer_id);
        $shipping = shipping::find($order->shipping_id);
        $payment = payment::where('order_id', $order->id)->first();
        $orderDetails = orderDetails::where('order_id', $order->id)->get();

        return view('admin.order.view_invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails,
        ]);
    }

}
