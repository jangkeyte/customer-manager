<div class="profile-info">
	<div class="dropdown-toggle" onclick="toggleUserLink(this)">
		<div class="avatar"><span class="icon avatar-icon"></span></div>
		<i class="icon ellipsis-icon"></i>
	</div>
	<div id="user-link-container" class="dropdown-list bottom-right"><span class="app-version">Phiên bản : v1.2.4</span>
		<div class="dropdown-container">
			<ul>
				<li><a href="{{ route('user.detail', auth()->user()->id ?? 1) }}">Tài khoản của tôi</a></li>
				<li>
        			{{ html()->form('GET')->route('user.logout')->id('adminLogout')->open() }}
						<input type="hidden" name="_method" value="DELETE">
        			{{ html()->form()->close() }}
					<a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('adminLogout').submit();">{{ __('Đăng xuất') }}</a>
				</li>
			</ul>
		</div>
	</div>
</div>

@push('scripts')
<script>
function toggleUserLink(e) {
    e.classList.toggle('active')
    document.getElementById("user-link-container").classList.toggle('d-block')
}
</script>
@endpush