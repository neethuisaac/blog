<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate([
            'email' => ['required','email']
        ]);
        try{
            $newsletter->subscribe(request('email'),config('services.mailchimp.lists.subscribers'));
            return back()->with('success','You have successfully subscribed to our newsletter!');
        }
        catch(Exception $e){
            throw ValidationException::withMessages(['email' => 'The provided email  '.request('email').' could not be added.']);
        }
    }
}
