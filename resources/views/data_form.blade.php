<!DOCTYPE html>
<html lang="ml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ഡാറ്റ ശേഖരണം</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .form-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .form-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .required {
            color: #e53e3e;
            margin-left: 2px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            font-size: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
            background-color: #f7fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .district-section {
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .district-section:hover {
            border-color: #cbd5e0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .district-header {
            font-size: 18px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .input-wrapper {
            display: flex;
            flex-direction: column;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .checkbox-wrapper label {
            font-size: 13px;
            color: #4a5568;
            cursor: pointer;
            margin: 0;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: #c6f6d5;
            color: #22543d;
            border-left: 4px solid #38a169;
        }

        .alert-error {
            background-color: #fed7d7;
            color: #742a2a;
            border-left: 4px solid #e53e3e;
        }

        .error-message {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .form-footer {
            text-align: center;
            padding: 20px;
            background-color: #f7fafc;
            color: #718096;
            font-size: 13px;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 10px;
            color: #667eea;
            font-weight: 600;
        }

        .loading.active {
            display: block;
        }

        @media (max-width: 968px) {
            .input-group {
                grid-template-columns: 1fr;
            }

            .form-body {
                padding: 30px 20px;
            }

            .district-section {
                padding: 20px 15px;
            }

            .form-header h1 {
                font-size: 24px;
            }

            .form-header h2 {
                font-size: 18px !important;
            }

            /* Form filler responsive */
            div[style*="grid-template-columns: 1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
        }

        @media (min-width: 969px) and (max-width: 1200px) {
            .input-group {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <div class="form-header">
                <h1 style="margin-bottom: 5px;">SIR Watch Kerala</h1>
                <h2 id="mainHeading" style="font-size: 22px; font-weight: 500; margin-bottom: 8px;">ജില്ലാ പ്രതിനിധി ടീം</h2>
                <p>ഓരോ ജില്ലകളിലെയും പ്രതിനിധികളുടെ വിവരങ്ങൾ സംസ്ഥാന പ്രതിനിധി പൂരിപ്പിക്കുക</p>
            </div>

            <div class="form-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('organization-representative.store') }}" method="POST" id="representativeForm">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="organization_name">
                            സംഘടനയുടെ പേര് <span class="required">*</span>
                        </label>
                        <select
                            class="form-control @error('organization_name') is-invalid @enderror"
                            id="organization_name"
                            name="organization_name"
                            required
                        >
                            <option value="">സംഘടന തിരഞ്ഞെടുക്കുക</option>
                            <option value="Indian Union Muslim League (IUML)" {{ old('organization_name') == 'Indian Union Muslim League (IUML)' ? 'selected' : '' }}>Indian Union Muslim League (IUML)</option>
                            <option value="Samastha Kerala Jami-iyyatul Ulama (EK)" {{ old('organization_name') == 'Samastha Kerala Jami-iyyatul Ulama (EK)' ? 'selected' : '' }}>Samastha Kerala Jami-iyyatul Ulama (EK)</option>
                            <option value="Samastha Kerala Jami-iyyatul Ulama (AP)" {{ old('organization_name') == 'Samastha Kerala Jami-iyyatul Ulama (AP)' ? 'selected' : '' }}>Samastha Kerala Jami-iyyatul Ulama (AP)</option>
                            <option value="Dakshina Kerala Jami-iyyatul Ulama" {{ old('organization_name') == 'Dakshina Kerala Jami-iyyatul Ulama' ? 'selected' : '' }}>Dakshina Kerala Jami-iyyatul Ulama</option>
                            <option value="KNM Kerala Nadvathul Mujahideen" {{ old('organization_name') == 'KNM Kerala Nadvathul Mujahideen' ? 'selected' : '' }}>KNM Kerala Nadvathul Mujahideen</option>
                            <option value="Wisdom Islamic Organisation" {{ old('organization_name') == 'Wisdom Islamic Organisation' ? 'selected' : '' }}>Wisdom Islamic Organisation</option>
                            <option value="KNM Markazudawa" {{ old('organization_name') == 'KNM Markazudawa' ? 'selected' : '' }}>KNM Markazudawa</option>
                            <option value="Jamaat-e-Islami Hind (Kerala)" {{ old('organization_name') == 'Jamaat-e-Islami Hind (Kerala)' ? 'selected' : '' }}>Jamaat-e-Islami Hind (Kerala)</option>
                            <option value="Samasthana Kerala Jami-iyyatul Ulama" {{ old('organization_name') == 'Samasthana Kerala Jami-iyyatul Ulama' ? 'selected' : '' }}>Samasthana Kerala Jami-iyyatul Ulama</option>
                            <option value="Muslim Educational Society (MES)" {{ old('organization_name') == 'Muslim Educational Society (MES)' ? 'selected' : '' }}>Muslim Educational Society (MES)</option>
                            <option value="Muslim Service Society (MSS)" {{ old('organization_name') == 'Muslim Service Society (MSS)' ? 'selected' : '' }}>Muslim Service Society (MSS)</option>
                            <option value="Others" {{ old('organization_name') == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                        @error('organization_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="otherOrganizationGroup" style="display: none;">
                        <label class="form-label" for="other_organization_name">
                            മറ്റ് സംഘടനയുടെ പേര് <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="other_organization_name"
                            name="other_organization_name"
                            value="{{ old('other_organization_name') }}"
                            placeholder="സംഘടനയുടെ പേര് നൽകുക"
                        >
                    </div>

                    <div style="background: #f0f4ff; border: 2px solid #667eea; border-radius: 12px; padding: 25px; margin-bottom: 30px;">
                        <h3 style="color: #667eea; margin-bottom: 20px; font-size: 18px; font-weight: 600;">ഫോം പൂരിപ്പിക്കുന്ന ആളുടെ വിവരങ്ങൾ</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label" for="filled_by_name">
                                    ഫോം പൂരിപ്പിക്കുന്ന ആളുടെ പേര് <span class="required">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('filled_by_name') is-invalid @enderror"
                                    id="filled_by_name"
                                    name="filled_by_name"
                                    value="{{ old('filled_by_name') }}"
                                    placeholder="പേര് നൽകുക"
                                    required
                                >
                                @error('filled_by_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label" for="filled_by_mobile">
                                    മൊബൈൽ <span class="required">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('filled_by_mobile') is-invalid @enderror"
                                    id="filled_by_mobile"
                                    name="filled_by_mobile"
                                    value="{{ old('filled_by_mobile') }}"
                                    placeholder="മൊബൈൽ നമ്പർ നൽകുക"
                                    pattern="[0-9]{10}"
                                    title="ദയവായി 10 അക്കത്തിലുള്ള മൊബൈൽ നമ്പർ നൽകുക"
                                    required
                                >
                                @error('filled_by_mobile')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="loading" id="loadingMessage">
                        ഡാറ്റ ലോഡ് ചെയ്യുന്നു...
                    </div>

                    @foreach($districts as $districtKey => $districtName)
                    <div class="district-section">
                        <div class="district-header">{{ ucfirst($districtKey) }}</div>

                        <!-- Coordinator 1 -->
                        <div style="background: #fff; padding: 15px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #667eea;">
                            <h4 style="color: #667eea; font-size: 15px; font-weight: 600; margin-bottom: 15px;">Coordinator 1</h4>
                            <div class="input-group">
                                <div class="input-wrapper">
                                    <label class="form-label">സംഘടനയിലെ ഭാരവാഹിത്വം</label>
                                    <input
                                        type="text"
                                        class="form-control district-input"
                                        name="{{ $districtKey }}_coordinator1_position"
                                        id="{{ $districtKey }}_coordinator1_position"
                                        value="{{ old($districtKey . '_coordinator1_position') }}"
                                        placeholder="ഭാരവാഹിത്വം നൽകുക"
                                    >
                                </div>
                                <div class="input-wrapper">
                                    <label class="form-label">പേര്</label>
                                    <input
                                        type="text"
                                        class="form-control district-input"
                                        name="{{ $districtKey }}_coordinator1_name"
                                        id="{{ $districtKey }}_coordinator1_name"
                                        value="{{ old($districtKey . '_coordinator1_name') }}"
                                        placeholder="പേര് നൽകുക"
                                    >
                                </div>
                                <div class="input-wrapper">
                                    <label class="form-label">മൊബൈൽ</label>
                                    <input
                                        type="text"
                                        class="form-control district-input mobile-input"
                                        name="{{ $districtKey }}_coordinator1_phone"
                                        id="{{ $districtKey }}_coordinator1_phone"
                                        value="{{ old($districtKey . '_coordinator1_phone') }}"
                                        placeholder="മൊബൈൽ നമ്പർ നൽകുക"
                                        pattern="[0-9]{10}"
                                        title="ദയവായി 10 അക്കത്തിലുള്ള മൊബൈൽ നമ്പർ നൽകുക"
                                        data-district="{{ $districtKey }}"
                                        data-coordinator="1"
                                    >
                                </div>
                                <div class="input-wrapper">
                                    <label class="form-label">WhatsApp നമ്പർ</label>
                                    <input
                                        type="text"
                                        class="form-control district-input whatsapp-input"
                                        name="{{ $districtKey }}_coordinator1_whatsapp"
                                        id="{{ $districtKey }}_coordinator1_whatsapp"
                                        value="{{ old($districtKey . '_coordinator1_whatsapp') }}"
                                        placeholder="WhatsApp നമ്പർ നൽകുക"
                                        pattern="[0-9]{10}"
                                        title="ദയവായി 10 അക്കത്തിലുള്ള WhatsApp നമ്പർ നൽകുക"
                                        data-district="{{ $districtKey }}"
                                        data-coordinator="1"
                                    >
                                    <div class="checkbox-wrapper">
                                        <input
                                            type="checkbox"
                                            id="{{ $districtKey }}_coordinator1_same_as_mobile"
                                            class="same-as-mobile-checkbox"
                                            data-district="{{ $districtKey }}"
                                            data-coordinator="1"
                                            checked
                                        >
                                        <label for="{{ $districtKey }}_coordinator1_same_as_mobile">Same as mobile</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Coordinator 2 -->
                        <div style="background: #fff; padding: 15px; border-radius: 8px; border-left: 4px solid #764ba2;">
                            <h4 style="color: #764ba2; font-size: 15px; font-weight: 600; margin-bottom: 15px;">Coordinator 2</h4>
                            <div class="input-group">
                                <div class="input-wrapper">
                                    <label class="form-label">സംഘടനയിലെ ഭാരവാഹിത്വം</label>
                                    <input
                                        type="text"
                                        class="form-control district-input"
                                        name="{{ $districtKey }}_coordinator2_position"
                                        id="{{ $districtKey }}_coordinator2_position"
                                        value="{{ old($districtKey . '_coordinator2_position') }}"
                                        placeholder="ഭാരവാഹിത്വം നൽകുക"
                                    >
                                </div>
                                <div class="input-wrapper">
                                    <label class="form-label">പേര്</label>
                                    <input
                                        type="text"
                                        class="form-control district-input"
                                        name="{{ $districtKey }}_coordinator2_name"
                                        id="{{ $districtKey }}_coordinator2_name"
                                        value="{{ old($districtKey . '_coordinator2_name') }}"
                                        placeholder="പേര് നൽകുക"
                                    >
                                </div>
                                <div class="input-wrapper">
                                    <label class="form-label">മൊബൈൽ</label>
                                    <input
                                        type="text"
                                        class="form-control district-input mobile-input"
                                        name="{{ $districtKey }}_coordinator2_phone"
                                        id="{{ $districtKey }}_coordinator2_phone"
                                        value="{{ old($districtKey . '_coordinator2_phone') }}"
                                        placeholder="മൊബൈൽ നമ്പർ നൽകുക"
                                        pattern="[0-9]{10}"
                                        title="ദയവായി 10 അക്കത്തിലുള്ള മൊബൈൽ നമ്പർ നൽകുക"
                                        data-district="{{ $districtKey }}"
                                        data-coordinator="2"
                                    >
                                </div>
                                <div class="input-wrapper">
                                    <label class="form-label">WhatsApp നമ്പർ</label>
                                    <input
                                        type="text"
                                        class="form-control district-input whatsapp-input"
                                        name="{{ $districtKey }}_coordinator2_whatsapp"
                                        id="{{ $districtKey }}_coordinator2_whatsapp"
                                        value="{{ old($districtKey . '_coordinator2_whatsapp') }}"
                                        placeholder="WhatsApp നമ്പർ നൽകുക"
                                        pattern="[0-9]{10}"
                                        title="ദയവായി 10 അക്കത്തിലുള്ള WhatsApp നമ്പർ നൽകുക"
                                        data-district="{{ $districtKey }}"
                                        data-coordinator="2"
                                    >
                                    <div class="checkbox-wrapper">
                                        <input
                                            type="checkbox"
                                            id="{{ $districtKey }}_coordinator2_same_as_mobile"
                                            class="same-as-mobile-checkbox"
                                            data-district="{{ $districtKey }}"
                                            data-coordinator="2"
                                            checked
                                        >
                                        <label for="{{ $districtKey }}_coordinator2_same_as_mobile">Same as mobile</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <button type="submit" class="submit-btn">
                        സമർപ്പിക്കുക
                    </button>
                </form>
            </div>

            <div class="form-footer">
                സംഘടനയുടെ പേര് തിരഞ്ഞെടുക്കുമ്പോൾ മുമ്പ് നൽകിയ ഡാറ്റ യാന്ത്രികമായി ലോഡ് ചെയ്യപ്പെടും
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const organizationSelect = document.getElementById('organization_name');
            const otherOrganizationGroup = document.getElementById('otherOrganizationGroup');
            const otherOrganizationInput = document.getElementById('other_organization_name');
            const mainHeading = document.getElementById('mainHeading');
            const loadingMessage = document.getElementById('loadingMessage');
            const districtInputs = document.querySelectorAll('.district-input');

            // Handle same as mobile checkboxes
            const sameAsMobileCheckboxes = document.querySelectorAll('.same-as-mobile-checkbox');

            sameAsMobileCheckboxes.forEach(checkbox => {
                const district = checkbox.dataset.district;
                const coordinator = checkbox.dataset.coordinator;
                const mobileInput = document.getElementById(`${district}_coordinator${coordinator}_phone`);
                const whatsappInput = document.getElementById(`${district}_coordinator${coordinator}_whatsapp`);

                // Initialize - copy mobile to whatsapp on load if checkbox is checked
                if (checkbox.checked && mobileInput.value) {
                    whatsappInput.value = mobileInput.value;
                    whatsappInput.readOnly = true;
                    whatsappInput.style.backgroundColor = '#e2e8f0';
                }

                // Handle checkbox change
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        whatsappInput.value = mobileInput.value;
                        whatsappInput.readOnly = true;
                        whatsappInput.style.backgroundColor = '#e2e8f0';
                    } else {
                        whatsappInput.readOnly = false;
                        whatsappInput.style.backgroundColor = '#f7fafc';
                    }
                });

                // Handle mobile input change - auto update whatsapp if checkbox is checked
                mobileInput.addEventListener('input', function() {
                    if (checkbox.checked) {
                        whatsappInput.value = this.value;
                    }
                });
            });

            // Handle "Others" option
            organizationSelect.addEventListener('change', function() {
                const selectedValue = this.value;

                if (selectedValue === 'Others') {
                    otherOrganizationGroup.style.display = 'block';
                    otherOrganizationInput.required = true;
                    // Update heading with "Others"
                    mainHeading.textContent = 'Others - ജില്ലാ പ്രതിനിധി ടീം';
                } else {
                    otherOrganizationGroup.style.display = 'none';
                    otherOrganizationInput.required = false;
                    otherOrganizationInput.value = '';

                    // Update heading with selected organization name
                    if (selectedValue) {
                        mainHeading.textContent = selectedValue + ' - ജില്ലാ പ്രതിനിധി ടീം';
                    } else {
                        mainHeading.textContent = 'ജില്ലാ പ്രതിനിധി ടീം';
                    }
                }

                // Auto-populate logic
                if (!selectedValue || selectedValue === 'Others') {
                    // Clear all fields
                    districtInputs.forEach(input => {
                        input.value = '';
                    });
                    return;
                }

                // Show loading message
                loadingMessage.classList.add('active');

                // Fetch organization data
                fetch(`/api/organization-representative/${encodeURIComponent(selectedValue)}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    loadingMessage.classList.remove('active');

                    if (data.success && data.data) {
                        // Populate all district fields
                        const districts = [
                            'thiruvananthapuram', 'kollam', 'pathanamthitta', 'alappuzha',
                            'kottayam', 'idukki', 'ernakulam', 'thrissur', 'palakkad',
                            'malappuram', 'kozhikode', 'wayanad', 'kannur', 'kasaragod'
                        ];

                        districts.forEach(district => {
                            // Coordinator 1
                            const c1_positionInput = document.getElementById(`${district}_coordinator1_position`);
                            const c1_nameInput = document.getElementById(`${district}_coordinator1_name`);
                            const c1_phoneInput = document.getElementById(`${district}_coordinator1_phone`);
                            const c1_whatsappInput = document.getElementById(`${district}_coordinator1_whatsapp`);
                            const c1_sameAsMobileCheckbox = document.getElementById(`${district}_coordinator1_same_as_mobile`);

                            if (c1_positionInput && data.data[`${district}_coordinator1_position`]) {
                                c1_positionInput.value = data.data[`${district}_coordinator1_position`];
                            }
                            if (c1_nameInput && data.data[`${district}_coordinator1_name`]) {
                                c1_nameInput.value = data.data[`${district}_coordinator1_name`];
                            }
                            if (c1_phoneInput && data.data[`${district}_coordinator1_phone`]) {
                                c1_phoneInput.value = data.data[`${district}_coordinator1_phone`];
                            }
                            if (c1_whatsappInput && data.data[`${district}_coordinator1_whatsapp`]) {
                                c1_whatsappInput.value = data.data[`${district}_coordinator1_whatsapp`];
                                if (data.data[`${district}_coordinator1_whatsapp`] !== data.data[`${district}_coordinator1_phone`]) {
                                    c1_sameAsMobileCheckbox.checked = false;
                                    c1_whatsappInput.readOnly = false;
                                    c1_whatsappInput.style.backgroundColor = '#f7fafc';
                                }
                            }

                            // Coordinator 2
                            const c2_positionInput = document.getElementById(`${district}_coordinator2_position`);
                            const c2_nameInput = document.getElementById(`${district}_coordinator2_name`);
                            const c2_phoneInput = document.getElementById(`${district}_coordinator2_phone`);
                            const c2_whatsappInput = document.getElementById(`${district}_coordinator2_whatsapp`);
                            const c2_sameAsMobileCheckbox = document.getElementById(`${district}_coordinator2_same_as_mobile`);

                            if (c2_positionInput && data.data[`${district}_coordinator2_position`]) {
                                c2_positionInput.value = data.data[`${district}_coordinator2_position`];
                            }
                            if (c2_nameInput && data.data[`${district}_coordinator2_name`]) {
                                c2_nameInput.value = data.data[`${district}_coordinator2_name`];
                            }
                            if (c2_phoneInput && data.data[`${district}_coordinator2_phone`]) {
                                c2_phoneInput.value = data.data[`${district}_coordinator2_phone`];
                            }
                            if (c2_whatsappInput && data.data[`${district}_coordinator2_whatsapp`]) {
                                c2_whatsappInput.value = data.data[`${district}_coordinator2_whatsapp`];
                                if (data.data[`${district}_coordinator2_whatsapp`] !== data.data[`${district}_coordinator2_phone`]) {
                                    c2_sameAsMobileCheckbox.checked = false;
                                    c2_whatsappInput.readOnly = false;
                                    c2_whatsappInput.style.backgroundColor = '#f7fafc';
                                }
                            }
                        });
                    } else {
                        // Clear all fields if no data found
                        districtInputs.forEach(input => {
                            input.value = '';
                        });
                    }
                })
                .catch(error => {
                    loadingMessage.classList.remove('active');
                    console.error('Error fetching data:', error);
                    // Clear all fields on error
                    districtInputs.forEach(input => {
                        input.value = '';
                    });
                });
            });

            // Update heading when typing in "Other" organization field
            otherOrganizationInput.addEventListener('input', function() {
                if (this.value.trim()) {
                    mainHeading.textContent = this.value.trim() + ' - ജില്ലാ പ്രതിനിധി ടീം';
                } else {
                    mainHeading.textContent = 'Others - ജില്ലാ പ്രതിനിധി ടീം';
                }
            });
        });
    </script>
</body>
</html>
