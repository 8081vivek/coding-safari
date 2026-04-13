 (() => {
            const canvas = document.getElementById('webgl-bg');
            if (!canvas) return;
            const CFG = { startPoints: 140, addOnClick: 18, bounds: 14, speed: 0.016, linkDist: 3.0, maxSegments: 9000, lineOpacity: 0.28, pointSize: 0.065, rebuildEveryMs: 80 };
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 24;
            const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
            const points = [], vel = [];
            function randInBounds() { const b = CFG.bounds; return (Math.random() - 0.5) * b * 2; }
            function addPoints(n) { for (let i = 0; i < n; i++) { points.push(new THREE.Vector3(randInBounds(), randInBounds(), randInBounds())); vel.push(new THREE.Vector3((Math.random() - 0.5) * CFG.speed, (Math.random() - 0.5) * CFG.speed, (Math.random() - 0.5) * CFG.speed)); } rebuildPointMesh(); }
            let pointMesh;
            function rebuildPointMesh() {
                if (pointMesh) { pointMesh.geometry.dispose(); scene.remove(pointMesh); }
                const pos = new Float32Array(points.length * 3);
                for (let i = 0; i < points.length; i++) { pos[i*3] = points[i].x; pos[i*3+1] = points[i].y; pos[i*3+2] = points[i].z; }
                const geo = new THREE.BufferGeometry(); geo.setAttribute("position", new THREE.BufferAttribute(pos, 3));
                const mat = new THREE.PointsMaterial({ size: CFG.pointSize, transparent: true, opacity: 0.9 });
                pointMesh = new THREE.Points(geo, mat); scene.add(pointMesh);
            }
            let lineMesh;
            function rebuildLines() {
                if (lineMesh) { lineMesh.geometry.dispose(); scene.remove(lineMesh); }
                const maxD2 = CFG.linkDist * CFG.linkDist; const seg = []; let segCount = 0;
                for (let i = 0; i < points.length; i++) {
                    for (let j = i + 1; j < points.length; j++) {
                        const dx = points[i].x - points[j].x, dy = points[i].y - points[j].y, dz = points[i].z - points[j].z;
                        if (dx*dx + dy*dy + dz*dz < maxD2) { seg.push(points[i].x, points[i].y, points[i].z, points[j].x, points[j].y, points[j].z); segCount++; if (segCount >= CFG.maxSegments) break; }
                    } if (segCount >= CFG.maxSegments) break;
                }
                const geo = new THREE.BufferGeometry(); geo.setAttribute("position", new THREE.Float32BufferAttribute(seg, 3));
                lineMesh = new THREE.LineSegments(geo, new THREE.LineBasicMaterial({ transparent: true, opacity: CFG.lineOpacity }));
                scene.add(lineMesh);
            }
            function updatePoints() {
                const b = CFG.bounds;
                for (let i = 0; i < points.length; i++) {
                    points[i].add(vel[i]);
                    if (points[i].x > b || points[i].x < -b) vel[i].x *= -1;
                    if (points[i].y > b || points[i].y < -b) vel[i].y *= -1;
                    if (points[i].z > b || points[i].z < -b) vel[i].z *= -1;
                }
                const attr = pointMesh.geometry.getAttribute("position");
                for (let i = 0; i < points.length; i++) attr.setXYZ(i, points[i].x, points[i].y, points[i].z);
                attr.needsUpdate = true;
            }
            let targetRx = 0, targetRy = 0;
            window.addEventListener("mousemove", (e) => { const nx = (e.clientX / window.innerWidth) * 2 - 1, ny = (e.clientY / window.innerHeight) * 2 - 1; targetRy = nx * 0.28; targetRx = -ny * 0.20; });
            window.addEventListener("click", () => { addPoints(CFG.addOnClick); rebuildLines(); });
            addPoints(CFG.startPoints); rebuildLines();
            let lastRebuild = performance.now();
            function animate() {
                requestAnimationFrame(animate);
                updatePoints();
                if (performance.now() - lastRebuild > CFG.rebuildEveryMs) { rebuildLines(); lastRebuild = performance.now(); }
                scene.rotation.y += (targetRy - scene.rotation.y) * 0.05; scene.rotation.x += (targetRx - scene.rotation.x) * 0.05;
                renderer.render(scene, camera);
            }
            animate();
            window.addEventListener("resize", () => { camera.aspect = window.innerWidth / window.innerHeight; camera.updateProjectionMatrix(); renderer.setSize(window.innerWidth, window.innerHeight); });
        })();

        // ===== ORIGINAL SCRIPTS (code bg, mobile, etc) =====
        const codeBg = document.getElementById('code-bg');
        const codeSnippets = [ "function solveChallenge() {", "  const solution = findOptimalPath();", "  return solution;", "}", "class Adventurer {", "  constructor(name, skill) {", "    this.name = name;", "    this.skill = skill;", "  }", "}", "const algorithm = (input) => {", "  let result = 0;", "  for(let i = 0; i < input.length; i++) {", "    result += input[i] * i;", "  }", "  return result;", "};", "#include <iostream>", "using namespace std;", "int main() {", "  cout << 'Hello, Safari!';", "  return 0;", "}", "def calculate_score(solutions):", "    total = sum(solutions)", "    return total * 1.5", "<!-- HTML Structure -->", "<div class='challenge'>", "  <h2>Problem Solving</h2>", "  <p>Find the optimal solution</p>", "</div>", "// React Component", "const Leaderboard = ({players}) => {", "  return (", "    <div>", "      {players.map(player => (", "        <Player key={player.id} data={player} />", "      ))}", "    </div>", "  );", "};" ];
        for (let i = 0; i < 40; i++) {
            const line = document.createElement('div'); line.className = 'code-line';
            line.textContent = codeSnippets[Math.floor(Math.random() * codeSnippets.length)];
            line.style.top = `${Math.random()*100}%`; line.style.left = `${Math.random()*100}%`;
            line.style.transform = `translateX(${Math.random()*50-25}%)`; line.style.opacity = `${0.3+Math.random()*0.5}`;
            codeBg.appendChild(line);
        }
        function animateCodeLines() {
            const lines = document.querySelectorAll('.code-line');
            lines.forEach(line => { const speed = 0.2+Math.random()*0.3; const currentLeft = parseFloat(line.style.left); line.style.left = `${(currentLeft+speed)%105}%`; });
            requestAnimationFrame(animateCodeLines);
        }
        animateCodeLines();

        // Mobile menu
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('nav');
        const authButtons = document.querySelector('.auth-buttons');
        mobileMenuBtn.addEventListener('click', () => {
            nav.style.display = nav.style.display === 'block' ? 'none' : 'block';
            authButtons.style.display = authButtons.style.display === 'flex' ? 'none' : 'flex';
            if (nav.style.display === 'block') {
                nav.style.position = 'absolute'; nav.style.top = '100%'; nav.style.left = '0'; nav.style.width = '100%';
                nav.style.backgroundColor = 'rgba(10,10,15,0.95)'; nav.style.padding = '30px 20px'; nav.style.backdropFilter = 'blur(10px)';
                nav.style.borderTop = '1px solid rgba(255,255,255,0.05)'; nav.style.borderBottom = '1px solid rgba(255,255,255,0.05)';
                nav.querySelector('ul').style.flexDirection = 'column'; nav.querySelector('ul').style.gap = '25px'; nav.querySelector('ul').style.textAlign = 'center';
                authButtons.style.position = 'absolute'; authButtons.style.top = 'calc(100% + 200px)'; authButtons.style.left = '0';
                authButtons.style.width = '100%'; authButtons.style.justifyContent = 'center'; authButtons.style.padding = '30px 20px';
                authButtons.style.backgroundColor = 'rgba(10,10,15,0.95)'; authButtons.style.backdropFilter = 'blur(10px)';
                authButtons.style.borderTop = '1px solid rgba(255,255,255,0.05)';
            } else { nav.style = ''; authButtons.style = ''; }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault(); const targetId = this.getAttribute('href'); if(targetId==='#') return;
                const targetElement = document.querySelector(targetId); if(targetElement) window.scrollTo({ top: targetElement.offsetTop - 100, behavior: 'smooth' });
                if(window.innerWidth <= 768) { nav.style.display = 'none'; authButtons.style.display = 'none'; }
            });
        });

        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if(window.scrollY > 50) { header.style.backgroundColor = 'rgba(5,5,7,0.95)'; header.style.backdropFilter = 'blur(15px)'; }
            else { header.style.backgroundColor = 'rgba(10,10,15,0.85)'; header.style.backdropFilter = 'blur(10px)'; }
            // Back to top visibility
            const backBtn = document.getElementById('backToTop');
            if(window.scrollY > 300) backBtn.classList.add('show'); else backBtn.classList.remove('show');
        });

        // Back to top click
        document.getElementById('backToTop').addEventListener('click', () => { window.scrollTo({ top: 0, behavior: 'smooth' }); });

    var text = "Join the ultimate hackathon experience for students. Test your programming skills, solve challenging problems, and win incredible prizes in this exciting coding journey.";


let i = 0;
const write = document.getElementById("write");

function type(){
    if(i < text.length){
        write.innerHTML += text.charAt(i);
        i++;
        setTimeout(type,40);
    }else{
        write.classList.add("done");
    }
}
type();

function toggleFab(){
    let container = document.querySelector(".fab-container");
    let icon = document.getElementById("fabIcon");

    container.classList.toggle("active");
    if(container.classList.contains("active")){
        icon.classList.remove("fa-comment-dots");
        icon.classList.add("fa-angle-up"); 
    }else{
        icon.classList.remove("fa-angle-up");
        icon.classList.add("fa-comment-dots"); 
    }
}