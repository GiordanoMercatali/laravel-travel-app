<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRequest extends FormRequest{
    
    public function authorize(){
        return true;
    }

    public function rules(){
        
        return [
            'title' => ['required'],
            'cover_image' => ['nullable'],
            'description' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ];
    }
}