<?php

namespace Modules\Customer\src\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class BaseFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [ 
            /*
            'area' => 'required',
            'cluster' => 'required',
            'uid' => 'required',
            'type' => 'required',
            'family' => 'required',
            'age' => 'required',
            'unit' => 'required',
            'status' => 'required',
            'birthday' => 'required',
            */
        ]; 
    }

    /**
    * Custom message for validation
    *
    * @return array
    */
    public function messages()
    {
         return [
            /*
             'area.required' => 'Khu vực không được để trống!',
             'cluster.required' => 'Cụm nhà không được để trống!',
             'uid.required' => 'Mã cây không được để trống!',
             'type.required' => 'Loại cây không được để trống!',
             'family.required' => 'Họ cây không được để trống!',
             'age.required' => 'Tuổi cây không được để trống!',
             'unit.required' => 'Đơn vị cây không được để trống!',
             'status.required' => 'Tình trạng cây không được để trống!',
             'birthday.required' => 'Ngày trồng cây không được để trống!',
            */
         ];
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

}