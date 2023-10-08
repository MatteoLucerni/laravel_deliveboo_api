<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $tel;
    public $email;
    public $address;
    public $note;
    public $total_price;


    /**
     * Create a new message instance.
     */
    public function __construct($customer, $tel, $email, $address, $note, $total_price)
    {
        $this->customer = $customer;
        $this->tel = $tel;
        $this->email = $email;
        $this->address = $address;
        $this->note = $note;
        $this->total_price = $total_price;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'deliveboo@orders.com',
            subject: 'Order Confirmation'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.contacts.message',
            with: [
                'customer' => $this->customer,
                'tel' => $this->tel,
                'email' => $this->email,
                'address' => $this->address,
                'note' => $this->note,
                'total_price' => $this->total_price,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
