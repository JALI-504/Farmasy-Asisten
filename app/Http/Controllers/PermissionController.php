<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('permission_index'),  redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $permissions = Permission::paginate(10);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'),  redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::create($request->only('name'));

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'),  redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'),  redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->only('name'));

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'),  redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $permission->delete();

        return redirect()->route('permissions.index');
    }
}