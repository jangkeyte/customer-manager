<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ma_khach_hang' => ['char', 'max:20'],
            'ten_khach_hang' => ['string', 'max:80'],
            'gioi_tinh' => ['tinyInteger', 'max:4'],
            'dia_chi' => ['string', 'max:80'],
            'so_dien_thoai' => ['char', 'max:12'],
            'nguon_khach' => ['tinyInteger', 'max:4'],
            'loai_khach' => ['tinyInteger', 'max:4'],
            'ngay_lien_he' => ['datetime', 'max:80'],
            'ngay_mua' => ['date', 'max:80'],
            'loai_xe' => ['char', 'max:20'],
            'mau_xe' => ['string', 'max:30'],
            'so_khung' => ['char', 'max:30'],
            'so_may' => ['char', 'max:30'],
            'nhan_vien' => ['char', 'max:6'],
            'cua_hang' => ['char', 'max:6'],
            'tinh_trang' => ['tinyInteger', 'max:4'],
            'deleted' => ['tinyInteger', 'max:4'],
            'ghi_chu' => ['string', 'max:400'],
        ];
    }
}
