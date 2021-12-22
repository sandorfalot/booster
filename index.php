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
     
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans">

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
    .icon{
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25);
    }
    #myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: rgba(255, 0, 0, 0.65);
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
  box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.15);
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
</style>
</head>


<body>
<button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>
<script>
    //Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
<div class="container p-4 text-center">
    <div class="row" id="firstrow">
        <div class="col-sm-8 text-center">
  <h1 class="booster">Booster</h1>
<h2>Get Canada's latest Covid-19 stats!</h2>
</div><!-- end col sm 8 -->
<div class="col-sm-4 text-center">
    <i class='p-4 fas fa-lungs-virus icon' style='font-size:108px;'></i>

</div><!-- end col sm 4 -->
</div> <!-- end firstrow -->
</div><!-- end main container -->
<div class="container-fluid p-4 text-center" id="buttons">
    <a href="#Stats" class="m-2 btn btn-lg btn-dark shadow" role="button">Statistics</a>
<a href="#Tests" class="m-2 btn btn-dark btn-lg  shadow" role="button">Tests</a>


<a href="#Fatalities" class="m-2 btn btn-dark btn-lg shadow" role="button">Fatalities</a>
<a href="#Vacines"role="button" class="m-2 btn btn-dark btn-lg shadow">Vaccines</a>
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
echo '<i class="fas fa-viruses" style="color:gray; font-size:38px;"></i>  </button>';
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
echo '<i class="fas fa-ambulance" style="color:gray; font-size:38px;"></i>  </button>';
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
echo '<i class="fas fa-user-md" style="color:gray; font-size:38px;"></i>  </button>';
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
echo '<i class="far fa-hospital" style="color:gray; font-size:38px;"></i>  </button>';
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
echo '<i class="fas fa-pills" style="color:gray; font-size:38px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_recoveries'];
        echo ' New Today</a>';
         echo '</h3></div>';
echo '</div>';
    echo '</div></div></div>';  
    
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header p-1 text-center text-light" style="background-color: indigo;"><h3>Vaccinations</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_vaccinations'];
    echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">';
echo '<i class="fas fa-syringe" style="color:gray; font-size:38px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_vaccinations'];
        echo ' New Today</a>';
  echo '</h3></div>';
echo '</div>';
echo '</div></div></div>';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header p-1 text-center text-dark" style="background-color: pink;"><h3>Vaccinated</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_vaccinated'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">';
echo '<i class="fas fa-head-side-cough" style="color:gray; font-size:38px;"></i>  </button>';
  echo '<div class="dropdown-menu">';
    echo '<a class="dropdown-item" href="#"><h3>';
        echo $response1['data'][0]['change_vaccinated'];
        echo ' New Today</a></h3>';
  echo '</div>';
echo '</div>';
    echo '</div></div></div>';
    echo '<div class="p-2 flex-fill m-2"><div class="card shadow"><div class="card-header p-1 text-center text-dark" style="background-color: lightgreen;"><h3>Boosters</h3></div><div class="card-body p-2 text-center"><h2>';
    echo $response1['data'][0]['total_boosters_1'];
     echo '</h2><div class="dropdown">';
  echo '<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">';
echo '<i class="fas fa-procedures" style="color:gray; font-size:38px;"></i>  </button>';
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

<div class="container text-center" id="Stats">
    <h1 class="h1vac">
        Statistics By Province
    </h1>
</div><!-- end Stats -->


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
echo '<div class="table-responsive">';

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
echo '</tbody></table></div>';
?>
</div><!-- end provincestatse container -->
<div class="container text-center" id="chartlinks">
    <h3>  <a href="#vacpercentchart">Total Cases By Province</a>
 | <a href="#vacpercentchart2">New Cases By Province</a>
 | <a href="#vacpercentchart3">This Months Cases in Canada</a>
 | <a href="#">Canada Positivity Rate</a>
 | <a href="#">Ontario Vaccine Data</a>

 </h3>
