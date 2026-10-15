
<?php

use Livewire\Component;

new class extends Component
{
   
};
?>

<div>
   

    <div class="admin-wrapper d-flex">

        <!-- SIDEBAR: Desktop visible, mobile offcanvas -->
        <aside
            class="offcanvas-lg offcanvas-start admin-sidebar bg-black"
            tabindex="-1"
            id="adminSidebar"
            aria-labelledby="adminSidebarLabel"
            data-bs-scroll="true"
            data-bs-backdrop="true"
        >
            <div class="sidebar-brand d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="text-white fw-bold">🎓 EduManage</h5>
                    <small>School Administration</small>
                </div>

                <button
                    type="button"
                    class="btn-close btn-close-white sidebar-close"
                    data-bs-dismiss="offcanvas"
                    data-bs-target="#adminSidebar"
                    aria-label="Close"
                ></button>
            </div>

            <nav class="sidebar-menu">
                <div class="sidebar-heading">MAIN MENU</div>

                <a href="{{ url('/admin/dashboard') }}" class="sidebar-link active">
                    <span class="menu-icon">▦</span> Dashboard
                </a>

                <a href="{{ url('/admin/students') }}" class="sidebar-link">
                    <span class="menu-icon">♙</span> Students
                </a>

                <a href="{{ url('/admin/admissions') }}" class="sidebar-link">
                    <span class="menu-icon">✚</span> Admissions
                </a>

                <a href="{{ url('/admin/teachers') }}" class="sidebar-link">
                    <span class="menu-icon">♟</span> Teachers & Staff
                </a>

                <div class="sidebar-heading">ACADEMICS</div>

                <a href="{{ url('/classes') }}" class="sidebar-link">
                    <span class="menu-icon">▤</span> Classes & Sections
                </a>

                <a href="{{ url('/admin/subjects') }}" class="sidebar-link">
                    <span class="menu-icon">▧</span> Subjects
                </a>

                <a href="{{ url('/admin/attendance') }}" class="sidebar-link">
                    <span class="menu-icon">✓</span> Attendance
                </a>

                <a href="{{ url('/admin/results') }}" class="sidebar-link">
                    <span class="menu-icon">▥</span> Results & Marksheets
                </a>

                <div class="sidebar-heading">FINANCE</div>

                <a href="{{ url('/admin/fees') }}" class="sidebar-link">
                    <span class="menu-icon">₹</span> Fee Management
                </a>

                <div class="sidebar-heading">MANAGEMENT</div>

                <a href="{{ url('/admin/announcements') }}" class="sidebar-link">
                    <span class="menu-icon">♧</span> Notices
                </a>

                <a href="{{ url('/admin/reports') }}" class="sidebar-link">
                    <span class="menu-icon">▨</span> Reports
                </a>

                <a href="{{ url('/admin/settings') }}" class="sidebar-link">
                    <span class="menu-icon">⚙</span> Settings
                </a>

                <hr class="border-light opacity-25">

                <a href="{{ url('/') }}" class="sidebar-link">
                    <span class="menu-icon">↪</span> Back to Website
                </a>
                <a href="{{url('logout')}}" class="btn btn-sm link bg-danger text-white ms-3">Logout</a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-main">

            <!-- TOPBAR -->
            <header class="topbar d-flex align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <!-- Mobile hamburger -->
                    <button
                        class="btn btn-outline-primary d-lg-none"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#adminSidebar"
                        aria-controls="adminSidebar"
                        aria-label="Open navigation menu"
                    >
                        ☰
                    </button>

                    <div>
                        <h5 class="mb-0 fw-bold">Principal Dashboard</h5>
                        <small class="muted-text">Welcome back, {{Auth::user()->name}}!</small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-light position-relative" type="button" aria-label="Notifications">
                        ♧
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </button>

                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                             style="width:40px;height:40px;">
                            P
                        </div>
                        <div class="d-none d-sm-block">
                            <div class="fw-semibold small">Principal</div>
                            <div class="muted-text">Administrator</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                    <div>
                        <h1 class="page-title mb-1">Dashboard Overview</h1>
                        <p class="muted-text mb-0">Here's what's happening at your school today.</p>
                    </div>

                    <button class="btn btn-primary" type="button">
                        + Add New Student
                    </button>
                </div>

                <!-- STATISTICS -->
                <div class="row g-3 mb-4">

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="muted-text">Total Students</span>
                                <div class="stat-icon bg-primary-subtle text-primary">♙</div>
                            </div>
                            <div class="stat-number">1,000</div>
                            <small class="text-success">↑ Active school strength</small>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="muted-text">Total Teachers</span>
                                <div class="stat-icon bg-success-subtle text-success">♟</div>
                            </div>
                            <div class="stat-number">48</div>
                            <small class="text-success">Teaching staff</small>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="muted-text">Today's Attendance</span>
                                <div class="stat-icon bg-warning-subtle text-warning">✓</div>
                            </div>
                            <div class="stat-number">92.5%</div>
                            <small class="text-success">925 students present</small>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="muted-text">Pending Fees</span>
                                <div class="stat-icon bg-danger-subtle text-danger">₹</div>
                            </div>
                            <div class="stat-number">₹85,000</div>
                            <small class="text-danger">Fee collection required</small>
                        </div>
                    </div>

                </div>

                <!-- CLASSES TABLE + QUICK ACTIONS -->
                <div class="row g-4 mb-4">

                    <div class="col-12 col-xl-8">
                        <div class="section-card">
                            <div class="section-header">
                                <div>
                                    <h6>Class Overview</h6>
                                    <small class="muted-text">Class, room and section details</small>
                                </div>
                                <a href="{{ url('/admin/classes') }}" class="btn btn-sm btn-outline-primary">
                                    View All
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Class</th>
                                            <th>Room No.</th>
                                            <th>Section</th>
                                            <th>Class Teacher</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="class-avatar">1</span>
                                                Class 1
                                            </td>
                                            <td>R-101</td>
                                            <td>A</td>
                                            <td>Mrs. Sharma</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="class-avatar">2</span>
                                                Class 2
                                            </td>
                                            <td>R-102</td>
                                            <td>A</td>
                                            <td>Mr. Verma</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="class-avatar">5</span>
                                                Class 5
                                            </td>
                                            <td>R-205</td>
                                            <td>B</td>
                                            <td>Mrs. Gupta</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="class-avatar">9</span>
                                                Class 9</td>
                                            <td>R-301</td>
                                            <td>A</td>
                                            <td>Mr. Singh</td>
                                            <td><span class="status-badge status-pending">Review</span></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="class-avatar">10</span>
                                                Class 10
                                            </td>
                                            <td>R-302</td>
                                            <td>B</td>
                                            <td>Mrs. Joshi</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="section-card">
                            <div class="section-header">
                                <div>
                                    <h6>Quick Actions</h6>
                                    <small class="muted-text">Common tasks</small>
                                </div>
                            </div>

                            <a href="{{ url('/admin/admissions') }}" class="quick-action">
                                <div class="quick-action-icon bg-primary-subtle text-primary">＋</div>
                                <div>
                                    <div class="fw-semibold small">New Admission</div>
                                    <small class="muted-text">Register a new student</small>
                                </div>
                                <span class="ms-auto">›</span>
                            </a>

                            <a href="{{ url('/admin/attendance') }}" class="quick-action">
                                <div class="quick-action-icon bg-success-subtle text-success">✓</div>
                                <div>
                                    <div class="fw-semibold small">Attendance</div>
                                    <small class="muted-text">View attendance records</small>
                                </div>
                                <span class="ms-auto">›</span>
                            </a>

                            <a href="{{ url('/admin/fees') }}" class="quick-action">
                                <div class="quick-action-icon bg-warning-subtle text-warning">₹</div>
                                <div>
                                    <div class="fw-semibold small">Fee Collection</div>
                                    <small class="muted-text">Manage student fees</small>
                                </div>
                                <span class="ms-auto">›</span>
                            </a>

                            <a href="{{ url('/admin/results') }}" class="quick-action">
                                <div class="quick-action-icon bg-danger-subtle text-danger">▤</div>
                                <div>
                                    <div class="fw-semibold small">Results & Marksheets</div>
                                    <small class="muted-text">Manage examination results</small>
                                </div>
                                <span class="ms-auto">›</span>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- RECENT ADMISSIONS + NOTICE BOARD -->
                <div class="row g-4">

                    <div class="col-12 col-lg-7">
                        <div class="section-card">
                            <div class="section-header">
                                <div>
                                    <h6>Recent Admissions</h6>
                                    <small class="muted-text">Latest student registrations</small>
                                </div>
                                <a href="{{ url('/admin/admissions') }}" class="btn btn-sm btn-outline-primary">
                                    View All
                                </a>
                            </div>

                            <div class="admission-row">
                                <div class="student-avatar">AS</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold small">Aarav Sharma</div>
                                    <small class="muted-text">Class 3 · Admission No. 2026-101</small>
                                </div>
                                <span class="status-badge status-active">Approved</span>
                            </div>

                            <div class="admission-row">
                                <div class="student-avatar">PK</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold small">Priya Kumar</div>
                                    <small class="muted-text">Class 6 · Admission No. 2026-102</small>
                                </div>
                                <span class="status-badge status-pending">Pending</span>
                            </div>

                            <div class="admission-row">
                                <div class="student-avatar">RV</div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold small">Rohan Verma</div>
                                    <small class="muted-text">Class 9 · Admission No. 2026-103</small>
                                </div>
                                <span class="status-badge status-active">Approved</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="section-card">
                            <div class="section-header">
                                <div>
                                    <h6>Notice Board</h6>
                                    <small class="muted-text">School announcements</small>
                                </div>
                                <a href="{{ url('/admin/announcements') }}" class="btn btn-sm btn-outline-primary">
                                    Manage
                                </a>
                            </div>

                            <div class="p-3">
                                <div class="p-3 mb-3 rounded-3 bg-primary-subtle">
                                    <div class="fw-semibold small text-primary">Parent-Teacher Meeting</div>
                                    <small class="text-secondary">Scheduled for this Saturday.</small>
                                </div>

                                <div class="p-3 mb-3 rounded-3 bg-warning-subtle">
                                    <div class="fw-semibold small text-warning-emphasis">Fee Payment Reminder</div>
                                    <small class="text-secondary">Please review outstanding fee balances.</small>
                                </div>

                                <div class="p-3 rounded-3 bg-success-subtle">
                                    <div class="fw-semibold small text-success">Examination Schedule</div>
                                    <small class="text-secondary">Review the upcoming exam timetable.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <footer class="text-center muted-text py-4">
                    © 2026 EduManage School Management System
                </footer>

            </div>
        </main>
    </div>
