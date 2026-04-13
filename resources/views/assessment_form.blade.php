<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Form | Coding Safari</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
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
        }

        body {
            background-color: var(--darker);
            font-family: serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            color: var(--light);
        }

        /* Grid Background */
        .grid-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 107, 53, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 107, 53, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
        }

        /* Floating Orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
        }

        .orb-1 {
            width: 300px;
            height: 300px;
            background: rgba(255, 107, 53, 0.15);
            top: -100px;
            right: -100px;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: rgba(0, 196, 154, 0.1);
            bottom: -150px;
            left: -150px;
        }

        .orb-3 {
            width: 250px;
            height: 250px;
            background: rgba(108, 99, 255, 0.1);
            bottom: 50%;
            right: 20%;
        }

        /* Main Container */
        .form-container {
            max-width: 900px;
            width: 100%;
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 107, 53, 0.2);
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 107, 53, 0.1);
            overflow: hidden;
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .form-header {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(108, 99, 255, 0.1));
            padding: 40px 40px 30px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 107, 53, 0.2);
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--secondary));
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(108, 99, 255, 0.2));
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.5rem;
            color: var(--primary);
            border: 1px solid rgba(255, 107, 53, 0.3);
            transform: rotate(10deg);
            transition: transform 0.3s ease;
        }

        .form-header:hover .header-icon {
            transform: rotate(0deg) scale(1.05);
        }

        .form-header h1 {
            font-family: serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-header p {
            color: var(--gray);
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .header-badge {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .badge-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .badge-item i {
            color: var(--secondary);
        }

        /* Form Body */
        .form-body {
            padding: 40px;
        }

        /* Success Message */
        .success-message {
            background: rgba(0, 196, 154, 0.1);
            border: 1px solid rgba(0, 196, 154, 0.3);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 30px;
            display: none;
            align-items: center;
            gap: 15px;
            animation: slideIn 0.3s ease;
        }

        .success-message.show {
            display: flex;
        }

        .success-message i {
            font-size: 2rem;
            color: var(--secondary);
        }

        .success-message h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .success-message p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: var(--light);
            font-weight: 500;
            font-size: 1rem;
        }

        .form-group label i {
            color: var(--primary);
            width: 20px;
        }

        .label-hint {
            color: var(--gray);
            font-size: 0.8rem;
            font-weight: normal;
            margin-left: auto;
        }

        /* Input Wrapper for Icons */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            color: var(--gray);
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .input-wrapper input,
        .input-wrapper select,
        .input-wrapper textarea {
            width: 100%;
            padding: 14px 16px 14px 48px;
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid rgba(255, 107, 53, 0.1);
            border-radius: 16px;
            color: var(--light);
            font-family: serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-wrapper textarea {
            padding-left: 16px;
            resize: vertical;
            min-height: 100px;
        }

        .input-wrapper input:focus,
        .input-wrapper select:focus,
        .input-wrapper textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 107, 53, 0.05);
            box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
        }

        .input-wrapper input:focus + .input-icon,
        .input-wrapper select:focus + .input-icon {
            color: var(--primary);
        }

        .input-wrapper input:hover,
        .input-wrapper select:hover,
        .input-wrapper textarea:hover {
            border-color: rgba(255, 107, 53, 0.3);
        }

        /* Assessment Code Special Styling */
        .assessment-section {
            grid-column: span 2;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.05), rgba(108, 99, 255, 0.05));
            border-radius: 24px;
            padding: 25px;
            margin: 15px 0 10px;
            border: 2px dashed rgba(255, 107, 53, 0.3);
            position: relative;
            overflow: hidden;
        }

        .assessment-section::before {
            content: '★';
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 3rem;
            color: rgba(255, 107, 53, 0.1);
            font-family: serif;
            transform: rotate(15deg);
        }

        .assessment-section label {
            color: var(--primary);
            font-weight: 600;
        }

        .assessment-section .input-wrapper input {
            background: rgba(255, 107, 53, 0.05);
            border-color: var(--primary);
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-family: monospace;
            font-size: 1.1rem;
        }

        .code-hint {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
            padding: 12px 16px;
            background: rgba(0, 196, 154, 0.05);
            border-radius: 12px;
            color: var(--gray);
            font-size: 0.9rem;
            border: 1px solid rgba(0, 196, 154, 0.1);
        }

        .code-hint i {
            color: var(--secondary);
            font-size: 1.2rem;
        }

        /* Progress Bar */
        .form-progress {
            grid-column: span 2;
            margin: 20px 0 10px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--gray);
            font-size: 0.9rem;
            position: relative;
            flex: 1;
        }

        .step.active {
            color: var(--primary);
        }

        .step.completed {
            color: var(--secondary);
        }

        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid currentColor;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .step.active .step-indicator {
            background: rgba(255, 107, 53, 0.1);
            border-color: var(--primary);
            color: var(--primary);
            transform: scale(1.1);
        }

        .step.completed .step-indicator {
            background: var(--secondary);
            border-color: var(--secondary);
            color: white;
        }

        .step-line {
            position: absolute;
            top: 20px;
            left: 60%;
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            transform: translateY(-50%);
            opacity: 0.3;
        }

        .step:last-child .step-line {
            display: none;
        }

        /* Submit Button */
        .submit-btn {
            grid-column: span 2;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            padding: 18px 30px;
            border-radius: 100px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px -10px rgba(255, 107, 53, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn i {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }

        /* Footer */
        .form-footer {
            grid-column: span 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 107, 53, 0.1);
            color: var(--gray);
            font-size: 0.9rem;
        }

        .security-badge {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .security-badge span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .security-badge i {
            color: var(--secondary);
        }

        /* Placeholder Styling */
        ::placeholder {
            color: rgba(160, 160, 176, 0.5);
            font-style: italic;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-header h1 {
                font-size: 2rem;
            }

            .form-body {
                padding: 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-group.full-width,
            .assessment-section,
            .form-progress,
            .submit-btn,
            .form-footer {
                grid-column: span 1;
            }

            .progress-steps {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .step {
                flex-direction: row;
                width: 100%;
                gap: 15px;
            }

            .step-line {
                display: none;
            }

            .form-footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .form-header {
                padding: 30px 20px;
            }

            .form-body {
                padding: 20px;
            }

            .header-badge {
                flex-direction: column;
                gap: 10px;
            }

            .assessment-section {
                padding: 20px;
            }
        }

        /* Input Validation Styles */
        .input-wrapper input:valid {
            border-color: var(--secondary);
        }

        .input-wrapper input:invalid:not(:placeholder-shown) {
            border-color: var(--danger);
        }

        /* Loading State */
        .submit-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .submit-btn.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="grid-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Main Form Container -->
    <div class="form-container">
        <!-- Header -->
        <div class="form-header">
            <div class="header-icon">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <h1>Assessment Registration</h1>
            <p>Enter your details to begin the coding safari assessment</p>
            <div class="header-badge">
                <div class="badge-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure & Encrypted</span>
                </div>
                <div class="badge-item">
                    <i class="fas fa-clock"></i>
                    <span>Takes only 2 minutes</span>
                </div>
                <div class="badge-item">
                    <i class="fas fa-lock"></i>
                    <span>Confidential</span>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <div class="form-body">
            <!-- Success Message (Hidden by default) -->
            <div id="successMessage" class="success-message">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h4>Registration Successful!</h4>
                    <p>Your assessment details have been submitted. Check your email for confirmation.</p>
                </div>
            </div>

            <!-- Main Form -->
            <form id="assessmentForm" onsubmit="return handleSubmit(event)">
                <div class="form-grid">
                    <!-- User Number -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-id-card"></i>
                            User Number / Roll No.
                            <span class="label-hint">Required</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input 
                                type="text" 
                                id="userNumber" 
                                name="userNumber" 
                                placeholder="e.g., CS2023001" 
                                required
                                pattern="[A-Za-z0-9]+"
                                title="Only letters and numbers allowed"
                            >
                        </div>
                    </div>

                    <!-- College Name -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-university"></i>
                            College / University
                            <span class="label-hint">Required</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-building-columns input-icon"></i>
                            <input 
                                type="text" 
                                id="collegeName" 
                                name="collegeName" 
                                placeholder="e.g., Indian Institute of Technology" 
                                required
                            >
                        </div>
                    </div>

                    <!-- Branch Name -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-code-branch"></i>
                            Branch / Department
                            <span class="label-hint">Required</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-diagram-project input-icon"></i>
                            <input 
                                type="text" 
                                id="branchName" 
                                name="branchName" 
                                placeholder="e.g., Computer Science Engineering" 
                                required
                            >
                        </div>
                    </div>

                    <!-- Year of Study -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-calendar"></i>
                            Year of Study
                            <span class="label-hint">Optional</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-graduation-cap input-icon"></i>
                            <select id="year" name="year">
                                <option value="" disabled selected>Select year</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                                <option value="5">Graduate</option>
                            </select>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-envelope"></i>
                            Email Address
                            <span class="label-hint">Required</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="student@college.edu" 
                                required
                            >
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-phone"></i>
                            Phone Number
                            <span class="label-hint">Optional</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone input-icon"></i>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                placeholder="+91 98765 43210"
                                pattern="[0-9+\-\s]+"
                                title="Enter a valid phone number"
                            >
                        </div>
                    </div>

                    <!-- Assessment Code - Special Section -->
                    <div class="assessment-section">
                        <div class="form-group full-width">
                            <label>
                                <i class="fas fa-qrcode"></i>
                                Assessment Code
                                <span class="label-hint">Unique Code</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-key input-icon"></i>
                                <input 
                                    type="text" 
                                    id="assessmentCode" 
                                    name="assessmentCode" 
                                    placeholder="e.g., SAFARI-2024-001" 
                                    required
                                    pattern="[A-Za-z0-9\-]+"
                                    title="Letters, numbers, and hyphens only"
                                >
                            </div>
                            <div class="code-hint">
                                <i class="fas fa-info-circle"></i>
                                <span>Enter the unique assessment code provided in your email or by your instructor. The code is case-sensitive.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Notes -->
                    <div class="form-group full-width">
                        <label>
                            <i class="fas fa-note-sticky"></i>
                            Additional Notes (Optional)
                        </label>
                        <div class="input-wrapper">
                            <textarea 
                                id="notes" 
                                name="notes" 
                                placeholder="Any special requirements or comments..."
                                rows="3"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Progress Indicator -->
                    <div class="form-progress">
                        <div class="progress-steps">
                            <div class="step completed">
                                <span class="step-indicator">✓</span>
                                <span>Basic Info</span>
                                <span class="step-line"></span>
                            </div>
                            <div class="step active">
                                <span class="step-indicator">2</span>
                                <span>Assessment Code</span>
                                <span class="step-line"></span>
                            </div>
                            <div class="step">
                                <span class="step-indicator">3</span>
                                <span>Confirmation</span>
                                <span class="step-line"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span>Register for Assessment</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <!-- Footer -->
                    <div class="form-footer">
                        <div class="security-badge">
                            <span><i class="fas fa-lock"></i> 256-bit SSL</span>
                            <span><i class="fas fa-shield"></i> GDPR Compliant</span>
                        </div>
                        <div>
                            <i class="fas fa-clock"></i> Form expires in <span id="timer">05:00</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form Submission Handler
        function handleSubmit(event) {
            event.preventDefault();

            // Get form values
            const userNumber = document.getElementById('userNumber').value;
            const collegeName = document.getElementById('collegeName').value;
            const branchName = document.getElementById('branchName').value;
            const assessmentCode = document.getElementById('assessmentCode').value;
            const email = document.getElementById('email').value;
            const year = document.getElementById('year').value;
            const phone = document.getElementById('phone').value;
            const notes = document.getElementById('notes').value;

            // Validation
            if (!userNumber || !collegeName || !branchName || !assessmentCode || !email) {
                alert('Please fill in all required fields');
                return false;
            }

            // Email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<span>Processing...</span><i class="fas fa-spinner"></i>';

            // Simulate API call
            setTimeout(() => {
                // Log form data
                console.log('Assessment Registration:', {
                    userNumber,
                    collegeName,
                    branchName,
                    assessmentCode,
                    email,
                    year: year || 'Not specified',
                    phone: phone || 'Not provided',
                    notes: notes || 'No notes',
                    timestamp: new Date().toISOString(),
                    assessmentDate: new Date().toLocaleDateString('en-IN')
                });

                // Show success message
                const successMessage = document.getElementById('successMessage');
                successMessage.classList.add('show');

                // Reset button
                submitBtn.classList.remove('loading');
                submitBtn.innerHTML = '<span>Register for Assessment</span><i class="fas fa-arrow-right"></i>';

                // Auto hide success message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.remove('show');
                }, 5000);

                // Optional: Clear form
                // document.getElementById('assessmentForm').reset();

                // Scroll to success message
                successMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 1500);

            return false;
        }

        // Form Timer
        let timeLeft = 300; // 5 minutes in seconds
        const timerElement = document.getElementById('timer');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft > 0) {
                timeLeft--;
            } else {
                clearInterval(timerInterval);
                alert('Form session expired. Please refresh and try again.');
                document.getElementById('assessmentForm').reset();
            }
        }

        const timerInterval = setInterval(updateTimer, 1000);

        // Auto-uppercase for assessment code
        document.getElementById('assessmentCode').addEventListener('input', function(e) {
            this.value = this.value.toUpperCase();
        });

        // Real-time validation for user number
        document.getElementById('userNumber').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^A-Za-z0-9]/g, '');
        });

        // Phone number formatting
        document.getElementById('phone').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9+\-\s]/g, '');
        });

        // Email validation on blur
        document.getElementById('email').addEventListener('blur', function(e) {
            const email = this.value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (email && !emailPattern.test(email)) {
                this.style.borderColor = 'var(--danger)';
                this.setCustomValidity('Please enter a valid email address');
            } else {
                this.style.borderColor = '';
                this.setCustomValidity('');
            }
        });

        // Progress step animation
        const inputs = document.querySelectorAll('#userNumber, #collegeName, #branchName, #email');
        const steps = document.querySelectorAll('.step');

        function updateProgress() {
            let filledCount = 0;
            inputs.forEach(input => {
                if (input.value.trim() !== '') {
                    filledCount++;
                }
            });

            if (filledCount >= 2) {
                steps[1].classList.add('completed');
                steps[2].classList.add('active');
            }
        }

        inputs.forEach(input => {
            input.addEventListener('input', updateProgress);
        });

        // Prevent form resubmission on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        // Handle escape key for any modals (if added later)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                // Close any open modals if needed
            }
        });

        // Clean up timer on page unload
        window.addEventListener('beforeunload', function() {
            clearInterval(timerInterval);
        });

        // Add focus effects
        document.querySelectorAll('.input-wrapper input, .input-wrapper select, .input-wrapper textarea').forEach(field => {
            field.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            field.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>