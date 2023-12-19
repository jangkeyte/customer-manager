<?php

namespace Modules\TreeManager\src\Http\Requests\Tree;

use Modules\TreeManager\src\Http\Requests\BaseFormRequest;

class SearchTreeRequest extends BaseFormRequest
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
            /*'size' => 'required', */
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
            'size.required' => 'Kích thước tán cây không được để trống!',
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
