<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Order;

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
            // Especifica la moneda aquí, puede ser directamente 'MXN' o usando la variable de entorno PAYPAL_CURRENCY
            $currency = 'MXN'; // O usa env('PAYPAL_CURRENCY', 'MXN') si prefieres
            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => $currency,
                'returnUrl' => route('payment.success', ['order_id' => $request->order_id]),
                'cancelUrl' => route('payment.error', ['order_id' => $request->order_id])
            ])->send();

            if ($response->isRedirect()) {
                $redirectUrl = $response->getRedirectUrl();
                session(['transactionReference' => $response->getTransactionReference()]);
                return redirect()->away($redirectUrl);
            } else {
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
                $payment->currency = 'MXN';
                $payment->save();
    
                $order = Order::find($request->order_id);
                $order->payment_id = $payment->id;
                $order->status = 'PAGADO';
    
                // Obtener y guardar la dirección de envío
                $shipping_address = $arr['payer']['payer_info']['shipping_address'];
                $order->shipping_recipient_name = $shipping_address['recipient_name'];
                $order->shipping_line1 = $shipping_address['line1'];
                $order->shipping_line2 = $shipping_address['line2'] ?? '';
                $order->shipping_city = $shipping_address['city'];
                $order->shipping_state = $shipping_address['state'];
                $order->shipping_postal_code = $shipping_address['postal_code'];
                $order->shipping_country_code = $shipping_address['country_code'];
                $order->save();
    
                return view('cliente.payment_success', [
                    'transactionId' => $arr['id'],
                    'payment' => $payment,
                    'order' => $order,
                    'shipping_address' => $shipping_address
                ]);
            } else {
                return $response->getMessage();
            }
        } else {
            return view('cliente.ordenescliente');
        }
    }
    

    public function error(Request $request)
    {
        // Suponiendo que tienes un modelo `Order` y quieres obtener las órdenes del cliente autenticado
        $orders = Order::where('customer_id', $request->user()->id)->get();
    
        return view('cliente.ordenescliente', ['orders' => $orders]);
    }
}
