<?php

namespace App\Observers;

use App\Mail\ProductCreate;
use App\Product;
use Illuminate\Support\Facades\Mail;
use Mailgun\Mailgun;
use Mailgun\Message\MessageBuilder;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        new ProductCreate($product);
        echo("@@@@@@@@@@@@@@@");
        $to = 'matr1xq@mail.ru';
        $builder = new MessageBuilder();
        $builder->setFromAddress('mailgun@sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org');
        $builder->addToRecipient($to);
        $builder->setSubject('Создан продукт ' . $product->title);
        $builder->setTextBody('Добавлен продукт с ИД = ' . $product->id . 'по цене: ' . $product->price);
        $domain = 'sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org';
        $key = 'fb69af462a2f98bc88c81164c8aa865b-4d640632-336aaf00';
        $api_url = 'https://api.mailgun.net/v3/sandboxb0486fc0b3434f63a1f02a498832a4de.mailgun.org';
        $mg = Mailgun::create($key, $api_url);
        return $mg->messages()->send($domain, $builder->getMessage());
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }
}
