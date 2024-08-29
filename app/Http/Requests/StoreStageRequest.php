<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStageRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        
        return [
            'name' => ['required'],
            'image' => ['nullable'],
            'location' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'travel_id' => ['required'],
        ];
    }
}