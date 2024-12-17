<?php
// models/Impact.php

class Impact {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Track impact for a project
    public function trackImpact($project_id, $metric_name, $value) {
        $sql = "INSERT INTO impact (project_id, metric_name, value) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$project_id, $metric_name, $value]);
    }

    // Get all impact metrics for a specific project
    public function getImpactByProject($project_id) {
        $sql = "SELECT * FROM impact WHERE project_id = ? ORDER BY timestamp DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$project_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all impact metrics (e.g., for dashboard or admin view)
    public function getAllImpact() {
        $sql = "SELECT * FROM impact ORDER BY timestamp DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get the latest impact metric for a project
    public function getLatestImpactByProject($project_id) {
        $sql = "SELECT * FROM impact WHERE project_id = ? ORDER BY timestamp DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$project_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
