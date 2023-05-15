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
        return redirect()->route('Ticket', [
            'transactionId' => $transaction->id,
            'name' => $request->input('name'),
            'quantity' => $quantity,
            'totalAmount' => $request->input('totalAmount'),
            'scheduleID' => $request->input('scheduleID')
        ]);
    }

    // Dapat pag click sa confirm button sa payment page pa  ma insert tanan data sa customer,payment, and transaction
    // feel nako dapat first ma insert data sa Customer and payment table kay need ilang foreign key sa transaction table hihi

    // customer table 
    // id	customer_name	customer_email	customer_phonenumber	created_at	updated_at	

    // payment table 
    // id	cardholder_name	card_number	created_at	updated_at


    // Transaction table 
    // id	date	customer_id	schedule_id	quantity	total	payment_id	created_at	updated_at	

}
