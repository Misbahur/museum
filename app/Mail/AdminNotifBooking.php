<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotifBooking extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ada Booking Online Kunjungan Museum Blambangan Masuk Mas Bayu')
            ->view('mail.test')
            ->with(
                [
                    'nama' => 'Misbahur Notif Ke Mas Bayu Tinjau Ada Booking Museum',
                    'website' => 'https://museum.banyuwangikab.go.id/login',
                ]);
    }
}
