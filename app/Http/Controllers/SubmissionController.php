<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        return view('submission.index');
    }

    public function store()
    {

    }
}
