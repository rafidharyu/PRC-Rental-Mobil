<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OperatorRequest;
use App\Http\Services\OperatorService;

class OperatorActivationController extends Controller
{
    protected $operatorService;

    public function __construct(OperatorService $operatorService)
    {
        $this->operatorService = $operatorService;
    }

    public function index()
    {
        // Periksa apakah user adalah owner
        if (Auth::user()->role !== 'owner') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        // Mengambil data operator yang aktif dan tidak aktif
        $operators = $this->operatorService->getAllOperators();

        // Mengirim data operator ke view
        return view('backend.operators.index', compact('operators'));
    }

    public function show($id)
    {
        // Ambil data operator berdasarkan ID
        $operator = $this->operatorService->getOperatorById($id);

        // Kembalikan view dengan data operator
        return view('backend.operators.show', compact('operator'));
    }

    public function edit($id)
    {
        $operator = $this->operatorService->getOperatorById($id);
        return view('backend.operators.edit', compact('operator'));
    }

    public function update(OperatorRequest $request, $id)
    {
        // Update status operator menggunakan OperatorService
        $this->operatorService->updateOperatorStatus($id, $request->is_active);

        return redirect()->route('backend.operators.index')->with('success', 'Status updated successfully');
    }

    public function destroy($id)
    {
        // Hapus operator menggunakan OperatorService
        $this->operatorService->deleteOperator($id);

        return redirect()->route('backend.operators.index')->with('success', 'User deleted successfully');
    }

    public function showInactiveAccountPage()
    {
        $ownerEmail = User::where('role', 'owner')->value('email');

        return view('backend.operators.inactive', compact('ownerEmail'));
    }

}
