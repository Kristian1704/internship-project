<?php
session_start();
if ($_SESSION['Roli'] != 'admin') {
    header('Location:' . 'http://localhost/Projekti/' . 'index.php');
}

require_once "db.php";
require_once "back.php";
//require_once "functions.php";
?>
<br><br><br>
<link rel="stylesheet" href="paga/style.css">
<div class="table-responsive mx-3">
    <table class="table " id="customers">
        <thead class="bottomBorder">
        <tr>
            <th scope="col" colspan="2" style="text-align: center; padding-bottom: 50px;" rowspan="2">Emer Mbiemer</th>
            <th scope="col" colspan="3" style="text-align: center">Oret IN</th>
            <th scope="col" colspan="3" style="text-align: center">Oret OUT</th>
            <th scope="col" colspan="3" style="text-align: center">Oret Totale</th>
            <th scope="col" colspan="4" style="text-align: center">Pagesa IN</th>
            <th scope="col" colspan="4" style="text-align: center">Pagesa OUT</th>
            <th scope="col" style="text-align: center; padding-bottom: 50px;background-color: red" rowspan="2">Pagesa totale</th>
        </tr>

        <tr style="background-color: #20c997;font-family:'Times New Roman';">
            <td>Oret Dite Jave</td>
            <td>Oret Fundjave</td>
            <td>Oret Ditepushimi</td>
            <td>Oret Dite Jave</td>
            <td>Oret Fundjave</td>
            <td>Oret Ditepushimi</td>
            <td>Totali In</td>
            <td>Totali Out</td>
            <td>Totali</td>
            <td>Paga Dite Jave</td>
            <td>Paga Fundjave</td>
            <td>Paga Ditepushimi</td>
            <td>Totali</td>
            <td>Paga Dite Jave</td>
            <td>Paga Fundjave</td>
            <td>Paga Ditepushimi</td>
            <td>Totali</td>

        </tr>
        </thead>
        <tbody>


        <?php
        $n = 0;
        $totali_user_in = 0;
        $totali_user_out = 0;
        $totali_user_pagaIn = 0;
        $totali_user_pagaOut = 0;
        $totali_in_hours = 0;


        foreach ($user_data as $key => $row) {
            //Totali i seciles kolone
            $totali_user_in_j += $row['oret_Inj'];
            $totali_user_in_p += $row['oret_Indp'];
            $totali_user_out_j += $row['oret_Outj'];
            $totali_user_out_p += $row['oret_Outdp'];
            $totali_user_in_s += $row['oret_Inds'];
            $totali_user_out_s += $row['oret_Outds'];
            $totali_user_in += $row['oret_Intot'];
            $totali_user_out += $row['oret_Outtot'];
            $totali_user = $totali_user_in + $totali_user_out;
            $totali_user_pagaIn_j += $row['Pagesa_Indj'];
            $totali_user_pagaIn_p += $row['Pagesa_Indp'];
            $totali_user_pagaIn_s += $row['Pagesa_Inds'];
            $totali_user_pagaOut_s += $row['Pagesa_Outds'];
            $totali_user_pagaOut_j += $row['Pagesa_Outdj'];
            $totali_user_pagaOut_p += $row['Pagesa_Outdp'];
            $totali_user_pagaIn += $row['Pagesa_Intot'];
            $totali_user_pagaOut += $row['Pagesa_Outtot'];
            $totali_user_pagaTotale = $totali_user_pagaOut + $totali_user_pagaIn;
            $totali_in_hours += $row['oret_Inj'];
            $n++; ?>
            <tr style="background-color:#cff4fc ">
                <td>
                    <button type="button" id="plusi_<?= $row['id'] ?>" onclick="toggleTable('<?= $row['id'] ?>')"
                            class="btn btn-plus" style="background-color: #ffc107 "><i class="fa fa-plus" aria-hidden="true" ></i></button>
                </td>
                <!--                    Mbushim tabelen me te dhenat perkatese -->
                <td><?= $row['emri'] ?></td>
                <td><?= $row['oret_Inj'] ?> or??</td>
                <td><?= $row['oret_Indp'] ?> or??</td>
                <td><?= $row['oret_Inds'] ?>0 or??</td>
                <td><?= $row['oret_Outj'] ?> or??</td>
                <td><?= $row['oret_Outdp'] ?> or??</td>
                <td><?= $row['oret_Outds'] ?> 0 or??</td>
                <td><?= $row['oret_Intot'] ?> or??</td>
                <td><?= $row['oret_Outtot'] ?> or??</td>
                <td><?= $row['oret_Indp'] + $row['oret_Inds'] + $row['oret_Inj'] ?> ore</td>
                <td><?= $row['Pagesa_Indj'] ?> lek??</td>
                <td><?= $row['Pagesa_Indp'] ?> lek??</td>
                <td><?= $row['Pagesa_Inds'] ?> lek??</td>
                <td><?= $row['Pagesa_Intot'] ?> lek??</td>
                <td><?= $row['Pagesa_Outdj'] ?> lek??</td>
                <td><?= $row['Pagesa_Outdp'] ?> lek??</td>
                <td><?= $row['Pagesa_Outds'] ?> lek??</td>
                <td><?= $row['Pagesa_Outdj'] + $row['Pagesa_Outdp'] + $row['Pagesa_Outds'] ?> lek??</td>

                <td style="background-color:red "><?= $row['Pagesa_Intot'] + $row['Pagesa_Outtot'] ?> lek??</td>

            </tr>
            <td colspan="20" class="hide_row" id='tabela_<?= $row['id'] ?>'>

                <div class="col-18">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr >
                            <th>Nr</th>
                            <th>Dite</th>
                            <th>Data</th>
                            <th>OretIN</th>
                            <th>OretOUT</th>
                            <th>OretTotali</th>
                            <th>PagesaIN</th>
                            <th>PagesaOUT</th>
                            <th>Total Pagesa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $k = 0;
                        foreach ($row['Details'] as $key2 => $row2){
                        $k++; ?>
                        <tr style="background-color:#cff4fc ">
                            <td> <?= $k; ?></td>
                            <td><?= $row2['lloji'] ?></td>
                            <td> <?= $row2['single_date'] ?>   </td>
                            <td> <?= $row2['oret_In'] ?> or??</td>
                            <td> <?= $row2['oretOut'] ?> or??</td>
                            <td><?= $row2['oret_In'] + $row2['oretOut'] ?> or??</td>
                            <td> <?= $row2['Pagesa_In'] ?> lek??</td>
                            <td> <?= $row2['Pagesa_Out'] ?> lek??</td>
                            <td> <?= $row2['Pagesa_In'] + $row2['PagesaOut'] ?> lek??</td>
                        </tr>
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </td>
            <?php
        } ?>
        </tbody>
        <tfoot>
        <tr style="background-color:lightslategray">
            <!--                Mbushim nen tableen me te dhenat perkates-->
            <td style="background-color:dimgrey ">Totali</td>
            <td>Nr-><?= $n ?></td>
            <td><?= $totali_user_in_j ?> or??</td>
            <td><?= $totali_user_in_p ?> or??</td>
            <td><?= $totali_user_in_s ?> or??</td>
            <td><?= $totali_user_out_j ?> or??</td>
            <td><?= $totali_user_out_p ?> or??</td>
            <td><?= $totali_user_out_s ?> or??</td>
            <td><?= $totali_user_in ?> or??</td>
            <td><?= $totali_user_out ?> or??</td>
            <td><?= $totali_user_out + $totali_user_in ?> or??</td>
            <td><?= $totali_user_pagaIn_j ?> lek??</td>
            <td><?= $totali_user_pagaIn_p ?> lek??</td>
            <td><?= $totali_user_pagaIn_s ?> lek??</td>
            <td><?= $totali_user_pagaIn ?> lek??</td>
            <td><?= $totali_user_pagaOut_j ?> lek??</td>
            <td><?= $totali_user_pagaOut_p ?> lek??</td>
            <td><?= $totali_user_pagaOut_s ?> lek??</td>
            <td><?= $totali_user_pagaOut_j + $totali_user_pagaOut_p ?> lek??</td>
            <td style="background-color:red "><?= $totali_user_pagaTotale ?> lek??</td>

        </tr>
        </tfoot>
    </table>
</div>



