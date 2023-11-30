#!/bin/bash

# Create backend directory structure
mkdir -p backend/config backend/controllers backend/models backend/utils backend/views

# Backend files
touch backend/config/database.php
touch backend/config/routes.php
touch backend/controllers/AuthController.php
touch backend/controllers/VideoController.php
touch backend/controllers/UserController.php
touch backend/models/VideoModel.php
touch backend/models/UserModel.php
touch backend/utils/Database.php
touch backend/utils/Validation.php
# Backend placeholder views
touch backend/views/index.php
touch backend/views/about.php
touch backend/views/contact.php
touch backend/views/privacy-policy.php
touch backend/views/terms-of-service.php

# Create frontend directory structure
mkdir -p frontend/css frontend/js/frontend/js/components frontend/js/components/ErrorPages

# Frontend files
touch frontend/css/main.css
touch frontend/js/main.js
touch frontend/js/components/ErrorPages/NotFound.js
touch frontend/js/components/ErrorPages/Forbidden.js
touch frontend/js/components/ErrorPages/InternalServerError.js
# Frontend HTML views
touch frontend/index.html
touch frontend/about.html
touch frontend/contact.html
touch frontend/privacy-policy.html
touch frontend/terms-of-service.html

# Output success message
echo "Project template generated successfully!"
