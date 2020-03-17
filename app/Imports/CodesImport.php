<?php

namespace App\Imports;

use App\Code;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CodesImport implements ToModel, WithValidation, SkipsOnFailure, WithChunkReading, WithBatchInserts
{

    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return Code|null
     */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Code([
           'code'     => $row[0]
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => Rule::unique('codes', 'code')
        ];
    }

    public function batchSize(): int
    {
        return 5000;
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}