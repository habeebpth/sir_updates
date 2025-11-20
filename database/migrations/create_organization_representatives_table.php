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
            $table->string('organization_name', 100)->unique();
            $table->string('other_organization_name', 100)->nullable();
            $table->string('filled_by_name', 100);
            $table->string('filled_by_mobile', 15);

            // Thiruvananthapuram
            $table->string('thiruvananthapuram_coordinator1_position', 100)->nullable();
            $table->string('thiruvananthapuram_coordinator1_name', 100)->nullable();
            $table->string('thiruvananthapuram_coordinator1_phone', 15)->nullable();
            $table->string('thiruvananthapuram_coordinator1_whatsapp', 15)->nullable();
            $table->string('thiruvananthapuram_coordinator2_position', 100)->nullable();
            $table->string('thiruvananthapuram_coordinator2_name', 100)->nullable();
            $table->string('thiruvananthapuram_coordinator2_phone', 15)->nullable();
            $table->string('thiruvananthapuram_coordinator2_whatsapp', 15)->nullable();

            // Kollam
            $table->string('kollam_coordinator1_position', 100)->nullable();
            $table->string('kollam_coordinator1_name', 100)->nullable();
            $table->string('kollam_coordinator1_phone', 15)->nullable();
            $table->string('kollam_coordinator1_whatsapp', 15)->nullable();
            $table->string('kollam_coordinator2_position', 100)->nullable();
            $table->string('kollam_coordinator2_name', 100)->nullable();
            $table->string('kollam_coordinator2_phone', 15)->nullable();
            $table->string('kollam_coordinator2_whatsapp', 15)->nullable();

            // Pathanamthitta
            $table->string('pathanamthitta_coordinator1_position', 100)->nullable();
            $table->string('pathanamthitta_coordinator1_name', 100)->nullable();
            $table->string('pathanamthitta_coordinator1_phone', 15)->nullable();
            $table->string('pathanamthitta_coordinator1_whatsapp', 15)->nullable();
            $table->string('pathanamthitta_coordinator2_position', 100)->nullable();
            $table->string('pathanamthitta_coordinator2_name', 100)->nullable();
            $table->string('pathanamthitta_coordinator2_phone', 15)->nullable();
            $table->string('pathanamthitta_coordinator2_whatsapp', 15)->nullable();

            // Alappuzha
            $table->string('alappuzha_coordinator1_position', 100)->nullable();
            $table->string('alappuzha_coordinator1_name', 100)->nullable();
            $table->string('alappuzha_coordinator1_phone', 15)->nullable();
            $table->string('alappuzha_coordinator1_whatsapp', 15)->nullable();
            $table->string('alappuzha_coordinator2_position', 100)->nullable();
            $table->string('alappuzha_coordinator2_name', 100)->nullable();
            $table->string('alappuzha_coordinator2_phone', 15)->nullable();
            $table->string('alappuzha_coordinator2_whatsapp', 15)->nullable();

            // Kottayam
            $table->string('kottayam_coordinator1_position', 100)->nullable();
            $table->string('kottayam_coordinator1_name', 100)->nullable();
            $table->string('kottayam_coordinator1_phone', 15)->nullable();
            $table->string('kottayam_coordinator1_whatsapp', 15)->nullable();
            $table->string('kottayam_coordinator2_position', 100)->nullable();
            $table->string('kottayam_coordinator2_name', 100)->nullable();
            $table->string('kottayam_coordinator2_phone', 15)->nullable();
            $table->string('kottayam_coordinator2_whatsapp', 15)->nullable();

            // Idukki
            $table->string('idukki_coordinator1_position', 100)->nullable();
            $table->string('idukki_coordinator1_name', 100)->nullable();
            $table->string('idukki_coordinator1_phone', 15)->nullable();
            $table->string('idukki_coordinator1_whatsapp', 15)->nullable();
            $table->string('idukki_coordinator2_position', 100)->nullable();
            $table->string('idukki_coordinator2_name', 100)->nullable();
            $table->string('idukki_coordinator2_phone', 15)->nullable();
            $table->string('idukki_coordinator2_whatsapp', 15)->nullable();

            // Ernakulam
            $table->string('ernakulam_coordinator1_position', 100)->nullable();
            $table->string('ernakulam_coordinator1_name', 100)->nullable();
            $table->string('ernakulam_coordinator1_phone', 15)->nullable();
            $table->string('ernakulam_coordinator1_whatsapp', 15)->nullable();
            $table->string('ernakulam_coordinator2_position', 100)->nullable();
            $table->string('ernakulam_coordinator2_name', 100)->nullable();
            $table->string('ernakulam_coordinator2_phone', 15)->nullable();
            $table->string('ernakulam_coordinator2_whatsapp', 15)->nullable();

            // Thrissur
            $table->string('thrissur_coordinator1_position', 100)->nullable();
            $table->string('thrissur_coordinator1_name', 100)->nullable();
            $table->string('thrissur_coordinator1_phone', 15)->nullable();
            $table->string('thrissur_coordinator1_whatsapp', 15)->nullable();
            $table->string('thrissur_coordinator2_position', 100)->nullable();
            $table->string('thrissur_coordinator2_name', 100)->nullable();
            $table->string('thrissur_coordinator2_phone', 15)->nullable();
            $table->string('thrissur_coordinator2_whatsapp', 15)->nullable();

            // Palakkad
            $table->string('palakkad_coordinator1_position', 100)->nullable();
            $table->string('palakkad_coordinator1_name', 100)->nullable();
            $table->string('palakkad_coordinator1_phone', 15)->nullable();
            $table->string('palakkad_coordinator1_whatsapp', 15)->nullable();
            $table->string('palakkad_coordinator2_position', 100)->nullable();
            $table->string('palakkad_coordinator2_name', 100)->nullable();
            $table->string('palakkad_coordinator2_phone', 15)->nullable();
            $table->string('palakkad_coordinator2_whatsapp', 15)->nullable();

            // Malappuram
            $table->string('malappuram_coordinator1_position', 100)->nullable();
            $table->string('malappuram_coordinator1_name', 100)->nullable();
            $table->string('malappuram_coordinator1_phone', 15)->nullable();
            $table->string('malappuram_coordinator1_whatsapp', 15)->nullable();
            $table->string('malappuram_coordinator2_position', 100)->nullable();
            $table->string('malappuram_coordinator2_name', 100)->nullable();
            $table->string('malappuram_coordinator2_phone', 15)->nullable();
            $table->string('malappuram_coordinator2_whatsapp', 15)->nullable();

            // Kozhikode
            $table->string('kozhikode_coordinator1_position', 100)->nullable();
            $table->string('kozhikode_coordinator1_name', 100)->nullable();
            $table->string('kozhikode_coordinator1_phone', 15)->nullable();
            $table->string('kozhikode_coordinator1_whatsapp', 15)->nullable();
            $table->string('kozhikode_coordinator2_position', 100)->nullable();
            $table->string('kozhikode_coordinator2_name', 100)->nullable();
            $table->string('kozhikode_coordinator2_phone', 15)->nullable();
            $table->string('kozhikode_coordinator2_whatsapp', 15)->nullable();

            // Wayanad
            $table->string('wayanad_coordinator1_position', 100)->nullable();
            $table->string('wayanad_coordinator1_name', 100)->nullable();
            $table->string('wayanad_coordinator1_phone', 15)->nullable();
            $table->string('wayanad_coordinator1_whatsapp', 15)->nullable();
            $table->string('wayanad_coordinator2_position', 100)->nullable();
            $table->string('wayanad_coordinator2_name', 100)->nullable();
            $table->string('wayanad_coordinator2_phone', 15)->nullable();
            $table->string('wayanad_coordinator2_whatsapp', 15)->nullable();

            // Kannur
            $table->string('kannur_coordinator1_position', 100)->nullable();
            $table->string('kannur_coordinator1_name', 100)->nullable();
            $table->string('kannur_coordinator1_phone', 15)->nullable();
            $table->string('kannur_coordinator1_whatsapp', 15)->nullable();
            $table->string('kannur_coordinator2_position', 100)->nullable();
            $table->string('kannur_coordinator2_name', 100)->nullable();
            $table->string('kannur_coordinator2_phone', 15)->nullable();
            $table->string('kannur_coordinator2_whatsapp', 15)->nullable();

            // Kasaragod
            $table->string('kasaragod_coordinator1_position', 100)->nullable();
            $table->string('kasaragod_coordinator1_name', 100)->nullable();
            $table->string('kasaragod_coordinator1_phone', 15)->nullable();
            $table->string('kasaragod_coordinator1_whatsapp', 15)->nullable();
            $table->string('kasaragod_coordinator2_position', 100)->nullable();
            $table->string('kasaragod_coordinator2_name', 100)->nullable();
            $table->string('kasaragod_coordinator2_phone', 15)->nullable();
            $table->string('kasaragod_coordinator2_whatsapp', 15)->nullable();

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
