<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Product;
use Mailgun\Mailgun;
use Mailgun\Message\MessageBuilder;


class ProductCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    //public $builder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        // $builder = new MessageBuilder();
        // $builder->setFromAddress('mailgun@sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org');
        // $builder->addToRecipient('matr1xq@mail.ru');
        // $builder->setSubject('Создан продукт ' . $this->product->title);
        // $builder->setTextBody('Добавлен продукт с ИД = ' . $this->product->id . 'по цене: ' . $this->product->price);
        // $domain = 'sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org';
        // $key = 'fb69af462a2f98bc88c81164c8aa865b-4d640632-336aaf00';
        // $api_url = 'https://api.mailgun.net/v3/sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org';
        // $mg = Mailgun::create($key, $api_url);
        // $mg->messages()->send($domain, $builder->getMessage());
    }

    // public function make_msg(Product $product)
    // {
    //     $builder = new MessageBuilder();
    //     $builder->setFromAddress('mailgun@sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org');
    //     $builder->addToRecipient('matr1xq@mail.ru');
    //     $builder->setSubject('Создан продукт ' . $this->product->title);
    //     $builder->setTextBody('Добавлен продукт с ИД = ' . $this->product->id . 'по цене: ' . $this->product->price);
    //     return $builder;
    // }
}
