<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


    // public function insertData(Request $request)
    // {
    //     // Create a new customer record
    //     $customer = Customer::create([
    //         'customer_name' => $request->input('name'),
    //         'customer_email' => $request->input('email'),
    //         'customer_phonenumber' => $request->input('phone')
    //     ]);

    //     // Create a new payment record
    //     $payment = Payment::create([
    //         'cardholder_name' => $request->input('cardname'),
    //         'card_number' => $request->input('CardNum')
    //     ]);

    //     // Get the quantity from the ticket details page
    //     $quantity = $request->input('quantity');

    //     // Create a new transaction record
    //     $transaction = Transaction::create([
    //         'date' => now(), // Set the current date
    //         'customer_id' => $customer->id,
    //         'schedule_id' => $request->input('scheduleID'),
    //         'quantity' => $quantity,
    //         'total' => $request->input('totalAmount'),
    //         'payment_id' => $payment->id
    //     ]);

    //     // Redirect to the "Ticket" page
    //     return app(TicketController::class)->index($request->merge([
    //         'transactionId' => $transaction->id,
    //         'name' => $request->input('name'),
    //         'quantity' => $quantity,
    //         'totalAmount' => $request->input('totalAmount'),
    //         'scheduleID' => $request->input('scheduleID')
    //     ]));
    // }

    public function insertData(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'cardname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        'CardNum' => 'required|numeric',
     
   
      
    ], [
        'name.required' => 'The name field is required.',
        'name.string' => 'The name field must be a string.',
        'name.regex' => 'The name field must contain only alphabetic characters.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'phone.required' => 'The phone number field is required.',
        'phone.numeric' => 'The phone number must be numeric.',
        'cardname.required' => 'The cardholder name field is required.',
        'cardname.string' => 'The cardholder name must be a string.',
        'cardname.regex' => 'The cardholder name field must contain only alphabetic characters.',
        'CardNum.required' => 'The card number field is required.',
        'CardNum.numeric' => 'The card number must be numeric.',
    
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    
    $customer = Customer::create([
        'customer_name' => $request->input('name'),
        'customer_email' => $request->input('email'),
        'customer_phonenumber' => $request->input('phone')
    ]);

    $payment = Payment::create([
        'cardholder_name' => $request->input('cardname'),
        'card_number' => $request->input('CardNum')
    ]);

    $quantity = $request->input('quantity');

    $transaction = Transaction::create([
        'date' => now(),
        'customer_id' => $customer->id,
        'schedule_id' => $request->input('scheduleID'),
        'quantity' => $quantity,
        'total' => $request->input('totalAmount'),
        'payment_id' => $payment->id
    ]);

    return app(TicketController::class)->index($request->merge([
        'transactionId' => $transaction->id,
        'name' => $request->input('name'),
        'quantity' => $quantity,
        'totalAmount' => $request->input('totalAmount'),
        'scheduleID' => $request->input('scheduleID')
    ]));
}
}
