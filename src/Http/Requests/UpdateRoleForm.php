<?php
namespace DavidBase\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class UpdateRoleForm extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo('manage-roles');
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name,'.$this->route('role')->getKey()
        ];
    }

    /**
     * @param Role $role
     */
    public function persist(Role $role)
    {
        $role->update($this->only('name'));
        $role->syncPermissions($this->has('permissions') ? $this->only('permissions') : []);
    }
}