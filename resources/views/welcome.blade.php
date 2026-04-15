

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding Safari · 3D Web + WhatsApp + Assessment</title>
    <!-- Font Awesome, Google Fonts, Leaflet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
 <link rel="stylesheet" href="css/welcome.css">
 <style>.float-both{
  animation: floatBoth 4s ease-in-out infinite;
}

@keyframes floatBoth{
  0%   { transform: translate(0,0); }
  25%  { transform: translate(18px,-18px); }
  50%  { transform: translate(0,-23px); }
  75%  { transform: translate(-18px,-18px); }
  100% { transform: translate(0,0); }
}
.left-buttons{
    position: fixed;   
    left: -130px;        
    top: 400px;         
    transform: rotate(90deg);
    
    display: flex;
    flex-direction: row; 
    gap: 12px;
    z-index: 9999;    
}
</style>
</head>
<body>
    <canvas id="webgl-bg"></canvas>
    <div class="code-bg" id="code-bg"></div>

    <div class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></div>

    <header id="header">
        <div class="header-slider"></div>
        <div class="container header-container">
            <div class="logo">
                <div class="logo-icon"><i class="fas fa-code"></i></div>
                <div class="logo-text">Coding<span>Safari</span></div>
            </div>
            <div class="mobile-menu-btn"><i class="fas fa-bars"></i></div>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#prizes">Prizes</a></li>
                    <li><a href="#map">Venue</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <!-- Assessment Portal button (replaces login) -->
                <a href="student@vp@login" class="btn btn-assessment" ><i class="fas fa-laptop-code"></i> Assesment</a>
                <a href="student@vpregister" class="btn btn-primary">Register</a>
            </div>
              <div class="left-buttons">
                <!-- Assessment Portal button (replaces login) -->
                <a href="student@vp@login" class="btn btn-assessment" ><i class="fas fa-laptop-code"></i> Assesment</a>
                <a href="student@vpregister" class="btn btn-primary">Register</a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="container hero-container">
                <div class="hero-content">
                    <h1>Embark on a <span>Coding Safari</span> Adventure</h1>
                 <p id="write" class="typing-text"></p>
                    <div class="hero-buttons">
                        <a href="#register" class="btn btn-primary">Begin Adventure</a>
                        <a href="#prizes" class="btn btn-accent">Explore Prizes</a>
                
<div class="fab-container">
   <div class="fab-main" onclick="toggleFab()">
    <i id="fabIcon" class="fas fa-comment-dots"></i>
</div>

    <a href="https://wa.me/918081096231?text=Hello" class="fab-item whatsapp" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="tel:+919999999999" class="fab-item call">
        <i class="fas fa-phone"></i>
    </a>

    <a href="https://t.me/rvi8081" class="fab-item telegram" target="_blank">
        <i class="fab fa-telegram-plane"></i>
    </a>
