<?php

namespace App\Http\Services;

use App\Models\User;

class OperatorService
{
    public function getAllOperators()
    {
        // Mengambil semua operator dari database
        return User::where('role', 'operator')->paginate(10);  // Menggunakan paginate
    }

    public function store($data)
    {
        // Simpan operator baru ke database
        $operator = new User();
        $operator->name = $data['name'];
        $operator->email = $data['email'];
        $operator->password = bcrypt($data['password']);
        $operator->role = 'operator';
        $operator->is_active = $data['is_active'] ?? false; // Default tidak aktif
        $operator->save();
    }

    public function getOperatorById($id)
    {
        // Ambil operator berdasarkan ID
        return User::findOrFail($id);
    }

    public function updateOperatorStatus($id, $is_active)
    {
        // Update status is_active operator
        $operator = User::findOrFail($id);
        $operator->is_active = $is_active;
        $operator->save();

    }

    public function deleteOperator($id)
    {
        // Hapus operator dari database
        User::findOrFail($id)->delete();
    }
}
