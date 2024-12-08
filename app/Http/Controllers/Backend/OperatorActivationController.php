<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
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

        // Debugging: Log operators untuk memastikan data operator sudah diambil
        \Log::info('Operators:', $operators->toArray());

        // Mengirim data operator ke view
        return view('backend.operators.index', compact('operators'));
    }

    public function create()
    {
        return view('backend.operators.create');
    }

    public function store(OperatorRequest $request)
    {
        // Tambahkan status inactive saat menyimpan data operator
        $data = $request->all();
        $data['is_active'] = 0;  // Set status inactive secara default

        // Simpan data operator ke database menggunakan OperatorService
        $this->operatorService->store($data);

        // Kembalikan redirect dengan pesan sukses
        return redirect()->route('backend.operators.index')->with('success', 'Data operator berhasil disimpan');
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
        // Ambil data operator berdasarkan ID
        $operator = User::findOrFail($id);

        // Return view dengan data operator
        return view('backend.operators.edit', compact('operator'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        // Ambil operator berdasarkan ID
        $operator = User::findOrFail($id);

        // Update status operator
        $operator->is_active = $request->input('is_active');
        $operator->save();

        // Redirect ke halaman daftar operator dengan pesan sukses
        return redirect()->route('backend.operators.index')
            ->with('success', 'Operator status updated successfully.');
    }

    public function destroy($id)
    {
        $operator = User::findOrFail($id);

        if ($operator->role !== 'operator') {
            return response()->json(['message' => 'Tidak bisa menghapus user non-operator.'], 403);
        }

        $operator->delete();

        return response()->json(['message' => 'Operator berhasil dihapus.']);
    }

    public function showInactiveAccountPage()
    {
        $ownerEmail = User::where('role', 'owner')->value('email');

        return view('backend.operators.inactive', compact('ownerEmail'));
    }

}
