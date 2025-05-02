<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DateFmt extends Model
{
    public function format_date_angola($date)
    {
        return Carbon::parse($date)->format("d-m-Y");
    }
}
