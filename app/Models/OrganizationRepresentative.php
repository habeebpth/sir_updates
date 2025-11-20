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
        // Thiruvananthapuram
        'thiruvananthapuram_coordinator1_position',
        'thiruvananthapuram_coordinator1_name',
        'thiruvananthapuram_coordinator1_phone',
        'thiruvananthapuram_coordinator1_whatsapp',
        'thiruvananthapuram_coordinator2_position',
        'thiruvananthapuram_coordinator2_name',
        'thiruvananthapuram_coordinator2_phone',
        'thiruvananthapuram_coordinator2_whatsapp',
        // Kollam
        'kollam_coordinator1_position',
        'kollam_coordinator1_name',
        'kollam_coordinator1_phone',
        'kollam_coordinator1_whatsapp',
        'kollam_coordinator2_position',
        'kollam_coordinator2_name',
        'kollam_coordinator2_phone',
        'kollam_coordinator2_whatsapp',
        // Pathanamthitta
        'pathanamthitta_coordinator1_position',
        'pathanamthitta_coordinator1_name',
        'pathanamthitta_coordinator1_phone',
        'pathanamthitta_coordinator1_whatsapp',
        'pathanamthitta_coordinator2_position',
        'pathanamthitta_coordinator2_name',
        'pathanamthitta_coordinator2_phone',
        'pathanamthitta_coordinator2_whatsapp',
        // Alappuzha
        'alappuzha_coordinator1_position',
        'alappuzha_coordinator1_name',
        'alappuzha_coordinator1_phone',
        'alappuzha_coordinator1_whatsapp',
        'alappuzha_coordinator2_position',
        'alappuzha_coordinator2_name',
        'alappuzha_coordinator2_phone',
        'alappuzha_coordinator2_whatsapp',
        // Kottayam
        'kottayam_coordinator1_position',
        'kottayam_coordinator1_name',
        'kottayam_coordinator1_phone',
        'kottayam_coordinator1_whatsapp',
        'kottayam_coordinator2_position',
        'kottayam_coordinator2_name',
        'kottayam_coordinator2_phone',
        'kottayam_coordinator2_whatsapp',
        // Idukki
        'idukki_coordinator1_position',
        'idukki_coordinator1_name',
        'idukki_coordinator1_phone',
        'idukki_coordinator1_whatsapp',
        'idukki_coordinator2_position',
        'idukki_coordinator2_name',
        'idukki_coordinator2_phone',
        'idukki_coordinator2_whatsapp',
        // Ernakulam
        'ernakulam_coordinator1_position',
        'ernakulam_coordinator1_name',
        'ernakulam_coordinator1_phone',
        'ernakulam_coordinator1_whatsapp',
        'ernakulam_coordinator2_position',
        'ernakulam_coordinator2_name',
        'ernakulam_coordinator2_phone',
        'ernakulam_coordinator2_whatsapp',
        // Thrissur
        'thrissur_coordinator1_position',
        'thrissur_coordinator1_name',
        'thrissur_coordinator1_phone',
        'thrissur_coordinator1_whatsapp',
        'thrissur_coordinator2_position',
        'thrissur_coordinator2_name',
        'thrissur_coordinator2_phone',
        'thrissur_coordinator2_whatsapp',
        // Palakkad
        'palakkad_coordinator1_position',
        'palakkad_coordinator1_name',
        'palakkad_coordinator1_phone',
        'palakkad_coordinator1_whatsapp',
        'palakkad_coordinator2_position',
        'palakkad_coordinator2_name',
        'palakkad_coordinator2_phone',
        'palakkad_coordinator2_whatsapp',
        // Malappuram
        'malappuram_coordinator1_position',
        'malappuram_coordinator1_name',
        'malappuram_coordinator1_phone',
        'malappuram_coordinator1_whatsapp',
        'malappuram_coordinator2_position',
        'malappuram_coordinator2_name',
        'malappuram_coordinator2_phone',
        'malappuram_coordinator2_whatsapp',
        // Kozhikode
        'kozhikode_coordinator1_position',
        'kozhikode_coordinator1_name',
        'kozhikode_coordinator1_phone',
        'kozhikode_coordinator1_whatsapp',
        'kozhikode_coordinator2_position',
        'kozhikode_coordinator2_name',
        'kozhikode_coordinator2_phone',
        'kozhikode_coordinator2_whatsapp',
        // Wayanad
        'wayanad_coordinator1_position',
        'wayanad_coordinator1_name',
        'wayanad_coordinator1_phone',
        'wayanad_coordinator1_whatsapp',
        'wayanad_coordinator2_position',
        'wayanad_coordinator2_name',
        'wayanad_coordinator2_phone',
        'wayanad_coordinator2_whatsapp',
        // Kannur
        'kannur_coordinator1_position',
        'kannur_coordinator1_name',
        'kannur_coordinator1_phone',
        'kannur_coordinator1_whatsapp',
        'kannur_coordinator2_position',
        'kannur_coordinator2_name',
        'kannur_coordinator2_phone',
        'kannur_coordinator2_whatsapp',
        // Kasaragod
        'kasaragod_coordinator1_position',
        'kasaragod_coordinator1_name',
        'kasaragod_coordinator1_phone',
        'kasaragod_coordinator1_whatsapp',
        'kasaragod_coordinator2_position',
        'kasaragod_coordinator2_name',
        'kasaragod_coordinator2_phone',
        'kasaragod_coordinator2_whatsapp',
    ];
}
