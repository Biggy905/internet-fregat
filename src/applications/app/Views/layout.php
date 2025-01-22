<!DOCTYPE html>
<html>

<?= view('head');?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

<?= view('header');?>

<?= view('sidebar');?>

        <div class="content-wrapper">
            <section class="content">

                <?= view($content, ['data' => $data ?? []]);?>

            </section>
        </div>

        <?= view('footer');?>

    </div>

<?= view('script', ['data' => $data ?? []]);?>

</body>
</html>
