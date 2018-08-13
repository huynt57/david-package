<?php
namespace DavidBase\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivitiesController extends Controller
{
    /**
     * ActivitiesController constructor.
     */
    public function __construct()
    {
        $this->middleware('can:manage-roles');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        Activity::whereIn('id', $request->get('activities'))->delete();

        flash('Xóa nhật ký hoạt động thành công.')->success();

        return redirect()->back();
    }
}