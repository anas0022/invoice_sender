<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function home($id) {
        $users = Auth::user();
        $user = User::find($id);
        return view('home', ['user' => $user,'users'=> $users]);
    }
   

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }
    public function register_post(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'image' => 'nullable',
        ]);
    
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password does not match');
        }
    
        // Check if the email already exists
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email already exists');
        }
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    

    public function login_post(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('home', ['id' => $user->id]);
        } else {
            return redirect()->back()->withInput()->withErrors(['Invalid login details']);
        }
    }
}
