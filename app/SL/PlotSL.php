<?php

namespace App\SL;

use App\Models\Plot;

use Illuminate\Support\Facades\DB;

class PlotSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Plot());
    }

    public function index($search, $paginateCount = 10)
    {
        return Plot::where('name', 'like', '%' . $search . '%')
            ->orWhereHas('zone', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $plot = Plot::firstOrCreate([
                'zone_id' => $data['zone_id'],
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($plot) {
            return [
                'status' => true,
                'payload' => 'The plot has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the plot',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($plotId, $data): bool|array
    {
        DB::beginTransaction();

        $plot = Plot::where('id', $plotId)->first();

        try {

            $zoneId = $data['zone_id'] ?? $plot->zone_id;
            $name = $data['name'] ?? $plot->name;

            $plot->zone_id = $zoneId;
            $plot->name = $name;
            $plot->description = $data['description'] ?? $plot->description;

            $plotSave = $plot->save();


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($plotSave) {
            return [
                'status' => true,
                'payload' => 'The plot has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the plot',
            ];
        }
    }


}
