<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\products;

use App\carts;

use Illuminate\Support\Facades\Auth;

class HomeMainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = DB::table('products') -> get();


        if(Auth::guest()){
            return view('layouts/index', ['products' => $products, 'carts' => 'Empty Cart', 'total' => '0']);
        }
        else{
            $carts = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.*','products.*')
            ->where('user_id','=',Auth::user()->id)
            ->count();
                if($carts == 0){
                    return view('home', ['products' => $products, 'carts' => '0', 'total' => '0']);
                }
                else{
                    $carts2 = DB::table('carts')
                    ->join('products','carts.product_id','=','products.id')
                    ->select('carts.*','products.*')
                    ->where('user_id','=',Auth::user()->id)
                    ->get();
                    $total = 0;
                    $count = $carts2 -> count();
                    for ($i=0;$i<count($carts2);$i++){
                        $total = $total + ($carts2[$i] -> qty * $carts2[$i] -> price);
                    }

                    $total1 = 0;
                    $count1 = DB::table('carts') -> count();
                    for ($i=0;$i<count($carts2);$i++){
                        $total1 = 30000 + $total1 + ($carts2[$i] -> qty * $carts2[$i] -> price);
                    }

                    return view('home', ['products' => $products, 'carts' => $carts2, 'total' => $total]);
                }
        }


    }

    public function insertCart(Request $request)
    {
        $carts = new carts;

        $carts->user_id = $request->userId;
        $carts->product_id = $request->productId;
        $carts->qty = $request->quantity;
        $carts->status = 'notyet';

        $carts->save();
        return redirect('/home');
    }

    public function productsDetail($id)
    {
        $products = products::find($id);
        $product_reviews = DB::table('product_reviews')
        ->join('products','product_reviews.product_id','=','products.id')
        ->join('users','product_reviews.user_id','=','users.id')
        ->select('product_reviews.*','products.*','users.*')
        ->where('product_id','=',$products->id)
        ->get();

        return view('productsDetail', ['products' => $products, 'product_review' => $product_reviews]);
    }

    public function uploadBuktiBayar(Request $request)
    {

    }

    public function cartsDelete($id)
    {
        $carts = carts::where('id',$id)->first();

        if ($carts != null) {
            $carts->delete();
            return view('home',['carts' => $carts]);
        }

        return view('home',['carts' => $carts])->with(['message'=> 'Wrong ID!!']);
    }
}
