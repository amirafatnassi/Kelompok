<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Patient extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'medical_record_number',
        'insurance_provider',
        'insurance_policy_number',
        'allergies',
        'existing_conditions',
        'emergency_contact_name',
        'emergency_contact_phone',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'date_of_birth',
    ];

    /**
     * Encrypt sensitive attributes when setting
     */
    public function setMedicalRecordNumberAttribute($value)
    {
        $this->attributes['medical_record_number'] = Crypt::encryptString($value);
    }

    public function getMedicalRecordNumberAttribute($value)
    {
        return Crypt::decryptString($value);
    }



    public function setInsurancePolicyNumberAttribute($value)
    {
        $this->attributes['insurance_policy_number'] = Crypt::encryptString($value);
    }

    public function getInsurancePolicyNumberAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function setAllergiesAttribute($value)
    {
        $this->attributes['allergies'] = Crypt::encryptString($value);
    }

    public function getAllergiesAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function setExistingConditionsAttribute($value)
    {
        $this->attributes['existing_conditions'] = Crypt::encryptString($value);
    }

    public function getExistingConditionsAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
