<?php
namespace DavidBase\Http\Controllers;


use Illuminate\Routing\Controller;

class NotificationController extends Controller
{
    /**
     * @var
     */
    protected $notification_model;

    /**
     * NotificationController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->notification_model = auth()->user()->notifications();
            return $next($request);
        });
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $notifications = $this->notification_model->latest()->paginate();

        return view('account.notifications', compact('notifications'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $notification = $this->notification_model->findOrFail($id);

        if(is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return redirect($notification->data['action']);
    }
}
