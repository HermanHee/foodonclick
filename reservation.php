<?php

include "includes/header.php";
include "class/Reservation.php";

if(isset($_POST['confirm-order'])) {
    $_SESSION['reservation'] = $_POST;

    echo '<script>location.href = "summary.php"</script>';
}


if(isset($_POST['pre-order'])) {
    $_SESSION['reservation'] = $_POST;

    echo '<script>location.href = "preorder-menu.php"</script>';
}

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-5 px-2 py-3">

                        <div class="row">
                            <div class="col-lg-12 ">
                                <form action="" method="post" class="card-container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2 class="heading-secondary">
                                                Reservation
                                            </h2>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">First Name</label>
                                                <input required type="text" name="fname" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                                <input required type="text" name="lname" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                                <input required placeholder="82543456" type="text" pattern="[89][0-9]{7}" name="contact" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                                <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 d-flex flex flex-column">
                                                <label for="exampleInputEmail1" class="form-label">Date and Time</label>
                                                <div class="w-100">
                                                    <input required class=" style-input" type="datetime-local" id="birthdaytime"
                                                        name="date-time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 d-flex flex flex-column">
                                                <div class="">
                                                    <label for="exampleInputEmail1" class="form-label">Select
                                                        Pax</label>
                                                </div>
                                                <div class="w-100">
                                                    <select required name="pax" class="form-select style-input"
                                                        aria-label="Default select example">
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="4">Four</option>
                                                        <option value="5">Five</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" name="pre-order" class="order-btn text-white "><a>Pre Order</a></button>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" name="confirm-order" class="order-btn text-white"><a>Confirm</a></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php

include "includes/footer.php";

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('input[name="date-time"]').on('change', function () {
            let date_time = $(this).val();
            $.ajax({
                type: "POST",
                url: 'ajax.php',
                data: {date_time},
                success: function(response)
                {
                    console.log(response);
                    var jsonData = JSON.parse(response);
                    // console.log(jsonData);
                    if(jsonData.msg === 'not-available') {
                        alert('Sorry! No table available in this time slot.');
                        $('button[name="confirm-order"]').prop('disabled', true);
                        $('button[name="pre-order"]').prop('disabled', true);
                    } else if(jsonData.msg === 'wrong-date') {
                        alert('Please choose correct date!');
                        $('button[name="confirm-order"]').prop('disabled', true);
                        $('button[name="pre-order"]').prop('disabled', true);
                    } else {
                        $('button[name="confirm-order"]').prop('disabled', false);
                        $('button[name="pre-order"]').prop('disabled', false);
                    }
                }
            });
        })
    })
</script>
