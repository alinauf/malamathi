<?php

namespace App\SL;

use App\Models\Zone;

use Illuminate\Support\Facades\DB;

class ZoneSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Zone());
    }

    public function index($search, $paginateCount = 10)
    {
        return Zone::where('name', 'like', '%' . $search . '%')
            ->orWhereHas('atoll', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('island', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $zone = Zone::firstOrCreate([
                'atoll_id' => $data['atoll_id'],
                'island_id' => $data['island_id'],
                'name' => $data['name'],
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($zone) {
            return [
                'status' => true,
                'payload' => 'The zone has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the zone',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($zoneId, $data): bool|array
    {
        DB::beginTransaction();

        $zone = Zone::where('id', $zoneId)->first();

        try {

            $atollId = $data['atoll_id'] ?? $zone->atoll_id;
            $islandId = $data['island_id'] ?? $zone->island_id;
            $name = $data['name'] ?? $zone->name;

            $zone->name = $name;
            $zone->atoll_id = $atollId;
            $zone->island_id = $islandId;

            $zoneSave = $zone->save();


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($zoneSave) {
            return [
                'status' => true,
                'payload' => 'The zone has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the zone',
            ];
        }
    }


}
