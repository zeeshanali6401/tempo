<?php



namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $user = new User;
        $user->name = $row['name'];
        $user->email = $row['email'];
        $user->password = Hash::make($row['password']);
        $user->save();
    }
}
