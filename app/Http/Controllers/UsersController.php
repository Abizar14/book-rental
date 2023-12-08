<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index() {
        $users = User::where('role_id', 2)->where('status', 'active')->paginate(5);
        return view('user', [
            'users' => $users
        ]);
    }

    public function actived() {
        $userInactive = User::where('status', 'inactived')->where('role_id', 2)->paginate(5);
        return view('users-actived', [
            'userInactive' => $userInactive
        ]);
    }

    public function usersAdd(Request $request) {

        $validate = Validator::make($request->all([
            'username' => 'required',
            'nim' => 'required|unique:users,nim'
        ]));

        $username = $request->username;
        $nim = $request->nim;
        $phone = $request->phone;

        User::create($request->all());

        return redirect()->route('books')->with('success', 'Users Berhasil Ditambahkan');
    }

    public function detailUser($slug) {
        $users = User::where('slug', $slug)->first();
        $rent = RentLog::with(['user', 'book'])->where('user_id', $users->id)->paginate(5);
        return view('users-detail', [
            'users' => $users,
            'rent' => $rent
        ]);
    }

    public function approveUser($slug) {
        $approved = User::where('slug', $slug)->first();
        $approved->status = 'active';
        $approved->save();

        return redirect('users/detail/'.$approved->slug)->with('success', 'Approve User Berhasil');
    }

    public function userBanned() {
        $banUser = User::onlyTrashed()->paginate(5);
        return view('users-ban', [
            'banUser' => $banUser
        ]);
    }

    public function banned($slug) {
        $banned = User::where('slug', $slug)->first();
        $banned->delete();

        return redirect()->route('users')->with('successBan', "User Berhasil Dibanned");
    }

    public function restoreUsers($slug) {
        $restore = User::withTrashed()->where('slug', $slug);
        $restore->restore();

        return redirect()->back()->with('successRes', 'Restore Data Berhasil');
    }

    public function bannedUsers($slug) {
        $delete = User::where('slug', $slug);
        $delete->forceDelete();

        return redirect()->back()->with('successDel', 'Delete Data Permanent Berhasil');
    }
}
