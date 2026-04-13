<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Coding Safari Hackathon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Base Styles */
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
            --warning: #FFA502;
        }
        
        body {
            background-color: var(--darker);
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
            padding:0 !important;
            margin-top:-100px;
        }
        
        /* Animated Background */
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
        
        a {
            text-decoration: none;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 32px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
            font-family: 'Source Serif Pro', serif;
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
        
        .btn-accent {
            background-color: var(--accent);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: #5a52e0;
            transform: translateY(-3px);
        }
        

        
        /* Login Section */
        .login-section {
            padding: 180px 0 100px;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .login-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 60px;
        }
        
        .login-content {
            flex: 1;
            max-width: 500px;
        }
        
        .login-header {
            margin-bottom: 40px;
        }
        
        .login-header h1 {
            font-size: 3.5rem;
            color: var(--light);
            margin-bottom: 15px;
        }
        
        .login-header h1 span {
            color: var(--primary);
        }
        
        .login-header p {
            font-size: 1.2rem;
            color: var(--gray);
        }
        
        .login-features {
            margin-top: 40px;
        }
        
        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .feature i {
            color: var(--secondary);
            font-size: 1.3rem;
            width: 30px;
        }
        
        .feature span {
            color: var(--light);
            font-size: 1.1rem;
        }
        
        /* Login Card */
        .login-card {
            flex: 1;
            max-width: 450px;
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 50px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        
        .login-tabs {
            display: flex;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .tab {
            padding: 15px 30px;
            cursor: pointer;
            color: var(--gray);
            font-weight: 600;
            font-size: 1.1rem;
            position: relative;
            transition: all 0.3s ease;
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
            border-radius: 3px 3px 0 0;
        }
        
        /* Login Form */
        .login-form {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .login-form.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.2rem;
        }
        
        input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
            background: rgba(255, 255, 255, 0.08);
        }
        
        input:hover {
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary);
        }
        
        /* Form Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .remember-me input {
            width: auto;
            transform: scale(1.2);
        }
        
        .remember-me label {
            margin-bottom: 0;
            cursor: pointer;
            color: var(--gray);
            font-weight: normal;
        }
        
        .forgot-password {
            color: var(--primary);
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .forgot-password:hover {
            color: #e55a2b;
            text-decoration: underline;
        }
        
        /* Login Button */
        .login-btn {
            width: 100%;
            padding: 18px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
        }
        
        
        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 30px;
            color: var(--gray);
        }
        
        .register-link a {
            color: var(--primary);
            font-weight: 600;
        }
        
        .register-link a:hover {
            color: #e55a2b;
            text-decoration: underline;
        }
        
        /* OTP Login */
        .otp-section {
            text-align: center;
            padding: 20px 0;
        }
        
        .otp-section h4 {
            color: var(--light);
            margin-bottom: 15px;
            font-size: 1.3rem;
        }
        
        .otp-section p {
            color: var(--gray);
            margin-bottom: 25px;
        }
        
        .otp-input-group {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }
        
        .otp-input {
            width: 60px;
            height: 70px;
            font-size: 2rem;
            text-align: center;
            font-weight: bold;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .otp-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(255, 107, 53, 0.3);
        }
        
        .otp-input.filled {
            border-color: var(--secondary);
            background: rgba(0, 196, 154, 0.05);
        }
        
        .send-otp-btn {
            width: 100%;
            margin-bottom: 15px;
        }
        
        .otp-timer {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .resend-otp {
            color: var(--primary);
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .resend-otp:hover {
            color: #e55a2b;
            text-decoration: underline;
        }
        
        /* Form Messages */
        .form-message {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .form-message.success {
            background: rgba(0, 196, 154, 0.1);
            border: 1px solid rgba(0, 196, 154, 0.3);
            color: var(--secondary);
        }
        
        .form-message.error {
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid rgba(255, 71, 87, 0.3);
            color: var(--danger);
        }
        
        .form-message.info {
            background: rgba(255, 165, 2, 0.1);
            border: 1px solid rgba(255, 165, 2, 0.3);
            color: var(--warning);
        }
        
        
        
        .contact-info p {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            color: var(--gray);
            font-size: 1.1rem;
        }
        
        .contact-info i {
            color: var(--primary);
            font-size: 1.2rem;
            width: 25px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--gray);
            font-size: 0.95rem;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                
            }
            
            .login-content, .login-card {
                max-width: 100%;
            }
            
            .login-header h1 {
                font-size: 3rem;
            }
            
            .login-card {
                padding: 40px 30px;
            }
            
            .feature {
                /* justify-content: center; */
            }
        }
        
        @media (max-width: 768px) {
            nav {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .auth-buttons {
                display: none;
            }
            
            .login-section {
                padding: 150px 0 60px;
            }
            
            .login-header h1 {
                font-size: 2.5rem;
            }
            
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .otp-input-group {
                justify-content: center;
            }
            
            .otp-input {
                width: 50px;
                height: 60px;
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 576px) {
            .login-header h1 {
                font-size: 2.2rem;
            }
            
            .login-card {
                padding: 30px 20px;
            }
            
            .tab {
                padding: 15px 20px;
                font-size: 1rem;
            }
            
            .footer-container {
                gap: 40px;
            }
            
            .otp-input {
                width: 45px;
                height: 55px;
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Grid Background -->
    <div class="grid-bg"></div>
    
   

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <!-- Login Content -->
                <div class="login-content">
                    <div class="login-header">
                        <h1>Welcome to <span>Coding Safari</span></h1>
                        <p>Login to access your dashboard, track your progress, and join the hackathon adventure.</p>
                    </div>
                    
                    <div class="login-features">
                        <div class="feature">
                            <i class="fas fa-trophy"></i>
                            <span>Track your competition progress</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-users"></i>
                            <span>Connect with your team members</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-chart-line"></i>
                            <span>Monitor your leaderboard ranking</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-file-code"></i>
                            <span>Submit your hackathon projects</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Get important event updates</span>
                        </div>
                    </div>
                </div>
                
                <!-- Login Card -->
                <div class="login-card">
                    <!-- Login Tabs -->
                    <div class="login-tabs">
                        <div class="tab active" data-tab="email-login">Email Login</div>
                    </div>
                    
                    <form class="login-form active" action="{{route('login_code/8081/vp/login/student')}}"  method="post"id="emailLoginForm">
                       @csrf
                    <div class="form-group">

                           <label>Registration ID / Email / Mobile <span class="required">*</span></label>
<div class="input-with-icon">
    <i class="fas fa-user"></i>
    <input type="text" name="login_id" required 
           placeholder="Enter Registration ID / Email / Mobile">
</div>

                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password <span class="required">*</span></label>
                            <div class="input-with-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password" name="password" required placeholder="Enter your password">
                            </div>
                        </div>
                        
                       
                        
                        <button type="submit" class="btn btn-primary login-btn">
                            <i class="fas fa-sign-in-alt"></i> Login to Account
                        </button>
                        
                       
                        
                        <div class="register-link">
                            <p>Don't have an account? <a href="student@vpregister">Register here</a></p>
                        </div>
                    </form>
                    
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('error'))
<script>
Swal.fire({
    toast: true,              // ✅ popup nahi, small toast
    position: 'top-end',      // ✅ right top
    icon: 'error',
    title: '{{ session('error') }}',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,

    background:'#7e0808',     // dashboard dark theme
    color:'#fff',

    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
</script>
@endif
                  
                </div>
            </div>
        </div>
    </section>

  
</body>
</html>