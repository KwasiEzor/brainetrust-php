<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbonnementController extends Controller
{
    //

    public function index()
    {
        return view('abonnement.index');
    }
    public function amateurPurchase()
    {
        return view('abonnement.amateur');
    }
    public function confirmedPurchase()
    {
        return view('abonnement.confirmed');
    }
    public function paymentSuccess()
    {
        return view('abonnement.thankyou');
    }

    public function sendPayment(Request $request)
    {
        $amount = 0;
        // dd($request);
        $auth_user = auth()->user();
        if ($request->has('amateur')) {
            $amount += 4500;
            $auth_user->charge($amount, $request->payment_method);
        } else if ($request->has('confirmed')) {
            $amount += 6800;
            $auth_user->charge($amount, $request->payment_method);
        }
        return redirect()->route('abonnement.thankyou');
    }
}
