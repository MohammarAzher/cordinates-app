<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        $data = user::where('email', '!=', Auth::user()->email)->paginate(10);
        return view('dashboard.users.index',['data'=>$data]);
    }

    public function create(){
        return view('dashboard.users.create');
    }

    public function edit($id){
        $user = user::find($id);
        return view('dashboard.users.create',['data'=>$user]);
    }

    public function store(request $request){

        $validator_data = [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->edit_id,
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];

        $custom_messages = [
            'c_password.same' => 'The confirmation password does not match.',
        ];

        $validator = Validator::make($request->all(), $validator_data, $custom_messages);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        if($request->has('edit_id') && $request->edit_id != ''){
            $user = user::find($request->edit_id);
            $msg = [
                'success' => 'User Update Successfully',
                'redirect' => route('users')
            ];
        }
        else{
            $user = new user();
            $msg = [
                'success' => 'User Created Successfully',
                'redirect' => route('users')
            ];
        }

        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = hash::make($request->password);

        if ($request->hasFile('image')) {
            $image = uploadSingleFile($request->file('image'), 'uploads/users/profile/','png,jpeg,jpg');
            if (is_array($image)) {
                return response()->json($image);
            }
            if (file_exists($user->image)) {
                @unlink($user->image);
            }
            $user->image = $image;
        }

        $user->save();
        return response()->json($msg);
    }




    public function destroy($id){
        user::find($id)->delete();
        $msg = [
            'success' => 'User Deleted Successfully',
            'redirect' => route('users')
        ];
        return response()->json($msg);
    }
}
