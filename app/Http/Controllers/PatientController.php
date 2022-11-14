<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Patient;

class PatientController extends Controller
{
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }
}
