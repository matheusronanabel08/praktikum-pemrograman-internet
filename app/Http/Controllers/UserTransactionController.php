<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\transactions;

use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function index()
    {
        $userTransaction = DB::table('transactions')
        ->join('users','transactions.user_id','=','users.id')
        ->select('transactions.*','users.*','transactions.id AS idTransactions')
        ->where('user_id','=',Auth::user()->id)
        ->get();

        //Mengirim data dari tabel Couriers ke VIEW Couriers
        return view('userTransactions', ['userTransaction' => $userTransaction]);
    }

    public function destroy($id)
    {
        $userTransaction = transactions::find($id);
        $userTransaction->delete();

        return redirect()->back();
    }
}
