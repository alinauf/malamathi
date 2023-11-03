<?php

namespace App\SL;

use App\Models\PlotUsage;
use Illuminate\Support\Facades\DB;

class PlotUsageSL extends SL
{
    public function __construct()
    {
        $this->setModel(new PlotUsage());
    }

    public function index($search, $paginateCount = 10)
    {
        return PlotUsage::where('owner_name', 'like', '%' . $search . '%')
            ->orWhere('purpose', 'like', '%' . $search . '%')
            ->orWhereHas('plot', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $plotUsage = PlotUsage::firstOrCreate([
                'plot_id' => $data['plot_id'],
                'owner_name' => $data['owner_name'],
                'purpose' => $data['purpose'],
                'description' => $data['description'] ?? null,
                'plot_value' => $data['plot_value'] ?? null,
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($plotUsage) {
            return [
                'status' => true,
                'payload' => 'The plot usage entry has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the plot usage entry',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($plotUsageId, $data): bool|array
    {
        DB::beginTransaction();

        $plotUsage = PlotUsage::where('id', $plotUsageId)->first();

        try {
            $plotUsage->plot_id = $data['plot_id'] ?? $plotUsage->plot_id;
            $plotUsage->owner_name = $data['owner_name'] ?? $plotUsage->owner_name;
            $plotUsage->purpose = $data['purpose'] ?? $plotUsage->purpose;
            $plotUsage->description = $data['description'] ?? $plotUsage->description;
            $plotUsage->plot_value = $data['plot_value'] ?? $plotUsage->plot_value;

            $plotUsageSave = $plotUsage->save();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($plotUsageSave) {
            return [
                'status' => true,
                'payload' => 'The plot usage entry has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the plot usage entry',
            ];
        }
    }


}
