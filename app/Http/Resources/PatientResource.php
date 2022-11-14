<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "patient_id" => $this->external_patient_id,
            "first_appointment_id" => $this->appointments()->first()->appointment_id,
            "invoice" => $this->invoices()->pluck('invoice_no'),
            "total_receipt" => $this->receipts()->count(),
            "receipt" => $this->receipts()->pluck('receipt_id'),
            "first_receipt_date" => $this->receipts()->first()->receipt_date,
            "first_invoice_date" => $this->invoices()->first()->date,
            "first_appointment_date" => Carbon::parse($this->appointments()->first()->appointment_date)->format('Y-m-d'),
            "patient_created_date" => Carbon::parse($this->date_of_enquiry)->format('Y-m-d'),
        ];
    }
}
