<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('mobile', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->to('/expenses');
        }

        return back()->withErrors([
            'mobile' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'address' => ['required', 'string'],
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9][0-9]{9}$/', 'unique:users,mobile'],
            'gmail' => ['required', 'email', 'unique:users,gmail'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'pin' => ['required', 'digits:6'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'name.required' => 'This field is mandatory.',
            'name.regex' => 'Only letters are allowed in name.',
            'address.required' => 'Please fill the form.',
            'mobile.required' => 'Mobile number is required.',
            'mobile.digits' => 'Only 10 digits allowed (no +91).',
            // 'mobile.regex' => 'Mobile number must start with 6-9.',
            'mobile.unique' => 'This mobile number is already registered.',
            'city.required' => 'City is required.',
            'district.required' => 'District is required.',
            'pin.required' => 'Pin is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        // Generate operator_type: first 4 letters of name + current date (ddmm)
        $operatorType = substr(strtolower($request->name), 0, 4) . now()->format('dm');
        
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'gmail' => $request->gmail,
            'city' => $request->city,
            'district' => $request->district,
            'pin' => $request->pin,
            'password' => Hash::make($request->password),
            'operator_type' => $operatorType,
            'is_deleted' => 0,
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if ($user) {
            return view('auth.reset-password', compact('user'));
        }

        return back()->withErrors([
            'mobile' => 'Your mobile number is not registered.',
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('status', 'Password reset successfully.');
        }

        return back()->withErrors([
            'mobile' => 'Your mobile number is not registered.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


