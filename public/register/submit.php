<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    $organizationName = trim($data['organizationName'] ?? '');
    $districts = $data['districts'] ?? [];
    
    if (empty($organizationName)) {
        echo json_encode([
            'success' => false,
            'message' => 'Organization name is required'
        ]);
        exit;
    }
    
    // Begin transaction
    $conn->begin_transaction();
    
    try {
        // Insert organization
        $stmt = $conn->prepare("INSERT INTO organizations (name) VALUES (?)");
        $stmt->bind_param("s", $organizationName);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to insert organization");
        }
        
        $organizationId = $conn->insert_id;
        $coordinatorCount = 0;
        
        // Insert coordinators
        $coordStmt = $conn->prepare("INSERT INTO coordinators (organization_id, district, name, mobile) VALUES (?, ?, ?, ?)");
        
        foreach ($districts as $district => $coordinators) {
            foreach ($coordinators as $coordinator) {
                $name = trim($coordinator['name'] ?? '');
                $mobile = trim($coordinator['mobile'] ?? '');
                
                if (!empty($name) && !empty($mobile)) {
                    $coordStmt->bind_param("isss", $organizationId, $district, $name, $mobile);
                    
                    if ($coordStmt->execute()) {
                        $coordinatorCount++;
                    }
                }
            }
        }
        
        // Commit transaction
        $conn->commit();
        
        echo json_encode([
            'success' => true,
            'message' => 'Data saved successfully',
            'organizationId' => $organizationId,
            'coordinatorCount' => $coordinatorCount
        ]);
        
        $stmt->close();
        $coordStmt->close();
        
    } catch (Exception $e) {
        // Rollback on error
        $conn->rollback();
        
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}

$conn->close();
?>
