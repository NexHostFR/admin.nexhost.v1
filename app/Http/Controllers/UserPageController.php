<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserPageController extends Controller
{
    public function __construct() {
        if(Auth::user()->role != "superadmin") {
            return redirect()->to("/");
        }
    }

    public function viewUserListe() {
        return view('users.liste', [
            "usersListe" => User::all()
        ]);
    }

    public function viewUser($id) {
        return view('users.view', [
            "user" => User::find($id)
        ]);
    }

    public function viewUserCreate() {
        return view('users.create');
    }

    public function postUser(Request $request) {
        try {
            $UserManager = new User();
            $UserManager->username = $request->username;
            $UserManager->role = $request->role;
            $UserManager->password = Hash::make($request->password);
            $UserManager->save();
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }

        return redirect()->to("/users");
    }

    public function updateUser(Request $request, $id) {
        try {
            $UserManager = User::find($id);
            $UserManager->name = $request->name;
            $UserManager->email = $request->email;
            $UserManager->role = $request->role;
            if($request->password) {
                $UserManager->password = Hash::make($request->password);
            }
            $UserManager->save();
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function deleteUser($id) {
        try {
            if(Auth::user()->id == $id) {
                return response()->json([
                    "status" => "error",
                    "message" => "Vous ne pouvez pas supprimer votre propre compte"
                ]);
            }
            User::destroy($id);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }
}
