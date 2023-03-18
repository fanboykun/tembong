<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;


class AddAdmin extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $address;

    public function render()
    {
        return view('livewire.admin.add-admin');
    }

    public function storeAdmin()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'address' => ['nullable', 'string', 'max:255'],
            'password' => ['required',  Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address ?? '',
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole(Role::where('name', 'admin')->first());

        event(new Registered($user));
        $this->reset();

        return redirect()->route('admin.index');
    }
}
