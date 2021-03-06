<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show list of permissions
     *
     * @return $permissions
     */
    public function index() 
    {
        $permissions = Permission::orderBy('name', 'ASC')->paginate(20);
        return view('permission.index')
        ->with('permissions', $permissions);
    }

    /**
     * Show single permission
     *
     * @return $permission
     */
    public function show(Permission $permission) 
    {
        return view('permission.show')
        ->with('permission', $permission);
    }

    /**
     * Edit single permission
     *
     * @return $permission
     */
    public function edit(Permission $permission)
    {
    	$permissions = Permission::all();
        return view('permission.edit')
        ->with('permission', $permission);
    }



    /**
     * permission search
     *
     * @return $permissions
     */
    public function search(Request $request)
    {
        $permissions = Permission::SearchByKeyword($request->p)->paginate(20);
        return view('permission.index')
        ->with('permissions', $permissions);
    }
}
