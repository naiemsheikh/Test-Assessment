<?php

namespace App\Imports;

use App\Attendance;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new User([
        //     'name'     => $row[0],
        //     'email'    => $row[1], 
        //     'password' => \Hash::make('123456'),
        // ]);emp_id






        return new Attendance([
            'month'     => $row[0],
            'date'    => $row[1], 
            'day' => $row[2],
            'emp_id' => $row[3],
            'emp_name' => $row[4],
            'department' => $row[5],
            'in_time' => Carbon::parse($row[6])->format('Y-m-d H:i:s'),
            'out_time' => Carbon::parse($row[7])->format('Y-m-d H:i:s'),
            'work_duration' => $row[8],
        ]);
    }
}