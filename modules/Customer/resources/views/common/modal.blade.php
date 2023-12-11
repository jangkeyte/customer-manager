@isset($target)
<!-- Modal create new Object -->
<div class="modal fade" id="newObjectModal" tabindex="-1" aria-labelledby="newObjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            @include('TreeManager::common.partials.create_form')
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal update exists Object -->
<div class="modal fade" id="modifyObjectModal" tabindex="-1" aria-labelledby="modifyObjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            @include('TreeManager::common.partials.update_form')
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scripts')
<script>
var modifyObjectModal = document.getElementById('modifyObjectModal');
modifyObjectModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-action')
  var recipientId = button.getAttribute('data-bs-id')
  var recipientIsBad = button.getAttribute('data-bs-isbad')
  var recipientName = button.getAttribute('data-bs-name')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = modifyObjectModal.querySelector('.modal-title')
  var modalBodyInputId = modifyObjectModal.querySelector('.modal-body input[name="id"]')
  var modalBodyInputName = modifyObjectModal.querySelector('.modal-body input[name="name"]')
  var modalBodyInputIsBad = modifyObjectModal.querySelector('.modal-body input[name="is_bad"]')
  switch(recipient) {
    case 'family':
        modifyObjectName = 'họ cây';
        break;
    case 'type':
        modifyObjectName = 'loại cây';
        break;
    case 'status':
        modifyObjectName = 'trạng thái';
        break;
    case 'unit':
        modifyObjectName = 'đơn vị tính';
        break;
    default:
        modifyObjectName = 'đối tượng';
    }
  document.getElementById("modifyObjectForm").action = '/' + recipient + '/update';
  modalTitle.textContent = 'Cập nhật ' + modifyObjectName;
  modalBodyInputId.value = recipientId;
  modalBodyInputName.value = recipientName;
  modalBodyInputIsBad.checked = (recipientIsBad === '1');
  modalBodyInputIsBad.value = true;
  console.log(recipientIsBad);
})

var newObjectModal = document.getElementById('newObjectModal');
newObjectModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = newObjectModal.querySelector('.modal-title')
  var modalBodyInput = newObjectModal.querySelector('.modal-body input')
  switch(recipient) {
    case 'family':
        newObjectName = 'họ cây';
        break;
    case 'type':
        newObjectName = 'loại cây';
        break;
    case 'status':
        newObjectName = 'trạng thái';
        break;
    case 'unit':
        newObjectName = 'đơn vị tính';
        break;
    default:
        newObjectName = 'đối tượng';
    }
  document.getElementById("newObjectForm").action = '/' + recipient + '/create';
  modalTitle.textContent = 'Tạo mới ' + newObjectName;
  /* modalBodyInput.value = 'Vui lòng nhập tên ' + newObjectName; */
})

</script>
@endpush

@endisset