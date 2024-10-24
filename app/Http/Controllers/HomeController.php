<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);  // Establece el idioma para la aplicación
            Session::put('lang', $locale);  // Guarda el idioma en la sesión
            Session::save();  // Asegura que la sesión se guarde
            return redirect()->back()->with('locale', $locale);  // Redirige al usuario a la página anterior
        } else {
            return redirect()->back();  // Redirige al usuario a la página anterior sin cambiar el idioma
        }
    }


    public function FormSubmit(Request $request)
    {
        return view('form-repeater');
    }
}
