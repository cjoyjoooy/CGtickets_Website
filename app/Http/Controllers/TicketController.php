<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class TicketController extends Controller
{
    public function index(Request $request)
{
    $transactionId = $request->input('transactionId');
    $name = $request->input('name');
    $quantity = $request->input('quantity');
    $totalAmount = $request->input('totalAmount');
    $schedule_id = $request->input('scheduleID');
    $schedules = Schedule::where('id', $schedule_id)->get();
    $barcode = $request->input('barcode');

    return view('client.clientTicketPage', compact('transactionId', 'name', 'quantity', 'totalAmount', 'schedule_id', 'schedules', 'barcode'));
}

    public function bcode($code)
    { $barcode = DNS1D::getBarcodeHTML($code, 'C128');
        return $this->index(request()->merge(['barcode' => $barcode]));
    }
    
}