<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script>
window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>

<script src="design/dashboard.js"></script>
<!-- // $(document).ready(function() {
// $('.nav li a').click(function(event) {
// //remove all pre-existing active classes
// $('.active').removeClass('active');

// //add the active class to the link we clicked
// $(this).addClass('active');

// //Load the content
// //e.g.
// //load the page that the link was pointing to
// //$('#content').load($(this).find(a).attr('href'));

// event.preventDefault();
// });
// }); -->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['bar']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['date', 'visitors'],
        //ama main aa code 6 format ma kyak change karvo hoy to ama karje        

        <
        ? php
        $result = mysqli_query($con, "select * from visit");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "['".$row['date'].
                "','".$row['total'].
                "'],";
            }
        }


        ?
        >
    ]);

    var options = {
        chart: {
            title: 'total visitors',
            subtitle: '',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script> -->