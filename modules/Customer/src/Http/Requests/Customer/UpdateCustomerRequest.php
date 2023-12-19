<?php

namespace Modules\Customer\src\Http\Requests\Customer;

use Modules\Customer\src\Http\Requests\BaseFormRequest;

class UpdateCustomerRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ten_khach_hang' => 'required|max:80',
            'gioi_tinh' => 'required',
            'dia_chi' => 'max:80',
            'so_dien_thoai' => 'required|max:12',
            'nguon_khach' => 'max:4',
            'kenh_lien_he' => 'max:4',
            'ghi_chu' => 'max:400',
            'mau_xe' => 'max:30',
            'so_khung' => 'max:30',
            'so_may' => 'max:30',
            'nhan_vien' => 'max:30',
            'cua_hang' => 'max:30',
        ]);
    }

    /**
    * Custom message for validation
    *
    * @return array
    */
   public function messages()
   {
        return array_merge(parent::messages(), [
            'ten_khach_hang.required' => 'Tên khách hàng không được để trống!',
            'ten_khach_hang.max' => 'Tên khách hàng không được nhiều hơn 80 ký tự!',
            'gioi_tinh.required' => 'Giới tính không được để trống!',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống!',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 80 ký tự!',
            'nguon_khach.max' => 'Nguồn khách không được vượt quá 4 ký tự!',
            'kenh_lien_he.max' => 'Kênh liên hệ không được vượt quá 4 ký tự!',
            'ghi_chu.max' => 'Ghi chú không được vượt quá 400 ký tự!',
            'mau_xe.max' => 'Màu xe không được vượt quá 30 ký tự!',
            'so_khung.max' => 'Số khung không được vượt quá 30 ký tự!',
            'so_may.max' => 'Số máy không được vượt quá 30 ký tự!',
            'nhan_vien.max' => 'Nhân viên không được vượt quá 30 ký tự!',
        ]);
   }
   
   /**
    *  Filters to be applied to the input.
    *
    * @return array
    */
   /*
   public function filters()
   {
       return [
           'email' => 'trim|lowercase',
           'name' => 'trim|capitalize|escape'
       ];
   }
   */
}
