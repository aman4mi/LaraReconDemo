<?php

namespace App\Imports;
use App\Models\AgraniBankStatement;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DateTime;
use Illuminate\Http\Request;


class AgraniBankImport implements ToModel
{
    protected $bank_id;

    public function __construct($bankId) 
    {
        $this->bank_id = $bankId;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    { 
            return new AgraniBankStatement([
                'trans_date'     => $this -> transformDate($row[0]),
                'trans_type'  =>  $row[1],
                'rf_br' => $row[2],
                'particular' => $row[3],
                'cheque_no'    => $row[4],
                'dr_amount' => $row[5],
                'cr_amount' => $row[6],
                'balance'     => $row[7],
                'dr_cr'    => $row[8],
                'bank_id' => $this->bank_id,
            ]);

    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    
}
