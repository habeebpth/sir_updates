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
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>സംഘടന കോർഡിനേറ്റർ രജിസ്ട്രേഷൻ</h1>
        
        <div class="org-section">
            <div class="form-group">
                <label for="orgName">സംഘടനയുടെ പേര്</label>
                <input type="text" id="orgName" placeholder="സംഘടനയുടെ പേര് നൽകുക">
            </div>
        </div>

        <div id="districtsContainer"></div>

        <div class="submit-section">
            <button class="submit-btn" onclick="submitForm()">സമർപ്പിക്കുക</button>
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

        const districtData = {};

        function initializeDistricts() {
            const container = document.getElementById('districtsContainer');
            
            districts.forEach((district, index) => {
                districtData[district] = [];
                
                const districtDiv = document.createElement('div');
                districtDiv.className = 'district-section';
                districtDiv.id = `district-${index}`;
                
                districtDiv.innerHTML = `
                    <div class="district-title">${district}</div>
                    <div id="coordinators-${index}"></div>
                `;
                
                container.appendChild(districtDiv);
                
                // Add one coordinator field by default
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

        function removeCoordinator(coordinatorId) {
            const element = document.getElementById(`coordinator-${coordinatorId}`);
            if (element) {
                element.remove();
            }
        }

        function submitForm() {
            const orgName = document.getElementById('orgName').value.trim();
            
            if (!orgName) {
                alert('ദയവായി സംഘടനയുടെ പേര് നൽകുക');
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

            console.log('Form Data:', data);
            alert('വിവരങ്ങൾ വിജയകരമായി സമർപ്പിച്ചു!\n\nConsole-ൽ ഡാറ്റ കാണുക (F12 അമർത്തുക)');
            
            // Here you can send the data to a server
            // Example: fetch('/api/submit', { method: 'POST', body: JSON.stringify(data) })
        }

        // Initialize the form when page loads
        window.onload = initializeDistricts;
    </script>
</body>
</html>
