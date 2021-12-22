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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAafbgINkB5XuoPwRL7V6uXacZh_RUi9EA&libraries=visualization"></script>
<script src="https://kit.fontawesome.com/5dd3399740.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    h2{
        font-size: 2vw;
        font-family: Montserrat, sans-serif;
    }
    h2{
        font-size: 2.3vw;
        text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);
    }
    h3{
        font-size: 1.4vw;
        font-weight: 600;
    }
    .booster{
        font-size: 5vw;
        text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
          font-family:  Montserrat, sans-serif;

    }
    .h1vac{
        font-size: 4vw;
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25);
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

<div class="container p-4 text-center">
  <h1 class="booster">Booster</h1>
<h2>Get Canada's latest Covid-19 stats!</h2>


</div><!-- end jumbotron -->
<div class="container-fluid p-4 text-center" id="buttons">
    <button type="button" class="m-2 btn btn-lg btn-success shadow">Cases</button>
<button type="button" class="m-2 btn btn-warning btn-lg  shadow">Tests</button>

<button type="button" class="m-2 btn btn-info btn-lg shadow">Vaccines</button>
<button type="button" class="m-2 btn btn-danger btn-lg shadow">Fatalities</button>
</div><!-- end buttons -->
       <div class="container-fluid text-left" id="canadavaccines">

<!-- https://api.covid19tracker.ca/summary api -->
<?php
$jfile = 'https://api.covid19tracker.ca/summary';
$json = file_get_contents($jfile);
ini_set("allow_url_fopen", 1);

$response1 = json_decode($json, true); //because of true, it's in an array

echo '<div class="d-flex">';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-success p-1 text-center text-light"><h3>Total Cases</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_cases'];
    echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_cases'];
        echo ' New Today</a>';
  echo '</h3></div>';
echo '</div>';
echo '</div></div></div>';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-danger p-1 text-center text-light"><h3>Fatalities</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_fatalities'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_fatalities'];
        echo ' New Today</a></h3>';
  echo '</div>';
echo '</div>';
    echo '</div></div></div>';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-warning p-1 text-center text-dark"><h3>Tests</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_tests'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_tests'];
        echo ' New Today</a></h3>';
  echo '</div>';
echo '</div>';
    echo '</div></div></div>';
 echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-info p-1 text-center text-light"><h3>Hospitalizations</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_hospitalizations'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
  echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_hospitalizations'];
        echo ' New Today</a>';
    echo '<a class="dropdown-item" href="#">';
        echo $response1['data'][0]['total_criticals'];
        echo ' Critical</a>';
        echo '</h3></div>';
echo '</div>';
    echo '</div></div></div>';    

   

    echo "</div>";
    
    echo '<div class="d-flex">';
     echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-light p-1 text-center text-dark"><h3>Recoveries</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_recoveries'];
         echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_recoveries'];
        echo ' New Today</a>';
         echo '</h3></div>';
echo '</div>';
    echo '</div></div></div>';  
    
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-success p-1 text-center text-light"><h3>Vaccinations</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_vaccinations'];
    echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_vaccinations'];
        echo ' New Today</a>';
  echo '</h3></div>';
echo '</div>';
echo '</div></div></div>';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-danger p-1 text-center text-light"><h3>Vaccinated</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_vaccinated'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_vaccinated'];
        echo ' New Today</a></h3>';
  echo '</div>';
echo '</div>';
    echo '</div></div></div>';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header bg-warning p-1 text-center text-dark"><h3>Boosters</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_boosters_1'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-arrow-down" style="color:gray; size:30px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_boosters_1'];
        echo ' New Today</a></h3>';
  echo '</div>';
echo '</div>';
    echo '</div></div></div>';

    echo '</div></div></div>';    

  

    echo "</div></div>";
    ?>

<div class="container text-center" id="totalvaccines">
    <h1 class="h1vac">
        Statistics By Province
    </h1>
</div><!-- end totalvaccines -->


<div class="container-fluid p-4" id="provincestats">
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
echo '<table class="p-2 table table-bordered table-hover table-striped shadow">';
echo '<thead>';
echo '<tr>';

echo '<th class="text-center"><h3>Province</h3></th>';
echo '<th class="text-center"><h3>Population</h3></th>';
echo '<th class="text-center"><h3>Vaccines</h3></th>';
echo '<th class="text-center"><h3>Active Cases</h3></th>';
echo '<th class="text-center"><h3>New Cases</h3></th>';

