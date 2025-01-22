<?php
$pagination = [];

$pages = (int) ($count / 20);
if (!($count % 20 === 0)) {
    $pages++;
}

$i = 1;
for ($i; $i <= $pages; $i++) {
    $pagination[] = [
        'name' => $i,
        'url' => route_to('schedule-validate-list', $i),
    ];
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 p-2">
            <h3 class="text-center">Перечень плановых проверок</h3>
        </div>
        <div class="col-12 mt-5">
            <div class="card">

                <div class="card-header">
                    <button type="button" class="btn btn-success btn-sm"
                            data-toggle="modal"
                            data-target="#create">
                        <i class="fas fa-plus"></i>
                    </button>
                    <a href="<?= route_to('excel-download')?>" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-file-excel"></i>
                    </a>
                    <div class="card-tools">
                        <ul class="pagination pagination float-right">

                            <?php foreach ($pagination as $page) {?>

                                <li class="page-item"><a class="page-link" href="<?= $page['url']?>"><?= $page['name']?></a></li>

                            <?php }?>

                        </ul>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Действия</th>
                            <th>ID</th>
                            <th>Проверяемый СМП</th>
                            <th>Адрес СМП</th>
                            <th>Контролирующий СМП</th>
                            <th>Адрес контролирующего СМП</th>
                            <th>Количество дней</th>
                            <th>Старт проверки</th>
                            <th>Конец проверки</th>
                            <th>Дата создания</th>
                            <th>Дата редактирования</th>
                            <th>Дата удаления</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($data as $key => $item) {

                            $pagination[] = [
                                'name' => $key + 1,
                                'url' => route_to('schedule-validate-list', $key + 1)
                            ];

                            ?>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit-<?= $item['id']?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete-<?= $item['id']?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                <td>
                                    <?= $item['id']?>

                                </td>
                                <td>
                                    <?= $item['company_name']?>

                                </td>
                                <td>
                                    <?= $item['company_address']?>

                                </td>
                                <td>
                                    <?= $item['government_name']?>

                                </td>
                                <td>
                                    <?= $item['government_address']?>

                                </td>
                                <td>
                                    <?= $item['duration_validate']?>

                                </td>
                                <td>
                                    <?= $item['validated_start_at']?>

                                </td>
                                <td>
                                    <?= $item['validated_end_at']?>

                                </td>
                                <td>
                                    <?= $item['created_at'] ?? 'Нет данных'?>

                                </td>
                                <td>
                                    <?= $item['updated_at'] ?? 'Нет данных'?>

                                </td>
                                <td>
                                    <?= $item['deleted_at'] ?? 'Нет данных'?>

                                </td>
                            </tr>

                        <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START COMPONENTS: MODAL -->
<?= view('ScheduleValidate/create_modal_list');?>
<?= view('ScheduleValidate/update_modal_list', ['data' => $data]);?>
<?= view('ScheduleValidate/delete_modal_list', ['data' => $data]);?>
