<?php

namespace App\Imports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use DateTime;

class CalenderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] > 0){
            $monhoc = explode("Từ", $row[7]);
            for($i = 1; $i < count($monhoc); $i++) {
                $chitiet = explode(":", $monhoc[$i]);
                    $thoigian = explode(" đến ", $chitiet[0]);
                    $newformatstart = DateTime::createFromFormat('d/m/Y', trim($thoigian[0]))->format('Y-m-d');
                    $startdate = Carbon::create($newformatstart);
                    $newformat = DateTime::createFromFormat('d/m/Y', trim($thoigian[1]))->format('Y-m-d');
                    $enddate = Carbon::create($newformat);
                    $ngayhoc = explode("Thứ", $chitiet[1]);
                    for ($j=1; $j < count($ngayhoc); $j++) {
                        $buoihoc = explode(" tiết ", trim($ngayhoc[$j]));
                        $tiet = explode(" tại ", trim($buoihoc[1]));
                        $startdate = Carbon::create($newformatstart);
                        for ($x = $startdate; $x < $enddate; $x->addDay()) { 
                            if($x->dayOfWeek == trim($buoihoc[0]) - 1){
                                $data["user_id"] = 1;
                                $data["date"] = $x;
                                $data["class"] = $row[5];
                                $data["lesson"] = $tiet[0];
                                $data["location"] = $tiet[1];
                                $user = Schedule::create($data);
                            };
                        }
                    }
                }
            }

        return null;
    }
}
