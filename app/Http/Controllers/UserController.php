<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $user = Users::all();



      return $user;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //insert
    public function store(Request $request)
    {

        $user = new Users;
        $user->name = $request->name;
        $user->email = $request->email;
        $hashed = Hash::make($request->password, [
            'rounds' => 12,
        ]);
        $user->password =$hashed;
        $user->role = $request->role;
        $user->fullname = $request->fullname;
        $user->icno = $request->icno;
        $user->phoneno = $request->phoneno;

        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);

        return $user;


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $user = Users::find($id);

         $user->name= $request->name;
         $user->email=$request->email;
         $hashed = Hash::make($request->password, [
            'rounds' => 12,
        ]);
         $user->password =$hashed;
         $user->fullname=$request->fullname;
         $user->phoneno=$request->phoneno;


         $user->save();

         return $user;
         return response()->json([
            'message' => 'Project data update successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = App\Models\Users::find(1);

        // $user->delete();
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return ["user"=> $user,'message' => "success",'role' => $user->role];
        }
        else{

            return "faillll";
        }
    }
}





