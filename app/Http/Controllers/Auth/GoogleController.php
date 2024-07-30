<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Exception;

class GoogleController extends Controller
{
    protected function redirectTo()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        if ($user && $user->hasRole('customer')) { // Verificar si el usuario tiene el rol 'customer'
            return "/carrito/procesopedido";
        }
        return RouteServiceProvider::HOME;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = Customer::where('google_id', $user->id)->orWhere('email', $user->email)->first();

            if ($findUser) {
                Auth::guard('customer')->login($findUser);
                return redirect($this->redirectTo());
            } else {
                $customer = Customer::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('my-secret'), // Cambia a un valor seguro
                    'photo' => $user->avatar,
                    'status' => 'ACTIVO',
                    'role' => 'customer',
                    'type' => 'standar',
                    'last_name' => '', 
                    'phone' => '', 
                    'address' => '', 
                ]);

                event(new Registered($customer));
                Auth::guard('customer')->login($customer);

                Auth::login($customer);

        return redirect(RouteServiceProvider::HOME);
            }
        } catch (Exception $e) {
            \Log::error('Error in Google callback: ' . $e->getMessage());
            return redirect('login')->withErrors('Something went wrong during Google login. Please try again.');
        }
    }
}