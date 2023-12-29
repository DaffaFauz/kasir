<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>




<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="col-sm-6 col-lg-4">
    <div class="card text-white bg-flat-color-2">
        <div class="card-body d-flex">
            <i class="fa fa-money fa-2x align-self-center"></i>
            <div class="content">
                <p class="text-light">Pendapatan Hari ini</p>
                <h4 class="mb-0">
                    <span class="count">Rp. <?= ($ph == null) ? '0' : number_format($ph[0]['total_harga']) ?></span>
                </h4>
            </div>
        </div>
    </div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-4">
    <div class="card text-white bg-flat-color-3">
        <div class="card-body d-flex">
            <i class="fa fa-credit-card fa-2x align-self-center"></i>
            <div class="content">
                <p class="text-light">Pendapatan Bulan ini</p>
                <h4 class="mb-0">
                    <span class="count">Rp. <?= ($pb == null) ? '0' : number_format($pb[0]['total_harga']) ?></span>
                </h4>
            </div>

        </div>
    </div>
</div>
<!--/.col-->
<div class="col-sm-6 col-lg-4">
    <div class="card text-white bg-flat-color-4">
        <div class="card-body d-flex">
            <i class="fa fa-credit-card-alt fa-2x align-self-center"></i>
            <div class="content">
                <p class="text-light">Pendapatan Tahun ini</p>
                <h4 class="mb-0">
                    <span class="count">Rp. <?= ($pt == null) ? '0' : number_format($pt[0]['total_harga']) ?></span>
                </h4>
            </div>
        </div>
    </div>
</div>
<!--/.col-->

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="card-title mb-0">Traffic</h4>
                    <div class="small text-muted caption"></div>
                </div>
                <!--/.col-->
                <div class="col-sm-8 hidden-sm-down">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
                            <label class="btn btn-outline-secondary bulanan active">
                                <input type="radio" name="options" id="option2" checked=""> Month
                            </label>
                            <label class="btn btn-outline-secondary tahunan">
                                <input type="radio" name="options" id="option3"> Year
                            </label>
                        </div>
                    </div>
                </div><!--/.col-->


            </div><!--/.row-->
            <div class="chart-wrapper mt-4">
                <canvas id="trafficChart" style="height:100px;" height="100"></canvas>
            </div>

        </div>

    </div>
</div>

<?php
if ($gb == null) {
    $tgl[] = 0;
    $omset[] = 0;
    $untung[] = 0;
} else {
    foreach ($gb as $g) :
        $tgl[] = date('d M Y', strtotime($g['tanggal_jual']));
        $omset[] = $g['total_harga'];
        $untung[] = $g['profit'];
    endforeach;
}
?>

