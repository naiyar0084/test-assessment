<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendQuote(Request $request)
    {
       // dd($request->all());
        $data = $request->validate([
            'name'          => 'required|string',
            'email'         => 'required|email',
            'mobile'        => 'required|string',
            'moving_from'   => 'nullable|string',
            'moving_to'     => 'nullable|string',
            'estimated_date'=> 'nullable|date',
            'type_move'     => 'nullable|string',
            'bedroom'       => 'nullable|string',
            'survey_date'   => 'nullable|string',
            'anything_else'       => 'nullable|string',
        ]);

        Mail::send('mail.quotemail', $data, function ($message) use ($data) {
            $message->to('naiyar0084@gmail.com') // recipient email
                    ->subject('New Quotation Request from ' . $data['name']);
        });

        return back()->with('success', 'Quotation request sent successfully!');
    }

    public function sendContact(Request $request)
        {
            $data = $request->validate([
                'name'          => 'required|string',
                'email'         => 'required|email',
                'phone'         => 'nullable|string',
                'project'       => 'nullable|string',
                'subject'       => 'nullable|string',
                'leave_message' => 'nullable|string',
            ]);

            Mail::send('mail.contactmail', $data, function ($message) use ($data) {
                $message->to('naiyar0084@gmail.com')
                        ->subject('Contact Form: ' . ($data['subject'] ?? 'No Subject'));
            });

            return back()->with('success', 'Your message has been sent successfully!');
        }

}
