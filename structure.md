/crowdsourcing-platform
│
├── /assets                # Static files (CSS, JS, images)
│   ├── /css               # Stylesheets
│   ├── /js                # JavaScript files
│   └── /images            # Project images, user avatars
│
├── /config                # Configuration files (database, app settings)
│   ├── database.php       # Database connection configuration
│   └── config.php         # Application settings
│
├── /controllers           # Controllers for handling requests
│   ├── HomeController.php
│   ├── AuthController.php
│   ├── UserController.php
│   ├── ProjectController.php
│   ├── VolunteerController.php
│   └── OrganizationController.php
│
├── /models                # Database models for user, project, etc.
│   ├── User.php
│   ├── Project.php
│   ├── Assignment.php
│   ├── Message.php
│   └── Impact.php
│
├── /views                 # Views for rendering HTML templates
│   ├── /layouts           # Header and footer templates
│   ├── /auth              # Login and registration pages
│   ├── /user              # User profile and settings
│   ├── /projects          # Project listings and details
│   └── /dashboard         # Dashboard for organization/admin views
│
├── /helpers               # Helper functions for validation, authentication, etc.
│   ├── form_helper.php
│   ├── auth_helper.php
│   └── date_helper.php
│
├── /public                # Publicly accessible files (entry point)
│   └── index.php          # Main entry point for routing
│
├── /storage               # Directory for uploaded files (images, logs)
│   ├── /uploads           # Project-related file uploads
│   └── /logs              # Log files for error tracking
│
└── .htaccess              # URL routing configuration for Apache












# Create the main project directory
mkdir crowdsourcing-platform
cd crowdsourcing-platform

# Create directories for assets (CSS, JS, images)
mkdir assets
mkdir assets/css
mkdir assets/js
mkdir assets/images

# Create directories for config
mkdir config

# Create directories for controllers
mkdir controllers

# Create directories for models
mkdir models

# Create directories for views (layouts, auth, user, projects, dashboard)
mkdir views
mkdir views/layouts
mkdir views/auth
mkdir views/user
mkdir views/projects
mkdir views/dashboard

# Create directories for helpers
mkdir helpers

# Create public directory for publicly accessible files
mkdir public

# Create storage directory for uploads and logs
mkdir storage
mkdir storage/uploads
mkdir storage/logs

# Create the .htaccess file (use a text editor to create it in PowerShell)
New-Item -ItemType File -Name ".htaccess"

# Optionally, create example PHP files for controllers, models, and views
New-Item -ItemType File -Name "HomeController.php" -Path "controllers"
New-Item -ItemType File -Name "AuthController.php" -Path "controllers"
New-Item -ItemType File -Name "UserController.php" -Path "controllers"
New-Item -ItemType File -Name "ProjectController.php" -Path "controllers"
New-Item -ItemType File -Name "VolunteerController.php" -Path "controllers"
New-Item -ItemType File -Name "OrganizationController.php" -Path "controllers"

New-Item -ItemType File -Name "User.php" -Path "models"
New-Item -ItemType File -Name "Project.php" -Path "models"
New-Item -ItemType File -Name "Assignment.php" -Path "models"
New-Item -ItemType File -Name "Message.php" -Path "models"
New-Item -ItemType File -Name "Impact.php" -Path "models"

New-Item -ItemType File -Name "header.php" -Path "views/layouts"
New-Item -ItemType File -Name "footer.php" -Path "views/layouts"
New-Item -ItemType File -Name "login.php" -Path "views/auth"
New-Item -ItemType File -Name "register.php" -Path "views/auth"
New-Item -ItemType File -Name "profile.php" -Path "views/user"
New-Item -ItemType File -Name "settings.php" -Path "views/user"
New-Item -ItemType File -Name "project_list.php" -Path "views/projects"
New-Item -ItemType File -Name "project_details.php" -Path "views/projects"
New-Item -ItemType File -Name "admin_dashboard.php" -Path "views/dashboard"
New-Item -ItemType File -Name "project_dashboard.php" -Path "views/dashboard"
New-Item -ItemType File -Name "volunteer_dashboard.php" -Path "views/dashboard"

New-Item -ItemType File -Name "form_helper.php" -Path "helpers"
New-Item -ItemType File -Name "auth_helper.php" -Path "helpers"
New-Item -ItemType File -Name "date_helper.php" -Path "helpers"

New-Item -ItemType File -Name "index.php" -Path "public"