</div><!-- /#right-panel -->
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="<?= base_url() ?>assets/js/lib/chart-js/Chart.bundle.js"></script>
<script>
    (function($) {
        "use strict";


        // const brandPrimary = '#20a8d8'
        const brandSuccess = '#4dbd74'
        const brandInfo = '#63c2de'
        const brandDanger = '#f86c6b'

        function convertHex(hex, opacity) {
            hex = hex.replace('#', '')
            const r = parseInt(hex.substring(0, 2), 16)
            const g = parseInt(hex.substring(2, 4), 16)
            const b = parseInt(hex.substring(4, 6), 16)

            const result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')'
            return result
        }

        document.querySelector('.caption').innerHTML = "<?= ($gb == null) ? date("M Y") : date("M Y", strtotime($g['tanggal_jual'])) ?>"

        //Traffic Chart
        var ctx = document.getElementById("trafficChart");
        //ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($tgl) ?>,
                datasets: [{
                        label: 'Omset',
                        backgroundColor: convertHex(brandInfo, 10),
                        borderColor: brandInfo,
                        pointHoverBackgroundColor: '#fff',
                        borderWidth: 2,
                        data: <?= json_encode($omset) ?>
                    },
                    {
                        label: 'Profit',
                        backgroundColor: 'transparent',
                        borderColor: brandSuccess,
                        pointHoverBackgroundColor: '#fff',
                        borderWidth: 2,
                        data: <?= json_encode($untung) ?>
                    },
                ]
            },
            options: {
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            stepSize: Math.ceil(<?= array_sum($omset) ?> / 5),
                            max: <?= array_sum($omset) ?>
                        },
                        gridLines: {
                            display: true
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0,
                        hitRadius: 10,
                        hoverRadius: 4,
                        hoverBorderWidth: 3
                    }
                }


            }
        });


    })(jQuery);

    document.querySelector('.bulanan').addEventListener('click', function() {
        (function($) {
            "use strict";


            // const brandPrimary = '#20a8d8'
            const brandSuccess = '#4dbd74'
            const brandInfo = '#63c2de'
            const brandDanger = '#f86c6b'

            function convertHex(hex, opacity) {
                hex = hex.replace('#', '')
                const r = parseInt(hex.substring(0, 2), 16)
                const g = parseInt(hex.substring(2, 4), 16)
                const b = parseInt(hex.substring(4, 6), 16)

                const result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')'
                return result
            }

            document.querySelector('.caption').innerHTML = "<?= ($gb == null) ? date("M Y") :  date("M Y", strtotime($g['tanggal_jual'])) ?>"

            //Traffic Chart
            var ctx = document.getElementById("trafficChart");
            //ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= json_encode($tgl) ?>,
                    datasets: [{
                            label: 'Omset',
                            backgroundColor: convertHex(brandInfo, 10),
                            borderColor: brandInfo,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 2,
                            data: <?= json_encode($omset) ?>
                        },
                        {
                            label: 'Profit',
                            backgroundColor: 'transparent',
                            borderColor: brandSuccess,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 2,
                            data: <?= json_encode($untung) ?>
                        },
                    ]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {
                        display: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                stepSize: Math.ceil(<?= array_sum($omset) ?> / 5),
                                max: <?= array_sum($omset) ?>
                            },
                            gridLines: {
                                display: true
                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 0,
                            hitRadius: 10,
                            hoverRadius: 4,
                            hoverBorderWidth: 3
                        }
                    }


                }
            });


        })(jQuery);
    })

    document.querySelector('.tahunan').addEventListener('click', function() {
        <?php
        if ($gt == null) {
            $tgl1[] = 0;
            $omset1[] = 0;
            $untung1[] = 0;
        } else {
            foreach ($gt as $g) :
                $tgl1[] = date('M Y', strtotime($g['tanggal_jual']));
                $omset1[] = $g['total_harga'];
                $untung1[] = $g['profit'];
            endforeach;
        } ?>
            (function($) {
                "use strict";


                // const brandPrimary = '#20a8d8'
                const brandSuccess = '#4dbd74'
                const brandInfo = '#63c2de'
                const brandDanger = '#f86c6b'

                function convertHex(hex, opacity) {
                    hex = hex.replace('#', '')
                    const r = parseInt(hex.substring(0, 2), 16)
                    const g = parseInt(hex.substring(2, 4), 16)
                    const b = parseInt(hex.substring(4, 6), 16)

                    const result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')'
                    return result
                }

                document.querySelector('.caption').innerHTML = "<?= ($gt == null) ? date("Y") :  date("Y", strtotime($g['tanggal_jual'])) ?>"

                //Traffic Chart
                var ctx = document.getElementById("trafficChart");
                //ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?= json_encode($tgl1) ?>,
                        datasets: [{
                                label: 'Omset',
                                backgroundColor: convertHex(brandInfo, 10),
                                borderColor: brandInfo,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 2,
                                data: <?= json_encode($omset1) ?>
                            },
                            {
                                label: 'Profit',
                                backgroundColor: 'transparent',
                                borderColor: brandSuccess,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 2,
                                data: <?= json_encode($untung1) ?>
                            },
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: false
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: Math.ceil(<?= array_sum($omset1) ?> / 5),
                                    max: <?= array_sum($omset1) ?>
                                },
                                gridLines: {
                                    display: true
                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4,
                                hoverBorderWidth: 3
                            }
                        }


                    }
                });


            })(jQuery);
    })
</script>
<?= $this->endSection() ?>