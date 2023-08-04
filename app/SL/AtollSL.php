<?php

namespace App\SL;

use App\Models\Atoll;

use Illuminate\Support\Facades\DB;

class AtollSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Atoll());
    }

    public function index($search, $paginateCount = 10)
    {
        return Atoll::where('name', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $atoll = Atoll::firstOrCreate([
                'code' => $data['code'],
                'name' => $data['name'],
                'is_city' => $data['is_city'] ?? false,
            ]);


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($atoll) {
            return [
                'status' => true,
                'payload' => 'The atoll has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the atoll',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($atollId, $data): bool|array
    {
        DB::beginTransaction();

        $atoll = Atoll::where('id', $atollId)->first();

        try {

            $name = $data['name'] ?? $atoll->name;
            $code = $data['code'] ?? $atoll->code;
            $isCity = $data['is_city'] ?? false;

            $atoll->name = $name;
            $atoll->code = $code;
            $atoll->is_city = $isCity;

            $atollSave = $atoll->save();


        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($atollSave) {
            return [
                'status' => true,
                'payload' => 'The atoll has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the atoll',
            ];
        }
    }


}
