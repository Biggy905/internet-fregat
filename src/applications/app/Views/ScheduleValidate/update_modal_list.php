<?php foreach ($data as $item) {?>

<div class="modal fade" id="edit-<?= $item['id']?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Обновить</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="update_form_<?= $item['id']?>">
                <div class="form-group">
                    <label for="field-id-<?= $item['id']?>" class="form-label">ID: <?= $item['id']?></label>
                    <input
                            id="field-id-<?= $item['id']?>"
                            class="form-control"
                            name="id"
                            type="hidden"
                            value="<?= $item['id']?>"/>
                </div>
                <div class="form-group">
                    <label for="field-company_name-<?= $item['id']?>" class="form-label">Проверяемый СМП</label>
                    <input
                            id="field-company_name-<?= $item['id']?>"
                            class="form-control"
                            name="company_name"
                            type="text"
                            value="<?= $item['company_name']?>"/>
                </div>
                <div class="form-group">
                    <label for="field-company_address-<?= $item['id']?>" class="form-label">Адрес СМП</label>
                    <input
                            id="field-company_address-<?= $item['id']?>"
                            class="form-control"
                            name="company_address"
                            type="text"
                            value="<?= $item['company_address']?>"/>
                </div>
                <div class="form-group">
                    <label for="field-government_name-<?= $item['id']?>" class="form-label">Контролирующий СМП</label>
                    <input
                            id="field-government_name-<?= $item['id']?>"
                            class="form-control"
                            name="government_name"
                            type="text"
                            value="<?= $item['government_name']?>"/>
                </div>
                <div class="form-group">
                    <label for="field-government_address-<?= $item['id']?>" class="form-label">Адрес контролирующего СМП</label>
                    <input
                            id="field-government_address-<?= $item['id']?>"
                            class="form-control"
                            name="government_address"
                            type="text"
                            value="<?= $item['government_address']?>"/>
                </div>

                <div class="form-group">
                    <label for="field-validated_start_at-<?= $item['id']?>" class="form-label">Старт проверки</label>
                    <div class="input-group date" id="datetimepicker_updated_start-<?= $item['id']?>" data-target-input="nearest">
                        <input id="field-validated_start_at-<?= $item['id']?>" name="validated_start_at" type="text" class="form-control datetimepicker-input" value="<?= $item['validated_start_at']?>" data-target="#datetimepicker_updated_start-<?= $item['id']?>"/>
                        <div class="input-group-append" data-target="#datetimepicker_updated_start-<?= $item['id']?>" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-validated_end_at-<?= $item['id']?>" class="form-label">Конец проверки</label>
                    <div class="input-group date" id="datetimepicker_updated_end-<?= $item['id']?>" data-target-input="nearest">
                        <input id="field-validated_end_at-<?= $item['id']?>" name="validated_end_at" type="text" class="form-control datetimepicker-input" value="<?= $item['validated_end_at']?>" data-target="#datetimepicker_updated_end-<?= $item['id']?>"/>
                        <div class="input-group-append" data-target="#datetimepicker_updated_end-<?= $item['id']?>" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" id="send_update_form_<?= $item['id']?>" class="btn btn-info">Обновить</button>
            </div>
        </div>
    </div>
</div>

<?php }?>
