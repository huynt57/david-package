<?php
namespace DavidBase\Http\Controllers;


use Illuminate\Routing\Controller;
use davidbase\Http\Requests\UpdatePasswordForm;
use davidbase\Http\Requests\UpdateProfileForm;
use Spatie\Activitylog\Models\Activity;

class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('account.profile');
    }

    /**
     * @param UpdateProfileForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateProfileForm $form)
    {
        $form->persist();
        flash('Cập nhật hồ sơ cá nhân thành công.')->success();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('account.password');
    }

    /**
     * @param UpdatePasswordForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordForm $form)
    {
        $form->persist();
        flash('Cập nhật mật khẩu cá nhân thành công.')->success();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activity()
    {
        $activities = Activity::whereCauserType(auth()->user()->getMorphClass())
            ->whereCauserId(auth()->id())
            ->latest()
            ->paginate();

        return view('account.activities', compact('activities'));
    }
}
