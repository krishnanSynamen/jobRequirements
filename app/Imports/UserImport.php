<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Log;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;

class UserImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError
{
    use Importable;

    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }

    public function onError(\Throwable $e)
    {
        Log::error($e->getMessage());
    }
}
