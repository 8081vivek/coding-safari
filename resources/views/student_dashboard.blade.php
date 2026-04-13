<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Coding Safari Hackathon</title>
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
            --info: #17a2b8;
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        body {
            background-color: var(--darker);
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            overflow-x: hidden;
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

        /* Dashboard Layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.98));
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding: 25px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .student-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .student-avatar:hover {
            transform: scale(1.05);
        }

        .student-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }

        .avatar-upload {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 30px;
            height: 30px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            cursor: pointer;
            border: 2px solid var(--dark);
        }

        .student-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--light);
            margin-bottom: 5px;
        }

        .student-info p {
            color: var(--gray);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .student-info p i {
            color: var(--primary);
            font-size: 0.8rem;
        }

        .badge {
            display: inline-block;
            background: rgba(255, 107, 53, 0.1);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 10px;
            border: 1px solid rgba(255, 107, 53, 0.3);
        }

        /* Navigation */
        .nav-menu {
            list-style: none;
            margin-bottom: 30px;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: var(--gray);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--light);
            transform: translateX(5px);
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

        .nav-link .badge {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            margin: 0;
            background: rgba(255, 71, 87, 0.2);
            color: var(--danger);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Header */
        .header {
            height: var(--header-height);
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.3rem;
            cursor: pointer;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-box i {
            color: var(--gray);
            margin-right: 10px;
        }

        .search-box input {
            background: none;
            border: none;
            color: var(--light);
            width: 100%;
            outline: none;
        }

        .search-box input::placeholder {
            color: var(--gray);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--gray);
            font-size: 1.2rem;
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

        .points-display {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 8px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }

        .points-display i {
            color: #FFD700;
        }

        /* Dashboard Content */
        .content {
            padding: 30px;
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(108, 99, 255, 0.1));
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .welcome-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .welcome-text h1 span {
            color: var(--primary);
        }

        .welcome-text p {
            color: var(--gray);
        }

        .quick-action-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quick-action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.3);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(255, 107, 53, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .stat-trend {
            margin-top: 10px;
            font-size: 0.9rem;
            color: var(--secondary);
        }

        /* Section Styles */
        .section {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
        }

        .section-header h2 span {
            color: var(--primary);
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .filter-tab:hover {
            background: rgba(255, 107, 53, 0.1);
            color: var(--primary);
        }

        .filter-tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Assessment Cards */
        .assessment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .assessment-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .assessment-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.2);
        }

        .assessment-header {
            padding: 20px;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(108, 99, 255, 0.1));
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .assessment-code {
            font-family: monospace;
            font-size: 1.2rem;
            color: var(--primary);
            font-weight: 600;
        }

        .assessment-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-available {
            background: rgba(0, 196, 154, 0.1);
            color: var(--secondary);
        }

        .status-started {
            background: rgba(255, 165, 2, 0.1);
            color: var(--warning);
        }

        .status-completed {
            background: rgba(108, 99, 255, 0.1);
            color: var(--accent);
        }

        .assessment-body {
            padding: 20px;
        }

        .assessment-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--light);
        }

        .assessment-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .assessment-meta i {
            color: var(--primary);
            margin-right: 5px;
        }

        .assessment-progress {
            margin: 20px 0;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .assessment-footer {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .assessment-btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #e55a2b;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: rgba(255, 107, 53, 0.1);
        }

        .btn-success {
            background: var(--secondary);
            color: white;
        }

        .btn-success:hover {
            background: #00a87e;
        }

        .btn-info {
            background: var(--info);
            color: white;
        }

        /* Results Table */
        .results-table {
            width: 100%;
            border-collapse: collapse;
        }

        .results-table th {
            text-align: left;
            padding: 15px;
            color: var(--gray);
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .results-table td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .results-table tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .score-high {
            color: var(--secondary);
            font-weight: 600;
        }

        .score-medium {
            color: var(--warning);
            font-weight: 600;
        }

        .score-low {
            color: var(--danger);
            font-weight: 600;
        }

        /* Profile Form */
        .profile-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--light);
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: var(--light);
            font-family: inherit;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-group input[readonly] {
            background: rgba(255, 255, 255, 0.02);
            color: var(--gray);
        }

        /* Settings Options */
        .settings-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .settings-option:last-child {
            border-bottom: none;
        }

        .settings-info h4 {
            margin-bottom: 5px;
        }

        .settings-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Toggle Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.1);
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Hackathon Section */
        .hackathon-card {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(108, 99, 255, 0.1));
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .hackathon-card h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .hackathon-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .detail-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(255, 107, 53, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .team-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .team-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 15px;
            overflow: hidden;
        }

        .team-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-role {
            color: var(--primary);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.98), rgba(10, 10, 15, 0.98));
            border-radius: 15px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 10px;
        }

        .avatar-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 20px 0;
        }

        .avatar-option {
            cursor: pointer;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .avatar-option:hover {
            transform: scale(1.05);
        }

        .avatar-option.selected {
            border-color: var(--primary);
        }

        .avatar-option img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .modal-actions .btn {
            flex: 1;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--gray);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .search-box {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 0 15px;
            }

            .content {
                padding: 20px;
            }

            .welcome-banner {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .assessment-grid {
                grid-template-columns: 1fr;
            }

            .profile-form {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .search-box {
                display: none;
            }

            .hackathon-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .points-display span {
                display: none;
            }

            .header-right {
                gap: 10px;
            }

            .assessment-footer {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Grid Background -->
    <div class="grid-bg"></div>

    <!-- Dashboard -->
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="student-avatar" id="avatarBtn">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=FF6B35&color=fff&size=128" alt="Student" id="studentAvatar">
                    <div class="avatar-upload">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                <div class="student-info">
                    <h3>John Doe</h3>
                    <p><i class="fas fa-graduation-cap"></i> Computer Science</p>
                    <span class="badge">ID: CS2023001</span>
                </div>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#dashboard" class="nav-link active" data-tab="dashboard">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#assessments" class="nav-link" data-tab="assessments">
                        <i class="fas fa-question-circle"></i>
                        <span>My Assessments</span>
                        <span class="badge">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#results" class="nav-link" data-tab="results">
                        <i class="fas fa-chart-bar"></i>
                        <span>My Results</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#achievements" class="nav-link" data-tab="achievements">
                        <i class="fas fa-trophy"></i>
                        <span>Achievements</span>
                        <span class="badge">5</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#leaderboard" class="nav-link" data-tab="leaderboard">
                        <i class="fas fa-chart-line"></i>
                        <span>Leaderboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#resources" class="nav-link" data-tab="resources">
                        <i class="fas fa-book"></i>
                        <span>Learning Resources</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#hackathon" class="nav-link" data-tab="hackathon">
                        <i class="fas fa-code"></i>
                        <span>Hackathon</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile" class="nav-link" data-tab="profile">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" class="nav-link" data-tab="settings">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer" style="margin-top: auto;">
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
                <div class="header-left">
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search assessments, resources...">
                    </div>
                </div>

                <div class="header-right">
                    <div class="points-display">
                        <i class="fas fa-star"></i>
                        <span>2,450 Points</span>
                    </div>
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content">
                <!-- Dashboard Tab -->
                <div id="dashboard" class="tab-content active">
                    <!-- Welcome Banner -->
                    <div class="welcome-banner">
                        <div class="welcome-text">
                            <h1>Welcome back, <span>John!</span></h1>
                            <p>Ready to test your skills? New assessments are waiting for you.</p>
                        </div>
                        <button class="quick-action-btn" onclick="document.querySelector('[data-tab=\"assessments\"]').click()">
                            <i class="fas fa-play"></i> Start Assessment
                        </button>
                    </div>

                    <!-- Stats Grid -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="stat-value">12</div>
                            <div class="stat-label">Assessments Completed</div>
                            <div class="stat-trend">
                                <i class="fas fa-arrow-up"></i> +3 this week
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="stat-value">78%</div>
                            <div class="stat-label">Average Score</div>
                            <div class="stat-trend">
                                <i class="fas fa-arrow-up"></i> +5% improvement
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div class="stat-value">8</div>
                            <div class="stat-label">Hours Spent</div>
                            <div class="stat-trend">
                                <i class="fas fa-arrow-up"></i> +2h this week
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                            </div>
                            <div class="stat-value">#156</div>
                            <div class="stat-label">Global Rank</div>
                            <div class="stat-trend">
                                <i class="fas fa-arrow-up"></i> +23 positions
                            </div>
                        </div>
                    </div>

                    <!-- Available Assessments -->
                    <div class="section">
                        <div class="section-header">
                            <h2>Available <span>Assessments</span></h2>
                            <a href="#assessments" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="assessment-grid">
                            <div class="assessment-card">
                                <div class="assessment-header">
                                    <span class="assessment-code">JS101</span>
                                    <span class="assessment-status status-available">Available</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">JavaScript Fundamentals</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 20 Questions</span>
                                        <span><i class="fas fa-clock"></i> 30 mins</span>
                                        <span><i class="fas fa-signal"></i> Easy</span>
                                    </div>
                                    <p style="color: var(--gray); margin-bottom: 15px;">Test your knowledge of JavaScript basics including variables, functions, and control flow.</p>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="startAssessment('JS101')">
                                            <i class="fas fa-play"></i> Start Assessment
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="assessment-card">
                                <div class="assessment-header">
                                    <span class="assessment-code">PY201</span>
                                    <span class="assessment-status status-available">Available</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">Python Data Structures</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 25 Questions</span>
                                        <span><i class="fas fa-clock"></i> 40 mins</span>
                                        <span><i class="fas fa-signal"></i> Medium</span>
                                    </div>
                                    <p style="color: var(--gray); margin-bottom: 15px;">Master Python lists, tuples, dictionaries, and sets with practical problems.</p>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="startAssessment('PY201')">
                                            <i class="fas fa-play"></i> Start Assessment
                                        </button>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <!-- In Progress Assessments -->
                    <div class="section">
                        <div class="section-header">
                            <h2>In <span>Progress</span></h2>
                        </div>

                        <div class="assessment-grid">
                            <div class="assessment-card">
                                <div class="assessment-header">
                                    <span class="assessment-code">SQL301</span>
                                    <span class="assessment-status status-started">In Progress</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">Advanced SQL Queries</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 30 Questions</span>
                                        <span><i class="fas fa-clock"></i> 45 mins</span>
                                        <span><i class="fas fa-signal"></i> Hard</span>
                                    </div>
                                    <div class="assessment-progress">
                                        <div class="progress-info">
                                            <span>Progress</span>
                                            <span>60%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="continueAssessment('SQL301')">
                                            <i class="fas fa-play"></i> Continue
                                        </button>
                                        <button class="assessment-btn btn-secondary" onclick="reviewAssessment('SQL301')">
                                            <i class="fas fa-eye"></i> Review
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="assessment-card">
                                <div class="assessment-header">
                                    <span class="assessment-code">REACT401</span>
                                    <span class="assessment-status status-started">In Progress</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">React.js Essentials</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 25 Questions</span>
                                        <span><i class="fas fa-clock"></i> 35 mins</span>
                                        <span><i class="fas fa-signal"></i> Medium</span>
                                    </div>
                                    <div class="assessment-progress">
                                        <div class="progress-info">
                                            <span>Progress</span>
                                            <span>30%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 30%"></div>
                                        </div>
                                    </div>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="continueAssessment('REACT401')">
                                            <i class="fas fa-play"></i> Continue
                                        </button>
                                        <button class="assessment-btn btn-secondary" onclick="reviewAssessment('REACT401')">
                                            <i class="fas fa-eye"></i> Review
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assessments Tab -->
                <div id="assessments" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>My <span>Assessments</span></h2>
                        </div>

                        <div class="filter-tabs">
                            <span class="filter-tab active" data-filter="all">All</span>
                            <span class="filter-tab" data-filter="available">Available</span>
                            <span class="filter-tab" data-filter="in-progress">In Progress</span>
                            <span class="filter-tab" data-filter="completed">Completed</span>
                        </div>

                        <div class="assessment-grid">
                            <!-- Available Assessments -->
                            <div class="assessment-card" data-status="available">
                                <div class="assessment-header">
                                    <span class="assessment-code">JS101</span>
                                    <span class="assessment-status status-available">Available</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">JavaScript Fundamentals</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 20 Questions</span>
                                        <span><i class="fas fa-clock"></i> 30 mins</span>
                                        <span><i class="fas fa-signal"></i> Easy</span>
                                    </div>
                                    <p style="color: var(--gray); margin-bottom: 15px;">Test your knowledge of JavaScript basics including variables, functions, and control flow.</p>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="startAssessment('JS101')">
                                            <i class="fas fa-play"></i> Start Assessment
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="assessment-card" data-status="available">
                                <div class="assessment-header">
                                    <span class="assessment-code">PY201</span>
                                    <span class="assessment-status status-available">Available</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">Python Data Structures</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 25 Questions</span>
                                        <span><i class="fas fa-clock"></i> 40 mins</span>
                                        <span><i class="fas fa-signal"></i> Medium</span>
                                    </div>
                                    <p style="color: var(--gray); margin-bottom: 15px;">Master Python lists, tuples, dictionaries, and sets with practical problems.</p>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="startAssessment('PY201')">
                                            <i class="fas fa-play"></i> Start Assessment
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- In Progress Assessments -->
                            <div class="assessment-card" data-status="in-progress">
                                <div class="assessment-header">
                                    <span class="assessment-code">SQL301</span>
                                    <span class="assessment-status status-started">In Progress</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">Advanced SQL Queries</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 30 Questions</span>
                                        <span><i class="fas fa-clock"></i> 45 mins</span>
                                        <span><i class="fas fa-signal"></i> Hard</span>
                                    </div>
                                    <div class="assessment-progress">
                                        <div class="progress-info">
                                            <span>Progress</span>
                                            <span>60%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="continueAssessment('SQL301')">
                                            <i class="fas fa-play"></i> Continue
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="assessment-card" data-status="in-progress">
                                <div class="assessment-header">
                                    <span class="assessment-code">REACT401</span>
                                    <span class="assessment-status status-started">In Progress</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">React.js Essentials</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 25 Questions</span>
                                        <span><i class="fas fa-clock"></i> 35 mins</span>
                                        <span><i class="fas fa-signal"></i> Medium</span>
                                    </div>
                                    <div class="assessment-progress">
                                        <div class="progress-info">
                                            <span>Progress</span>
                                            <span>30%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 30%"></div>
                                        </div>
                                    </div>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-primary" onclick="continueAssessment('REACT401')">
                                            <i class="fas fa-play"></i> Continue
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Completed Assessments -->
                            <div class="assessment-card" data-status="completed">
                                <div class="assessment-header">
                                    <span class="assessment-code">HTML101</span>
                                    <span class="assessment-status status-completed">Completed</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">HTML & CSS Basics</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 15 Questions</span>
                                        <span><i class="fas fa-clock"></i> 20 mins</span>
                                    </div>
                                    <div class="assessment-progress">
                                        <div class="progress-info">
                                            <span>Score</span>
                                            <span class="score-high">85%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-secondary" onclick="viewResults('HTML101')">
                                            <i class="fas fa-eye"></i> View Results
                                        </button>
                                        <button class="assessment-btn btn-info" onclick="retakeAssessment('HTML101')">
                                            <i class="fas fa-redo"></i> Retake
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="assessment-card" data-status="completed">
                                <div class="assessment-header">
                                    <span class="assessment-code">CPP101</span>
                                    <span class="assessment-status status-completed">Completed</span>
                                </div>
                                <div class="assessment-body">
                                    <h3 class="assessment-title">C++ Programming Basics</h3>
                                    <div class="assessment-meta">
                                        <span><i class="fas fa-question-circle"></i> 20 Questions</span>
                                        <span><i class="fas fa-clock"></i> 30 mins</span>
                                    </div>
                                    <div class="assessment-progress">
                                        <div class="progress-info">
                                            <span>Score</span>
                                            <span class="score-medium">72%</span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 72%"></div>
                                        </div>
                                    </div>
                                    <div class="assessment-footer">
                                        <button class="assessment-btn btn-secondary" onclick="viewResults('CPP101')">
                                            <i class="fas fa-eye"></i> View Results
                                        </button>
                                        <button class="assessment-btn btn-info" onclick="retakeAssessment('CPP101')">
                                            <i class="fas fa-redo"></i> Retake
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Results Tab -->
                <div id="results" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>My <span>Results</span></h2>
                            <button class="btn btn-secondary" onclick="exportResults()">
                                <i class="fas fa-download"></i> Export Results
                            </button>
                        </div>

                        <table class="results-table">
                            <thead>
                                <tr>
                                    <th>Assessment</th>
                                    <th>Date</th>
                                    <th>Score</th>
                                    <th>Time Taken</th>
                                    <th>Rank</th>
                                    <th>Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>JavaScript Fundamentals</td>
                                    <td>2024-01-15</td>
                                    <td><span class="score-high">92%</span></td>
                                    <td>25 mins</td>
                                    <td>#12</td>
                                    <td><button class="btn btn-secondary" style="padding: 5px 10px;" onclick="downloadCertificate('JS101')"><i class="fas fa-download"></i> Download</button></td>
                                </tr>
                                <tr>
                                    <td>Python Data Structures</td>
                                    <td>2024-01-10</td>
                                    <td><span class="score-medium">78%</span></td>
                                    <td>35 mins</td>
                                    <td>#45</td>
                                    <td><button class="btn btn-secondary" style="padding: 5px 10px;" onclick="downloadCertificate('PY201')"><i class="fas fa-download"></i> Download</button></td>
                                </tr>
                                <tr>
                                    <td>HTML & CSS Basics</td>
                                    <td>2024-01-05</td>
                                    <td><span class="score-high">85%</span></td>
                                    <td>18 mins</td>
                                    <td>#28</td>
                                    <td><button class="btn btn-secondary" style="padding: 5px 10px;" onclick="downloadCertificate('HTML101')"><i class="fas fa-download"></i> Download</button></td>
                                </tr>
                                <tr>
                                    <td>C++ Programming Basics</td>
                                    <td>2023-12-28</td>
                                    <td><span class="score-medium">72%</span></td>
                                    <td>28 mins</td>
                                    <td>#67</td>
                                    <td><button class="btn btn-secondary" style="padding: 5px 10px;" onclick="downloadCertificate('CPP101')"><i class="fas fa-download"></i> Download</button></td>
                                </tr>
                                <tr>
                                    <td>Advanced SQL Queries</td>
                                    <td>2023-12-20</td>
                                    <td><span class="score-low">65%</span></td>
                                    <td>40 mins</td>
                                    <td>#89</td>
                                    <td><button class="btn btn-secondary" style="padding: 5px 10px;" onclick="downloadCertificate('SQL301')"><i class="fas fa-download"></i> Download</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Performance Chart -->
                    <div class="section">
                        <div class="section-header">
                            <h2>Performance <span>Overview</span></h2>
                        </div>
                        <div style="height: 300px; display: flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.02); border-radius: 10px;">
                            <p style="color: var(--gray);">Performance chart will be displayed here</p>
                        </div>
                    </div>
                </div>

                <!-- Achievements Tab -->
                <div id="achievements" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>My <span>Achievements</span></h2>
                        </div>

                        <div class="achievements-grid">
                            <div class="achievement-card">
                                <div class="achievement-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <div class="achievement-name">Quick Starter</div>
                                <div class="achievement-date">Completed first assessment</div>
                            </div>

                            <div class="achievement-card">
                                <div class="achievement-icon">
                                    <i class="fas fa-brain"></i>
                                </div>
                                <div class="achievement-name">Knowledge Seeker</div>
                                <div class="achievement-date">Completed 5 assessments</div>
                            </div>

                            <div class="achievement-card">
                                <div class="achievement-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="achievement-name">Top Performer</div>
                                <div class="achievement-date">Scored 90%+ in 3 assessments</div>
                            </div>

                            <div class="achievement-card">
                                <div class="achievement-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="achievement-name">Speed Demon</div>
                                <div class="achievement-date">Completed assessment in record time</div>
                            </div>

                            <div class="achievement-card locked">
                                <div class="achievement-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="achievement-name">Champion</div>
                                <div class="achievement-date">Reach top 10 on leaderboard</div>
                            </div>

                            <div class="achievement-card locked">
                                <div class="achievement-icon">
                                    <i class="fas fa-fire"></i>
                                </div>
                                <div class="achievement-name">Streak Master</div>
                                <div class="achievement-date">Complete assessments 7 days in a row</div>
                            </div>

                            <div class="achievement-card locked">
                                <div class="achievement-icon">
                                    <i class="fas fa-code-branch"></i>
                                </div>
                                <div class="achievement-name">Polyglot</div>
                                <div class="achievement-date">Master 5 different programming languages</div>
                            </div>

                            <div class="achievement-card locked">
                                <div class="achievement-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="achievement-name">Legend</div>
                                <div class="achievement-date">Complete all advanced assessments</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Tab -->
                <div id="leaderboard" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>Global <span>Leaderboard</span></h2>
                            <div class="filter-tabs">
                                <span class="filter-tab active">Weekly</span>
                                <span class="filter-tab">Monthly</span>
                                <span class="filter-tab">All Time</span>
                            </div>
                        </div>

                        <ul class="leaderboard-list">
                            <li class="leaderboard-item">
                                <div class="leaderboard-rank top-1">1</div>
                                <img src="https://ui-avatars.com/api/?name=Sarah+Wilson&background=FFD700&color=000" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">Sarah Wilson</div>
                                    <div class="leaderboard-score">Completed: 45 assessments</div>
                                </div>
                                <div class="leaderboard-points">15,430 pts</div>
                            </li>

                            <li class="leaderboard-item">
                                <div class="leaderboard-rank top-2">2</div>
                                <img src="https://ui-avatars.com/api/?name=Mike+Chen&background=C0C0C0&color=000" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">Mike Chen</div>
                                    <div class="leaderboard-score">Completed: 42 assessments</div>
                                </div>
                                <div class="leaderboard-points">14,890 pts</div>
                            </li>

                            <li class="leaderboard-item">
                                <div class="leaderboard-rank top-3">3</div>
                                <img src="https://ui-avatars.com/api/?name=Emily+Brown&background=CD7F32&color=fff" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">Emily Brown</div>
                                    <div class="leaderboard-score">Completed: 40 assessments</div>
                                </div>
                                <div class="leaderboard-points">14,210 pts</div>
                            </li>

                            <li class="leaderboard-item">
                                <div class="leaderboard-rank">4</div>
                                <img src="https://ui-avatars.com/api/?name=Alex+Kumar&background=6C63FF&color=fff" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">Alex Kumar</div>
                                    <div class="leaderboard-score">Completed: 38 assessments</div>
                                </div>
                                <div class="leaderboard-points">13,450 pts</div>
                            </li>

                            <li class="leaderboard-item">
                                <div class="leaderboard-rank">5</div>
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=FF6B35&color=fff" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">John Doe</div>
                                    <div class="leaderboard-score">Completed: 35 assessments</div>
                                </div>
                                <div class="leaderboard-points">12,890 pts</div>
                            </li>

                            <li class="leaderboard-item">
                                <div class="leaderboard-rank">6</div>
                                <img src="https://ui-avatars.com/api/?name=Lisa+Wang&background=00C49A&color=fff" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">Lisa Wang</div>
                                    <div class="leaderboard-score">Completed: 34 assessments</div>
                                </div>
                                <div class="leaderboard-points">12,450 pts</div>
                            </li>

                            <li class="leaderboard-item">
                                <div class="leaderboard-rank">7</div>
                                <img src="https://ui-avatars.com/api/?name=David+Miller&background=FFA502&color=fff" alt="Avatar" class="leaderboard-avatar">
                                <div class="leaderboard-info">
                                    <div class="leaderboard-name">David Miller</div>
                                    <div class="leaderboard-score">Completed: 32 assessments</div>
                                </div>
                                <div class="leaderboard-points">11,890 pts</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Resources Tab -->
                <div id="resources" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>Learning <span>Resources</span></h2>
                        </div>

                        <div class="resources-grid">
                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fab fa-js"></i>
                                </div>
                                <h3 class="resource-title">JavaScript Mastery</h3>
                                <div class="resource-meta">12 Lessons • 3 Hours</div>
                                <p style="color: var(--gray); margin-bottom: 15px;">Complete guide to modern JavaScript from basics to advanced concepts.</p>
                                <a href="#" class="resource-link">Start Learning <i class="fas fa-arrow-right"></i></a>
                            </div>

                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fab fa-python"></i>
                                </div>
                                <h3 class="resource-title">Python for Beginners</h3>
                                <div class="resource-meta">15 Lessons • 4 Hours</div>
                                <p style="color: var(--gray); margin-bottom: 15px;">Learn Python programming with hands-on examples and exercises.</p>
                                <a href="#" class="resource-link">Start Learning <i class="fas fa-arrow-right"></i></a>
                            </div>

                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fas fa-database"></i>
                                </div>
                                <h3 class="resource-title">SQL Fundamentals</h3>
                                <div class="resource-meta">10 Lessons • 2.5 Hours</div>
                                <p style="color: var(--gray); margin-bottom: 15px;">Master database queries and data manipulation with SQL.</p>
                                <a href="#" class="resource-link">Start Learning <i class="fas fa-arrow-right"></i></a>
                            </div>

                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fab fa-react"></i>
                                </div>
                                <h3 class="resource-title">React.js Guide</h3>
                                <div class="resource-meta">14 Lessons • 3.5 Hours</div>
                                <p style="color: var(--gray); margin-bottom: 15px;">Build modern web applications with React hooks and components.</p>
                                <a href="#" class="resource-link">Start Learning <i class="fas fa-arrow-right"></i></a>
                            </div>

                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fab fa-java"></i>
                                </div>
                                <h3 class="resource-title">Java Programming</h3>
                                <div class="resource-meta">16 Lessons • 4 Hours</div>
                                <p style="color: var(--gray); margin-bottom: 15px;">Object-oriented programming with Java for beginners.</p>
                                <a href="#" class="resource-link">Start Learning <i class="fas fa-arrow-right"></i></a>
                            </div>

                            <div class="resource-card">
                                <div class="resource-icon">
                                    <i class="fas fa-code"></i>
                                </div>
                                <h3 class="resource-title">Data Structures</h3>
                                <div class="resource-meta">12 Lessons • 3 Hours</div>
                                <p style="color: var(--gray); margin-bottom: 15px;">Essential data structures and algorithms explained.</p>
                                <a href="#" class="resource-link">Start Learning <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hackathon Tab -->
                <div id="hackathon" class="tab-content">
                    <div class="hackathon-card">
                        <h3>Coding Safari Hackathon 2024</h3>
                        <p style="color: var(--gray); font-size: 1.1rem;">Join the ultimate coding competition and win amazing prizes!</p>
                        
                        <div class="hackathon-details">
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div>
                                    <h4>Start Date</h4>
                                    <p style="color: var(--gray);">March 15, 2024</p>
                                </div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h4>Duration</h4>
                                    <p style="color: var(--gray);">48 Hours</p>
                                </div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h4>Team Size</h4>
                                    <p style="color: var(--gray);">2-4 Members</p>
                                </div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div>
                                    <h4>Prize Pool</h4>
                                    <p style="color: var(--gray);">$10,000</p>
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center;">
                            <button class="btn btn-primary" style="padding: 15px 40px;" onclick="registerHackathon()">
                                <i class="fas fa-paper-plane"></i> Register Now
                            </button>
                        </div>
                    </div>

                    <div class="section">
                        <div class="section-header">
                            <h2>My <span>Team</span></h2>
                            <button class="btn btn-secondary" onclick="inviteTeammate()">
                                <i class="fas fa-user-plus"></i> Invite Teammate
                            </button>
                        </div>

                        <div class="team-grid">
                            <div class="team-card">
                                <div class="team-avatar">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=FF6B35&color=fff" alt="Team Member">
                                </div>
                                <h4>John Doe</h4>
                                <p class="team-role">Team Lead</p>
                            </div>

                            <div class="team-card">
                                <div class="team-avatar">
                                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=6C63FF&color=fff" alt="Team Member">
                                </div>
                                <h4>Jane Smith</h4>
                                <p class="team-role">Backend Developer</p>
                            </div>

                            <div class="team-card">
                                <div class="team-avatar">
                                    <img src="https://ui-avatars.com/api/?name=Bob+Johnson&background=00C49A&color=fff" alt="Team Member">
                                </div>
                                <h4>Bob Johnson</h4>
                                <p class="team-role">Frontend Developer</p>
                            </div>

                            <div class="team-card">
                                <div class="team-avatar">
                                    <img src="https://ui-avatars.com/api/?name=Alice+Williams&background=FFA502&color=fff" alt="Team Member">
                                </div>
                                <h4>Alice Williams</h4>
                                <p class="team-role">UI/UX Designer</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Tab -->
                <div id="profile" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>My <span>Profile</span></h2>
                            <button class="btn btn-primary" onclick="saveProfile()">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>

                        <form class="profile-form">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" value="John Doe">
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" value="john.doe@example.com">
                            </div>

                            <div class="form-group">
                                <label>Student ID</label>
                                <input type="text" value="CS2023001" readonly>
                            </div>

                            <div class="form-group">
                                <label>College/University</label>
                                <input type="text" value="Tech University">
                            </div>

                            <div class="form-group">
                                <label>Course/Major</label>
                                <input type="text" value="Computer Science">
                            </div>

                            <div class="form-group">
                                <label>Year of Study</label>
                                <select>
                                    <option>1st Year</option>
                                    <option>2nd Year</option>
                                    <option selected>3rd Year</option>
                                    <option>4th Year</option>
                                    <option>Graduate</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="tel" value="+1 234 567 8900">
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" value="2002-05-15">
                            </div>

                            <div class="form-group full-width">
                                <label>Bio</label>
                                <textarea rows="4">Passionate about coding and always eager to learn new technologies. Love participating in hackathons and coding competitions.</textarea>
                            </div>

                            <div class="form-group full-width">
                                <label>Skills</label>
                                <input type="text" value="JavaScript, Python, React, Node.js, SQL">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Settings Tab -->
                <div id="settings" class="tab-content">
                    <div class="section">
                        <div class="section-header">
                            <h2>Account <span>Settings</span></h2>
                        </div>

                        <div class="settings-option">
                            <div class="settings-info">
                                <h4>Email Notifications</h4>
                                <p>Receive email updates about new assessments and results</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="settings-option">
                            <div class="settings-info">
                                <h4>Push Notifications</h4>
                                <p>Get browser notifications for important updates</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="settings-option">
                            <div class="settings-info">
                                <h4>Public Profile</h4>
                                <p>Make your profile visible to other students</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="settings-option">
                            <div class="settings-info">
                                <h4>Show on Leaderboard</h4>
                                <p>Display your name on public leaderboards</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="settings-option">
                            <div class="settings-info">
                                <h4>Dark Mode</h4>
                                <p>Toggle between light and dark theme</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div style="margin-top: 30px;">
                            <button class="btn btn-primary" style="margin-right: 15px;" onclick="saveSettings()">
                                <i class="fas fa-save"></i> Save Settings
                            </button>
                            <button class="btn btn-secondary" onclick="changePassword()">
                                <i class="fas fa-key"></i> Change Password
                            </button>
                        </div>
                    </div>

                    <div class="section">
                        <h3 style="margin-bottom: 20px;">Danger Zone</h3>
                        <div class="settings-option">
                            <div class="settings-info">
                                <h4>Delete Account</h4>
                                <p>Permanently delete your account and all data</p>
                            </div>
                            <button class="btn btn-secondary" style="border-color: var(--danger); color: var(--danger);" onclick="deleteAccount()">
                                Delete Account
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="footer">
                    <p>&copy; 2024 Coding Safari Hackathon. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Avatar Selection Modal -->
    <div class="modal" id="avatarModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Choose Your Avatar</h2>
                <p>Select a cool avatar for your profile</p>
            </div>

            <div class="avatar-options">
                <div class="avatar-option selected">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=FF6B35&color=fff&size=128" alt="Avatar 1">
                </div>
                <div class="avatar-option">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=00C49A&color=fff&size=128" alt="Avatar 2">
                </div>
                <div class="avatar-option">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=6C63FF&color=fff&size=128" alt="Avatar 3">
                </div>
                <div class="avatar-option">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=FFA502&color=fff&size=128" alt="Avatar 4">
                </div>
                <div class="avatar-option">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=FF4757&color=fff&size=128" alt="Avatar 5">
                </div>
                <div class="avatar-option">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=A020F0&color=fff&size=128" alt="Avatar 6">
                </div>
            </div>

            <div class="modal-actions">
                <button class="btn btn-secondary" id="closeAvatarModal">Cancel</button>
                <button class="btn btn-primary" id="saveAvatar">Save Avatar</button>
            </div>
        </div>
    </div>

    <style>
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #e55a2b;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: rgba(255, 107, 53, 0.1);
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const sidebar = document.getElementById('sidebar');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const navLinks = document.querySelectorAll('.nav-link[data-tab]');
            const tabContents = document.querySelectorAll('.tab-content');
            const avatarBtn = document.getElementById('avatarBtn');
            const avatarModal = document.getElementById('avatarModal');
            const closeAvatarModal = document.getElementById('closeAvatarModal');
            const saveAvatar = document.getElementById('saveAvatar');
            const logoutBtn = document.getElementById('logoutBtn');
            const notificationBtn = document.querySelector('.notification-btn');

            // Filter tabs for assessments
            const filterTabs = document.querySelectorAll('.filter-tab');

            // Mobile Menu Toggle
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024 && 
                    !sidebar.contains(e.target) && 
                    !mobileMenuBtn.contains(e.target) && 
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });

            // Tab Switching
            function activateTab(tabId) {
                navLinks.forEach(link => link.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                const activeLink = document.querySelector(`.nav-link[data-tab="${tabId}"]`);
                const activeContent = document.getElementById(tabId);

                if (activeLink && activeContent) {
                    activeLink.classList.add('active');
                    activeContent.classList.add('active');
                    localStorage.setItem('activeStudentTab', tabId);
                }
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');
                    activateTab(tabId);

                    if (window.innerWidth <= 1024) {
                        sidebar.classList.remove('active');
                    }
                });
            });

            // Restore saved tab
            const savedTab = localStorage.getItem('activeStudentTab');
            if (savedTab && document.getElementById(savedTab)) {
                activateTab(savedTab);
            } else {
                activateTab('dashboard');
            }

            // Assessment Filtering
            filterTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                    filterTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    if (filter) {
                        const cards = document.querySelectorAll('.assessment-card[data-status]');
                        cards.forEach(card => {
                            if (filter === 'all' || card.dataset.status === filter) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    }
                });
            });

            // Avatar Modal
            if (avatarBtn) {
                avatarBtn.addEventListener('click', function() {
                    avatarModal.classList.add('active');
                });
            }

            if (closeAvatarModal) {
                closeAvatarModal.addEventListener('click', function() {
                    avatarModal.classList.remove('active');
                });
            }

            if (saveAvatar) {
                saveAvatar.addEventListener('click', function() {
                    const selectedAvatar = document.querySelector('.avatar-option.selected img');
                    if (selectedAvatar) {
                        document.getElementById('studentAvatar').src = selectedAvatar.src;
                    }
                    avatarModal.classList.remove('active');
                });
            }

            // Avatar option selection
            const avatarOptions = document.querySelectorAll('.avatar-option');
            avatarOptions.forEach(option => {
                option.addEventListener('click', function() {
                    avatarOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (e.target === avatarModal) {
                    avatarModal.classList.remove('active');
                }
            });

            // Logout
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm('Are you sure you want to logout?')) {
                        alert('Logged out successfully!');
                        // window.location.href = 'login.html';
                    }
                });
            }

            // Notification
            if (notificationBtn) {
                notificationBtn.addEventListener('click', function() {
                    alert('New notifications:\n• New assessment available: Advanced JavaScript\n• Your team has a new message\n• Achievement unlocked: Quick Starter!');
                });
            }

            // Escape key handlers
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                    }
                    if (avatarModal.classList.contains('active')) {
                        avatarModal.classList.remove('active');
                    }
                }
            });

            // Window resize handler
            window.addEventListener('resize', function() {
                if (window.innerWidth > 1024) {
                    sidebar.classList.remove('active');
                }
            });

            // Search functionality
            const searchInput = document.querySelector('.search-box input');
            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    if (e.key === 'Enter') {
                        alert('Searching for: ' + this.value);
                    }
                });
            }
        });

        // Assessment Functions
        function startAssessment(code) {
            alert(`Starting assessment: ${code}`);
            // window.location.href = `assessment.html?code=${code}`;
        }

        function continueAssessment(code) {
            alert(`Continuing assessment: ${code}`);
            // window.location.href = `assessment.html?code=${code}&continue=true`;
        }

        function reviewAssessment(code) {
            alert(`Reviewing assessment: ${code}`);
            // window.location.href = `review.html?code=${code}`;
        }

        function viewResults(code) {
            alert(`Viewing results for: ${code}`);
            // window.location.href = `results.html?code=${code}`;
        }

        function retakeAssessment(code) {
            if (confirm('Are you sure you want to retake this assessment?')) {
                alert(`Retaking assessment: ${code}`);
                // window.location.href = `assessment.html?code=${code}&retake=true`;
            }
        }

        function downloadCertificate(code) {
            alert(`Downloading certificate for: ${code}`);
        }

        function exportResults() {
            alert('Exporting results...');
        }

        // Hackathon Functions
        function registerHackathon() {
            alert('Registered for Hackathon successfully!');
        }

        function inviteTeammate() {
            const email = prompt('Enter teammate email address:');
            if (email) {
                alert(`Invitation sent to ${email}`);
            }
        }

        // Profile Functions
        function saveProfile() {
            alert('Profile saved successfully!');
        }

        // Settings Functions
        function saveSettings() {
            alert('Settings saved successfully!');
        }

        function changePassword() {
            alert('Password change requested');
        }

        function deleteAccount() {
            if (confirm('Are you absolutely sure? This action cannot be undone.')) {
                if (confirm('Type "DELETE" to confirm:')) {
                    alert('Account deleted');
                }
            }
        }
    </script>
</body>
</html>