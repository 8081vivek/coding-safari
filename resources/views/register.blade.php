<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Coding Safari Hackathon</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            --danger: #FF4757;
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
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(255, 107, 53, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(108, 99, 255, 0.05) 0%, transparent 50%),
                linear-gradient(180deg, var(--darker) 0%, #080813 100%);
            z-index: -2;
        }
        
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
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #e55a2b;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.3);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-secondary:hover {
            background-color: rgba(255, 107, 53, 0.1);
            transform: translateY(-3px);
        }
        
        /* Registration Section */
        .registration-section {
            padding: 100px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .registration-container {
            width: 100%;
        }
        
        .registration-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .registration-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--light);
            margin-bottom: 15px;
        }
        
        .registration-header h1 span {
            color: var(--primary);
        }
        
        .registration-header p {
            color: var(--gray);
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .registration-card {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 50px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        
        /* Progress Steps */
        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
            position: relative;
        }
        
        .progress-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }
        
        .progress-bar {
            position: absolute;
            top: 20px;
            left: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            z-index: 2;
            transition: width 0.5s ease;
            width: 0%;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 3;
        }
        
        .step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            font-weight: 600;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .step.active .step-circle {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.5);
        }
        
        .step.completed .step-circle {
            background: var(--secondary);
            border-color: var(--secondary);
            color: white;
        }
        
        .step.completed .step-circle i {
            font-size: 1.3rem;
        }
        
        .step-label {
            color: var(--gray);
            font-size: 0.95rem;
            font-weight: 600;
            text-align: center;
        }
        
        .step.active .step-label {
            color: var(--light);
        }
        
        /* Form Steps */
        .form-steps-container {
            position: relative;
            min-height: 500px;
        }
        
        .form-step {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .form-step.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .step-header {
            margin-bottom: 30px;
            text-align: center;
        }
        
        .step-header h3 {
            font-size: 2rem;
            color: var(--light);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .step-header h3 i {
            color: var(--primary);
        }
        
        .step-header p {
            color: var(--gray);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Registration Form */
        .registration-form {
            display: grid;
            gap: 25px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: var(--light);
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .required {
            color: var(--primary);
        }
        
        input, select, textarea {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: var(--light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
            background: rgba(255, 255, 255, 0.08);
        }
        
        .error {
            border-color: var(--danger);
            box-shadow: 0 0 0 3px rgba(255, 71, 87, 0.2);
        }
        
        .error-message {
            color: var(--danger);
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }
        
        textarea {
            resize: none;
            min-height: 120px;
        }
        
        select {
            appearance: none;
            background-color: rgba(255, 255, 255, 0.05);
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='white'><path d='M7 10l5 5 5-5'/></svg>");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 18px;
            padding-right: 50px;
            cursor: pointer;
        }
        
        /* File Upload */
        .file-upload {
            position: relative;
            margin-top: 10px;
        }
        
        .file-input {
            display: none;
        }
        
        .file-label {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px 25px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-label:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary);
        }
        
        .file-label i {
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .file-name {
            margin-top: 10px;
            color: var(--secondary);
            font-size: 0.9rem;
        }
        
        /* Domain Selection */
        .domain-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .domain-option {
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 25px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .domain-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            background: rgba(255, 107, 53, 0.05);
        }
        
        .domain-option.selected {
            border-color: var(--primary);
            background: rgba(255, 107, 53, 0.1);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.2);
        }
        
        .domain-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(145deg, rgba(255, 107, 53, 0.1), rgba(108, 99, 255, 0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--primary);
        }
        
        /* Form Navigation */
        .form-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        /* Checkbox Styles */
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 8px;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            margin-top: 3px;
            cursor: pointer;
        }
        
        .checkbox-group label {
            margin-bottom: 0;
            cursor: pointer;
            flex: 1;
        }
        
        /* Success Message */
        .success-message {
            background: rgba(0, 196, 154, 0.1);
            color: var(--success);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 196, 154, 0.3);
            display: none;
        }
        
        /* Error Summary */
        .error-summary {
            background: rgba(255, 71, 87, 0.1);
            color: var(--danger);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 71, 87, 0.3);
            display: none;
        }
        
        /* Loading Spinner */
        .loading-spinner {
            display: none;
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .registration-section {
                padding: 60px 0;
            }
            
            .registration-card {
                padding: 30px 20px;
            }
            
            .progress-steps {
                flex-direction: column;
                gap: 30px;
                align-items: flex-start;
            }
            
            .progress-steps::before {
                display: none;
            }
            
            .progress-bar {
                display: none;
            }
            
            .step {
                flex-direction: row;
                gap: 15px;
                align-items: center;
            }
            
            .step-circle {
                margin-bottom: 0;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-navigation {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
        }


/* option dropdown style */
select option{
    background-color: #1f1f2e;
    color: #fff;
}


    </style>
</head>
<body>
    <!-- Animated Grid Background -->
    <div class="grid-bg"></div>
    
    <!-- Registration Section -->
    <section class="registration-section">
        <div class="container registration-container">
            <div class="registration-header">
                <h1>Student <span>Registration</span></h1>
                <p>Join the Coding Safari Hackathon adventure. Complete the registration in 3 simple steps.</p>
            </div>
            
            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="progress-bar" id="progressBar"></div>
                <div class="step active" data-step="1">
                    <div class="step-circle">1</div>
                    <div class="step-label">Personal<br>Details</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-circle">2</div>
                    <div class="step-label">Academic<br>Information</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-circle">3</div>
                    <div class="step-label">Terms &<br>Submit</div>
                </div>
            </div>
            
            <div class="registration-card">
                <!-- Success Message -->
                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i> 
                    <span id="successText"></span>
                </div>
                
                <!-- Error Summary -->
                <div class="error-summary" id="errorSummary">
                    <i class="fas fa-exclamation-circle"></i> 
                    <span id="errorText"></span>
                    <ul id="errorList" style="margin-top: 10px; padding-left: 20px;"></ul>
                </div>
                
                <!-- Loading Spinner -->
                <div class="loading-spinner" id="loadingSpinner"></div>
                
                <!-- Main Registration Form -->
                <!-- ✅ FORM ID ADDED HERE -->
                <form id="mainRegistrationForm" action="studentregister"  method="POST" enctype="multipart/form-data">
                 
                @csrf<div class="form-steps-container">
                        <!-- Step 1: Personal Details -->
                        <div class="form-step active" id="step1">
                            <div class="step-header">
                                <h3><i class="fas fa-user-circle"></i> Personal Information</h3>
                                <p>Please provide your personal details for registration</p>
                            </div>
                            
                            <div class="registration-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="firstName"> Name <span class="required">*</span></label>
                                        <input type="text" id="firstName" name="firstName" required 
                                               placeholder="Enter your first name">
                                        <div class="error-message" id="firstNameError"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="lastName">Password <span class="required">*</span></label>
                                        <input type="password" id="lastName" name="password" required 
                                               placeholder="Enter your password">
                                        <div class="error-message" id="lastNameError"></div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" required 
                                               placeholder="student@college.edu.in">
                                        <div class="error-message" id="emailError"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="required">*</span></label>
                                        <input type="tel" id="phone" name="phone" required 
                                               placeholder="+91 98765 43210">
                                        <div class="error-message" id="phoneError"></div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth <span class="required">*</span></label>
                                        <input type="date" id="dob" name="dob" required>
                                        <div class="error-message" id="dobError"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="gender">Gender <span class="required">*</span></label>
                                        <select id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="error-message" id="genderError"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="address">Address <span class="required">*</span></label>
                                    <textarea id="address" name="address" rows="3" required 
                                              placeholder="Enter your complete address"></textarea>
                                    <div class="error-message" id="addressError"></div>
                                </div>
                            </div>
                            
                            <div class="form-navigation">
                                <div></div>
                                <button type="button" class="btn btn-primary" onclick="goToStep(2)">
                                    Next Step <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 2: Academic Information -->
                        <div class="form-step" id="step2">
                            <div class="step-header">
                                <h3><i class="fas fa-graduation-cap"></i> Academic Information</h3>
                                <p>Provide your academic details for verification</p>
                            </div>
                            
                            <div class="registration-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="college">College/University <span class="required">*</span></label>
                                        <input type="text" id="college" name="college" required 
                                               placeholder="Enter college name">
                                        <div class="error-message" id="collegeError"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="course">Course <span class="required">*</span></label>
                                        <select id="course" name="course" required>
                                            <option value="">Select Course</option>
                                            <option value="btech">B.Tech/B.E.</option>
                                            <option value="bsc">B.Sc. Computer Science</option>
                                            <option value="bca">BCA</option>
                                            <option value="mca">MCA</option>
                                            <option value="mtech">M.Tech</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="error-message" id="courseError"></div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="year">Year of Study <span class="required">*</span></label>
                                        <select id="year" name="year" required>
                                            <option value="">Select Year</option>
                                            <option value="1">First Year</option>
                                            <option value="2">Second Year</option>
                                            <option value="3">Third Year</option>
                                            <option value="4">Fourth Year</option>
                                            <option value="5">Fifth Year</option>
                                        </select>
                                        <div class="error-message" id="yearError"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="enrollment">Enrollment Number <span class="required">*</span></label>
                                        <input type="text" id="enrollment" name="enrollment" maxlength="15" required 
                                               placeholder="Enter enrollment number">
                                        <div class="error-message" id="enrollmentError"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Select Your Domain <span class="required">*</span></label>
                                    <div class="domain-options">
                                        <div class="domain-option selected" data-domain="web">
                                            <div class="domain-icon">
                                                <i class="fas fa-code"></i>
                                            </div>
                                            <h4>Web Development</h4>
                                            <p>Frontend, Backend, Full Stack</p>
                                        </div>
                                        <div class="domain-option" data-domain="mobile">
                                            <div class="domain-icon">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <h4>Mobile App</h4>
                                            <p>Android, iOS, Cross-platform</p>
                                        </div>
                                        <div class="domain-option" data-domain="ai">
                                            <div class="domain-icon">
                                                <i class="fas fa-robot"></i>
                                            </div>
                                            <h4>AI/ML</h4>
                                            <p>Machine Learning, Deep Learning</p>
                                        </div>
                                        <div class="domain-option" data-domain="cyber">
                                            <div class="domain-icon">
                                                <i class="fas fa-shield-alt"></i>
                                            </div>
                                            <h4>Cyber Security</h4>
                                            <p>Ethical Hacking, Network Security</p>
                                        </div>
                                    </div>
                                    <input type="hidden" id="selectedDomain" name="domain" value="web" required>
                                    <div class="error-message" id="domainError"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="collegeId">College ID Upload <span class="required">*</span></label>
                                    <div class="file-upload">
                                        <input type="file" id="collegeId" name="collegeId" class="file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                                        <label for="collegeId" class="file-label">
                                            <i class="fas fa-id-card"></i>
                                            <span>Upload College ID Card (Max 5MB)</span>
                                        </label>
                                        <div class="file-name" id="collegeIdName"></div>
                                    </div>
                                    <div class="error-message" id="collegeIdError"></div>
                                </div>
                            </div>
                            
                            <div class="form-navigation">
                                <button type="button" class="btn btn-secondary" onclick="goToStep(1)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn btn-primary" onclick="goToStep(3)">
                                    Next Step <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 3: Terms & Final Registration -->
                        <div class="form-step" id="step3">
                            <div class="step-header">
                                <h3><i class="fas fa-file-contract"></i> Terms & Registration</h3>
                                <p>Review terms and complete your registration</p>
                            </div>
                            
                            <div class="registration-form">
                                <div class="form-group">
                                    <h4 style="color: var(--light); margin-bottom: 20px;">Registration Summary</h4>
                                    <div style="background: rgba(255, 255, 255, 0.03); padding: 20px; border-radius: 8px; margin-bottom: 25px;" id="summaryContent">
                                        <!-- Summary will be populated by JavaScript -->
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <h4 style="color: var(--light); margin-bottom: 20px;">Terms & Conditions</h4>
                                    <div style="background: rgba(255, 255, 255, 0.03); padding: 25px; border-radius: 8px; max-height: 300px; overflow-y: auto; margin-bottom: 25px;">
                                        <h5 style="color: var(--primary); margin-bottom: 15px;">Coding Safari Hackathon Rules</h5>
                                        <ol style="color: var(--gray); padding-left: 20px; margin-bottom: 20px;">
                                             <li style="margin-bottom: 10px;">All participants must be currently enrolled students with valid college ID proof.</li>
                                             <li style="margin-bottom: 10px;">Each team can have 2-4 members or participate solo.</li>
                                             <li style="margin-bottom: 10px;">All code submissions must be original work created during the hackathon.</li>
                                             <li style="margin-bottom: 10px;">Participants must adhere to the hackathon code of conduct and maintain respectful behavior.</li>
                                             <li style="margin-bottom: 10px;">The decision of the judges will be final and binding.</li>
                                             <li style="margin-bottom: 10px;">Prizes are subject to terms and conditions and may be taxed as per government regulations.</li>
                                             <li style="margin-bottom: 10px;">Organizers reserve the right to disqualify any participant violating rules.</li>
                                             <li style="margin-bottom: 10px;">All intellectual property rights remain with the participants.</li>
                                            <li>Organizers may use participant data for hackathon-related communications.</li>
                                        </ol>
                                        
                                        <h5 style="color: var(--primary); margin-bottom: 15px;">Privacy Policy</h5>
                                        <ul style="color: var(--gray); padding-left: 20px;">
                                            <li style="margin-bottom: 10px;">We collect only necessary personal information for registration and verification.</li>
                                            <li style="margin-bottom: 10px;">Your data is used solely for hackathon organization and communication.</li>
                                            <li style="margin-bottom: 10px;">We do not share your personal information with third parties without consent.</li>
                                            <li style="margin-bottom: 10px;">You can request data deletion by contacting our support team.</li>
                                            <li>We implement industry-standard security measures to protect your data.</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="terms" name="terms" required>
                                    <label for="terms">I have read and agree to the Terms & Conditions and Privacy Policy <span class="required">*</span></label>
                                    <div class="error-message" id="termsError"></div>
                                </div>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="codeOfConduct" name="codeOfConduct" required>
                                    <label for="codeOfConduct">I agree to abide by the Hackathon Code of Conduct <span class="required">*</span></label>
                                    <div class="error-message" id="codeOfConductError"></div>
                                </div>
                                
                                <div class="checkbox-group">
                                    <input type="checkbox" id="communications" name="communications">
                                    <label for="communications">I would like to receive updates about future hackathons and coding events</label>
                                </div>
                            </div>
                            
                            <div class="form-navigation">
                                <button type="button" class="btn btn-secondary" onclick="goToStep(2)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <!-- ✅ PROPER SUBMIT BUTTON WITH VALIDATION -->
                                <button  class="btn btn-primary">
                                    Complete Registration <i class="fas fa-rocket"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@if(session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    iconColor: "#fff",
    customClass: {
      popup: "swal2-toast-custom"
    },
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
  });

  Toast.fire({
    icon: "error",
    title: {!! json_encode(session('error')) !!}
  });
});
</script>

