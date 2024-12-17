<?php
// models/Project.php

class Project {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create a new project
    public function createProject($title, $description, $start_date, $end_date, $organization_id) {
        $sql = "INSERT INTO projects (title, description, start_date, end_date, organization_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$title, $description, $start_date, $end_date, $organization_id]);
    }

    // Get all projects
    public function getAllProjects() {
        $sql = "SELECT * FROM projects";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get project details by ID
    public function getProjectById($project_id) {
        $sql = "SELECT * FROM projects WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$project_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
