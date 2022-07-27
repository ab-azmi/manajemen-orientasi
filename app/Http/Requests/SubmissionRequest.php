<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class SubmissionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul' => 'required|min:3',
            'file' => 'nullable|file|mimes:jpg,png,docx,pdf,mp4,mkv|max:3000',
            'catatan' => 'nullable',
            'date_submitted' => 'nullable|date'
        ];
    }
    public function withValidator(Validator $validator){
        if($validator->fails()){
            return back()->with('error', 'Input tugas invalid, coba lagi!');
        }
    }
}
