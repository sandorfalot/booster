<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booster</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://kit.fontawesome.com/5dd3399740.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    h2{
        font-size: 2vw;
        font-family: Montserrat, sans-serif;
    }
    h3{
        font-size: 1.4vw;
        font-weight: 600;
    }
    .booster{
        font-size: 5vw;
        text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.75);
          font-family:  Montserrat, sans-serif;

    }
    .h1vac{
        font-size: 4vw;
        text-shadow: 3px 3px 5px #ccc;
        padding-top: 2%;
        padding-bottom: 2%;
          font-family:  Montserrat, sans-serif;

    }
    body{
        font-family: Noto Sans, sans-serif;
    }
</style>
</head>


<body>




</div><!-- end jumbotron -->
<?php

$jfile = 'https://api.covid19tracker.ca/summary';
$json = file_get_contents($jfile);
ini_set("allow_url_fopen", 1);

$response = json_decode($json, true); //because of true, it's in an array
?>
<div class="container text-center" id="totaltests">
    <h1 class="h1vac">
        <?php
        echo number_format($response['data'][0]['total_tests'], 0);
        ?>
        tests and still going!
    </h1>
</div><!-- end totaltests -->

<div id="stats" class="container">
    <!-- https://api.covid19tracker.ca/summary api -->
<?php

  
echo '<div class="row m-3" id="blank"></div>';

    echo '<div class="d-flex">';
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-warning p-1 text-center text-dark"><h2>Total Tests</h2></div><div class="card-body p-2 text-center"><h3>';
    echo number_format($response['data'][0]['total_tests'], 0);
           echo '</h3><div class="dropdown">';
  echo '<button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-heartbeat" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
           echo number_format($response['data'][0]['change_tests'], 0);
        echo ' New Tests Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>';    
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-info p-1 text-center text-light"><h2>Hospitalizations</h2></div><div class="card-body p-2 text-center"><h3>';
    echo number_format($response['data'][0]['total_hospitalizations'], 0);
     echo '</h3><div class="dropdown">';
  echo '<button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="far fa-hospital" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
        echo number_format($response['data'][0]['change_hospitalizations'], 0);
        echo ' New Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>';    
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-danger p-1 text-center text-light"><h2>Critical</h2></div><div class="card-body p-2 text-center"><h3>';
    echo number_format($response['data'][0]['total_criticals'], 0);
     echo '</h3><div class="dropdown">';
  echo '<button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-ambulance" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
        echo number_format($response['data'][0]['change_criticals'], 0);
        echo ' New Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>'; 
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-success p-1 text-center text-light"><h2>Recoveries</h2></div><div class="card-body p-2 text-center"><h3>';
    echo number_format($response['data'][0]['total_recoveries'], 0);
     echo '<div class="dropdown">';
  echo '</h3><button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-prescription-bottle-alt" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
        echo number_format($response['data'][0]['change_recoveries'], 0);
        echo ' New Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>'; 
    echo "</div></div>";
    ?>
    
</div><!-- end stats --->


<div class="container text-center" id="totalvaccines">
    <h1 class="h1vac">
        Testing
    </h1>
</div><!-- end totalvaccines -->


<div class="container" id="provincestats">
    <?php
$jfile2 = 'https://api.opencovid.ca/other?stat=prov';
$json2 = file_get_contents($jfile2);
ini_set("allow_url_fopen", 1);

$response2 = json_decode($json2, true); //because of true, it's in an array

// province status 

$jfiledata = 'https://api.opencovid.ca/summary';
$jsondata = file_get_contents($jfiledata);
ini_set("allow_url_fopen", 1);

$responsedata = json_decode($jsondata, true); //because of true, it's in an array

$data2 = $response2['prov'];
echo '<table class="table table-bordered table-hover table-striped shadow">';
echo '<thead>';
echo '<tr>';

echo '<th class="text-center"><h3>Province</h3></th>';
echo '<th class="text-center"><h3>Population</h3></th>';
echo '<th class="text-center"><h3>Tests Done</h3></th>';
echo '<th class="text-center"><h3>New Cases</h3></th>';
echo '<th class="text-center"><h3>% Positive</h3></th>';
echo '<th class="text-center"><h3>Deaths</h3></th>';
echo '<th class="text-center"><h3>Recovered</h3></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
//0 Alberta 0
echo '<td class="text-center"><strong>';
echo $data2['0']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[0]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';

$tests = $responsedata['summary'][0]['testing'];
$cases = $responsedata['summary'][0]['cases'];

