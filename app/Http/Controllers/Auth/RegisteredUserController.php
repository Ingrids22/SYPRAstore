<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\BienvenidaCliente;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    protected function redirectTo()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        if ($user && $user->hasRole('cliente')) { // Verificar si el usuario tiene el rol 'cliente'
            return "/carrito/procesopedido";
        }
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:100'],
            'photo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Customer::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone, 
            'address' => $request->address, 
            'photo' => $request->photo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'standar',
            'status' => 'ACTIVO',
            'role' => 'customer', 
        ]);

        event(new Registered($customer));
        Auth::guard('customer')->login($customer);

        // Enviar el correo de bienvenida
        Mail::to($customer->email)->send(new BienvenidaCliente($customer));

        return redirect(RouteServiceProvider::HOME);
    }
}

