<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'visa_category',
        'visa_type',
        'visa_plan',
        'first_name',
        'middle_name',
        'surname',
        'father_name',
        'mother_name',
        'place_birth',
        'occupation',
        'marital_status',
        'religion',
        'nationality',
        'passport_no',
        'passport_issue_date',
        'passport_expiry_date',
        'gender',
        'passport_front',
        'passport_back',
        'passport_photo',
        'other_document',
        'guarantor_name',
        'guarantor_nationality',
        'guarantor_relation',
        'guarantor_emirates_id',
        'guarantor_passport_no',
        'employer_name',
        'company_contact',
        'guarantor_visa_no',
        'guarantor_visa_expiry',
        'guarantor_mobile',
        'guarantor_email',
        'receipt_no',
        'receipt_amount',
        'receipt_date',
        'visa_payment_date',
        'ticket_otb_date',
        'security_deposit_date',
        'agreed_terms',
    ];

    protected $casts = [
        'passport_issue_date' => 'date',
        'passport_expiry_date' => 'date',
        'guarantor_visa_expiry' => 'date',
        'receipt_date' => 'date',
        'visa_payment_date' => 'date',
        'ticket_otb_date' => 'date',
        'security_deposit_date' => 'date',
        'agreed_terms' => 'boolean',
    ];
}