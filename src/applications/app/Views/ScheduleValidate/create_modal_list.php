<div class="modal fade" id="create">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Создать</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="create_form">

                <div class="form-group">
                    <label for="field-company_name" class="form-label">Проверяемый СМП</label>
                    <input id="field-company_name" class="form-control" name="company_name" type="text"/>
                </div>
                <div class="form-group">
                    <label for="field-company_address" class="form-label">Адрес СМП</label>
                    <input id="field-company_address" class="form-control" name="company_address" type="text"/>
                </div>
                <div class="form-group">
                    <label for="field-government_name" class="form-label">Контролирующий СМП</label>
                    <input id="field-government_name" class="form-control" name="government_name" type="text"/>
                </div>
                <div class="form-group">
                    <label for="field-government_address" class="form-label">Адрес контролирующего СМП</label>
                    <input id="field-government_address" class="form-control" name="government_address" type="text"/>
                </div>
                <div class="form-group">
                    <label for="field-validated_start_at" class="form-label">Старт проверки</label>
                    <div class="input-group date" id="datetimepicker_create_start" data-target-input="nearest">
                        <input id="field-validated_start_at" name="validated_start_at" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker_create_start"/>
                        <div class="input-group-append" data-target="#datetimepicker_create_start" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-validated_end_at" class="form-label">Конец проверки</label>
                    <div class="input-group date" id="datetimepicker_create_end" data-target-input="nearest">
                        <input id="field-validated_end_at" name="validated_end_at" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker_create_end"/>
                        <div class="input-group-append" data-target="#datetimepicker_create_end" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" id="send_form" class="btn btn-success create-button">Сохранить</button>
            </div>
        </div>
    </div>
</div>
