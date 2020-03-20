<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public static function updateMessages($data)
    {
        foreach ($data as $key => $item) {
            $msg = Message::where('key', $key)->first();
            $msg->value = $item;
            $msg->save();
        }
        return true;
    }

}