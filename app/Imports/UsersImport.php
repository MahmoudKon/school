<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithChunkReading, ShouldQueue, WithBatchInserts, WithStartRow
{

    public function model(array $row)
    {
        $last = User::select('id')->latest()->first()->id;
        return new User([
            'id'            => ($last + 1),
            'username'      => ($row[0] . '(new)'),
            'full_name'     => $row[1],
            'email'         => ($row[2] . '(new)'),
            'address'       => $row[3],
            'phone'         => ($row[4] . '(new)'),
            'job'           => $row[5],
            'image'         => $row[6],
            'code'          => ($row[7] . '(new)'),
            'personal_id'   => ($row[8] . '(new)'),
            'age'           => $row[9],
            'password'      => sha1($row[0]),
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    } // end of model

    public function startRow(): int
    {
        return 2;
    } // end of startRow

    public function batchSize(): int
    {
        return 20;
    } // end of batchSize

    public function chunkSize(): int
    {
        return 20;
    } // end of chunkSize

} // end of users import
