<?php

namespace Modules\Authetication\src\Http\Requests\User;

use Modules\Authetication\src\Http\Requests\BaseFormRequest;

class UpdateUserRequest extends BaseFormRequest
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
            'id' => 'required',
            'password',
            'role',
            'permission',
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
            
        ]);
   }
   
   /**
    *  Filters to be applied to the input.
    *
    * @return array
    */
   public function filters()
   {
       return array_merge(parent::messages(), [

       ]);
   }
}
