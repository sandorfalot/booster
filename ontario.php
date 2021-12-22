<div class="row m-4" id="vaxlist">
<?php
$jfile = 'https://data.ontario.ca/api/3/action/datastore_search?offset=100&resource_id=eed63cf2-83dd-4598-b337-b288c0a89a16';
$json = file_get_contents($jfile);
ini_set("allow_url_fopen", 1);

$response1 = json_decode($json, true); //because of true, it's in an array
$data = $response1['result'];
//echo $response1;
//echo $json['result']['records'];
//echo "<br><font style='color:red';>";
foreach ($response1 as $key => $value) {
    //echo end($value);
    $total = end($value);
}
//echo end($value) - 101;
$id = end($value) - 101; // get the total amount of ids and then subtract 100 plus 1 for id being zero
//echo "</font>";
//echo "<br>";
//echo $data['records'][$id]['Date'];
//echo "<br>";
//echo $data['records'];
//echo "<br>";

//echo "<br>";
echo '<table class="table table-bordered table-hover shadow">';
echo '<thead class="table-primary">';
echo '<tr>';
echo '<th>';
echo '<h3><strong>Vaccination Status</strong></h3>';
echo '</th>';
echo '<th class="text-center">';
echo "<h3><strong>Cases</strong></h3> ";
echo '</th>';
echo '<th class="text-center">';
echo "<h3><strong>7 Day Average</strong></h3> ";
echo '</th>';
echo '<th class="text-center">';
echo '<h3><strong>Cases Per 100,000</strong></h3>';
echo '</th>';
echo '</tr>';
echo '<tbody>';
echo '<tr>';
echo '<td class="table-danger">';
echo '<strong>Unvaccinated</strong>';
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['covid19_cases_unvac'];
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['cases_unvac_rate_7ma'];
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['cases_unvac_rate_per100K'];
echo '</td>';
echo '</tr>';


echo '<tr>';
echo '<td class="table-warning">';
echo '<strong>Partially Vaccinated</strong>';
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['covid19_cases_partial_vac'];
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['cases_partial_vac_rate_7ma'];
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['cases_partial_vac_rate_per100K'];
echo '</td>';
echo '<tr>';
echo '<td class="table-success">';
echo '<strong>Fully Vaccinated</strong>';
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['covid19_cases_full_vac'];
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['cases_full_vac_rate_7ma'];
echo '</td>';
echo '<td class="text-center">';
echo $data['records'][$id]['cases_full_vac_rate_per100K'];
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="table-secondary">';
echo '<strong>Unknown</strong>';
echo '</td>';
echo '<td colspan="4">';
echo $data['records'][$id]['covid19_cases_vac_unknown'];

echo '</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';



echo "<br>";

?>
