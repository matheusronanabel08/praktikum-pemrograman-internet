<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\transactions;

use App\carts;

use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    public function index()
    {
        $userCarts = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->select('carts.*','products.*')
        ->where('user_id','=',Auth::user()->id)
        ->count();
        if($userCarts == 0){
            return view('userCarts', ['products' => $userCarts, 'userCarts' => $userCarts, 'total' => '0']);
        }
        else{
            $userCarts2 = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.*','products.*','carts.id AS cartid')
            ->where('user_id','=',Auth::user()->id)
            ->get();
            $total = 0;
            $count = $userCarts2 -> count();
            for ($i=0;$i<count($userCarts2);$i++){
                $total = $total + ($userCarts2[$i] -> qty * $userCarts2[$i] -> price);
            }

            $total1 = 0;
            $count1 = DB::table('carts') -> count();
            for ($i=0;$i<count($userCarts2);$i++){
                $total1 = 30000 + $total1 + ($userCarts2[$i] -> qty * $userCarts2[$i] -> price);
            }
        }
        //Mengirim data dari tabel Couriers ke VIEW Couriers
        return view('userCarts', ['userCarts' => $userCarts2, 'total' => $total]);
    }

    public function destroy($id)
    {
        $userCarts = carts::find($id);
        $userCarts->delete();

        return redirect()->back();
    }
}
