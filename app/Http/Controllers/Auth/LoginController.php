<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();
        $role = strtolower((string) ($user->role ?? ''));

        // ✅ Wajib ada konteks login_as dari form (admin/student)
        $loginAs = strtolower((string) $request->input('login_as', ''));

        // Kalau form belum ngirim login_as, kita coba tebak dari URL login yang dipakai
        if ($loginAs === '') {
            // contoh: /admin/login atau /student/login
            $path = $request->path(); // "admin/login" atau "student/login"
            if (str_starts_with($path, 'admin')) $loginAs = 'admin';
            if (str_starts_with($path, 'student')) $loginAs = 'student';
        }

        // ✅ Block jika role tidak cocok dengan halaman login yang dipakai
        if ($loginAs === 'admin' && $role !== 'admin') {
            $this->forceLogout($request);

            return back()->withErrors([
                'email' => 'Akun ini bukan admin.',
            ])->onlyInput('email');
        }

        if ($loginAs === 'student' && $role !== 'student') {
            $this->forceLogout($request);

            return back()->withErrors([
                'email' => 'Akun ini bukan student.',
            ])->onlyInput('email');
        }

        // ✅ Redirect berdasarkan role user
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('student.dashboard');
    }

    public function logout(Request $request)
    {
        $this->forceLogout($request);

        return redirect()->route('student.auth.login');
    }

    private function forceLogout(Request $request): void
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
