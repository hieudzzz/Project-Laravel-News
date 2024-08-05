<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('client.view.auth.register');
    }

    public function register(Request $request)
    {
        // Các mã xác thực
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Gửi email xác thực (thêm logic gửi email ở đây nếu cần)
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('success', 'Đăng ký thành công! Vui lòng kiểm tra email để xác nhận.');
    }

    public function verifyEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Kiểm tra hash email (thêm vào điều kiện nếu cần)
        if (!hash_equals((string) $request->route('hash'), sha1($user->email))) {
            return redirect()->route('login')->with('error', 'Invalid verification link.');
        }

        $user->email_verified_at = now();
        $user->save();

        // Chuyển hướng đến trang đăng nhập
        return redirect()->route('login')->with('success', 'Xác nhận email thành công! Vui lòng đăng nhập.');
    }

    public function showLoginForm()
    {
        return view('client.view.auth.login');
    }

        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                // Kiểm tra vai trò của người dùng
                if ($user->type === 'admin') {
                    session(['admin_name' => $user->name]);
                }

                return redirect()->route('client.home')->with('success', 'Login successful!');
            }

            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }




    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
