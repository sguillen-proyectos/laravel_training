<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /*
     * Cuando se usa el sistema de autenticacion que laravel
     * trae solo es necesario crear la vista de login que en nuestro
     * caso se encuentra en: resources/views/auth/login.blade.php
     * y definir algunas propiedades en la clase.
     */

    // Cuando el usuario ingrese a la url que en nuestro caso
    // es /login y ya se ha iniciado sesion laravel redireccionara
    // a la ruta que se encuentra en $redirectPath o $redirectTo
    protected $redirectPath = '/admin/users';
    // protected $redirectTo = '/admin/users';

    // $redirectAfterLogout hace referencia a que url se redireccionará
    // despues de hacer logout bien podria ser la raiz o /login o la que se desee
    protected $redirectAfterLogout = '/';

    // Se especifica la url donde se mostrará el formulario de login
    protected $loginPath = '/login';

    // Por defecto laravel espera que el campo de la base de datos de la tabla
    // 'users' sea 'email' para el inicio de sesion. En nuestro caso si quisieramos
    // que el campo de inicio de sesion sea 'username' o lo que sea hay que especificar
    // la propiedad $username
    protected $username = 'username';

    protected $reglas = [
        'username' => 'required',
        'password' => 'required'
    ];

    protected $mensajes = [
        'required' => 'Campo :attribute requerido'
    ];

    public function login(Request $r)
    {
        // Verifica que no se haya iniciado sesión
        if (!Auth::check()) {
            return view('auth.login');
        }
        // En caso de haber iniciado sesion en nuestro
        // caso redirecciona a /admin/users
        return redirect($this->redirectPath);
    }

    public function postMiLogin(Request $r)
    {
        $this->validate($r->all(), $this->reglas, $this->mensajes);
        $datos = [
            'username' => $r->input('username'),
            'password' => $r->input('password')
        ];

        // Esto verifica los datos de inicio de sesión
        // si da verdadero es que se inicio sesion caso contrario
        // las credenciales son erroneas
        if (Auth::attempt($datos)) {
            return redirect($this->redirectPath);
        }

        return redirect($this->loginPath)
            ->withErrors()
            ->withInput();
    }

    public function getMiLogout(Request $r)
    {
        Auth::logout();
    }
}
