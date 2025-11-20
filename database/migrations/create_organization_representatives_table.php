<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organization_representatives', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->unique();
            $table->string('other_organization_name')->nullable();
            $table->string('filled_by_name');
            $table->string('filled_by_mobile');
            
            // Thiruvananthapuram
            $table->string('thiruvananthapuram_position')->nullable();
            $table->string('thiruvananthapuram_name')->nullable();
            $table->string('thiruvananthapuram_phone')->nullable();
            $table->string('thiruvananthapuram_whatsapp')->nullable();
            
            // Kollam
            $table->string('kollam_position')->nullable();
            $table->string('kollam_name')->nullable();
            $table->string('kollam_phone')->nullable();
            $table->string('kollam_whatsapp')->nullable();
            
            // Pathanamthitta
            $table->string('pathanamthitta_position')->nullable();
            $table->string('pathanamthitta_name')->nullable();
            $table->string('pathanamthitta_phone')->nullable();
            $table->string('pathanamthitta_whatsapp')->nullable();
            
            // Alappuzha
            $table->string('alappuzha_position')->nullable();
            $table->string('alappuzha_name')->nullable();
            $table->string('alappuzha_phone')->nullable();
            $table->string('alappuzha_whatsapp')->nullable();
            
            // Kottayam
            $table->string('kottayam_position')->nullable();
            $table->string('kottayam_name')->nullable();
            $table->string('kottayam_phone')->nullable();
            $table->string('kottayam_whatsapp')->nullable();
            
            // Idukki
            $table->string('idukki_position')->nullable();
            $table->string('idukki_name')->nullable();
            $table->string('idukki_phone')->nullable();
            $table->string('idukki_whatsapp')->nullable();
            
            // Ernakulam
            $table->string('ernakulam_position')->nullable();
            $table->string('ernakulam_name')->nullable();
            $table->string('ernakulam_phone')->nullable();
            $table->string('ernakulam_whatsapp')->nullable();
            
            // Thrissur
            $table->string('thrissur_position')->nullable();
            $table->string('thrissur_name')->nullable();
            $table->string('thrissur_phone')->nullable();
            $table->string('thrissur_whatsapp')->nullable();
            
            // Palakkad
            $table->string('palakkad_position')->nullable();
            $table->string('palakkad_name')->nullable();
            $table->string('palakkad_phone')->nullable();
            $table->string('palakkad_whatsapp')->nullable();
            
            // Malappuram
            $table->string('malappuram_position')->nullable();
            $table->string('malappuram_name')->nullable();
            $table->string('malappuram_phone')->nullable();
            $table->string('malappuram_whatsapp')->nullable();
            
            // Kozhikode
            $table->string('kozhikode_position')->nullable();
            $table->string('kozhikode_name')->nullable();
            $table->string('kozhikode_phone')->nullable();
            $table->string('kozhikode_whatsapp')->nullable();
            
            // Wayanad
            $table->string('wayanad_position')->nullable();
            $table->string('wayanad_name')->nullable();
            $table->string('wayanad_phone')->nullable();
            $table->string('wayanad_whatsapp')->nullable();
            
            // Kannur
            $table->string('kannur_position')->nullable();
            $table->string('kannur_name')->nullable();
            $table->string('kannur_phone')->nullable();
            $table->string('kannur_whatsapp')->nullable();
            
            // Kasaragod
            $table->string('kasaragod_position')->nullable();
            $table->string('kasaragod_name')->nullable();
            $table->string('kasaragod_phone')->nullable();
            $table->string('kasaragod_whatsapp')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_representatives');
    }
};