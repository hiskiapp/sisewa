<?php

namespace App\Http\Controllers;

use Services\UserService;

class FileController extends Controller
{
    protected $user;

    /**
    * Construct
    * @param UserService  $user  User service layer
    */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user = $this->user->me();

        return view('user.file', compact('user'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @return \Illuminate\Http\Response
    */
    public function download()
    {
        $this->user->downloaded();

        return response()->download($this->user->me()->data->file);
    }
}
