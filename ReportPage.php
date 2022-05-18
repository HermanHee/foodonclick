<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include "includes/headerManager.php";
require_once "vendor/autoload.php";
require_once  "class/Order.php";
require_once "class/Reservation.php";


if(isset($_POST['generate'])){


    $duration = $_POST['duration'];
    $report_type = $_POST['report_type'];

    if($report_type === 'order'){
        $results = Order::getOrders(parse_duration($duration));
        if($results->num_rows > 0){
            $filename = 'reports/orders/'.generate_order_report($results);
        }else{
            $message = '<span class="text-danger">There is no record.</span>';
        }
    }

    if($report_type === 'reservation'){
        $results = Reservation::getReservation(parse_duration($duration));
        if($results->num_rows > 0){
            $filename = 'reports/reservations/'.generate_reservation_report($results);
        }else{
            $message = '<span class="text-danger">There is no record.</span>';
        }
    }

}// main if ends here

function parse_duration($duration){
    $duration = explode('-', $duration);
    return [
      'start_date' => date('Y-m-d', strtotime($duration[0])),
      'end_date' => date('Y-m-d', strtotime($duration[1])),
    ];
}

function generate_order_report($data){
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Full name');
    $sheet->setCellValue('B1', 'Phone');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Delivery Location');
    $sheet->setCellValue('E1', 'Total Price');
    $row = 2;
    while ($result = $data->fetch_assoc()){
        $sheet->setCellValue('A'.$row, $result['fname'].' '.$result['lname']);
        $sheet->setCellValue('B'.$row, $result['contact']);
        $sheet->setCellValue('C'.$row, $result['email']);
        $sheet->setCellValue('D'.$row, $result['loc']);
        $sheet->setCellValue('E'.$row, $result['total_price']);
        $row++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = md5(uniqid()).'.'.'xlsx';

    $writer->save('reports/orders/'.$filename);
    return $filename;
}


function generate_reservation_report($data){
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Full name');
    $sheet->setCellValue('B1', 'Phone');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Date Time');
    $sheet->setCellValue('E1', 'Pax');
    $row = 2;
    while ($result = $data->fetch_assoc()){
        $sheet->setCellValue('A'.$row, $result['fname'].' '.$result['lname']);
        $sheet->setCellValue('B'.$row, $result['contact']);
        $sheet->setCellValue('C'.$row, $result['email']);
        $sheet->setCellValue('D'.$row, $result['date_time']);
        $sheet->setCellValue('E'.$row, $result['pax']);
        $row++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = md5(uniqid()).'.'.'xlsx';

    $writer->save('reports/reservations/'.$filename);
    return $filename;
}





?>


<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/standardise.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

<div class="mainheader">
    <header>Data Report</header>
</div>


<div class="container mt-3">
    <form action="" method="post" class="card card-body">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" class="form-control">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="report_type">Report Type</label>
                    <select class="form-control" name="report_type" id="report_type" required>
                        <option value="">Select report type</option>
                        <option value="order">Order</option>
                        <option value="reservation">Reservation</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary" name="generate">Submit</button>
            </div>
        </div>        
    </form>
</div>
<?php if(isset($filename)): ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <div class="text-center">
                    <a href="<?= $filename ?>" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('input[name="duration"]').daterangepicker();
</script>
</body>
</html>

<?php

include "includes/footer.php";

?>
