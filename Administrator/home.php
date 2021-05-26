<?php 
$peserta = $jenis_tes->hitung_peserta_jenis_tes();
$jadwal_tes = $jenis_tes->hitung_peserta_jadwal_tes();
// echo "<pre>";
// print_r ($jadwal_tes);
// echo "</pre>";
?>
<div id="container"></div>
<br>
<br>
<br>
<div id="jadwal"></div>

<script>
    // Create the chart
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Peserta Jenis Tes'
        },
        subtitle: {
            text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Peserta Tes'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
        },

        series: [
        {
            name: "Peserta",
            colorByPoint: true,
            data: [
            <?php foreach ($peserta as $key => $value): ?>
                {
                    name: "<?php echo $value['nama_jenis_tes'] ?>",
                    y: <?php echo $value['jumlah_peserta'] ?>,
                    drilldown: "<?php echo $value['nama_jenis_tes'] ?>"
                },
            <?php endforeach ?>
            ]
        }
        ],

    });
</script>

<script>
    // Create the chart
    Highcharts.chart('jadwal', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jadwal Tes'
        },
        subtitle: {
            text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Peserta Tes'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
        },

        series: [
        {
            name: "Peserta",
            colorByPoint: true,
            data: [
            <?php foreach ($jadwal_tes as $key => $value): ?>
                {
                    name: "<?php echo $value['nama_jadwal'] ?> (<?php echo $value['nama_jenis_tes'] ?>)",
                    y: <?php echo $value['peserta'] ?>,
                    drilldown: "<?php echo $value['nama_jadwal'] ?> (<?php echo $value['nama_jenis_tes'] ?>)"
                },
            <?php endforeach ?>
            ]
        }
        ],

    });
</script>