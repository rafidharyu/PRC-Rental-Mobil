<?php

namespace App\Http\Services;

use App\Models\Event;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EventService
{
    /**
     * Retrieve paginated list of events.
     */
    public function select(int $limit = 10): LengthAwarePaginator
    {
        return Event::latest()->paginate($limit);
    }

    /**
     * Retrieve a specific event by column and value.
     */
    public function selectFirstBy(string $column, string $value): ?Event
    {
        return Event::where($column, $value)->first();
    }

    /**
     * Create a new event.
     */
    public function create(array $data): Event
    {
        return Event::create($data);
    }

    /**
     * Update a specific event by UUID.
     */
    public function update(array $data, string $uuid): bool
    {
        $event = $this->selectFirstBy('uuid', $uuid);

        if ($event) {
            return $event->update($data);
        }

        return false;
    }

    /**
     * Delete a specific event by UUID.
     */
    public function delete(string $uuid): bool
    {
        $event = $this->selectFirstBy('uuid', $uuid);

        if ($event) {
            return $event->delete();
        }

        return false;
    }
}
