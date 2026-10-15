<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts::login_layout')] class extends Component
{
    //
};
?>

<div>
    @auth
    @if(!Auth::user()->role)
    <livewire:student-dashboard/>
    @elseif(Auth::user()->role=="admin")
    <livewire:admin.dashboard/>
    @endif
    
    @endauth

</div>