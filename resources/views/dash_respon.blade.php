@extends('dashboard')


@section('content')

    <!-- Navbar -->

    <body id="page-top">
        <h2 class="mt-2">Tableau de baord</h2>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/notification.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <div class="container-fluid">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">



@if (Auth::user()->type == 'Responsable')
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-2">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Notifications</a>

            <ul class="notification-drop">
                <li class="item">
                    <i class="fas fa-bell text-white" aria-hidden="true"></i>
                    <span
                        class="btn__badge pulse-button">{{ Auth::user()->unreadNotifications->count() }}</span>
                    <ul class="notify-ul">
                        @if (Auth::user()->unreadNotifications->count() == 0)
                            <li>
                                <a class="dropdown-item" href="#">Accun visiteur</a>
                            </li>
                        @else
                            @foreach (Auth::user()->unreadNotifications as $notification)
                                <li >
                                    <p class="dropdown-item" href="#">
                                        <span class="fw-bold">Nom:</span>
                                        {{ $notification->data['visiteur']['nom'] }}
                                    </p>
                                    <p class="dropdown-item" href="#" style="width:100px;">
                                        <span class="fw-bold">Objet visit:</span><br>
                                        {{ $notification->data['visiteur']['objet_visite'] }}
                                    </p>
                                    <a href="{{ route('visitors.index', ['id' => $notification->data['visiteur_id']]) }}"
                                        onclick="{{ $notification->markAsRead() }}" role="button"
                                        class="mx-3 btn btn-primary">Accept</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            </ul>

            </ul>
            </div>
            </li>
            </ul>
        </div>
    </nav>
@endif


   
        </nav>
        <!-- Navbar -->
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    visiteurs d'aujourd’hui</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="visitors-count">
                                    {{ $visitorToday }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
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
                                    visiteurs d’hier</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $visitorYesterday }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> visiteurs des 7
                                    derniers jours
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $visitorLast7Days }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
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
                                    visiteurs du mois dernier</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $visitorsLastMonth }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <button id="downloadExcel" class="btn btn-light">Export to Excel</button>
                <button id="downloadPDF" class="btn btn-light">Export to PDF</button>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Visiteurs<i class="bi bi-exclamation-circle"></i>
                        </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myColumnChart"></canvas>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
            <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            <script>
                var chartData = {
                    labels: ["Ahjoud'huie", "Hier", "dernier 7 jour", "dernier Mois"],
                    datasets: [{
                        label: "Visiteur ",
                        data: [<?php echo $visitorToday; ?>, <?php echo $visitorYesterday; ?>, <?php echo $visitorLast7Days; ?>,
                            <?php echo $visitorsLastMonth; ?>
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                };
                // Render chart

                var ctx = document.getElementById('myColumnChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                maxTicksLimit: 5
                            }
                        }
                    }
                });

                document.querySelector('#downloadExcel').addEventListener('click', () => {
                    const canvas = document.querySelector('#myColumnChart');
                    if (canvas) { // Check if canvas is rendered yet
                        const wb = XLSX.utils.book_new();
                        const ws_name = "Chart Sheet";
                        const ws_data = [
                            ["Visitors", "<?php echo $visitorToday; ?>", "<?php echo $visitorYesterday; ?>", "<?php echo $visitorLast7Days; ?>",
                                "<?php echo $visitorsLastMonth; ?>"
                            ],
                            ["Visitor Count", <?php echo $visitorToday; ?>, <?php echo $visitorYesterday; ?>, <?php echo $visitorLast7Days; ?>,
                                <?php echo $visitorsLastMonth; ?>
                            ]
                        ];
                        const ws = XLSX.utils.aoa_to_sheet(ws_data);
                        XLSX.utils.book_append_sheet(wb, ws, ws_name)
                        XLSX.writeFile(wb, 'chart.xlsx');
                    }
                });
                document.querySelector('#downloadPDF').addEventListener('click', () => {
                    html2canvas(document.querySelector('#myColumnChart')).then(canvas => {
                        var imgData = canvas.toDataURL('image/png');
                        var doc = new jsPDF('l', 'mm');
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('chart.pdf');
                    });
                });
            </script>


            <div class="col-xl-4 col-lg-5">
                <!-- Pie Chart Card -->
                <div class="card shadow mb-4">
                    <button id="export-to-excel-btn" class="btn btn-light">Export to Excel</button>
                    <button id="export-to-pdf-btn" class="btn btn-light">Export to Pdf</button>


                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Satisfaction<i class="bi bi-emoji-smile"></i>
                        </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: rgb(41, 161, 41)"></i>Satisfait
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: red"></i> Non Satisfait
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById("myPieChart").getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Satisfait", "Non satisfait"],
                    datasets: [{
                        backgroundColor: [
                            'rgb(41, 161, 41)',
                            'red'
                        ],
                        data: [{{ $tresSatisfaitCount }}, {{ $pasSatisfaitCount }}]
                    }]
                },
                options: {
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex,
                                    array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                return percentage + "%";
                            }
                        }
                    }
                }
            });
            document.getElementById("export-to-excel-btn").addEventListener("click", function() {
                // Extract data from the chart
                var data = myPieChart.data.datasets[0].data;
                var labels = myPieChart.data.labels;

                // Create a new workbook and add a worksheet
                var wb = XLSX.utils.book_new();
                var ws = XLSX.utils.aoa_to_sheet([labels, data]);

                // Add the worksheet to the workbook
                XLSX.utils.book_append_sheet(wb, ws, "Pie Chart Data");

                // Save the workbook as an Excel file
                XLSX.writeFile(wb, "pie_chart_data.xlsx");
            });
            // Add event listener to the export button
            document.getElementById("export-to-pdf-btn").addEventListener("click", function() {
                // Create a new jsPDF instance
                var doc = new jsPDF();

                // Get the canvas element with the chart
                var canvas = document.getElementById("myPieChart");

                // Get the data URL of the canvas
                var dataURL = canvas.toDataURL();

                // Add the chart image to the PDF document
                doc.addImage(dataURL, "PNG", 10, 10, 100, 100);

                // Save the PDF document
                doc.save("pie_chart.pdf");
            });
        </script>











        <div class="row mt-3 pt-3">

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->

                    {{-- --}}

                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
                        </script>
                        <script src="js/scripts.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                        <script src="assets/demo/chart-area-demo.js"></script>
                        <script src="assets/demo/chart-bar-demo.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                        <script src="js/datatables-simple-demo.js"></script>
                        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="{{ asset('js/notification.js') }}"></script>

                    </div>


                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; CCISSM 2023</span>
                            </div>
                        </div>
                    </footer>


                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

    </body>
@endsection
