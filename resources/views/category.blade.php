<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category | Quiz Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary: #ff3535;
            --primary-light: #e74f13;
            --secondary: #00C49A;
            --secondary-light: #33d0af;
            --accent: #6C63FF;
            --accent-light: #8580ff;
            --dark: #0A0A0F;
            --darker: #050507;
            --light: #F8F9FA;
            --gray: #A0A0B0;
            --light-gray: #2A2A35;
            --danger: #FF4757;
            --warning: #FFA502;
            --success: #00C49A;
            --info: #2D8CFF;
            --card-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        body {
            font-family: serif;
            background: linear-gradient(135deg, var(--darker) 0%, #121218 100%);
            color: var(--light);
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-weight:800;
            padding: 20px;
        }
        
        /* Main Container */
        .main-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Dashboard Section */
        .dashboard-section {
            background: linear-gradient(145deg, rgba(20, 20, 30, 0.9), rgba(10, 10, 15, 0.9));
            border-radius: var(--card-radius);
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }
        
        /* Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }
        
        .section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            border-radius: 2px;
        }
        
        .section-header h2 {
            font-size: 28px;
            font-weight: 700;
           
        }
        .section-header h2 span{
            color:var(--primary-light);
        }
        
        .section-header h2 i {
            margin-right: 15px;
            color: var(--accent);
        }
        
        /* Back Button */
        .back-btn {
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--light);
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            outline: none;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Form Layout */
        .form-container {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }
        
        .form-main {
            flex: 1;
            min-width: 300px;
        }
        
        .form-sidebar {
            flex: 0 0 350px;
        }
        
        @media (max-width: 1024px) {
            .form-container {
                flex-direction: column;
            }
            
            .form-sidebar {
                flex: none;
                width: 100%;
            }
        }
        
        /* Form Card */
        .form-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: var(--card-radius);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: var(--transition);
        }
        
        .form-card:hover {
            border-color: rgba(108, 99, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .form-card h3 {
            font-size: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--light);
        }
        
        .form-card h3 i {
            color: var(--accent);
            width: 24px;
        }
        
        /* Form Elements */
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--light);
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-label .required {
            color: var(--danger);
            margin-left: 4px;
        }
        
        .form-control {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.07);
            border: 2px solid transparent;
            border-radius: 12px;
            color: var(--light);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
            background: rgba(255, 255, 255, 0.1);
        }
        
        .form-control::placeholder {
            color: #6C6C7C;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        /* Icon Selection */
        .icon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .icon-option {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .icon-option:hover {
            transform: translateY(-5px) scale(1.05);
            border-color: var(--accent);
            background: rgba(108, 99, 255, 0.1);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.2);
        }
        
        .icon-option.selected {
            border-color: var(--accent);
            background: rgba(108, 99, 255, 0.15);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }
        
        .icon-preview {
            font-size: 28px;
            margin-bottom: 10px;
            transition: var(--transition);
            position: relative;
            z-index: 2;
        }
        
        .icon-name {
            font-size: 12px;
            color: var(--gray);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 2;
        }
        
        /* Color Selection */
        .color-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
            gap: 12px;
            margin-top: 15px;
        }
        
        .color-option {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            cursor: pointer;
            border: 3px solid transparent;
            transition: var(--transition);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .color-option:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        
        .color-option.selected {
            border-color: white;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            transform: scale(1.1);
        }
        
        .color-option.selected::after {
            content: '✓';
            color: white;
            font-weight: bold;
            font-size: 16px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }
        
        /* Color Preview */
        .color-preview-container {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 25px;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .color-preview {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            border: 3px solid rgba(255, 255, 255, 0.2);
            background: var(--accent);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .color-details {
            flex: 1;
        }
        
        .color-code {
            font-family: monospace;
            font-size: 16px;
            color: var(--light);
            margin-bottom: 5px;
        }
        
        .color-label {
            font-size: 14px;
            color: var(--gray);
        }
        
        /* Preview Card */
        .preview-card {
            background: linear-gradient(135deg, rgba(30, 30, 40, 0.9), rgba(20, 20, 30, 0.9));
            border-radius: var(--card-radius);
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 30px;
        }
        
        .preview-title {
            font-size: 18px;
            margin-bottom: 20px;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .preview-title i {
            color: var(--accent);
        }
        
        .category-preview {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .preview-icon-container {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }
        
        .preview-icon {
            width: 100px;
            height: 100px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            transition: var(--transition);
        }
        
        .preview-content {
            text-align: center;
        }
        
        .preview-content h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--light);
        }
        
        .preview-content p {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
        }
        
        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 16px 30px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            outline: none;
            flex: 1;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            color: white;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent-light), var(--accent));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: var(--light);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            border-color: rgba(108, 99, 255, 0.3);
        }
        
        /* Success Message */
        .success-message {
            display: none;
            background: linear-gradient(135deg, rgba(0, 196, 154, 0.2), rgba(0, 196, 154, 0.1));
            border: 1px solid rgba(0, 196, 154, 0.3);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: center;
            animation: slideDown 0.5s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success-message i {
            font-size: 48px;
            color: var(--success);
            margin-bottom: 15px;
        }
        
        .success-message h4 {
            font-size: 20px;
            color: var(--light);
            margin-bottom: 10px;
        }
        
        .success-message p {
            color: var(--gray);
            font-size: 14px;
        }
        
        /* Error Message */
        .error-message {
            color: var(--danger);
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            display: none;
        }
        
        .error-message.show {
            display: flex;
            animation: shake 0.5s ease;
        }
        
        /* Loading State */
        .loading {
            position: relative;
            pointer-events: none;
            opacity: 0.8;
        }
        
        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: inherit;
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 0.8; }
            100% { opacity: 0.5; }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-section {
                padding: 20px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .form-card {
                padding: 20px;
            }
            
            .icon-grid {
                grid-template-columns: repeat(auto-fill, minmax(70px, 1fr));
            }
            
            .color-grid {
                grid-template-columns: repeat(auto-fill, minmax(45px, 1fr));
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        /* Custom Scrollbar
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--accent-light), var(--primary-light));
        }
        
        /* Animations */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        @keyframes iconBounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
         */
        .icon-option.selected .icon-preview {
            animation: iconBounce 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="dashboard-section">
            <!-- Header -->
            <div class="section-header">
                <h2><i class="fas fa-layer-group"></i> Add  New <span> Category</span></h2>
                 <a href="javascript:void(0)" class="back-btn" onclick="confirmBack()">
    <i class="fas fa-arrow-left"></i> Back to Quiz Management
</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmBack(){
    Swal.fire({
        title: 'Go back?',
        text: 'Are You Sure Go Back!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1E88E5',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, go back',
        cancelButtonText: 'Stay here'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ url('dashboard') }}";
        }
    });
}
</script>
            </div>
            
            <!-- Success Message (Initially Hidden) -->
            <div class="success-message" id="successMessage">
                <i class="fas fa-check-circle"></i>
                <h4>Category Created Successfully!</h4>
                <p>Your new category has been added to the system. You can now add questions to this category.</p>
            </div>
            
            <!-- Form Container -->
            <div class="form-container">
                <!-- Main Form -->
                <div class="form-main">
                    <form class="category-form" id="categoryForm" action="" method="POST">
                        @csrf
                        <div class="form-card">
                            <h3><i class="fas fa-info-circle"></i> Basic Information</h3>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-tag"></i> Category Name <span class="required">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="name" 
                                    id="categoryName"
                                    placeholder="Enter category name (e.g., JavaScript, Python)"
                                    maxlength="50"
                                    required
                                >
                                <div class="error-message" id="nameError">
                                    <i class="fas fa-exclamation-circle"></i>
                                    Category name must be 3-50 characters
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-align-left"></i> Description
                                </label>
                                <textarea 
                                    class="form-control" 
                                    name="description" 
                                    id="categoryDescription"
                                    placeholder="Describe this category (optional)"
                                    rows="3"
                                ></textarea>
                            </div>
                        </div>
                        
                        <!-- Icon Selection -->
                        <div class="form-card">
                            <h3><i class="fas fa-icons"></i> Select Icon</h3>
                            <div class="icon-grid" id="iconGrid">
                                <!-- Icons will be dynamically added -->
                            </div>
                            <input type="hidden" name="course_icon" id="selectedIcon" value="code">
                            <div class="error-message" id="iconError">
                                <i class="fas fa-exclamation-circle"></i>
                                Please select an icon
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" id="cancelBtn">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-save"></i> Create Category
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Preview Sidebar -->
                <div class="form-sidebar">
                    <div class="preview-card">
                        <h3 class="preview-title">
                            <i class="fas fa-eye"></i> Category Preview
                        </h3>
                        
                        <div class="category-preview">
                            <div class="preview-icon-container">
                                <div class="preview-icon" id="previewIcon">
                                    <i class="fas fa-code"></i>
                                </div>
                            </div>
                            <div class="preview-content">
                                <h4 id="previewName">Category Name</h4>
                                <p id="previewDescription">Category description will appear here</p>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
