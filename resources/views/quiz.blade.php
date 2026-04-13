<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz | Coding Safari Hackathon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        }
        
        body {
            background-color: var(--darker);
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
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
        
        /* Quiz Container */
        .quiz-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px;
            min-height: 100vh;
        }
        
        /* Quiz Header */
        .quiz-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .quiz-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .quiz-logo-icon {
            color: var(--primary);
            font-size: 2rem;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .quiz-logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--light);
        }
        
        .quiz-logo h1 span {
            color: var(--primary);
        }
        
        /* Timer and Progress */
        .quiz-info {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .timer-container {
            background: rgba(255, 107, 53, 0.1);
            border: 1px solid rgba(255, 107, 53, 0.3);
            border-radius: 10px;
            padding: 15px 25px;
            text-align: center;
            min-width: 120px;
        }
        
        .timer-label {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 5px;
        }
        
        .timer {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            font-family: monospace;
        }
        
        .progress-container {
            background: rgba(108, 99, 255, 0.1);
            border: 1px solid rgba(108, 99, 255, 0.3);
            border-radius: 10px;
            padding: 15px 25px;
            text-align: center;
            min-width: 120px;
        }
        
        .progress-label {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 5px;
        }
        
        .progress {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
        }
        
        /* Quiz Content */
        .quiz-content {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        
        /* Question Panel */
        .question-panel {
            flex: 1;
            min-width: 300px;
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .question-number {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .question-number i {
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .question-number h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--light);
        }
        
        .question-tag {
            background: rgba(0, 196, 154, 0.1);
            color: var(--secondary);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .question-text {
            font-size: 1.4rem;
            line-height: 1.8;
            margin-bottom: 30px;
            color: var(--light);
        }
        
        /* Options Panel */
        .options-panel {
            display: grid;
            gap: 15px;
        }
        
        .option {
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .option:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        .option.selected {
            background: rgba(108, 99, 255, 0.1);
            border-color: var(--accent);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.2);
        }
        
        .option.correct {
            background: rgba(0, 196, 154, 0.1);
            border-color: var(--secondary);
        }
        
        .option.incorrect {
            background: rgba(255, 71, 87, 0.1);
            border-color: var(--danger);
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
            font-size: 1rem;
            color: var(--gray);
            transition: all 0.3s ease;
        }
        
        .option.selected .option-marker {
            background: var(--accent);
            color: white;
        }
        
        .option-text {
            flex: 1;
            font-size: 1.1rem;
        }
        
        /* Sidebar */
        .quiz-sidebar {
            width: 300px;
            min-width: 250px;
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            height: fit-content;
        }
        
        .sidebar-section {
            margin-bottom: 25px;
        }
        
        .sidebar-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: var(--light);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sidebar-section h3 i {
            color: var(--primary);
        }
        
        /* Question Navigation */
        .question-nav {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }
        
        .nav-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--light);
            transform: scale(1.05);
        }
        
        .nav-btn.current {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .nav-btn.answered {
            background: rgba(0, 196, 154, 0.2);
            color: var(--secondary);
            border-color: var(--secondary);
        }
        
        .nav-btn.marked {
            position: relative;
        }
        
        .nav-btn.marked::after {
            content: '★';
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 12px;
            color: var(--warning);
        }
        
        /* Quiz Instructions */
        .instructions {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 15px;
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        .instructions ul {
            list-style: none;
            margin-top: 10px;
        }
        
        .instructions li {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .instructions li i {
            color: var(--primary);
            font-size: 0.8rem;
        }
        
        /* Quiz Controls */
        .quiz-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .btn {
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover:not(:disabled) {
            background: #e55a2b;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-secondary:hover:not(:disabled) {
            background: rgba(255, 107, 53, 0.1);
            transform: translateY(-3px);
        }
        
        .btn-accent {
            background: var(--accent);
            color: white;
        }
        
        .btn-accent:hover:not(:disabled) {
            background: #5a52e0;
            transform: translateY(-3px);
        }
        
        .mark-btn {
            background: rgba(255, 165, 2, 0.1);
            color: var(--warning);
            border: 2px solid rgba(255, 165, 2, 0.3);
        }
        
        .mark-btn:hover:not(:disabled) {
            background: rgba(255, 165, 2, 0.2);
        }
        
        .mark-btn.marked {
            background: var(--warning);
            color: var(--dark);
        }
        
        /* Quiz Summary Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
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
            padding: 40px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            border: 1px solid rgba(255, 255, 255, 0.05);
            animation: slideUp 0.5s ease;
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .modal-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .modal-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--light);
            margin-bottom: 10px;
        }
        
        .modal-header p {
            color: var(--gray);
        }
        
        .summary-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-item {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .modal-actions .btn {
            flex: 1;
            justify-content: center;
        }
        
        /* Time Warning */
        .time-warning {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid var(--danger);
            border-radius: 10px;
            padding: 15px;
            display: none;
            align-items: center;
            gap: 10px;
            z-index: 100;
            animation: pulseWarning 1s infinite;
        }
        
        @keyframes pulseWarning {
            0% { box-shadow: 0 0 0 0 rgba(255, 71, 87, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255, 71, 87, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 71, 87, 0); }
        }
        
        /* Message */
        .message {
            background: rgba(255, 107, 53, 0.1);
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 10px 20px;
            color: var(--light);
            display: none;
            align-items: center;
            gap: 10px;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .quiz-content {
                flex-direction: column;
            }
            
            .quiz-sidebar {
                width: 100%;
            }
            
            .question-nav {
                grid-template-columns: repeat(10, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .quiz-container {
                padding: 20px;
            }
            
            .quiz-header {
                flex-direction: column;
                text-align: center;
            }
            
            .quiz-info {
                width: 100%;
                justify-content: center;
            }
            
            .question-text {
                font-size: 1.2rem;
            }
            
            .option {
                padding: 15px;
            }
            
            .quiz-controls {
                flex-direction: column;
            }
            
            .quiz-controls .btn {
                width: 100%;
                justify-content: center;
            }
            
            .question-nav {
                grid-template-columns: repeat(5, 1fr);
            }
        }
        
        @media (max-width: 480px) {
            .quiz-info {
                flex-direction: column;
                gap: 15px;
            }
            
            .timer-container,
            .progress-container {
                width: 100%;
            }
            
            .modal-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Grid Background -->
    <div class="grid-bg"></div>
    
    <!-- Time Warning -->
    <div class="time-warning" id="timeWarning">
        <i class="fas fa-exclamation-triangle"></i>
        <span>Time is running out! Only <span id="warningTime">1:00</span> minute left.</span>
    </div>
    
    <!-- Message -->
    <div class="message" id="message">
        <i class="fas fa-info-circle"></i>
        <span id="messageText">Please select an answer before proceeding</span>
    </div>
    
    <!-- Quiz Container -->
    <div class="quiz-container">
        <!-- Quiz Header -->
        <div class="quiz-header">
            <div class="quiz-logo">
                <div class="quiz-logo-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h1>Coding<span>Safari</span> Quiz</h1>
            </div>
            
            <div class="quiz-info">
                <div class="timer-container">
                    <div class="timer-label">TIME LEFT</div>
                    <div class="timer" id="quizTimer">00:00</div>
                </div>
                
                <div class="progress-container">
                    <div class="progress-label">PROGRESS</div>
                    <div class="progress" id="quizProgress">1/10</div>
                </div>
            </div>
        </div>
        
        <!-- Quiz Content -->
        <div class="quiz-content">
            <!-- Main Question Panel -->
            <div class="question-panel">
                <div class="question-header">
                    <div class="question-number">
                        <i class="fas fa-question-circle"></i>
                        <h2>Question <span id="currentQuestion">1</span> of <span id="totalQuestions">10</span></h2>
                    </div>
                    <div class="question-tag" >{{$assessment->title}}</div>
                           <!-- <div> -->
                               <!-- </div> -->
                            </div>
                            
                            <div class="question-text" id="questionText">
                                Loading question...
                                
                            </div>
                            
                            <!-- Options -->
                            <div class="options-panel" id="optionsContainer">
                                <!-- Options will be populated by JavaScript -->
                                
                            </div>
                            <div>
                            <button style="margin-top:30px;" class="btn btn-primary" id="nextBtn">
                                Next <i class="fas fa-arrow-right"></i>
                            </button>
                            <button style="margin-top:10px; display:none;" 
        class="btn btn-accent" 
        id="submitQuizBtn">
    Submit Quiz <i class="fas fa-check"></i>
</button>
                            </div>
                        </div>
            
            <div class="quiz-sidebar">
                <div class="sidebar-section">
                    <h3><i class="fas fa-map"></i> Navigation</h3>
                    <div class="question-nav" id="questionNav">
                        <!-- Questions will be generated by JavaScript -->
                    </div>
                </div>
                
                <!-- Instructions -->
                <div class="sidebar-section">
                    <h3><i class="fas fa-info-circle"></i> Instructions</h3>
                    <div class="instructions">
                        <p>Read each question carefully and select the best answer.</p>
                        <ul>
                            <li><i class="fas fa-circle"></i> You must select an answer to proceed</li>
                            <li><i class="fas fa-circle"></i> No negative marking</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="sidebar-section">
                    <h3><i class="fas fa-chart-bar"></i> Quiz Stats</h3>
                    <div class="instructions">
                        <p><strong>Answered:</strong> <span id="answeredCount">0</span> questions</p>
                        <p><strong>Marked:</strong> <span id="markedCount">0</span> questions</p>
                        <p><strong>Remaining:</strong> <span id="remainingCount">10</span> questions</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quiz Controls -->
        <div class="quiz-controls">
            <!-- <div>
                <button class="btn btn-secondary" id="prevBtn" disabled>
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
            </div> -->
            
            <!-- <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                <button class="btn mark-btn" id="markBtn">
                    <i class="fas fa-bookmark"></i> Mark for Review
                </button>
                
                <button class="btn btn-secondary" id="clearBtn">
                    <i class="fas fa-eraser"></i> Clear Answer
                </button>
            </div> -->
            
           
        </div>
    </div>
    
    <!-- Quiz Summary Modal -->
    <div class="modal" id="quizSummaryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Quiz Completed!</h2>
                <p>Here's your performance summary</p>
            </div>
            
            <div class="summary-stats">
                <div class="stat-item">
                    <div class="stat-value" id="finalScore">0%</div>
                    <div class="stat-label">Final Score</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-value" id="correctAnswers">0</div>
                    <div class="stat-label">Correct Answers</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-value" id="timeTaken">00:00</div>
                    <div class="stat-label">Time Taken</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-value" id="rank">-</div>
                    <div class="stat-label">Your Rank</div>
                </div>
            </div>
            
            <div class="modal-actions">
                <button class="btn btn-secondary" id="reviewBtn">
                    <i class="fas fa-redo"></i> Review Answers
                </button>
                <button class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-check-circle"></i> Submit Quiz
                </button>
            </div>
        </div>
    </div>
<script src="{{ asset('js/quiz.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="application/json" id="quizData">
{!! trim(json_encode($quizData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) !!}
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const SUBMIT_URL = `/quiz/{{ $assessment->code }}/submit`;
  const CSRF = document.querySelector('meta[name="csrf-token"]')?.content || "";
  const quizDataEl = document.getElementById("quizData");
  if (!quizDataEl) return;

  let quizData = [];
  try {
    quizData = JSON.parse(quizDataEl.textContent.trim());
  } catch (e) {
    console.error("quizData JSON invalid", e);
    return;
  }
  if (!Array.isArray(quizData) || quizData.length === 0) return;

  let allowLeave = false;
  let isSubmitting = false;

  let currentQuestion = 0;
  let userAnswers = new Array(quizData.length).fill(null);
  let quizTime = Number({{ $timeLimitSeconds }}) || 0;
  let timerInterval = null;

  const currentQuestionEl = document.getElementById("currentQuestion");
  const totalQuestionsEl = document.getElementById("totalQuestions");
  const questionTextEl = document.getElementById("questionText");
  const optionsContainer = document.getElementById("optionsContainer");
  const quizTimerEl = document.getElementById("quizTimer");
  const quizProgressEl = document.getElementById("quizProgress");
  const nextBtn = document.getElementById("nextBtn");
  const submitQuizBtn = document.getElementById("submitQuizBtn");
  const answeredCountEl = document.getElementById("answeredCount");
  const remainingCountEl = document.getElementById("remainingCount");

  if (!currentQuestionEl || !totalQuestionsEl || !questionTextEl || !optionsContainer || !quizTimerEl || !quizProgressEl || !nextBtn || !submitQuizBtn || !answeredCountEl || !remainingCountEl) return;

  const fmt = (sec) => {
    const m = Math.floor(sec / 60);
    const s = sec % 60;
    return `${String(m).padStart(2, "0")}:${String(s).padStart(2, "0")}`;
  };

  const updateStats = () => {
    const answered = userAnswers.filter(a => a !== null).length;
    answeredCountEl.textContent = answered;
    remainingCountEl.textContent = quizData.length - answered;
  };

  const updateButtons = () => {
    const isLast = currentQuestion === quizData.length - 1;
    nextBtn.style.display = isLast ? "none" : "inline-flex";
    submitQuizBtn.style.display = isLast ? "inline-flex" : "none";
  };

  const renderQuestion = (index) => {
    const q = quizData[index];
    currentQuestion = index;

    currentQuestionEl.textContent = String(index + 1);
    totalQuestionsEl.textContent = String(quizData.length);
    quizProgressEl.textContent = `${index + 1}/${quizData.length}`;
    questionTextEl.textContent = q?.question ?? "";

    updateButtons();

    optionsContainer.innerHTML = "";
    (q?.options || []).forEach((opt) => {
      const div = document.createElement("div");
      div.className = "option";
      if (userAnswers[index] === opt.id) div.classList.add("selected");

      div.innerHTML = `
        <div class="option-marker">${opt.id}</div>
        <div class="option-text">${opt.text ?? ""}</div>
      `;

      div.addEventListener("click", () => {
        userAnswers[currentQuestion] = opt.id;
        renderQuestion(currentQuestion);
        updateStats();
      });

      optionsContainer.appendChild(div);
    });
  };

  const buildPayload = (auto = false) => ({
    auto,
    course: "{{ $assessment->code }}",
    answers: userAnswers.map((a, i) => ({
      question_id: quizData[i].id,
      selected: a
    }))
  });

  const autoSubmitBeacon = (reason = "leave") => {
    if (allowLeave) return;
    if (sessionStorage.getItem("autoSubmitted") === "1") return;
    sessionStorage.setItem("autoSubmitted", "1");
    const payload = { ...buildPayload(true), reason };
    try {
      navigator.sendBeacon(SUBMIT_URL, JSON.stringify(payload));
    } catch (e) {}
  };

  const startTimer = () => {
    quizTimerEl.textContent = fmt(quizTime);
    timerInterval = setInterval(() => {
      quizTime = Math.max(0, quizTime - 1);
      quizTimerEl.textContent = fmt(quizTime);
      if (quizTime === 0) {
        clearInterval(timerInterval);
        submitQuiz(true);
      }
    }, 1000);
  };

  const stopTimer = () => {
    if (timerInterval) clearInterval(timerInterval);
    timerInterval = null;
  };

  async function submitQuiz(auto = false) {
    if (isSubmitting) return;
    isSubmitting = true;
    stopTimer();

    try {
      const res = await fetch(SUBMIT_URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "X-CSRF-TOKEN": CSRF
        },
        body: JSON.stringify(buildPayload(auto))
      });

    const data = await res.json();

     Swal.fire({
  icon: "success",
  title: "Assessment Completed ✅",
  text: "Tumhara assessment ho chuka hai. Download your certificate.",
  background: "#0A0A0F",
  color: "#fff",
  confirmButtonText: "OK"
}).then(() => {
  allowLeave = true;    
  window.onbeforeunload = null;
  sessionStorage.setItem("autoSubmitted", "1");

  window.location.replace(data.redirect_url); // ✅ IMPORTANT
});
    } catch (err) {
      console.error(err);
      isSubmitting = false;

      Swal.fire({
        icon: "error",
        title: "Submit failed!",
        text: err.message,
        background: "#0A0A0F",
        color: "#fff"
      });

      startTimer();
    }
  }

  history.pushState(null, "", location.href);
  window.addEventListener("popstate", () => {
    if (allowLeave) return;

    history.pushState(null, "", location.href);
  });
// Disable back
history.pushState(null, "", location.href);
window.onpopstate = function () {
    history.go(1);
};

// Disable reload keys
document.addEventListener("keydown", function (e) {
    if (e.key === "F5" || (e.ctrlKey && e.key === "r")) {
        e.preventDefault();
    }
});
  document.addEventListener("keydown", (e) => {
    const k = (e.key || "").toLowerCase();
    if (k === "f5") e.preventDefault();
    if (e.ctrlKey && (k === "r")) e.preventDefault();
    if (e.ctrlKey && e.shiftKey && (k === "r")) e.preventDefault();
  });

  window.addEventListener("beforeunload", (e) => {
    if (allowLeave) return;
    autoSubmitBeacon("beforeunload");
    e.preventDefault();
    e.returnValue = "";
  });

  window.addEventListener("pagehide", () => autoSubmitBeacon("pagehide"));
  document.addEventListener("visibilitychange", () => {
    if (document.visibilityState === "hidden") autoSubmitBeacon("hidden");
  });

  nextBtn.addEventListener("click", () => {
    if (userAnswers[currentQuestion] === null) {
      Swal.fire({ icon: "info", title: "Answer select karo", background: "#0A0A0F", color: "#fff" });
      return;
    }
    if (currentQuestion < quizData.length - 1) {
      renderQuestion(currentQuestion + 1);
      updateStats();
    }
  });

  submitQuizBtn.addEventListener("click", () => {
    if (userAnswers[currentQuestion] === null) {
      Swal.fire({ icon: "info", title: "Answer select karo", background: "#0A0A0F", color: "#fff" });
      return;
    }

    Swal.fire({
      title: "Submit Quiz?",
      text: "Ek baar submit ho gaya toh change nahi hoga.",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes, Submit",
      cancelButtonText: "Cancel",
      background: "#0A0A0F",
      color: "#fff"
    }).then((r) => {
      if (r.isConfirmed) submitQuiz(false);
    });
  });

  totalQuestionsEl.textContent = String(quizData.length);
  renderQuestion(0);
  updateStats();
  startTimer();
});</script>

</body>
</html>