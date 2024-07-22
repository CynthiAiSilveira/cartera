<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Importa la clase Mail
use App\Mail\WelcomeEmail; // Importa la clase WelcomeEmail (debes crearla)

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_roles' => ['required', 'exists:roles,id_roles'], // Cambia el nombre de la columna
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'id_roles' => $data['id_roles'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_roles' => ['required', 'exists:roles,id_roles'], // Cambia el nombre de la columna
        ]);

        $user = $this->create($data);

        // Envía el correo electrónico de bienvenida
        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success', 'Usuario registrado correctamente.');
    }

    public function showRegistrationForm()
    {
        $roles = Rol::all();

        return view('auth.register', compact('roles')); // Pasa la variable $roles a la vista
    }
}