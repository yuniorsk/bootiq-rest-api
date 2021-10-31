<?php

namespace app\models;

use yii\base\Model;

class UlozenkaBranch extends Model
{
    public $id;
    public $name;
    public $lat;
    public $lng;
    public $register;
    public $destination;
    public $odkaz;
    public $transport_id;
    public $shortcut;
    public $active;
    public $public;
    public $pic;
    public $openingHours;
    public $announcements;
}