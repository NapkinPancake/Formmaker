<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wanna get this job</title>

    
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

    <script src="js/inputmask.js"></script>
    <script src="js/ajax/functions.js"></script>
</head>


<body>

    <div class="row">
        <div class="col"></div>

        <div class="col-xl-3 col-lg-3 col-md-2 col-sm-4 text-center">
            <?php include 'modules/form.php'; ?>
        </div>


        <div class="col-xl-8 col-lg-7 col-md-9 col-sm-8 text-center">
            <div class="form-inline my-2">
                <button id='sortByCreating' class="btn btn-outline-dark ">Sort by creating date</button>
                <button id='sortByCompleting' class="btn btn-outline-dark mx-3 ">Sort by completing date</button>
                <input type="text" name="search" placeholder="Search" value="" class="search ml-3 form-control " aria-label="Search" autocomplete="off">
                <ul class="searchResult"></ul>
            </div>
             
            <div id='tableplace'></div>
        </div>

        <div class="col"></div>

    </div>
</body>

</html>