<?php

namespace App\SL;

use App\Models\Ecosystem;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class EcosystemSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Ecosystem());
    }

    public function index($search, $paginateCount = 10)
    {
        return Ecosystem::where('name', 'like', '%' . $search . '%')
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
            $ecosystem = Ecosystem::firstOrCreate([

                'atoll_id' => $data['atoll_id'],
                'island_id' => $data['island_id'],
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'is_documented' => $data['is_documented'] ?? false,
                'is_potentially_threatened' => $data['is_potentially_threatened'] ?? false,
                'is_threatened' => $data['is_threatened'] ?? false,
                'is_destroyed' => $data['is_destroyed'] ?? false,
                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($ecosystem) {
            return [
                'status' => true,
                'payload' => 'The ecosystem has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the ecosystem',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($ecosystemId, $data): bool|array
    {
        DB::beginTransaction();

        $ecosystem = Ecosystem::where('id', $ecosystemId)->first();

        try {

            $ecosystem->atoll_id = $data['atoll_id'] ?? $ecosystem->atoll_id;
            $ecosystem->island_id = $data['island_id'] ?? $ecosystem->island_id;
            $ecosystem->name = $data['name'] ?? $ecosystem->name;
            $ecosystem->description = $data['description'] ?? $ecosystem->description;
            $ecosystem->is_documented = $data['is_documented'] ?? false;
            $ecosystem->is_potentially_threatened = $data['is_potentially_threatened'] ?? false;
            $ecosystem->is_threatened = $data['is_threatened'] ?? false;
            $ecosystem->is_destroyed = $data['is_destroyed'] ?? false;
            $ecosystem->latitude = $data['latitude'] ?? $ecosystem->latitude;
            $ecosystem->longitude = $data['longitude'] ?? $ecosystem->longitude;

            $ecosystemSave = $ecosystem->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($ecosystemSave) {
            return [
                'status' => true,
                'payload' => 'The ecosystem has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the ecosystem',
            ];
        }
    }

    public function getAllMarkers()
    {
        $markers = Ecosystem::all()->map(function ($ecosystem) {


            $status = 'NA';
            if ($ecosystem->is_destroyed) {
                $status = 'Destroyed';
            } elseif ($ecosystem->is_threatened && !$ecosystem->is_destroyed) {
                $status = 'Threatened';
            } elseif ($ecosystem->is_potentially_threatened &&
                !$ecosystem->is_threatened &&
                !$ecosystem->is_destroyed) {
                $status = 'Potentially Threatened';
            } elseif ($ecosystem->is_documented) {
                $status = 'Documented';
            }
            return [
                'id' => $ecosystem->id,
                'name' => $ecosystem->name,
                'latitude' => $ecosystem->latitude,
                'longitude' => $ecosystem->longitude,
                'status' => $status,
                'url' => '/ecosystem/' . $ecosystem->id,
            ];
        });

        return $markers;

    }

    public function getStats()
    {
        $destroyedCount = Ecosystem::where('is_destroyed', true)->count();
        $threatenedCount = Ecosystem::where('is_destroyed', false)->where('is_threatened', true)->count();
        $potentiallyThreatenedCount = Ecosystem::where('is_destroyed', false)->where('is_threatened', false)->where('is_potentially_threatened', true)->count();
        $documentedCount = Ecosystem::
        where('is_documented', true)->count();
        $unDocumented = Ecosystem::
        where('is_documented', false)->count();

        $allEcosystems = Ecosystem::all()->count();

        return [
            'destroyed_count' => $destroyedCount,
            'threatened_count' => $threatenedCount,
            'potentially_threatened_count' => $potentiallyThreatenedCount,
            'documented_count' => $documentedCount,
            'undocumented_count' => $unDocumented,
            'all_ecosystems' => $allEcosystems,
        ];
    }


}
