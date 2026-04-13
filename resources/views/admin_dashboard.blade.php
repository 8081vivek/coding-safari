<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Coding Safari Hackathon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"></head>
<body>
    <!-- Grid Background -->
    <div class="grid-bg"></div>
    
    <div class="admin-dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="admin-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2>Coding<span>Safari</span></h2>
                <p>Admin Dashboard</p>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#dashboard" class="nav-link" data-tab="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#quiz-management" class="nav-link" data-tab="quiz-management">
                        <i class="fas fa-question-circle"></i>
                        <span>Quiz Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#assessment" class="nav-link" data-tab="assessment">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Assessment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#show-assessment" class="nav-link" data-tab="show-assessment">
                        <i class="fas fa-list-alt"></i>
                        <span>Show Assessments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#students" class="nav-link" data-tab="students">
                        <i class="fas fa-users"></i>
                        <span>Student Registration</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#results" class="nav-link" data-tab="results">
                        <i class="fas fa-chart-line"></i>
                        <span>Quiz Results</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#homepage" class="nav-link" data-tab="homepage">
                        <i class="fas fa-home"></i>
                        <span>Homepage Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#hackathon" class="nav-link" data-tab="hackathon">
                        <i class="fas fa-trophy"></i>
                        <span>Hackathon Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" class="nav-link" data-tab="settings">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            
            <div class="logout-section">
                <a href="" class="nav-link" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
            <script>
const logoutBtn = document.getElementById('logoutBtn');

if (logoutBtn) {
  logoutBtn.addEventListener('click', function (e) {
    e.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "You will be logged out from the system.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#6C63FF',
      cancelButtonColor: '#ff4d4f',
      confirmButtonText: 'Yes, Logout',
      cancelButtonText: 'Cancel',
      background: '#1f1f2e',
      color: '#fff'
    }).then((result) => {
      if (result.isConfirmed) {

        Swal.fire({
          title: 'Logged Out!',
          text: 'Redirecting...',
          icon: 'success',
          timer: 1500,
          showConfirmButton: false
        });

        setTimeout(() => {
          window.location.href = "{{ route('logout') }}";
        }, 1000);
      }
    });
  });
}
</script>
        </div>

















        
        <div class="main-content">
            <div class="header">
                <div>
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Admin <span>Dashboard</span></h1>
                    <p style="color: var(--gray); margin-top: 5px;">Welcome back, Admin! Here's what's happening with Coding Safari Hackathon.</p>
                </div>
                
                <div class="header-actions">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="admin-profile">
                       <img src="https://ui-avatars.com/api/?name={{ urlencode($adminData->name) }}&background=FF6B35&color=fff" alt="Admin">
                        <div>
                            <div style="font-weight: 600;">{{$adminData->name}}</div>
                            <div style="font-size: 0.8rem; color: var(--gray);">System Administrator</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div id="dashboard" class="tab-content">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card primary">
                        <div class="stat-header">
                            <i class="fas fa-users"></i>
                            <span class="stat-label">Total Students</span>
                        </div>
                        <div class="stat-value">{{count($dataStudent)}}</div>
                        <div style="color: var(--secondary);">+15% this week</div>
                    </div>
                    
                    <div class="stat-card secondary">
                        <div class="stat-header">
                            <i class="fas fa-question-circle"></i>
                            <span class="stat-label">Active Quizzes</span>
                        </div>
                        <div class="stat-value">{{count($assesmentShow)}}</div>
                        <div style="color: var(--secondary);">2 new this month</div>
                    </div>
                    
                    <div class="stat-card accent">
                        <div class="stat-header">
                            <i class="fas fa-chart-line"></i>
                            <span class="stat-label">Avg. Score</span>
                        </div>
                        <div class="stat-value">{{count($dataQuestion)}}</div>
                        <div style="color: var(--secondary);">+5.2% improvement</div>
                    </div>
                    
                    <div class="stat-card warning">
                        <div class="stat-header">
                            <i class="fas fa-trophy"></i>
                            <span class="stat-label">Hackathon Teams</span>
                        </div>
                        <div class="stat-value">{{count($data)}}</div>
                        <div style="color: var(--secondary);">Registered for 2023</div>
                    </div>
                </div>















                
                <!-- Recent Activity -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Recent <span>Join Student</span></h2>
                    </div>
                    
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr><th>Sr.No.</th>
                                    <th>Student</th>
                                    <th>Student Id</th>
                                    <th>Email</th>
                                    <th>College</th>
                                    <th>Course</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataStudent as $student )
                                <tr>
                                    <td>{{($loop->iteration)}}</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=6C63FF&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>{{$student->name}}</div>
                                        </div>
                                    </td>
                                    <td>{{$student->registrationId}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->collegeName}}</td>
                                    <td>{{$student->course}}</td>
