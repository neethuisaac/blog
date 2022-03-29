<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter{
    public function __construct(protected ApiClient $client, protected string $foo){

    }
    public function subscribe(string $email, string $list = null){
        //dd('subscribe');
        $list ??= config('services.mailchimp.lists.subscribers');
        $response = $this->client->lists->addListMember($list, [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    }


}
