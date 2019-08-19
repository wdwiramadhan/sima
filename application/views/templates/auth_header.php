<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url() ?>assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url() ?>assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/atlantis.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/customstyle.css">

</head>

<body style="background:#353b48">
    <div class="wrapper">
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <img src="<?= base_url('assets/img/logo_mam.jpeg') ?>" width="70px" class="mr-3" alt="...">
                    <a href="http://mataairjepara.or.id/">
                        <img src="<?= base_url('assets/img/logo_mataair.png') ?>" width="140px" class="rounded" alt="...">
                    </a>
                </div>
            </div>
        </div>