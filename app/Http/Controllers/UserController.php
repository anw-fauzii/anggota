<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){
            $user = User::all();
            return view('user.index', compact('user'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'status' => "Aktif",
            ]);
            if($request->get('role') == "admin"){
                $user->assignRole('admin');
            }
            else if($request->get('role') == "penagih"){
                $user->assignRole('penagih');
            }
            else if($request->get('role') == "nasabah"){
                $user->assignRole('nasabah');
                $id = User::max('id');
                Nasabah::create([
                    'id' =>"$id",
                    'user_id'=>"$id"
                ]);
            }
            Toastr::success('Data Berhasil Disimpan', 'SUKSES', ['options']);
            return redirect('user');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        if (Auth::user()->hasRole('admin')){
            $user = User::findOrFail($id);
            return view('user.edit',compact('user'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        } 
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
        if (Auth::user()->hasRole('admin')){
            $this->validate($request, [
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ]
            );
            $update = User::findOrFail($id);
            if (! isset($input['old_password']) || ! Hash::check($input['old_password'], $update->password)) {
                $validator->errors()->add('old_password', __('The provided password does not match your current password.'));
            }
            else{
                
            }
            $update->update(['password' => Hash::make($request->get('password'))]);
            Toastr::success('Data Berhasil Diedit', 'SUKSES', ['options']);
            return view('dashboard');
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $user = User::findOrFail($id);
            $user->delete();
            Toastr::success('Data Berhasil Dihapus', 'SUKSES', ['options']);
            return redirect()->back();
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        } 
    }
}
