<?php

use Livewire\Component;
use Carbon\Carbon;

new class extends Component
{
    //
    public $hours, $greeting;

    public function mount(){
        $this->hours = Carbon::now()->hour;
        // $this->date = Carbon::now()->format('F-d-y');

        if($this->hours < 13){
            $this->greeting = "Good Morning";
        }

        elseif($this->hours<17){
            $this->greeting = "Good Afternoon";
        }
        else{
        $this->greeting = "Good Evening";
        }
    }
};
?>

<div>
     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | EduSmart</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        :root {
            --primary: #17365e;
            --secondary: #2563eb;
            --page-bg: #f4f7fc;
            --text-muted: #748198;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--page-bg);
            color: #24344d;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--primary);
            color: #fff;
            padding: 25px 17px;
            flex-shrink: 0;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .brand span {
            color: #60a5fa;
        }

        .school-label {
            font-size: 10px;
            letter-spacing: 1.5px;
            color: #aebfd4;
            margin: 5px 0 30px;
        }

        .menu-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            color: #91a6c1;
            margin: 20px 12px 12px;
        }

        .sidebar .nav-link {
            padding: 12px 14px;
            border-radius: 9px;
            color: #d4dfef;
            font-size: 13px;
            margin-bottom: 5px;
            transition: .2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #294c78;
            color: white;
        }

        .sidebar .nav-link.active {
            border-left: 3px solid #60a5fa;
        }

        /* Main layout */
        .main-content {
            min-width: 0;
            flex: 1;
        }

        .topbar {
            min-height: 76px;
            background: #fff;
            border-bottom: 1px solid #e7edf5;
        }

        .search-box {
            max-width: 280px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            font-size: 13px;
            padding: 10px 14px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }

        .content-area {
            padding: 30px;
            max-width: 1650px;
            margin: auto;
        }

        .page-title {
            font-weight: 750;
            color: var(--primary);
        }

        .muted {
            color: var(--text-muted);
        }

        /* Welcome banner */
        .welcome-card {
            border-radius: 18px;
            background: linear-gradient(115deg, #17365e, #2563a9);
            color: white;
            overflow: hidden;
        }

        .welcome-card .subtitle {
            color: #d3e3f7;
            font-size: 14px;
            line-height: 1.8;
        }

        .welcome-card .student-tag {
            display: inline-block;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 8px;
            padding: 8px 12px;
            margin: 5px 5px 0 0;
            font-size: 12px;
        }

        .welcome-emoji {
            font-size: 85px;
        }

        /* Cards */
        .dashboard-card {
            height: 100%;
            background: white;
            border: 1px solid #e8edf5;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(15,23,42,.025);
        }

        .stat-card {
            padding: 21px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .icon-blue {
            background: #e7f0ff;
            color: #2563eb;
        }

        .icon-green {
            background: #dcfce7;
            color: #15803d;
        }

        .icon-purple {
            background: #f0e7ff;
            color: #7c3aed;
        }

        .icon-orange {
            background: #ffedd5;
            color: #c2410c;
        }

        .stat-value {
            color: var(--primary);
            font-size: 29px;
            font-weight: 750;
            margin: 9px 0;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 13px;
        }

        .progress {
            height: 6px;
            background: #edf2f7;
            border-radius: 10px;
        }

        .progress-bar {
            border-radius: 10px;
        }

        /* Panel headings */
        .panel-heading {
            padding: 20px 22px;
            border-bottom: 1px solid #edf1f7;
        }

        .panel-heading h5 {
            font-size: 16px;
            font-weight: 700;
            color: var(--primary);
            margin: 0;
        }

        .view-link {
            font-size: 12px;
            font-weight: 600;
            color: var(--secondary);
        }

        /* Timetable */
        .table {
            margin: 0;
        }

        .table thead th {
            background: #f8fafc;
            color: #748198;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: .5px;
            white-space: nowrap;
        }

        .table > :not(caption) > * > * {
            padding: 15px 17px;
            vertical-align: middle;
        }

        .table tbody td {
            font-size: 12px;
        }

        .subject-name {
            font-weight: 650;
            color: #263b55;
        }

        .subject-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #3b82f6;
            margin-right: 7px;
        }

        /* Assignment items */
        .assignment-item {
            display: flex;
            gap: 13px;
            padding: 17px 0;
            border-bottom: 1px solid #edf1f7;
        }

        .assignment-item:last-child {
            border-bottom: 0;
        }

        .assignment-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            background: #e7f0ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .assignment-title {
            font-size: 13px;
            font-weight: 650;
            color: #263b55;
        }

        .assignment-info {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.8;
        }

        /* Announcements */
        .announcement {
            background: #f1f6ff;
            border-left: 4px solid #3b82f6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .announcement h6 {
            font-size: 13px;
            font-weight: 700;
        }

        .announcement p {
            font-size: 12px;
            line-height: 1.7;
            color: #64748b;
            margin-bottom: 8px;
        }

        .announcement small {
            font-size: 10px;
            color: #2563eb;
        }

        /* Responsive */
        @media (max-width: 1199px) {
            .sidebar {
                width: 220px;
            }

            .content-area {
                padding: 23px;
            }
        }

        @media (max-width: 991px) {
            .dashboard-layout {
                display: block !important;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
                padding: 16px;
            }

            .school-label {
                margin-bottom: 14px;
            }

            .menu-label {
                display: none;
            }

            .sidebar .nav {
                flex-direction: row;
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .sidebar .nav-link {
                white-space: nowrap;
                margin-right: 5px;
            }

            .welcome-emoji {
                font-size: 60px;
            }
        }

        @media (max-width: 575px) {
            .content-area {
                padding: 17px 12px;
            }

            .welcome-card {
                padding: 22px !important;
            }

            .welcome-card h2 {
                font-size: 22px;
            }

            .welcome-emoji {
                display: none;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-value {
                font-size: 24px;
            }

            .stat-icon {
                width: 37px;
                height: 37px;
            }

            .topbar {
                padding: 13px !important;
            }

            .search-box {
                max-width: 155px;
            }

            .panel-heading {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-layout d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">Edu<span>Smart</span></div>
        <div class="school-label">SCHOOL MANAGEMENT PORTAL</div>

        <div class="menu-label">Main Menu</div>

        <nav class="nav flex-column">
            <a class="nav-link active" href="{{url('/dashboard')}}">▦ &nbsp; Dashboard</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">▤ &nbsp; My Timetable</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">✎ &nbsp; Assignments</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">▥ &nbsp; Results & Marks</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">◷ &nbsp; Attendance</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">₹ &nbsp; Fee Details</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">♧ &nbsp; Announcements</a>
            <a class="nav-link" href="{{url('/dashboard')}}"">⚙ &nbsp; My Profile</a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content" id="dashboard">

        <!-- TOPBAR -->
        <header class="topbar px-3 px-lg-4 py-3">
            <div class="d-flex justify-content-between align-items-center gap-3">

                <div>
                    <h6 class="fw-bold mb-1">Student Portal</h6>
                    <small class="muted">Academic Year 2026–27</small>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <input type="search" class="form-control search-box d-none d-sm-block"
                           placeholder="Search dashboard...">

                    <a href="#announcements" class="fs-5 text-dark"
                       aria-label="Notifications">♧</a>

                    <div class="avatar">{{Str::substr(Auth::user()->name,0,1)}}</div>

                    <div class="d-none d-md-block">
                        <div class="fw-semibold small">{{Auth::user()->name}}</div>
                        <small class="muted">{{Auth::user()->role}}</small>
                    </div>
                </div>

            </div>
        </header>

        <div class="content-area">

            <!-- PAGE TITLE -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h2 class="page-title h3 mb-2">Student Dashboard</h2>
                    <p class="muted small mb-0">
                        Welcome back! Here's your academic overview.
                    </p>
                </div>

                <span class="badge bg-white text-secondary border p-3">
                    📅 &nbsp; Academic Year 2026–27
                </span>
            </div>

            <!-- WELCOME BANNER -->
            <section class="welcome-card p-4 p-lg-5 mb-4">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="small text-white-50 mb-2">YOUR LEARNING SPACE</div>

                        <h2 class="fw-bold mb-2">{{ $greeting}},{{Auth::user()->name}}! 👋</h2>

                        <p class="subtitle mb-3">
                            Keep learning, keep growing.<br>
                            Here's what's happening with your studies today.
                        </p>

                        <div>
                            <span class="student-tag">Class: 10-A</span>
                            <span class="student-tag">Roll No: 15</span>
                            <span class="student-tag">Admission No: STU-001</span>
                            <span class="student-tag">Class Teacher: Mrs. Sharma</span>
                        </div>
                    </div>

                    <div class="col-lg-3 text-center d-none d-lg-block">
                        <div class="welcome-emoji">🎓</div>
                    </div>
                </div>
            </section>

            <!-- STATISTICS -->
            <section class="row g-3 g-xl-4 mb-4">

                <div class="col-6 col-xl-3" id="attendance">
                    <div class="dashboard-card stat-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stat-icon icon-blue">◷</div>
                            <span class="stat-label">Attendance</span>
                        </div>
                        <div class="stat-value">94%</div>
                        <div class="stat-label">Excellent attendance</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-primary" style="width:94%"></div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-xl-3" id="results">
                    <div class="dashboard-card stat-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stat-icon icon-green">▥</div>
                            <span class="stat-label">Average Marks</span>
                        </div>
                        <div class="stat-value">87.5%</div>
                        <div class="stat-label">Grade A performance</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-success" style="width:87.5%"></div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-xl-3" id="assignments">
                    <div class="dashboard-card stat-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stat-icon icon-purple">✎</div>
                            <span class="stat-label">Assignments</span>
                        </div>
                        <div class="stat-value">04</div>
                        <div class="stat-label">Pending tasks</div>
                        <span class="badge bg-warning-subtle text-warning-emphasis mt-3">
                            Needs attention
                        </span>
                    </div>
                </div>

                <div class="col-6 col-xl-3" id="fees">
                    <div class="dashboard-card stat-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="stat-icon icon-orange">₹</div>
                            <span class="stat-label">Fees Due</span>
                        </div>
                        <div class="stat-value" style="font-size:clamp(21px,2vw,29px)">
                            ₹2,500
                        </div>
                        <div class="stat-label">Outstanding balance</div>
                        <span class="badge bg-danger-subtle text-danger mt-3">
                            Payment pending
                        </span>
                    </div>
                </div>

            </section>

            <!-- TIMETABLE AND ASSIGNMENTS -->
            <section class="row g-4 mb-4">

                <!-- TIMETABLE -->
                <div class="col-12 col-xl-7" id="timetable">
                    <div class="dashboard-card">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h5>📚 Today's Timetable</h5>
                            <a href="#timetable" class="view-link">View All →</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>08:30 AM</td>
                                        <td class="subject-name">
                                            <span class="subject-dot"></span>Mathematics
                                        </td>
                                        <td>Mr. Sharma</td>
                                        <td>101</td>
                                    </tr>
                                    <tr>
                                        <td>09:30 AM</td>
                                        <td class="subject-name">
                                            <span class="subject-dot bg-success"></span>Science
                                        </td>
                                        <td>Mrs. Verma</td>
                                        <td>Lab 2</td>
                                    </tr>
                                    <tr>
                                        <td>10:30 AM</td>
                                        <td class="subject-name">
                                            <span class="subject-dot bg-purple"
                                                  style="background:#a855f7"></span>English
                                        </td>
                                        <td>Ms. Singh</td>
                                        <td>102</td>
                                    </tr>
                                    <tr>
                                        <td>11:30 AM</td>
                                        <td class="subject-name">
                                            <span class="subject-dot"
                                                  style="background:#f97316"></span>Computer
                                        </td>
                                        <td>Mr. Kumar</td>
                                        <td>Lab 1</td>
                                    </tr>
                                    <tr>
                                        <td>12:30 PM</td>
                                        <td class="subject-name">
                                            <span class="subject-dot"
                                                  style="background:#ec4899"></span>Hindi
                                        </td>
                                        <td>Mrs. Gupta</td>
                                        <td>103</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ASSIGNMENTS -->
                <div class="col-12 col-xl-5">
                    <div class="dashboard-card">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h5>📝 Recent Assignments</h5>
                            <a href="#assignments" class="view-link">View All →</a>
                        </div>

                        <div class="px-3 px-lg-4">

                            <div class="assignment-item">
                                <div class="assignment-icon">📐</div>
                                <div class="flex-grow-1">
                                    <div class="assignment-title">Mathematics Homework</div>
                                    <div class="assignment-info">
                                        Chapter 5 · Exercises<br>
                                        Due: 15 October 2026
                                    </div>
                                    <span class="badge bg-danger-subtle text-danger mt-2">
                                        Pending
                                    </span>
                                </div>
                            </div>

                            <div class="assignment-item">
                                <div class="assignment-icon">🧪</div>
                                <div class="flex-grow-1">
                                    <div class="assignment-title">Science Project</div>
                                    <div class="assignment-info">
                                        Topic: Our Environment<br>
                                        Due: 17 October 2026
                                    </div>
                                    <span class="badge bg-warning-subtle text-warning-emphasis mt-2">
                                        In Progress
                                    </span>
                                </div>
                            </div>

                            <div class="assignment-item">
                                <div class="assignment-icon">📖</div>
                                <div class="flex-grow-1">
                                    <div class="assignment-title">English Essay</div>
                                    <div class="assignment-info">
                                        Importance of Education<br>
                                        Due: 19 October 2026
                                    </div>
                                    <span class="badge bg-success-subtle text-success mt-2">
                                        Submitted
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

            <!-- FEES AND ANNOUNCEMENTS -->
            <section class="row g-4 mb-4">

                <!-- FEE OVERVIEW -->
                <div class="col-12 col-lg-6">
                    <div class="dashboard-card">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h5>💳 Fee Overview</h5>
                            <a href="{{url('/fees')}}" class="view-link">Fee Details →</a>
                        </div>

                        <div class="p-3 p-lg-4">
                            <div class="d-flex justify-content-between mb-4">
                                <span class="muted small">Total Annual Fee</span>
                                <strong>₹45,000</strong>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <span class="muted small">Amount Paid</span>
                                <strong class="text-success">₹42,500</strong>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <span class="muted small">Payment Status</span>
                                <span class="badge bg-warning-subtle text-warning-emphasis">
                                    Partially Paid
                                </span>
                            </div>

                            <div class="p-3 rounded-3 bg-warning-subtle d-flex justify-content-between align-items-center">
                                <span class="small text-warning-emphasis">
                                    Outstanding Balance
                                </span>
                                <strong class="fs-5 text-danger">₹2,500</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ANNOUNCEMENTS -->
                <div class="col-12 col-lg-6" id="announcements">
                    <div class="dashboard-card">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h5>📢 School Announcements</h5>
                            <a href="#announcements" class="view-link">View All →</a>
                        </div>

                        <div class="p-3 p-lg-4">
                            <div class="announcement">
                                <h6>🏆 Annual Sports Day</h6>
                                <p>
                                    Submit your participation form to your
                                    class teacher before the deadline.
                                </p>
                                <small>School Administration · 12 Oct 2026</small>
                            </div>

                            <div class="announcement">
                                <h6>📋 Unit Test Schedule</h6>
                                <p>
                                    Check the examination department updates
                                    for the upcoming unit tests.
                                </p>
                                <small>Examination Department · 10 Oct 2026</small>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- FOOTER -->
            <footer class="text-center muted small py-3">
                © 2026 EduSmart School Management System. All rights reserved.
            </footer>

        </div>
    </main>

</div>

</body>
</html>

</div>