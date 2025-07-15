<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Exports\ActivityLogsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = \App\Models\ActivityLog::query();
        if ($request->filled('admin')) {
            $logs->where('admin', 'like', '%'.$request->admin.'%');
        }
        if ($request->filled('action')) {
            $logs->where('action', $request->action);
        }
        if ($request->filled('table')) {
            $logs->where('table', $request->table);
        }
        if ($request->filled('search')) {
            $logs->where('data', 'like', '%'.$request->search.'%');
        }
        $logs = $logs->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.logs.index', compact('logs'));
    }

    public function exportExcel(Request $request)
    {
        $logs = ActivityLog::query();
        if ($request->filled('admin')) {
            $logs->where('admin', 'like', '%'.$request->admin.'%');
        }
        if ($request->filled('action')) {
            $logs->where('action', $request->action);
        }
        if ($request->filled('table')) {
            $logs->where('table', $request->table);
        }
        if ($request->filled('search')) {
            $logs->where('data', 'like', '%'.$request->search.'%');
        }
        $logs = $logs->select('id','admin','action','table','data','created_at')->orderBy('created_at','desc')->get();
        return Excel::download(new ActivityLogsExport($logs), 'activity_logs.xlsx');
    }

    public function exportCsv(Request $request)
    {
        $logs = ActivityLog::query();
        if ($request->filled('admin')) {
            $logs->where('admin', 'like', '%'.$request->admin.'%');
        }
        if ($request->filled('action')) {
            $logs->where('action', $request->action);
        }
        if ($request->filled('table')) {
            $logs->where('table', $request->table);
        }
        if ($request->filled('search')) {
            $logs->where('data', 'like', '%'.$request->search.'%');
        }
        $logs = $logs->select('id','admin','action','table','data','created_at')->orderBy('created_at','desc')->get();
        return Excel::download(new ActivityLogsExport($logs), 'activity_logs.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportPdf(Request $request)
    {
        $logs = ActivityLog::query();
        if ($request->filled('admin')) {
            $logs->where('admin', 'like', '%'.$request->admin.'%');
        }
        if ($request->filled('action')) {
            $logs->where('action', $request->action);
        }
        if ($request->filled('table')) {
            $logs->where('table', $request->table);
        }
        if ($request->filled('search')) {
            $logs->where('data', 'like', '%'.$request->search.'%');
        }
        $logs = $logs->select('id','admin','action','table','data','created_at')->orderBy('created_at','desc')->get();
        $pdf = Pdf::loadView('admin.logs.pdf', compact('logs'));
        return $pdf->download('activity_logs.pdf');
    }
}
