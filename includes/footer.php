<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery.js"></script>

<script>
    var current_path = window.location.pathname.split('/').pop();

    $('.nav-link').each(function () {
        if($(this).attr('href') === current_path){
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    })

    if(current_path === '') {
        $('.nav-home').addClass('active')
    }
</script>

</body>

</html>