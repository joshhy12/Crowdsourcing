<?php
// models/Assignment.php

class Assignment {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Assign a volunteer to a project
    public function assignVolunteerToProject($user_id, $project_id) {
        $sql = "INSERT INTO assignments (user_id, project_id) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $project_id]);
    }

    // Get all assignments for a specific user
    public function getAssignmentsByUser($user_id) {
        $sql = "SELECT * FROM assignments WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all volunteers assigned to a specific project
    public function getVolunteersByProject($project_id) {
        $sql = "SELECT * FROM assignments WHERE project_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$project_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
