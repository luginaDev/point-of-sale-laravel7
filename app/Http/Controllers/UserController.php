<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $user =  User::orderBy('created_at', 'DESC')->paginate(10);
        $role = Role::orderBy('name', 'ASC')->paginate(10);
        return view('user.index', compact('user', 'role'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role'  => 'required|exists:roles,name'
            
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => true
                
            ]);
            $user->assignRole($request->role);
           return redirect()->back()->with(['success' => $request->name . ' Berhasil ditambakan']);
        } catch (\Throwable $th) {
             return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            
            'password' => 'required|string|min:6',
           
        ]);
        try {
           $user = User::findOrFail($id);
           $password = !empty($request->password) ? bcrypt($request->password):$user->password;
           $user->update([
            'name' => $request->name,
            'password' => $password
           ]);
           return redirect()->back()->with(['success' => $request->name . 'berhasil diupdate']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return  redirect()->back()->with(['success' => $user->name . ' Berhasil dihapus']);
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');
        $permissions = null;
        $hasPermission = null;

        $roles = Role::all()->pluck('name');
        if(!empty($role)){
            $getRole = Role::findByName($role);

            $hasPermission = DB::table('role_has_permissions')
            ->select('permissions.name')
            ->join('permissions', 'role_has_permissions.permission_id', '=' ,'permissions.id')
            ->where('role_id', $getRole->id)->get()->pluck('name')->all();

            $permissions = Permission::all()->pluck('name');
        }
        return view('user.role_permission', compact('roles', 'hasPermission', 'permissions'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|unique:permissions'
        ]);
        
        try {
            $permission = Permission::firstOrCreate([
                'name' => $request->name
            ]);
            return redirect()->back()->with(['success' => 'Permission' . $request->name . 'Berhasil ditambahkan']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }

    }

    public function setRolePermission(Request $request, $role)
    {
        $role = Role::findByName($role);

        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission To Role Saved!']);
    }
}
