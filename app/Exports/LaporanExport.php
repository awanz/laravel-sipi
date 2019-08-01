<?php

namespace App\Exports;

use App\Laporan;
use App\PurchaseOrder;
use DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    //     User::selectRaw('users.name, count(*) submitted_games')
    // ->join('games', 'games.user_id', '=', 'users.id')
    // ->groupBy('users.name')
    // ->orderBy('submitted_games', 'DESC')
    // ->get();

        // $laporan = PurchaseOrder::selectRaw('no_invoice, tgl_invoice');
        $laporan = DB::table('purchase_order')->select('nama_project as Project', 'no_purchase_order as No PO', 'no_invoice as No Invoice', 'tgl_invoice as Tgl Invoice', 'progress as Status')->get();
        return $laporan;
    }
}
