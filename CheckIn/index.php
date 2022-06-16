<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();
if ($_SESSION['Roli'] != 'admin') {
    header('Location:'.'http://localhost/Projekti/'.'index.php');
}
include_once "header.php";
?>
<style>


</style>
    <div class="content">
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <label><b>Date</b></label>
                <input type="text" name="daterange" id="datafilter" autocomplete="off"
                       class="form-control" placeholder="From to..."/>
            </div>
            <div class="col-md-4">
                <label><b>Name</b></label><br>
                <select class="js-example-basic-single" name="emri" id="emri">
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <button type="button" id="filter_button" class="btn btn-info"><i class="fa fa-search"
                                                                                 aria-hidden="true"></i> Search
                </button>
            </div>
        </div>
        <br><br>
        <table class="table table-striped table-bordered dt-responsive table-hover" id="datatable">
            <thead>
            <tr class="table-primary">
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Last name</th>
                <th scope="col">In hours </th>
                <th scope="col">Out hours</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
        </table>
    </div>
<?php
include_once "footer.php";
?>