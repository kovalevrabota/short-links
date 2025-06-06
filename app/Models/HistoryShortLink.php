<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryShortLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['ip', 'short_link_id'];
}
