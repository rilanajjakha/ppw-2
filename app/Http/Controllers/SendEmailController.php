<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Jobs\SendMailJob;
use PharIo\Manifest\Email;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('emails.kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')
            ->with('succes', 'Email berhasil dikirim');
    }
}

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }


// <?php

// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Http\Request;
// use App\Mail\SendMail;

// class SendEmailController extends Controller
// {
//     public function index()
//     {
//         $content = [
//             'name' => 'Ini Nama Pengirim',
//             'subject' => 'Ini Subject email',
//             'body' => 'Ini adalah isi email yang 
//                        dikirim dari laravel 10'
//         ];
//         Mail::to('rillanajaha@gmail.com')->send(new SendMail($content));
//         return "Email berhasil dikirim.";
//     }

//     public function store(Request $request)
//     {
//         //
//     }
// }