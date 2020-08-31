<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'categoriesEld' => 'array|nullable',
            'title' => 'string|min:3|max:12',
            'price' => 'nullable|regex:/^\d*(\.\d{2})?$/',
            'eld' => 'integer|nullable',
        ];

        switch ($this->getMethod()) {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'id' => 'required|integer|exists:product,id',
                    // 'title' => [
                    //     'required',
                    //     Rule::unique('product')->ignore($this->title, 'title')
                    // ]
                ] + $rules;
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:product,id'
                ];
        }
    }

    public function all($keys = null)
    {
      // return $this->all();
      $data = parent::all($keys);
      switch ($this->getMethod())
      {
        // case 'PUT':
        // case 'PATCH':
        case 'DELETE':
          $data['id'] = $this->route('product');
      }
      return $data;
    }
}
