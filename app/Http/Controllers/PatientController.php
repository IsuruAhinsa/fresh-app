<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    public function show(Request $request)
    {
        if (Carbon::createFromFormat('Y-m-d', $request->from) !== false && Carbon::createFromFormat('Y-m-d', $request->to) !== false) {

            $from = $request->from;
            $to = $request->to;

            $patient = Patient::whereBetween('date_of_enquiry', [$from, $to])->get();

            return PatientResource::collection($patient);

        } else {

            return response('Invalid Date Format', 406);

        }

    }
}
