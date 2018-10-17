<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;

class StatusController extends Controller
{
    //
    public function index()
    {
        return Status::with('user')->latest()->get();
    }

    public function store(Request $request)
    {
        //middleware

        //validate
        $this->validate($request, ['body' => 'required']);

        //create
        $status = User::find(1)
            ->statuses()
            ->create($request->only(['body']));
        return $status->load('user');
        //return it and include the user
    }
}
