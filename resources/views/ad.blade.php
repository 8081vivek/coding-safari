<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz | Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary: #FF6B35;
            --secondary: #00C49A;
            --accent: #6C63FF;
            --dark: #0A0A0F;
            --darker: #050507;
            --light: #F8F9FA;
            --gray: #A0A0B0;
            --light-gray: #2A2A35;
            --danger: #FF4757;
            --warning: #FFA502;
            --success: #00C49A;
            --sidebar-width: 260px;
        }
        
        /* Hide scrollbars */
        ::-webkit-scrollbar {
            display: none;
        }
        
        html {
            scrollbar-width: none;
        }
        
        body {
            -ms-overflow-style: none;
            background-color: var(--darker);
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            line-height: 1.6;
            overflow-x: hidden;
            height: 100vh;
        }
        
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: rgba(255, 255, 255, 0.05);
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='white'><path d='M7 10l5 5 5-5'/></svg>");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 18px;
            padding-right: 50px;
            cursor: pointer;
        }
        
        select option {
            background-color: var(--dark);
            color: var(--light);
            padding: 12px;
        }
        
        select option:hover {
            background-color: rgba(255, 107, 53, 0.15);
        }
        
        select option:checked {
            background-color: var(--primary);
            color: #ffffff;
        }
        
        /* Grid Background */
        .grid-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
            opacity: 0.3;
        }
        
        /* Admin Dashboard Layout */
        .admin-dashboard {
            display: flex;
            height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: rgba(10, 10, 15, 0.95);
            backdrop-filter: blur(15px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
            transition: transform 0.3s ease;
        }
        
        .sidebar-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .sidebar-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--light);
            margin-bottom: 5px;
        }
        
        .sidebar-header h2 span {
            color: var(--primary);
        }
        
        .sidebar-header p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .admin-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 2rem;
        }
        
        .nav-menu {
            list-style: none;
            margin-bottom: 40px;
        }
        
        .nav-item {
            margin-bottom: 10px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            color: var(--gray);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--light);
        }
        
        .nav-link.active {
            background: rgba(255, 107, 53, 0.1);
            color: var(--primary);
            border-left: 3px solid var(--primary);
        }
        
        .nav-link i {
            font-size: 1.2rem;
            width: 25px;
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 30px;
            overflow-y: auto;
            height: 100vh;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--light);
        }
        
        .header h1 span {
            color: var(--primary);
        }
        
        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--gray);
            font-size: 1.3rem;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.05);
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .admin-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 10px;
        }
        
        /* Section Styles */
        .dashboard-section {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--light);
        }
        
        .section-header h2 span {
            color: var(--primary);
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #e55a2b;
            transform: translateY(-3px);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-secondary:hover {
            background-color: rgba(255, 107, 53, 0.1);
        }
        
        .btn-accent {
            background-color: var(--accent);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: #5a52e0;
        }
        
        /* Quiz Creation Layout */
        .quiz-creation-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
        }
        
        .quiz-form-section {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .questions-selection-section {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 30px;
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
        
        /* Form Styles */
        .quiz-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--light);
            font-weight: 600;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
        }
        
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        /* Form Row for side-by-side inputs */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        /* Time Input Group */
        .time-input-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .time-input {
            width: 100px;
        }
        
        .time-label {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* Questions Selection */
        .questions-selection-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .questions-selection-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--light);
        }
        
        .selected-count {
            background: rgba(108, 99, 255, 0.1);
            color: var(--accent);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        /* Questions Filter */
        .questions-filter {
            margin-bottom: 20px;
        }
        
        .filter-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 6px;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .filter-btn.active {
            background: rgba(255, 107, 53, 0.1);
            color: var(--primary);
            border-color: var(--primary);
        }
        
        /* Questions List */
        .questions-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 500px;
            overflow-y: auto;
            padding-right: 5px;
        }
        
        .question-selection-item {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 8px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .question-selection-item:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.1);
        }
        
        .question-selection-item.selected {
            background: rgba(0, 196, 154, 0.1);
            border-color: var(--secondary);
        }
        
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        
        .question-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        
        .question-text {
            font-size: 1rem;
            color: var(--light);
            margin-bottom: 10px;
            line-height: 1.5;
        }
        
        .question-meta {
            display: flex;
            gap: 10px;
            color: var(--gray);
            font-size: 0.85rem;
        }
        
        .question-category {
            background: rgba(108, 99, 255, 0.1);
            color: var(--accent);
            padding: 3px 8px;
            border-radius: 4px;
        }
        
        .question-difficulty {
            background: rgba(255, 107, 53, 0.1);
            color: var(--primary);
            padding: 3px 8px;
            border-radius: 4px;
        }
        
        .question-points {
            background: rgba(0, 196, 154, 0.1);
            color: var(--secondary);
            padding: 3px 8px;
            border-radius: 4px;
        }
        
        /* Selected Questions Summary */
        .selected-summary {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: var(--gray);
        }
        
        .summary-value {
            color: var(--light);
            font-weight: 600;
        }
        
        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            font-weight: 600;
            color: var(--light);
        }
        
        /* Quiz Preview */
        .quiz-preview {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            border: 1px dashed rgba(255, 255, 255, 0.1);
        }
        
        .preview-title {
            font-size: 1.2rem;
            color: var(--light);
            margin-bottom: 15px;
        }
        
        .preview-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .preview-stat {
            text-align: center;
            padding: 10px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 6px;
        }
        
        .preview-stat-value {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--light);
        }
        
        .preview-stat-label {
            font-size: 0.8rem;
            color: var(--gray);
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .quiz-creation-container {
                grid-template-columns: 1fr;
            }
            
            .questions-selection-section {
                position: static;
                max-height: none;
            }
        }
        
        @media (max-width: 992px) {
            :root {
                --sidebar-width: 220px;
            }
            
            .sidebar {
                width: var(--sidebar-width);
            }
            
            .main-content {
                margin-left: var(--sidebar-width);
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .section-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-section {
                padding: 20px;
            }
            
            .quiz-form-section,
            .questions-selection-section {
                padding: 20px;
            }
            
            .preview-stats {
                grid-template-columns: 1fr;
            }
            
            .filter-options {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Grid Background -->
    <div class="grid-bg"></div>
    
    <!-- Admin Dashboard -->
    <div class="admin-dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="admin-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2>Coding<span>Safari</span></h2>
                <p>Admin Dashboard</p>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="window.location.href='admin-dashboard.html'">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create Quiz</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="window.location.href='quiz-management.html'">
                        <i class="fas fa-question-circle"></i>
                        <span>Quiz Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="window.location.href='student-management.html'">
                        <i class="fas fa-users"></i>
                        <span>Student Registration</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="window.location.href='results.html'">
                        <i class="fas fa-chart-line"></i>
                        <span>Quiz Results</span>
                    </a>
                </li>
            </ul>
            
            <div class="logout-section">
                <a href="#" class="nav-link" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div>
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Create <span>New Quiz</span></h1>
                    <p style="color: var(--gray); margin-top: 5px;">Design a quiz for students by selecting questions and configuring settings</p>
                </div>
                
                <div class="header-actions">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="admin-profile">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=FF6B35&color=fff" alt="Admin">
                        <div>
                            <div style="font-weight: 600;">Admin User</div>
                            <div style="font-size: 0.8rem; color: var(--gray);">System Administrator</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quiz Creation Container -->
            <div class="quiz-creation-container">
                <!-- Quiz Form Section -->
                <div class="quiz-form-section">
                    <div class="section-header">
                        <h2>Quiz <span>Details</span></h2>
                        <div>
                            <button class="btn btn-secondary" id="saveDraftBtn">
                                <i class="fas fa-save"></i> Save Draft
                            </button>
                            <button class="btn btn-primary" id="previewQuizBtn" style="margin-left: 10px;">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                    </div>
                    
                    <form class="quiz-form" id="quizForm">
                        <div class="form-group">
                            <label for="quizTitle">Quiz Title *</label>
                            <input type="text" id="quizTitle" placeholder="Enter quiz title" required value="JavaScript Fundamentals Assessment">
                        </div>
                        
                        <div class="form-group">
                            <label for="quizDescription">Description</label>
                            <textarea id="quizDescription" placeholder="Describe the quiz objectives and topics covered">Test your knowledge of JavaScript basics including variables, functions, arrays, and DOM manipulation.</textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="quizCategory">Category *</label>
                                <select id="quizCategory" required>
                                    <option value="">Select Category</option>
                                    <option value="javascript" selected>JavaScript</option>
                                    <option value="python">Python</option>
                                    <option value="dsa">Data Structures</option>
                                    <option value="algorithms">Algorithms</option>
                                    <option value="webdev">Web Development</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="quizDifficulty">Difficulty Level</label>
                                <select id="quizDifficulty">
                                    <option value="easy">Easy</option>
                                    <option value="medium" selected>Medium</option>
                                    <option value="hard">Hard</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="quizDuration">Duration *</label>
                                <div class="time-input-group">
                                    <input type="number" id="quizHours" class="time-input" min="0" max="5" value="0" placeholder="HH">
                                    <span class="time-label">hours</span>
                                    <input type="number" id="quizMinutes" class="time-input" min="0" max="59" value="30" placeholder="MM" required>
                                    <span class="time-label">minutes</span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="passingScore">Passing Score (%) *</label>
                                <input type="number" id="passingScore" min="0" max="100" value="60" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="maxAttempts">Max Attempts</label>
                                <input type="number" id="maxAttempts" min="1" max="10" value="3">
                            </div>
                            
                            <div class="form-group">
                                <label for="quizStatus">Status</label>
                                <select id="quizStatus">
                                    <option value="draft">Draft</option>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="startDate">Start Date & Time</label>
                            <input type="datetime-local" id="startDate">
                        </div>
                        
                        <div class="form-group">
                            <label for="endDate">End Date & Time</label>
                            <input type="datetime-local" id="endDate">
                        </div>
                        
                        <div class="form-group">
                            <label for="quizInstructions">Instructions for Students</label>
                            <textarea id="quizInstructions" placeholder="Enter specific instructions for students">• Read each question carefully before answering
• You have 30 minutes to complete the quiz
• You cannot go back to previous questions
• Timer will be shown at the top
• Do not refresh the page during the quiz
• Passing score is 60%</textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" id="cancelBtn">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-rocket"></i> Create & Publish Quiz
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Questions Selection Section -->
                <div class="questions-selection-section">
                    <div class="questions-selection-header">
                        <h3>Select Questions</h3>
                        <span class="selected-count" id="selectedCount">0 selected</span>
                    </div>
                    
                    <!-- Questions Filter -->
                    <div class="questions-filter">
                        <div class="filter-options">
                            <button class="filter-btn active" data-filter="all">All</button>
                            <button class="filter-btn" data-filter="javascript">JavaScript</button>
                            <button class="filter-btn" data-filter="python">Python</button>
                            <button class="filter-btn" data-filter="dsa">DSA</button>
                            <button class="filter-btn" data-filter="easy">Easy</button>
                            <button class="filter-btn" data-filter="medium">Medium</button>
                            <button class="filter-btn" data-filter="hard">Hard</button>
                        </div>
                    </div>
                    
                    <!-- Questions List -->
                    <div class="questions-list" id="questionsList">
                        <!-- Questions will be loaded here -->
                    </div>
                    
                    <!-- Selected Questions Summary -->
                    <div class="selected-summary">
                        <div class="summary-item">
                            <span>Total Questions:</span>
                            <span class="summary-value" id="totalQuestions">0</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Points:</span>
                            <span class="summary-value" id="totalPoints">0</span>
                        </div>
                        <div class="summary-item">
                            <span>Estimated Time:</span>
                            <span class="summary-value" id="estimatedTime">0 min</span>
                        </div>
                        <div class="summary-total">
                            <span>Quiz Summary</span>
                            <span id="quizSummary">0 questions, 0 points</span>
                        </div>
                    </div>
                    
                    <!-- Quiz Preview -->
                    <div class="quiz-preview" id="quizPreview">
                        <div class="preview-title">Quiz Preview</div>
                        <div class="preview-stats">
                            <div class="preview-stat">
                                <div class="preview-stat-value" id="previewQuestions">0</div>
                                <div class="preview-stat-label">Questions</div>
                            </div>
                            <div class="preview-stat">
                                <div class="preview-stat-value" id="previewDuration">30</div>
                                <div class="preview-stat-label">Minutes</div>
                            </div>
                            <div class="preview-stat">
                                <div class="preview-stat-value" id="previewPassing">60%</div>
                                <div class="preview-stat-label">Passing</div>
                            </div>
                            <div class="preview-stat">
                                <div class="preview-stat-value" id="previewPoints">0</div>
                                <div class="preview-stat-label">Points</div>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <button class="btn btn-accent btn-small" id="quickPreviewBtn">
                                <i class="fas fa-play"></i> Quick Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quiz Preview Modal -->
    <div class="modal" id="quizPreviewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Quiz Preview</h3>
                <button class="close-modal" id="closePreviewModal">&times;</button>
            </div>
            
            <div class="quiz-preview-content">
                <div style="text-align: center; margin-bottom: 30px;">
                    <h2 id="previewQuizTitle" style="color: var(--light); margin-bottom: 10px;">JavaScript Fundamentals Assessment</h2>
                    <p style="color: var(--gray);" id="previewQuizDescription">Test your knowledge of JavaScript basics</p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px;">
                    <div style="text-align: center; padding: 20px; background: rgba(255, 255, 255, 0.03); border-radius: 8px;">
                        <div style="font-size: 2rem; color: var(--light); font-weight: 600;" id="modalQuestions">0</div>
                        <div style="color: var(--gray);">Questions</div>
                    </div>
                    <div style="text-align: center; padding: 20px; background: rgba(255, 255, 255, 0.03); border-radius: 8px;">
                        <div style="font-size: 2rem; color: var(--light); font-weight: 600;" id="modalDuration">30</div>
                        <div style="color: var(--gray);">Minutes</div>
                    </div>
                    <div style="text-align: center; padding: 20px; background: rgba(255, 255, 255, 0.03); border-radius: 8px;">
                        <div style="font-size: 2rem; color: var(--light); font-weight: 600;" id="modalPassing">60%</div>
                        <div style="color: var(--gray);">Passing Score</div>
                    </div>
                    <div style="text-align: center; padding: 20px; background: rgba(255, 255, 255, 0.03); border-radius: 8px;">
                        <div style="font-size: 2rem; color: var(--light); font-weight: 600;" id="modalAttempts">3</div>
                        <div style="color: var(--gray);">Max Attempts</div>
                    </div>
                </div>
                
                <div style="background: rgba(255, 255, 255, 0.03); padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                    <h4 style="color: var(--light); margin-bottom: 15px;">Instructions:</h4>
                    <div id="modalInstructions" style="color: var(--gray); line-height: 1.6;">
                        • Read each question carefully before answering<br>
                        • You cannot go back to previous questions<br>
                        • Timer will be shown at the top<br>
                        • Do not refresh the page during the quiz
                    </div>
                </div>
                
                <div style="display: flex; gap: 15px;">
                    <button type="button" class="btn btn-secondary" style="flex: 1;" id="closePreviewBtn">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" style="flex: 1;" id="startStudentQuizBtn">
                        <i class="fas fa-play"></i> Start as Student
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Student Quiz Interface -->
    <div class="modal" id="studentQuizModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>JavaScript Fundamentals Assessment</h3>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-clock" style="color: var(--primary);"></i>
                        <span id="quizTimer">30:00</span>
                    </div>
                    <button class="close-modal" id="closeStudentQuizModal">&times;</button>
                </div>
            </div>
            
            <div class="student-quiz-content">
                <div id="quizQuestionsContainer">
                    <!-- Quiz questions will be loaded here -->
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.05);">
                    <button class="btn btn-secondary" id="prevQuestionBtn" disabled>
                        <i class="fas fa-chevron-left"></i> Previous
                    </button>
                    <div>
                        <span style="color: var(--gray);">Question </span>
                        <span id="currentQuestionNumber">1</span>
                        <span style="color: var(--gray);"> of </span>
                        <span id="totalQuizQuestions">5</span>
                    </div>
                    <button class="btn btn-primary" id="nextQuestionBtn">
                        Next <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <div style="text-align: center; margin-top: 20px;">
                    <button class="btn btn-accent" id="submitQuizBtn">
                        <i class="fas fa-paper-plane"></i> Submit Quiz
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const sidebar = document.querySelector('.sidebar');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const logoutBtn = document.getElementById('logoutBtn');
            const notificationBtn = document.querySelector('.notification-btn');
            const quizForm = document.getElementById('quizForm');
            const saveDraftBtn = document.getElementById('saveDraftBtn');
            const previewQuizBtn = document.getElementById('previewQuizBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const questionsList = document.getElementById('questionsList');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const selectedCount = document.getElementById('selectedCount');
            const totalQuestions = document.getElementById('totalQuestions');
            const totalPoints = document.getElementById('totalPoints');
            const estimatedTime = document.getElementById('estimatedTime');
            const quizSummary = document.getElementById('quizSummary');
            const quickPreviewBtn = document.getElementById('quickPreviewBtn');
            
            // Preview Elements
            const previewQuestions = document.getElementById('previewQuestions');
            const previewDuration = document.getElementById('previewDuration');
            const previewPassing = document.getElementById('previewPassing');
            const previewPoints = document.getElementById('previewPoints');
            
            // Modal Elements
            const quizPreviewModal = document.getElementById('quizPreviewModal');
            const closePreviewModal = document.getElementById('closePreviewModal');
            const closePreviewBtn = document.getElementById('closePreviewBtn');
            const startStudentQuizBtn = document.getElementById('startStudentQuizBtn');
            const studentQuizModal = document.getElementById('studentQuizModal');
            const closeStudentQuizModal = document.getElementById('closeStudentQuizModal');
            
            // Quiz Questions Data
            const questionsData = [
                {
                    id: 1,
                    text: "Which of the following methods is used to add an element to the end of an array in JavaScript?",
                    options: [
                        { id: "A", text: "array.push()", correct: true },
                        { id: "B", text: "array.pop()", correct: false },
                        { id: "C", text: "array.shift()", correct: false },
                        { id: "D", text: "array.unshift()", correct: false }
                    ],
                    category: "javascript",
                    difficulty: "medium",
                    points: 5,
                    time: "2 mins",
                    explanation: "The push() method adds one or more elements to the end of an array."
                },
                {
                    id: 2,
                    text: "What does the '===' operator do in JavaScript?",
                    options: [
                        { id: "A", text: "Assigns a value to a variable", correct: false },
                        { id: "B", text: "Strict equality comparison", correct: true },
                        { id: "C", text: "Adds two values", correct: false },
                        { id: "D", text: "Type conversion", correct: false }
                    ],
                    category: "javascript",
                    difficulty: "easy",
                    points: 3,
                    time: "1 min",
                    explanation: "The '===' operator checks for both value and type equality."
                },
                {
                    id: 3,
                    text: "Which keyword is used to define a function in Python?",
                    options: [
                        { id: "A", text: "function", correct: false },
                        { id: "B", text: "def", correct: true },
                        { id: "C", text: "func", correct: false },
                        { id: "D", text: "define", correct: false }
                    ],
                    category: "python",
                    difficulty: "easy",
                    points: 3,
                    time: "1 min",
                    explanation: "In Python, functions are defined using the 'def' keyword."
                },
                {
                    id: 4,
                    text: "Which data structure uses FIFO (First In First Out) principle?",
                    options: [
                        { id: "A", text: "Stack", correct: false },
                        { id: "B", text: "Queue", correct: true },
                        { id: "C", text: "Tree", correct: false },
                        { id: "D", text: "Graph", correct: false }
                    ],
                    category: "dsa",
                    difficulty: "easy",
                    points: 3,
                    time: "1 min",
                    explanation: "Queue follows FIFO principle while Stack follows LIFO."
                },
                {
                    id: 5,
                    text: "What will be the output of: console.log(typeof null) in JavaScript?",
                    options: [
                        { id: "A", text: "null", correct: false },
                        { id: "B", text: "undefined", correct: false },
                        { id: "C", text: "object", correct: true },
                        { id: "D", text: "number", correct: false }
                    ],
                    category: "javascript",
                    difficulty: "medium",
                    points: 5,
                    time: "2 mins",
                    explanation: "This is a known quirk in JavaScript - typeof null returns 'object'."
                },
                {
                    id: 6,
                    text: "Which of the following is NOT a JavaScript framework?",
                    options: [
                        { id: "A", text: "React", correct: false },
                        { id: "B", text: "Angular", correct: false },
                        { id: "C", text: "Vue", correct: false },
                        { id: "D", text: "Django", correct: true }
                    ],
                    category: "javascript",
                    difficulty: "easy",
                    points: 3,
                    time: "1 min",
                    explanation: "Django is a Python web framework, not a JavaScript framework."
                },
                {
                    id: 7,
                    text: "What does API stand for?",
                    options: [
                        { id: "A", text: "Application Programming Interface", correct: true },
                        { id: "B", text: "Advanced Programming Interface", correct: false },
                        { id: "C", text: "Application Process Integration", correct: false },
                        { id: "D", text: "Automated Programming Interface", correct: false }
                    ],
                    category: "webdev",
                    difficulty: "easy",
                    points: 3,
                    time: "1 min",
                    explanation: "API stands for Application Programming Interface."
                },
                {
                    id: 8,
                    text: "Which algorithm has the best time complexity for sorting?",
                    options: [
                        { id: "A", text: "Bubble Sort", correct: false },
                        { id: "B", text: "Insertion Sort", correct: false },
                        { id: "C", text: "Quick Sort", correct: true },
                        { id: "D", text: "Selection Sort", correct: false }
                    ],
                    category: "algorithms",
                    difficulty: "medium",
                    points: 5,
                    time: "2 mins",
                    explanation: "Quick Sort has average time complexity of O(n log n)."
                }
            ];
            
            // Selected questions
            let selectedQuestions = new Set([1, 2, 4, 5]); // Pre-select some questions
            let currentFilter = 'all';
            let currentQuestionIndex = 0;
            let quizTimer;
            let timeLeft = 30 * 60; // 30 minutes in seconds
            
            // Initialize
            loadQuestions();
            updateSelectionSummary();
            updatePreview();
            
            // Mobile Menu Toggle
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && 
                    !sidebar.contains(e.target) && 
                    !mobileMenuBtn.contains(e.target) &&
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
            
            // Notification Button
            notificationBtn.addEventListener('click', function() {
                alert('Notifications:\n1. New student registration\n2. Quiz submission pending review\n3. System update available');
            });
            
            // Logout
            logoutBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to logout?')) {
                    alert('Logged out successfully!');
                    window.location.href = 'admin-login.html';
                }
            });
            
            // Filter Questions
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    currentFilter = this.dataset.filter;
                    loadQuestions();
                });
            });
            
            // Save Draft
            saveDraftBtn.addEventListener('click', function() {
                if (validateQuizForm()) {
                    alert('Quiz saved as draft successfully!');
                }
            });
            
            // Preview Quiz
            previewQuizBtn.addEventListener('click', function() {
                if (validateQuizForm()) {
                    showQuizPreview();
                }
            });
            
            // Cancel Button
            cancelBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to cancel? All unsaved changes will be lost.')) {
                    window.location.href = 'admin-dashboard.html';
                }
            });
            
            // Quick Preview
            quickPreviewBtn.addEventListener('click', function() {
                if (selectedQuestions.size > 0) {
                    showQuizPreview();
                } else {
                    alert('Please select at least one question for the quiz.');
                }
            });
            
            // Form Submission
            quizForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (validateQuizForm()) {
                    if (selectedQuestions.size === 0) {
                        alert('Please select at least one question for the quiz.');
                        return;
                    }
                    
                    // Create quiz object
                    const quiz = {
                        id: Date.now(),
                        title: document.getElementById('quizTitle').value,
                        description: document.getElementById('quizDescription').value,
                        category: document.getElementById('quizCategory').value,
                        difficulty: document.getElementById('quizDifficulty').value,
                        duration: (parseInt(document.getElementById('quizHours').value || 0) * 60) + 
                                 parseInt(document.getElementById('quizMinutes').value || 30),
                        passingScore: parseInt(document.getElementById('passingScore').value),
                        maxAttempts: parseInt(document.getElementById('maxAttempts').value),
                        status: document.getElementById('quizStatus').value,
                        startDate: document.getElementById('startDate').value,
                        endDate: document.getElementById('endDate').value,
                        instructions: document.getElementById('quizInstructions').value,
                        questions: Array.from(selectedQuestions),
                        createdAt: new Date().toISOString()
                    };
                    
                    // In real app, save to database
                    console.log('Quiz created:', quiz);
                    
                    // Show success message
                    alert(`Quiz "${quiz.title}" created successfully!\n\nTotal Questions: ${selectedQuestions.size}\nStatus: ${quiz.status === 'active' ? 'Active (Published)' : 'Draft'}`);
                    
                    // Redirect to quiz management
                    window.location.href = 'quiz-management.html';
                }
            });
            
            // Load Questions
            function loadQuestions() {
                questionsList.innerHTML = '';
                
                const filteredQuestions = questionsData.filter(question => {
                    if (currentFilter === 'all') return true;
                    if (currentFilter === question.category) return true;
                    if (currentFilter === question.difficulty) return true;
                    return false;
                });
                
                filteredQuestions.forEach(question => {
                    const questionItem = document.createElement('div');
                    questionItem.className = `question-selection-item ${selectedQuestions.has(question.id) ? 'selected' : ''}`;
                    questionItem.innerHTML = `
                        <div class="question-header">
                            <input type="checkbox" class="question-checkbox" 
                                   data-id="${question.id}" 
                                   ${selectedQuestions.has(question.id) ? 'checked' : ''}>
                            <div style="flex: 1;">
                                <div class="question-text">${question.text}</div>
                                <div class="question-meta">
                                    <span class="question-category">${question.category}</span>
                                    <span class="question-difficulty">${question.difficulty}</span>
                                    <span class="question-points">${question.points} points</span>
                                    <span>${question.time}</span>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    questionsList.appendChild(questionItem);
                    
                    // Add click event to checkbox
                    const checkbox = questionItem.querySelector('.question-checkbox');
                    checkbox.addEventListener('change', function() {
                        const questionId = parseInt(this.dataset.id);
                        if (this.checked) {
                            selectedQuestions.add(questionId);
                            questionItem.classList.add('selected');
                        } else {
                            selectedQuestions.delete(questionId);
                            questionItem.classList.remove('selected');
                        }
                        updateSelectionSummary();
                        updatePreview();
                    });
                    
                    // Make entire item clickable
                    questionItem.addEventListener('click', function(e) {
                        if (e.target !== checkbox) {
                            checkbox.checked = !checkbox.checked;
                            checkbox.dispatchEvent(new Event('change'));
                        }
                    });
                });
            }
            
            // Update Selection Summary
            function updateSelectionSummary() {
                const selectedQuestionsArray = Array.from(selectedQuestions);
                const selectedQuestionsData = questionsData.filter(q => selectedQuestions.has(q.id));
                
                // Calculate totals
                const totalQuestionsCount = selectedQuestionsArray.length;
                const totalPointsCount = selectedQuestionsData.reduce((sum, q) => sum + q.points, 0);
                const totalTimeCount = selectedQuestionsData.reduce((sum, q) => {
                    const time = parseInt(q.time);
                    return sum + (isNaN(time) ? 1 : time);
                }, 0);
                
                // Update UI
                selectedCount.textContent = `${totalQuestionsCount} selected`;
                totalQuestions.textContent = totalQuestionsCount;
                totalPoints.textContent = totalPointsCount;
                estimatedTime.textContent = `${totalTimeCount} min`;
                quizSummary.textContent = `${totalQuestionsCount} questions, ${totalPointsCount} points`;
                
                // Update preview
                previewQuestions.textContent = totalQuestionsCount;
                previewPoints.textContent = totalPointsCount;
            }
            
            // Update Preview based on form inputs
            function updatePreview() {
                const duration = (parseInt(document.getElementById('quizHours').value || 0) * 60) + 
                               parseInt(document.getElementById('quizMinutes').value || 30);
                const passingScore = document.getElementById('passingScore').value || 60;
                
                previewDuration.textContent = duration;
                previewPassing.textContent = `${passingScore}%`;
            }
            
            // Form input listeners for real-time preview update
            document.getElementById('quizHours').addEventListener('input', updatePreview);
            document.getElementById('quizMinutes').addEventListener('input', updatePreview);
            document.getElementById('passingScore').addEventListener('input', updatePreview);
            
            // Validate Quiz Form
            function validateQuizForm() {
                const title = document.getElementById('quizTitle').value.trim();
                const category = document.getElementById('quizCategory').value;
                const minutes = document.getElementById('quizMinutes').value;
                const passingScore = document.getElementById('passingScore').value;
                
                if (!title) {
                    alert('Please enter a quiz title.');
                    document.getElementById('quizTitle').focus();
                    return false;
                }
                
                if (!category) {
                    alert('Please select a category.');
                    document.getElementById('quizCategory').focus();
                    return false;
                }
                
                if (!minutes || parseInt(minutes) < 1) {
                    alert('Please enter a valid duration (at least 1 minute).');
                    document.getElementById('quizMinutes').focus();
                    return false;
                }
                
                if (!passingScore || parseInt(passingScore) < 0 || parseInt(passingScore) > 100) {
                    alert('Please enter a valid passing score (0-100).');
                    document.getElementById('passingScore').focus();
                    return false;
                }
                
                return true;
            }
            
            // Show Quiz Preview
            function showQuizPreview() {
                const title = document.getElementById('quizTitle').value;
                const description = document.getElementById('quizDescription').value;
                const duration = (parseInt(document.getElementById('quizHours').value || 0) * 60) + 
                               parseInt(document.getElementById('quizMinutes').value || 30);
                const passingScore = document.getElementById('passingScore').value;
                const maxAttempts = document.getElementById('maxAttempts').value;
                const instructions = document.getElementById('quizInstructions').value;
                
                const selectedQuestionsArray = Array.from(selectedQuestions);
                const selectedQuestionsData = questionsData.filter(q => selectedQuestions.has(q.id));
                const totalQuestionsCount = selectedQuestionsArray.length;
                const totalPointsCount = selectedQuestionsData.reduce((sum, q) => sum + q.points, 0);
                
                // Update modal content
                document.getElementById('previewQuizTitle').textContent = title;
                document.getElementById('previewQuizDescription').textContent = description;
                document.getElementById('modalQuestions').textContent = totalQuestionsCount;
                document.getElementById('modalDuration').textContent = duration;
                document.getElementById('modalPassing').textContent = `${passingScore}%`;
                document.getElementById('modalAttempts').textContent = maxAttempts;
                document.getElementById('modalInstructions').innerHTML = instructions.replace(/\n/g, '<br>');
                
                // Show modal
                quizPreviewModal.classList.add('active');
            }
            
            // Close Preview Modal
            closePreviewModal.addEventListener('click', function() {
                quizPreviewModal.classList.remove('active');
            });
            
            closePreviewBtn.addEventListener('click', function() {
                quizPreviewModal.classList.remove('active');
            });
            
            // Start Student Quiz
            startStudentQuizBtn.addEventListener('click', function() {
                quizPreviewModal.classList.remove('active');
                startStudentQuiz();
            });
            
            // Close Student Quiz Modal
            closeStudentQuizModal.addEventListener('click', function() {
                studentQuizModal.classList.remove('active');
                clearInterval(quizTimer);
            });
            
            // Start Student Quiz
            function startStudentQuiz() {
                const selectedQuestionsArray = Array.from(selectedQuestions);
                const selectedQuestionsData = questionsData.filter(q => selectedQuestions.has(q.id));
                
                if (selectedQuestionsData.length === 0) {
                    alert('No questions selected for the quiz.');
                    return;
                }
                
                // Reset quiz state
                currentQuestionIndex = 0;
                timeLeft = (parseInt(document.getElementById('quizHours').value || 0) * 60 * 60) + 
                          (parseInt(document.getElementById('quizMinutes').value || 30) * 60);
                
                // Load first question
                loadQuizQuestion(currentQuestionIndex, selectedQuestionsData);
                
                // Start timer
                startQuizTimer();
                
                // Show student quiz modal
                studentQuizModal.classList.add('active');
            }
            
            // Load Quiz Question
            function loadQuizQuestion(index, questions) {
                const question = questions[index];
                const container = document.getElementById('quizQuestionsContainer');
                
                container.innerHTML = `
                    <div style="margin-bottom: 30px;">
                        <h3 style="color: var(--light); margin-bottom: 20px;">${question.text}</h3>
                        <div style="display: flex; flex-direction: column; gap: 15px;">
                            ${question.options.map(option => `
                                <div style="padding: 15px; background: rgba(255, 255, 255, 0.03); border-radius: 8px; cursor: pointer; transition: all 0.3s ease;"
                                     class="quiz-option"
                                     data-option="${option.id}">
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <div style="width: 30px; height: 30px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: center; font-weight: 700;">
                                            ${option.id}
                                        </div>
                                        <div>${option.text}</div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    <div style="background: rgba(255, 255, 255, 0.03); padding: 15px; border-radius: 8px; margin-top: 20px;">
                        <div style="color: var(--gray); font-size: 0.9rem;">Points: ${question.points} | Difficulty: ${question.difficulty} | Time: ${question.time}</div>
                    </div>
                `;
                
                // Update question counter
                document.getElementById('currentQuestionNumber').textContent = index + 1;
                document.getElementById('totalQuizQuestions').textContent = questions.length;
                
                // Update navigation buttons
                document.getElementById('prevQuestionBtn').disabled = index === 0;
                document.getElementById('nextQuestionBtn').textContent = index === questions.length - 1 ? 'Submit' : 'Next <i class="fas fa-chevron-right"></i>';
                
                // Add event listeners to options
                document.querySelectorAll('.quiz-option').forEach(option => {
                    option.addEventListener('click', function() {
                        // Remove selected class from all options
                        document.querySelectorAll('.quiz-option').forEach(opt => {
                            opt.style.background = 'rgba(255, 255, 255, 0.03)';
                            opt.style.borderColor = 'transparent';
                        });
                        
                        // Add selected class to clicked option
                        this.style.background = 'rgba(108, 99, 255, 0.1)';
                        this.style.border = '1px solid var(--accent)';
                    });
                });
            }
            
            // Start Quiz Timer
            function startQuizTimer() {
                updateTimerDisplay();
                quizTimer = setInterval(function() {
                    timeLeft--;
                    updateTimerDisplay();
                    
                    if (timeLeft <= 0) {
                        clearInterval(quizTimer);
                        alert('Time is up! Quiz will be submitted automatically.');
                        submitQuiz();
                    }
                }, 1000);
            }
            
            // Update Timer Display
            function updateTimerDisplay() {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                document.getElementById('quizTimer').textContent = 
                    `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
            
            // Navigation Buttons for Student Quiz
            document.getElementById('prevQuestionBtn').addEventListener('click', function() {
                if (currentQuestionIndex > 0) {
                    currentQuestionIndex--;
                    const selectedQuestionsData = questionsData.filter(q => selectedQuestions.has(q.id));
                    loadQuizQuestion(currentQuestionIndex, selectedQuestionsData);
                }
            });
            
            document.getElementById('nextQuestionBtn').addEventListener('click', function() {
                const selectedQuestionsData = questionsData.filter(q => selectedQuestions.has(q.id));
                
                if (currentQuestionIndex < selectedQuestionsData.length - 1) {
                    currentQuestionIndex++;
                    loadQuizQuestion(currentQuestionIndex, selectedQuestionsData);
                } else {
                    submitQuiz();
                }
            });
            
            // Submit Quiz
            document.getElementById('submitQuizBtn').addEventListener('click', submitQuiz);
            
            function submitQuiz() {
                clearInterval(quizTimer);
                
                // Calculate score (in real app, this would check answers)
                const selectedQuestionsData = questionsData.filter(q => selectedQuestions.has(q.id));
                const totalQuestions = selectedQuestionsData.length;
                const score = Math.floor(Math.random() * 30) + 70; // Random score between 70-100
                const passingScore = parseInt(document.getElementById('passingScore').value);
                const passed = score >= passingScore;
                
                alert(`Quiz Submitted!\n\nScore: ${score}%\nPassing Score: ${passingScore}%\nStatus: ${passed ? 'PASSED ✓' : 'FAILED ✗'}\n\nIn a real application, this would show detailed results and analytics.`);
                
                studentQuizModal.classList.remove('active');
            }
            
            // Initialize form inputs for preview
            updatePreview();
        });
    </script>
</body>
</html>