<?php

namespace Modules\TreeManager\src\Http\Requests\Tree;

use Modules\TreeManager\src\Http\Requests\BaseFormRequest;

class CreateTreeRequest extends BaseFormRequest
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
            'area' => 'required',
            'cluster' => 'required',
            'uid' => 'required||unique:trees|max:8',
            'type' => 'required',
            'family' => 'required',
            'age' => 'required',
            'unit' => 'required',
            'status' => 'required',
            'birthday' => 'required',
            'size' => 'required',
            'height' => 'required',
            'perimeter' => 'required',
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
            'area.required' => 'Khu vực không được để trống!',
            'cluster.required' => 'Cụm nhà không được để trống!',
            'uid.required' => 'Mã cây không được để trống!',
            'uid.max' => 'Mã cây không được dài hơn 8 ký tự!',
            'uid.unique' => 'Mã cây này đã tồn tại!',
            'type.required' => 'Loại cây không được để trống!',
            'family.required' => 'Họ cây không được để trống!',
            'age.required' => 'Tuổi cây không được để trống!',
            'unit.required' => 'Đơn vị cây không được để trống!',
            'status.required' => 'Tình trạng cây không được để trống!',
            'birthday.required' => 'Ngày trồng cây không được để trống!',
            'size.required' => 'Kích thước tán cây không được để trống!',
            'height.required' => 'Chiều cao cây không được để trống!',
            'perimeter.required' => 'Chu vi cây không được để trống!',
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
