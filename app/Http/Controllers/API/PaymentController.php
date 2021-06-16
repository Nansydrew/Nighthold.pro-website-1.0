<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\HistoryPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maksa988\FreeKassa\Facades\FreeKassa;

class PaymentController extends Controller
{
    public function paymentInfo()
    {
        $data = HistoryPayment::where('user_id', Auth::user()->id)
            ->where('service', 'balance')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return response()->json(['error' => false, 'data' => $data]);
    }

    public function homePage()
    {
        $data = HistoryPayment::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return response()->json(['error' => false, 'data' => $data]);
    }

    public function paymentAdd(Request $request)
    {
        if ($request->get('option') === 'RoboKassa') {
            $payment = new \Idma\Robokassa\Payment(
                setting('robokassa.payment_user'),
                setting('robokassa.payment_pass_1'),
                setting('robokassa.payment_pass_2'),
                setting('robokassa.payment_test_mode')
            );

            $order = HistoryPayment::create([
                'user_id' => Auth::user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (RoboKassa)',
                'price' => $request->get('sum'),
                'status' => '0',
            ]);

            $payment->setInvoiceId($order->id)
                ->setSum($request->get('sum')*10)
                ->setDescription('Пополнение баланса');

            return response()->json(['error' => false, 'url' => $payment->getPaymentUrl()]);
        }
        elseif ($request->get('option') === 'FreeKassa') {
            $order_id = time();

            HistoryPayment::create([
                'user_id' => Auth::user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (FreeKassa)',
                'price' => $request->get('sum'),
                'status' => '0',
                'order_id' => $order_id,
            ]);

            $url = FreeKassa::getPayUrl($request->get('sum')*10, $order_id);
            return response()->json(['error' => false, 'url' => $url]);
        }
        return response()->json(['error' => 'Errors']);
    }

    public function store(Request $request)
    {
        $payment = new \Idma\Robokassa\Payment(
            setting('robokassa.payment_user'),
            setting('robokassa.payment_pass_1'),
            setting('robokassa.payment_pass_2'),
            setting('robokassa.payment_test_mode')
        );
        if ($payment->validateSuccess($_GET)) {
            $order = HistoryPayment::find($payment->getInvoiceId());

            if ($payment->getSum() == $order->price) {
                $newBalance = Account::balance()->balans + $payment->getSum();
                Account::setBalance($newBalance);
                HistoryPayment::where('id', $payment->getInvoiceId())->update(['status' => 1]);
                return redirect('/dashboard/payment/index');
            }

        }
        return redirect('/dashboard/payment/index');
    }
}
