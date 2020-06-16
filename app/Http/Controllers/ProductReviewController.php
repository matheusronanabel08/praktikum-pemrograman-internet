<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\products;

use App\product_reviews;

use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products') -> get();
        $products_review = DB::table('products_review')
        ->join('products','products_review.product_id','=','products.id')
        ->select('products_review.*','products.*')
        ->where('user_id','=',Auth::user()->id)
        ->count();

        return view('productsDetail', ['products' => $products, 'carts2' => $carts2, 'total' => $total, 'total1' => $total1, 'couriers' => $couriers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'rate' => 'required',
            'content' => 'required',
            'product_id',
            'user_id'
        ]);
        // Insert data ke table Product
        $products_review = new product_reviews;

        $products_review->rate = $request->rate;
        $products_review->content = $request->content;
        $products_review->user_id = $request->user_id;
        $products_review->product_id = $request->product_id;

        $products_review->save();
        // alihkan halaman tambah buku ke Product
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
