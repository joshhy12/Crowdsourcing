<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="profile-container">
        <h2>My Profile</h2>
        
        <form method="POST" action="/auth/updateProfile">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
            </div>
            
            <div class="form-group">
                <label>Skills:</label>
                <textarea name="skills" rows="3"><?php echo htmlspecialchars($user['skills']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Interests:</label>
                <textarea name="interests" rows="3"><?php echo htmlspecialchars($user['interests']); ?></textarea>
            </div>
            
            <button type="submit">Update Profile</button>
        </form>
        
        <div class="profile-footer">
            <p>Role: <?php echo htmlspecialchars($user['role']); ?></p>
            <p>Member since: <?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
            <a href="/auth/logout" class="logout-btn">Logout</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
