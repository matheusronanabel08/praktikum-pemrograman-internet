<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\products;

use App\carts;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
            return view('layouts/index', ['products' => $products, 'carts' => '0', 'total' => '0']);
        }
        else{
            $carts = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.*','products.*')
            ->where('user_id','=',Auth::user()->id)
            ->count();
                if($carts == 0){
                    return view('home', ['products' => $products, 'carts' => $carts, 'total' => '0']);
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function userBackend()
    {
        return view('userBackend');
    }

    public function userCarts()
    {
        return view('userCarts');
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