echo '<th class="text-center"><h3>% Vaccinated</h3></th>';
echo '<th class="text-center"><h3>Tests</h3></th>';
echo '<th class="text-center"><h3>Recoveries</h3></th>';
echo '<th class="text-center"><h3>Fatalities</h3></th>';

echo '<th class="text-center"><h3>% Positive</h3></th>';
echo '<th class="text-center"><h3>Cases/100K</h3></th>';
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
echo number_format($responsedata['summary'][0]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated = $responsedata['summary'][0]['cumulative_cvaccine'];
$population = $data2[0]['pop'];
$per_cent = ($vaccinated/$population) * 100;
echo number_format($per_cent, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][0]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases = $responsedata['summary'][0]['cases'];
$tests = $responsedata['summary'][0]['testing'];
$per_pos = ($cases/$tests) * 100;
echo number_format($per_pos, 2);
echo '</td>';
echo '<td class="text-center">';
$acases = $responsedata['summary'][0]['active_cases'];
$pop = $data2[0]['pop'];
$per_100 = ($acases/$pop) * 100000;
echo number_format($per_100, 2);
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
echo number_format($responsedata['summary'][0]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated1 = $responsedata['summary'][1]['cumulative_cvaccine'];
$population1 = $data2[0]['pop'];
$per_cent1 = ($vaccinated1/$population1) * 100;
echo number_format($per_cent1, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][1]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases1 = $responsedata['summary'][1]['cases'];
$tests1 = $responsedata['summary'][1]['testing'];
$per_pos1 = ($cases1/$tests1) * 100;
echo number_format($per_pos1, 2);
echo '</td>';
echo '<td class="text-center">';
$acases1 = $responsedata['summary'][1]['active_cases'];
$pop1 = $data2[1]['pop'];
$per_1001 = ($acases1/$pop1) * 100000;
echo number_format($per_1001, 2);
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
echo number_format($responsedata['summary'][2]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated2 = $responsedata['summary'][2]['cumulative_cvaccine'];
$population2 = $data2[2]['pop'];
$per_cent2 = ($vaccinated2/$population2) * 100;
echo number_format($per_cent2, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][2]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases2 = $responsedata['summary'][2]['cases'];
$tests2 = $responsedata['summary'][2]['testing'];
$per_pos2 = ($cases2/$tests2) * 100;
echo number_format($per_pos2, 2);
echo '</td>';
echo '<td class="text-center">';
$acases2 = $responsedata['summary'][2]['active_cases'];
$pop2 = $data2[2]['pop'];
$per_1002 = ($acases2/$pop2) * 100000;
echo number_format($per_1002, 2);
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
echo number_format($responsedata['summary'][2]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated2 = $responsedata['summary'][2]['cumulative_cvaccine'];
$population2 = $data2[2]['pop'];
$per_cent2 = ($vaccinated2/$population2) * 100;
echo number_format($per_cent2, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][3]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases3 = $responsedata['summary'][3]['cases'];
$tests3 = $responsedata['summary'][3]['testing'];
$per_pos3 = ($cases3/$tests3) * 100;
echo number_format($per_pos3, 2);
echo '</td>';
echo '<td class="text-center">';
$acases3 = $responsedata['summary'][3]['active_cases'];
$pop3 = $data2[3]['pop'];
$per_1003 = ($acases3/$pop3) * 100000;
echo number_format($per_1003, 2);
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
echo number_format($responsedata['summary'][4]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated4 = $responsedata['summary'][4]['cumulative_cvaccine'];
$population4 = $data2[4]['pop'];
$per_cent4 = ($vaccinated4/$population4) * 100;
echo number_format($per_cent4, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][4]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases4 = $responsedata['summary'][4]['cases'];
$tests4 = $responsedata['summary'][4]['testing'];
$per_pos4 = ($cases4/$tests4) * 100;
echo number_format($per_pos4, 2);
echo '</td>';
echo '<td class="text-center">';
$acases4 = $responsedata['summary'][4]['active_cases'];
$pop4 = $data2[4]['pop'];
$per_1004 = ($acases4/$pop4) * 100000;
echo number_format($per_1004, 2);
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
echo number_format($responsedata['summary'][7]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated5 = $responsedata['summary'][7]['cumulative_cvaccine'];
$population5 = $data2[5]['pop'];
$per_cent5 = ($vaccinated5/$population5) * 100;
echo number_format($per_cent5, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][7]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases5 = $responsedata['summary'][7]['cases'];
$tests5 = $responsedata['summary'][7]['testing'];
$per_pos5 = ($cases5/$tests5) * 100;
echo number_format($per_pos5, 2);
echo '</td>';
echo '<td class="text-center">';
$acases5 = $responsedata['summary'][7]['active_cases'];
$pop5 = $data2[5]['pop'];
$per_1005 = ($acases5/$pop5) * 100000;
echo number_format($per_1005, 2);
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
echo number_format($responsedata['summary'][5]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated6 = $responsedata['summary'][5]['cumulative_cvaccine'];
$population6 = $data2[6]['pop'];
$per_cent6 = ($vaccinated6/$population6) * 100;
echo number_format($per_cent6, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][5]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases6 = $responsedata['summary'][5]['cases'];
$tests6 = $responsedata['summary'][5]['testing'];
$per_pos6 = ($cases6/$tests6) * 100;
echo number_format($per_pos6, 2);
echo '</td>';
echo '<td class="text-center">';
$acases6 = $responsedata['summary'][5]['active_cases'];
$pop6 = $data2[6]['pop'];
$per_1006 = ($acases6/$pop6) * 100000;
echo number_format($per_1006, 2);
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
echo number_format($responsedata['summary'][6]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated7 = $responsedata['summary'][6]['cumulative_cvaccine'];
$population7 = $data7[7]['pop'];
$per_cent7 = ($vaccinated7/$population7) * 100;
echo number_format($per_cent7, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][6]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases7 = $responsedata['summary'][6]['cases'];
$tests7 = $responsedata['summary'][6]['testing'];
$per_pos7 = ($cases7/$tests7) * 100;
echo number_format($per_pos7, 2);
echo '</td>';
echo '<td class="text-center">';
$acases7 = $responsedata['summary'][6]['active_cases'];
$pop7 = $data2[7]['pop'];
$per_1007 = ($acases7/$pop7) * 100000;
echo number_format($per_1007, 2);
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
echo number_format($responsedata['summary'][8]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated8 = $responsedata['summary'][8]['cumulative_cvaccine'];
$population8 = $data2[8]['pop'];
$per_cent8 = ($vaccinated8/$population8) * 100;
echo number_format($per_cent8, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][8]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases8 = $responsedata['summary'][8]['cases'];
$tests8 = $responsedata['summary'][8]['testing'];
$per_pos8 = ($cases8/$tests8) * 100;
echo number_format($per_pos8, 2);
echo '</td>';
echo '<td class="text-center">';
$acases8 = $responsedata['summary'][8]['active_cases'];
$pop8 = $data2[8]['pop'];
$per_1008 = ($acases8/$pop8) * 100000;
echo number_format($per_1008, 2);
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
echo number_format($responsedata['summary'][2]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated9 = $responsedata['summary'][9]['cumulative_cvaccine'];
$population9 = $data2[9]['pop'];
$per_cent9 = ($vaccinated9/$population9) * 100;
echo number_format($per_cent9, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][9]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases9 = $responsedata['summary'][9]['cases'];
$tests9 = $responsedata['summary'][9]['testing'];
$per_pos9 = ($cases9/$tests9) * 100;
echo number_format($per_pos9, 2);
echo '</td>';
echo '<td class="text-center">';
$acases9 = $responsedata['summary'][9]['active_cases'];
$pop9 = $data2[9]['pop'];
$per_1009 = ($acases9/$pop9) * 100000;
echo number_format($per_1009, 2);
echo '</td>';
echo '</tr>';
echo '<tr>';

// Quebec 10
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
echo number_format($responsedata['summary'][10]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated10 = $responsedata['summary'][10]['cumulative_cvaccine'];
$population10 = $data2[10]['pop'];
$per_cent10 = ($vaccinated10/$population10) * 100;
echo number_format($per_cent10, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][10]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases10 = $responsedata['summary'][10]['cases'];
$tests10 = $responsedata['summary'][10]['testing'];
$per_pos10 = ($cases10/$tests10) * 100;
echo number_format($per_pos10, 2);
echo '</td>';
echo '<td class="text-center">';
$acases10 = $responsedata['summary'][10]['active_cases'];
$pop10 = $data2[10]['pop'];
$per_10010 = ($acases10/$pop10) * 100000;
echo number_format($per_10010, 2);
echo '</td>';
echo '</tr>';
echo '<tr>';
// 11 SK 12
echo '<td class="text-center"><strong>';

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
echo number_format($responsedata['summary'][12]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated11 = $responsedata['summary'][12]['cumulative_cvaccine'];
$population11 = $data2[11]['pop'];
$per_cent11 = ($vaccinated11/$population11) * 100;
echo number_format($per_cent11, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][12]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases11 = $responsedata['summary'][12]['cases'];
$tests11 = $responsedata['summary'][12]['testing'];
$per_pos11 = ($cases11/$tests11) * 100;
echo number_format($per_pos11, 2);
echo '</td>';
echo '<td class="text-center">';
$acases11 = $responsedata['summary'][12]['active_cases'];
$pop11 = $data2[11]['pop'];
$per_10011 = ($acases11/$pop11) * 100000;
echo number_format($per_10011, 2);
echo '</td>';
echo '</tr>';
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
echo number_format($responsedata['summary'][13]['cases'], 0);
echo '</td>';
echo '<td class="text-center">';
$vaccinated12 = $responsedata['summary'][13]['cumulative_cvaccine'];
$population12 = $data2[12]['pop'];
$per_cent12 = ($vaccinated12/$population12) * 100;
echo number_format($per_cent10, 2);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['testing'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['recovered'], 0);
echo '</td>';
echo '<td class="text-center">';
echo number_format($responsedata['summary'][13]['deaths'], 0);
echo '</td>';
echo '<td class="text-center">';
$cases12 = $responsedata['summary'][13]['cases'];
$tests12 = $responsedata['summary'][13]['testing'];
$per_pos12 = ($cases12/$tests12) * 100;
echo number_format($per_pos12, 2);
echo '</td>';
echo '<td class="text-center">';
$acases12 = $responsedata['summary'][13]['active_cases'];
$pop12 = $data2[12]['pop'];
$per_10012 = ($acases12/$pop12) * 100000;
echo number_format($per_10012, 2);
echo '</td>';
echo '</tr>';
echo '</tr>';
echo '</tbody></table>';
?>
</div><!-- end provincestatse container -->

<div class="container" id="vacpercentchart">
 <canvas id="ocean-volume-bar-chart" width="600" height="400"></canvas>
 <script>
   const labels = ["<?php echo $data2['0']['province']; ?> ", "<?php echo $data2['1']['province']; ?>", "<?php echo $data2['2']['province']; ?>",
                   "<?php echo $data2['3']['province']; ?>", "<?php echo $data2['4']['province']; ?>", "<?php echo $data2['0']['province']; ?>", "<?php echo $data2['6']['province']; ?>", "<?php echo $data2['7']['province']; ?>", "<?php echo $data2['8']['province']; ?>", "<?php echo $data2['9']['province']; ?>", "<?php echo $data2['10']['province']; ?>", "<?php echo $data2['11']['province']; ?>", "<?php echo $data2['12']['province']; ?>"];
   const volumes = [<?php echo $per_cent; ?>,<?php echo $per_cent1; ?>,<?php echo $per_cent2; ?>,<?php echo $per_cent3; ?>,<?php echo $per_cent4; ?>,<?php echo $per_cent5; ?>,<?php echo $per_cent6; ?>,<?php echo $per_cent7; ?>,<?php echo $per_cent8; ?>,<?php echo $per_cent9; ?>,<?php echo $per_cent10; ?>,<?php echo $per_cent11; ?>,<?php echo $per_cent12; ?>,<?php echo $per_cent13; ?>];

   const dataObj = {
       labels: labels,
       datasets: [
           {
               label: "Percentage Vaccinated",
               data: volumes,
               borderWidth: 2,
               options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    legend: {
                         display: true
                     },
                     title: {
                        display: true,
                         text: ['Volume of the oceans','in thousands of cubic km'],
                        fontFamily: "TrebuchetMS",
                        fontSize: 24,
                         fontColor: 'rgb(0,120,0)',
                        }  

}
           }
       ]
   }
   new Chart("ocean-volume-bar-chart", {type: "bar", data: dataObj});
  </script>
</div><!-- END VAVPERCENTCHART -->


</body>
</html>
