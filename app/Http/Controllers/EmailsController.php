<?php

namespace App\Http\Controllers;

use App\Jobs\ResultsJob;
use App\Mail\WelcomeMail;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LDAP\Result;

class EmailsController extends Controller
{
    public function welcomeEmail()
    {
        $delay = 1;
        $users = User::limit(5)->get();
        foreach ($users as $user) {
            ResultsJob::dispatch($user->email)
                ->delay(now()->addMinutes($delay));
            $delay++;
        }
        return "Email Sent Successfully";

    }
}
