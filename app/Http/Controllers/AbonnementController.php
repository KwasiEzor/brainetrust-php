<?php

namespace App\Http\Controllers;

use App\Notifications\SuccessfullPaymentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;

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
        $auth_user->notify(new SuccessfullPaymentNotification());
        return redirect()->route('abonnement.thankyou');
    }
}
