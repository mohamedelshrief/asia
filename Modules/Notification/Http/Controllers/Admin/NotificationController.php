<?php

namespace Modules\Notification\Http\Controllers\Admin;

use Modules\Admin\Traits\HasCrudActions;
use Illuminate\Http\Request;
use Modules\Notification\Entities\Notification;
use Modules\Page\Entities\Page;
use Modules\User\Entities\User;
use Ladumor\OneSignal\OneSignal;

class NotificationController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Notification::class;


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $notifications = new Notification();

        $user_id = auth()->user()->id;
        if ($request->has('query')) {
            return $notifications
                ->where('notifiable_id', $user_id)
                ->search($request->get('query'))
                ->query()
                ->limit($request->get('limit', 10))
                ->get();
        }

        if ($request->has('table')) {
            return $notifications->table($request);
        }

        return view('notification::admin.notification.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('notification::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
        return view('notification::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        Notification::whereId($id)->update(['read_at' => now() ]);

        return redirect()->route('admin.notification.index')->with(['success' => "The notification is read successfully"]);

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
