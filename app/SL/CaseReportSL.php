<?php

namespace App\SL;

use App\Models\CaseReport;

use App\Models\CaseReportLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CaseReportSL extends SL
{
    public function __construct()
    {
        $this->setModel(new CaseReport());
    }

    public function index($search, $paginateCount = 10)
    {
        return CaseReport::where('title', 'like', '%' . $search . '%')
            ->orWhereHas('atoll', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('island', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('ecosystem', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($paginateCount);
    }


    public function store($data): array
    {

        DB::beginTransaction();
        try {
            $caseReport = CaseReport::firstOrCreate([

                'atoll_id' => $data['atoll_id'],
                'island_id' => $data['island_id'],
                'ecosystem_id' => $data['ecosystem_id'],

                'title' => $data['title'],
                'statement' => $data['statement'],

                'submitted_by' => $data['submitted_by'] ?? null,
                'phone' => $data['phone'] ?? null,
                'email' => $data['email'] ?? null,

                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,

                'is_verified' => false,
            ]);

            if (isset($data['uploads'])) {
                $caseReport
                    ->addFromMediaLibraryRequest($data['uploads'])
                    ->toMediaCollection('case-report-images');
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($caseReport) {
            return [
                'status' => true,
                'payload' => 'The case report has been successfully created',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with saving the case report',
            ];
        }
    }

    /**
     * @throws \Exception
     */
    public function update($caseReportId, $data): bool|array
    {
        DB::beginTransaction();

        $caseReport = CaseReport::where('id', $caseReportId)->first();

        try {

            $caseReport->atoll_id = $data['atoll_id'] ?? $caseReport->atoll_id;
            $caseReport->island_id = $data['island_id'] ?? $caseReport->island_id;
            $caseReport->ecosystem_id = $data['ecosystem_id'] ?? $caseReport->ecosystem_id;

            $caseReport->title = $data['title'] ?? $caseReport->title;
            $caseReport->statement = $data['statement'] ?? $caseReport->statement;

            $caseReport->submitted_by = $data['submitted_by'] ?? $caseReport->submitted_by;
            $caseReport->phone = $data['phone'] ?? $caseReport->phone;
            $caseReport->email = $data['email'] ?? $caseReport->email;

            $caseReport->latitude = $data['latitude'] ?? $caseReport->latitude;
            $caseReport->longitude = $data['longitude'] ?? $caseReport->longitude;

            $caseReport->is_verified = false;

            $caseReportSave = $caseReport->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($caseReportSave) {
            return [
                'status' => true,
                'payload' => 'The case report has been successfully updated',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with updating the case report',
            ];
        }
    }

    public function verifyCaseReport(CaseReport $caseReport, $verify = true): array
    {
        $caseReport->is_verified = $verify;

        if ($caseReport->save()) {
            return [
                'status' => true,
                'payload' => 'The case report has been successfully ' . ($verify ? 'verified' : 'unverified'),
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue updating the verification status of the case report',
            ];
        }
    }

    public function addCaseLink($caseReportId, $data): array
    {
        DB::beginTransaction();

        try {
            $caseReport = CaseReport::where('id', $caseReportId)->first();

            $caseReport->caseReportLinks()->create([
                'link' => $data['link'],
                'description' => $data['description'] ?? null,
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        if ($caseReport) {
            return [
                'status' => true,
                'payload' => 'The case report link has been successfully added',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with adding the case report link',
            ];
        }
    }

    public function destroyCaseLink($id): bool|array
    {
        DB::beginTransaction();
        $caseReportLink = CaseReportLink::where('id', $id)->first();

        try {
            $caseReportLink->delete();
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }

        DB::commit();

        return ['status' => true, 'payload' => 'The case link has been deleted'];
    }

}
