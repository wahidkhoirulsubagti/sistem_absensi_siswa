<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="<?php echo base_url('assets/dist/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    body {
        background-image: url("assets/img/SMATamhar.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <form action="<?php echo base_url('cari_nis/cari_rekapitulasi_siswa'); ?>" method="post">

        <body class="bg-primary">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container mt-5">
                            <div class="row mt-5 justify-content-center">

                                <div class="col-lg-5" style="margin-top: 6rem;">
                                    <div class="card shadow border-0 rounded mt-4">
                                        <div class="card-header"><b>
                                                <h3 class="text-center font-weight-light my-4">Cari Rekap Absensi Siswa</h3>
                                                <h6 class="text-center font-weight-light my-4">SMA TAMAN HARAPAN 1 KOTA BEKASI</h6>
                                            </b>
                                        </div>
                                        <form>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Masukkan NIS </label>
                                                    <input type="text" class="form-control" name="nis" required maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <div>
                                                    <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-search"></i> Cari
                                                    </button>
                                                </div>

                                                <div class="text-center pt-2">
                                                    <span> Administrator?</span><a href="<?php echo base_url('login'); ?>"> Login </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </body>
    </form>

</html>