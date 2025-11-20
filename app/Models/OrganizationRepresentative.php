<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationRepresentative extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'other_organization_name',
        'filled_by_name',
        'filled_by_mobile',
        'thiruvananthapuram_position',
        'thiruvananthapuram_name',
        'thiruvananthapuram_phone',
        'thiruvananthapuram_whatsapp',
        'kollam_position',
        'kollam_name',
        'kollam_phone',
        'kollam_whatsapp',
        'pathanamthitta_position',
        'pathanamthitta_name',
        'pathanamthitta_phone',
        'pathanamthitta_whatsapp',
        'alappuzha_position',
        'alappuzha_name',
        'alappuzha_phone',
        'alappuzha_whatsapp',
        'kottayam_position',
        'kottayam_name',
        'kottayam_phone',
        'kottayam_whatsapp',
        'idukki_position',
        'idukki_name',
        'idukki_phone',
        'idukki_whatsapp',
        'ernakulam_position',
        'ernakulam_name',
        'ernakulam_phone',
        'ernakulam_whatsapp',
        'thrissur_position',
        'thrissur_name',
        'thrissur_phone',
        'thrissur_whatsapp',
        'palakkad_position',
        'palakkad_name',
        'palakkad_phone',
        'palakkad_whatsapp',
        'malappuram_position',
        'malappuram_name',
        'malappuram_phone',
        'malappuram_whatsapp',
        'kozhikode_position',
        'kozhikode_name',
        'kozhikode_phone',
        'kozhikode_whatsapp',
        'wayanad_position',
        'wayanad_name',
        'wayanad_phone',
        'wayanad_whatsapp',
        'kannur_position',
        'kannur_name',
        'kannur_phone',
        'kannur_whatsapp',
        'kasaragod_position',
        'kasaragod_name',
        'kasaragod_phone',
        'kasaragod_whatsapp',
    ];
}