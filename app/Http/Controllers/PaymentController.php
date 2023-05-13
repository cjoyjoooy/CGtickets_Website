<?php

namespace App\Http\Controllers;
use App\Models\Schedule;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.clientPaymentPage');
        
    }

    public function show($id)
    {
        $scheduledatas = Schedule::find($id);
        return view('client.clientPaymentPage', compact('scheduledatas'));
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