<td>
@php
    $time = \Carbon\Carbon::parse($student->now);
    $diff = $time->diff(now());
@endphp

{{ $diff->h }} hour 
{{ $diff->i }} min 
{{ $diff->s }} sec ago
</td></tr>
                                @endforeach
                                <tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            































            <!-- Quiz Management -->
            <div id="quiz-management" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Quiz <span>Management</span></h2>
                        <div class="questions-actions">
                            <button class="btn btn-secondary" id="importQuestionsBtn">
                                <i class="fas fa-file-import"></i> Import CSV
                            </button>
                            <a href="{{'../../../setAssesment/vp/8081'}}" class="btn btn-primary" id="createNewAssessmentBtn">
                                <i class="fas fa-plus-circle"></i> Create New Assessment
                            </a>
                        </div>
                    </div>
                    
                    <div class="quiz-management-container">
                        <!-- Categories Sidebar -->
                        <div class="categories-sidebar">
                            <h3><i class="fas fa-layer-group"></i> Quiz Categories</h3>
                            
                            <div class="category-list" id="categoryList">
                                @foreach($data as $x)
                                <div class="category-item" data-category="{{ strtolower($x->name) }}">
                                    <div class="category-info">
                                        <div class="category-icon" style="background: rgba(255, 193, 7, 0.1); color: #FFC107;">
                                            <i class="fab fa-{{$x->course_icon}}"></i>
                                        </div>
                                        <div class="category-details">
                                            <h4>{{$x->name}}</h4>
                                            <p>{{$x->description}}</p>
                                        </div>
                                    </div>
                                        <a href="{{ url('quiz/vp8081/add/' . Crypt::encrypt($x->course_id)) }}">
                                            <button class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            
                            <a href="{{'category'}}" class="add-category-btn" >
                                <i class="fas fa-plus-circle"></i>
                                Add New Category
                            </a>
                        </div>
                        




































                        <!-- Questions Panel -->
                        <div class="questions-panel">
                            <div class="questions-header">
                                <h3>All <span>Questions</span></h3>
                            </div>
                            
                            <!-- Questions Container -->
                            <div class="questions-container" id="questionsContainer">
                                @foreach ($dataQuestion as $q)
                                    <div class="question-card">
                                        <div class="question-header">
                                            <span style="color: var(--primary); font-weight:600;">Q{{ $loop->iteration }}</span>
                                            <span style="color: var(--warning); font-weight:600;">
                                                @foreach($course as $c)
                                                    @if($c->course_id == $q->course_id)
                                                        {{ $c->name }}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="question-text">{{$q->question_name}}</div>
                                        <div class="options-grid">
                                            <div class="option-item {{ $q->correct_option =='A' ? 'correct' : '' }}">
                                                <div class="option-marker">A</div>
                                                <div class="option-text">{{ $q->option_a }}</div>
                                            </div>
                                            <div class="option-item {{ $q->correct_option =='B' ? 'correct' : '' }}">
                                                <div class="option-marker">B</div>
                                                <div class="option-text">{{ $q->option_b }}</div>
                                            </div>
                                            <div class="option-item {{ $q->correct_option =='C' ? 'correct' : '' }}">
                                                <div class="option-marker">C</div>
                                                <div class="option-text">{{ $q->option_c }}</div>
                                            </div>
                                            <div class="option-item {{ $q->correct_option =='D' ? 'correct' : '' }}">
                                                <div class="option-marker">D</div>
                                                <div class="option-text">{{ $q->option_d }}</div>
                                            </div>
                                        </div>
                                        <div class="question-footer">
                                            <div class="question-actions">
                                                <a href="{{url('editQuestion/'.Crypt::encrypt($q->question_id))}}">
                                                <button class="action-btn">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                              </a>
                                            <a href="javascript:void(0)" onclick="confirmDelete('{{ url('deleteQuestion/' . Crypt::encrypt($q->question_id)) }}')">
                                               <button class="action-btn">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button></a>

   <script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't  delete this question!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "{{ session('error') }}",
        confirmButtonColor: '#d33'
    });
