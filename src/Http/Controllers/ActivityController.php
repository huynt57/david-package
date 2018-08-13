<?php
namespace DavidBase\Http\Controllers;


use Illuminate\Routing\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * ActivityController constructor.
     */
    public function __construct()
    {
        $this->middleware('can:manage-system');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $activities = Activity::latest()->paginate();

        return view('activities', compact('activities'));
    }

    /**
     * @param Activity $activity
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        flash('Xóa nhật ký hoạt động thành công.')->success();

        return redirect()->back();
    }

}