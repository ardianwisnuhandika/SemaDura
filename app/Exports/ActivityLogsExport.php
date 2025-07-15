<?php

namespace App\Exports;

use App\Models\ActivityLog;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActivityLogsExport implements FromCollection
{
    protected $logs;
    public function __construct($logs)
    {
        $this->logs = $logs;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->logs;
    }
}
