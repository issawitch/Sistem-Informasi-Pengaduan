<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - 404</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <title><?= lang('Errors.pageNotFound') ?></title>

</head>

<body>
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p>
                <?php if (ENVIRONMENT !== 'production') : ?>
                    <?= nl2br(esc($message)) ?>
                <?php else : ?>
                    <?= lang('Errors.sorryCannotFind') ?>
                <?php endif ?>
            </p>

            <style>
                .container-fluid {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 80%;
                    /* Atur lebar container di sini */
                    max-width: 1200px;
                    /* Atur lebar maksimum jika diperlukan */
                }
            </style>
        </div>


    </div>
</body>

</html>