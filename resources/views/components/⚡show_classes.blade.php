<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>


<div>

<div class="container-fluid p-3 p-md-4 p-lg-5">

    <div class="table-card">

        <!-- Table Header -->
        <div class="table-header">
            <div class="d-flex justify-content-between align-items-center
                        flex-wrap gap-3">

                <div>
                    <h4 class="table-title">
                        <i class="bi bi-building me-2 text-primary"></i>
                        Class Management
                    </h4>
                    <p class="table-subtitle">
                        Manage classes, room assignments, sections and status.
                    </p>
                </div>

                @auth
                @if(Auth::user()->role=="admin")
                <div class="d-flex flex-wrap gap-2">
                    <div class="input-group search-box">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search text-secondary"></i>
                        </span>
                        <input type="search"
                               class="form-control"
                               placeholder="Search classes...">
                    </div>

                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Class
                    </button>
                </div>
                @endif
                @endauth

            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table class-table">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Room No.</th>
                        <th>Section</th>
                        @if(Auth::user()->role=="admin")
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <span class="class-icon">
                                <i class="bi bi-mortarboard"></i>
                            </span>
                            <span class="class-name">Class 1</span>
                        </td>
                        <td><span class="room-badge">R-101</span></td>
                        <td><span class="section-badge">A</span></td>

                         @auth
                            @if(Auth::user()->role=="admin")
                                <td>
                                    <span class="status-badge status-active">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Active
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button class="action-btn" title="View">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="action-btn" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="action-btn" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            @endif
                        @endauth
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="table-footer">
            <small>Showing 1 to 5 of 24 classes</small>

            <nav aria-label="Class table pages">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>



</div>

    <style>
        body {
            background: #f4f7fc;
            font-family: "Segoe UI", sans-serif;
        }

        .table-card {
            background: #fff;
            border: 1px solid #e5eaf2;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(25, 50, 90, 0.05);
            overflow: hidden;
        }

        .table-header {
            padding: 22px 24px;
            border-bottom: 1px solid #edf0f5;
        }

        .table-title {
            font-size: 21px;
            font-weight: 700;
            color: #172b4d;
            margin-bottom: 5px;
        }

        .table-subtitle {
            font-size: 13px;
            color: #78869c;
            margin-bottom: 0;
        }

        .search-box {
            max-width: 260px;
        }

        .search-box .form-control {
            border-radius: 8px;
            font-size: 13px;
            padding: 10px 12px;
        }

        .class-table {
            margin-bottom: 0;
            white-space: nowrap;
        }

        .class-table thead th {
            background: #f7f9fd;
            color: #52627b;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 16px 24px;
            border-bottom: 1px solid #e8edf5;
        }

        .class-table tbody td {
            padding: 17px 24px;
            font-size: 14px;
            color: #344563;
            border-bottom: 1px solid #edf0f5;
            vertical-align: middle;
        }

        .class-table tbody tr:last-child td {
            border-bottom: none;
        }

        .class-table tbody tr:hover {
            background: #f8faff;
        }

        .class-name {
            font-weight: 650;
            color: #1e355b;
        }

        .class-icon {
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #eaf1ff;
            color: #356fe0;
            font-size: 18px;
            margin-right: 12px;
        }

        .room-badge {
            display: inline-block;
            padding: 6px 11px;
            background: #f0f4fa;
            color: #435875;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: #eee8ff;
            color: #7044c5;
            border-radius: 8px;
            font-weight: 700;
            font-size: 12px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background: #e0f7eb;
            color: #138653;
        }

        .status-inactive {
            background: #ffe8e8;
            color: #d14343;
        }

        .status-maintenance {
            background: #fff1d6;
            color: #a86a00;
        }

        .action-btn {
            width: 33px;
            height: 33px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #e4eaf3;
            border-radius: 8px;
            color: #536781;
            background: #fff;
            margin-right: 4px;
        }

        .action-btn:hover {
            color: #2869db;
            background: #eef4ff;
        }

        .table-footer {
            padding: 17px 24px;
            border-top: 1px solid #edf0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .table-footer small {
            color: #78869c;
        }

        .pagination .page-link {
            border-radius: 7px;
            margin: 0 3px;
            color: #405675;
            border: 1px solid #e4eaf3;
            font-size: 13px;
        }

        .pagination .active .page-link {
            background: #2869db;
            border-color: #2869db;
            color: #fff;
        }

        @media (max-width: 576px) {
            .table-header {
                padding: 18px;
            }

            .table-header .d-flex {
                align-items: stretch !important;
            }

            .search-box {
                max-width: 100%;
            }

            .table-card .table-header > .d-flex {
                flex-direction: column;
            }

            .class-table thead th,
            .class-table tbody td {
                padding: 13px 16px;
            }

            .table-footer {
                padding: 15px;
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>