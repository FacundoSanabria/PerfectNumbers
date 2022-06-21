<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
 
class PerfectNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'range' => 'required|array:start,end',
            'range.start' => 'required|integer|numeric|gte:1',
            'range.end' => 'required|integer|numeric|gte:range.start', 
        ];
    }

    /**
     * Mensajes personalizados de error.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'range.required' => 'The Range array is required',
            'range.array' => 'Range must be an array',
            
            'range.start.required' => 'Range[start] is required',
            'range.start.integer' => 'Range[start] must be an integer',
            'range.start.numeric' => 'Range[start] must be a number',       
            'range.start.gte' => 'Range[start] must be positive',

            'range.end.required' => 'Range[end] is required',
            'range.end.integer' => 'Range[end] must be an integer',
            'range.end.numeric' => 'Range[end] must be a number',       
            'range.end.gte' => 'Range[end] must be greater than or equal to Range[start]',

        ];
    } 

    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'error',
            'code' => '422'
        ], 422));
    }
}