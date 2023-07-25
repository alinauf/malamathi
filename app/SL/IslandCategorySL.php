<?php

namespace App\SL;

use App\Models\IslandCategory;
use Illuminate\Support\Facades\DB;

class IslandCategorySL extends SL
{
    public function __construct()
    {
        $this->setModel(new IslandCategory());
    }

    public function index($search, $paginateCount = 10)
    {
        return IslandCategory::where('name', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $islandCategory = IslandCategory::firstOrCreate([
                'name' => $data['name'],
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($islandCategory) {
            return [
                'status' => true,
                'payload' => 'The island category has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with creating the island category',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($islandCategoryId, $data): bool|array
    {
        DB::beginTransaction();

        $islandCategory = IslandCategory::where('id', $islandCategoryId)->first();

        try {
            $islandCategory->name = $data['name'] ?? $islandCategory->name;
            $islandCategorySave = $islandCategory->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($islandCategorySave) {
            return [
                'status' => true,
                'payload' => 'The island category has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the island category',
            ];
        }
    }


}
