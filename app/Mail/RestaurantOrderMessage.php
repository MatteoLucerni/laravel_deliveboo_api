<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RestaurantOrderMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $total_price;
    public $restaurant;
    public $payment;


    /**
     * Create a new message instance.
     */
    public function __construct($customer, $total_price, $restaurant, $payment)
    {
        $this->customer = $customer;
        $this->total_price = $total_price;
        $this->restaurant = $restaurant;
        $this->payment = $payment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'deliveboo@orders.com',
            subject: 'New Order'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.restaurants.message',
            with: [
                'customer' => $this->customer,
                'total_price' => $this->total_price,
                'restaurant' => $this->restaurant,
                'payment' => $this->payment
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