<style>
.swal2-toast-custom{
  border-radius: 12px !important;
  padding: 12px 14px !important;
  box-shadow: 0 12px 30px rgba(0,0,0,0.18) !important;
  background: linear-gradient(135deg, #ef4444, #b91c1c) !important;
  color: #fff !important;
}
.swal2-toast-custom .swal2-title{
  font-size: 14px !important;
  font-weight: 600 !important;
  margin: 0 !important;
}
.swal2-toast-custom .swal2-icon{
  margin: 0 10px 0 0 !important;
}
</style>
@endif

   <script>

let currentStep = 1;

const domainMap = {
  web: "Web Development",
  mobile: "Mobile App Development",
  ai: "AI/ML",
  cyber: "Cyber Security",
};

const courseMap = {
  btech: "B.Tech/B.E.",
  bsc: "B.Sc. Computer Science",
  bca: "BCA",
  mca: "MCA",
  mtech: "M.Tech",
  diploma: "Diploma",
  other: "Other",
};

const yearMap = {
  1: "First Year",
  2: "Second Year",
  3: "Third Year",
  4: "Fourth Year",
  5: "Fifth Year",
};

document.addEventListener("DOMContentLoaded", () => {
  initializeDomainSelection();
  initializeFileUpload();
  showStep(1);

  const form = document.getElementById("mainRegistrationForm");
  if (!form) {
    console.error("mainRegistrationForm not found!");
    return;
  }

  form.addEventListener("submit", onSubmitForm);
});




function showStep(step) {
  currentStep = step;

  document.querySelectorAll(".form-step").forEach((s) => s.classList.remove("active"));
  document.getElementById(`step${step}`)?.classList.add("active");

  updateProgressBar(step);
  updateStepCircles(step);

  if (step === 3) updateSummary();
}

function goToStep(step) {
  if (step === 1) return showStep(1);

  if (step === 2) {
    if (validateStep1()) showStep(2);
    return;
  }

  if (step === 3) {
    if (validateStep2()) showStep(3);
    return;
  }
}

function updateProgressBar(step) {
  const bar = document.getElementById("progressBar");
  if (!bar) return;

  const percent = ((step - 1) / 2) * 100;
  bar.style.width = `${percent}%`;
}

function updateStepCircles(step) {
  document.querySelectorAll(".step").forEach((el) => {
    const n = parseInt(el.getAttribute("data-step"), 10);
    el.classList.remove("active", "completed");

    const circle = el.querySelector(".step-circle");

    if (n < step) {
      el.classList.add("completed");
      if (circle) circle.innerHTML = '<i class="fas fa-check"></i>';
    } else if (n === step) {
      el.classList.add("active");
      if (circle) circle.textContent = n;
    } else {
      if (circle) circle.textContent = n;
    }
  });
}

/* =========================
   DOMAIN SELECTION
========================= */
function initializeDomainSelection() {
  const options = document.querySelectorAll(".domain-option");
  const hidden = document.getElementById("selectedDomain");
  if (!hidden) return;

  options.forEach((opt) => {
    opt.addEventListener("click", function () {
      options.forEach((x) => x.classList.remove("selected"));
      this.classList.add("selected");
      hidden.value = this.dataset.domain || "";
      clearError("domain");
    });
  });
}

/* =========================
   FILE UPLOAD
========================= */
function initializeFileUpload() {
  const input = document.getElementById("collegeId");
  const name = document.getElementById("collegeIdName");

  if (!input || !name) return;

  input.addEventListener("change", function () {
    if (this.files && this.files[0]) {
      name.textContent = `Selected: ${this.files[0].name}`;
      name.style.display = "block";
      clearError("collegeId");
    } else {
      name.textContent = "";
      name.style.display = "none";
    }
  });
}



/* =========================
   ERROR HELPERS
========================= */
function showError(id, msg) {
  document.getElementById(id)?.classList.add("error");
  const err = document.getElementById(`${id}Error`);
  if (err) {
    err.textContent = msg;
    err.style.display = "block";
  }
}

function clearError(id) {
  document.getElementById(id)?.classList.remove("error");
  const err = document.getElementById(`${id}Error`);
  if (err) {
    err.textContent = "";
    err.style.display = "none";
  }
}

function showErrorSummary(errors) {
  const box = document.getElementById("errorSummary");
  const text = document.getElementById("errorText");
  const list = document.getElementById("errorList");

  if (!box || !text || !list) return;

  if (!errors || errors.length === 0) {
    box.style.display = "none";
    list.innerHTML = "";
    return;
  }

  text.textContent = `Please fix the following ${errors.length} error${errors.length > 1 ? "s" : ""}:`;
  list.innerHTML = errors.map((e) => `<li>${e}</li>`).join("");
  box.style.display = "block";
  window.scrollTo({ top: 0, behavior: "smooth" });
}

/* =========================
   VALIDATORS
========================= */
function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
  return /^[\+]?[0-9\s\-\(\)]{10,15}$/.test(phone);
}

