<div id="navbar-left" class="navbar-left">
	<ul class="menubar">
        {{ $slot }}
	</ul>
	<div id="menubar-bottom" class="menubar-bottom" onclick="toggleMenu()" ><span class="icon menu-fold-icon"></span></div>
</div>

@push('scripts')
<script>
function toggleMenu() {
    const navbar = document.getElementById("navbar-left");
    if(navbar.classList.contains("open")){
        navbar.classList.remove("open")
        document.getElementById("content-container").style.padding = '0px 0px 0px 40px'
    } else {
        navbar.classList.add("open")
        document.getElementById("content-container").style.padding = '0px 0px 0px 160px'
    }
}
</script>
@endpush
