<?php

namespace App\Http\Requests\GoalRequests;

use Illuminate\Foundation\Http\FormRequest;

class GoalStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'goal_title' => ['required', 'string', 'max:50'],
            'goal_description' => ['required', 'string'],
            'goal_category' => ['required', 'string', 'max:100'],
            'target_value' => ['nullable', 'numeric', 'min:1'],
            'current_value' => ['nullable', 'numeric', 'min:0'],
            'frequency' => ['required', 'in:semanal,mensal'],
            'recurring_value' => ['required', 'numeric', 'min:1'],
            'status' => ['in:andamento,concluída,cancelada'],
            'end_date' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'goal_title.required' => 'O título da meta é obrigatório.',
            'goal_title.max' => 'O título da meta não pode ultrapassar 50 caracteres.',
            'goal_category.required' => 'A categoria é obrigatória.',
            'goal_category.max' => 'A categoria não pode ultrapassar 100 caracteres.',
            'target_value.numeric' => 'O valor final deve ser numérico.',
            'target_value.min' => 'O valor final deve ser maior ou igual a 1.',
            'current_value.numeric' => 'O valor atual deve ser numérico.',
            'current_value.min' => 'O valor atual não pode ser negativo.',
            'frequency.required' => 'A frequência é obrigatória.',
            'frequency.in' => 'A frequência deve ser "semanal" ou "mensal".',
            'recurring_value.required' => 'O valor periódico é obrigatório.',
            'recurring_value.numeric' => 'O valor periódico deve ser numérico.',
            'recurring_value.min' => 'O valor periódico deve ser maior ou igual a 1.',
            'status.in' => 'O status deve ser "andamento", "concluída" ou "cancelada".',
            'end_date.required' => 'A data final é obrigatória.',
            'end_date.date' => 'A data final deve ser uma data válida.',
        ];
    }

}