document.addEventListener("DOMContentLoaded", () => {
  // ---------- Elements ----------
  const iconGrid = document.getElementById("iconGrid");
  const selectedIconInput = document.getElementById("selectedIcon");

  const categoryForm = document.getElementById("categoryForm");
  const successMessage = document.getElementById("successMessage");

  const nameInput = document.getElementById("categoryName");
  const descInput = document.getElementById("categoryDescription");

  const previewName = document.getElementById("previewName");
  const previewDesc = document.getElementById("previewDescription");
  const previewIconBox = document.getElementById("previewIcon");

  const nameError = document.getElementById("nameError");
  const iconError = document.getElementById("iconError");

  const cancelBtn = document.getElementById("cancelBtn");
  const backBtn = document.getElementById("backBtn");
  const submitBtn = document.getElementById("submitBtn");

  // ---------- Icon list (Font Awesome solid icons) ----------
  const icons = [
    { key: "code", label: "Code", fa: "fa-code" },
    { key: "laptop", label: "Laptop", fa: "fa-laptop-code" },
    { key: "database", label: "DB", fa: "fa-database" },
    { key: "server", label: "Server", fa: "fa-server" },
    { key: "bug", label: "Bug", fa: "fa-bug" },
    { key: "shield", label: "Security", fa: "fa-shield-halved" },
    { key: "network", label: "Network", fa: "fa-network-wired" },
    { key: "cloud", label: "Cloud", fa: "fa-cloud" },
    { key: "robot", label: "AI", fa: "fa-robot" },
    { key: "mobile", label: "Mobile", fa: "fa-mobile-screen-button" },
    { key: "palette", label: "UI", fa: "fa-palette" },
    { key: "chart", label: "Stats", fa: "fa-chart-line" },
    { key: "book", label: "Learn", fa: "fa-book" },
    { key: "game", label: "Game", fa: "fa-gamepad" },
    { key: "math", label: "Math", fa: "fa-square-root-variable" },
    { key: "globe", label: "Web", fa: "fa-globe" },
  ];

  // ---------- Helpers ----------
  const setPreviewIcon = (faClass) => {
    previewIconBox.innerHTML = `<i class="fas ${faClass}"></i>`;
  };

  const clearErrors = () => {
    nameError.classList.remove("show");
    iconError.classList.remove("show");
  };

  const validateName = () => {
    const val = nameInput.value.trim();
    const ok = val.length >= 3 && val.length <= 50;
    nameError.classList.toggle("show", !ok);
    return ok;
  };

  const validateIcon = () => {
    const ok = !!selectedIconInput.value;
    iconError.classList.toggle("show", !ok);
    return ok;
  };

  const updatePreviewText = () => {
    const nameVal = nameInput.value.trim();
    const descVal = descInput.value.trim();

    previewName.textContent = nameVal || "Category Name";
    previewDesc.textContent = descVal || "Category description will appear here";
  };

  // ---------- Build Icon Grid ----------
  const buildIcons = () => {
    iconGrid.innerHTML = "";

    icons.forEach((icon) => {
      const div = document.createElement("div");
      div.className = "icon-option";
      div.dataset.key = icon.key;
      div.dataset.fa = icon.fa;

      div.innerHTML = `
        <div class="icon-preview"><i class="fas ${icon.fa}"></i></div>
        <div class="icon-name">${icon.label}</div>
      `;

      div.addEventListener("click", () => {
        // remove previous selection
        document.querySelectorAll(".icon-option").forEach((el) => el.classList.remove("selected"));

        // select new
        div.classList.add("selected");
        selectedIconInput.value = icon.key;

        // update preview icon
        setPreviewIcon(icon.fa);

        // clear icon error if any
        iconError.classList.remove("show");
      });

      iconGrid.appendChild(div);
    });

    // default select based on hidden input value
    const defaultKey = selectedIconInput.value || "code";
    const defaultEl = [...document.querySelectorAll(".icon-option")].find((el) => el.dataset.key === defaultKey);
    if (defaultEl) {
      defaultEl.classList.add("selected");
      setPreviewIcon(defaultEl.dataset.fa);
    }
  };

  // ---------- Events ----------
  nameInput.addEventListener("input", () => {
    validateName();
    updatePreviewText();
  });

  descInput.addEventListener("input", updatePreviewText);

  cancelBtn.addEventListener("click", () => {
    categoryForm.reset();
    clearErrors();
    selectedIconInput.value = "code";
    updatePreviewText();
    buildIcons();
    successMessage.style.display = "none";
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  backBtn.addEventListener("click", (e) => {
    // If you want it to just go back in history:
    e.preventDefault();
    window.history.back();
  });

  categoryForm.addEventListener("submit", (e) => {
    // If you're submitting to Laravel, remove preventDefault().
    e.preventDefault();

    clearErrors();

    const okName = validateName();
    const okIcon = validateIcon();

    if (!okName || !okIcon) {
      // small shake effect on first invalid card
      const card = document.querySelector(".form-card");
      card.style.animation = "shake 0.5s ease";
      setTimeout(() => (card.style.animation = ""), 600);
      return;
    }

    // Loading state
    submitBtn.classList.add("loading");
    submitBtn.disabled = true;

    // Simulate request success (replace with real fetch/ajax if needed)
    setTimeout(() => {
      submitBtn.classList.remove("loading");
      submitBtn.disabled = false;

      successMessage.style.display = "block";
      window.scrollTo({ top: 0, behavior: "smooth" });

      // If you want to actually submit to server after validation:
      // categoryForm.submit();
    }, 700);
  });

  // ---------- Init ----------
  buildIcons();
  updatePreviewText();
});
</script>
    
</body>
</html>