if ($tests == 0) {
 echo '0';
} else {
    $per_cent = ($cases/$tests) * 100;
echo number_format($per_cent, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
//1 BC 1
echo '<td class="text-center"><strong>';
echo $data2['1']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[1]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests1 = $responsedata['summary'][1]['testing'];
$cases1 = $responsedata['summary'][1]['cases'];
if ($tests1 == 0) {
 echo '0';
} else {
    $per_cent1 = ($cases1/$tests1) * 100;
echo number_format($per_cent1, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 2 Manitoba 2
echo '<td class="text-center"><strong>';
echo $data2['2']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[2]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests2 = $responsedata['summary'][2]['testing'];
$cases2 = $responsedata['summary'][2]['cases'];
if ($tests2 == 0) {
 echo '0';
} else {
    $per_cent2 = ($cases2/$tests2) * 100;
echo number_format($per_cent2, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 3 New Brunswick 3
echo '<td class="text-center"><strong>';
echo $data2['3']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[3]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests3 = $responsedata['summary'][3]['testing'];
$cases3 = $responsedata['summary'][3]['cases'];
if ($tests3 == 0) {
 echo '0';
} else {
    $per_cent3 = ($cases3/$tests3) * 100;
echo number_format($per_cent3, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 4 NL 4
echo '<td class="text-center"><strong>';
echo $data2['4']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[4]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests4 = $responsedata['summary'][4]['testing'];
$cases4 = $responsedata['summary'][4]['cases'];
if ($tests4 == 0) {
 echo '0';
} else {
    $per_cent4 = ($cases4/$tests4) * 100;
echo number_format($per_cent4, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 5 Northwest Territories NT 7
echo '<td class="text-center"><strong>';
echo $data2['5']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[5]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests5 = $responsedata['summary'][7]['testing'];
$cases5 = $responsedata['summary'][7]['cases'];
if ($tests5 == 0) {
 echo '0';
} else {
    $per_cent5 = ($cases5/$tests5) * 100;
echo number_format($per_cent5, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 6 Nova Scotia 5
echo '<td class="text-center"><strong>';
echo $data2['6']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[6]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests6 = $responsedata['summary'][5]['testing'];
$cases6 = $responsedata['summary'][5]['cases'];
if ($tests6 == 0) {
 echo '0';
} else {
    $per_cent6 = ($cases6/$tests6) * 100;
echo number_format($per_cent6, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 7 Nunavut 6
echo '<td class="text-center"><strong>';
echo $data2['7']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[7]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests7 = $responsedata['summary'][6]['testing'];

$cases7 = $responsedata['summary'][6]['cases'];
if ($tests7 == 0) {
 echo '0';
} else {
    $per_cent7 = ($cases7/$tests7) * 100;
echo $per_cent7;

}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 8 Ontario 8
echo '<td class="text-center"><strong>';
echo $data2['8']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[8]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests8 = $responsedata['summary'][8]['testing'];
$cases8 = $responsedata['summary'][8]['cases'];
if ($tests8 == 0) {
 echo '0';
} else {
    $per_cent8 = ($cases8/$tests8) * 100;
echo number_format($per_cent8, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 9 PEI 9
echo '<td class="text-center"><strong>';
echo $data2['9']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[9]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests9 = $responsedata['summary'][9]['testing'];
$cases9 = $responsedata['summary'][9]['cases'];
if ($tests9 == 0) {
 echo '0';
} else {
    $per_cent9 = ($cases9/$tests9) * 100;
echo number_format($per_cent9, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 10 Quebec 10
echo '<td class="text-center"><strong>';
echo $data2['10']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[10]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests10 = $responsedata['summary'][10]['testing'];
$cases10 = $responsedata['summary'][10]['cases'];
if ($tests10 == 0) {
 echo '0';
} else {
    $per_cent10 = ($cases10/$tests10) * 100;
echo number_format($per_cent10, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="text-center"><strong>';
// 11 SK 12
echo $data2['11']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[11]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests11 = $responsedata['summary'][12]['testing'];
$cases11 = $responsedata['summary'][12]['cases'];
if ($tests11 == 0) {
 echo '0';
} else {
    $per_cent11 = ($cases11/$tests11) * 100;
echo number_format($per_cent11, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 12 Yukon 13
echo '<td class="text-center"><strong>';
echo $data2['12']['province'];
echo '</td></strong>';
echo '<td class="text-center">';
echo number_format($data2[12]['pop'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$tests12 = $responsedata['summary'][13]['testing'];
$cases12 = $responsedata['summary'][13]['cases'];
if ($tests12 == 0) {
 echo '0';
} else {
    $per_cent12 = ($cases12/$tests12) * 100;
echo number_format($per_cent12, 2);
}
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['recovered'], 0);
echo '</td>';
echo '</tr>';
echo '</tbody></table>';
?>
</div><!-- end provincestatse container -->

<div class="container" id="vacpercentchart">

 <canvas id="my-line-chart" width="400" height="200"></canvas>

 <script>
       const labels = ["<?php echo $data2['0']['province']; ?> ", "<?php echo $data2['1']['province']; ?>", "<?php echo $data2['2']['province']; ?>",
                   "<?php echo $data2['3']['province']; ?>", "<?php echo $data2['4']['province']; ?>", "<?php echo $data2['0']['province']; ?>", "<?php echo $data2['6']['province']; ?>", "<?php echo $data2['7']['province']; ?>", "<?php echo $data2['8']['province']; ?>", "<?php echo $data2['9']['province']; ?>", "<?php echo $data2['10']['province']; ?>", "<?php echo $data2['11']['province']; ?>", "<?php echo $data2['12']['province']; ?>"];
   const values = [<?php if ($tests == 0) {
 echo '0';
} else {
    $per_cent = ($cases/$tests) * 100;
echo $per_cent;
} ?>,
<?php if ($tests1 == 0) {
 echo '0';
} else {
    $per_cent1 = ($cases1/$tests1) * 100;
echo $per_cent1;
} ?>,
<?php if ($tests2 == 0) {
 echo '0';
} else {
    $per_cent2 = ($cases2/$tests2) * 100;
echo $per_cent2;
} ?>,
<?php if ($tests3 == 0) {
 echo '0';
} else {
    $per_cent3 = ($cases3/$tests3) * 100;
echo $per_cent3;
} ?>,
<?php if ($tests4 == 0) {
 echo '0';
} else {
    $per_cent4 = ($cases4/$tests4) * 100;
echo $per_cent4;
} ?>,
<?php if ($tests5 == 0) {
 echo '0';
} else {
    $per_cent5 = ($cases5/$tests5) * 100;
echo $per_cent5;
} ?>,
<?php if ($tests6 == 0) {
 echo '0';
} else {
    $per_cent6 = ($cases6/$tests6) * 100;
echo $per_cent6;
} ?>,
<?php if ($tests7 == 0) {
 echo '0';
} else {
    $per_cent7 = ($cases7/$tests7) * 100;
echo $per_cent7;
} ?>,
<?php if ($tests8 == 0) {
 echo '0';
} else {
    $per_cent8 = ($cases8/$tests8) * 100;
echo $per_cent8;
} ?>, 
<?php if ($tests9 == 0) {
 echo '0';
} else {
    $per_cent9 = ($cases9/$tests9) * 100;
echo $per_cent9;
} ?>,
<?php if ($tests10 == 0) {
 echo '0';
} else {
    $per_cent10 = ($cases10/$tests10) * 100;
echo $per_cent10;
} ?>,
<?php if ($tests11 == 0) {
 echo '0';
} else {
    $per_cent11 = ($cases11/$tests11) * 100;
echo $per_cent11;
} ?>,
<?php if ($tests12 == 0) {
 echo '0';
} else {
    $per_cent12 = ($cases12/$tests12) * 100;
echo $per_cent12;
} ?>,
<?php if ($tests13 == 0) {
 echo '0';
} else {
    $per_cent13 = ($cases13/$tests13) * 100;
echo $per_cent13;
} ?>];

     const dataObj = {
         labels: labels,
         datasets: [{ data: values }]
     }
     const chartObj = {
         type: "line",
         data: dataObj
     };
     new Chart("my-line-chart", chartObj);
 </script>
</div><!-- END VAVPERCENTCHART -->

<div class="container" id="casebyvax-ontario">
<!--    <h1 class="h1vac">Ontario Cases by Vaccination Status</h1> -->
    <?php
//    include 'ontario.php';
    ?>

    <!-- https://data.ontario.ca/api/3/action/datastore_search?resource_id=eed63cf2-83dd-4598-b337-b288c0a89a16

-->
<!-- https://data.ontario.ca/api/3/action/datastore_search?resource_id=eed63cf2-83dd-4598-b337-b288c0a89a16

-->
    
</div><!-- end casebyvax Cases of covid per vaccination status -->

</body>
</html>
