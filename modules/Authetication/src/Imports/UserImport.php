<?php

namespace Modules\Authetication\src\Imports;

use Modules\Authetication\src\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    private $rows = 0;

    public function headingRow() : int
    {
        return 1;
    }
 
    public function model(array $row)
    {
        ++$this->rows;
       
        return new User([
            'uid'           => $row['ma_nguoi_dung'] ?? $row['uid'] ?? Str::random(36),
            'username'      => $row['ten_dang_nhap'] ?? $row['username'] ?? 0,
            'name'          => $row['ho_va_ten'] ?? $row['name'] ?? 'Chưa có tên',
            'email'         => $row['dia_chi_email'] ?? $row['email'] ?? Str::random(12) . '@gmail.com',
            'password'      => Hash::make($row['mat_khau']) ?? Hash::make($row['password']) ?? Hash::make('123456'),
            'image'         => $row['hinh_anh'] ?? $row['image'] ?? '1.png',
            'token'         => $row['token'] ?? Str::random(2048),
        ]);
    }

    public function rules(): array
    {
        return [
            'ten_dang_nhap' => function($attribute, $value, $onFailure) {
                if ( User::where('username', $value)->exists() ) {
                    $onFailure(':attribute đã tồn tại, vui lòng chọn tên đăng nhập khác');
                }
            },
            'email' => function($attribute, $value, $onFailure) {
                if ( User::where('email', $value)->exists() ) {
                    $onFailure(':attribute đã tồn tại, vui lòng chọn địa chỉ email khác');
                }
            },
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            
        ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
    
    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }
}