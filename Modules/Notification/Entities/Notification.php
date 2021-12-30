<?php

namespace Modules\Notification\Entities;

use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Admin\Ui\NotificationTable;
use Modules\User\Entities\User;
class Notification extends Model
{

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notifications';

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "type",
        "notifiable_type",
        "notifiable_id",
        "data",
        "read_at",
    ];

    protected $appends = [
        'notification_text',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];


    public function getNotificationTextAttribute(){

        $type = $this->type;

        if(strpos($type, "Order") > -1){
            $order = collect($this->data)->first();
            $name = $order['customer_first_name'].' '.$order['customer_last_name'];
            return "New Order received from $name";
        }
        else if(strpos($type, "Register") > -1){
            $name = $this->data['first_name'].' '.$this->data['last_name'];
            $userType = ($this->data['isdressmaker']) ? 'dressmaker' : 'user';
            return "New $userType registered from $name";
        }
        /*else if(strpos($type, "DispatchNotification") > -1){
            $name = $this->data['name'];
            $order_id = $this->data['order_id'];
            return "Dressmaker - $name has dispatch the Order # $order_id";
        }
        else if(strpos($type, "OrderStatusNotification") > -1){
            $name = $this->data['name'];
            $order_id = $this->data['order_id'];
            $status = @$this->data['status'];
            return "Dressmaker - $name has {$status} the Order # $order_id";
        }
        else if(strpos($type, "CancelNotification") > -1){
            $name = $this->data['name'];
            $order_id = $this->data['order_id'];
            return "Dressmaker - $name has cancelled the Order # $order_id";
        }*/

        return "New Notification";
    }


    /**
     * Get the notifiable entity that the notification belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function notifiable()
    {
        return $this->morphTo();
    }

    /**
     * Mark the notification as read.
     *
     * @return void
     */
    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }

    /**
     * Mark the notification as unread.
     *
     * @return void
     */
    public function markAsUnread()
    {
        if (! is_null($this->read_at)) {
            $this->forceFill(['read_at' => null])->save();
        }
    }

    /**
     * Determine if a notification has been read.
     *
     * @return bool
     */
    public function read()
    {
        return $this->read_at !== null;
    }

    /**
     * Determine if a notification has not been read.
     *
     * @return bool
     */
    public function unread()
    {
        return $this->read_at === null;
    }


    public function table()
    {
        return new NotificationTable($this->newQuery()->where('notifiable_id', auth()->user()->id));
    }
}
