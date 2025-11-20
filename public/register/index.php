<!DOCTYPE html>
<html lang="ml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>സംഘടന കോർഡിനേറ്റർ രജിസ്ട്രേഷൻ</title>
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
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #764ba2;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .org-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 16px;
        }

        input[type="text"],
        input[type="tel"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="tel"]:focus {
            outline: none;
            border-color: #667eea;
        }

        .district-section {
            margin-bottom: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .district-title {
            font-size: 18px;
            font-weight: bold;
            color: #764ba2;
            margin-bottom: 15px;
        }

        .coordinator-entry {
            margin-bottom: 15px;
        }

        .coordinator-entry input {
            margin-bottom: 10px;
        }

        .coordinator-entry input:last-child {
            margin-bottom: 0;
        }

        .submit-section {
            text-align: center;
            margin-top: 30px;
        }

        .submit-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #764ba2;
        }

        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>സംഘടന കോർഡിനേറ്റർ രജിസ്ട്രേഷൻ</h1>
        
        <div id="messageBox"></div>
        
        <div class="org-section">
            <div class="form-group">
                <label for="orgName">സംഘടനയുടെ പേര്</label>
                <input type="text" id="orgName" placeholder="സംഘടനയുടെ പേര് നൽകുക">
            </div>
        </div>

        <div id="districtsContainer"></div>

        <div class="submit-section">
            <button class="submit-btn" onclick="submitForm()" id="submitBtn">സമർപ്പിക്കുക</button>
        </div>
    </div>

    <script>
        const districts = [
            'തിരുവനന്തപുരം',
            'കൊല്ലം',
            'പത്തനംതിട്ട',
            'ആലപ്പുഴ',
            'കോട്ടയം',
            'ഇടുക്കി',
            'എറണാകുളം',
            'തൃശ്ശൂർ',
            'പാലക്കാട്',
            'മലപ്പുറം',
            'കോഴിക്കോട്',
            'വയനാട്',
            'കണ്ണൂർ',
            'കാസർഗോഡ്'
        ];

        function initializeDistricts() {
            const container = document.getElementById('districtsContainer');
            
            districts.forEach((district, index) => {
                const districtDiv = document.createElement('div');
                districtDiv.className = 'district-section';
                districtDiv.id = `district-${index}`;
                
                districtDiv.innerHTML = `
                    <div class="district-title">${district}</div>
                    <div id="coordinators-${index}"></div>
                `;
                
                container.appendChild(districtDiv);
                
                addCoordinator(index, district);
            });
        }

        function addCoordinator(districtIndex, districtName) {
            const coordinatorsDiv = document.getElementById(`coordinators-${districtIndex}`);
            const coordinatorId = Date.now();
            
            const coordinatorEntry = document.createElement('div');
            coordinatorEntry.id = `coordinator-${coordinatorId}`;
            
            coordinatorEntry.innerHTML = `
                <div class="coordinator-entry">
                    <input type="text" placeholder="കോർഡിനേറ്ററുടെ പേര്" class="coord-name" data-district="${districtName}">
                    <input type="tel" placeholder="മൊബൈൽ നമ്പർ" class="coord-mobile" pattern="[0-9]{10}" data-district="${districtName}">
                </div>
            `;
            
            coordinatorsDiv.appendChild(coordinatorEntry);
        }

        function showMessage(message, type) {
            const messageBox = document.getElementById('messageBox');
            messageBox.innerHTML = `<div class="message ${type}">${message}</div>`;
            setTimeout(() => {
                messageBox.innerHTML = '';
            }, 5000);
        }

        async function submitForm() {
            const orgName = document.getElementById('orgName').value.trim();
            
            if (!orgName) {
                showMessage('ദയവായി സംഘടനയുടെ പേര് നൽകുക', 'error');
                return;
            }

            const data = {
                organizationName: orgName,
                districts: {}
            };

            districts.forEach(district => {
                const coordNames = document.querySelectorAll(`.coord-name[data-district="${district}"]`);
                const coordMobiles = document.querySelectorAll(`.coord-mobile[data-district="${district}"]`);
                
                data.districts[district] = [];
                
                coordNames.forEach((nameInput, index) => {
                    const name = nameInput.value.trim();
                    const mobile = coordMobiles[index].value.trim();
                    
                    if (name && mobile) {
                        data.districts[district].push({
                            name: name,
                            mobile: mobile
                        });
                    }
                });
            });

            // Disable submit button
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'സേവ് ചെയ്യുന്നു...';

            try {
                const response = await fetch('submit.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (result.success) {
                    showMessage('വിവരങ്ങൾ വിജയകരമായി സേവ് ചെയ്തു! സംഘടന ID: ' + result.organizationId + ', കോർഡിനേറ്റർമാർ: ' + result.coordinatorCount, 'success');
                    
                    // Clear form
                    document.getElementById('orgName').value = '';
                    document.querySelectorAll('input[type="text"], input[type="tel"]').forEach(input => {
                        if (input.id !== 'orgName') input.value = '';
                    });
                } else {
                    showMessage('പിശക്: ' + result.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('സെർവറുമായി ബന്ധപ്പെടാൻ കഴിഞ്ഞില്ല', 'error');
            } finally {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.textContent = 'സമർപ്പിക്കുക';
            }
        }

        // Initialize the form when page loads
        window.onload = initializeDistricts;
    </script>
</body>
</html>
