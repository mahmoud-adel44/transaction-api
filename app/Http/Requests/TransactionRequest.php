<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', $this->user()->id)
            ],
            'amount' => 'required',
            'description' => 'required',
            'transactions_date' => 'required|date',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
