<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\HistoryPayment;
use Illuminate\Http\Request;

class FreeKassaController extends Controller
{

    public function searchOrder(Request $request)
    {
        $order = HistoryPayment::where('order_id', $request->get('MERCHANT_ORDER_ID'))->first();
        if($order) {
            $newBalance = Account::balance()->balans + $order->price;
            Account::setBalance($newBalance);
            HistoryPayment::where('order_id', $request->get('MERCHANT_ORDER_ID'))->update(['status' => 1]);
            return redirect('/dashboard/payment/index');
        }

        return false;
    }
}
