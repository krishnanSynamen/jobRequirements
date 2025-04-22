<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;  // Import the concern
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;  // Optional, for auto-sizing columns

class UsersExport implements FromCollection, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }
}

