<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Http\Request;

use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    public function show($id)
    {
        $scheduledatas = Schedule::find($id);
        return view('client.clientPaymentPage', compact('scheduledatas'));
    }


    public function insertData(Request $request)
    {
        // Create a new customer record
        $customer = Customer::create([
            'customer_name' => $request->input('name'),
            'customer_email' => $request->input('email'),
            'customer_phonenumber' => $request->input('phone')
        ]);

        // Create a new payment record
        $payment = Payment::create([
            'cardholder_name' => $request->input('cardname'),
            'card_number' => $request->input('CardNum')
        ]);

        // Get the quantity from the ticket details page
        $quantity = $request->input('quantity');

        // Create a new transaction record
        $transaction = Transaction::create([
            'date' => now(), // Set the current date
            'customer_id' => $customer->id,
            'schedule_id' => $request->input('scheduleID'),
            'quantity' => $quantity,
            'total' => $request->input('totalAmount'),
            'payment_id' => $payment->id
        ]);

        // Redirect to the "Ticket" page
        return app(TicketController::class)->index($request->merge([
            'transactionId' => $transaction->id,
            'name' => $request->input('name'),
            'quantity' => $quantity,
            'totalAmount' => $request->input('totalAmount'),
            'scheduleID' => $request->input('scheduleID')
        ]));
    }

}
