<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    $transactionNumber = $this->generateTransactionNumber();

    // Update the seat number in the database
    $this->updateSeatNumber($schedule_id, $quantity);

    return view('client.clientTIcketPage', compact('transactionId', 'name', 'quantity', 
        'totalAmount', 'schedule_id', 'schedules', 'transactionNumber'));
}
public function generateTransactionNumber()
    {
        $prefix = 'cgt';
        $randomString = Str::random(8); // Generate a random string of length 8
        $transactionNumber = $prefix . $randomString;
        
        return $transactionNumber;
    }
    public function updateSeatNumber($schedule_id, $quantity)
    {
        $schedule = Schedule::find($schedule_id);
        $availableSeats = $schedule->cinema->seat_number;
        $updatedSeats = $availableSeats - $quantity;

        $schedule->cinema->seat_number = $updatedSeats;
        $schedule->cinema->save();
    }

}
