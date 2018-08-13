<?php
namespace DavidBase\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class StoreRoleForm extends FormRequest
{
    /**
     * @return mixed
     */
    public function authorize()
    {
        //return $this->user()->can('manage-roles');
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_num|unique:roles,name',
            'permissions' => 'array'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên vai trò không được để trống.',
            'name.unique'   => 'Tên vai trò đã tồn tại trong hệ thống.',
            'name.alpha_num'=> 'Tên vai trò không được chứa các ký tự đặc biệt.'
        ];
    }

    /**
     * @return void
     */
    public function persist()
    {
        $role = Role::create($this->only('name'));
        $role->givePermissionTo($this->has('permissions') ? $this->get('permissions') : []);
    }

}