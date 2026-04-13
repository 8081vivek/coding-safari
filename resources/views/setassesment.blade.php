<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Management System - Create Assessment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary: #eb7125;
            --primary-dark: #09122b;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --gray: #94a3b8;
            --light-gray: #1e293b;
            --border: #334155;
        }
        
        body {
            font-family: serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.5;
            min-height: 100vh;
            padding: 20px;
        }
        
        .dashboard-section {
            background-color: var(--darker);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            border: 1px solid var(--border);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .section-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: var(--light);
        }
        
        .section-header h2 i {
            color: var(--primary);
            margin-right: 10px;
        }
        
        .section-header h2 span {
            color: var(--primary);
        }
        
        .back-btn {
            padding: 10px 20px;
            background-color: var(--light-gray);
            color: var(--light);
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border);
            text-decoration: none;
        }
        
        .back-btn:hover {
            background-color: #2d3a4f;
            border-color: var(--primary);
        }
        
        /* Assessment Container */
        .assessment-container {
            display: flex;
            gap: 24px;
        }
        
        .form-main {
            flex: 1;
        }
        
        .form-sidebar {
            flex: 0 0 320px;
        }
        
        .form-card {
            background-color: var(--dark);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            border: 1px solid var(--border);
        }
        
        .form-card h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--light);
        }
        
        .form-card h3 i {
            color: var(--primary);
            font-size: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--light);
            font-size: 14px;
        }
        
        .form-label .required {
            color: var(--danger);
            margin-left: 4px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--light);
            font-size: 14px;
            font-family: serif;
            transition: all 0.2s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }
        
        .form-control::placeholder {
            color: var(--gray);
        }
        
        textarea.form-control {
            min-height: 80px;
            resize: vertical;
        }
        
        .form-row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }
        
        .form-row .form-group {
            flex: 1;
            min-width: 200px;
        }
        
        /* Time Input Styles */
        .time-input-group {
            display: flex;
            gap: 12px;
            align-items: center;
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 8px 12px;
            border: 1px solid var(--border);
        }
        
        .time-input {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .time-input input {
            width: 100%;
            padding: 8px;
            background-color: var(--dark);
            border: 1px solid var(--border);
            border-radius: 6px;
            color: var(--light);
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }
        
        .time-input input:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .time-input span {
            color: var(--gray);
            font-size: 13px;
            min-width: 40px;
        }
        
        .time-separator {
            color: var(--primary);
            font-size: 20px;
            font-weight: 600;
        }
        
        /* Question Bank Styles */
        .question-bank-header {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .search-box {
            flex: 1;
            position: relative;
        }
        
        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 14px;
        }
        
        .search-box input {
            width: 100%;
            padding: 12px 12px 12px 38px;
            background-color: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--light);
            font-size: 14px;
        }
        
        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .filter-dropdown {
            min-width: 140px;
        }
        
        .filter-dropdown select {
            width: 100%;
            padding: 12px;
            background-color: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--light);
            font-size: 14px;
            cursor: pointer;
        }
        
        .filter-dropdown select:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        /* Questions List */
        .questions-list {
            max-height: 450px;
            overflow-y: auto;
            padding-right: 8px;
            margin-bottom: 20px;
        }
        
        .questions-list::-webkit-scrollbar {
            width: 5px;
        }
        
        .questions-list::-webkit-scrollbar-track {
            background: var(--light-gray);
            border-radius: 10px;
        }
        
        .questions-list::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }
        
        .question-card {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 12px;
            border: 1px solid var(--border);
            transition: all 0.2s;
            position: relative;
        }
        
        .question-card:hover {
            border-color: var(--primary);
        }
        
        .question-card.selected {
            background-color: rgba(37, 99, 235, 0.1);
            border-color: var(--primary);
        }
        
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .question-id {
            background-color: var(--primary);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .question-course {
            background-color: var(--dark);
            color: var(--gray);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .question-course i {
            color: var(--primary);
            font-size: 10px;
        }
        
        .question-text {
            font-weight: 500;
            margin-bottom: 12px;
            color: var(--light);
            font-size: 14px;
            line-height: 1.5;
        }
        
        .options-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-bottom: 12px;
        }
        
        .option-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            background-color: var(--dark);
            border-radius: 6px;
            border: 1px solid var(--border);
            font-size: 13px;
        }
        
        .option-item.correct {
            border-left: 3px solid var(--success);
            background-color: rgba(16, 185, 129, 0.1);
        }
        
        .option-marker {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 600;
            color: var(--gray);
        }
        
        .option-item.correct .option-marker {
            background-color: var(--success);
            color: white;
        }
        
        .option-text {
            flex: 1;
            color: var(--gray);
        }
        
        .question-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }
        
        .question-meta {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: var(--gray);
        }
        
        .question-meta span i {
            margin-right: 4px;
            color: var(--primary);
        }
        
        .question-select {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .question-select input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary);
        }
        
        .question-select label {
            font-size: 13px;
            color: var(--gray);
            cursor: pointer;
        }
        
        /* Selected Questions Section */
        .selected-questions-container {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 16px;
            margin-top: 20px;
            border: 1px solid var(--border);
        }
        
        .selected-questions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }
        
        .selected-questions-header h4 {
            font-size: 15px;
            font-weight: 600;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .selected-count {
            background-color: var(--primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .selected-question-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px;
            background-color: var(--dark);
            border-radius: 8px;
            margin-bottom: 8px;
            border: 1px solid var(--border);
        }
        
        .selected-question-number {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }
        
        .selected-question-text {
            flex: 1;
            font-size: 13px;
            color: var(--light);
        }
        
        .selected-question-actions button {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            border: none;
            background-color: var(--light-gray);
            color: var(--gray);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .selected-question-actions button:hover {
            background-color: var(--danger);
            color: white;
        }
        
        /* Quick Stats */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 16px;
        }
        
        .stat-card {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            border: 1px solid var(--border);
        }
        
        .stat-value {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 4px;
        }
        
        .stat-label {
            font-size: 11px;
            color: var(--gray);
        }
        
        /* Sidebar Styles */
        .form-sidebar .form-card {
            position: sticky;
            top: 20px;
        }
        
        .assessment-summary {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 16px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
        }
        
        .summary-item:last-child {
            border-bottom: none;
        }
        
        .summary-label {
            color: var(--gray);
        }
        
        .summary-value {
            font-weight: 600;
            color: var(--light);
        }
        
        .progress-bar {
            height: 6px;
            background-color: var(--light-gray);
            border-radius: 3px;
            overflow: hidden;
            margin: 12px 0;
        }
        
        .progress-fill {
            height: 100%;
            background-color: var(--primary);
            border-radius: 3px;
            transition: width 0.3s;
        }
        
        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            flex: 1;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--light);
            border: 1px solid var(--border);
        }
        
        .btn-secondary:hover {
            background-color: #2d3a4f;
        }
        
        .btn-success {
            background-color: var(--success);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #0d9488;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .assessment-container {
                flex-direction: column;
            }
            
            .form-sidebar {
                flex: none;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-section {
                padding: 16px;
            }
            
            .form-row {
                flex-direction: column;
            }
            
            .time-input-group {
                flex-direction: column;
                align-items: stretch;
            }
            
            .time-separator {
                display: none;
            }
            
            .options-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-stats {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .question-bank-header {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-section">
        <div class="section-header">
            <h2><i class="fas fa-clipboard-list"></i> Create New <span>Assessment</span></h2>
            <a href="javascript:void(0)" class="back-btn" id="backBtn">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('backBtn').addEventListener('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Go back?',
        text: 'Are you sure you want to leave this page?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Go Back',
        cancelButtonText: 'Stay Here',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {

            // Optional loading alert
            Swal.fire({
                title: 'Redirecting...',
                icon: 'success',
                timer: 1000,
                showConfirmButton: false
            });

            setTimeout(() => {
                window.location.href = "{{ url('dashboard') }}";
            }, 800);
        }
    });
});
</script>

        </div>
        
        <div class="assessment-container">
            <!-- Main Form -->
            <div class="form-main">
                <form id="assessmentForm" method="post" action="../../assesment_code/86454/afdj">
                    @csrf
                    <!-- Basic Information Card -->
                    <div class="form-card">
                        <h3><i class="fas fa-info-circle"></i> Basic Information</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="assessmentCode">Assessment Code <span class="required">*</span></label>
                                <input type="text" id="assessmentCode" name="code" class="form-control" 
                                       placeholder="e.g., ASSESS-001" required 
                                       oninput="updateSummary()">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="assessmentTitle">Assessment Title <span class="required">*</span></label>
                                <input type="text" id="assessmentTitle" name="title" class="form-control" 
                                       placeholder="e.g., JavaScript Fundamentals" required
                                       oninput="updateSummary()">
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Time Duration <span class="required">*</span></label>
                                <div class="time-input-group">
                                    <div class="time-input">
                                        <input type="number" id="hours" name="hours" min="0" max="24" value="0" 
                                               onchange="updateSummary()">
                                        <span>Hours</span>
                                    </div>
                                    <span class="time-separator">:</span>
                                    <div class="time-input">
                                        <input type="number" id="minutes" name="minutes" min="0" max="59" value="30"
                                               onchange="updateSummary()">
                                        <span>Minutes</span>
                                    </div>
                                    <span class="time-separator">:</span>
                                    <div class="time-input">
                                        <input type="number" id="seconds" name="seconds" min="0" max="59" value="0"
                                               onchange="updateSummary()">
                                        <span>Seconds</span>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        
                        
                    </div>
                    
                    <!-- Question Bank Card -->
                    <div class="form-card">
                        <h3><i class="fas fa-question-circle"></i> Question Bank</h3>
                        
                        <div class="question-bank-header">
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" id="searchQuestions" placeholder="Search questions..." onkeyup="filterQuestions()">
                            </div>
                            <div class="filter-dropdown">
                                <select id="filterDifficulty" onchange="filterQuestions()">
                                    <option value="all">All Difficulties</option>
                                    <option value="easy">Easy</option>
                                    <option value="medium">Medium</option>
                                    <option value="hard">Hard</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Questions List from Laravel -->
                        <div class="questions-list" id="questionsList">
                            @forelse ($dataQuestion as $q)
                                <div class="question-card" data-id="{{ $q->id }}" data-difficulty="{{ $q->difficulty ?? 'medium' }}">
                                    <div class="question-header">
                                        <span class="question-id">Q{{ $loop->iteration }}</span>
                                        <span class="question-course">
                                            <i class="fas fa-book"></i>
                                            @foreach($course as $c)
                                                @if($c->course_id == $q->course_id)
                                                    {{ $c->name }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>

                                    <div class="question-text">
                                        {{ $q->question_name }}
                                    </div>

                                    <div class="options-grid">
                                        <div class="option-item {{ $q->correct_option == 'A' ? 'correct' : '' }}">
                                            <span class="option-marker">A</span>
                                            <span class="option-text">{{ $q->option_a }}</span>
                                        </div>
                                        <div class="option-item {{ $q->correct_option == 'B' ? 'correct' : '' }}">
                                            <span class="option-marker">B</span>
                                            <span class="option-text">{{ $q->option_b }}</span>
                                        </div>
                                        <div class="option-item {{ $q->correct_option == 'C' ? 'correct' : '' }}">
                                            <span class="option-marker">C</span>
                                            <span class="option-text">{{ $q->option_c }}</span>
                                        </div>
                                        <div class="option-item {{ $q->correct_option == 'D' ? 'correct' : '' }}">
                                            <span class="option-marker">D</span>
                                            <span class="option-text">{{ $q->option_d }}</span>
                                        </div>
                                    </div>

                                    <div class="question-footer">
                                        <div class="question-meta">
                                            <span><i class="fas fa-star"></i> Marks: {{ $q->marks ?? 1 }}</span>
                                            <span><i class="fas fa-signal"></i> {{ ucfirst($q->difficulty ?? 'medium') }}</span>
                                        </div>
                                        <div class="question-select">
                                            <input type="checkbox" name="questionId[]" id="q{{ $q->id }}" value="{{ $q->question_id }}" onchange="toggleQuestionSelection(this)">
                                            <label for="q{{ $q->id }}">Select</label>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div style="text-align: center; padding: 40px; color: var(--gray);">
                                    <i class="fas fa-database" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
                                    <p>No questions found in the database.</p>
                                </div>
                            @endforelse
                        </div>
                        
                        <!-- Selected Questions -->
                        <div class="selected-questions-container" id="selectedQuestionsContainer" style="display: none;">
                            <div class="selected-questions-header">
                                <h4><i class="fas fa-check-circle" style="color: var(--success);"></i> Selected Questions</h4>
                                <span class="selected-count" id="selectedCount">0</span>
                            </div>
                            <div id="selectedQuestionsList"></div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="quick-stats">
                            <div class="stat-card">
                                <div class="stat-value" id="totalQuestionsStat">{{ count($dataQuestion) }}</div>
                                <div class="stat-label">Total Questions</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-value" id="selectedQuestionsStat">0</div>
                                <div class="stat-label">Selected</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-value" id="totalMarksStat">0</div>
                                <div class="stat-label">Total Marks</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="resetForm()">
                            <i class="fas fa-undo-alt"></i> Reset
                        </button>
                       
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Create Assessment
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Sidebar -->
            <div class="form-sidebar">
                <div class="form-card">
                    <h3><i class="fas fa-chart-pie"></i> Assessment Summary</h3>
                    
                    <div class="assessment-summary">
                        <div class="summary-item">
                            <span class="summary-label">Assessment Code:</span>
                            <span class="summary-value" id="summaryCode">Not set</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Title:</span>
                            <span class="summary-value" id="summaryTitle">Not set</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Duration:</span>
                            <span class="summary-value" id="summaryTime">30 min</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Selected Questions:</span>
                            <span class="summary-value" id="summaryQuestions">0</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Total Marks:</span>
                            <span class="summary-value" id="summaryMarks">0</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Passing Marks:</span>
                            <span class="summary-value" id="summaryPassing">0</span>
                        </div>
                    </div>
                    
                    <div class="progress-bar">
                        <div class="progress-fill" id="completionProgress" style="width: 0%"></div>
                    </div>
                    <p style="text-align: center; font-size: 12px; color: var(--gray);" id="completionText">
                        0% Complete
                    </p>
                </div>
                
                <div class="form-card">
                    <h3><i class="fas fa-lightbulb"></i> Quick Tips</h3>
                    <ul style="list-style: none; color: var(--gray); font-size: 13px;">
                        <li style="margin-bottom: 10px; display: flex; gap: 8px;">
                            <i class="fas fa-check-circle" style="color: var(--success); font-size: 14px;"></i>
                            <span>Unique assessment code helps in identification</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; gap: 8px;">
                            <i class="fas fa-check-circle" style="color: var(--success); font-size: 14px;"></i>
                            <span>Set realistic time duration for each assessment</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; gap: 8px;">
                            <i class="fas fa-check-circle" style="color: var(--success); font-size: 14px;"></i>
                            <span>Select questions from the question bank</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; gap: 8px;">
                            <i class="fas fa-check-circle" style="color: var(--success); font-size: 14px;"></i>
                            <span>You can select multiple questions at once</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedQuestions = [];
        
        // Initialize
        window.onload = function() {
            updateSummary();
        };

        // Toggle question selection
        function toggleQuestionSelection(checkbox) {
            const questionCard = checkbox.closest('.question-card');
            const questionId = checkbox.value;
            const questionText = questionCard.querySelector('.question-text').textContent;
            const marks = parseInt(questionCard.querySelector('.question-meta span:first-child').textContent.replace('Marks: ', '')) || 1;
            
            if (checkbox.checked) {
                // Add to selected
                selectedQuestions.push({
                    id: questionId,
                    text: questionText,
                    marks: marks
                });
                questionCard.classList.add('selected');
            } else {
                // Remove from selected
                selectedQuestions = selectedQuestions.filter(q => q.id != questionId);
                questionCard.classList.remove('selected');
            }
            
            displaySelectedQuestions();
            updateSummary();
        }

        // Display selected questions
        function displaySelectedQuestions() {
            const container = document.getElementById('selectedQuestionsList');
            const selectedContainer = document.getElementById('selectedQuestionsContainer');
            
            if (selectedQuestions.length === 0) {
                selectedContainer.style.display = 'none';
                return;
            }
            
            selectedContainer.style.display = 'block';
            document.getElementById('selectedCount').textContent = selectedQuestions.length;
            
            container.innerHTML = '';
            
            selectedQuestions.forEach((q, index) => {
                const html = `
                    <div class="selected-question-item">
                        <span class="selected-question-number">${index + 1}</span>
                        <div class="selected-question-text">${q.text.substring(0, 50)}${q.text.length > 50 ? '...' : ''}</div>
                        <div class="selected-question-actions">
                            <button onclick="removeSelectedQuestion('${q.id}')" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                `;
                container.innerHTML += html;
            });
            
            // Update stats
            document.getElementById('selectedQuestionsStat').textContent = selectedQuestions.length;
            const totalMarks = selectedQuestions.reduce((sum, q) => sum + q.marks, 0);
            document.getElementById('totalMarksStat').textContent = totalMarks;
        }

        // Remove selected question
        function removeSelectedQuestion(questionId) {
            // Uncheck the checkbox
            const checkbox = document.querySelector(`input[value="${questionId}"]`);
            if (checkbox) {
                checkbox.checked = false;
                checkbox.closest('.question-card').classList.remove('selected');
            }
            
            selectedQuestions = selectedQuestions.filter(q => q.id != questionId);
            displaySelectedQuestions();
            updateSummary();
        }

        // Filter questions
        function filterQuestions() {
            const searchTerm = document.getElementById('searchQuestions').value.toLowerCase();
            const difficulty = document.getElementById('filterDifficulty').value;
            
            const questions = document.querySelectorAll('.question-card');
            
            questions.forEach(q => {
                const text = q.querySelector('.question-text').textContent.toLowerCase();
                const qDifficulty = q.dataset.difficulty || 'medium';
                
                const matchesSearch = text.includes(searchTerm);
                const matchesDifficulty = difficulty === 'all' || qDifficulty === difficulty;
                
                if (matchesSearch && matchesDifficulty) {
                    q.style.display = 'block';
                } else {
                    q.style.display = 'none';
                }
            });
        }

        // Update summary
        function updateSummary() {
            // Basic info
            document.getElementById('summaryCode').textContent = 
                document.getElementById('assessmentCode').value || 'Not set';
            document.getElementById('summaryTitle').textContent = 
                document.getElementById('assessmentTitle').value || 'Not set';
            
            // Time
            const hours = parseInt(document.getElementById('hours').value) || 0;
            const minutes = parseInt(document.getElementById('minutes').value) || 0;
            const seconds = parseInt(document.getElementById('seconds').value) || 0;
            
            let timeString = '';
            if (hours > 0) timeString += `${hours}h `;
            if (minutes > 0) timeString += `${minutes}m `;
            if (seconds > 0) timeString += `${seconds}s`;
            if (timeString === '') timeString = '0s';
            document.getElementById('summaryTime').textContent = timeString;
            
            // Questions and marks
            document.getElementById('summaryQuestions').textContent = selectedQuestions.length;
            
            const totalMarks = selectedQuestions.reduce((sum, q) => sum + q.marks, 0);
            document.getElementById('summaryMarks').textContent = totalMarks;
            document.getElementById('totalMarks').value = totalMarks;
            
            document.getElementById('summaryPassing').textContent = 
                document.getElementById('passingMarks').value || 'Not set';
            
            updateProgress();
        }

        // Update progress
        function updateProgress() {
            let completed = 0;
            let total = 4;
            
            if (document.getElementById('assessmentCode').value) completed++;
            if (document.getElementById('assessmentTitle').value) completed++;
            if (selectedQuestions.length > 0) completed++;
            if (document.getElementById('passingMarks').value) completed++;
            
            const percentage = (completed / total) * 100;
            document.getElementById('completionProgress').style.width = percentage + '%';
            document.getElementById('completionText').textContent = 
                `${Math.round(percentage)}% Complete (${completed}/${total} fields)`;
        }

        // Reset form
        function resetForm() {
            Swal.fire({
                title: 'Reset Form?',
                text: "All entered data will be lost!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('assessmentForm').reset();
                    
                    // Uncheck all questions
                    document.querySelectorAll('.question-card input[type="checkbox"]').forEach(cb => {
                        cb.checked = false;
                        cb.closest('.question-card').classList.remove('selected');
                    });
                    
                    selectedQuestions = [];
                    displaySelectedQuestions();
                    updateSummary();
                    
                    Swal.fire('Reset!', 'Form has been reset.', 'success');
                }
            });
        }

        // Preview assessment
        function previewAssessment() {
            if (!validateForm()) return;
            
            const hours = parseInt(document.getElementById('hours').value) || 0;
            const minutes = parseInt(document.getElementById('minutes').value) || 0;
            
            Swal.fire({
                title: 'Assessment Preview',
                html: `
                    <div style="text-align: left; max-height: 400px; overflow-y: auto;">
                        <p><strong>Code:</strong> ${document.getElementById('assessmentCode').value}</p>
                        <p><strong>Title:</strong> ${document.getElementById('assessmentTitle').value}</p>
                        <p><strong>Duration:</strong> ${hours}h ${minutes}m</p>
                        <p><strong>Selected Questions:</strong> ${selectedQuestions.length}</p>
                        <p><strong>Total Marks:</strong> ${selectedQuestions.reduce((sum, q) => sum + q.marks, 0)}</p>
                        <hr style="border-color: #334155;">
                        <p><strong>Questions Preview:</strong></p>
                        ${selectedQuestions.slice(0, 3).map((q, i) => `
                            <div style="margin: 10px 0; padding: 10px; background: #1e293b; border-radius: 6px;">
                                <p style="color: #2563eb;">Q${i+1}: ${q.text.substring(0, 50)}${q.text.length > 50 ? '...' : ''}</p>
                                <p style="color: #94a3b8;">Marks: ${q.marks}</p>
                            </div>
                        `).join('')}
                        ${selectedQuestions.length > 3 ? `<p>... and ${selectedQuestions.length - 3} more questions</p>` : ''}
                    </div>
                `,
                confirmButtonText: 'Looks Good',
                confirmButtonColor: '#10b981'
            });
        }

        // Validate form
        function validateForm() {
            if (!document.getElementById('assessmentCode').value) {
                Swal.fire('Error', 'Please enter assessment code', 'error');
                return false;
            }
            
            if (!document.getElementById('assessmentTitle').value) {
                Swal.fire('Error', 'Please enter assessment title', 'error');
                return false;
            }
            
            const hours = parseInt(document.getElementById('hours').value) || 0;
            const minutes = parseInt(document.getElementById('minutes').value) || 0;
            const seconds = parseInt(document.getElementById('seconds').value) || 0;
            
            if (hours === 0 && minutes === 0 && seconds === 0) {
                Swal.fire('Error', 'Please set a valid time duration', 'error');
                return false;
            }
            
            if (selectedQuestions.length === 0) {
                Swal.fire('Error', 'Please select at least one question', 'error');
                return false;
            }
            
            return true;
        }

        // Validate and save
        function validateAndSave() {
            if (validateForm()) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Assessment is valid and ready to save',
                    icon: 'success',
                    confirmButtonColor: '#10b981'
                });
            }
        }

        // Confirm back
        function confirmBack() {
            if (selectedQuestions.length > 0 || document.getElementById('assessmentCode').value) {
                Swal.fire({
                    title: 'Go back?',
                    text: 'You have unsaved changes. Are you sure you want to leave?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url()->previous() }}";
                    }
                });
            } else {
                window.location.href = "{{ url()->previous() }}";
            }
        }

        // Form submission
        document.getElementById('assessmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm()) {
                // Add selected questions to form
                selectedQuestions.forEach((q, index) => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = `questions[${index}]`;
                    input.value = q.id;
                    this.appendChild(input);
                });
                
                Swal.fire({
                    title: 'Creating Assessment...',
                    html: 'Please wait while we save your assessment',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        setTimeout(() => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Assessment created successfully!',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                this.submit();
                            });
                        }, 1500);
                    }
                });
            }
        });

        // Auto-update on input changes
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.addEventListener('input', updateSummary);
        });
    </script>
    
    @if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
    @endif
</body>
</html>