<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Services\FileService;
use App\Http\Requests\EventRequest;
use App\Http\Services\EventService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private EventService $eventService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('backend.event.index', [
            'events' => $this->eventService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        // Cek apakah user adalah owner
        if (auth()->check() && auth()->user()->role === 'owner') {
            return redirect()->route('panel.event.index')->with('error', 'Owner tidak diizinkan mengakses halaman ini.');
        }

        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            // Menambahkan UUID
            $data['uuid'] = \Str::uuid()->toString();

            // Mengunggah gambar
            $data['image'] = $this->fileService->upload($data['image'], 'images');

            // Menyimpan event baru
            $this->eventService->create($data);

            return redirect()->route('panel.event.index')->with('success', 'Event has been created');
        } catch (\Exception $err) {
            // Jika terjadi error, hapus gambar yang sudah diupload
            if (isset($data['image'])) {
                $this->fileService->delete($data['image']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid): View
    {
        return view('backend.event.show', [
            'event' => $this->eventService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid): View|RedirectResponse
    {
        // Cek apakah user adalah owner
        if (auth()->check() && auth()->user()->role === 'owner') {
            return redirect()->route('panel.event.index')->with('error', 'Owner tidak diizinkan mengakses halaman ini.');
        }

        return view('backend.event.edit', [
            'event' => $this->eventService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $uuid): RedirectResponse
    {
        $data = $request->validated();

        $getEvent = $this->eventService->selectFirstBy('uuid', $uuid);

        try {
            if ($request->hasFile('image')) {
                // Hapus gambar lama
                $this->fileService->delete($getEvent->image);

                // Unggah gambar baru
                $data['image'] = $this->fileService->upload($data['image'], 'images');
            } else {
                // Gunakan gambar lama jika tidak ada gambar baru
                $data['image'] = $getEvent->image;
            }

            // Tidak perlu menambahkan UUID karena sudah ada
            $this->eventService->update($data, $uuid);

            return redirect()->route('panel.event.index')->with('success', 'Event has been updated');
        } catch (\Exception $err) {
            // Jika terjadi error, hapus gambar yang sudah diupload
            if (isset($data['image'])) {
                $this->fileService->delete($data['image']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid): JsonResponse|RedirectResponse
    {
        // Cek apakah user adalah owner
        if (auth()->check() && auth()->user()->role === 'owner') {
            return redirect()->route('panel.event.index')->with('error', 'Owner tidak diizinkan menghapus event.');
        }

        $getEvent = $this->eventService->selectFirstBy('uuid', $uuid);

        $this->fileService->delete($getEvent->image);

        $getEvent->delete();

        return response()->json([
            'message' => 'Event has been deleted'
        ]);
    }
}
