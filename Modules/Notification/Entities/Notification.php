<?php

namespace Modules\Notification\Entities;

use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Admin\Ui\NotificationTable;
use Modules\User\Entities\User;
use Modules\Order\Entities\Order;
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
        'notification_title',
        'notification_description',
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


    public function getNotificationDescriptionAttribute(){
        $type = $this->type;

        if(strpos($type, "NewOrder") > -1){
            $order =Order::findOrFail($this->data);
            $name = $order['customer_first_name'].' '.$order['customer_last_name'];
            return "New Order Placed from $name";
        }
        return "New Notification";
    }

    public function getNotificationTitleAttribute(){
        $type = $this->type;

        if(strpos($type, "NewOrder") > -1){
            return "New Order Placed";
        }
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
            //$this->forceFill(['read_at' => $this->freshTimestamp()])->update();
            //$this->update(['read_at' => $this->freshTimestamp()]);
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
