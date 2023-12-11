<!-- Modal create new User -->
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            @include('Authetication::auth.partials.create_form')
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal update exists User -->
<div class="modal fade" id="modifyUserModal" tabindex="-1" aria-labelledby="modifyUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            @include('Authetication::auth.partials.update_form')
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scripts')
<script>
var modifyUserModal = document.getElementById('modifyUserModal');
modifyUserModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-action')
  var recipientId = button.getAttribute('data-bs-id')
  var recipientName = button.getAttribute('data-bs-name')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = modifyUserModal.querySelector('.modal-title')
  var modalBodyInputId = modifyUserModal.querySelector('.modal-body input[name="id"]')
  var modalBodyInputName = modifyUserModal.querySelector('.modal-body input[name="name"]')
  document.getElementById("modifyUserForm").action = '/' + recipient + '/update';
  modalTitle.textContent = 'Cập nhật tài khoản';
  modalBodyInputId.value = recipientId;
  modalBodyInputName.value = recipientName;
})

var newUserModal = document.getElementById('newUserModal');
newUserModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = newUserModal.querySelector('.modal-title')
  var modalBodyInput = newUserModal.querySelector('.modal-body input')
  document.getElementById("newUserForm").action = '/' + recipient + '/create';
  modalTitle.textContent = 'Tạo mới tài khoản';
  /* modalBodyInput.value = 'Vui lòng nhập tên ' + newUserName; */
})

</script>
@endpush