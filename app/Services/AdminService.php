<?php

namespace Services;

use App\Models\Admin;
use Hash;

class AdminService
{
    public function model()
    {
        return New Admin;
    }

    public function all()
    {
        return $this->model()->get();
    }

    public function me()
    {
        return $this->find(auth('admin')->id());
    }

    public function find($id)
    {
        return $this->model()->find($id);
    }

    public function create($request)
    {
        return $this->model()->create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
    }

    public function update($request, $id)
    {
        $admin = $this->find($id);

        return $admin->update(['name' => $request->name, 'email' => $request->email, 'password' => $request->has('password') ? Hash::make($request->password) : $admin->password]);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}