/* =========================
   STEP 1 VALIDATION
========================= */
function validateStep1() {
  let ok = true;
  const errors = [];

  const firstName = (document.getElementById("firstName")?.value || "").trim();
  const lastName = (document.getElementById("lastName")?.value || "").trim();
  const email = (document.getElementById("email")?.value || "").trim();
  const phone = (document.getElementById("phone")?.value || "").trim();
  const dob = document.getElementById("dob")?.value || "";
  const gender = document.getElementById("gender")?.value || "";
  const address = (document.getElementById("address")?.value || "").trim();

  ["firstName","lastName","email","phone","dob","gender","address"].forEach(clearError);

  if (!firstName) { ok = false; errors.push("First name is required"); showError("firstName","First name is required"); }
  else if (firstName.length < 2) { ok = false; errors.push("First name must be at least 2 characters"); showError("firstName","First name must be at least 2 characters"); }

  if (!lastName) { ok = false; errors.push("password is required"); showError("lastName","passsword is required"); }

  if (!email) { ok = false; errors.push("Email is required"); showError("email","Email is required"); }
  else if (!isValidEmail(email)) { ok = false; errors.push("Enter a valid email"); showError("email","Enter a valid email"); }

  if (!phone) { ok = false; errors.push("Phone is required"); showError("phone","Phone is required"); }
  else if (!isValidPhone(phone)) { ok = false; errors.push("Enter a valid phone number"); showError("phone","Enter a valid phone number"); }

  if (!dob) { ok = false; errors.push("Date of birth is required"); showError("dob","Date of birth is required"); }

  if (!gender) { ok = false; errors.push("Select gender"); showError("gender","Select gender"); }

  if (!address) { ok = false; errors.push("Address is required"); showError("address","Address is required"); }
  else if (address.length < 10) { ok = false; errors.push("Enter complete address"); showError("address","Enter complete address"); }

  if (!ok) showErrorSummary(errors);
  else showErrorSummary([]);

  return ok;
}

