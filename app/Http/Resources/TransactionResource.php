<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Transaction */
class TransactionResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'amount' => number_format($this->amount / 100 , 2),
            'transaction_date' => $this->transactions_date->format('m/d/y'),
            'description' => $this->description,
            'created_at' => $this->created_at
        ];
    }
}
