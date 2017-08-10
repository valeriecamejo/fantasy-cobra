<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referred_friend extends Model
{
  protected $table = 'referred_friends';
  protected $fillable = [
                         'user_id',
                         'email',
                         'status',
                         'bonus',
                         'date'
                        ];
}
