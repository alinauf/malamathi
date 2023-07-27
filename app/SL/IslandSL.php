<?php

namespace App\SL;

use App\Models\Island;

use Illuminate\Support\Facades\DB;

class IslandSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Island());
    }

    public function index($search, $paginateCount = 10)
    {
        return Island::where('name', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%')
            ->orWhereHas('atoll', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $island = Island::firstOrCreate([
                'atoll_id' => $data['atoll_id'],
                'island_category_id' => $data['island_category_id'],
                'code' => $data['code'],
                'name' => $data['name'],
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($island) {
            return [
                'status' => true,
                'payload' => 'The island has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the island',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($islandId, $data): bool|array
    {
        DB::beginTransaction();

        $island = Island::where('id', $islandId)->first();

        try {

            $name = $data['name'] ?? $island->name;
            $code = $data['code'] ?? $island->code;
            $atollId = $data['atoll_id'] ?? $island->atoll_id;
            $islandCategoruId = $data['island_category_id'] ?? $island->island_category_id;

            $island->name = $name;
            $island->code = $code;
            $island->atoll_id = $atollId;
            $island->island_category_id = $islandCategoruId;

            $islandSave = $island->save();


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($islandSave) {
            return [
                'status' => true,
                'payload' => 'The island has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the island',
            ];
        }
    }


}
