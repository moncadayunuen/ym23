<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserWasUpdated;
use App\Listeners\SendUpdatingCredentials;
use App\Events\UserWasCreated;
use App\Listeners\SendLoginCredentials;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserNewRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    public function index()
    {
        $users = User::allowed()->get();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    protected function create()
    {
        $this->authorize('create', new User);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.create', [
            'roles' => $roles, 
            'permissions' => $permissions,
            'user' => new User
        ]);
    }

    public function store(StoreUserNewRequest $request)
    {
        $this->authorize('create', new User);

        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatar = $file->store('public/users');

            $password = str_random(8);

            $user = new User;
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->avatar = Storage::url($avatar);
            $user->save();
        } else {
            $avatar = 'img/users/user.jpg';
            $password = str_random(8);
            
            $user = new User;
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->avatar = $avatar;
            $user->save();
        }

        if ($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }

        if ($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }

        UserWasCreated::dispatch($user, $password);

        return redirect()->route('admin.users.index')->with('success', 'El usuario ha sido creado satisfactoriamente');
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $imgPath = str_replace('storage', 'public', $user->avatar);
            Storage::delete($imgPath);

            $file = $request->file('avatar');
            $avatar = $file->store('public/users');

            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->avatar = Storage::url($avatar);
            $user->save();
            if ($request->filled('password')){
                $user->password = Hash::make($request->input('password'));
                UserWasUpdated::dispatch($user, $password);
                $user->save();
            }
        } else {
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->save();
            if ($request->filled('password')){
                $user->password = Hash::make($request->input('password'));
                UserWasUpdated::dispatch($user, $request->input('password'));
                $user->save();
            }
        }

        return redirect()->route('admin.users.edit', $user)->with('success', 'Datos de usuario actualizados');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        $imgPath = str_replace('storage', 'public', $user->avatar);
        Storage::delete($imgPath);
        return redirect()->route('admin.users.index')->with('success', 'El usuario se ha eliminado correctamente');
    }
}
