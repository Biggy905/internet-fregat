<script src="/assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="/assets/AdminLTE/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/AdminLTE/js/adminlte.min.js"></script>
<script src="/assets/AdminLTE/plugins/moment/moment.min.js"></script>
<script src="/assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
<script src="/assets/Main/main.js"></script>

<script>

    $(function () {
        $('#datetimepicker_create_start').datetimepicker(
            {
                viewMode: 'days',
                locale: 'ru',
                format: 'YYYY-MM-DD'
            }
        );

        $('#datetimepicker_create_end').datetimepicker(
            {
                viewMode: 'days',
                locale: 'ru',
                format: 'YYYY-MM-DD'
            }
        );
    });

</script>

<?php $createUrl = route_to('schedule-validate-create'); ?>

<script>
    function getBodyValueFromModal()
    {
        var Form = {};

        Form['company_name'] = $('#field-company_name').val();
        Form['company_address'] = $('#field-company_address').val();
        Form['government_name'] = $('#field-government_name').val();
        Form['government_address'] = $('#field-government_address').val();
        Form['validated_start_at'] = $('#field-validated_start_at').val();
        Form['validated_end_at'] = $('#field-validated_end_at').val();

        return Form;
    }

    function sendFormFromModal() {
        $(document).ready(function (e) {
            $('#send_form').click(function (e) {
                e.preventDefault();

                var valueFromModal = getBodyValueFromModal();
                var body = JSON.stringify(valueFromModal);

                responseFormValidate(
                    sendForm(
                        'POST',
                        '<?= $createUrl?>',
                        'application/json; charset=utf-8',
                        'json',
                        body
                    )
                );

                return false;
            });
        });
    }

    sendFormFromModal();
</script>

<?php
// GENERATE UPDATE ITEM
$generateUpdateJs = '';

if (!empty($data)) {
    foreach ($data as $item) {
        $id = $item['id'];

        $updateUrl = route_to('schedule-validate-update', $id);

        $generateUpdateJs .= <<<JS

    $(function () {
        $('#datetimepicker_updated_start-$id').datetimepicker(
            {
                viewMode: 'days',
                locale: 'ru',
                format: 'YYYY-MM-DD'
            }
        );

        $('#datetimepicker_updated_end-$id').datetimepicker(
            {
                viewMode: 'days',
                locale: 'ru',
                format: 'YYYY-MM-DD'
            }
        );
    });

    function getBodyValueFromUpdateModal_$id()
    {
        var Form = {};
        
        Form['id'] = $('#edit-$id #field-id-$id').val();
        Form['company_name'] = $('#edit-$id #field-company_name-$id').val();
        Form['company_address'] = $('#edit-$id #field-company_address-$id').val();
        Form['government_name'] = $('#edit-$id #field-government_name-$id').val();
        Form['government_address'] = $('#edit-$id #field-government_address-$id').val();
        Form['validated_start_at'] = $('#edit-$id #field-validated_start_at-$id').val();
        Form['validated_end_at'] = $('#edit-$id #field-validated_end_at-$id').val();

        return Form;
    }
    
    function sendFormFromUpdateModal_$id() {
        $(document).ready(function (e) {
            $('#edit-$id #send_update_form_$id').click(function (e) {
                e.preventDefault();
                
                var valueFromModal = getBodyValueFromUpdateModal_$id();
                var body = JSON.stringify(valueFromModal);
                
                responseFormValidate(
                    sendForm(
                        'PATCH',
                        '$updateUrl',
                        'application/json; charset=utf-8',
                        'json',
                        body
                    )
                );
            
                return false;
            });
        });
    }
    
    sendFormFromUpdateModal_$id();

JS;

        unset($updateUrl);
    }
}

if (!empty($generateUpdateJs)) {?>

    <script>

        <?= $generateUpdateJs?>

    </script>

<?php }
// GENERATE DELETE ITEM
$generateDeleteJs = '';

if (!empty($data)) {
    foreach ($data as $item) {
        $id = $item['id'];

        $deleteUrl = route_to('schedule-validate-delete', $id);

        $generateDeleteJs .= <<<JS

    function getBodyValueFromDeleteModal_$id()
    {
        var Form = {};
        
        Form['id'] = $('#delete-$id #field-id-$id').val();
        
        return Form;
    }
    
    function sendFormFromDeleteModal_$id() {
        $(document).ready(function (e) {
            $('#delete-$id #send_delete_form_$id').click(function (e) {
                e.preventDefault();
                
                var valueFromModal = getBodyValueFromDeleteModal_$id();
                var body = JSON.stringify(valueFromModal);
                
                responseFormValidate(
                    sendForm(
                        'DELETE',
                        '$deleteUrl',
                        'application/json; charset=utf-8',
                        'json',
                        body
                    )
                );
            
                return false;
            });
        });
    }
    
    sendFormFromDeleteModal_$id();

JS;

        unset($deleteUrl);
    }
}

if (!empty($generateDeleteJs)) {?>

    <script>

        <?= $generateDeleteJs?>

    </script>

<?php }
