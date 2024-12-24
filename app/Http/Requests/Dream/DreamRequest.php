<?php

namespace App\Http\Requests\Dream;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
 
class DreamRequest extends FormRequest
{
    /**
     * Determine if the Clientis authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
 
 
    public function rules(): array
    {     
       return[  
        /*                    
        'gender'=>'required|not_in:0,',
        'martial'=>'required|not_in:0,',
        'age'=>'required|not_in:0,',
        'question' => 'required|string',
        */
         'status'=>'required|in:0,1,2',
       ];   
    
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{  
 
 

   return[   
    /*     
     'gender.required'=>__('messages.this field is required',[],'ar'), 
    'martial.required'=>__('messages.this field is required',[],'ar'), 
    'age.required'=>__('messages.this field is required',[],'ar'), 
    'question.required'=>__('messages.this field is required',[],'ar'), 
    */
    'status.required'=>__('messages.this field is required',[],'ar'), 
    ];
    
}

}
