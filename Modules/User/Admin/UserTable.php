<?php

namespace Modules\User\Admin;

use Modules\Admin\Ui\AdminTable;

class UserTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['last_login'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('role', function ($user) {
                $labels="";
                foreach ( $user->getRoles() as $key => $value) {
                    $labels.="<span class='badge badge-success'>".$value->name."</span>";
                }
                return $labels;
            })
            ->editColumn('last_login', function ($user) {
                return view('admin::partials.table.date')->with('date', $user->last_login);
            })->rawColumns(['role']);
    }
}
