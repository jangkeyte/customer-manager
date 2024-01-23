<?php

namespace Modules\Customer\src\Imports;

use Modules\Customer\src\Models\Customer;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomersImport implements ToModel, WithHeadingRow, WithChunkReading, WithStartRow, WithValidation, ShouldQueue
{
    private $rows = 0;
    
    public function headingRow() : int
    {
        return 1;
    }
 
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->rows;

        return new Customer([
            'ma_khach_hang' => !empty($row['ma_khach_hang']) ? $row['ma_khach_hang'] : uniqid(),
            'ten_khach_hang' => $row['ten_khach_hang'] ?? NULL,
            'so_dien_thoai' => !empty($row['so_dien_thoai']) ? str_replace(' ', '', $row['so_dien_thoai']) : '0000000000',
            'gioi_tinh' => isset($row['gioi_tinh']) && $row['gioi_tinh'] != '' && $row['gioi_tinh'] != 'NULL' ? $row['gioi_tinh'] : config('customer.default.gioi_tinh'),
            'thong_tin_lien_he' => $row['thong_tin_lien_he'] ?? config('customer.default.thong_tin_lien_he'),
            'dia_chi' => $row['dia_chi'] ??  config('customer.default.dia_chi'),
            'nguon_khach' => $row['nguon_khach'] ?? config('customer.default.nguon_khach'),
            'kenh_lien_he' => $row['kenh_lien_he'] ?? config('customer.default.kenh_lien_he'),
            'cach_lay_so' => $row['cach_lay_so'] ?? config('customer.default.cach_lay_so'),
            'loai_xe' => $row['loai_xe'] ?? config('customer.default.loai_xe'),
            'thoi_gian_nhan' => isset($row['ngay_nhan'])  && $row['ngay_nhan'] != '' ? $this->convertExcelDatetime((float)$row['ngay_nhan'] + (float)$row['gio_nhan'], "Y-m-d H:i:s") : date('Y-m-d H:i:s'),
            'thoi_gian_chuyen' => isset($row['ngay_chuyen']) && $row['ngay_chuyen'] != '' ? $this->convertExcelDatetime((float)$row['ngay_chuyen'] + (float)$row['gio_chuyen'], "Y-m-d H:i:s") : date('Y-m-d H:i:s'),
            'nguoi_chuyen' => $row['nguoi_chuyen'] ?? (auth()->user()->uid ?? config('customer.default.nguoi_chuyen')),
            'nhu_cau' => $row['nhu_cau'] ?? config('customer.default.nhu_cau'),
            'so_khung' => $row['so_khung'] ?? NULL,
            'so_may' => $row['so_may'] ?? NULL,
            'mau_xe' => $row['mau_xe'] ?? NULL,
            'nhan_vien' => $row['nhan_vien'] ?? auth()->user()->staff->ma_nhan_vien ?? config('customer.default.nhan_vien'),
            'cua_hang' => $row['cua_hang'] ?? auth()->user()->staff->cua_hang ?? config('customer.default.cua_hang'),
            'tinh_trang' => !empty($row['tinh_trang']) ? $row['tinh_trang'] : 0,
            'loai_khach' => !empty($row['loai_khach']) ? $row['loai_khach'] : 0,
            'ngay_nhap' => !empty($row['ngay_mua']) ? $this->convertExcelDate((float)$row['ngay_mua'], "Y-m-d H:i:s") : (!empty($row['ngay_lien_he']) ? $this->convertExcelDate((float)$row['ngay_lien_he'], "Y-m-d H:i:s") : date('Y-m-d H:i:s')),
            'ghi_chu' => $row['ghi_chu'] ?? config('customer.default.ghi_chu')
        ]);
    }

    public function validateDate($attribute, $value)
    {
        if ($value instanceof DateTimeInterface) {
            return true;
        }
    
        try {
            if ((! is_string($value) && ! is_numeric($value)) || strtotime($value) === false) {
                return false;
            }
        } catch (Exception $e) {
                return false;
        }
    
        $date = date_parse($value);
    
        return checkdate($date['month'], $date['day'], $date['year']);
    }

    public function convertExcelDate(float $dateString, string $dateOutput)
    {
        return date($dateOutput, strtotime(( $dateString - 25569 ) * 86400));
    }

    public function convertExcelDatetime(float $dateString, string $dateOutput)
    {
        return date($dateOutput, strtotime(( $dateString - 25569) * 86400) - 25200);
    }

    public function rules(): array
    {
        return [
            /*
            'ma_khach_hang' => function($attribute, $value, $onFailure) {
                if ( Customer::where('ma_khach_hang', $value)->exists() ) {
                    $onFailure(':attribute đã tồn tại, vui lòng chọn mã duy nhất');
                }
            },
            'loai_khach' => Rule::in(['0','1']),
            'tinh_trang' => Rule::in(['0','1','2','3','4','5','6']),
            'loai_khach' => function($attribute, $value, $onFailure) {
                if ( $value != "" && !is_numeric($value)) {
                    $onFailure(':attribute không chính xác, phải là số 0 hoặc 1');
                }
            },
            'tinh_trang' => function($attribute, $value, $onFailure) {
                if ( $value != "" && !is_numeric($value)) {
                    $onFailure(':attribute không chính xác, phải là số từ 0 đến 6');
                }
            },
            */
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'loai_khach.in' => 'Không tồn tại :attribute',
            'tinh_trang.in' => 'Không tồn tại :attribute',
        ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 2;
    }
}
