<?php
namespace DavidBase\Http\Controllers;


use Illuminate\Routing\Controller;
use DavidBase\Http\Requests\StoreRoleForm;
use DavidBase\Http\Requests\UpdateRoleForm;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        //$this->middleware('permission:manage-roles');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::withCount('permissions', 'users')->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * @param StoreRoleForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRoleForm $form)
    {
        $form->persist();
        flash('Thêm vai trò mới thành công.')->success();

        return redirect()->route('roles.index');
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * @param UpdateRoleForm $form
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleForm $form, Role $role)
    {
        $form->persist($role);
        flash('Cập nhật dữ liệu vai trò thành công.')->success();

        return redirect()->back();
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        flash('Xóa dữ liệu vai trò thành công.')->success();

        return redirect()->route('roles.index');
    }
}