<?php
namespace DavidBase\Http\Controllers;


use App\User;
use Illuminate\Routing\Controller;
use DavidBase\Http\Requests\ImportUsersForm;
use DavidBase\Http\Requests\StoreUserForm;
use DavidBase\Http\Requests\UpdateUserForm;
use DavidBase\Filters\UserFilters;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('can:browse-users', ['only' => ['index', 'show']]);
        $this->middleware('can:create-users', ['only' => ['create', 'store']]);
        $this->middleware('can:update-users', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete-users', ['only' => ['destroy']]);
    }

    /**
     * @param UserFilters $filters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserFilters $filters)
    {
        $users = User::filter($filters)->paginate();

        return view('users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param StoreUserForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserForm $form)
    {
        $form->persist();
        flash('Thêm người dùng mới thành công')->success();

        return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * @param UpdateUserForm $form
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserForm $form, User $user)
    {
        $form->persist($user);
        flash('Cập nhật dữ liệu người dùng thành công.')->success();

        return redirect()->back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        $activities = Activity::whereCauserType($user->getMorphClass())
            ->whereCauserId($user->getKey())
            ->latest()
            ->paginate();

        return view('users.show', compact('user', 'activities'));
    }

    /**
     * @param ImportUsersForm $form
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function import(ImportUsersForm $form)
    {
        $form->persist();

        flash('Nhập danh sách thành viên thành công')->success();

        return redirect()->back();
    }
}