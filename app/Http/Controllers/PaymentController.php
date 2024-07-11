<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.error')
            ])->send(); // Envía la solicitud y obtiene la respuesta

            // Verificar si la respuesta es una redirección
            if ($response->isRedirect()) {
                // Redirigir explícitamente al usuario a la URL de PayPal
                $redirectUrl = $response->getRedirectUrl();
                session(['transactionReference' => $response->getTransactionReference()]);
                return redirect()->away($redirectUrl);
            } else {
                // Manejar otros casos (por ejemplo, errores)
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => session('transactionReference')
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $payment = new Payment();
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');

                $payment->save();

                return "Payment is successful. Your Transaction Id is: " . $arr['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';
    }
}
