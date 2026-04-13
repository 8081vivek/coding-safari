<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | Coding Safari Hackathon</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
       a,
a:hover,
a:focus,
a:active{
    text-decoration: none;
}
a{
    text-decoration:none;
    color:#4f46e5;
    transition:0.3s;
}

a:hover{
    color:#1e40af;
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
            max-width: 800px;
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
            text-decoration: none;
            text-align: center;
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
        
        .btn-full {
            width: 100%;
        }
        
        /* Verification Section */
        .verification-section {
            padding: 100px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .verification-container {
            width: 100%;
        }
        
        .verification-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .verification-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: var(--light);
            margin-bottom: 15px;
        }
        
        .verification-header h1 span {
            color: var(--primary);
        }
        
        .verification-header p {
            color: var(--gray);
            font-size: 1.2rem;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .verification-card {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: 12px;
            padding: 50px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            text-align: center;
        }
        
        .verification-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(145deg, rgba(255, 107, 53, 0.1), rgba(108, 99, 255, 0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 3.5rem;
            color: var(--primary);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 107, 53, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(255, 107, 53, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 107, 53, 0); }
        }
        
        .verification-title {
            font-size: 2rem;
            color: var(--light);
            margin-bottom: 15px;
        }
        
        .verification-subtitle {
            color: var(--gray);
            font-size: 1.1rem;
            margin-bottom: 40px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* OTP Input Styles */
        .otp-container {
            margin: 40px 0;
        }
        
        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .otp-input {
            width: 60px;
            height: 70px;
            font-size: 2rem;
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: var(--light);
            transition: all 0.3s ease;
        }
        
        .otp-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
            background: rgba(255, 255, 255, 0.08);
        }
        
        .otp-input.active {
            border-color: var(--primary);
            background: rgba(255, 107, 53, 0.1);
        }
        
        /* Timer Styles */
        .timer-container {
            margin: 25px 0;
        }
        
        .timer {
            font-size: 1.2rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .timer.expired {
            color: var(--danger);
        }
        
        .resend-link {
            color: var(--accent);
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .resend-link:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .resend-link.disabled {
            color: var(--gray);
            cursor: not-allowed;
        }
        
        .resend-link.disabled:hover {
            color: var(--gray);
            text-decoration: none;
        }
        
        /* Email Display */
        .email-display {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 15px;
            margin: 30px 0;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .email-display strong {
            color: var(--primary);
        }
        
        /* Verification Status */
        .verification-status {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            display: none;
        }
        
        .verification-status.success {
            background: rgba(0, 196, 154, 0.1);
            border: 1px solid rgba(0, 196, 154, 0.3);
            color: var(--success);
            display: block;
        }
        
        .verification-status.error {
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid rgba(255, 71, 87, 0.3);
            color: var(--danger);
            display: block;
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
        
        /* Instructions */
        .instructions {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 20px;
            margin-top: 40px;
            border-left: 4px solid var(--primary);
        }
        
        .instructions h4 {
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .instructions ul {
            list-style-type: none;
            padding-left: 0;
        }
        
        .instructions li {
            margin-bottom: 10px;
            color: var(--gray);
            display: flex;
            align-items: flex-start;
        }
        
        .instructions li i {
            color: var(--secondary);
            margin-right: 10px;
            margin-top: 3px;
        }
        
        /* Error Message */
        .error-message {
            color: var(--danger);
            font-size: 0.9rem;
            margin-top: 10px;
            display: none;
        }
        
        /* Registration Details */
        .registration-details {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 20px;
            margin: 30px 0;
            text-align: left;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .detail-item {
            margin-bottom: 10px;
        }
        
        .detail-label {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .detail-value {
            color: var(--light);
            font-weight: 600;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .verification-section {
                padding: 60px 0;
            }
            
            .verification-card {
                padding: 30px 20px;
            }
            
            .verification-icon {
                width: 90px;
                height: 90px;
                font-size: 2.5rem;
            }
            
            .verification-title {
                font-size: 1.7rem;
            }
            
            .otp-inputs {
                gap: 10px;
            }
            
            .otp-input {
                width: 50px;
                height: 60px;
                font-size: 1.7rem;
            }
            
            .details-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .otp-inputs {
                gap: 8px;
            }
            
            .otp-input {
                width: 45px;
                height: 55px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Grid Background -->
    <div class="grid-bg"></div>
    
    <!-- Verification Section -->
    <section class="verification-section">
        <div class="container verification-container">
            <div class="verification-header">
                <h1>Verify <span>Email</span></h1>
                <p>Complete your registration by verifying your email address</p>
            </div>
            
            <div class="verification-card">
                <!-- Verification Icon -->
                <div class="verification-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                
                <h2 class="verification-title">Email Verification Required</h2>
                <p class="verification-subtitle">
                    We've sent a 6-digit verification code to your email address. 
                    Please enter the code below to complete your registration.
                </p>
                
                <!-- Registration Details -->
                <div class="registration-details" id="registrationDetails">
                    <h4 style="color: var(--primary); margin-bottom: 15px;">
                        <i class="fas fa-info-circle"></i> Registration Details
                    </h4>
                    <div class="details-grid">
                        <div class="detail-item">
                            <div class="detail-label">Registration ID</div>
                            <div class="detail-value" id="regId">{{$dataShow->registrationId}}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Name</div>
                            <div class="detail-value" id="studentName">{{$dataShow->name}}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Email</div>
                            <div class="detail-value" id="studentEmail">{{$dataShow->email}}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Status</div>
                            <div class="detail-value" style="color: var(--primary);">Pending Verification</div>
                        </div>
                    </div>
                </div>
                
                <!-- Email Display -->
                <div class="email-display">
                    <i class="fas fa-envelope"></i> Code sent to: 
                    <strong id="displayEmail">{{$dataShow->email}}</strong>
                </div>
                
                <!-- OTP Input Container -->
                <div class="otp-container">
                    <p style="color: var(--gray); margin-bottom: 20px;">
                        Enter the 6-digit code from your email:
                    </p>
                    <form action="../otp@vpVerificationPage" method="post" >
                        @csrf
                    <div class="otp-inputs">
                        <input type="text" class="otp-input" maxlength="1" data-index="1" autocomplete="off" required>
                        <input type="text" class="otp-input" maxlength="1" data-index="2" autocomplete="off" required>
                        <input type="text" class="otp-input" maxlength="1" data-index="3" autocomplete="off" required>
                        <input type="text" class="otp-input" maxlength="1" data-index="4" autocomplete="off" required>
                        <input type="text" class="otp-input" maxlength="1" data-index="5" autocomplete="off" required>
                        <input type="text" class="otp-input" maxlength="1" data-index="6" autocomplete="off" required>
                    </div>
                    
                    <!-- Hidden input for complete OTP -->
                    <input type="hidden" name="otp" id="completeOTP">
                     
                    <!-- Error Message -->
                    <div class="error-message" id="otpError">
                        <i class="fas fa-exclamation-circle"></i> 
                        <span id="errorText">Invalid OTP. Please try again.</span>
                    </div>
                </div>
                
                <!-- Timer Container -->
                <div class="timer-container">
                    <div class="timer" id="timer">
                        Code expires in: <span id="time">02:00</span>
                    </div>
                    <p style="color: var(--gray);">
                        Didn't receive the code? 
                        <span class="resend-link" > <a href="resendOtp" id="resendLink">Resend OTP</a>
                            </span>
                    </p>
                </div>
                
                <!-- Loading Spinner -->
                <div class="loading-spinner" id="loadingSpinner"></div>
                
                <!-- Verification Status -->
                <div class="verification-status" id="verificationStatus"></div>
                
                <!-- Submit Button -->
                <button class="btn btn-primary btn-full"  >
                    <i class="fas fa-check-circle"></i> Verify Email
                </button>
                </form>
                <!-- Instructions -->
                <div class="instructions">
                    <h4><i class="fas fa-lightbulb"></i> Important Instructions</h4>
                    <ul>
                        <li>
                            <i class="fas fa-check"></i>
                            <span>The OTP is valid for 2 minutes only</span>
                        </li>
                        <li>
                            <i class="fas fa-check"></i>
                            <span>Check your spam folder if you don't see the email</span>
                        </li>
                        <li>
                            <i class="fas fa-check"></i>
                            <span>Complete verification within 24 hours to activate registration</span>
                        </li>
                        <li>
                            <i class="fas fa-check"></i>
                            <span>Contact support if you're facing issues</span>
                        </li>
                    </ul>
                </div>
                
                
            </div>
        </div>
    </section>
   @if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function () {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: @json(session('success')),
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>
@endif

   @if(session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        customClass: {
            popup: 'premium-error-toast'
        },
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    Toast.fire({
        icon: 'error',
        title: @json(session('error'))
    });
});
</script>

<style>
.premium-error-toast{
    border-radius:14px!important;
    background:linear-gradient(135deg,#ef4444,#b91c1c)!important;
    color:#fff!important;
    font-weight:600!important;
    box-shadow:0 12px 35px rgba(0,0,0,0.25)!important;
}
</style>
@endif

<script>
// ✅ Back button block
history.pushState(null, null, location.href);
window.addEventListener("popstate", () => history.go(1));
</script>

<script>
let timerInterval;
let canResend = false;

const OTP_DURATION = 120;                 // 2 minutes
const STORAGE_KEY = "otp_expiry_ts";      // timer persistence key

document.addEventListener("DOMContentLoaded", () => {
  initializeOTPInputs();
  startOrResumeTimer();   // ✅ instead of startTimer()
  setupResendOTP();
});

// =========================
// OTP inputs
// =========================
function initializeOTPInputs() {
  const otpInputs = document.querySelectorAll(".otp-input");
  const completeOTPInput = document.getElementById("completeOTP");

  if (!otpInputs.length || !completeOTPInput) return;

  otpInputs[0].focus();

  otpInputs.forEach((input, index) => {
    input.addEventListener("input", (e) => {
      const value = e.target.value;

      // only digits
      if (!/^\d*$/.test(value)) {
        e.target.value = "";
        return;
      }

      hideError();

      // move next
      if (value && index < otpInputs.length - 1) {
        otpInputs[index + 1].focus();
      }

      updateCompleteOTP(otpInputs, completeOTPInput);
    });

    input.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && !e.target.value && index > 0) {
        otpInputs[index - 1].focus();
      }
    });

    input.addEventListener("paste", (e) => {
      e.preventDefault();
      const pastedData = e.clipboardData.getData("text").trim();

      if (/^\d{6}$/.test(pastedData)) {
        for (let i = 0; i < 6; i++) otpInputs[i].value = pastedData[i];
        updateCompleteOTP(otpInputs, completeOTPInput);
        otpInputs[5].focus();
      }
    });
  });
}

function updateCompleteOTP(otpInputs, completeOTPInput) {
  let otp = "";
  otpInputs.forEach((i) => (otp += i.value));
  completeOTPInput.value = otp;
}

// =========================
// ✅ Timer (reload pe reset nahi hoga)
// =========================
function startOrResumeTimer() {
  clearInterval(timerInterval);

  // expiry timestamp get
  let expiry = parseInt(localStorage.getItem(STORAGE_KEY) || "0", 10);
  const now = Date.now();

  // if expiry not set OR already expired => create new
  if (!expiry || expiry <= now) {
    expiry = now + OTP_DURATION * 1000;
    localStorage.setItem(STORAGE_KEY, String(expiry));
  }

  // UI reset
  const timerEl = document.getElementById("timer");
  if (timerEl) timerEl.classList.remove("expired");

  // start ticking
  tick(expiry);
  timerInterval = setInterval(() => tick(expiry), 1000);
}

function tick(expiry) {
  const now = Date.now();
  let timeLeft = Math.ceil((expiry - now) / 1000);

  if (timeLeft <= 0) {
    timeLeft = 0;
    clearInterval(timerInterval);
    timerExpired();
  }

  updateTimerDisplay(timeLeft);
}

function updateTimerDisplay(timeLeft) {
  const minutes = Math.floor(timeLeft / 60);
  const seconds = timeLeft % 60;

  const timeEl = document.getElementById("time");
  if (timeEl) {
    timeEl.textContent = `${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
  }

  const timerEl = document.getElementById("timer");
  if (timerEl) {
    if (timeLeft < 60) timerEl.classList.add("expired");
    else timerEl.classList.remove("expired");
  }

  const resendLink = document.getElementById("resendLink");
  if (resendLink) {
    if (timeLeft === 0) {
      resendLink.classList.remove("disabled");
      canResend = true;
    } else {
      resendLink.classList.add("disabled");
      canResend = false;
    }
  }
}

function timerExpired() {
  canResend = true;

  const resendLink = document.getElementById("resendLink");
  if (resendLink) resendLink.classList.remove("disabled");

  const timerText = document.getElementById("timer");
  if (timerText) {
    timerText.innerHTML = 'OTP expired. <span class="resend-link"> <a href="resendOtp">Resend OTP</a></span>';
  }
}

function setupResendOTP() {
  const resendLink = document.getElementById("resendLink");
  const resendForm = document.getElementById("resendForm");

  if (!resendLink || !resendForm) return;

  resendLink.addEventListener("click", (e) => {
    e.preventDefault();

    if (!canResend) {
      showError("Timer khatam hone ke baad hi resend kar sakte ho.");
      return;
    }

    // ✅ New OTP => timer reset from start
    localStorage.removeItem(STORAGE_KEY);

    // backend call
    // showLoading(true); // if you have it
    resendForm.submit();
  });
}

// =========================
// Helpers
// =========================
function hideError() {
  const errorDiv = document.getElementById("otpError");
  if (errorDiv) errorDiv.style.display = "none";
}

function showError(msg) {
  const errorDiv = document.getElementById("otpError");
  if (errorDiv) {
    errorDiv.textContent = msg;
    errorDiv.style.display = "block";
  }
}
</script>


</script>
</body>
</html>