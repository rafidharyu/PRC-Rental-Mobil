<?php

namespace App\Http\Services;

use App\Models\User;

class OperatorService
{
    public function getAllOperators($perPage = 10)
    {
        return User::where('role', 'operator')->paginate($perPage);
    }

    public function getOperatorById($id)
    {
        return User::findOrFail($id);
    }

    public function updateOperatorStatus($id, $isActive)
    {
        $operator = $this->getOperatorById($id);
        $operator->is_active = $isActive;
        $operator->save();
        return $operator;
    }

    public function deleteOperator($id)
    {
        $operator = $this->getOperatorById($id);
        $operator->delete();
        return $operator;
    }
}
