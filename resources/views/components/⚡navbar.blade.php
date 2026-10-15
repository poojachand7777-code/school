<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" >
    <div class="container">

        {{-- School Logo / Brand --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{url('/')}}" wire:navigate>
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                 style="width: 45px; height: 45px;">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>
                <div class="fw-bold text-primary">ABC SCHOOL</div>
                <small class="text-muted">Excellence in Education</small>
            </div>
        </a>

        {{-- Mobile Toggle --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#schoolNavbar"
            aria-controls="schoolNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar Menu --}}
        <div class="collapse navbar-collapse" id="schoolNavbar">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="" wire:navigate>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" wire:navigate>
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" wire:navigate>
                        Academics
                    </a>
                </li>

                {{-- School Life Dropdown --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href=""
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        School Life
                    </a>

                    <ul class="dropdown-menu border-0 shadow-sm">

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Events
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Gallery
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Activities
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Achievements
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Admissions Dropdown --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href=""
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Admissions
                    </a>

                    <ul class="dropdown-menu border-0 shadow-sm">

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Admission Process
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Fee Structure
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="" wire:navigate>
                                Apply Online
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" wire:navigate>
                        Contact
                    </a>
                </li>

            </ul>

            {{-- Right Side --}}
            <div class="d-flex align-items-center gap-2">


                @auth
                <div class="row">
                   @if(!Auth::user()->role)

                    <a href="{{url('/dashboard')}}" class="link link-underline link-underline-opacity-0 fw-bold fs-3" wire:navigate>
                       {{Auth::user()->name}}
                    </a>
                    @else
                    <span class="fw-bold text-primary">{{Auth::user()->role}}</span>
                    <a href="{{url('/dashboard')}}" class="link link-underline link-underline-opacity-0 fw-bold fs-6 link-secondary" wire:navigate>
                       {{Auth::user()->name}}
                    </a>
                    @endif
                 </div>
                     

                
                @else
                    <!-- <a href="{{url('/loginRegister')}}" class="btn btn-outline-primary btn-sm px-3" wire:navigate>
                        Login/Register
                    </a> -->

                    <a href="{{url('/loginRegister')}}" class="btn btn-primary btn-sm px-3" wire:navigate>
                        Apply Now
                    </a>
                @endauth

                


            </div>

        </div>
    </div>
</nav>


</div>