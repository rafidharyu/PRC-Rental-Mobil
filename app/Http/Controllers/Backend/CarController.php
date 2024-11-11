<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Http\Services\CarService;
use App\Http\Services\FileService;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private CarService $carService
    ) {}

    public function index()
    {
        return view('backend.car.index',[
            'cars' => $this->carService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $data = $request->validated();

        try {
            $data['image'] = $this->fileService->upload($data['image'], 'images');

            $this->carService->create($data);

            return redirect()->route('panel.car.index')->with('success', 'Car has been created');
        } catch (\Exception $err) {
            $this->fileService->delete($data['image']);

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return view('backend.car.show',[
            'car' => $this->carService->select()->where('uuid', $uuid) ->firstOrFail()
        ]);
    }

    public function edit(string $uuid)
    {
        return view('backend.car.edit', [
            'car' => $this->carService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $uuid)
    {
        $data = $request->validated();

        $getCar = $this->carService->selectFirstBy('uuid', $uuid);

        try {
            // jika upload
            if ($request->hasFile('image')) {
                // hapus gambar lama
                if ($getCar->image) {
                    $this->fileService->delete($getCar->image);
                }

                // upload gambar baru
                $data['image'] = $this->fileService->upload($data['image'], 'images');
            } elseif (isset($data['image'])) {
                // jika tidak upload dan ada nama gambar di form
                $data['image'] = $getCar->image;
            }

            $this->carService->update($data, $uuid);

            return redirect()->route('panel.car.index')->with('success', 'Car has been updated');
        } catch (\Exception $err) {
            if (isset($data['image'])) {
                $this->fileService->delete($data['image']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getCar = $this->carService->selectFirstBy('uuid', $uuid);

        $this->fileService->delete($getCar->image);

        $getCar->delete();

        return response()->json([
            'message' => 'Mobil telah dihapus'
        ]);
    }
}
