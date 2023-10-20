<?php 
require_once "../HRIS/Model/employee-db-manager.php";
require_once "../HRIS/Controller/account-controller.php";

$database = new DB_Manager();

if (!isset($_SESSION['logged_user'])) {
  header('Location: pages-login.php');
  exit;
}

if (isset($_POST['logout'])) {
  logout();
}

include_once "include/header.php";

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg">
        <div class="row">

          <!-- Total Card -->
          <div class="col-xl-4 col-md-4 col-sm-">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Employee <span>| Total</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php $total = $database->employee_total();
                        echo $total['TotalEmployee']; ?></h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Active Card -->
          <div class="col-xl-4 col-md-4 col-sm-">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Employee <span>| Active</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php $total = $database->employee_active();
                        echo $total['ActiveCount']; ?></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Inactive Card -->
          <div class="col-xl-4 col-md-4 col-sm-">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Employee <span id="filterLabel">| Inactive</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php $total = $database->employee_inactive();
                        echo $total['InactiveCount']; ?></h6>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-11">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Employee by position by region</h5>

                <!-- Column Chart -->
                <div id="columnChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#columnChart"), {
                      series: [{
                        name: 'Cashier/Bartender',
                        data: [<?php $bartender = $database->employee_position_by_region();
                                $dataString = '';
                                foreach ($bartender as $bartender_counts) {
                                  $dataString .= $bartender_counts['CashierCount'] . ',';
                                };
                                echo rtrim($dataString, ', ');
                                ?>]
                      }, {
                        name: 'Store Manager',
                        data: [<?php $manager = $database->employee_position_by_region();
                                $dataString = '';
                                foreach ($manager as $manager_counts) {
                                  $dataString .= $manager_counts['StoreManagerCount'] . ',';
                                };
                                echo rtrim($dataString, ', ');
                                ?>]
                      }, {
                        name: 'Multi-Unit Manager',
                        data: [<?php $multiunit = $database->employee_position_by_region();
                                $dataString = '';
                                foreach ($multiunit as $multiunit_counts) {
                                  $dataString .= $multiunit_counts['MultiUnitCount'] . ',';
                                };
                                echo rtrim($dataString, ', ');
                                ?>]
                      }],
                      chart: {
                        type: 'bar',
                        height: 350
                      },
                      plotOptions: {
                        bar: {
                          horizontal: false,
                          columnWidth: '55%',
                          endingShape: 'rounded'
                        },
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                      },
                      xaxis: {
                        categories: [<?php
                                      $region = $database->employee_position_by_region();
                                      $categoryString = '';
                                      foreach ($region as $region_name) {
                                        $categoryString .= "'" . $region_name['region'] . "', ";
                                      }
                                      echo rtrim($categoryString, ', '); // This removes the trailing comma
                                      ?>],
                      },
                      yaxis: {
                        title: {
                          text: 'Employee'
                        }
                      },
                      fill: {
                        opacity: 1
                      },
                      tooltip: {
                        y: {
                          formatter: function(val) {
                            return val + " partners"
                          }
                        }
                      }
                    }).render();
                  });
                </script>
                <!-- End Column Chart -->

              </div>
            </div>
          </div><!-- End Reports -->



        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Employee Per Region Chart -->
        <div class="col-12">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Employee<span>| Total employee by region</span></h5>

              <div id="RegionChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#RegionChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      orient: 'horizontal',
                      left: 'left'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['30%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [
                        <?php $employee_group = $database->employee_total_by_region();
                        foreach ($employee_group as $group) {
                          echo "{ value: " . $group['TotalByRegion'] . ", name: '" . $group['region'] . "' },";
                        } ?>
                      ]
                    }]
                  });
                });
              </script>
            </div>
          </div>
        </div>
      </div>

      <!-- Company Position Chart -->
      <div class="col-12">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Operation Position Chart</h5>

                <!-- Pie Chart -->
                <div id="pieChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#pieChart"), {
                      series: [<?php
                                $employee_position = $database->employee_percent_by_position();
                                foreach ($employee_position as $group) {
                                  echo $group['StoreEmployee'] . ",";
                                }
                                ?>],
                      chart: {
                        height: 350,
                        type: 'pie',
                        toolbar: {
                          show: true
                        }
                      },
                      labels: [<?php
                                foreach ($employee_position as $group) {
                                  echo "'" . $group['position'] . "',";
                                }
                                ?>]
                    }).render();
                  });
                </script>
                <!-- End Pie Chart -->

              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Office Position Chart</h5>

                <!-- Pie Chart -->
                <div id="pieChart2"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#pieChart2"), {
                      series: [<?php
                                $employee_position = $database->employee_percent_by_position_hq();
                                foreach ($employee_position as $group) {
                                  echo $group['HqEmployee'] . ",";
                                }
                                ?>],
                      chart: {
                        height: 350,
                        type: 'pie',
                        toolbar: {
                          show: true
                        }
                      },
                      labels: [<?php
                                foreach ($employee_position as $group) {
                                  echo "'" . $group['position'] . "',";
                                }
                                ?>]
                    }).render();
                  });
                </script>
                <!-- End Pie Chart -->
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>

</main><!-- End #main -->

<?php include_once "include/footer.html"; ?>