</div>
 <style>
        .admin-wrapper {
            min-height: 100vh;
            background: #eaedf1;
        }

        .sidebar-brand {
            padding: 24px 22px;
            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        /* .sidebar-brand h5 {
            margin: 0;
            font-weight: 700;
            color:white;
        } */

        .sidebar-brand small {
            color: #bfdbfe;
        }

        .sidebar-menu {
            padding: 20px 12px;
        }

        .sidebar-heading {
            color: #93a4c5;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 14px 12px 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 5px;
            color: #dbeafe;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            transition: .2s;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            color: #fff;
            background: #2563eb;
        }

        .sidebar-link .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .admin-main {
            min-width: 0;
            flex: 1 1 auto;
        }

        .topbar {
            min-height: 76px;
            background: #fff;
            border-bottom: 1px solid #e8edf5;
            padding: 14px 28px;
        }

        .page-content {
            padding: 28px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
            color: #172033;
        }

        .muted-text {
            color: #7b8498;
            font-size: 13px;
        }

        .dashboard-card {
            background: #fff;
            border: 1px solid #edf0f6;
            border-radius: 14px;
            padding: 22px;
            height: 100%;
            box-shadow: 0 3px 12px rgba(20, 40, 80, .025);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 22px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 750;
            color: #172033;
            margin: 14px 0 4px;
        }

        .section-card {
            background: #fff;
            border: 1px solid #edf0f6;
            border-radius: 14px;
            overflow: hidden;
            height: 100%;
        }

        .section-header {
            padding: 20px 22px;
            border-bottom: 1px solid #edf0f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .section-header h6 {
            margin: 0;
            font-weight: 700;
            color: #172033;
        }

        .table thead th {
            background: #f8faff;
            color: #707b90;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
            padding: 15px 18px;
            border-bottom: 1px solid #edf0f6;
        }

        .table tbody td {
            padding: 15px 18px;
            vertical-align: middle;
            color: #354158;
            font-size: 13px;
            white-space: nowrap;
        }

        .table tbody tr:last-child td {
            border-bottom: 0;
        }

        .class-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #eaf1ff;
            color: #2457cf;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 10px;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-active {
            color: #15803d;
            background: #dcfce7;
        }

        .status-pending {
            color: #b45309;
            background: #fef3c7;
        }

        .quick-action {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 20px;
            text-decoration: none;
            color: #253149;
            border-bottom: 1px solid #f0f2f7;
        }

        .quick-action:last-child {
            border-bottom: 0;
        }

        .quick-action:hover {
            background: #f8faff;
        }

        .quick-action-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            font-size: 19px;
        }

        .admission-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            border-bottom: 1px solid #f0f2f7;
        }

        .admission-row:last-child {
            border-bottom: 0;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            flex: 0 0 40px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #374151;
        }

        @media (min-width: 992px) {
            .admin-sidebar {
                position: sticky;
                top: 0;
                height: 100vh;
                overflow-y: auto;
                visibility: visible !important;
                transform: none !important;
                /* width: 70px !important; */
                /* flex: 0 0 70px; */
            }

            .sidebar-close {
                display: none;
            }
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                position: fixed;
                height: 100vh;
                overflow-y: auto;
            }

            .topbar {
                padding: 14px 18px;
            }

            .page-content {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 22px;
            }
        }

        @media (max-width: 575.98px) {
            .topbar {
                padding: 12px;
            }

            .page-content {
                padding: 16px 12px;
            }

            .dashboard-card {
                padding: 17px;
            }

            .stat-number {
                font-size: 24px;
            }

            .section-header {
                padding: 16px;
            }
        }
    </style>