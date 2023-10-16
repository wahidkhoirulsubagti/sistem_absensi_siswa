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
 </head>
 <style>
     body {
         background-image: url("assets/img/SMATamhar.png");
         background-repeat: no-repeat;
         background-size: cover;
     }
 </style>

 <body>
     <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">

         <body class="bg-primary">
             <div id="layoutAuthentication">
                 <div id="layoutAuthentication_content">
                     <main>
                         <div class="container mt-5">
                             <div class="row mt-5 justify-content-center">

                                 <div class="col-lg-5" style="margin-top: 6rem;">
                                     <div class="card shadow border-0 rounded mt-4">
                                         <div class="card-header"><b>
                                                 <h3 class="text-center font-weight-light my-4">ABSENSI</h3>
                                                 <h6 class="text-center font-weight-light my-4">SMA TAMAN HARAPAN 1 KOTA BEKASI</h6>
                                             </b>
                                         </div>
                                         <form>
                                             <div class="card-body">
                                                 <div class="form-group">
                                                     <label> Username </label> <i class="fas fa-user"></i>
                                                     <input type="username" class="form-control" placeholder="username" name="user_name" required>
                                                     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                 </div>
                                                 <div class="form-group">
                                                     <label> Password </label> <i class="fas fa-eye-slash"></i>
                                                     <input type="password" class="form-control" placeholder="password" name="password" required>
                                                     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                 </div>
                                             </div>
                                             <div class="card-footer text-right">
                                                 <div>
                                                     <input class="btn btn-primary btn-block" type="submit" value="Login">
                                                 </div>
                                                 <div class="text-center pt-2">
                                                     <span></span><a href="<?php echo base_url(); ?>"> Cari Rekap Absensi Siswa</a>
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


     <!-- Di dalam tag <head> -->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
         // Ambil pesan notifikasi dari URL
         const urlParams = new URLSearchParams(window.location.search);
         const message = urlParams.get('message');

         if (message) {
             // Tampilkan pesan notifikasi menggunakan Swal
             const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 showCloseButton: true,
                 timer: 3000,
                 timerProgressBar: true,
                 didOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                 }
             })

             Toast.fire({
                 icon: 'success',
                 title: message
             });
         }
     </script>

 </html>