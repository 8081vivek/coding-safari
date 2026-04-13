<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login | Coding Safari Hackathon</title>
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
            font-family:  serif;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 700px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .login-box {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.98));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-header p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        .login-header i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--light);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-group label i {
            color: var(--primary);
            margin-right: 8px;
            width: 20px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: var(--light);
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 107, 53, 0.1);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .assessment-hint {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .assessment-hint i {
            color: var(--primary);
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 30px 0 20px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.3);
        }

        .btn-login i {
            font-size: 1.2rem;
        }

        .login-footer {
            text-align: center;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .assessment-info {
            background: rgba(108, 99, 255, 0.1);
            border: 1px solid rgba(108, 99, 255, 0.2);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .assessment-info i {
            font-size: 1.5rem;
            color: var(--accent);
        }

        .assessment-info p {
            color: var(--light);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .assessment-info span {
            color: var(--primary);
            font-weight: 600;
        }

        /* Dashboard Styles (hidden initially) */
        .dashboard {
            display: none;
            min-height: 100vh;
        }

        .dashboard.active {
            display: flex;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-box {
                padding: 30px 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
        .quiz-container,
.question-text,
.option-text {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
    </style>
</head>
<body>
    <!-- Grid Background -->
    <div class="grid-bg"></div>

    <!-- Login Section -->
    <div class="login-container" id="loginSection">
        <div class="login-box">
            <div class="login-header">
                <i class="fas fa-laptop-code"></i>
                <h1>Assessment Login</h1>
                <p>Enter your details to access the assessment dashboard</p>
            </div>

            <div class="assessment-info">
                <i class="fas fa-info-circle"></i>
                <p>You need a valid <span>Assessment Code</span> to proceed. Contact your instructor if you don't have one.</p>
            </div>

            <form id="loginForm" action="{{route('quiz/show/vp8081')}}" method="post">
                @csrf
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Full Name</label>
                    <input type="text" id="fullName" name="name" placeholder="Enter your full name" value="{{$data->name}}" readonly>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{$data->email}}" readonly>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-phone"></i> Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" value="{{$data->mobile}}" readonly>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label><i class="fas fa-university"></i> College Name</label>
                        <input type="text" id="college" name="college" value="{{$data->collegeName}}" readonly>
                                                </div>

                    <div class="form-group">
                        <label><i class="fas fa-code-branch"></i> Branch</label>
                        <input id="branch" name="branch" value="{{$data->course}}" readonly/>
                            
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-qrcode"></i> Assessment Code</label>
                    <input type="text" id="assessmentCode" name="code" placeholder="Enter your assessment code (e.g.CDLVP2000)" required>
                   
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Access Assessment
                </button>

                <div class="login-footer">
                    <p>By logging in, you agree to our <a href="#">Terms</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('error'))
<script>
Swal.fire({
    toast: true,              
    position: 'top-end',     
    icon: 'error',
    title: '{{ session('error') }}',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,

    background:'#7e0808',     
    color:'#fff',

    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
</script>
@endif
    
</body>
</html>