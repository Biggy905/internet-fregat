<?php foreach ($data as $item){ ?>

<div class="modal fade" id="delete-<?= $item['id']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Вы точно хотите удалить?</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" id="send_delete_form_<?= $item['id']?>" class="btn btn-danger">Да, удалить</button>
            </div>
        </div>
    </div>
</div>

<?php }?>
