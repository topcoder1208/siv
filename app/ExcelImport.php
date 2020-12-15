<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
           'codice'     => $row[0],
           'descrizione'    => $row[1],
        ]);
    }
}