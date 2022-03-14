<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img">
        {{-- <img src="https://i.imgur.com/hczKIze.jpg" alt="">  --}}
        <i class='bx bx-user-circle h1' title="{{ auth()->user()->username }}" style="color: var(--first-color);"></i>
    </div>
</header>