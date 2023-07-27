<?php

namespace App\SL;

use App\Models\PopulationEntry;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PopulationEntrySL extends SL
{
    public function __construct()
    {
        $this->setModel(new PopulationEntry());
    }

    public function index($search, $paginateCount = 10)
    {
        return PopulationEntry::where('men_count', 'like', '%' . $search . '%')
            ->orWhere('women_count', 'like', '%' . $search . '%')
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
            $populationEntry = PopulationEntry::firstOrCreate([
                'atoll_id' => $data['atoll_id'],
                'island_id' => $data['island_id'],
                'men_count' => $data['men_count'],
                'women_count' => $data['women_count'],
                'local_count' => $data['local_count'],
                'expat_count' => $data['expat_count'],
                'total_population' => $data['women_count'] + $data['men_count'],
                'logged_date' => Carbon::parse($data['logged_date']),
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
            $populationEntry->total_population = $populationEntry->men_count + $populationEntry->women_count;
            $populationEntry->logged_date = $data['logged_date'] ? Carbon::parse($data['logged_date']) : $populationEntry->logged_date;
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
