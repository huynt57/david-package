<?php
namespace DavidBase\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|max:255|email|unique:users,email,'.auth()->id(),
        ];
    }

    /**
     * @return void
     */
    public function persist()
    {
        $this->user()->update($this->only('name', 'email'));
        activity('profile.update')->log('Cập nhật hồ sơ cá nhân');
    }
}
