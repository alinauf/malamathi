<?php

namespace App\SL;

use App\Models\PopulationEntry;
use Illuminate\Support\Facades\DB;

class PopulationEntrySL extends SL
{
    public function __construct()
    {
        $this->setModel(new PopulationEntry());
    }

    public function index($search, $paginateCount = 10)
    {
        return PopulationEntry::where('name', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $populationEntry = PopulationEntry::firstOrCreate([
                'atoll_id' => $data['atoll_id'],
                'island_id' => $data['island_id'],
                'men_count' => $data['men_count'],
                'women_count' => $data['women_count'],
                'local_count' => $data['local_count'],
                'expat_count' => $data['expat_count'],
                'total_population' => $data['total_population'],
                'description' => $data['description'] ?? null,
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($populationEntry) {
            return [
                'status' => true,
                'payload' => 'The population entry has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the population entry',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($populationEntryId, $data): bool|array
    {
        DB::beginTransaction();

        $populationEntry = PopulationEntry::where('id', $populationEntryId)->first();

        try {

            $populationEntry->atoll_id = $data['atoll_id'] ?? $populationEntry->atoll_id;
            $populationEntry->island_id = $data['island_id'] ?? $populationEntry->island_id;
            $populationEntry->men_count = $data['men_count'] ?? $populationEntry->men_count;
            $populationEntry->women_count = $data['women_count'] ?? $populationEntry->women_count;
            $populationEntry->local_count = $data['local_count'] ?? $populationEntry->local_count;
            $populationEntry->expat_count = $data['expat_count'] ?? $populationEntry->expat_count;
            $populationEntry->total_population = $data['total_population'] ?? $populationEntry->total_population;
            $populationEntry->description = $data['description'] ?? $populationEntry->description;
            $populationEntrySave = $populationEntry->save();


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($populationEntrySave) {
            return [
                'status' => true,
                'payload' => 'The population entry has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the population entry',
            ];
        }
    }


}
