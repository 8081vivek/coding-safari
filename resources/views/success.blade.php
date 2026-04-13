<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Completed | Coding Safari</title>
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
            font-family: 'Source Serif Pro', serif;
            background-color: var(--darker);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
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

        /* Floating Orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(255, 107, 53, 0.2), transparent 70%);
            filter: blur(40px);
            z-index: -1;
        }

        .orb-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
            background: radial-gradient(circle at 30% 30%, rgba(255, 107, 53, 0.15), transparent 70%);
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -150px;
            background: radial-gradient(circle at 70% 70%, rgba(108, 99, 255, 0.15), transparent 70%);
        }

        .container {
            max-width: 800px;
            width: 100%;
            animation: slideUp 0.8s ease-out;
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

        /* Main Card */
        .certificate-card {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.98));
            backdrop-filter: blur(10px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
        }

        /* Header with Gradient */
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 50px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 50px;
            color: white;
            position: relative;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(255, 255, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
        }

        .card-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: white;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .card-header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Card Body */
        .card-body {
            padding: 40px;
        }

        /* Score Section */
        .score-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .score-label {
            color: var(--gray);
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .score-circle {
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;
            position: relative;
        }

        .score-circle svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .score-circle circle {
            fill: none;
            stroke-width: 8;
            stroke-linecap: round;
        }

        .score-bg {
            stroke: rgba(255, 255, 255, 0.1);
        }

        .score-progress {
            stroke: var(--primary);
            stroke-dasharray: 502; /* 2 * π * 80 ≈ 502 */
            stroke-dashoffset: calc(502 - (502 * {{ $attempt->score }}) / 100);
            filter: drop-shadow(0 0 10px rgba(255, 107, 53, 0.5));
            animation: progress 1.5s ease-out forwards;
        }

        @keyframes progress {
            from {
                stroke-dashoffset: 502;
            }
            to {
                stroke-dashoffset: calc(502 - (502 * {{ $attempt->score }}) / 100);
            }
        }

        .score-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .score-value {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--light);
            line-height: 1;
        }

        .score-max {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .score-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            min-width: 150px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 107, 53, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Achievement Badge */
        .achievement-badge {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 193, 7, 0.1));
            border: 2px solid #FFD700;
            padding: 15px 30px;
            border-radius: 50px;
            margin: 30px 0;
            color: #FFD700;
            font-weight: 600;
            font-size: 1.2rem;
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.2);
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 20px rgba(255, 215, 0, 0.2); }
            to { box-shadow: 0 0 40px rgba(255, 215, 0, 0.4); }
        }

        .achievement-badge i {
            font-size: 1.8rem;
        }

        /* Certificate Preview */
        .certificate-preview {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.95), rgba(10, 10, 15, 0.98));
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            border: 2px dashed var(--primary);
            display: flex;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap;
            position: relative;
            overflow: hidden;
        }

        .certificate-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 107, 53, 0.05) 0%, transparent 50%);
            animation: rotate 30s linear infinite;
        }

        .preview-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
            position: relative;
            z-index: 1;
        }

        .preview-content {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .preview-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--light);
            margin-bottom: 5px;
        }

        .preview-content p {
            color: var(--gray);
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 40px 0 20px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-family: 'Source Serif Pro', serif;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #e55a2b);
            color: white;
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 107, 53, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--light);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: rgba(255, 107, 53, 0.1);
            transform: translateY(-3px);
        }

        .btn-accent {
            background: linear-gradient(135deg, var(--accent), #5a52e0);
            color: white;
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }

        /* Share Section */
        .share-section {
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .share-title {
            color: var(--gray);
            margin-bottom: 15px;
        }

        .share-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .share-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .share-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Footer */
        .card-footer {
            padding: 25px 40px;
            background: rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .card-footer i {
            color: var(--danger);
            margin: 0 3px;
        }

        /* Confetti Canvas */
        #confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1000;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-header h1 {
                font-size: 2.2rem;
            }

            .card-body {
                padding: 30px 20px;
            }

            .score-stats {
                gap: 20px;
            }

            .stat-item {
                min-width: 120px;
                padding: 15px;
            }

            .certificate-preview {
                flex-direction: column;
                text-align: center;
            }

            .preview-icon {
                margin: 0 auto;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .score-circle {
                width: 150px;
                height: 150px;
            }

            .score-value {
                font-size: 2.8rem;
            }

            .achievement-badge {
                font-size: 1rem;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="grid-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <!-- Confetti Canvas -->
    <canvas id="confetti-canvas"></canvas>

    <div class="container">
        <div class="certificate-card">
            <!-- Header -->
            <div class="card-header">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h1>Assessment Completed!</h1>
                <p>Your coding expedition has reached a milestone</p>
            </div>

            <!-- Body -->
            <div class="card-body">
                <!-- Score Section -->
                <div class="score-section">
                    <div class="score-label">YOUR SCORE</div>
                    
                    <!-- Circular Progress -->
                    <div class="score-circle">
                        <svg viewBox="0 0 180 180">
                            <circle class="score-bg" cx="90" cy="90" r="80"></circle>
                            <circle class="score-progress" cx="90" cy="90" r="80"></circle>
                        </svg>
                        <div class="score-text">
                            <div class="score-value">{{ $attempt->score }}</div>
                        </div>
                    </div>

                    

                    
                </div>

                <!-- Certificate Preview -->
                <div class="certificate-preview">
                    <div class="preview-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="preview-content">
                        <h3>Your Certificate is Ready!</h3>
                        <p>Download your achievement certificate to showcase your skills</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="button-group">
                  <a href="{{ route('certificate.view', ['id' => Crypt::encrypt($attempt->id)]) }}" target="_blank" class="btn btn-primary">
    <i class="fas fa-download"></i>
    Download Certificate
</a>
                   
                </div>

                <!-- Share Section -->
                <div class="share-section">
                    <div class="share-title">Share your achievement</div>
                    <div class="share-buttons">
                        <a href="#" class="share-btn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="share-btn">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="share-btn">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="share-btn">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer">
                <p>Made with <i class="fas fa-heart"></i> for Coding Safari Hackathon • {{ date('d M Y') }}</p>
                <p style="margin-top: 10px; font-size: 0.85rem;">Certificate ID: CS-{{ rand(100000, 999999) }}</p>
            </div>
        </div>
    </div>
    <!-- Scripts -->
     <script>
history.pushState(null, "", location.href);

  window.onpopstate = function () {
      // User ko home page pe redirect karo
      window.location.replace("/"); // <-- yaha apna home page URL daalo
  };

</script>
    <script>
      window.location.replace(data.redirect_url);
        // Disable back/forward navigation
        history.pushState(null, null, location.href);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, location.href);
        });

        // Confetti Effect
        (function() {
            const canvas = document.getElementById('confetti-canvas');
            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];
            
            function resizeCanvas() {
                width = window.innerWidth;
                height = window.innerHeight;
                canvas.width = width;
                canvas.height = height;
            }
            
            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();
            
            class Particle {
                constructor() {
                    this.x = Math.random() * width;
                    this.y = Math.random() * height - height;
                    this.size = Math.random() * 8 + 4;
                    this.speedY = Math.random() * 3 + 2;
                    this.speedX = Math.random() * 2 - 1;
                    this.color = `hsl(${Math.random() * 60 + 350}, 70%, 50%)`; // Orange-red range
                }
                
                update() {
                    this.y += this.speedY;
                    this.x += this.speedX;
                    
                    if (this.y > height) {
                        this.y = -this.size;
                        this.x = Math.random() * width;
                    }
                }
                
                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fillStyle = this.color;
                    ctx.fill();
                }
            }
            
            function initConfetti() {
                for (let i = 0; i < 50; i++) {
                    particles.push(new Particle());
                }
            }
            
            function animateConfetti() {
                ctx.clearRect(0, 0, width, height);
                
                particles.forEach(particle => {
                    particle.update();
                    particle.draw();
                });
                
                requestAnimationFrame(animateConfetti);
            }
            
            // Start confetti after a delay
            setTimeout(() => {
                initConfetti();
                animateConfetti();
            }, 500);
        })();

        // Add animation on hover for certificate preview
        document.querySelector('.certificate-preview').addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
            this.style.transition = 'all 0.3s ease';
        });

        document.querySelector('.certificate-preview').addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });

        // Dynamic badge animation
        const badge = document.querySelector('.achievement-badge');
        setInterval(() => {
            badge.style.transform = 'scale(1.05)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 200);
        }, 3000);

        // Prevent right-click on certificate area (optional)
        document.querySelector('.certificate-preview').addEventListener('contextmenu', (e) => {
            e.preventDefault();
        });
    </script>
</body>
</html>