</script>
@endif
                        </div>
                    </div>
                </div>
            </div>































            
            <!-- Assessment Page -->
            <div id="assessment" class="tab-content">
                <div class="assessment-container">
                    <!-- Assessment Header -->
                    <div class="assessment-header">
                        <div class="assessment-info">
                            <h2 class="assessment-title">{{ $assesmentData->title ?? 'No Assessment Found' }} Assessment</h2>
                            <p class="assessment-subtitle">Test your knowledge of JavaScript programming language with this comprehensive assessment</p>
                        </div>
                        <div class="assessment-stats">
                            <div class="stat-box">
                                <div class="number">{{count(explode(',', $assesmentData->questionId??''))?? ''}}</div>
                                <div class="label">Questions</div>
                            </div>
                            <div class="stat-box">
                                <div class="number">{{$assesmentData->minutes?? ''}}</div>
                                <div class="label">Minutes</div>
                            </div>
                            <div class="stat-box">
                                <div class="number">{{$assesmentData->seconds ?? ''}}</div>
                                <div class="label">Total Seconds</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Assessment Content -->
                    <div class="quiz-management-container">
                        <!-- Questions List -->
                        <div class="assessment-questions-list">
                            <h3><i class="fas fa-list-ol"></i> Assessment List</h3>
                            <div class="category-list">
                                @foreach($assesmentShow as $a)
                                    <div class="category-item">
                                        <div class="category-info">
                                            <div class="category-icon" style="background: rgba(255, 193, 7, 0.1); color: #FFC107;">
                                                <p>A{{$loop->iteration}}</p>
                                            </div>
                                            <div class="category-details">
                                                <h4>{{$a->title}}</h4>
                                                <p>{{$a->code}}</p>
                                            </div>
                                        </div>
                                            <a href="{{ route('admin.showquestion', Crypt::encrypt($a->id)) }}">
                                                <button class="btn btn-primary">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <a href="../../../setAssesment/vp/8081" class="add-category-btn" id="addAssessmentBtn">
                                <i class="fas fa-plus-circle"></i>
                                Add New Assessment
                            </a>
                        </div>
                        
                        <!-- Question Preview -->
                        <div class="assessment-preview"> 
                            <div class="preview-header">
                                <h3 class="preview-title"><i class="fas fa-list-ol"></i> Question List</h3>
                            </div>
                            <div class="preview-content" id="previewContent">
                                <div class="questions-container">
                                    @foreach ($questions as $q)
                                        <div class="question-card">
                                            <div class="question-header">
                                                <span style="color: var(--primary); font-weight:600;">Q{{ $loop->iteration }}</span>
                                                <span style="color: var(--warning); font-weight:600;">
                                                    {{ $courses[$q->course_id]->name ?? '' }}
                                                </span>
                                            </div>
                                            <div class="question-text">{{ $q->question_name }}</div>
                                            <div class="options-grid">
                                                <div class="option-item {{ $q->correct_option =='A' ? 'correct' : '' }}">
                                                    <div class="option-marker">A</div>
                                                    <div class="option-text">{{ $q->option_a }}</div>
                                                </div>
                                                <div class="option-item {{ $q->correct_option =='B' ? 'correct' : '' }}">
                                                    <div class="option-marker">B</div>
                                                    <div class="option-text">{{ $q->option_b }}</div>
                                                </div>
                                                <div class="option-item {{ $q->correct_option =='C' ? 'correct' : '' }}">
                                                    <div class="option-marker">C</div>
                                                    <div class="option-text">{{ $q->option_c }}</div>
                                                </div>
                                                <div class="option-item {{ $q->correct_option =='D' ? 'correct' : '' }}">
                                                    <div class="option-marker">D</div>
                                                    <div class="option-text">{{ $q->option_d }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


















            
            <!-- Show Assessment Tab -->
            <div id="show-assessment" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>All <span>Assessments</span></h2>
                        <div class="assessment-actions">
                            <!-- <button class="btn btn-secondary" id="exportAssessmentsBtn">
                                <i class="fas fa-file-export"></i> Export All
                            </button> -->
                            <a href="../../../setAssesment/vp/8081" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Create New Assessment
                            </a>
                        </div>
                    </div>
                    
                    <!-- Assessments Grid -->
                    <div class="assessments-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 20px; margin-bottom: 30px;">
                        @foreach ($assesmentShow as $A)
                            <div class="assessment-card" style="background: var(--card-bg); border-radius: 15px; border: 1px solid var(--light-gray); overflow: hidden;">
                                <div style="padding: 20px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <div style="width: 45px; height: 45px; border-radius: 12px; background: rgba(108, 99, 255, 0.1); display: flex; align-items: center; justify-content: center;">
                                            <p style="color: #FFD700; font-size: 24px;">A{{ $loop->iteration }}</p>
                                        </div>
                                        <div>
                                            <h3 style="font-size: 18px; margin: 0;">{{$A->title}}</h3>
                                        </div>
                                    </div>
                                   <a href="{{ url('statusActivation/' . Crypt::encrypt($A->id)) }}">
    <button class="btn-status"
        style="padding:10px; cursor:pointer; border-radius:6px;
        @if($A->status == 'Active')
            background: rgba(46, 213, 115, 0.1);
            border: 1px solid var(--success);
            color: var(--success);
        @else
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid orange;
            color: orange;
        @endif
        ">

        @if($A->status == 'Active')
            <i class="fas fa-check-circle"></i>
        @else
            <i class="fas fa-exclamation-circle"></i>
        @endif

        {{$A->status}}
    </button>
</a>
                                </div>
                                
                                <div style="padding: 20px;">
                                    <div style="margin-bottom: 15px;">
                                        <div>
                                            <p style="font-size:30px; background: linear-gradient(90deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{$A->code}}</p>
                                        </div>
                                    </div> 
                                    
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px; padding: 10px 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
                                        <div>
                                            <div style="font-size: 20px; font-weight: 700; color: var(--primary);">{{ count(explode(',', $A->questionId)) }}</div>
                                            <div style="font-size: 12px; color: var(--gray);">All Questions</div>
                                        </div>
                                        <div>
                                            <div style="font-size: 20px; font-weight: 700; color: var(--success);">{{$A->Date_Time }}</div>
                                            <div style="font-size: 12px; color: var(--gray);">Created Date</div>
                                        </div>
                                        <div>
                                            <div style="font-size: 20px; font-weight: 700; color: var(--warning);">{{ ($A->hours * 60) + $A->minutes + ($A->seconds / 60) }}</div>
                                            <div style="font-size: 12px; color: var(--gray);">Total Time</div>
                                        </div>
                                    </div>
                                    
                                    <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                        <!-- <button class="btn btn-primary" style="flex: 1; padding: 10px;">
                                            <i class="fas fa-edit"></i> Edit
                                        </button> -->
                                      <a href="{{ url('deleteAssesment/' . Crypt::encrypt($A->id)) }}" class="btn btn-secondary delete-btn" style="flex: 1; text-align:center; padding: 10px;">
    <i class="fas fa-chart-bar"></i> Delete
</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (e) {

        e.preventDefault(); // 🔥 link ko rok diya

        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You Wont to delete this assessment !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // 🔥 redirect
            }
        });

    });
});
</script> 
                    
                    <!-- Pagination
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
                        <div style="color: var(--gray);">Showing 1-3 of 12 assessments</div>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-secondary" disabled><i class="fas fa-chevron-left"></i></button>
                            <button class="btn btn-primary" style="background: var(--primary);">1</button>
                            <button class="btn btn-secondary">2</button>
                            <button class="btn btn-secondary">3</button>
                            <button class="btn btn-secondary">4</button>
                            <button class="btn btn-secondary"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div> -->
                </div>
            </div>
            























            <!-- Student Registration -->
            <div id="students" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Student <span>Registration</span></h2>
                        <div>
                            <button class="btn btn-secondary" style="margin-right: 10px;">
                                <i class="fas fa-download"></i> Export
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> Add Student
                            </button>
                        </div>
                    </div>
                    
                    <!-- Student List -->
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>College</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataStudent as $student)
                                <tr>
                                    <td>{{$student->registrationId}}</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name={{urlencode($student->name)}}&background=6C63FF&color=fff" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                                            <div>{{$student->name}}</div>
                                        </div>
                                    </td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->collegeName}}</td>
                                    <td>{{$student->now}}</td>
                                    <td><span class="status {{$student->status=='Pending'?'pending':'active'}}">{{$student->status}}</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn" title="Send Login Details">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            



























            <!-- Quiz Results -->
            <div id="results" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Quiz <span>Results</span></h2>
                        <div>

    <div style="position:relative; display:inline-block;">

    <i class="fas fa-search"
       style="position:absolute; left:10px; top:50%; transform:translateY(-50%); color:white;"></i>
