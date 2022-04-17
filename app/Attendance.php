<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
    'emp_id',
    'emp_name',
    'month',
    'date',
    'day',
    'department',
    'in_time',
    'out_time',
    'work_duration'];
}