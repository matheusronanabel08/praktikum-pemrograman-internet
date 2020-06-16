<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\product_categories;

class ProductsCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil data dari Tabel Product Category
        $productsCategory = DB::table('product_categories') -> get();

        //Mengirim data dari tabel Product Category ke VIEW Product Category
        return view('adminProductsCategory', ['productsCategory' => $productsCategory]);
    }

    // INI NANTI BUAT CRUD PRODUCT, NANTI DITARO DI METHOD INDEX
    // INI BUAT NAMPILIN DATA YANG ADA DI TABLE PRODUCT CATEGORIES TERUS NANTI DITAMPILIN DI DROPDOWN
    // $productsCategory = DB::table('product_categories') -> get();
    // $productsOnly = DB::table('product') -> get();

    // RETURN VIEW TERUS MANGGIL SI VARIABEL PRODUCTSCATEGORY BIAR BISA DIPAKE DI DROPDOWN
    // return view('adminProductsCategory', ['productsCategory' => $productsCategory, 'productsOnly' => $productsOnly]);
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
        // Validasi Form
        $this -> validate($request, [
            'productCategoryName' => 'required'
        ]);
        // Insert data ke table Product Category
        $productsCategory = new product_categories;

        $productsCategory->category_name = $request->productCategoryName;

        $productsCategory->save();
        // alihkan halaman tambah buku ke Product Category
        return redirect() -> back() -> with('status', 'Categories added successfully!');
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
        // Update data yang ada pada Database
        $productsCategory = product_categories::find($id);

        return view('adminProductsCategoryUpdate', ['productsCategory' => $productsCategory]);
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
            'productCategoryName' => 'required'
        ]);
        // Insert data ke table Product Category
        $productsCategory =  product_categories::find($id);

        $productsCategory->category_name = $request->productCategoryName;

        $productsCategory->save();
        // alihkan halaman tambah buku ke Product Category
        return redirect('/adminProductsCategory');
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
        $productsCategory = product_categories::find($id);
        $productsCategory->delete();

        return redirect() -> back() -> with('status', 'Categories deleted successfully!');
    }
}