/* =========================
   STEP 2 VALIDATION
========================= */
function validateStep2() {
  let ok = true;
  const errors = [];

  const college = (document.getElementById("college")?.value || "").trim();
  const course = document.getElementById("course")?.value || "";
  const year = document.getElementById("year")?.value || "";
  const enroll = (document.getElementById("enrollment")?.value || "").trim();
  const domain = document.getElementById("selectedDomain")?.value || "";
  const file = document.getElementById("collegeId")?.files?.[0];

  ["college","course","year","enrollment","domain","collegeId"].forEach(clearError);

  if (!college) { ok = false; errors.push("College is required"); showError("college","College is required"); }
  if (!course) { ok = false; errors.push("Select course"); showError("course","Select course"); }
  if (!year) { ok = false; errors.push("Select year"); showError("year","Select year"); }

  if (!enroll) { ok = false; errors.push("Enrollment is required"); showError("enrollment","Enrollment is required"); }
  else if (enroll.length < 5) { ok = false; errors.push("Enrollment min 5 chars"); showError("enrollment","Enrollment min 5 chars"); }

  if (!domain) { ok = false; errors.push("Select domain"); showError("domain","Select domain"); }

  if (!file) {
    ok = false; errors.push("Upload college ID"); showError("collegeId","Upload college ID");
  } else {
    const maxSize = 5 * 1024 * 1024;
    const allowed = ["image/jpeg","image/jpg","image/png","application/pdf"];

    if (file.size > maxSize) { ok = false; errors.push("File must be less than 5MB"); showError("collegeId","File must be less than 5MB"); }
    if (!allowed.includes(file.type)) { ok = false; errors.push("Only JPG/PNG/PDF allowed"); showError("collegeId","Only JPG/PNG/PDF allowed"); }
  }

  if (!ok) showErrorSummary(errors);
  else showErrorSummary([]);

  return ok;
}

