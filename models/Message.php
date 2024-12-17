<?php
// models/Message.php

class Message {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Send a message from one user to another
    public function sendMessage($sender_id, $receiver_id, $message) {
        $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$sender_id, $receiver_id, $message]);
    }

    // Get all messages for a specific user (by user ID)
    public function getMessagesByUser($user_id) {
        $sql = "SELECT * FROM messages WHERE sender_id = ? OR receiver_id = ? ORDER BY timestamp DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get unread messages for a specific user
    public function getUnreadMessages($user_id) {
        $sql = "SELECT * FROM messages WHERE receiver_id = ? AND read_status = 0 ORDER BY timestamp DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mark a message as read
    public function markAsRead($message_id) {
        $sql = "UPDATE messages SET read_status = 1 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$message_id]);
    }

    // Delete a message
    public function deleteMessage($message_id) {
        $sql = "DELETE FROM messages WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$message_id]);
    }
}
?>
