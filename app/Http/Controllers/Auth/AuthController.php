<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginProcess(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            // 'nim' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            // cek apakah user berstatus active atau tidak
            if(Auth::user()->status != 'active') {
                // kalo akun belum active otomatis dipaksa llgout
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your Account Is Inactived');
                return redirect('/login');
            }

            // kalo akun active buat kan sessionnya kembali
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect('/dashboard');
            } else if(Auth::user()->role_id == 2) {
                return redirect('/profile');
            }

    
        }
        
        // jika username atau password salah
        Session::flash('status', 'failed login');
        Session::flash('message', 'Username / Password Wrong');
        return redirect ('/login');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        Auth::logout();


        return redirect('login');
    }

    public function register() {
        return view('register');
    }

    public function registerProcess(Request $request) {
        // validasi ketika confirm password tidak sama dengan password
        if($request->password !== $request->confirm_password) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Konfirmasi Password Tidak Sama Dengan Password');
            return redirect('register');
        }


        $username = $request->username;
        $nim = $request->nim;
        $alamat = $request->alamat;
        $phone = $request->phone;
        $password = bcrypt($request->password);
        $role_id = 2;
        

        User::create([
            'username' => $username,
            'nim' => $nim,
            'alamat' => $alamat,
            'phone' => $phone,
            'password' => $password,
            'role_id' => $role_id
        ]);

        Session::flash('statusReg', 'success');
        Session::flash('messageReg', 'Register Successful! Wait Admin Approve Your Account.');
        return redirect('login');

    }
}