</div><!-- end chartlinks -->
<div class="container text-center" id="vacpercentchart">
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <h2>Total Cases By Province</h2>
 <div id="charts"><canvas id="ocean-volume-bar-chart" width="600" height="400"></canvas>
 <script>
   const labels = ["<?php echo $data2['0']['province']; ?> ", "<?php echo $data2['1']['province']; ?>", "<?php echo $data2['2']['province']; ?>",
                   "<?php echo $data2['3']['province']; ?>", "<?php echo $data2['4']['province']; ?>", "<?php echo $data2['5']['province']; ?>", "<?php echo $data2['6']['province']; ?>", "<?php echo $data2['7']['province']; ?>", "<?php echo $data2['8']['province']; ?>", "<?php echo $data2['9']['province']; ?>", "<?php echo $data2['10']['province']; ?>", "<?php echo $data2['11']['province']; ?>", "<?php echo $data2['12']['province']; ?>"];
   const volumes = [<?php echo $responsedata['summary']['0']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['1']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['2']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['3']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['4']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['7']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['6']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['5']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['8']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['9']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['10']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['12']['cumulative_cases']; ?>,<?php echo $responsedata['summary']['13']['cumulative_cases']; ?>];

   const dataObj = {
       labels: labels,
       datasets: [
           {
               label: "Total Cases",
               data: volumes,
               borderWidth: 2,
                backgroundColor: [
                 'hsla(260,100%,75%,.7',
                 'hsla(245,100%,75%,.7',
                 'hsla(230,100%,75%,.7',
                 'hsla(210,100%,75%,.7',
                 'hsla(195,100%,75%,.7',
                 'hsla(180,100%,75%,.7',
                 'hsla(165,100%,75%,.7'],
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
  </div><!-- end charts div -->
</div><!-- END VAVPERCENTCHART -->
<div class="container m-4">&nbsp;</div>

<div class="container text-center" id="vacpercentchart2">
 <h2>Todays New Cases By Province</h2>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <div id="charts2"><canvas id="ocean-volume-bar-chart2" width="600" height="400"></canvas>
 <script>
   const labels2 = ["<?php echo $data2['0']['province']; ?> ", "<?php echo $data2['1']['province']; ?>", "<?php echo $data2['2']['province']; ?>",
                   "<?php echo $data2['3']['province']; ?>", "<?php echo $data2['4']['province']; ?>", "<?php echo $data2['5']['province']; ?>", "<?php echo $data2['6']['province']; ?>", "<?php echo $data2['7']['province']; ?>", "<?php echo $data2['8']['province']; ?>", "<?php echo $data2['9']['province']; ?>", "<?php echo $data2['10']['province']; ?>", "<?php echo $data2['11']['province']; ?>", "<?php echo $data2['12']['province']; ?>"];
   const volumes2 = [<?php echo $responsedata['summary']['0']['cases']; ?>,<?php echo $responsedata['summary']['1']['cases']; ?>,<?php echo $responsedata['summary']['2']['cases']; ?>,<?php echo $responsedata['summary']['3']['cases']; ?>,<?php echo $responsedata['summary']['4']['cases']; ?>,<?php echo $responsedata['summary']['7']['cases']; ?>,<?php echo $responsedata['summary']['6']['cases']; ?>,<?php echo $responsedata['summary']['5']['cases']; ?>,<?php echo $responsedata['summary']['8']['cases']; ?>,<?php echo $responsedata['summary']['9']['cases']; ?>,<?php echo $responsedata['summary']['10']['cases']; ?>,<?php echo $responsedata['summary']['12']['cases']; ?>,<?php echo $responsedata['summary']['13']['cases']; ?>];

   const dataObj2 = {
       labels: labels2,
       datasets: [
           {
               label: "Current Cases",
               data: volumes2,
               borderWidth: 2,
                backgroundColor: [
                 'hsla(260,100%,75%,.7',
                 'hsla(245,100%,75%,.7',
                 'hsla(230,100%,75%,.7',
                 'hsla(210,100%,75%,.7',
                 'hsla(195,100%,75%,.7',
                 'hsla(180,100%,75%,.7',
                 'hsla(165,100%,75%,.7'],
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
   new Chart("ocean-volume-bar-chart2", {type: "line", data: dataObj2});
  </script>
  </div><!-- end charts div2 -->
</div><!-- END VAVPERCENTCHART2 -->
<div class="container m-4">&nbsp;</div>

<div class="container text-center" id="vacpercentchart3">
 <!-- chart data -->
 <h2>
   Canada December 2021 Cases
 </h2>
 <?php
 $cfile = 'https://api.opencovid.ca/timeseries?stat=cases&loc=canada&after=01-12-2021&';
$cjson = $characters = json_decode(file_get_contents($cfile), true);
ini_set("allow_url_fopen", 1);

$responsec = json_decode($cjson, true); //because of true, it's in an array
//$array = $characters['cases'];
 //foreach ($characters['cases'] as $key) {
 //     echo $key['cases']; 
  //    echo $key['date_report'];
  //    echo '<br>';
 //   }
//echo '<hr>';
//or print whole array
//print_r($array);

//foreach ($responsec as $key => &$value) {
//    if (array_key_exists('date_of_birth', $value)) {
 //       $oDate = DateTime::createFromFormat('Y-m-d', $value['date_of_birth']);
//        $value['date_of_birth'] = $oDate->format('d-m-Y');
 //   }
//}

//file_put_contents('results_new.json', json_encode($characters));

//print_r($characters);
 //https://api.opencovid.ca/timeseries?stat=cases&loc=canada&after=01-12-2021&
 ?>
 <!-- end chart data -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <div id="charts3"><canvas id="ocean-volume-bar-chart3" width="600" height="400"></canvas>
 <script>
   const labels3 = [<?php foreach ($characters['cases'] as $key1) {
     echo "'".$key1['date_report']."', ";
    }?>]
   const volumes3 = [<?php foreach ($characters['cases'] as $key) {
      echo $key['cases']; 
      echo ',';
    }?>];

   const dataObj3 = {
       labels: labels3,
       datasets: [
           {
               label: "Cases During December 2021",
               data: volumes3,
               borderWidth: 2,
                backgroundColor: [
                 'hsla(260,100%,75%,.7',
                 'hsla(245,100%,75%,.7',
                 'hsla(230,100%,75%,.7',
                 'hsla(210,100%,75%,.7',
                 'hsla(195,100%,75%,.7',
                 'hsla(180,100%,75%,.7',
                 'hsla(165,100%,75%,.7'],
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
   new Chart("ocean-volume-bar-chart3", {type: "bar", data: dataObj3});
  </script>
  </div><!-- end charts div2 -->
</div><!-- END VAVPERCENTCHART2 -->
<div class="container" id="Tests">
    <?php
    require 'tests.php';
    ?>
</div>
<div class="container">&nbsp;</div>
<div class="container" id="Fatalities">
    <?php
    require 'fatality.php';
    ?>
</div>
<div class="container" id="Vaccines">
    <?php
    include 'vaccines.php';
    ?>

    <!-- https://data.ontario.ca/api/3/action/datastore_search?resource_id=eed63cf2-83dd-4598-b337-b288c0a89a16

-->
<!-- https://data.ontario.ca/api/3/action/datastore_search?resource_id=eed63cf2-83dd-4598-b337-b288c0a89a16

-->
    
</div><!-- end casebyvax Cases of covid per vaccination status -->
<div class="container m-4">&nbsp;</div>

<div class="container" id="footer">
    <div class="row">
    <div class="p-3 col-sm-3 text-center">
        <a href="https://github.com/sandorfalot/booster">GitHub <i class='fab fa-github' style='font-size:40px;'></i></a>
 <p><a href="http://goawaycovid19.org">Go Away Covid</a>
        <br><a href="http://loomknitting.org">Loom Knitting</a>
        <br>        <a href="mailto:sandorfalot@gmail.com">Contact Me</a>
</p>
    </div><!-- cols sm 4 1 -->
    
     <div class="p-3 col-sm-4 text-center">
      
       
       <small>
           <p>Used the <a href="https://opencovid.ca/api/">CCODWG API</a>, Open Covid, for some data.</p>
           <p><a href="https://data.ontario.ca">Open Data Ontario</a> by the government.</p>
           <p>
               <a href="https://api.covid19tracker.ca">api.covidtracker.ca</a> for more.
           </p>
          
       </small>
     
    </div><!-- cols sm 4 2 -->
     <div class="p-3 col-sm-4 text-center">
      
       
       <small>
           
           <p><a href="https://jsonformatter.org/json-parser">This handy</a> JSON parser.</p>
<p>
    <a href="https://www.chartjs.org/">ChartJS too</a>
</p>
       </small>
     
    </div><!-- cols sm 4 2 -->
    
  </div>  <!-- end row -->
</div><!-- end footer -->
</body>
</html>
