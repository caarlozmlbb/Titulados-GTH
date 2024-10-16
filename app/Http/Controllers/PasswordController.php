<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    // Mostrar el formulario de cambio de contraseña
    public function showChangePasswordForm()
    {
        return view('auth.settings');
    }

    // Manejar el cambio de contraseña
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('password.change')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = Auth::user();

        // Verificar la contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('password.change')
                             ->withErrors(['current_password' => 'La contraseña actual es incorrecta.'])
                             ->withInput();
        }

        // Actualizar la contraseña
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')
                         ->with('status', 'Contraseña actualizada exitosamente.');
    }
     // Muestra el formulario de actualización de información del usuario
    public function showUpdateForm()
    {
        return view('auth.change-user-info');
    }

    // Actualiza el nombre, correo electrónico y contraseña
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validación de datos
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'current_password' => ['required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.change')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Actualizar nombre y correo
        $user->name = $request->name;
        $user->email = $request->email;

        // Actualizar contraseña si se proporciona
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->route('user.change')
                                 ->withErrors(['current_password' => 'La contraseña actual es incorrecta.'])
                                 ->withInput();
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('user.change')
                         ->with('status', 'Información actualizada exitosamente.');
    }
    public function updatePassword(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        // Cambiar la contraseña
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('status', 'Contraseña actualizada con éxito.');
    }

    // Método para actualizar el nombre y el correo electrónico
    public function updateInfo(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        // Actualizar la información del usuario
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('status', 'Información actualizada con éxito.');
    }
}
