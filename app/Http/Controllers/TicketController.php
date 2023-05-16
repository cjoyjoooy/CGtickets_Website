<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Http\Request;

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

    return view('client.clientTicketPage', compact('transactionId', 'name', 'quantity', 'totalAmount', 'schedule_id', 'schedules'));
}

}