<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litrack - Device Monitoring</title>
    <style>
        :root {
            --primary-color: #4F46E5;
            --primary-light: #6366F1;
            --secondary-color: #10B981;
            --danger-color: #EF4444;
            --warning-color: #F59E0B;
            --text-color: #374151;
            --light-gray: #F3F4F6;
            --medium-gray: #E5E7EB;
            --dark-gray: #6B7280;
            --white: #FFFFFF;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .logo-icon {
            height: 2rem;
        }

        .litrack-logo {
        height: 4.5rem;
        margin-bottom: 1rem;
    }

        .user-menu {
            position: relative;
        }

        .user-button {
            background: none;
            border: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            font-weight: 500;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }

        .user-button:hover {
            background-color: var(--medium-gray);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background-color: var(--white);
            border-radius: 0.5rem;
            box-shadow: var(--shadow-md);
            padding: 0.5rem 0;
            min-width: 180px;
            z-index: 10;
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            display: block;
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary-color);
        }

        .dashboard-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .pump-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .pump-card {
            background-color: var(--white);
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .pump-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .pump-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--medium-gray);
        }

        .pump-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .pump-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-on {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-off {
            background-color: #FEE2E2;
            color: #B91C1C;
        }

        .sensor-list {
            display: grid;
            gap: 1rem;
        }

        .sensor-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            background-color: var(--light-gray);
            border-radius: 0.5rem;
        }

        .sensor-name {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sensor-icon {
            color: var(--dark-gray);
            width: 1.25rem;
            height: 1.25rem;
        }

        .sensor-value {
            font-weight: 600;
            font-family: 'Courier New', monospace;
        }

        .status-section {
            background-color: var(--white);
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow);
        }

        .status-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: var(--primary-color);
        }

        .status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .status-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .indicator-on {
            background-color: var(--secondary-color);
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
        }

        .indicator-off {
            background-color: var(--danger-color);
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.2);
        }

        .status-label {
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem 1rem;
            }
            
            .pump-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .status-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="#" class="logo">
               <img src="logo.png" alt="Litrack" class="litrack-logo">
            </a>
            
            <div class="user-menu">
                <button class="user-button" onclick="document.querySelector('.dropdown-menu').classList.toggle('show')">
                    <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
        
        <h1 class="dashboard-title">Device Monitoring Dashboard</h1>
        
        

    <script>
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.dropdown-menu');
            const userButton = document.querySelector('.user-button');
            
            if (!userButton.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Simulate real-time data updates
        function updateSensorData() {
            const sensors = document.querySelectorAll('.sensor-value');
            sensors.forEach(sensor => {
                if (sensor.textContent.includes('A')) {
                    // Simulate ampere meter fluctuation between 28-32
                    const value = 28 + Math.floor(Math.random() * 5);
                    sensor.textContent = `${value} A`;
                } else if (sensor.textContent.includes('V')) {
                    // Simulate voltage fluctuation between 28-32
                    const value = 28 + Math.floor(Math.random() * 5);
                    sensor.textContent = `${value} V`;
                } else if (sensor.textContent.includes('pH')) {
                    // Simulate pH fluctuation between 6.8-7.2
                    const value = (6.8 + Math.random() * 0.4).toFixed(1);
                    sensor.textContent = `pH: ${value}`;
                }
            });
            
            setTimeout(updateSensorData, 3000);
        }
        
        // Start data simulation
        updateSensorData();
    </script>
</body>
</html>