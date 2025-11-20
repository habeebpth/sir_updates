<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="ml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>സംഘടന ഡാറ്റ കാണുക</title>
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
            max-width: 1200px;
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
        }

        .org-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }

        .org-header {
            font-size: 22px;
            font-weight: bold;
            color: #764ba2;
            margin-bottom: 10px;
        }

        .org-meta {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #667eea;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }

        .back-btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">← മടങ്ങിപ്പോകുക</a>
        <h1>സംഘടന ഡാറ്റ</h1>

        <?php
        // Fetch all organizations
        $orgQuery = "SELECT * FROM organizations ORDER BY created_at DESC";
        $orgResult = $conn->query($orgQuery);

        if ($orgResult->num_rows > 0) {
            while ($org = $orgResult->fetch_assoc()) {
                echo '<div class="org-card">';
                echo '<div class="org-header">' . htmlspecialchars($org['name']) . '</div>';
                echo '<div class="org-meta">ID: ' . $org['id'] . ' | തീയതി: ' . date('d-m-Y H:i', strtotime($org['created_at'])) . '</div>';
                
                // Fetch coordinators for this organization
                $coordQuery = "SELECT * FROM coordinators WHERE organization_id = ? ORDER BY district";
                $stmt = $conn->prepare($coordQuery);
                $stmt->bind_param("i", $org['id']);
                $stmt->execute();
                $coordResult = $stmt->get_result();
                
                if ($coordResult->num_rows > 0) {
                    echo '<table>';
                    echo '<tr><th>ജില്ല</th><th>കോർഡിനേറ്റർ</th><th>മൊബൈൽ</th></tr>';
                    
                    while ($coord = $coordResult->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($coord['district']) . '</td>';
                        echo '<td>' . htmlspecialchars($coord['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($coord['mobile']) . '</td>';
                        echo '</tr>';
                    }
                    
                    echo '</table>';
                } else {
                    echo '<p style="color: #666; margin-top: 10px;">കോർഡിനേറ്റർമാരില്ല</p>';
                }
                
                echo '</div>';
                $stmt->close();
            }
        } else {
            echo '<div class="no-data">ഡാറ്റയൊന്നും കണ്ടെത്തിയില്ല</div>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
