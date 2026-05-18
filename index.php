<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TikTok Downloader Pro</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }

body {
    background: #050505;
    color: #fff;
    min-height: 100vh;
    overflow-x: hidden;
}

/* Animated Background */
.bg {
    position: fixed; inset: 0; z-index: -1;
    background: radial-gradient(ellipse at 20% 20%, #ff005020, transparent 50%),
                radial-gradient(ellipse at 80% 80%, #00f2ea20, transparent 50%),
                radial-gradient(ellipse at 50% 50%, #7000ff15, transparent 60%);
    animation: bgPulse 8s ease-in-out infinite;
}

.bg::before {
    content: ''; position: absolute; inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.5;
}

@keyframes bgPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* Floating Orbs */
.orb {
    position: fixed; border-radius: 50%; filter: blur(80px); z-index: -1;
    animation: float 15s ease-in-out infinite;
}
.orb1 { width: 400px; height: 400px; background: #ff0050; top: -100px; left: -100px; animation-delay: 0s; opacity: 0.15; }
.orb2 { width: 300px; height: 300px; background: #00f2ea; bottom: -50px; right: -50px; animation-delay: -5s; opacity: 0.12; }
.orb3 { width: 250px; height: 250px; background: #7000ff; top: 40%; left: 60%; animation-delay: -10s; opacity: 0.08; }

@keyframes float {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(30px, -30px) scale(1.1); }
    50% { transform: translate(-20px, 20px) scale(0.95); }
    75% { transform: translate(20px, 30px) scale(1.05); }
}

/* Glassmorphism Card */
.glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.05);
}

.container {
    width: 100%; max-width: 950px;
    margin: 40px auto; padding: 45px;
    border-radius: 32px;
    position: relative;
    overflow: hidden;
}

.container::before {
    content: ''; position: absolute; inset: 0;
    border-radius: 32px; padding: 1.5px;
    background: linear-gradient(135deg, rgba(255,0,80,0.3), rgba(0,242,234,0.3), rgba(112,0,255,0.2));
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    pointer-events: none;
}

/* Header */
.header { text-align: center; margin-bottom: 40px; position: relative; }

.badge {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 8px 20px; border-radius: 50px;
    background: rgba(255, 0, 80, 0.1); border: 1px solid rgba(255, 0, 80, 0.2);
    font-size: 12px; font-weight: 600; color: #ff0050; text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 20px; animation: fadeInDown 0.6s ease;
}

.badge-dot {
    width: 8px; height: 8px; border-radius: 50%; background: #ff0050;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.8); }
}

h1 {
    font-size: 48px; font-weight: 800; line-height: 1.1;
    background: linear-gradient(135deg, #ff0050, #ff4d8a, #00f2ea, #00c4b8);
    background-size: 300% 300%;
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    animation: gradientShift 5s ease infinite;
    margin-bottom: 12px;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.desc {
    color: #888; font-size: 16px; font-weight: 400;
    max-width: 500px; margin: 0 auto;
    animation: fadeInUp 0.6s ease 0.1s both;
}

/* Input Section */
.input-section {
    position: relative; margin-bottom: 30px;
    animation: fadeInUp 0.6s ease 0.2s both;
}

.input-wrapper {
    display: flex; gap: 12px; align-items: stretch;
    background: rgba(20, 20, 20, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px; padding: 8px; padding-left: 20px;
    transition: all 0.3s ease;
}

.input-wrapper:focus-within {
    border-color: rgba(255, 0, 80, 0.5);
    box-shadow: 0 0 0 4px rgba(255, 0, 80, 0.1), 0 0 30px rgba(255, 0, 80, 0.1);
    transform: translateY(-2px);
}

.input-icon {
    display: flex; align-items: center; color: #555;
    transition: color 0.3s ease;
}

.input-wrapper:focus-within .input-icon { color: #ff0050; }

input {
    flex: 1; background: transparent; border: none;
    color: #fff; font-size: 15px; font-weight: 500;
    outline: none; padding: 14px 0;
}

input::placeholder { color: #555; font-weight: 400; }

.download-btn {
    display: flex; align-items: center; gap: 10px;
    padding: 14px 28px; border: none; border-radius: 14px;
    background: linear-gradient(135deg, #ff0050, #ff3377);
    color: #fff; font-weight: 700; font-size: 15px;
    cursor: pointer; position: relative; overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(255, 0, 80, 0.3);
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(255, 0, 80, 0.4);
}

.download-btn:active { transform: translateY(0); }

.download-btn::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, transparent, rgba(255,255,255,0.2), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.download-btn:hover::before { transform: translateX(100%); }

.download-btn svg { width: 18px; height: 18px; }

/* Features Grid */
.features {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;
    margin-bottom: 30px; animation: fadeInUp 0.6s ease 0.3s both;
}

.feature-card {
    padding: 20px; border-radius: 20px;
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.05);
    text-align: center; transition: all 0.3s ease;
    cursor: default;
}

.feature-card:hover {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.1);
    transform: translateY(-4px);
}

.feature-icon {
    width: 44px; height: 44px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 12px; font-size: 20px;
    background: rgba(255, 0, 80, 0.1);
}

.feature-card:nth-child(2) .feature-icon { background: rgba(0, 242, 234, 0.1); }
.feature-card:nth-child(3) .feature-icon { background: rgba(112, 0, 255, 0.1); }

.feature-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; color: #ddd; }
.feature-card p { font-size: 12px; color: #666; font-weight: 500; }

/* Loading */
.loading-container {
    display: none; text-align: center; padding: 40px;
    animation: fadeIn 0.3s ease;
}

.loading-container.active { display: block; }

.spinner {
    width: 60px; height: 60px; margin: 0 auto 20px;
    position: relative;
}

.spinner-ring {
    position: absolute; inset: 0;
    border: 3px solid transparent;
    border-top-color: #ff0050;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.spinner-ring:nth-child(2) {
    inset: 8px; border-top-color: #00f2ea;
    animation-duration: 1.5s; animation-direction: reverse;
}

.spinner-ring:nth-child(3) {
    inset: 16px; border-top-color: #7000ff;
    animation-duration: 2s;
}

@keyframes spin { to { transform: rotate(360deg); } }

.loading-text {
    font-size: 16px; font-weight: 600; color: #aaa;
    animation: textPulse 1.5s ease-in-out infinite;
}

@keyframes textPulse {
    0%, 100% { opacity: 0.6; }
    50% { opacity: 1; }
}

.loading-subtext {
    font-size: 13px; color: #555; margin-top: 8px;
}

/* Result Card */
.result {
    display: none; animation: fadeInUp 0.6s ease;
}

.result.active { display: block; }

.result-card {
    border-radius: 28px; overflow: hidden;
    background: rgba(20, 20, 20, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.08);
}

.video-preview {
    position: relative; width: 100%; height: 400px; overflow: hidden;
}

.video-preview img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.6s ease;
}

.result-card:hover .video-preview img { transform: scale(1.05); }

.video-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 50%);
    display: flex; align-items: flex-end; padding: 24px;
}

.video-badge {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 14px; border-radius: 50px;
    background: rgba(255, 0, 80, 0.9); backdrop-filter: blur(10px);
    font-size: 12px; font-weight: 700;
}

.video-duration {
    margin-left: auto;
    padding: 6px 12px; border-radius: 8px;
    background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(10px);
    font-size: 12px; font-weight: 600; color: #fff;
}

.content-area { padding: 28px; }

.author-row {
    display: flex; align-items: center; gap: 14px; margin-bottom: 20px;
}

.author-avatar {
    width: 48px; height: 48px; border-radius: 50%;
    background: linear-gradient(135deg, #ff0050, #00f2ea);
    padding: 2px;
}

.author-avatar img {
    width: 100%; height: 100%; border-radius: 50%;
    object-fit: cover; border: 2px solid #111;
}

.author-info { flex: 1; }

.author-name {
    font-size: 16px; font-weight: 700; color: #fff;
    display: flex; align-items: center; gap: 6px;
}

.verified-badge {
    width: 16px; height: 16px; background: #00f2ea;
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    font-size: 10px; color: #000; font-weight: 800;
}

.author-handle { font-size: 13px; color: #666; font-weight: 500; }

.video-title {
    font-size: 20px; font-weight: 700; line-height: 1.4;
    color: #fff; margin-bottom: 24px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Stats */
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 28px;
}

.stat-box {
    padding: 18px 12px; border-radius: 18px;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.05);
    text-align: center; transition: all 0.3s ease;
    position: relative; overflow: hidden;
}

.stat-box::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, #ff0050, #00f2ea);
    opacity: 0; transition: opacity 0.3s ease;
}

.stat-box:hover::before { opacity: 1; }
.stat-box:hover { transform: translateY(-3px); background: rgba(255, 255, 255, 0.05); }

.stat-icon { font-size: 20px; margin-bottom: 8px; }
.stat-value {
    font-size: 20px; font-weight: 800; color: #fff;
    background: linear-gradient(135deg, #fff, #aaa);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}
.stat-label { font-size: 11px; color: #666; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 4px; }

/* Action Buttons */
.action-buttons {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;
}

.action-btn {
    display: flex; flex-direction: column; align-items: center; gap: 8px;
    padding: 20px 16px; border-radius: 20px;
    text-decoration: none; color: #fff;
    font-weight: 700; font-size: 14px;
    transition: all 0.3s ease; position: relative; overflow: hidden;
    border: 1px solid transparent;
}

.action-btn::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, transparent, rgba(255,255,255,0.1), transparent);
    transform: translateX(-100%); transition: transform 0.6s ease;
}

.action-btn:hover::before { transform: translateX(100%); }

.action-btn:hover { transform: translateY(-4px); }

.btn-nowm {
    background: linear-gradient(135deg, #ff0050, #ff3377);
    box-shadow: 0 4px 20px rgba(255, 0, 80, 0.25);
}
.btn-nowm:hover { box-shadow: 0 8px 30px rgba(255, 0, 80, 0.4); }

.btn-wm {
    background: linear-gradient(135deg, #2a2a2a, #1a1a1a);
    border-color: rgba(255, 255, 255, 0.1);
}
.btn-wm:hover { border-color: rgba(255, 255, 255, 0.2); background: linear-gradient(135deg, #333, #222); }

.btn-music {
    background: linear-gradient(135deg, #00f2ea, #00c4b8);
    color: #000 !important;
    box-shadow: 0 4px 20px rgba(0, 242, 234, 0.2);
}
.btn-music:hover { box-shadow: 0 8px 30px rgba(0, 242, 234, 0.3); }

.btn-icon {
    width: 36px; height: 36px; border-radius: 12px;
    background: rgba(255, 255, 255, 0.15);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
}

/* Toast Notification */
.toast {
    position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%) translateY(100px);
    padding: 16px 28px; border-radius: 16px;
    background: rgba(20, 20, 20, 0.95); backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: flex; align-items: center; gap: 12px;
    font-weight: 600; font-size: 14px; color: #fff;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    z-index: 1000;
}

.toast.show { transform: translateX(-50%) translateY(0); }

.toast-icon { width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; }
.toast-success .toast-icon { background: rgba(0, 242, 234, 0.2); color: #00f2ea; }
.toast-error .toast-icon { background: rgba(255, 0, 80, 0.2); color: #ff0050; }

/* Animations */
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
@keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }

/* Responsive */
@media (max-width: 768px) {
    .container { margin: 20px; padding: 24px; border-radius: 24px; }
    h1 { font-size: 32px; }
    .input-wrapper { flex-direction: column; padding: 12px; }
    .download-btn { width: 100%; justify-content: center; }
    .features { grid-template-columns: 1fr; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .action-buttons { grid-template-columns: 1fr; }
    .video-preview { height: 280px; }
    .content-area { padding: 20px; }
}

@media (max-width: 480px) {
    h1 { font-size: 26px; }
    .desc { font-size: 14px; }
    .stats-grid { grid-template-columns: 1fr 1fr; gap: 8px; }
    .stat-box { padding: 14px 8px; }
    .stat-value { font-size: 16px; }
}

/* Scrollbar */
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-track { background: #0a0a0a; }
::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: #444; }

/* Particle Canvas */
#particles { position: fixed; inset: 0; z-index: -1; pointer-events: none; }
</style>
</head>
<body>

<canvas id="particles"></canvas>
<div class="bg"></div>
<div class="orb orb1"></div>
<div class="orb orb2"></div>
<div class="orb orb3"></div>

<div class="container glass">

    <div class="header">
        <div class="badge">
            <span class="badge-dot"></span>
            TikTok Downloader Pro
        </div>
        <h1>Download Video TikTok</h1>
        <p class="desc">Tanpa watermark, kualitas HD, dan ekstrak audio dengan satu klik. Cepat, gratis, dan aman.</p>
    </div>

    <div class="input-section">
        <div class="input-wrapper">
            <div class="input-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            </div>
            <input type="text" id="url" placeholder="Tempel link TikTok di sini..." autocomplete="off">
            <button class="download-btn" onclick="downloadVideo()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Download
            </button>
        </div>
    </div>

    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">🚫</div>
            <h4>Tanpa Watermark</h4>
            <p>Video bersih tanpa tanda air</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h4>Proses Cepat</h4>
            <p>Download dalam hitungan detik</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🎵</div>
            <h4>Ekstrak Audio</h4>
            <p>Ambil musik dari video TikTok</p>
        </div>
    </div>

    <div class="loading-container" id="loading">
        <div class="spinner">
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
        </div>
        <div class="loading-text">Memproses video...</div>
        <div class="loading-subtext">Sedang mengambil data dari TikTok</div>
    </div>

    <div class="result" id="result">
        <div class="result-card">
            <div class="video-preview">
                <img id="cover" src="" alt="Video Cover">
                <div class="video-overlay">
                    <span class="video-badge">📹 HD Video</span>
                    <span class="video-duration" id="duration">00:00</span>
                </div>
            </div>
            <div class="content-area">
                <div class="author-row">
                    <div class="author-avatar">
                        <img id="authorAvatar" src="" alt="Author">
                    </div>
                    <div class="author-info">
                        <div class="author-name">
                            <span id="authorName">Author</span>
                            <span class="verified-badge">✓</span>
                        </div>
                        <div class="author-handle" id="authorHandle">@author</div>
                    </div>
                </div>
                <div class="video-title" id="title">Video Title</div>
                <div class="stats-grid">
                    <div class="stat-box">
                        <div class="stat-icon">❤️</div>
                        <div class="stat-value" id="likes">0</div>
                        <div class="stat-label">Likes</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-icon">💬</div>
                        <div class="stat-value" id="comments">0</div>
                        <div class="stat-label">Komentar</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-icon">🔄</div>
                        <div class="stat-value" id="shares">0</div>
                        <div class="stat-label">Shares</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-icon">⬇️</div>
                        <div class="stat-value" id="downloads">0</div>
                        <div class="stat-label">Downloads</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <a id="video" class="action-btn btn-nowm" target="_blank">
                        <div class="btn-icon">🎬</div>
                        <span>No Watermark</span>
                        <small style="font-size:11px;opacity:0.7;font-weight:500;">HD Quality</small>
                    </a>
                    <a id="wmvideo" class="action-btn btn-wm" target="_blank">
                        <div class="btn-icon">💧</div>
                        <span>With Watermark</span>
                        <small style="font-size:11px;opacity:0.7;font-weight:500;">Original</small>
                    </a>
                    <a id="music" class="action-btn btn-music" target="_blank">
                        <div class="btn-icon">🎵</div>
                        <span>Audio Only</span>
                        <small style="font-size:11px;opacity:0.7;font-weight:500;">MP3 Format</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="toast" id="toast">
    <span class="toast-icon">!</span>
    <span class="toast-message">Message</span>
</div>

<script>
// Particle System
const canvas = document.getElementById('particles');
const ctx = canvas.getContext('2d');
let particles = [];

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

class Particle {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 2 + 0.5;
        this.speedX = (Math.random() - 0.5) * 0.3;
        this.speedY = (Math.random() - 0.5) * 0.3;
        this.opacity = Math.random() * 0.5 + 0.1;
    }
    update() {
        this.x += this.speedX;
        this.y += this.speedY;
        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
    }
    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
        ctx.fill();
    }
}

for (let i = 0; i < 60; i++) particles.push(new Particle());

function animateParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(p => { p.update(); p.draw(); });
    requestAnimationFrame(animateParticles);
}
animateParticles();

// Format numbers
function formatNumber(num) {
    if (!num) return '0';
    if (num >= 1000000) return (num / 1000000).toFixed(1) + 'M';
    if (num >= 1000) return (num / 1000).toFixed(1) + 'K';
    return num.toString();
}

// Toast notification
function showToast(message, type = 'error') {
    const toast = document.getElementById('toast');
    const icon = toast.querySelector('.toast-icon');
    toast.querySelector('.toast-message').textContent = message;
    toast.className = 'toast ' + (type === 'success' ? 'toast-success' : 'toast-error');
    icon.textContent = type === 'success' ? '✓' : '✕';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
}

// Enter key support
document.getElementById('url').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') downloadVideo();
});

// Download function
async function downloadVideo() {
    const url = document.getElementById('url').value.trim();

    if (!url) {
        showToast('Masukkan link TikTok terlebih dahulu', 'error');
        return;
    }

    if (!url.includes('tiktok.com')) {
        showToast('Link tidak valid. Pastikan link dari TikTok.', 'error');
        return;
    }

    const loading = document.getElementById('loading');
    pult = document.getElementById('result');

    loading.classList.add('active');
    result.classList.remove('active');

    try {
        const response = await fetch(
    "./api.php?url=" + encodeURIComponent(url)
);
        const res = await response.json();

        if (res.code !== 0) {
            throw new Error(res.msg || 'Gagal mengambil data video');
        }

        const data = res.data;

        // Set cover
        document.getElementById('cover').src = data.cover || '';

        // Set author info
        document.getElementById('authorAvatar').src = data.author_avatar || 'https://via.placeholder.com/100';
        document.getElementById('authorName').textContent = data.author_name || 'TikTok User';
        document.getElementById('authorHandle').textContent = '@' + (data.author_unique_id || 'user');

        // Set title
        document.getElementById('title').textContent = data.title || 'TikTok Video';

        // Set duration
        document.getElementById('duration').textContent = data.duration ? formatDuration(data.duration) : '00:00';

        // Set stats with animation
        animateValue('likes', data.digg_count || 0);
        animateValue('comments', data.comment_count || 0);
        animateValue('shares', data.share_count || 0);
        animateValue('downloads', data.download_count || 0);

        // Set links
        document.getElementById('video').href = data.play || '#';
        document.getElementById('wmvideo').href = data.wmplay || '#';
        document.getElementById('music').href = data.music || '#';

        loading.classList.remove('active');
        result.classList.add('active');

        showToast('Video berhasil ditemukan!', 'success');

    } catch (err) {
        loading.classList.remove('active');
        showToast('Error: ' + err.message, 'error');
    }
}

function formatDuration(seconds) {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
}

function animateValue(id, end) {
    const el = document.getElementById(id);
    const start = 0;
    const duration = 1000;
    const startTime = performance.now();

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easeOut = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(start + (end - start) * easeOut);
        el.textContent = formatNumber(current);
        if (progress < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
}

// Input paste animation
document.getElementById('url').addEventListener('paste', function() {
    this.parentElement.style.transform = 'scale(1.02)';
    setTimeout(() => {
        this.parentElement.style.transform = 'scale(1)';
    }, 200);
});
</script>

</body>
</html>