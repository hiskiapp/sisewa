<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use Services\AdminService;

class AdminController extends Controller
{
    protected $admin;

    /**
     * Construct
     * @param AdminService  $admin  Admin service layer
     */
    public function __construct(AdminService $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->admin->all();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $this->admin->create($request);

        return redirect()->route('admin.admins.index')->with([
            'status' => 'success',
            'message' => 'Successfully added admin!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = $this->admin->find($id);

        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = $this->admin->find($id);

        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AdminRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $this->admin->update($request, $id);

        return redirect()->route('admin.admins.index')->with([
            'status' => 'success',
            'message' => 'Successfully updated admin!'
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
        $this->admin->delete($id);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Successfully deleted admin!']);
    }
}
