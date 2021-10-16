<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.role.index', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);
        
        $role = Role::firstOrCreate(['name' => $request->name]);
        
        $notification = array(
            'message' => 'Role: <strong>' . $role->name . '</strong> Ditambahkan',
            'alert' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        $notification = array(
            'message' => 'Role: <strong>' . $role->name . '</strong> Dihapus',
            'alert' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
