<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use Services\UserService;

class DataController extends Controller
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

        return view('user.data', compact('user'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  App\Http\Requests\DataRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function post(DataRequest $request)
    {
        $this->user->data($request);

        return back()->with([
            'status' => 'success',
            'message' => 'Successfully updated data!'
        ]);
    }
}
