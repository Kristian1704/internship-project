<?php
session_start();
if ($_SESSION['Roli'] != 'admin') {
    header('Location:' . 'http://localhost/Projekti/' . 'index.php');
}
require_once "produktetBack.php";
?>

<br><br>
<div class="container">
    <table class="table" border="1" id="customers">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col" style="text-align: center">Product name</th>
            <th scope="col" style="text-align: center">Total</th>
            <th scope="col" style="text-align: center">Sales</th>
            <th scope="col" style="text-align: center">Stocks</th>
            <th scope="col" style="text-align: center">Costs</th>
            <th scope="col" style="text-align: center">Revenue</th>
            <th scope="col" style="text-align: center">Balance</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $k = 0;
        foreach ($products['product_details'] as $key => $row) {

            $totali_produkteve += $row['sasia_totale_produkteve'];
            $totali_shitur += $row['sasia_total_shitur'];
            $totali_mbetur += $row['sasia_totale_mbetur'];
            $shpenzmiet_totale += $row['shpenzimet_totale'];
            $totali_xhiros += $row['sasia_totale_lekeve_xhiro'];
            $balanca += $row['balanca'];
            $k++;
            ?>
            <tr>
                <td>
                    <button type="button" id="plusi_<?= $row['id'] ?>" onclick="toggleTable('<?= $row['id'] ?>')"
                            class="btn btn-plus"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                </td>
                <!--                    Mbushim tabelen me te dhenat perkatese -->
                <td><?= $row['emri_produktit'] ?></td>
                <td><?= $row['sasia_totale_produkteve'] ?> products</td>
                <td><?= $row['sasia_total_shitur'] ?> products</td>
                <td><?= $row['sasia_totale_mbetur'] ?> products</td>
                <td><?= $row['shpenzimet_totale'] ?> leke</td>
                <td><?= $row['sasia_totale_lekeve_xhiro'] ?> leke</td>
                <td><?= $row['balanca'] ?> leke</td>

            </tr>
            <td colspan="8" class="hide_row" id='tabela_<?= $row['id'] ?>'>

                <div class="col-12">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Brand</th>
                            <th>Purchases</th>
                            <th>Sales</th>
                            <th>Price</th>
                            <th>Selling price</th>
                            <th>Costs</th>
                            <th>Revenue</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($row['details'] as $key2 => $row2){
                        ?>
                        <tr>
                            <td>
                                <button type="button" id="plusi_i<?= $row2['id_markes'] ?>"
                                        onclick="toggleTable_i('<?= $row2['id_markes'] ?>')"
                                        class="btn btn-plus"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td><?= $row2['marka'] ?></td>
                            <td><?= $row2['sasia_mallit_blere'] ?> products</td>
                            <td><?= $row2['sasia_shitur_mall'] ?> products</td>
                            <td><?= $row2['cmimi_bler'] ?> leke</td>
                            <td><?= $row2['cmimi_shitjes'] ?> leke</td>
                            <td><?= $row2['cmimi_blerjeve'] ?> leke</td>
                            <td><?= $row2['xhiro'] ?> leke</td>
                            <td><?= $row2['balanca_baze_produkti'] ?> leke</td>
                        </tr>
                        <td colspan="10" class="hide_row_i" id='tabela_i<?= $row2['id_markes'] ?>'>

                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Purchases</th>
                                        <th>Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($row2['user_data'] as $key3 => $row3){
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $row3['emri'] ?></td>
                                        <td><?= $row3['data_blerjes_klienti'] ?></td>
                                        <td><?= $row3['sasia_blere_klienti'] ?> products</td>
                                        <td><?= $row3['sasia_lekeve_shpenzuar'] ?> leke</td>

                                    </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </td>
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </td>
        <?php } ?>


        <tr style="background-color:#20c997;border-top-style:solid">
            <td><i class="fa fa-table" aria-hidden="true"></i>Totali</td>
            <td><i class="fa fa-shopping-basket" aria-hidden="true"></i><a href="index.php?page=Produktet&ids=<?php
                foreach ($products['product_details'] as $key => $row) {
                    echo $row['id'] . ";";
                } ?>" target="_blank">(<?= $k ?>) Products</a></td>
            <td><?= $totali_produkteve ?> products</a></td>
            <td><?= $totali_shitur ?> products</td>
            <td><?= $totali_mbetur ?> products</td>
            <td><?= $shpenzmiet_totale ?> leke</td>
            <td><?= $totali_xhiros ?> leke</td>
            <td><?= $balanca ?> leke</td>

        </tr>
    </table>
</div>

<br><br>
<div class="container">
    <div class="table-responsive">
        <table class="table" border="1" id="customers">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">User</th>
                <th scope="col">Total purchases</th>
                <th scope="col">Total cost</th>
                <th scope="col">Average per product</th>

            </tr>
            </thead>

            <tbody>


            <?php
            foreach ($products['user_details']

                     as $key => $row) {
                $n++;
                $totali_blere += $row['totali_sasi_blere'];
                $totali_shpenzimeve += $row['kosto_totale'];
                $totali_mesatares = $totali_shpenzimeve / $totali_blere;
                ?>
                <tr>
                    <td>
                        <button type="button" id="plusi_w<?= $row['id_bleresit'] ?>"
                                onclick="toggleTable3('<?= $row['id_bleresit'] ?>')"
                                class="btn btn-plus"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    </td>
                    <!--                    Mbushim tabelen me te dhenat perkatese -->
                    <td><?= $row['emri_bleresit'] ?></td>
                    <td><?= $row['totali_sasi_blere'] ?> products</td>
                    <td><?= $row['kosto_totale'] ?> leke</td>
                    <td><?= round($row['mesatarja'], 2) ?> leke</td>


                </tr>

                <td colspan="8" class="hide_row2" id='tabela_w<?= $row['id_bleresit'] ?>'>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Total purchases</th>
                                <th>Total cost</th>
                                <th>Average</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $k = 0;
                            foreach ($row['produkti'] as $key2 => $row2) {
                                ?>
                                <tr>
                                    <td>
                                        <button type="button" id="plusi_a<?= $row2['id_tabel'] ?>"
                                                onclick="toggleTable4('<?= $row2['id_tabel'] ?>')"
                                                class="btn btn-plus"><i class="fa fa-plus-circle"
                                                                        aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td><?= $row2['emri_produktit'] ?></td>
                                    <td><?= $row2['totali_blere'] ?> products</td>
                                    <td><?= $row2['totali_kosto_blere'] ?> leke</td>
                                    <td><?= round($row2['mesatarja/produkt'], 2) ?> leke</td>

                                </tr>
                                <td colspan="8" class="hide_row3" id='tabela_a<?= $row2['id_tabel'] ?>'>

                                    <div class="col-12 container">
                                        <table class="table table-striped ">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th></th>
                                                <th>Brand</th>
                                                <th>Purchases</th>
                                                <th>Price per product</th>
                                                <th>Total cost</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $l = 0;
                                            foreach ($row2['marka'] as $key3 => $row3){
                                            ?>
                                            <tr>
                                                <td>
                                                    <button type="button" id="plusi_c<?= $row3['id_efundit '] ?>"
                                                            onclick="toggleTable5('<?= $row3['id_efundit'] ?>')"
                                                            class="btn btn-plus"><i class="fa fa-plus-circle"
                                                                                    aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td><?= $row3['marka'] ?></td>
                                                <td><?= $row3['sasia_blere'] ?> products</td>
                                                <td><?= $row3['cmimi/cope'] ?> leke/products</td>
                                                <td><?= $row3['kosto'] ?> leke</td>
                                            </tr>
                                            </tbody>

                                            <td colspan="8" class="hide_row5" id='tabela_b<?= $row3['id_efundit'] ?>'>

                                                <div class="col-12 container">
                                                    <table class="table table-striped ">
                                                        <thead class="thead-dark">
                                                        <tr>

                                                            <th style="text-align: center;">Date</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $r = 0;
                                                        foreach ($row3['data'] as $key4 => $row4){
                                                        ?>
                                                        <tr>

                                                            <td style="text-align: center"><?= $row4['data'] ?></td>
                                                        </tr>
                                                        </tbody>

                                                        <?php
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                </td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </td>
                <?php
            }
            ?>
            <tr style="background-color:#20c997;border-top-style:solid">
                <td><i class="fa fa-table" aria-hidden="true"></i>Total</td>

                <td><i class="fa fa-user" aria-hidden="true"></i><a href="index.php?page=userlist&ids=<?php
                    foreach ($products['user_details']

                             as $key => $row) {
                        echo $row['id_bleresit'] . ";";
                    } ?>" target="_blank">(<?= $n ?>) Users</a></td>
                <td><?= $totali_blere ?> products</td>
                <td><?= $totali_shpenzimeve ?> leke</td>
                <td><?= round($totali_mesatares, 2) ?> leke</td>
            </tr>

            </tbody>
        </table>
    </div>