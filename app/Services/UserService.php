<?php

namespace Services;

use App\Models\User;
use Services\FileService;
use Hash;

class UserService
{
    protected $file;

    public function __construct(FileService $file)
    {
        $this->file = $file;
    }

    public function model()
    {
        return User::with('data');
    }

    public function all()
    {
        return $this->model()->get();
    }

    public function me()
    {
        return $this->find(auth()->id());
    }

    public function meOrOther($id = null)
    {
        if (!is_null($id)) {
            $user = $this->model()->findOrFail($id);
        }else{
            $user = $this->me();
        }

        return $user;
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
        $user = $this->find($id);

        return $user->update(['name' => $request->name, 'email' => $request->email, 'password' => $request->has('password') ? Hash::make($request->password) : $user->password]);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function data($request, $id = null)
    {
        $data = $this->meOrOther($id);

        if ($request->hasFile('file')) {
            $this->file($request, $data->id);
        }

        $data = optional(optional($data)->data);

        return $this->meOrOther($id)->data()->updateOrCreate([], [
            'icon' => $this->file->uploadImage($request, $data->icon, 'icon'),
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $this->file->uploadImage($request, $data->photo),
            'domain' => $request->domain,
        ]);
    }

    public function file($request, $id)
    {
        $user = $this->find($id);

        return $user->data()->updateOrCreate([], [
            'file' => $this->file->uploadFile($request, $user->data->file, 'file'),
        ]);
    }

    public function downloaded()
    {
        return $this->me()->data()->update(['is_downloaded' => 1]);
    }
}
