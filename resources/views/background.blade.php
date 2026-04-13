<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>CODINGSAFARI • Tech Galaxy</title>
  <style>
    html, body { margin:0; height:100%; overflow:hidden; }
    body{
      /* better color combo */
      background:
        radial-gradient(1200px 800px at 30% 20%, rgba(90,220,255,.18), transparent 55%),
        radial-gradient(900px 700px at 70% 60%, rgba(217,107,255,.14), transparent 55%),
        linear-gradient(180deg, #050711, #05060c 55%, #070b15);
    }
    canvas{ display:block; }

    .hud{
      position:fixed; left:12px; top:12px;
      font: 14px/1.35 serif;
      color:#fff; background:rgba(0,0,0,.45);
      padding:10px 12px; border-radius:12px;
      backdrop-filter: blur(8px);
      user-select:none; z-index: 5;
      border: 1px solid rgba(255,255,255,.08);
    }
    .hud kbd{
      font-family: serif;
      background: rgba(255,255,255,.10);
      border: 1px solid rgba(255,255,255,.12);
      padding:2px 6px; border-radius:8px;
    }

    /* Animated Logo overlay (vector, no image needed) */
    .logo-wrap{
      position: fixed;
      inset: 0;
      display: grid;
      place-items: center;
      pointer-events: none;
      z-index: 4;
    }
    .logo-card{
      width: min(380px, 78vw);
      aspect-ratio: 1 / 1;
      border-radius: 26px;
      background: rgba(0,0,0,.15);
      border: 1px solid rgba(255,255,255,.08);
      backdrop-filter: blur(10px);
      box-shadow:
        0 24px 60px rgba(0,0,0,.55),
        0 0 40px rgba(90,220,255,.12);
      display: grid;
      place-items: center;
      transform: translateY(-8px);
      animation: floaty 3.2s ease-in-out infinite;
    }
    @keyframes floaty{
      0%,100% { transform: translateY(-10px); }
      50%     { transform: translateY(-2px); }
    }
    .brand{
      margin-top: 10px;
      font: 700 18px/1.1 serif;
      letter-spacing: 1px;
      color: rgba(255,255,255,.92);
      text-shadow: 0 10px 30px rgba(0,0,0,.6);
    }
    .sub{
      font: 12px/1.1 serif;
      color: rgba(255,255,255,.65);
      margin-top: 6px;
    }

    /* SVG glow animation */
    .glow{
      filter:
        drop-shadow(0 0 18px rgba(90,220,255,.35))
        drop-shadow(0 0 22px rgba(217,107,255,.18));
    }
    .spin{
      transform-origin: 50% 50%;
      animation: spin 9s linear infinite;
    }
    @keyframes spin{
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }
    .stroke-draw{
      stroke-dasharray: 900;
      stroke-dashoffset: 900;
      animation: draw 2.4s ease forwards;
    }
    @keyframes draw{
      to { stroke-dashoffset: 0; }
    }

    .tagline{
      position: fixed;
      bottom: 14px; left: 50%;
      transform: translateX(-50%);
      color: rgba(255,255,255,.78);
      font: 13px/1.2 serif;
      letter-spacing: .2px;
      padding: 7px 12px;
      border-radius: 999px;
      background: rgba(0,0,0,.30);
      backdrop-filter: blur(8px);
      z-index: 5;
      user-select:none;
      border: 1px solid rgba(255,255,255,.07);
    }
  </style>

  <script type="importmap">
    {
      "imports": {
        "three": "https://unpkg.com/three@0.182.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@0.182.0/examples/jsm/"
      }
    }
  </script>
</head>

<body>

  <!-- ✅ Animated CODINGSAFARI logo (vector-ish style) -->
  <div class="logo-wrap" id="logoWrap">
    <div class="logo-card">
      <svg class="glow" width="240" height="240" viewBox="0 0 240 240" aria-label="CODINGSAFARI Logo">
        <!-- outer soft ring -->
        <defs>
          <linearGradient id="g1" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#5adcff"/>
            <stop offset="0.55" stop-color="#27e0ff"/>
            <stop offset="1" stop-color="#d96bff"/>
          </linearGradient>
          <radialGradient id="g2" cx="35%" cy="30%" r="70%">
            <stop offset="0" stop-color="#8ff1ff" stop-opacity="0.95"/>
            <stop offset="0.65" stop-color="#27e0ff" stop-opacity="0.55"/>
            <stop offset="1" stop-color="#0b1024" stop-opacity="0"/>
          </radialGradient>
        </defs>

        <circle cx="120" cy="120" r="92" fill="url(#g2)" opacity="0.9"/>
        <circle class="spin" cx="120" cy="120" r="96" fill="none" stroke="rgba(90,220,255,.18)" stroke-width="10"/>

        <!-- stylized "C" -->
        <path class="stroke-draw" d="
          M 156 74
          C 139 57, 108 56, 90 72
          C 73 88, 73 152, 90 168
          C 108 184, 140 183, 156 166"
          fill="none" stroke="url(#g1)" stroke-width="18" stroke-linecap="round"/>

        <!-- inner cut (gives modern C shape) -->
        <path d="
          M 150 102
          C 138 92, 114 92, 103 103
          C 92 114, 92 126, 103 137
          C 114 148, 138 148, 150 138"
          fill="none" stroke="#050711" stroke-width="18" stroke-linecap="round" opacity="0.9"/>

        <!-- small "snake head" vibe -->
        <path d="M 162 86 L 183 74 L 176 96 Z" fill="url(#g1)" opacity="0.95"/>
        <circle cx="182" cy="110" r="6" fill="#27e0ff" opacity="0.9"/>
      </svg>

      <div class="brand">CODINGSAFARI</div>
    </div>
  </div>


  <script type="module">
    import * as THREE from "three";
    import { OrbitControls } from "three/addons/controls/OrbitControls.js";

    // ---------- Scene ----------
    const scene = new THREE.Scene();
    scene.fog = new THREE.Fog(0x050711, 14, 80);

    const camera = new THREE.PerspectiveCamera(60, innerWidth/innerHeight, 0.1, 300);
    camera.position.set(0, 3.6, 13);

    const renderer = new THREE.WebGLRenderer({ antialias:true, alpha:true });
    renderer.setSize(innerWidth, innerHeight);
    renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.08;
    document.body.appendChild(renderer.domElement);

    const controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.target.set(0, 1.6, 0);

    // ---------- Lights (simple, no bloom) ----------
    scene.add(new THREE.AmbientLight(0xffffff, 0.38));

    const key = new THREE.DirectionalLight(0xffffff, 1.0);
    key.position.set(9, 12, 8);
    scene.add(key);

    const rim = new THREE.PointLight(0x5adcff, 1.2, 90);
    rim.position.set(-12, 8, -12);
    scene.add(rim);

    const mag = new THREE.PointLight(0xd96bff, 0.9, 90);
    mag.position.set(12, 6, -10);
    scene.add(mag);

    // ---------- Ground (subtle) ----------
    const ground = new THREE.Mesh(
      new THREE.CircleGeometry(26, 90),
      new THREE.MeshStandardMaterial({ color:0x060a18, roughness:1 })
    );
    ground.rotation.x = -Math.PI/2;
    ground.position.y = 0;
    scene.add(ground);

    // ---------- Tech Galaxy Particles ----------
    const galaxy = new THREE.Group();
    scene.add(galaxy);

    const COUNT = 14000;
    const pos = new Float32Array(COUNT * 3);
    const col = new Float32Array(COUNT * 3);

    const arms = 5;
    const radiusMax = 62;

    const cCyan = new THREE.Color(0x5adcff);
    const cBlue = new THREE.Color(0x27e0ff);
    const cVio  = new THREE.Color(0xd96bff);

    function pickColor(t){
      // 0..1 gradient: cyan -> blue -> violet
      const a = cCyan.clone().lerp(cBlue, Math.min(1, t*1.2));
      return a.lerp(cVio, Math.max(0, (t-0.35)*1.1));
    }

    for (let i=0; i<COUNT; i++){
      const r = Math.pow(Math.random(), 0.55) * radiusMax;
      const arm = i % arms;
      const baseAngle = (arm / arms) * Math.PI * 2;
      const spin = r * 0.20;

      const angle = baseAngle + spin + THREE.MathUtils.randFloatSpread(0.65);
      const y = THREE.MathUtils.randFloatSpread(11) * (0.22 + r / radiusMax);

      const x = Math.cos(angle) * r + THREE.MathUtils.randFloatSpread(0.9);
      const z = Math.sin(angle) * r + THREE.MathUtils.randFloatSpread(0.9);

      pos[i*3+0] = x;
      pos[i*3+1] = y + 4.2;
      pos[i*3+2] = z;

      const t = r / radiusMax;
      const cc = pickColor(t);

      col[i*3+0] = cc.r;
      col[i*3+1] = cc.g;
      col[i*3+2] = cc.b;
    }

    const galaxyGeo = new THREE.BufferGeometry();
    galaxyGeo.setAttribute("position", new THREE.BufferAttribute(pos, 3));
    galaxyGeo.setAttribute("color", new THREE.BufferAttribute(col, 3));

    const galaxyMat = new THREE.PointsMaterial({
      size: 0.055,
      vertexColors: true,
      transparent: true,
      opacity: 0.95,
      depthWrite: false
    });

    const galaxyPts = new THREE.Points(galaxyGeo, galaxyMat);
    galaxy.add(galaxyPts);

    // ---------- Holo Core (clean, premium) ----------
    const core = new THREE.Group();
    core.position.y = 1.75;
    scene.add(core);

    const holoUniforms = { uTime:{value:0}, uPulse:{value:0} };

    const holoMat = new THREE.ShaderMaterial({
      transparent: true,
      blending: THREE.AdditiveBlending,
      depthWrite: false,
      uniforms: holoUniforms,
      vertexShader: `
        varying vec3 vN;
        varying vec3 vW;
        void main(){
          vN = normalize(normalMatrix * normal);
          vec4 wPos = modelMatrix * vec4(position, 1.0);
          vW = wPos.xyz;
          gl_Position = projectionMatrix * viewMatrix * wPos;
        }
      `,
      fragmentShader: `
        precision highp float;
        varying vec3 vN;
        varying vec3 vW;
        uniform float uTime;
        uniform float uPulse;

        float hash(vec2 p){
          return fract(sin(dot(p, vec2(127.1, 311.7))) * 43758.5453);
        }

        void main(){
          vec3 viewDir = normalize(cameraPosition - vW);
          float fres = pow(1.0 - max(dot(viewDir, vN), 0.0), 3.2);

          float scan = 0.45 + 0.55 * sin(vW.y*22.0 - uTime*7.2);
          float n = hash(vW.xz*4.0 + uTime*0.2);

          float dist = length(vW);
          float ring = exp(-18.0 * abs(dist - (1.55 + uPulse*0.35)));

          vec3 c1 = vec3(0.16, 0.88, 1.0);  // cyan
          vec3 c2 = vec3(0.86, 0.42, 1.0);  // violet
          vec3 col = mix(c1, c2, 0.5 + 0.5*sin(uTime*0.55));

          float alpha = (0.14 + 0.68*fres) * (0.35 + 0.65*scan) * (0.86 + 0.14*n);
          alpha += ring * 0.65;

          gl_FragColor = vec4(col * (0.35 + 1.45*fres + ring), alpha);
        }
      `
    });

    const sphere = new THREE.Mesh(new THREE.SphereGeometry(1.55, 96, 96), holoMat);
    core.add(sphere);

    const ring1 = new THREE.Mesh(
      new THREE.TorusGeometry(2.28, 0.05, 24, 150),
      new THREE.MeshStandardMaterial({
        color: 0x0b1430, metalness: 0.92, roughness: 0.22,
        emissive: 0x27e0ff, emissiveIntensity: 0.12
      })
    );
    ring1.rotation.x = Math.PI/2;
    core.add(ring1);

    const ring2 = new THREE.Mesh(
      new THREE.TorusGeometry(1.95, 0.03, 18, 150),
      new THREE.MeshStandardMaterial({
        color: 0x091024, metalness: 0.95, roughness: 0.25,
        emissive: 0xd96bff, emissiveIntensity: 0.10
      })
    );
    ring2.rotation.x = Math.PI/2;
    ring2.rotation.y = Math.PI/6;
    core.add(ring2);

    // ---------- Small nodes only (no lines) ----------
    const nodeCount = 520;
    const nodeGeo = new THREE.BufferGeometry();
    const nodePos = new Float32Array(nodeCount*3);

    function randOnSphere(r){
      const u = Math.random()*2-1;
      const a = Math.random()*Math.PI*2;
      const t = Math.sqrt(1-u*u);
      return new THREE.Vector3(t*Math.cos(a), u, t*Math.sin(a)).multiplyScalar(r);
    }

    for (let i=0;i<nodeCount;i++){
      const v = randOnSphere(1.7 + Math.random()*0.9);
      nodePos[i*3+0]=v.x;
      nodePos[i*3+1]=v.y;
      nodePos[i*3+2]=v.z;
    }
    nodeGeo.setAttribute("position", new THREE.BufferAttribute(nodePos, 3));

    const nodes = new THREE.Points(
      nodeGeo,
      new THREE.PointsMaterial({ size:0.04, color:0x8ff1ff, transparent:true, opacity:0.92, depthWrite:false })
    );
    core.add(nodes);

    // ---------- Interaction ----------
    let pulse = 0;
    let mouseX = 0, mouseY = 0;

    addEventListener("pointermove", (e) => {
      mouseX = (e.clientX / innerWidth) * 2 - 1;
      mouseY = (e.clientY / innerHeight) * 2 - 1;
    });

    renderer.domElement.addEventListener("pointerdown", () => {
      pulse = 1.0;

      // burst: push some galaxy particles slightly outward
      const p = galaxyGeo.attributes.position.array;
      for (let i=0; i<900; i++){
        const idx = (Math.floor(Math.random()*COUNT))*3;
        p[idx+0] *= 1.01;
        p[idx+2] *= 1.01;
      }
      galaxyGeo.attributes.position.needsUpdate = true;
    });

    // keys
    const logoWrap = document.getElementById("logoWrap");
    let logoOn = true;
    addEventListener("keydown", (e) => {
      const k = e.key.toLowerCase();
      if (k === "r") pulse = 0;
      if (k === "l") { logoOn = !logoOn; logoWrap.style.display = logoOn ? "grid" : "none"; }
    });

    // ---------- Resize ----------
    addEventListener("resize", () => {
      camera.aspect = innerWidth/innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(innerWidth, innerHeight);
    });

    // ---------- Animate ----------
    const clock = new THREE.Clock();
    function animate(){
      requestAnimationFrame(animate);
      const t = clock.getElapsedTime();

      pulse = Math.max(0, pulse - 0.02);
      holoUniforms.uTime.value = t;
      holoUniforms.uPulse.value = pulse;

      // smooth galaxy motion + parallax
      galaxy.rotation.y = t * 0.05;
      galaxy.rotation.x = Math.sin(t*0.12) * 0.03;
      galaxy.position.x = mouseX * 0.25;
      galaxy.position.z = mouseY * 0.25;

      // core motion
      core.rotation.y = t * 0.23;
      ring1.rotation.z = t * 0.35;
      ring2.rotation.z = -t * 0.45;
      sphere.scale.setScalar(1.0 + 0.012*Math.sin(t*1.2));

      controls.update();
      renderer.render(scene, camera);
    }
    animate();
  </script>
</body>
</html>
