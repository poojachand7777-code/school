
<?php

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

new class extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $search = '';

    public $classId = null;
    public $class_name = '';
    public $room_no = '';
    public $section = 'A';
    public $status = 'active';

    public $showForm = false;

    private function ensureAdmin(): void
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403
        );
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function getClassesProperty()
    {
        $query = DB::table('classes');

        if (trim($this->search) !== '') {
            $search = trim($this->search);

            $query->where(function ($q) use ($search) {
                $q->where('class_name', 'like', "%{$search}%")
                    ->orWhere('room_no', 'like', "%{$search}%")
                    ->orWhere('section', 'like', "%{$search}%");
            });
        }

        return $query
            ->orderBy('class_name')
            ->paginate(10);
    }

    public function createClass(): void
    {
        $this->ensureAdmin();

        $this->resetValidation();

        $this->classId = null;
        $this->class_name = '';
        $this->room_no = '';
        $this->section = 'A';
        $this->status = 'active';

        $this->showForm = true;
    }

    public function editClass(int $id): void
    {
        $this->ensureAdmin();

        $class = DB::table('classes')->where('id', $id)->first();

        abort_if(!$class, 404);

        $this->resetValidation();

        $this->classId = $class->id;
        $this->class_name = $class->class_name;
        $this->room_no = $class->room_no;
        $this->section = $class->section;
        $this->status = $class->status;

        $this->showForm = true;
    }

    public function saveClass(): void
    {
        $this->ensureAdmin();

        $validated = Validator::make(
            [
                'class_name' => $this->class_name,
                'room_no' => $this->room_no,
                'section' => $this->section,
                'status' => $this->status,
            ],
            [
                'class_name' => ['required', 'string', 'max:100'],
                'room_no' => ['required', 'string', 'max:50'],
                'section' => ['required', 'string', 'max:10'],
                'status' => ['required', Rule::in(['active', 'inactive'])],
            ]
        )->validate();

        if ($this->classId) {
            DB::table('classes')
                ->where('id', $this->classId)
                ->update([
                    ...$validated,
                    'updated_at' => now(),
                ]);

            session()->flash('message', 'Class updated successfully.');
        } else {
            DB::table('classes')->insert([
                ...$validated,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            session()->flash('message', 'Class added successfully.');
        }

        $this->showForm = false;
        $this->resetPage();
    }

    public function deleteClass(int $id): void
    {
        $this->ensureAdmin();

        $exists = DB::table('classes')->where('id', $id)->exists();

        abort_unless($exists, 404);

        DB::table('classes')->where('id', $id)->delete();

        session()->flash('message', 'Class deleted successfully.');

        $this->resetPage();
    }

    public function cancelForm(): void
    {
        $this->showForm = false;
        $this->resetValidation();
    }
};
?>

<div>
    <div class="container-fluid p-3 p-md-4">

        <div class="table-card">

            <!-- Header -->
            <div class="table-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h4 class="table-title">
                            <i class="bi bi-building me-2 text-primary"></i>
                            Class Management
                        </h4>
                        <p class="table-subtitle">
                            Manage classes, rooms, sections and status.
                        </p>
                    </div>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="d-flex flex-wrap gap-2">
                                <input
                                    type="search"
                                    class="form-control search-box"
                                    placeholder="Search classes..."
                                    wire:model.live.debounce.300ms="search"
                                >

                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    wire:click="createClass"
                                >
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Add Class
                                </button>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Flash message -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Add / Edit form -->
            @auth
                @if(auth()->user()->role === 'admin' && $showForm)
                    <div class="p-3 p-md-4 border-bottom bg-light">
                        <h5 class="mb-3">
                            {{ $classId ? 'Edit Class' : 'Add New Class' }}
                        </h5>

                        <form wire:submit="saveClass">
                            <div class="row g-3">

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Class Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="class_name"
                                        placeholder="e.g. Class 1"
                                    >
                                    @error('class_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Room Number</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="room_no"
                                        placeholder="e.g. R-101"
                                    >
                                    @error('room_no')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Section</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="section"
                                        placeholder="e.g. A"
                                    >
                                    @error('section')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" wire:model="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex gap-2">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        wire:loading.attr="disabled"
                                        wire:target="saveClass"
                                    >
                                        <span wire:loading.remove wire:target="saveClass">
                                            {{ $classId ? 'Update Class' : 'Save Class' }}
                                        </span>
                                        <span wire:loading wire:target="saveClass">
                                            Saving...
                                        </span>
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        wire:click="cancelForm"
                                    >
                                        Cancel
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                @endif
            @endauth

            <!-- Classes table -->
            <div class="table-responsive">
                <table class="table class-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Room No.</th>
                            <th>Section</th>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                @endif
                            @endauth
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($this->classes as $class)
                            <tr wire:key="class-{{ $class->id }}">
                                <td>
                                    <span class="class-icon">
                                        <i class="bi bi-mortarboard"></i>
                                    </span>
                                    <span class="class-name">
                                        {{ $class->class_name }}
                                    </span>
                                </td>

                                <td>
                                    <span class="room-badge">
                                        {{ $class->room_no }}
                                    </span>
                                </td>

                                <td>
                                    <span class="section-badge">
                                        {{ $class->section }}
                                    </span>
                                </td>

                                @auth
                                    @if(auth()->user()->role === 'admin')
                                        <td>
                                            @if($class->status === 'active')
                                                <span class="status-badge status-active">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Active
                                                </span>
                                            @else
                                                <span class="status-badge status-inactive">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-end">
                                            <button
                                                type="button"
                                                class="action-btn"
                                                title="Edit"
                                                wire:click="editClass({{ $class->id }})"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button
                                                type="button"
                                                class="action-btn text-danger"
                                                title="Delete"
                                                wire:click="deleteClass({{ $class->id }})"
                                                wire:confirm="Are you sure you want to delete this class?"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    @endif
                                @endauth
                            </tr>
                        @empty
                            <tr>
                                <td
                                    colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? 5 : 3 }}"
                                    class="text-center py-5 text-secondary"
                                >
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    No classes found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="table-footer">
                <small class="text-secondary">
                    Showing {{ $this->classes->firstItem() ?? 0 }}
                    to {{ $this->classes->lastItem() ?? 0 }}
                    of {{ $this->classes->total() }} classes
                </small>

                {{ $this->classes->links() }}
            </div>

        </div>
    </div>

    <style>
        .table-card {
            background: #fff;
            border: 1px solid #e5eaf2;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(25, 50, 90, .05);
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
            width: 260px;
        }

        .class-table {
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
        }

        .class-table tbody td {
            padding: 17px 24px;
            font-size: 14px;
            color: #344563;
            border-bottom: 1px solid #edf0f5;
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
            min-width: 32px;
            height: 32px;
            padding: 0 8px;
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

        .action-btn {
            width: 34px;
            height: 34px;
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
            flex-wrap: wrap;
            gap: 12px;
        }

        @media (max-width: 576px) {
            .table-header {
                padding: 18px;
            }

            .search-box {
                width: 100%;
            }

            .table-header > .d-flex {
                align-items: stretch !important;
            }

            .class-table thead th,
            .class-table tbody td {
                padding: 13px 16px;
            }

            .table-footer {
                padding: 15px;
            }
        }
    </style>
</div>