<form action="dashboard" method="post">
    @csrf
    <input type="text"
       id="filterInput"
       name="filter"
       placeholder="Search..."
       class="form-control custom-input">
    <input type="date"
       id="filterInput"
       name="filterDate"
       placeholder="Search..."
       class="form-control custom-input">
</div>

  <button class="btn btn-secondary" style="margin-right: 10px;">
                                <i class="fas fa-filter"></i> Filter
                            </button>
</form>
                            
                            <button class="btn btn-primary">
                                <i class="fas fa-chart-bar"></i> Generate Report
                            </button>
                        </div>
                    </div>
                    
                    <!-- Results Table -->
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Student</th>
                                    <th>Quiz</th>
                                    <th>Score</th>
                                    <th>Time Taken</th>
                                    <th>Date</th>
                                    <th>Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $r)
                                <tr>
                                    <td>{{($loop->iteration)}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->course}}</td>
                                    <td>{{$r->score}}</td>
                                    <td>{{$r->email}}</td>
                                    <td>{{$r->date}}</td>
                                    <td>
                                        <button class="btn btn-secondary" style="padding: 5px 10px;">
                                            <i class="fas fa-download"></i> Download
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            




















            <!-- Homepage Management -->
            <div id="homepage" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Homepage <span>Management</span></h2>
                    </div>
                    
                    <div class="tabs" id="homepageTabs">
                        <div class="tab active" data-tab="hero">Hero Section</div>
                        <div class="tab" data-tab="features">Features</div>
                        <div class="tab" data-tab="prizes">Prizes</div>
                        <div class="tab" data-tab="schedule">Schedule</div>
                    </div>
                    
                    <div class="tab-content active" id="hero">
                        <div class="form-group">
                            <label for="heroTitle">Hero Title</label>
                            <input type="text" id="heroTitle" value="Welcome to Coding Safari Hackathon 2023">
                        </div>
                        
                        <div class="form-group">
                            <label for="heroSubtitle">Hero Subtitle</label>
                            <input type="text" id="heroSubtitle" value="An extraordinary coding expedition through challenging landscapes of algorithms, logic, and innovation">
                        </div>
                        
                        <div class="form-group">
                            <label for="heroImage">Hero Image URL</label>
                            <input type="text" id="heroImage" value="https://images.unsplash.com/photo-1535223289827-42f1e9919769?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                        </div>
                        
                        <button class="btn btn-primary" style="margin-top: 20px;">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                    
                    <!-- <div class="tab-content" id="features">
                        <p>Features content will go here</p>
                    </div>
                    
                    <div class="tab-content" id="prizes">
                        <p>Prizes content will go here</p>
                    </div>
                    
                    <div class="tab-content" id="schedule">
                        <p>Schedule content will go here</p>
                    </div> -->
                </div>
            </div>





            
            <!-- Hackathon Details -->
            <div id="hackathon" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Hackathon <span>Details</span></h2>
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> Save All Changes
                        </button>
                    </div>
                    
                    <div class="quiz-form">
                        <div class="form-group">
                            <label for="hackathonName">Hackathon Name</label>
                            <input type="text" id="hackathonName" value="Coding Safari Hackathon Expedition 2023">
                        </div>
                        
                        <div class="form-group">
                            <label for="hackathonDate">Event Date</label>
                            <input type="date" id="hackathonDate" value="2023-12-15">
                        </div>
                        
                        <div class="form-group">
                            <label for="hackathonVenue">Venue</label>
                            <input type="text" id="hackathonVenue" value="GPK College, Kolhapur">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="hackathonDescription">Event Description</label>
                        <textarea id="hackathonDescription">Coding Safari is an extraordinary hackathon expedition where students embark on a coding journey through challenging landscapes of algorithms, logic, and innovation. Join us for 48 hours of intense coding, collaboration, and competition.</textarea>
                    </div>
                </div>
            </div>
            























            <!-- Settings -->
            <div id="settings" class="tab-content">
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>System <span>Settings</span></h2>
                    </div>
                    
                    <div class="quiz-form">
                        <div class="form-group">
                            <label for="siteTitle">Site Title</label>
                            <input type="text" id="siteTitle" value="Coding Safari Hackathon">
                        </div>
                        
                        <div class="form-group">
                            <label for="adminEmail">Admin Email</label>
                            <input type="email" id="adminEmail" value="admin@codingsafari.in">
                        </div>
                        
                        <div class="form-group">
                            <label for="timezone">Timezone</label>
                            <select id="timezone">
                                <option value="IST" selected>Indian Standard Time (IST)</option>
                                <option value="UTC">UTC</option>
                                <option value="EST">Eastern Time</option>
                            </select>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Settings
                    </button>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p>&copy; 2023 Coding Safari Hackathon Expedition. Admin Dashboard v2.1</p>
                <p style="margin-top: 10px; font-size: 0.9rem; color: var(--gray);">Last login: Today, 10:30 AM | System Status: <span style="color: var(--success);">●</span> Operational</p>
            </div>
        </div>
    </div>





















    
    <!-- Add Category Modal -->
    <div class="modal" id="addCategoryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Category</h3>
                <button class="close-modal" id="closeCategoryModal">&times;</button>
            </div>
            
            <form class="category-form" id="categoryForm">
                <div class="form-group">
                    <label for="categoryName">Category Name *</label>
                    <input type="text" id="categoryName" placeholder="Enter category name" required>
                </div>
                
                <div class="form-group">
                    <label for="categoryDescription">Description</label>
                    <textarea id="categoryDescription" placeholder="Brief description of this category"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Select Icon</label>
                    <div class="icon-selector">
                        <div class="icon-option selected" data-icon="code">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="icon-option" data-icon="js">
                            <i class="fab fa-js"></i>
                        </div>
                        <div class="icon-option" data-icon="python">
                            <i class="fab fa-python"></i>
                        </div>
                        <div class="icon-option" data-icon="database">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="icon-option" data-icon="brain">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="icon-option" data-icon="code-branch">
                            <i class="fas fa-code-branch"></i>
                        </div>
                    </div>
                    <input type="hidden" id="selectedIcon" value="code">
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancelCategoryBtn">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>


</body>
</html>