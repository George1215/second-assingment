<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class UserController extends Controller
{
    //return login view
    public function getLogin()
    {
        $categories = Category::all();
        return view("login", ['categories'=>$categories]);
    }

    //post function login
    public function postLogin(Request $request)
    {
        //validate all inputs
        $this->validate($request, [
            'username' => 'required|max:120',
            'password' => 'required',
        ]);

        //attempt to login user
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect('/');
        };
        return redirect()->back()->with(['error' => "You have entered an invalid username or password!"]);
    }

    public function getRegister()
    {
        $categories = Category::all();
        return view("register", ['categories'=>$categories]);
    }

    //post function add new user
    public function postRegister(Request $request)
    {
        //validate all inputs
        $this->validate($request, [
            'username' => 'required|unique:users|max:120',
            'email' => 'required|email|unique:users|max:120',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'phone' => 'required|max:120',
            'password' => 'required|min:6|confirmed',
        ]);


        //create user model
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);

        //add user to database
        if($user->save()){
            return redirect('/login')->with(['success' => "Your account has been successfully created!"]);
        }

        return redirect()->back()->with(['error' => "There was a problem while creating your account!"]);
    }

    //get user
    public function getUpdateUser($user_id)
    {
        //if not dashboard
        if (Auth::user()->role != "dashboard" && Auth::user()->id != $user_id) {
            return redirect()->route('index');
        }

        //find user that will update
        $user = User::where('id', $user_id)->first();

        //return user view with user model
        return view('update_user', ['user' => $user]);
    }

    //post update user
    public function postUpdateUser(Request $request)
    {
        //if not dashboard
        if (Auth::user()->role != "dashboard" && Auth::user()->id != $request["user_id"]) {
            return redirect()->route('index');
        }
        //validate all inputs
        $this->validate($request, [
            //validate email
            'email' => 'required|email|max:120|unique:users,email,' . $request['user_id'],
        ]);

        //find user that will update
        $user = User::find($request["user_id"]);

        //set new values and update
        $user->email = $request["email"];
        $user->role = $request["role"];
        $user->update();

        //successfully updated
        return redirect()->route('users')->with(['success' => "User updated successfully!"]);
    }

    //post function delete user
    public function postDeleteUser(Request $request)
    {
        $user_id = $request["id"];
        $user = User::where('id', $user_id)->first();

        //if customer exists and the user is logged in
        if ($user) {
            $user->delete();
            return redirect('/users')->with(['success' => "User deleted successfully!"]);
        }

        return redirect('/users')->with(['error' => "There was a problem while deleting the user!"]);
    }


    //get function logout
    public function logout()
    {
        //logut the user
        Auth::logout();
        return redirect()->route("login");
    }

    //get all users
    public function getAllUsers()
    {
        //select all users and return
        return view('dashboard.users', ['users' => User::all()]);
    }


}