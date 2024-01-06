<?php

namespace Modules\Customer\src\Imports;

use Modules\Customer\src\Models\CareLog;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CareLogsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            CareLog::create([
                'khach_hang'        => $row['khach_hang'],
                'nhan_vien'         => $row['nhan_vien'],   
                'noi_dung'          => $row['noi_dung'],
                'ngay_thuc_hien'    => !empty($row['ngay_thuc_hien']) ? date("Y-m-d H:i:s", strtotime($row['ngay_thuc_hien'])) : "",
            ]);
        }
    }
}
