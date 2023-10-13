<!-- <body> -->
<div class="dashboard-header mx-4">
  <h1 class="card-title">SMA TAMAN HARAPAN 1 KOTA BEKASI</h1>
  <p class="text-gray-800">Selamat datang di halaman dashboard ini</p>
</div>


<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Data Siswa</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $siswa ?> </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Data Guru</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $guru ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Absensi
            </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $absensi ?></div>
              </div>
              <!-- <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Rekapitulasi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rekapitulasi ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-print fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-white-800">Dashboard</h1>
                  <a href="<?php echo base_url('login/logout'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Log Out</a>
                </div> -->