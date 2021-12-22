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


<?php

$jfile = 'https://api.covid19tracker.ca/summary';
$json = file_get_contents($jfile);
ini_set("allow_url_fopen", 1);

$response = json_decode($json, true); //because of true, it's in an array
?>
<div class="container text-center" id="totalvaccines">
    <h1 class="h1vac">
        <?php
        echo number_format($response['data'][0]['total_vaccines_distributed'], 0);
        ?>
        vaccines across Canada!
    </h1>
</div><!-- end totalvaccines -->

<div id="stats" class="container">
    <!-- https://api.covid19tracker.ca/summary api -->
<?php

  
echo '<div class="row m-3" id="blank"></div>';

    echo '<div class="d-flex">';
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-warning p-1 text-center text-dark"><h2>Total Vaccinations</h2></div><div class="card-body p-2 text-center">';
    echo number_format($response['data'][0]['total_vaccinations'], 0);
           echo '<div class="dropdown">';
  echo '<button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-syringe" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
           echo number_format($response['data'][0]['change_vaccinations'], 0);
        echo ' New Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>';    
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-info p-1 text-center text-light"><h2>Total Vaccinated</h2></div><div class="card-body p-2 text-center">';
    echo number_format($response['data'][0]['total_vaccinated'], 0);
     echo '<div class="dropdown">';
  echo '<button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-syringe" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
        echo number_format($response['data'][0]['change_vaccinated'], 0);
        echo ' New Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>';    
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-success p-1 text-center text-light"><h2>Total Boosters</h2></div><div class="card-body p-2 text-center">';
    echo number_format($response['data'][0]['total_boosters_1'], 0);
     echo '<div class="dropdown">';
  echo '<button style="font-size:28px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-syringe" style="color:gray;;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#">';
        echo number_format($response['data'][0]['change_boosters_1'], 0);
        echo ' New Today</a>';
         echo '</div>';
echo '</div>';
    echo '</div></div></div>'; 

    echo "</div></div>";
    ?>
    
</div><!-- end stats --->


<div class="container text-center" id="totalvaccines">
    <h1 class="h1vac">
        Statistics By Province
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
echo '<th class="text-center"><h3>Vaccines</h3></th>';
echo '<th class="text-center"><h3>Active Cases</h3></th>';
echo '<th class="text-center"><h3>% Vaccinated</h3></th>';
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
echo number_format($responsedata['summary'][0]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated = $responsedata['summary'][0]['cumulative_cvaccine'];
$population = $data2[0]['pop'];
$per_cent = ($vaccinated/$population) * 100;
echo number_format($per_cent, 2);
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
echo number_format($responsedata['summary'][1]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated1 = $responsedata['summary'][1]['cumulative_cvaccine'];
$population1 = $data2[1]['pop'];
$per_cent1 = ($vaccinated1/$population1) * 100;
echo number_format($per_cent1, 2);
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
echo number_format($responsedata['summary'][2]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated2 = $responsedata['summary'][2]['cumulative_cvaccine'];
$population2 = $data2[2]['pop'];
$per_cent2 = ($vaccinated2/$population2) * 100;
echo number_format($per_cent2, 2);
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
echo number_format($responsedata['summary'][3]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated3 = $responsedata['summary'][3]['cumulative_cvaccine'];
$population3 = $data2[3]['pop'];
$per_cent3 = ($vaccinated3/$population3) * 100;
echo number_format($per_cent3, 2);
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
echo number_format($responsedata['summary'][4]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated4 = $responsedata['summary'][4]['cumulative_cvaccine'];
$population4 = $data2[4]['pop'];
$per_cent4 = ($vaccinated4/$population4) * 100;
echo number_format($per_cent4, 2);
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
echo number_format($responsedata['summary'][7]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated5 = $responsedata['summary'][7]['cumulative_cvaccine'];
$population5 = $data2[5]['pop'];
$per_cent5 = ($vaccinated5/$population5) * 100;
echo number_format($per_cent5, 2);
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
echo number_format($responsedata['summary'][5]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated6 = $responsedata['summary'][5]['cumulative_cvaccine'];
$population6 = $data2[6]['pop'];
$per_cent6 = ($vaccinated6/$population6) * 100;
echo number_format($per_cent6, 2);
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
echo number_format($responsedata['summary'][6]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated7 = $responsedata['summary'][6]['cumulative_cvaccine'];
$population7 = $data2[7]['pop'];
$per_cent7 = ($vaccinated7/$population7) * 100;
echo number_format($per_cent7, 2);
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
echo number_format($responsedata['summary'][8]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated8 = $responsedata['summary'][8]['cumulative_cvaccine'];
$population8 = $data2[8]['pop'];
$per_cent8 = ($vaccinated8/$population8) * 100;
echo number_format($per_cent8, 2);
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
echo number_format($responsedata['summary'][9]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated9 = $responsedata['summary'][9]['cumulative_cvaccine'];
$population9 = $data2[9]['pop'];
$per_cent9 = ($vaccinated9/$population9) * 100;
echo number_format($per_cent9, 2);
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
echo number_format($responsedata['summary'][10]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated10 = $responsedata['summary'][10]['cumulative_cvaccine'];
$population10 = $data2[10]['pop'];
$per_cent10 = ($vaccinated10/$population10) * 100;
echo number_format($per_cent10, 2);
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
echo number_format($responsedata['summary'][12]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated11 = $responsedata['summary'][12]['cumulative_cvaccine'];
$population11 = $data2[11]['pop'];
$per_cent11 = ($vaccinated11/$population11) * 100;
echo number_format($per_cent11, 2);
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
echo number_format($responsedata['summary'][13]['cumulative_cvaccine'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['active_cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated12 = $responsedata['summary'][13]['cumulative_cvaccine'];
$population12 = $data2[12]['pop'];
$per_cent12 = ($vaccinated12/$population12) * 100;
echo number_format($per_cent12, 2);
echo '</td>';
echo '</tr>';
echo '</tbody></table>';
?>
</div><!-- end provincestatse container -->




</body>
</html>
