<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\products;

use App\carts;

use App\transactions;

use Illuminate\Support\Facades\Auth;

class ProductsCheckoutController extends Controller
{
    public function index()
    {
        $products = DB::table('products') -> get();
        // $carts = DB::table('carts') -> get();
        $carts = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.*','products.*')
            ->where('user_id','=',Auth::user()->id)
            ->count();
                if($carts < 1){
                    return view('home', ['products' => $products, 'carts' => 'Empty Cart', 'total' => '0']);
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
                }

            $products_review = DB::table('product_reviews')
                ->join('products','product_reviews.product_id','=','products.id')
                ->select('product_reviews.*','products.*')
                ->where('user_id','=',Auth::user()->id)
                ->count();

        $couriers = DB::table('couriers') -> get();
        //Mengirim data dari tabel Products ke VIEW Products Check
        return view('productsCheckout', ['products' => $products, 'carts2' => $carts2, 'total' => $total, 'total1' => $total1, 'couriers' => $couriers, 'products_review' => $products_review]);
    }
    public function store(Request $request)
    {
        $couriers = DB::table('couriers')
        ->join('transactions','couriers.id','=','transactions.courier_id')
        ->select('couriers.*','transactions.*')
        ->get();
        // Validasi Form
        $this -> validate($request, [
            'timeout',
            'address' => 'required',
            'regency' => 'required',
            'province' => 'required',
            'total',
            'shipping_cost',
            'sub_total',
            'user_id',
            'courier_id',
            'proof_of_payment' => 'mimes:jpeg,jpg,png|max:1000|required'
        ]);

        if($request->hasFile('proof_of_payment'))
        {
          $dir = "images/proofofpayment/";
          $extension = strtolower($request->file('proof_of_payment')->getClientOriginalExtension());
          //Generate name file
          $filename = "proof".$request->user_id.'.'.$extension;
          $request->file('proof_of_payment')->move($dir, $filename);
        }
        // Insert data ke table Transactions
        $transaction = new transactions;

        $transaction->timeout = today();
        $transaction->address = $request->address;
        $transaction->regency = $request->regency;
        $transaction->province = $request->province;
        $transaction->total = $request->total;
        $transaction->shipping_cost = $request->shipping_cost;
        $transaction->sub_total = $request->sub_total;
        $transaction->user_id = $request->user_id;
        $transaction->courier_id = $request->couriers;
        $transaction->proof_of_payment = $filename;
        $transaction->status = 'unverified';

        $transaction->save();
        return redirect('/home');
    }

    public function destroy($id)
    {
        $carts = carts::find($id);
        $carts->delete();

        return view('productsCheckout');
    }

    public function verify($id)
    {
        $transaction =  transactions::find($id);

        $transaction->status = 'verified';

        $transaction->save();

        return redirect('/adminTransactions');
    }
}
