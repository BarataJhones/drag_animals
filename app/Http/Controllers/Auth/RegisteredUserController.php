<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'institution' => $request->institution,
            'grade' => $request->grade,
        ]));

        event(new Registered($user));

        return redirect('/');
    }

    public function editUser()
    {
        $user = auth()->user();
        return view('auth.editar-usuario', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        if (!$user = auth()->user()) {
            return redirect()->back();
        }

        $data = $request->all();

        $this->validate($request, [
            'avatar'=> 'nullable|image',
        ]);

        if ($request->exists('avatar')) {
            if ($user->avatar !="user.png"){
                if (Storage::exists($user->avatar))
                    Storage::delete($user->avatar);
            }

            $avatar = $request->avatar->store('user.avatar');
            $data['avatar'] = $avatar;
        }

        $user->update($data);

        return redirect()
            ->route('return.index')
            ->with('message', 'Dados editados com sucesso');
    }
}
