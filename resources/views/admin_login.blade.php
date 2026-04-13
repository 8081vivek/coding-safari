<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Coding Safari Hackathon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            --warning: #FFA502;
            --success: #00C49A;
        }
        
        body {
            background-color: var(--darker);
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
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
        
       
        /* Admin Login Container */
        .admin-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
        }
        
        /* Login Card */
        .admin-card {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.95));
            border-radius: 20px;
            padding: 60px 50px;
            width: 100%;
            max-width: 550px;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.03),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }
        
        .admin-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
        }
        
        /* Admin Header */
        .admin-header {
            text-align: center;
            /* margin-bottom: 50px; */
            position: relative;
        }
        
        .admin-logo {
            font-size: 4rem;
            color: var(--primary);
            /* margin-bottom: 20px; */
            animation: pulse 3s infinite ease-in-out;
            position: relative;
            display: inline-block;
        }
        
        .admin-logo::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, rgba(255, 107, 53, 0.2) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: -1;
        }
        
        @keyframes pulse {
            0% { 
                transform: scale(1);
                text-shadow: 0 0 10px rgba(255, 107, 53, 0.3);
            }
            50% { 
                transform: scale(1.05);
                text-shadow: 0 0 20px rgba(255, 107, 53, 0.5);
            }
            100% { 
                transform: scale(1);
                text-shadow: 0 0 10px rgba(255, 107, 53, 0.3);
            }
        }
        
        .admin-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: var(--light);
            margin-bottom: 15px;
            letter-spacing: 1px;
        }
        
        .admin-header h1 span {
            color: var(--primary);
            position: relative;
            display: inline-block;
        }
        
        .admin-header h1 span::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--primary), transparent);
            bottom: -5px;
            left: 0;
        }
        
        .admin-header p {
            color: var(--gray);
            font-size: 1.2rem;
            max-width: 400px;
            margin: 0 auto;
            line-height: 1.8;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 30px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 12px;
            color: var(--light);
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        label i {
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        .required {
            color: var(--danger);
            font-weight: bold;
            margin-left: 5px;
        }
        
        .input-with-icon {
            position: relative !important;
        }
        
        .input-with-icon i {
            position: absolute !important;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color:  #A0A0B0 !important;
            z-index: 100;
            font-size: 1.3rem;
            transition:  0.3s ease;
        }
        
        input {
            width: 100%;
            padding: 18px 20px 18px 55px;
            background: rgba(255, 255, 255, 0.04);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: var(--light);
            font-family: 'Source Serif Pro', serif;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 
                0 0 0 4px rgba(255, 107, 53, 0.1),
                0 5px 15px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.06);
            transform: translateY(-2px);
        }
        
        input:hover {
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        input:focus + i {
            color: var(--primary);
        }
        
       
        
        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 18px 32px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            border: none;
            font-size: 1.1rem;
            font-family: 'Source Serif Pro', serif;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.7s ease;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #FF8C66);
            color: white;
            width: 100%;
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 15px 35px rgba(255, 107, 53, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            background: linear-gradient(135deg, #FF8C66, var(--primary));
        }
        
        .btn-primary:active {
            transform: translateY(-2px);
        }
        
        /* Form Messages */
        .form-message {
            padding: 20px;
            border-radius: 12px;
            /* margin-bottom: 30px; */
            display: none;
            animation: slideIn 0.5s ease;
            border-left: 4px solid;
            background: rgba(255, 255, 255, 0.03);
        }
        
        .form-message.success {
            border-left-color: var(--success);
            color: var(--success);
        }
        
        .form-message.error {
            border-left-color: var(--danger);
            color: var(--danger);
        }
        
        .form-message.info {
            border-left-color: var(--warning);
            color: var(--warning);
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Security Notes */
        .security-notes {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }
        
        .security-note {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: rgba(255, 107, 53, 0.08);
            border-radius: 10px;
            border: 1px solid rgba(255, 107, 53, 0.2);
            color: var(--primary);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .security-note:hover {
            background: rgba(255, 107, 53, 0.12);
            transform: translateX(5px);
        }
        
        .security-note i {
            font-size: 1.3rem;
            min-width: 25px;
        }
        
        /* Login Footer */
        .login-footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--gray);
        }
        
        .login-footer p {
            margin-bottom: 10px;
        }
        
        .login-footer a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            padding: 5px 0;
        }
        
        .login-footer a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        
        .login-footer a:hover {
            color: #FF8C66;
        }
        
        .login-footer a:hover::after {
            width: 100%;
        }
        
        /* Loader */
        .loader {
            display: none;
            width: 22px;
            height: 22px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Additional Features */
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            color: var(--gray);
            transition: color 0.3s ease;
        }
        
        .remember-me:hover {
            color: var(--light);
        }
        
        .remember-me input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .remember-me label {
            margin-bottom: 0;
            cursor: pointer;
            font-weight: normal;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .admin-card {
                padding: 40px 30px;
                max-width: 100%;
                margin: 20px;
            }
            
            .admin-header h1 {
                font-size: 2.2rem;
            }
            
            .admin-logo {
                font-size: 3rem;
            }
            
            .admin-header p {
                font-size: 1rem;
            }
            
            input {
                padding: 16px 20px 16px 50px;
            }
            
            .btn {
                padding: 16px 24px;
            }
        }
        
        @media (max-width: 480px) {
            .admin-container {
                padding: 10px;
            }
            
            .admin-card {
                padding: 30px 20px;
            }
            
            .admin-header h1 {
                font-size: 1.8rem;
            }
            
            .admin-logo {
                font-size: 2.5rem;
            }
            
            .login-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
        
        /* Password Strength Indicator */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            display: none;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-weak { 
            background: var(--danger); 
            width: 25%; 
        }
        
        .strength-medium { 
            background: var(--warning); 
            width: 50%; 
        }
        
        .strength-good { 
            background: var(--secondary); 
            width: 75%; 
        }
        
        .strength-strong { 
            background: var(--success); 
            width: 100%; 
        }
        
        /* Login Counter */
        .login-attempts {
            text-align: center;
            color: var(--gray);
            font-size: 0.9rem;
            margin-top: 10px;
            display: none;
        }
        
        /* Language Selector */
        .language-selector {
            position: absolute;
            top: 30px;
            right: 30px;
        }
        
        .language-selector select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light);
            padding: 8px 15px;
            border-radius: 8px;
            font-family: 'Source Serif Pro', serif;
            cursor: pointer;
        }
        
        .language-selector select:focus {
            outline: none;
            border-color: var(--primary);
        }
    </style>
</head>
<body>
    <!-- Animated Grid Background -->
    <div class="grid-bg"></div>
    
  
    
    <!-- Admin Login Container -->
    <div class="admin-container">
        <div class="admin-card">
            <!-- Admin Header -->
            <div class="admin-header">
                <div class="admin-logo">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h1>Coding<span>Safari</span> Admin</h1>
                <p>Secure administrative portal for managing the hackathon platform. Restricted access only.</p>
            </div>
            
            <!-- Form Messages -->
            <div class="form-message" id="formMessage"></div>
            
            <!-- Admin Login Form -->
            <form action="../admin@vp@login" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user-cog"></i>
                        Admin Mobile/Email <span class="required">*</span>
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="email" required 
                               placeholder="Enter your admin mobile/email"
                               autocomplete="username">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-key"></i>
                        Password <span class="required">*</span>
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" required 
                               placeholder="Enter your admin password"
                               >
                        
                    </div>
                    <div class="password-strength" id="passwordStrength">
                        <div class="password-strength-bar"></div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" id="loginButton">
                    <span id="buttonText">
                        <i class="fas fa-sign-in-alt"></i> Login to Admin Portal
                    </span>
                    <div class="loader" id="buttonLoader"></div>
                </button>
                
                
                
                <!-- Login Footer -->
                <div class="login-footer">
                    <p>Need assistance? <a href="#" id="supportLink">Contact System Administrator</a></p>
                    <p style="font-size: 0.9rem; opacity: 0.7;">
                        <i class="fas fa-copyright"></i> 2025 Coding Safari Hackathon. v2.1.4
                    </p>
                </div>
            </form>
        </div>
    </div>

    @if (session('error'))
<script>
Swal.fire({
    toast: true,
    position: 'top-end', 
    icon: 'error',
    title: '{{ session('error') }}',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    background: '#fff',
    iconColor: '#e3342f',
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
</script>
@endif


@if (session('success'))
<script>
Swal.fire({
  toast:true,
  position:'top-end',
  icon:'success',
  title:'{{ session('success') }}',
  showConfirmButton:false,
  timer:2500
});
</script>
@endif


</body>
</html>