<?php

namespace DavidBase\Http\Controllers\OAuth;


use Auth;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Socialite;

class SocialiteControllers extends Controller
{
    /**
     * @var
     */
    protected $driver;

    /**
     * SocialiteControllers constructor.
     * @param $driver
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return mixed
     */
    public function redirect()
    {
        return Socialite::driver($this->driver)->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function callback()
    {
        $socialUser = Socialite::driver($this->driver)->user();

        try {
            $user = User::whereEmail($socialUser->email)->firstOrFail();
            Auth::login($user);
        } catch (ModelNotFoundException $exception) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        return redirect()->home();
    }
}