<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\carts;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        //Mengambil data dari Tabel Cart
        $carts = DB::table('carts')-> where('id','=',Auth::users()->id) -> get();
    }

    public function destroy($id)
    {
        $carts = carts::find($id);
        $carts->delete();

        return redirect('/productsCheckout');
    }

}
