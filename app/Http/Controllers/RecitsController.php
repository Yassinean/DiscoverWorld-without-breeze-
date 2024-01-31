<?php

namespace App\Http\Controllers;

use App\Models\Recit;
use Illuminate\Http\Request;

class RecitsController extends Controller
{
    public function createRecit(Request $request){
        $incomingFields = $request->validate([
            'Title' => 'required',
            'Description' => 'required',
            'Destination' => 'required',
            'Conseil' => 'required',
        ]);
        $incomingFields['Title'] = strip_tags($incomingFields['Title']);
        $incomingFields['Description'] = strip_tags($incomingFields['Description']);
        $incomingFields['Destination'] = strip_tags($incomingFields['Destination']);
        $incomingFields['Conseil'] = strip_tags($incomingFields['Conseil']);
        $incomingFields['user_id'] = auth()->id();

        Recit::create($incomingFields);
        return redirect('/');
    }
}
