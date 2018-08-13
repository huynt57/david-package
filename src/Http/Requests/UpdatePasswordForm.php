<?php
namespace DavidBase\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordForm extends FormRequest
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
            'current_password' => 'required|current_password',
            'password'     => 'required|min:6|confirmed'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu cũ.',
            'current_password.current_password' => 'Mật khẩu hiện tại không đúng.',
            'password.required' => 'Vui lòng nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu phải có tối thiểu :min ký tự.',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp với mật khẩu mới.',
        ];
    }

    /**
     * @return void
     */
    public function persist()
    {
        $this->user()->update([
            'password' => bcrypt(request('password'))
        ]);

        activity()->log('Cập nhật mật khẩu cá nhân');
    }
}
