<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EncuestaExport;
use App\Http\Controllers\Controller;
use App\Models\RespuestaOpcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.reportes.listado')->only('index');
        $this->middleware('can:admin.reportes.formulario.crear')->only('create');
        $this->middleware('can:admin.reportes.crear')->only('store');
        $this->middleware('can:admin.reportes.ver')->only('show');
        $this->middleware('can:admin.reportes.formulario.editar')->only('edit');
        $this->middleware('can:admin.reportes.editar')->only('update');
        $this->middleware('can:admin.reportes.eliminar')->only('destroy');
    }


    public function downloadExcelEncuesta($id)
    {
         return Excel::download(new EncuestaExport($id), 'invoices.xlsx');
    }
}