/* =========================
   STEP 3 VALIDATION
========================= */
function validateStep3() {
  let ok = true;
  const errors = [];

  clearError("terms");
  clearError("codeOfConduct");

  const terms = document.getElementById("terms")?.checked;
  const coc = document.getElementById("codeOfConduct")?.checked;

  if (!terms) { ok = false; errors.push("Agree to Terms & Conditions"); showError("terms","Agree to Terms & Conditions"); }
  if (!coc) { ok = false; errors.push("Agree to Code of Conduct"); showError("codeOfConduct","Agree to Code of Conduct"); }

  if (!ok) showErrorSummary(errors);
  else showErrorSummary([]);

  return ok;
}

/* =========================
   SUMMARY (STEP 3)
========================= */
function updateSummary() {
  const summary = document.getElementById("summaryContent");
  const form = document.getElementById("mainRegistrationForm");
  if (!summary || !form) return;

  const data = new FormData(form);
  const v = Object.fromEntries(data.entries());

  const file = document.getElementById("collegeId")?.files?.[0];
  const fileName = file ? file.name : "No file selected";

  summary.innerHTML = `
    <div class="form-row">
      <div><strong style="color: var(--gray);">Name:</strong><p>${v.firstName || ""} ${v.lastName || ""}</p></div>
      <div><strong style="color: var(--gray);">College:</strong><p>${v.college || ""}</p></div>
    </div>
    <div class="form-row">
      <div><strong style="color: var(--gray);">Email:</strong><p>${v.email || ""}</p></div>
      <div><strong style="color: var(--gray);">Domain:</strong><p>${domainMap[v.domain] || "—"}</p></div>
    </div>
    <div class="form-row">
      <div><strong style="color: var(--gray);">Course:</strong><p>${courseMap[v.course] || "—"}</p></div>
      <div><strong style="color: var(--gray);">Year:</strong><p>${yearMap[v.year] || "—"}</p></div>
    </div>
    <div class="form-row">
      <div><strong style="color: var(--gray);">Enrollment:</strong><p>${v.enrollment || ""}</p></div>
      <div><strong style="color: var(--gray);">Phone:</strong><p>${v.phone || ""}</p></div>
    </div>
    <div class="form-row">
      <div><strong style="color: var(--gray);">College ID:</strong><p>${fileName}</p></div>
      <div><strong style="color: var(--gray);">DOB:</strong><p>${v.dob || ""}</p></div>
    </div>
  `;
}

function onSubmitForm(e) {
  e.preventDefault(); // validate first

  // Step-wise validate
  if (!validateStep1()) { showStep(1); return; }
  if (!validateStep2()) { showStep(2); return; }

  showStep(3);
  if (!validateStep3()) { showStep(3); return; }

  const spinner = document.getElementById("loadingSpinner");
  if (spinner) spinner.style.display = "block";

  e.target.submit();
}
</script>

</body>
</html>