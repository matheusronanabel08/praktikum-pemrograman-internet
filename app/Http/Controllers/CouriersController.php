<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\couriers;

class CouriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil data dari Tabel Couriers
        $couriers = DB::table('couriers') -> get();

        //Mengirim data dari tabel Couriers ke VIEW Couriers
        return view('adminCouriers', ['couriers' => $couriers]);
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
            'courierName' => 'required'
        ]);

        // Insert data ke table Couriers
        $couriers = new couriers;

        $couriers->courier = $request->courierName;

        $couriers->save();
        // alihkan halaman tambah buku ke Product
        return redirect() -> back() -> with('status', 'Couriers added successfully!');
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
        $couriers = couriers::find($id);

        return view('adminCouriersUpdate', ['couriers' => $couriers]);
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
        $this -> validate($request, [
            'courierName' => 'required'
        ]);
        // Insert data ke table Courier
        $couriers =  couriers::find($id);

        $couriers->courier = $request->courierName;

        $couriers->save();
        // alihkan halaman tambah buku ke Courier
        return redirect('/adminCouriers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $couriers = couriers::find($id);
        $couriers->delete();

        return redirect() -> back() -> with('status', 'Categories deleted successfully!');
    }
}