</div>



                    </div>
                </div>
                <div class="hero-image" >
                    <img class="float-both" src="image/Would You Enjoy Studying Computer Science_ Questions to Consider.jpg" alt="Coding Hackathon">
                </div>
            </div>
        </section>

        <section class="prizes" id="prizes">
            <div class="container">
                <h2 class="section-title">Expedition Rewards</h2>
                <div class="prize-cards">
                    <div class="prize-card"><div class="prize-icon"><i class="fas fa-crown"></i></div><h3>Grand Explorer</h3><div class="amount"></div><p>+ Tech Internship + MacBook Pro + Trophy</p></div>
                    <div class="prize-card"><div class="prize-icon"><i class="fas fa-gem"></i></div><h3>Master Adventurer</h3><div class="amount">₹40,000</div><p>+ Premium Courses + iPad Air + Medal</p></div>
                    <div class="prize-card"><div class="prize-icon"><i class="fas fa-trophy"></i></div><h3>Trailblazer</h3><div class="amount">₹20,000</div><p>+ Coding Resources + Smart Watch + Award</p></div>
                </div>
            </div>
        </section>

        <section class="map-section" id="map">
            <div class="container">
                <h2 class="section-title">Event Venue</h2>
                <div class="map-container">
                    <div class="map-content">
                        <h3 style="font-size:2.2rem; margin-bottom:20px; color:var(--light);">GPK College Campus</h3>
                        <p style="font-size:1.2rem; margin-bottom:25px; color:var(--gray);">Join us at the beautiful GPK College campus for an unforgettable hackathon experience.</p>
                        <div class="location-details">
                            <h3>Venue Details</h3>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> GPK College, Shivaji University Road, Kolhapur, Maharashtra 416004</p>
                            <p><i class="fas fa-calendar-alt"></i> <strong>Date:</strong> December 15-17, 2023</p>
                            <p><i class="fas fa-clock"></i> <strong>Time:</strong> 9:00 AM - 6:00 PM Daily</p>
                            <p><i class="fas fa-building"></i> <strong>Building:</strong> Computer Science Department, Block C</p>
                            <p><i class="fas fa-phone"></i> <strong>Contact:</strong> +91 98765 43210</p>
                        </div>
                    </div>
                    <div class="map-wrapper">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.917197803077!2d80.28575477513127!3d26.490610778103417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c383cda76b883%3A0x570e07ac70db62ee!2sGovernment%20Polytechnic%20Kanpur!5e0!3m2!1sen!2sin!4v1770454187108!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="features" id="features">
            <div class="container">
                <h2 class="section-title">Expedition Features</h2>
                <div class="features-grid">
                    <div class="feature-card"><div class="feature-icon"><i class="fas fa-user-astronaut"></i></div><h3>Student Portal</h3><p>Specialized login and registration system for students.</p></div>
                    <div class="feature-card"><div class="feature-icon"><i class="fas fa-puzzle-piece"></i></div><h3>Challenging Quests</h3><p>Interactive quiz platform with multiple difficulty levels.</p></div>
                    <div class="feature-card"><div class="feature-icon"><i class="fas fa-graduation-cap"></i></div><h3>Expedition Guides</h3><p>Comprehensive resources, tutorials, and mentorship.</p></div>
                </div>
            </div>
        </section>

        <section class="cta" id="register">
            <div class="container">
                <h2>Ready for the Expedition?</h2>
                <p>Join fellow coding adventurers in this thrilling hackathon. Showcase your skills and claim legendary prizes.</p>
                <div class="cta-buttons">
                    <a href="student@vpregister" class="btn btn-primary">Join Expedition</a>
                    <a href="student@vp@login" class="btn btn-secondary" ><i class="fas fa-laptop-code"></i> Assessment Portal</a>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact">
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <div class="footer-logo">Coding<span>Safari</span></div>
                    <p>An extraordinary hackathon expedition where students embark on a coding journey through challenging landscapes of algorithms, logic, and innovation.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h3 class="footer-heading">Expedition Map</h3>
                    <ul>
                        <li><a href="#home"><i class="fas fa-chevron-right"></i> Base Camp</a></li>
                        <li><a href="#prizes"><i class="fas fa-chevron-right"></i> Expendition Reward</a></li>
                        <li><a href="#map"><i class="fas fa-chevron-right"></i> Venue Location</a></li>
                        <li><a href="student@vpregister"><i class="fas fa-chevron-right"></i> Join coding safari</a></li>
                    </ul>
                </div>
                
                <div class="contact-info">
                    <h3 class="footer-heading">Contact & Call</h3>
                    <p><i class="fas fa-map-marker-alt"></i> GPK College, Gurudev Metrostation</p>
                    <p><i class="fas fa-envelope"></i> vp3472716@gmail.com</p>
                    <div class="phone-with-call">
                        <a href="tel:+918081096231"><i class="fas fa-phone"></i> 8081096231</a>
                        <a href="tel:+919369806084"><i class="fas fa-phone"></i> 9369806084</a>
                    </div>
                  
                    <p style="margin-top:15px;"><i class="fas fa-clock"></i> Help: 10AM - 5PM</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2026 Coding Safari Hackathon Expedition. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/three@0.160.0/build/three.min.js"></script>

    <script src="js/welcome.js"></script></body>
</html>