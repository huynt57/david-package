<?php
namespace DavidBase\Http\Requests;

use App\User;

class StoreUserForm extends UserForm
{
    /**
     * @return mixed
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo('create-users');
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ];
    }

    /**
     * @return mixed
     */
    public function persist()
    {
        $user = User::create($this->only('name', 'username', 'email', 'password'));
        $user->syncRoles($this->getRoles());
        $user->syncPermissions($this->getDirectPermissions());
    }
}
