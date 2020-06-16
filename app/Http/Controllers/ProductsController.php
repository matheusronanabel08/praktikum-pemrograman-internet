<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\products;

use App\product_categories;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil data dari Tabel Products
        $products = DB::table('products') -> get();

        //Mengambil data dari Tabel Category
        $productsCategory = DB::table('product_categories') -> get();

        //Mengirim data dari tabel Products ke VIEW Products
        return view('adminProducts', ['products' => $products, 'productsCategory' => $productsCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Form
        $this -> validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productDescription' => 'required',
            'productRate' => 'required',
            'productStock' => 'required',
            'productWeight' => 'required'
        ]);
        // Insert data ke table Product
        $products = new products;

        $products->product_name = $request->productName;
        $products->price = $request->productPrice;
        $products->description = $request->productDescription;
        $products->product_rate = $request->productRate;
        $products->stock = $request->productStock;
        $products->weight = $request->productWeight;

        $products->save();
        // alihkan halaman tambah buku ke Product
        return redirect('/adminProducts');
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
        $products = products::find($id);

        return view('adminProductsUpdate', ['products' => $products]);
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
        // Validasi Form
        $this -> validate($request, [
            'productName' => 'required',
            'productPrice',
            'productDescription',
            'productRate',
            'productStock',
            'productWeight'
        ]);
        // Insert data ke table Product Category
        $products =  products::find($id);

        $products->product_name = $request->productName;
        $products->price = $request->productPrice;
        $products->description = $request->productDescription;
        $products->product_rate = $request->productRate;
        $products->stock = $request->productStock;
        $products->weight = $request->productWeight;


        $products->save();
        // alihkan halaman tambah buku ke Product Category
        return redirect('/adminProducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data yang ada pada Tabel
        $products = products::find($id);
        $products->delete();

        return redirect('/adminProducts');
    }
}
