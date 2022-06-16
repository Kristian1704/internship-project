<?php
error_reporting(E_ERROR | E_PARSE);
include_once "db.php";


/*
 * Query to get special days
 * */
$offDaysQuery = "SELECT date from off_days";
$resultOffDay = mysqli_query($conn, $offDaysQuery);
if (!$resultOffDay) {
    ?>
    <h1 style="text-align: center;color: Red">Try later</h1>
<?php
    exit;
}

$off_days = array();
while ($row = mysqli_fetch_assoc($resultOffDay)) {
    $off_days[$row['date']]['dite_Pushimi'] = $row['date'];
//echo "<pre>";
//print_r($off_days);
//echo "</pre>";
}


/*
 * Query per te marre te dhenat e userit
 * */
$user_query = "SELECT users.id, users.full_name, users.total_paga, 
working_days.date, working_days.hours FROM users left join working_days  on users.id = working_days.user_id left join off_days on off_days.date=working_days.date";
//echo "<pre>";
//print_r($user_query);
//echo "</pre>";
$result_user = mysqli_query($conn, $user_query);
if (!$result_user){
    ?>
    <h1 style="text-align: center;color: Red">Po behen ndryshime provojeni pak me vone</h1>
    <?php
    exit;
}



$user_data = array();



while ($row = mysqli_fetch_assoc($result_user)){
    $user_data[$row['id']]['id'] = $row['id'];
    $user_data[$row['id']]['emri'] = $row['full_name'];
    $user_data[$row['id']]['oret'] = $row['hours'];
    $user_data[$row['id']]['paga_Tot'] = $row['total_paga'];
    $user_data[$row['id']]['data'] = $row['date'];
//    echo "<pre>";
//print_r($user_data);
//echo "</pre>";

    $paga =  $user_data[$row['id']]['paga_Tot'];
    $dita_pushimit= $user_data[$row['id']]['data'];

    $date = strtotime($dita_pushimit);
    $date = date("l", $date);
    $date = strtolower($date);
    /*
 * Kushtet per ditet perkatese qe ka punuar useri
 * */
    if($date == "saturday" || $date == "sunday") {
        $k_in=1.5;
        $k_out = 2;
        $user_data[$row['id']]['Details'][$row['date']]['lloji']="Fundjave";

        //   calculate in hours for the weekend
//    nqs ka punuar 8 ore ose me pak, jan oret in
//    Nqs ka punuar mbi 8 ore, oret out
        if ($user_data[$row['id']]['oret']>=8){
            $user_data[$row['id']]['oret_Indp'] += 8;

            $user_data[$row['id']]['oret_Outdp'] += ($user_data[$row['id']]['oret'] - 8);
        }
        else{
            $user_data[$row['id']]['oret_Indp'] +=$user_data[$row['id']]['oret'];
        }
    }elseif (isset($off_days[$row['date']]['dite_Pushimi'])){
        $k_in=2;
        $k_out = 2.5;
        $user_data[$row['id']]['Details'][$row['date']]['lloji']="Dite_Speciale";


//    calculate in hours for special days
//    nqs ka punuar 8 ore ose me pak, jan oret in
//    Nqs ka punuar mbi 8 ore, oret out
        if ($user_data[$row['id']]['oret']>=8){
            $user_data[$row['id']]['oret_Inds'] += 8;

            $user_data[$row['id']]['oret_Outds'] += ($user_data[$row['id']]['oret'] - 8);
        }
        else{
            $user_data[$row['id']]['oret_Inds'] +=$user_data[$row['id']]['oret'];

        }
    }
    else{
        $k_in=1;
        $k_out = 1.25;
        $user_data[$row['id']]['Details'][$row['date']]['lloji']="Jave";
        //calculate in hours for week days
        //nqs ka punuar 8 ore ose me pak, jan oret in
        //Nqs ka punuar mbi 8 ore, oret out
        if ($user_data[$row['id']]['oret']>8){
            $user_data[$row['id']]['oret_Inj'] += 8;

            $user_data[$row['id']]['oret_Outj'] += ($user_data[$row['id']]['oret'] - 8);
        }
        else {
            $user_data[$row['id']]['oret_Inj'] += $user_data[$row['id']]['oret'];
            $user_data[$row['id']]['oret_Outj']=0;
        }
    }

    $user_data[$row['id']]['paga_hour']= round($paga/22/8, 2   );

    $pagaIn = $user_data[$row['id']]['paga_hour'];

    if ($user_data[$row['id']]['oret']>8){
        $user_data[$row['id']]['oret_Intot'] += 8;

        $user_data[$row['id']]['oret_Outtot'] += ($user_data[$row['id']]['oret'] - 8);
    }
    else {
        $user_data[$row['id']]['oret_Intot'] += $user_data[$row['id']]['oret'];

    }

    $user_data[$row['id']]['data'] = $row['date'];
    $user_data[$row['id']]['Details'][$row['date']]['oret_Tot'] = $row['hours'];
    if ($user_data[$row['id']]['Details'][$row['date']]['oret_Tot']>8){
        $user_data[$row['id']]['Details'][$row['date']]['oret_In']=8;
        $user_data[$row['id']]['Details'][$row['date']]['oret_Out']=$user_data[$row['id']]['Details'][$row['date']]['oret_Tot']-8;
    }else{
        $user_data[$row['id']]['Details'][$row['date']]['oret_In']=$user_data[$row['id']]['Details'][$row['date']]['oret_Tot'];
        $user_data[$row['id']]['Details'][$row['date']]['oret_Out']=0;
    }
    //Specific data for all days
    $user_data[$row['id']]['Details'][$row['date']]['single_date']=$row['date'];
    $user_data[$row['id']]['Details'][$row['date']]['Pagesa_In'] = $pagaIn*$user_data[$row['id']]['Details'][$row['date']]['oret_In']*$k_in;
    $user_data[$row['id']]['Details'][$row['date']]['Pagesa_Out'] = round($pagaIn*$user_data[$row['id']]['Details'][$row['date']]['oret_Out']*$k_out,2);
   //Total data for all days
    $user_data[$row['id']]['Pagesa_Intot'] +=$user_data[$row['id']]['Details'][$row['date']]['Pagesa_In'];
    $user_data[$row['id']]['Pagesa_Indj'] = $pagaIn*$user_data[$row['id']]['oret_Inj'];
    $user_data[$row['id']]['Pagesa_Outdj'] = $pagaIn*$user_data[$row['id']]['oret_Outj']*1.25;
    $user_data[$row['id']]['Pagesa_Indp'] = $pagaIn*$user_data[$row['id']]['oret_Indp']*1.5;
    $user_data[$row['id']]['Pagesa_Outdp'] = $pagaIn*$user_data[$row['id']]['oret_Outdp']*2;
    $user_data[$row['id']]['Pagesa_Inds'] = $pagaIn*$user_data[$row['id']]['oret_Inds']*2;
    $user_data[$row['id']]['Pagesa_Outds'] = $pagaIn*$user_data[$row['id']]['oret_Outds']*2.5;
    $user_data[$row['id']]['Pagesa_Outtot'] +=$user_data[$row['id']]['Details'][$row['date']]['Pagesa_Out'];
}