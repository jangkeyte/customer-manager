<?php

namespace Modules\Authetication\src\Http\Requests;

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
            'name' => 'required',
            'email' => 'required',           
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
            'name' => 'Tên người dùng không được để trống',
            'email' => 'Địa chỉ email không được để trống',
            'image' => 'Hình ảnh phải có dạng: .jpg, .png, .jpeg',
         ];
    }
    
   public function filters()
   {
       return [
           'email' => 'trim|lowercase',
           'name' => 'trim|capitalize|escape'
       ];
   }
   
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

}