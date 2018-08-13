<?php
namespace DavidBase\Http\Requests;


use App\User;

class UpdateUserForm extends UserForm
{
    /**
     * @return mixed
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo('update-users');
    }

    /**
     * @return array
     */
    public function rules()
    {
        $id = $this->route('user')->getKey();

        return [
            'name'     => 'required',
            'email'    => 'required|unique:users,email,'.$id,
            'password' => 'nullable|min:6'
        ];
    }

    /**
     * @param User $user
     */
    public function persist(User $user)
    {
        $user->update($this->getUpdateData());
        $user->syncRoles($this->getRoles());
        $user->syncPermissions($this->getDirectPermissions());
    }

    /**
     * @return array
     */
    protected function getUpdateData()
    {
        return $this->filled('password')
            ? $this->all()
            : $this->except('password');
    }
}
