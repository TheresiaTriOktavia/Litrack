<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litrack - Device Monitoring</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
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
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--white);
            box-shadow: var(--shadow-md);
            padding: 1.5rem 1rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--medium-gray);
        }

        .sidebar-logo {
            height: 3rem;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.2s;
        }

        .sidebar-item:hover {
            background-color: var(--light-gray);
            color: var(--primary-color);
        }

        .sidebar-item.active {
            background-color: var(--primary-light);
            color: var(--white);
        }

        .sidebar-icon {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
        }

        .pump-controls {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid var(--medium-gray);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
        }

        .btn-block {
            width: 100%;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
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
            position: relative;
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

        .pump-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--dark-gray);
            transition: color 0.2s;
        }

        .action-btn:hover {
            color: var(--primary-color);
        }

        .pump-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            user-select: none;
            transition: all 0.2s ease;
            margin-bottom: 1rem;
        }

        .status-on:hover {
            background-color: #b3f0d9;
        }
        .status-off:hover {
            background-color: #ffc9c9;
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: 0.75rem;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            box-shadow: var(--shadow-md);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark-gray);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--medium-gray);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-secondary {
            background-color: var(--medium-gray);
            color: var(--text-color);
        }

        .btn-secondary:hover {
            background-color: var(--dark-gray);
            color: var(--white);
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .main-content {
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
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="logo.png" alt="Litrack" class="sidebar-logo">
        </div>
        
        <nav class="sidebar-menu">
            <a href="#" class="sidebar-item active">
                <i class="fas fa-tachometer-alt sidebar-icon"></i>
                Dashboard
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-chart-line sidebar-icon"></i>
                Analytics
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-cog sidebar-icon"></i>
                Settings
            </a>
        </nav>
        
        <div class="pump-controls">
            <h3>Pump Management</h3>
            <button class="btn btn-primary btn-block" id="addPumpBtn">
                <i class="fas fa-plus"></i> Add New Pump
            </button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="header">
                <a href="#" class="logo">
                   <img src="logo.png" alt="Litrack" class="litrack-logo">
                </a>
                
                <div class="user-menu">
                    <button class="user-button" onclick="document.querySelector('.dropdown-menu').classList.toggle('show')">
                        <div class="user-avatar">A</div>
                        Admin User
                    </button>
                    <div class="dropdown-menu">
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                          </a>
                        </div>
                </div>
            </div>
            
            <h1 class="dashboard-title">Device Monitoring Dashboard</h1>
            
            <!-- Pump Cards Grid -->
            <div class="pump-grid" id="pumpGrid">
                <!-- Pump cards will be dynamically added here -->
            </div>
            
            <!-- Status Section -->
            <div class="status-section">
                <h2 class="status-title">DEVICE STATUS</h2>
                <div class="status-grid" id="statusGrid">
                    <!-- Status items will be dynamically added here -->
                </div>
            </div>
        </div>
    </main>

    <!-- Add/Edit Pump Modal -->
    <div class="modal" id="pumpModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Add New Pump</h3>
                <button class="close-btn" id="closeModal">&times;</button>
            </div>
            <form id="pumpForm">
                <input type="hidden" id="pumpId">
                <div class="form-group">
                    <label for="pumpName" class="form-label">Pump Name</label>
                    <input type="text" class="form-control" id="pumpName" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Sensors</label>
                    <div id="sensorFields">
                        <div class="sensor-field" style="display: flex; gap: 0.5rem; margin-bottom: 0.5rem;">
                            <select class="form-control sensor-type">
                                <option value="ampere">Ampere Meter</option>
                                <option value="voltage">Volt Meter</option>
                                <option value="ph">pH Meter</option>
                                <option value="level">Level Air</option>
                            </select>
                            <button type="button" class="btn btn-secondary remove-sensor"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addSensor" style="margin-top: 0.5rem;">
                        <i class="fas fa-plus"></i> Add Sensor
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Data Pompa
        let pumps = [
            {
                id: 1,
                name: "Pompa 1",
                status: "on",
                sensors: [
                    { type: "ampere", value: "30 A" },
                    { type: "level", value: "30 V" }
                ]
            },
            // {
            //     id: 2,
            //     name: "Pompa 2",
            //     status: "on",
            //     sensors: [
            //         { type: "ampere", value: "30 A" },
            //         { type: "level", value: "30 V" }
            //     ]
            // },
            // {
            //     id: 3,
            //     name: "Pompa 3",
            //     status: "off",
            //     sensors: [
            //         { type: "ph", value: "pH: 7" },
            //         { type: "voltage", value: "30 V" },
            //         { type: "ampere", value: "30 A" }
            //     ]
            // }
        ];

        // DOM Elements
        const pumpGrid = document.getElementById('pumpGrid');
        const statusGrid = document.getElementById('statusGrid');
        const addPumpBtn = document.getElementById('addPumpBtn');
        const pumpModal = document.getElementById('pumpModal');
        const modalTitle = document.getElementById('modalTitle');
        const pumpForm = document.getElementById('pumpForm');
        const pumpIdInput = document.getElementById('pumpId');
        const pumpNameInput = document.getElementById('pumpName');
        const sensorFields = document.getElementById('sensorFields');
        const addSensorBtn = document.getElementById('addSensor');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');

        // Initialize the dashboard
        function initDashboard() {
            renderPumpCards();
            renderStatusGrid();
            setupEventListeners();
        }

        // Render pump cards
        function renderPumpCards() {
            pumpGrid.innerHTML = '';
            
            pumps.forEach(pump => {
                const pumpCard = document.createElement('div');
                pumpCard.className = 'pump-card';
                pumpCard.dataset.id = pump.id;
                
                let sensorItems = '';
                pump.sensors.forEach(sensor => {
                    let icon = '';
                    switch(sensor.type) {
                        case 'ampere':
                            icon = '<i class="fas fa-bolt sensor-icon"></i>';
                            break;
                        case 'voltage':
                            icon = '<i class="fas fa-plug sensor-icon"></i>';
                            break;
                        case 'ph':
                            icon = '<i class="fas fa-flask sensor-icon"></i>';
                            break;
                        case 'level':
                            icon = '<i class="fas fa-tint sensor-icon"></i>';
                            break;
                    }
                    
                    sensorItems += `
                        <div class="sensor-item">
                            <div class="sensor-name">
                                ${icon}
                                ${getSensorName(sensor.type)}
                            </div>
                            <div class="sensor-value">${pump.status === 'on' ? sensor.value : '0 ' + sensor.value.split(' ')[1]}</div>
                        </div>
                    `;
                });
                
                pumpCard.innerHTML = `
                    <div class="pump-header">
                        <h3 class="pump-title">${pump.name}</h3>
                        <div class="pump-actions">
                            <button class="action-btn edit-pump" data-id="${pump.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn delete-pump" data-id="${pump.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="pump-status ${pump.status === 'on' ? 'status-on' : 'status-off'} toggle-status" data-id="${pump.id}">
                        ${pump.status === 'on' ? 'ON' : 'OFF'}
                    </div>
                    <div class="sensor-list">
                        ${sensorItems}
                    </div>
                `;
                
                pumpGrid.appendChild(pumpCard);
            });
        }

        // Render status grid
        function renderStatusGrid() {
            statusGrid.innerHTML = '';
            
            pumps.forEach(pump => {
                const statusItem = document.createElement('div');
                statusItem.className = 'status-item';
                
                statusItem.innerHTML = `
                    <div class="status-indicator ${pump.status === 'on' ? 'indicator-on' : 'indicator-off'}"></div>
                    <div class="status-label">${pump.name}</div>
                `;
                
                statusGrid.appendChild(statusItem);
            });
        }

        // Setup event listeners
        function setupEventListeners() {
            // Add event listeners to action buttons
            document.querySelectorAll('.edit-pump').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const pumpId = parseInt(e.currentTarget.dataset.id);
                    editPump(pumpId);
                });
            });
            
            document.querySelectorAll('.delete-pump').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const pumpId = parseInt(e.currentTarget.dataset.id);
                    deletePump(pumpId);
                });
            });
            
            // Add event listeners to toggle status buttons
            document.querySelectorAll('.toggle-status').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const pumpId = parseInt(e.currentTarget.dataset.id);
                    togglePumpStatus(pumpId);
                });
            });
        }

        // Toggle pump status
        function togglePumpStatus(id) {
            const pump = pumps.find(p => p.id === id);
            if (!pump) return;
            
            // Toggle status
            pump.status = pump.status === 'on' ? 'off' : 'on';
            
            // Update the dashboard
            initDashboard();
            
            // Show a notification
            showNotification(`Pump ${pump.name} turned ${pump.status.toUpperCase()}`);
        }

        // Show notification
        function showNotification(message) {
            // In a real app, you might want to use a proper notification system
            alert(message);
        }

        // Get sensor name by type
        function getSensorName(type) {
            switch(type) {
                case 'ampere': return 'Ampere Meter';
                case 'voltage': return 'Volt Meter';
                case 'ph': return 'pH Meter';
                case 'level': return 'Level Air';
                default: return type;
            }
        }

        // Add new pump
        function addPump() {
            pumpIdInput.value = '';
            pumpNameInput.value = '';
            sensorFields.innerHTML = `
                <div class="sensor-field" style="display: flex; gap: 0.5rem; margin-bottom: 0.5rem;">
                    <select class="form-control sensor-type">
                        <option value="ampere">Ampere Meter</option>
                        <option value="voltage">Volt Meter</option>
                        <option value="ph">pH Meter</option>
                        <option value="level">Level Air</option>
                    </select>
                    <button type="button" class="btn btn-secondary remove-sensor"><i class="fas fa-times"></i></button>
                </div>
            `;
            modalTitle.textContent = 'Add New Pump';
            pumpModal.classList.add('show');
            
            // Add event listeners to remove buttons
            addSensorRemoveListeners();
        }

        // Edit existing pump
        function editPump(id) {
            const pump = pumps.find(p => p.id === id);
            if (!pump) return;
            
            pumpIdInput.value = pump.id;
            pumpNameInput.value = pump.name;
            
            // Clear and rebuild sensor fields
            sensorFields.innerHTML = '';
            pump.sensors.forEach(sensor => {
                const sensorField = document.createElement('div');
                sensorField.className = 'sensor-field';
                sensorField.style = 'display: flex; gap: 0.5rem; margin-bottom: 0.5rem;';
                
                sensorField.innerHTML = `
                    <select class="form-control sensor-type">
                        <option value="ampere" ${sensor.type === 'ampere' ? 'selected' : ''}>Ampere Meter</option>
                        <option value="voltage" ${sensor.type === 'voltage' ? 'selected' : ''}>Volt Meter</option>
                        <option value="ph" ${sensor.type === 'ph' ? 'selected' : ''}>pH Meter</option>
                        <option value="level" ${sensor.type === 'level' ? 'selected' : ''}>Level Air</option>
                    </select>
                    <button type="button" class="btn btn-secondary remove-sensor"><i class="fas fa-times"></i></button>
                `;
                
                sensorFields.appendChild(sensorField);
            });
            
            modalTitle.textContent = 'Edit Pump';
            pumpModal.classList.add('show');
            
            // Add event listeners to remove buttons
            addSensorRemoveListeners();
        }

        // Delete pump
        function deletePump(id) {
            if (confirm('Are you sure you want to delete this pump?')) {
                pumps = pumps.filter(pump => pump.id !== id);
                initDashboard();
                showNotification('Pump deleted successfully');
            }
        }

        // Save pump (add or update)
        function savePump(e) {
            e.preventDefault();
            
            const id = pumpIdInput.value ? parseInt(pumpIdInput.value) : Date.now();
            const name = pumpNameInput.value.trim();
            
            // Get sensor types
            const sensorTypes = Array.from(document.querySelectorAll('.sensor-type')).map(select => select.value);
            
            // Create new pump object
            const newPump = {
                id,
                name,
                status: 'on',
                sensors: sensorTypes.map(type => {
                    // Generate default values based on sensor type
                    let value = '';
                    switch(type) {
                        case 'ampere': value = '30 A'; break;
                        case 'voltage': value = '30 V'; break;
                        case 'ph': value = 'pH: 7'; break;
                        case 'level': value = '30 V'; break;
                    }
                    return { type, value };
                })
            };
            
            // Update or add the pump
            const existingIndex = pumps.findIndex(p => p.id === id);
            if (existingIndex >= 0) {
                // Preserve the existing status when editing
                newPump.status = pumps[existingIndex].status;
                pumps[existingIndex] = newPump;
                showNotification('Pump updated successfully');
            } else {
                pumps.push(newPump);
                showNotification('Pump added successfully');
            }
            
            // Close modal and refresh dashboard
            pumpModal.classList.remove('show');
            initDashboard();
        }

        // Add sensor field
        function addSensorField() {
            const sensorField = document.createElement('div');
            sensorField.className = 'sensor-field';
            sensorField.style = 'display: flex; gap: 0.5rem; margin-bottom: 0.5rem;';
            
            sensorField.innerHTML = `
                <select class="form-control sensor-type">
                    <option value="ampere">Ampere Meter</option>
                    <option value="voltage">Volt Meter</option>
                    <option value="ph">pH Meter</option>
                    <option value="level">Level Air</option>
                </select>
                <button type="button" class="btn btn-secondary remove-sensor"><i class="fas fa-times"></i></button>
            `;
            
            sensorFields.appendChild(sensorField);
            
            // Add event listener to remove button
            const removeBtn = sensorField.querySelector('.remove-sensor');
            removeBtn.addEventListener('click', () => {
                sensorField.remove();
            });
        }

        // Add event listeners to remove sensor buttons
        function addSensorRemoveListeners() {
            document.querySelectorAll('.remove-sensor').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.currentTarget.closest('.sensor-field').remove();
                });
            });
        }

        // Simulate real-time data updates
        function updateSensorData() {
            pumps.forEach(pump => {
                // Only update sensors if pump is on
                if (pump.status === 'on') {
                    pump.sensors.forEach(sensor => {
                        if (sensor.value.includes('A')) {
                            // Simulate ampere meter fluctuation between 28-32
                            const value = 28 + Math.floor(Math.random() * 5);
                            sensor.value = `${value} A`;
                        } else if (sensor.value.includes('V') && !sensor.value.includes('pH')) {
                            // Simulate voltage fluctuation between 28-32
                            const value = 28 + Math.floor(Math.random() * 5);
                            sensor.value = `${value} V`;
                        } else if (sensor.value.includes('pH')) {
                            // Simulate pH fluctuation between 6.8-7.2
                            const value = (6.8 + Math.random() * 0.4).toFixed(1);
                            sensor.value = `pH: ${value}`;
                        }
                    });
                } else {
                    // If pump is off, set all sensor values to 0 or similar
                    pump.sensors.forEach(sensor => {
                        if (sensor.value.includes('A')) {
                            sensor.value = `0 A`;
                        } else if (sensor.value.includes('V') && !sensor.value.includes('pH')) {
                            sensor.value = `0 V`;
                        } else if (sensor.value.includes('pH')) {
                            sensor.value = `pH: 0.0`;
                        }
                    });
                }
            });
            
            renderPumpCards();
            setTimeout(updateSensorData, 3000);
        }

        // Event Listeners
        addPumpBtn.addEventListener('click', addPump);
        addSensorBtn.addEventListener('click', addSensorField);
        pumpForm.addEventListener('submit', savePump);
        closeModal.addEventListener('click', () => {
            pumpModal.classList.remove('show');
        });
        cancelBtn.addEventListener('click', () => {
            pumpModal.classList.remove('show');
        });

        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.dropdown-menu');
            const userButton = document.querySelector('.user-button');
            
            if (!userButton.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Initialize the dashboard
        initDashboard();
        
        // Start data simulation
        updateSensorData();
    </script>
</body>x`
</html>