<div class="quick-create">
	<span id="quick-link" class="button dropdown-toggle" onclick="toggleQuickLink(this)"><i class="icon plus-white-icon"></i> </span>
	<div id="quick-link-container" class="dropdown-list bottom-right">
		<div class="quick-link-container">
			{{ $slot }}
		</div>
	</div>
</div>

@push('scripts')
<script>
function toggleQuickLink(e) {
    e.classList.toggle('active')
    document.getElementById("quick-link-container").classList.toggle('d-block')
}
</script>
@endpush