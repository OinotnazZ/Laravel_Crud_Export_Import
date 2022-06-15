<?php


namespace App\Imports;

use App\Player;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Player([
            'name'        =>$row[0],
            'address'     =>$row[1],
            'description' =>$row[2],
            'retired'     =>$row[3],
        ]);
    }
}
