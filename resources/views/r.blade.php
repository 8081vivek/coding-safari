<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Coding Safari Hackathon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    
    body {
        background-color: var(--darker);
        color: var(--light);
        font-family: 'Source Serif Pro', serif;
        line-height: 1.6;
        overflow-x: hidden;
        min-height: 100vh;
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
        min-height: 100vh;
    }
    
    /* Sidebar Styles */
    .sidebar {
        width: var(--sidebar-width);
        background: rgba(10, 10, 15, 0.98);
        backdrop-filter: blur(15px);
        border-right: 1px solid rgba(255, 255, 255, 0.08);
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
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
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
        margin-bottom: 8px;
    }
    
    .nav-link {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 16px;
        color: var(--gray);
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .nav-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: var(--light);
    }
    
    .nav-link.active {
        background: rgba(255, 107, 53, 0.12);
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
        min-height: 100vh;
        background: linear-gradient(135deg, rgba(5, 5, 7, 0.9), rgba(10, 10, 15, 0.9));
    }
    
    /* Header */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
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
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .notification-btn:hover {
        background: rgba(255, 255, 255, 0.05);
        color: var(--light);
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
        gap: 12px;
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .admin-profile:hover {
        background: rgba(255, 255, 255, 0.08);
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
    
    /* Dashboard Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    
    .stat-card {
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        padding: 25px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: transform 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .stat-card.primary {
        border-top: 4px solid var(--primary);
    }
    
    .stat-card.secondary {
        border-top: 4px solid var(--secondary);
    }
    
    .stat-card.accent {
        border-top: 4px solid var(--accent);
    }
    
    .stat-card.warning {
        border-top: 4px solid var(--warning);
    }
    
    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .stat-header i {
        font-size: 2rem;
        color: var(--gray);
    }
    
    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--light);
        margin-bottom: 10px;
    }
    
    .stat-label {
        color: var(--gray);
        font-size: 1rem;
    }
    
    /* Section Styles */
    .dashboard-section {
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid rgba(255, 255, 255, 0.08);
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
    
    /* Button Styles */
    .btn {
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        font-family: 'Source Serif Pro', serif;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary {
        background-color: var(--primary);
        color: white;
    }
    
    .btn-primary:hover {
        background-color: #e55a2b;
        transform: translateY(-2px);
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
    
    /* Table Styles */
    .table-container {
        overflow-x: auto;
        margin-top: 20px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }
    
    thead {
        background: rgba(255, 255, 255, 0.05);
    }
    
    th {
        padding: 16px;
        text-align: left;
        color: var(--gray);
        font-weight: 600;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    td {
        padding: 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    tr:hover {
        background: rgba(255, 255, 255, 0.02);
    }
    
    /* Status Badges */
    .status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .status.active {
        background: rgba(0, 196, 154, 0.1);
        color: var(--secondary);
        border: 1px solid rgba(0, 196, 154, 0.2);
    }
    
    .status.pending {
        background: rgba(255, 165, 2, 0.1);
        color: var(--warning);
        border: 1px solid rgba(255, 165, 2, 0.2);
    }
    
    .status.inactive {
        background: rgba(255, 71, 87, 0.1);
        color: var(--danger);
        border: 1px solid rgba(255, 71, 87, 0.2);
    }
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
    }
    
    .action-btn {
        padding: 6px 10px;
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: var(--gray);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .action-btn:hover {
        background: rgba(255, 107, 53, 0.2);
        color: var(--primary);
        border-color: rgba(255, 107, 53, 0.3);
    }
    
    /* Quiz Management Specific */
    .quiz-management-container {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 30px;
        align-items: start;
    }
    
    .categories-sidebar {
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        padding: 25px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        height: calc(100vh - 200px);
        overflow-y: auto;
        position: sticky;
        top: 20px;
    }
    
    .categories-sidebar h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: var(--light);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .categories-sidebar h3 i {
        color: var(--primary);
    }
    
    .category-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .category-item {
        padding: 16px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.08);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .category-item:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.12);
    }
    
    .category-item.active {
        background: rgba(108, 99, 255, 0.1);
        border-color: var(--accent);
    }
    
    .category-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .category-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .category-details h4 {
        font-weight: 600;
        color: var(--light);
        margin-bottom: 4px;
    }
    
    .category-details p {
        font-size: 0.85rem;
        color: var(--gray);
    }
    
    .question-count {
        background: rgba(255, 107, 53, 0.1);
        color: var(--primary);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .add-category-btn {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background: rgba(0, 196, 154, 0.1);
        border: 1px dashed var(--secondary);
        color: var(--secondary);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    .add-category-btn:hover {
        background: rgba(0, 196, 154, 0.2);
    }
    
    /* Questions Panel */
    .questions-panel {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .questions-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .questions-header h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: var(--light);
    }
    
    .questions-header h3 span {
        color: var(--primary);
    }
    
    .questions-actions {
        display: flex;
        gap: 12px;
    }
    
    /* Questions Container */
    .questions-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
        max-height: none;
        overflow-y: visible;
        padding: 0;
    }
    
    .question-card {
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        padding: 25px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }
    
    .question-card:hover {
        border-color: rgba(255, 255, 255, 0.12);
        transform: translateY(-3px);
    }
    
    .question-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }
    
    .question-text {
        font-size: 1.2rem;
        color: var(--light);
        margin-bottom: 20px;
        line-height: 1.6;
    }
    
    .options-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 20px;
    }
    
    .option-item {
        padding: 14px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .option-item.correct {
        background: rgba(0, 196, 154, 0.1);
        border-color: rgba(0, 196, 154, 0.3);
    }
    
    .option-marker {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: var(--gray);
        flex-shrink: 0;
    }
    
    .option-item.correct .option-marker {
        background: var(--secondary);
        color: white;
    }
    
    .option-text {
        flex: 1;
        color: var(--light);
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    .question-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .question-meta {
        display: flex;
        gap: 15px;
        color: var(--gray);
        font-size: 0.9rem;
    }
    
    /* Form Styles */
    .quiz-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .form-group {
        margin-bottom: 20px;
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
        border-radius: 8px;
        color: var(--light);
        font-family: 'Source Serif Pro', serif;
        font-size: 1rem;
    }
    
    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }
    
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary);
    }
    
    /* Create Quiz Specific Styles */
    .quiz-creation-container {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 30px;
        margin-top: 20px;
    }
    
    .quiz-form-section {
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .questions-selection-section {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .questions-selection-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .questions-selection-header h3 {
        font-family: 'Playfair Display', serif;
        color: var(--light);
    }
    
    .selected-count {
        background: var(--primary);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .questions-filter {
        padding: 20px;
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .filter-btn {
        padding: 8px 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 6px;
        color: var(--gray);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    
    .filter-btn.active {
        background: rgba(108, 99, 255, 0.2);
        color: var(--accent);
        border-color: var(--accent);
    }
    
    .questions-list {
        flex: 1;
        overflow-y: auto;
        max-height: 400px;
        padding: 20px;
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .question-select-card {
        padding: 16px;
        margin-bottom: 15px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .question-select-card:hover {
        border-color: rgba(255, 255, 255, 0.12);
        transform: translateY(-2px);
    }
    
    .question-select-card.selected {
        background: rgba(108, 99, 255, 0.1);
        border-color: var(--accent);
    }
    
    .question-select-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .question-select-text {
        color: var(--light);
        margin-bottom: 10px;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    .question-checkbox {
        width: 20px;
        height: 20px;
        border-radius: 4px;
        border: 2px solid var(--gray);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .question-select-card.selected .question-checkbox {
        background: var(--accent);
        border-color: var(--accent);
    }
    
    .question-checkbox i {
        font-size: 0.8rem;
        color: white;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .question-select-card.selected .question-checkbox i {
        opacity: 1;
    }
    
    .selected-summary {
        padding: 20px;
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: var(--gray);
    }
    
    .summary-value {
        color: var(--light);
        font-weight: 600;
    }
    
    .summary-total {
        display: flex;
        justify-content: space-between;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        color: var(--light);
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .quiz-preview {
        padding: 20px;
        background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        text-align: center;
    }
    
    .preview-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: var(--light);
        margin-bottom: 20px;
    }
    
    .preview-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .preview-stat {
        padding: 15px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 8px;
    }
    
    .preview-stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--light);
        margin-bottom: 5px;
    }
    
    .preview-stat-label {
        font-size: 0.9rem;
        color: var(--gray);
    }
    
    .btn-small {
        padding: 8px 16px;
        font-size: 0.9rem;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .time-input-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .time-input {
        width: 70px;
        text-align: center;
    }
    
    .time-label {
        color: var(--gray);
        font-size: 0.9rem;
    }
    
    /* Modal Styles */
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
        border-radius: 12px;
        padding: 40px;
        width: 90%;
        max-width: 900px;
        max-height: 90vh;
        overflow-y: auto;
        border: 1px solid rgba(255, 255, 255, 0.1);
        animation: slideUp 0.3s ease;
    }
    
    @keyframes slideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .modal-header h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: var(--light);
    }
    
    .close-modal {
        background: none;
        border: none;
        color: var(--gray);
        font-size: 1.5rem;
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .close-modal:hover {
        background: rgba(255, 255, 255, 0.05);
        color: var(--light);
    }
    
    /* Question Upload Form */
    .question-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    
    .options-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .option-input-group {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 8px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .option-input-group label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        cursor: pointer;
    }
    
    .option-input-group input[type="text"] {
        margin-bottom: 10px;
    }
    
    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .form-actions .btn {
        flex: 1;
    }
    
    /* Category Modal */
    .category-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .icon-selector {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        margin-top: 10px;
    }
    
    .icon-option {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.03);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.2rem;
        color: var(--gray);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .icon-option:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.1);
    }
    
    .icon-option.selected {
        background: rgba(108, 99, 255, 0.2);
        color: var(--accent);
        border: 2px solid var(--accent);
    }
    
    /* Tabs */
    .tabs {
        display: flex;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        margin-bottom: 25px;
        flex-wrap: wrap;
    }
    
    .tab {
        padding: 15px 25px;
        cursor: pointer;
        color: var(--gray);
        font-weight: 600;
        position: relative;
        white-space: nowrap;
    }
    
    .tab:hover {
        color: var(--light);
    }
    
    .tab.active {
        color: var(--primary);
    }
    
    .tab.active:after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--primary);
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
    
    /* Footer */
    .footer {
        text-align: center;
        padding: 30px;
        margin-top: 50px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        color: var(--gray);
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .quiz-management-container {
            grid-template-columns: 1fr;
        }
        
        .quiz-creation-container {
            grid-template-columns: 1fr;
        }
        
        .categories-sidebar {
            width: 100%;
            height: auto;
            position: static;
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
        
        .options-grid {
            grid-template-columns: 1fr;
        }
        
        .options-container {
            grid-template-columns: 1fr;
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
        }
        
        .mobile-menu-btn {
            display: block;
        }
        
        .header {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }
        
        .header-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .dashboard-section {
            padding: 25px;
        }
        
        .section-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .questions-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .questions-actions {
            width: 100%;
        }
        
        .questions-actions .btn {
            width: 100%;
            justify-content: center;
        }
        
        .question-footer {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .questions-container {
            grid-template-columns: 1fr;
        }
        
        .quiz-form {
            grid-template-columns: 1fr;
        }
        
        .preview-stats {
            grid-template-columns: 1fr;
        }
        
        .modal-content {
            padding: 25px;
        }
    }
    
    @media (max-width: 480px) {
        .main-content {
            padding: 20px;
        }
        
        .tabs {
            overflow-x: auto;
            flex-wrap: nowrap;
        }
        
        .tab {
            padding: 12px 15px;
            font-size: 0.9rem;
        }
        
        .icon-selector {
            grid-template-columns: repeat(4, 1fr);
        }
        
        .modal-content {
            padding: 20px;
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
                    <a href="#dashboard" class="nav-link active" data-tab="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#quiz-management" class="nav-link" data-tab="quiz-management">
                        <i class="fas fa-question-circle"></i>
                        <span>Quiz Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#students" class="nav-link" data-tab="students">
                        <i class="fas fa-users"></i>
                        <span>Student Registration</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#results" class="nav-link" data-tab="results">
                        <i class="fas fa-chart-line"></i>
                        <span>Quiz Results</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#create-quiz" class="nav-link" data-tab="create-quiz">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create Quiz</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#homepage" class="nav-link" data-tab="homepage">
                        <i class="fas fa-home"></i>
                        <span>Homepage Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#hackathon" class="nav-link" data-tab="hackathon">
                        <i class="fas fa-trophy"></i>
                        <span>Hackathon Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" class="nav-link" data-tab="settings">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            
          <div class="logout-section">
  <a href="#" class="nav-link" id="logoutBtn">
    <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span>
  </a>

  <form id="logoutForm" action="1@logout%$" method="POST" style="display:none;">
    @csrf
  </form>
</div>

<script>
document.getElementById('logoutBtn').addEventListener('click', function (e) {
  e.preventDefault();
  document.getElementById('logoutForm').submit();
});
</script>

        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div>
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Admin <span>Dashboard</span></h1>
                    <p style="color: var(--gray); margin-top: 5px;">Welcome back, Admin! Here's what's happening with Coding Safari Hackathon.</p>
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
            
            <!-- Dashboard Content -->
            <div id="dashboard" class="tab-content active">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card primary">
                        <div class="stat-header">
                            <i class="fas fa-users"></i>
                            <span class="stat-label">Total Students</span>
                        </div>
                        <div class="stat-value">1,247</div>
                        <div style="color: var(--secondary);">+15% this week</div>
                    </div>
                    
                    <div class="stat-card secondary">
                        <div class="stat-header">
                            <i class="fas fa-question-circle"></i>
                            <span class="stat-label">Active Quizzes</span>
                        </div>
                        <div class="stat-value">8</div>
                        <div style="color: var(--secondary);">2 new this month</div>
                    </div>
                    
                    <div class="stat-card accent">
                        <div class="stat-header">
                            <i class="fas fa-chart-line"></i>
                            <span class="stat-label">Avg. Score</span>
                        </div>
                        <div class="stat-value">78.5%</div>
                        <div style="color: var(--secondary);">+5.2% improvement</div>
                    </div>
                    
                    <div class="stat-card warning">
                        <div class="stat-header">
                            <i class="fas fa-trophy"></i>
                            <span class="stat-label">Hackathon Teams</span>
                        </div>
                        <div class="stat-value">42</div>
                        <div style="color: var(--secondary);">Registered for 2023</div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Recent <span>Activity</span></h2>
                    </div>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Activity</th>
                                    <th>Quiz</th>
                                    <th>Score</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=6C63FF&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>Rahul Sharma</div>
                                        </div>
                                    </td>
                                    <td>Completed Quiz</td>
                                    <td>JavaScript Fundamentals</td>
                                    <td>92%</td>
                                    <td>10 min ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=00C49A&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>Priya Patel</div>
                                        </div>
                                    </td>
                                    <td>Registered</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>25 min ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=FF6B35&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>Amit Kumar</div>
                                        </div>
                                    </td>
                                    <td>Submitted Project</td>
                                    <td>Hackathon 2023</td>
                                    <td>Pending</td>
                                    <td>1 hour ago</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Quiz Management -->
            <div id="quiz-management" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Quiz <span>Management</span></h2>
                        <div class="questions-actions">
                            <button class="btn btn-secondary" id="importQuestionsBtn">
                                <i class="fas fa-file-import"></i> Import CSV
                            </button>
                            
                        </div>
                    </div>
                    
                    
                    <div class="quiz-management-container">
                        <!-- Categories Sidebar -->
                        <div class="categories-sidebar">
                            <h3><i class="fas fa-layer-group"></i> Quiz Categories</h3>
                            
                            <div class="category-list" id="categoryList">
                                @foreach($data as $x)
                                <div class="category-item " data-category="{{ strtolower($x->name) }}<">
                                    <div class="category-info">
                                        <div class="category-icon" style="background: rgba(255, 193, 7, 0.1); color: #FFC107;">
                                            <i class="fab fa-{{$x->course_icon}}"></i>
                                        </div>
                                        <div class="category-details">
                                            <h4>{{$x->name}}</h4>
                                            <p>{{$x->description}}</p>
                                        </div>

                                    </div>
                                 
                                      <a href="{{ url('quiz/vp8081/add/'.$x->course_id) }}"> <button class="btn btn-primary" id="addQuestionBtn">
                                <i class="fas fa-plus"></i>
                            </button></a>
                                </div>
                                @endforeach
                                
                               
                                  
                            </div>
                            
                           <button class="add-category-btn" id="addCategoryBtn">
                                <i class="fas fa-plus-circle"></i>
                                Add New Category
                            </button> </a> 
                        </div>
                        
                        <!-- Questions Panel -->
                        <div class="questions-panel">
                            <div class="questions-header">
                                <h3>ALL <span>Questions</span></h3>
                            </div>
                            


<div class="question">
    <div class="questions-container" id="questionsContainer">

    @foreach ($dataQuestion as $q)
        <!-- Question Card -->
        <div class="question-card">

            <div class="question-header">
                <span style="color: var(--primary); font-weight:600;">Q1</span>
                <span style="color: var(--warning); font-weight:600;">Medium</span>
            </div>

            <div class="question-text">
                {{$q->question_name}}
            </div>

            <div class="options-grid">
                <div class="option-item correct">
                    <div class="option-marker">A</div>
                    <div class="option-text">array.push()</div>
                </div>

                <div class="option-item">
                    <div class="option-marker">B</div>
                    <div class="option-text">array.pop()</div>
                </div>

                <div class="option-item">
                    <div class="option-marker">C</div>
                    <div class="option-text">array.shift()</div>
                </div>

                <div class="option-item">
                    <div class="option-marker">D</div>
                    <div class="option-text">array.unshift()</div>
                </div>
            </div>

            <div class="question-footer">
                <div class="question-meta">
                    <span><i class="fas fa-star"></i> 5 points</span>
                    <span><i class="fas fa-calendar"></i> 2024-01-12</span>
                </div>

                <div class="question-actions">
                    <button class="action-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>

        </div>

    </div>
    @endforeach
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Create New Quiz -->
            <div id="create-quiz" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Create <span>New Quiz</span></h2>
                        <p style="color: var(--gray);">Design a quiz for students by selecting questions and configuring settings</p>
                    </div>
                    
                    <!-- Quiz Creation Container -->
                    <div class="quiz-creation-container">
                        <!-- Quiz Form Section -->
                        <div class="quiz-form-section">
                            <div class="section-header">
                                <h3>Quiz <span>Details</span></h3>
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
            
            <!-- Student Registration -->
            <div id="students" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Student <span>Registration</span></h2>
                        <div>
                            <button class="btn btn-secondary" style="margin-right: 10px;">
                                <i class="fas fa-download"></i> Export
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> Add Student
                            </button>
                        </div>
                    </div>
                    
                    <!-- Student List -->
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>College</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>CS2023001</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=6C63FF&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>Rahul Sharma</div>
                                        </div>
                                    </td>
                                    <td>rahul.sharma@college.edu</td>
                                    <td>GPK College</td>
                                    <td>2023-10-15</td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn" title="Send Login Details">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>CS2023002</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=00C49A&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>Priya Patel</div>
                                        </div>
                                    </td>
                                    <td>priya.patel@college.edu</td>
                                    <td>ABC College</td>
                                    <td>2023-10-14</td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn" title="Send Login Details">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Quiz Results -->
            <div id="results" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Quiz <span>Results</span></h2>
                        <div>
                            <button class="btn btn-secondary" style="margin-right: 10px;">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-chart-bar"></i> Generate Report
                            </button>
                        </div>
                    </div>
                    
                    <!-- Results Table -->
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Student</th>
                                    <th>Quiz</th>
                                    <th>Score</th>
                                    <th>Time Taken</th>
                                    <th>Date</th>
                                    <th>Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Rahul Sharma</td>
                                    <td>JavaScript Fundamentals</td>
                                    <td>92%</td>
                                    <td>24 min</td>
                                    <td>2023-10-20</td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px;">
                                            <i class="fas fa-download"></i> Download
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Neha Singh</td>
                                    <td>Data Structures</td>
                                    <td>85%</td>
                                    <td>38 min</td>
                                    <td>2023-10-19</td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px;">
                                            <i class="fas fa-download"></i> Download
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Homepage Management -->
            <div id="homepage" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Homepage <span>Management</span></h2>
                    </div>
                    
                    <div class="tabs">
                        <div class="tab active" data-tab="hero">Hero Section</div>
                        <div class="tab" data-tab="features">Features</div>
                        <div class="tab" data-tab="prizes">Prizes</div>
                        <div class="tab" data-tab="schedule">Schedule</div>
                    </div>
                    
                    <div class="tab-content active" id="hero">
                        <div class="form-group">
                            <label for="heroTitle">Hero Title</label>
                            <input type="text" id="heroTitle" value="Welcome to Coding Safari Hackathon 2023">
                        </div>
                        
                        <div class="form-group">
                            <label for="heroSubtitle">Hero Subtitle</label>
                            <input type="text" id="heroSubtitle" value="An extraordinary coding expedition through challenging landscapes of algorithms, logic, and innovation">
                        </div>
                        
                        <div class="form-group">
                            <label for="heroImage">Hero Image URL</label>
                            <input type="text" id="heroImage" value="https://images.unsplash.com/photo-1535223289827-42f1e9919769?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                        </div>
                        
                        <button class="btn btn-primary" style="margin-top: 20px;">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Hackathon Details -->
            <div id="hackathon" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Hackathon <span>Details</span></h2>
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> Save All Changes
                        </button>
                    </div>
                    
                    <div class="quiz-form">
                        <div class="form-group">
                            <label for="hackathonName">Hackathon Name</label>
                            <input type="text" id="hackathonName" value="Coding Safari Hackathon Expedition 2023">
                        </div>
                        
                        <div class="form-group">
                            <label for="hackathonDate">Event Date</label>
                            <input type="date" id="hackathonDate" value="2023-12-15">
                        </div>
                        
                        <div class="form-group">
                            <label for="hackathonVenue">Venue</label>
                            <input type="text" id="hackathonVenue" value="GPK College, Kolhapur">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="hackathonDescription">Event Description</label>
                        <textarea id="hackathonDescription">Coding Safari is an extraordinary hackathon expedition where students embark on a coding journey through challenging landscapes of algorithms, logic, and innovation. Join us for 48 hours of intense coding, collaboration, and competition.</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Settings -->
            <div id="settings" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>System <span>Settings</span></h2>
                    </div>
                    
                    <div class="quiz-form">
                        <div class="form-group">
                            <label for="siteTitle">Site Title</label>
                            <input type="text" id="siteTitle" value="Coding Safari Hackathon">
                        </div>
                        
                        <div class="form-group">
                            <label for="adminEmail">Admin Email</label>
                            <input type="email" id="adminEmail" value="admin@codingsafari.in">
                        </div>
                        
                        <div class="form-group">
                            <label for="timezone">Timezone</label>
                            <select id="timezone">
                                <option value="IST" selected>Indian Standard Time (IST)</option>
                                <option value="UTC">UTC</option>
                                <option value="EST">Eastern Time</option>
                            </select>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Settings
                    </button>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p>&copy; 2023 Coding Safari Hackathon Expedition. Admin Dashboard v2.1</p>
                <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray);">Last login: Today, 10:30 AM | System Status: <span style="color: var(--success);">●</span> Operational</p>
            </div>
        </div>
    </div>
    
    <!-- Add Question Modal -->
    <div class="modal" id="addQuestionModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Question</h3>
                <button class="close-modal" id="closeQuestionModal">&times;</button>
            </div>
            
            <form class="question-form" id="questionForm">
                <div class="form-group">
                    <label for="questionCategory">Category *</label>
                    <select id="questionCategory" required>
                        <option value="">Select Category</option>
                        <option value="javascript" selected>JavaScript</option>
                        <option value="python">Python</option>
                        <option value="dsa">Data Structures</option>
                        <option value="algorithms">Algorithms</option>
                        <option value="webdev">Web Development</option>
                        <option value="database">Database</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="questionText">Question Text *</label>
                    <textarea id="questionText" placeholder="Enter your question here..." required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Options * (Select the correct answer)</label>
                    <div class="options-container">
                        <div class="option-input-group">
                            <label>
                                <input type="radio" name="correctOption" value="A" required>
                                <span style="font-weight: 600; color: var(--light);">Option A</span>
                            </label>
                            <input type="text" placeholder="Enter option A" required>
                        </div>
                        
                        <div class="option-input-group">
                            <label>
                                <input type="radio" name="correctOption" value="B">
                                <span style="font-weight: 600; color: var(--light);">Option B</span>
                            </label>
                            <input type="text" placeholder="Enter option B" required>
                        </div>
                        
                        <div class="option-input-group">
                            <label>
                                <input type="radio" name="correctOption" value="C">
                                <span style="font-weight: 600; color: var(--light);">Option C</span>
                            </label>
                            <input type="text" placeholder="Enter option C" required>
                        </div>
                        
                        <div class="option-input-group">
                            <label>
                                <input type="radio" name="correctOption" value="D">
                                <span style="font-weight: 600; color: var(--light);">Option D</span>
                            </label>
                            <input type="text" placeholder="Enter option D" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="questionDifficulty">Difficulty Level *</label>
                    <select id="questionDifficulty" required>
                        <option value="easy">Easy</option>
                        <option value="medium" selected>Medium</option>
                        <option value="hard">Hard</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="questionPoints">Points *</label>
                    <input type="number" id="questionPoints" min="1" max="10" value="5" required>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancelQuestionBtn">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Question
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Add Category Modal -->
    <div class="modal" id="addCategoryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Category</h3>
                <button class="close-modal" id="closeCategoryModal">&times;</button>
            </div>
            
            <form class="category-form"  action="course" method="post" >
                @csrf
                <div class="form-group">
                    <label for="categoryName">Category Name *</label>
                    <input type="text" id="categoryName" name="name" placeholder="Enter category name" required>
                </div>
                
                <div class="form-group">
                    <label for="categoryDescription">Description</label>
                    <textarea id="categoryDescription" name="description" placeholder="Brief description of this category"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Select Icon</label>
                   <div class="icon-selector">
    <div class="icon-option selected" data-icon="html">
        <i class="fab fa-html5"></i>
    </div>

    <div class="icon-option" data-icon="css">
        <i class="fab fa-css3-alt"></i>
    </div>
<div class="icon-option" data-icon="php">
    <i class="fab fa-php"></i>
</div>

    <div class="icon-option" data-icon="js">
        <i class="fab fa-js-square"></i>
    </div>

    <div class="icon-option" data-icon="python">
        <i class="fab fa-python"></i>
    </div>
    <div class="icon-option" data-icon="java">
    <i class="fab fa-java"></i>
</div>


    <div class="icon-option" data-icon="database">
        <i class="fas fa-database"></i>
    </div>

    <div class="icon-option" data-icon="ai">
        <i class="fas fa-robot"></i>
    </div>

    <div class="icon-option" data-icon="git">
        <i class="fab fa-git-alt"></i>
    </div>
</div>

                    <input type="hidden" id="selectedIcon" name="course_icon" value="code">
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancelCategoryBtn">
                        Cancel
                    </button>
                    <button  class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Category
                    </button>
                    <!-- <button>save</button> -->
                </div>
            </form>
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

    @if(session('success'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error', // 👈 RED icon
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        iconColor: '#dc2626', // 🔴 red
    });
</script>
@endif


    <script>
document.addEventListener('DOMContentLoaded', () => {
  // ====== Elements ======
  const sidebar = document.querySelector('.sidebar');
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');

  const navLinks = document.querySelectorAll('.nav-link[data-tab]');
  const tabContents = document.querySelectorAll('.main-content > .tab-content');

  // Quiz Management (UI only)
  const addCategoryBtn = document.getElementById('addCategoryBtn');
  const addQuestionBtn = document.getElementById('addQuestionBtn');
  const importQuestionsBtn = document.getElementById('importQuestionsBtn');

  const addQuestionModal = document.getElementById('addQuestionModal');
  const addCategoryModal = document.getElementById('addCategoryModal');

  const closeQuestionModal = document.getElementById('closeQuestionModal');
  const closeCategoryModal = document.getElementById('closeCategoryModal');

  const cancelQuestionBtn = document.getElementById('cancelQuestionBtn');
  const cancelCategoryBtn = document.getElementById('cancelCategoryBtn');

  // Create Quiz (UI only)
  const previewQuizBtn = document.getElementById('previewQuizBtn');
  const quickPreviewBtn = document.getElementById('quickPreviewBtn');

  const quizPreviewModal = document.getElementById('quizPreviewModal');
  const closePreviewModal = document.getElementById('closePreviewModal');
  const closePreviewBtn = document.getElementById('closePreviewBtn');
  const startStudentQuizBtn = document.getElementById('startStudentQuizBtn');

  // Homepage sub-tabs
  const homepageTabs = document.querySelectorAll('#homepage .tab');
  const homepageContents = document.querySelectorAll('#homepage .tab-content');

  // Icon selection (Category modal)
  const iconOptions = document.querySelectorAll('.icon-option');
  const selectedIconInput = document.getElementById('selectedIcon');

  // Filters UI (Create Quiz)
  const filterBtns = document.querySelectorAll('.filter-btn');

  // ====== Helpers ======
  const openModal = (modalEl) => modalEl && modalEl.classList.add('active');
  const closeModal = (modalEl) => modalEl && modalEl.classList.remove('active');

  const closeAllModals = () => {
    closeModal(addQuestionModal);
    closeModal(addCategoryModal);
    closeModal(quizPreviewModal);
  };

  // ====== Mobile sidebar toggle ======
  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', () => {
      sidebar?.classList.toggle('active');
    });
  }

  // Close sidebar on outside click (mobile)
  document.addEventListener('click', (e) => {
    if (!sidebar || !mobileMenuBtn) return;
    if (window.innerWidth <= 768 &&
        !sidebar.contains(e.target) &&
        !mobileMenuBtn.contains(e.target) &&
        sidebar.classList.contains('active')) {
      sidebar.classList.remove('active');
    }
  });

  // ====== Main tab switching (Sidebar menu) ======
  navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const tabId = link.getAttribute('data-tab');
      if (!tabId) return;

      // Active states
      navLinks.forEach(l => l.classList.remove('active'));
      tabContents.forEach(t => t.classList.remove('active'));

      link.classList.add('active');
      document.getElementById(tabId)?.classList.add('active');

      // Close sidebar on mobile
      if (window.innerWidth <= 768) sidebar?.classList.remove('active');
    });
  });

  // ====== Homepage inner tabs (Hero/Features/Prizes/Schedule) ======
  homepageTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const tabId = tab.getAttribute('data-tab');
      if (!tabId) return;

      homepageTabs.forEach(t => t.classList.remove('active'));
      homepageContents.forEach(c => c.classList.remove('active'));

      tab.classList.add('active');
      document.getElementById(tabId)?.classList.add('active');
    });
  });

  // ====== Modals: Open/Close ======
  addCategoryBtn?.addEventListener('click', () => openModal(addCategoryModal));
  addQuestionBtn?.addEventListener('click', () => openModal(addQuestionModal));
  importQuestionsBtn?.addEventListener('click', () => {
    // UI only placeholder
    Swal?.fire?.({
      icon: 'info',
      title: 'CSV Import',
      text: 'CSV import UI hooked. Backend/logic not included here.',
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2500
    }) || alert('CSV import UI hooked (logic not included).');
  });

  closeCategoryModal?.addEventListener('click', () => closeModal(addCategoryModal));
  cancelCategoryBtn?.addEventListener('click', () => closeModal(addCategoryModal));

  closeQuestionModal?.addEventListener('click', () => closeModal(addQuestionModal));
  cancelQuestionBtn?.addEventListener('click', () => closeModal(addQuestionModal));

  // Preview modal open
  previewQuizBtn?.addEventListener('click', () => openModal(quizPreviewModal));
  quickPreviewBtn?.addEventListener('click', () => previewQuizBtn?.click());

  closePreviewModal?.addEventListener('click', () => closeModal(quizPreviewModal));
  closePreviewBtn?.addEventListener('click', () => closeModal(quizPreviewModal));
  startStudentQuizBtn?.addEventListener('click', () => {
    // UI only placeholder
    Swal?.fire?.({
      icon: 'success',
      title: 'Student Preview',
      text: 'Student preview UI clicked. Redirect/logic not included.',
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2500
    }) || alert('Student preview clicked (logic not included).');
    closeModal(quizPreviewModal);
  });

  // Close modals on Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeAllModals();
  });

  // Optional: Close modal on clicking overlay (outside modal-content)
  [addQuestionModal, addCategoryModal, quizPreviewModal].forEach(modal => {
    modal?.addEventListener('click', (e) => {
      if (e.target === modal) closeModal(modal);
    });
  });

  // ====== Icon selection (Category modal) ======
  iconOptions.forEach(opt => {
    opt.addEventListener('click', () => {
      iconOptions.forEach(i => i.classList.remove('selected'));
      opt.classList.add('selected');
      if (selectedIconInput) selectedIconInput.value = opt.dataset.icon || '';
    });
  });

  // ====== Filter buttons active state (UI only) ======
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      // No data filtering here (UI-only)
    });
  });

  // ====== Resize handling ======
  window.addEventListener('resize', () => {
    if (window.innerWidth > 768) sidebar?.classList.remove('active');
  });
});
</script>
    
</body>
</html>