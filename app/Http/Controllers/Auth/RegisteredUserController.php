<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(RegisterRequest $request)
    {
        if($request->except('referral') != null or ($request->input('referral') == null && $request->has('referral') == false)){
            request()->query->remove($request->collect());
            return redirect()->route('register');
        }
        // abort_if($request->missing('referral') && $request->has('referral') == false, 404);
        abort_unless($request->validated(), 404);
        return view('auth.register', ['referral' => $request->referral]);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'address' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address ?? '',
            'referral_code' => Str::random(12),
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(Role::where('name', 'reseller')->first());

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::RESELLERHOME);
    }
}
