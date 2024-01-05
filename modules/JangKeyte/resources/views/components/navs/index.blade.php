<div class="navbar-top">
	<div class="navbar-top-left">
		<x-jangkeyte::navs.brand-logo />		
	</div>
	<div class="navbar-top-right">
		<x-jangkeyte::navs.quick-create>
			{{ $slot }}
		</x-jangkeyte::navs.quick-create>
		
		<x-jangkeyte::navs.profile-info />
	</div>
</div>