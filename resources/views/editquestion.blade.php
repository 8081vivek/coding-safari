<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management System - Add Question</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --sidebar-width: 260px;
        }
        
        body {
            font-family: 'Source Serif Pro', serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .dashboard-section {
            background: linear-gradient(135deg, #1A1A24 0%, #13131A 100%);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--light-gray);
        }
        
        .section-header h2 {
            font-size: 28px;
            font-weight: 700;
        }
        
        .section-header h2 span {
            color: var(--primary);
        }
        
        .back-btn {
            padding: 10px 20px;
            background-color: var(--light-gray);
            color: var(--light);
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            outline: none;
            text-decoration: none;
        }
        
        .back-btn:hover {
            background-color: #3A3A45;
            transform: translateY(-2px);
        }
        
        /* Add Question Form Styles */
        .add-question-container {
            display: flex;
            gap: 30px;
        }
        
        .form-main {
            flex: 1;
        }
        
        .form-sidebar {
            flex: 0 0 300px;
        }
        
        .form-card {
            background-color: var(--darker);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 25px;
            border: 1px solid var(--light-gray);
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
            color: var(--primary);
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--light);
            font-size: 16px;
        }
        
        .form-label .required {
            color: var(--danger);
            margin-left: 4px;
        }
        
        .form-control {
            width: 100%;
            padding: 15px 20px;
            background-color: var(--light-gray);
            border: 2px solid transparent;
            border-radius: 12px;
            color: var(--light);
            font-size: 16px;
            font-family: 'Source Serif Pro', serif;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
        
        .form-control::placeholder {
            color: #6C6C7C;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        /* Options Container */
        .options-container {
            background-color: var(--light-gray);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .option-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: var(--dark);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .option-item:hover {
            border-color: rgba(108, 99, 255, 0.3);
        }
        
        .option-number {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }
        
        .option-input {
            flex: 1;
            background-color: transparent;
            border: none;
            color: var(--light);
            font-size: 16px;
            font-family: 'Source Serif Pro', serif;
            padding: 10px 0;
        }
        
        .option-input:focus {
            outline: none;
        }
        
        .correct-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .correct-checkbox input {
            display: none;
        }
        
        .checkbox-custom {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            border: 2px solid var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .checkbox-custom i {
            color: transparent;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .correct-checkbox input:checked + .checkbox-custom {
            background-color: var(--success);
            border-color: var(--success);
        }
        
        .correct-checkbox input:checked + .checkbox-custom i {
            color: white;
        }
        
        .option-actions {
            display: flex;
            gap: 10px;
        }
        
        .option-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            border: 2px solid var(--light-gray);
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .option-btn:hover {
            background-color: var(--light-gray);
            color: var(--light);
        }
        
        .add-option-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 15px;
            background-color: transparent;
            border: 2px dashed var(--gray);
            border-radius: 12px;
            color: var(--gray);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .add-option-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
            background-color: rgba(255, 107, 53, 0.05);
        }
        
        /* Radio and Checkbox Groups */
        .radio-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .radio-item {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .radio-item input {
            display: none;
        }
        
        .radio-custom {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid var(--gray);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .radio-custom::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: transparent;
            transition: all 0.3s ease;
        }
        
        .radio-item input:checked + .radio-custom {
            border-color: var(--primary);
        }
        
        .radio-item input:checked + .radio-custom::after {
            background-color: var(--primary);
        }
        
        /* Tags Input */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .tag {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: rgba(108, 99, 255, 0.2);
            color: var(--accent);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .tag-remove {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font-size: 12px;
            padding: 0;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .tag-remove:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        /* Difficulty Selector */
        .difficulty-selector {
            display: flex;
            gap: 15px;
        }
        
        .difficulty-btn {
            flex: 1;
            padding: 15px;
            background-color: var(--light-gray);
            border: 2px solid transparent;
            border-radius: 12px;
            color: var(--gray);
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .difficulty-btn:hover {
            transform: translateY(-3px);
        }
        
        .difficulty-btn.easy:hover {
            border-color: var(--success);
            color: var(--success);
        }
        
        .difficulty-btn.medium:hover {
            border-color: var(--warning);
            color: var(--warning);
        }
        
        .difficulty-btn.hard:hover {
            border-color: var(--danger);
            color: var(--danger);
        }
        
        .difficulty-btn.selected {
            border-color: transparent;
            color: white;
        }
        
        .difficulty-btn.easy.selected {
            background-color: var(--success);
        }
        
        .difficulty-btn.medium.selected {
            background-color: var(--warning);
        }
        
        .difficulty-btn.hard.selected {
            background-color: var(--danger);
        }
        
        /* Sidebar Styles */
        .form-sidebar .form-card {
            position: sticky;
            top: 20px;
        }
        
        .preview-title {
            font-size: 18px;
            margin-bottom: 20px;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .preview-content {
            background-color: var(--light-gray);
            border-radius: 12px;
            padding: 20px;
            min-height: 200px;
            font-size: 14px;
            color: var(--gray);
            line-height: 1.7;
        }
        
        .preview-question {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--light);
        }
        
        .preview-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }
        
        .preview-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background-color: var(--dark);
            border-radius: 8px;
            border-left: 4px solid transparent;
        }
        
        .preview-option.correct {
            border-left-color: var(--success);
        }
        
        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 15px 30px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            outline: none;
            flex: 1;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #E05A2B;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }
        
        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--light);
        }
        
        .btn-secondary:hover {
            background-color: #3A3A45;
            transform: translateY(-3px);
        }
        
        /* Code Editor Styles */
        .code-editor {
            background-color: #1E1E2E;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 10px;
        }
        
        .code-header {
            background-color: #2D2D42;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: var(--gray);
        }
        
        .code-language {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .code-body {
            padding: 15px;
            font-family: 'Source Serif Pro', serif;
            font-size: 15px;
            line-height: 1.5;
            min-height: 150px;
            color: #E2E2E2;
        }
        
        .code-body:focus {
            outline: none;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .add-question-container {
                flex-direction: column;
            }
            
            .form-sidebar {
                flex: none;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-section {
                padding: 20px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .option-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .option-actions {
                align-self: flex-end;
            }
            
            .difficulty-selector {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-section">
        <div class="section-header">
            <h2>Add <span>New Question</span></h2>
            <a href="javascript:void(0)" class="back-btn" id="backBtn" onclick="confirmBack()">
    <i class="fas fa-arrow-left"></i> Back to Quiz Management
</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmBack(){
    Swal.fire({
        title: 'Go back?',
        text: 'Are you sure you want to leave this page?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
    window.location.href = "{{ url('dashboard') }}";
        }
    });
}
</script>

        </div>
        
        <div class="add-question-container">
            <!-- Main Form -->
            <div class="form-main">
                <form id="addQuestionForm" method="post" action="{{'../updateQuestion'}}">
                    @csrf
                    <div class="form-card">
                        <h3><i class="fas fa-info-circle"></i> Basic Information</h3>
                        <div class="form-group">
                            <label class="form-label" for="questionText">Question Name <span class="required">*</span></label>
                            <textarea id="questionText" class="form-control" name="name" placeholder="Enter the full question text here..." rows="4" required>{{$data->question_name}}</textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="questionCategory">Category <span class="required">*</span></label>
                                <input type="text" id="questionCategory"  value="{{$courseData->name}}" class="form-control" required readonly>
                                <input type="hidden" id="questionCategory" name="course_id" value="{{$data->course_id}}" class="form-control">
                                <input type="hidden" id="questionCategory" name="question_id" value="{{$data->question_id}}" class="form-control">
            
                            </div>
                    </div>
                    
                    <!-- Options Card (for Multiple Choice) -->
                    <div class="form-card" id="optionsCard">
                        <h3><i class="fas fa-list-ol"></i> Answer Options</h3>
                        
                        <div class="options-container" id="optionsContainer">

  <div class="option-item" data-index="0">
    <div class="option-number">A</div>
    <input type="text" class="option-input" name="option_a" id="option_a"
           placeholder="Enter option text..." value="{{$data->option_a}}" oninput="syncValue(0)" required>
    <div class="correct-checkbox">
      <input type="radio" value="A"  name="correct_option"  id="optionCorrect0"  {{ $data->correct_option == 'A' ? 'checked' : '' }}>
      <label class="checkbox-custom" for="optionCorrect0"><i class="fas fa-check"></i></label>
      <span>Correct Answer</span>
    </div>
  </div>

  <div class="option-item" data-index="1">
    <div class="option-number">B</div>
    <input type="text" class="option-input" name="option_b"
           placeholder="Enter option text..." oninput="syncValue(1)" value="{{$data->option_a}}" required>
    <div class="correct-checkbox">
      <input type="radio" value="B" name="correct_option" id="optionCorrect1" required {{ $data->correct_option == 'B' ? 'checked' : '' }}>
      <label class="checkbox-custom" for="optionCorrect1"><i class="fas fa-check"></i></label>
      <span>Correct Answer</span>
    </div>
  </div>

  <div class="option-item" data-index="2">
    <div class="option-number">C</div>
    <input type="text" class="option-input" name="option_c"
           placeholder="Enter option text..." oninput="syncValue(2)" value="{{$data->option_c}}" required>
    <div class="correct-checkbox">
      <input type="radio" value="C" name="correct_option" id="optionCorrect2" required {{ $data->correct_option == 'C' ? 'checked' : '' }}>
      <label class="checkbox-custom" for="optionCorrect2"><i class="fas fa-check"></i></label>
      <span>Correct Answer</span>
    </div>
  </div>

  <div class="option-item" data-index="3">
    <div class="option-number">D</div>
    <input type="text" class="option-input" name="option_d"
           placeholder="Enter option text..." oninput="syncValue(3)" value="{{$data->option_d}}" required>
    <div class="correct-checkbox">
      <input type="radio" value="D"  name="correct_option" id="optionCorrect3" required {{ $data->correct_option == 'D' ? 'checked' : '' }}>
      <label class="checkbox-custom" for="optionCorrect3"><i class="fas fa-check"></i></label>
      <span>Correct Answer</span>
    </div>
  </div>

</div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="cancelBtn">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-edit"></i> Edit Question
                        </button>
                    </div>
                </form>
            </div>
</div>
        </div>
    </div>

    @if (session('success'))
<script>
Swal.fire({
    toast: true,
    position: 'top-end',   // right side
    icon: 'success',
    title: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true,
});
</script>
@endif

@if (session('error'))
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'error',
    title: "{{ session('error') }}",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});
</script>
@endif

   <!-- <script>
function syncValue(index) {
  const inputs = document.querySelectorAll('.option-input');
  const radio  = document.getElementById('optionCorrect' + index);

  if (inputs[index] && radio) {
    radio.value = inputs[index].value;
  }
}
</script> -->

</body>
</html>