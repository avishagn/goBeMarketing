<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <title></title>  
    </head>
    <body> 
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <h3 id="msH3" class="mb-5 text-info text-center"></h3>
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname">
                    <span class="text-danger" id="errorFname"></span><br>
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname">
                    <span class="text-danger" id="errorLname"></span><br>
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone">
                    <span class="text-danger" id="errorPhone"></span><br>
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email">
                    <span class="text-danger" id="errorEmail"></span><br><br>
                    <button style="width: 100%" class="btn btn-outline-info mb-3" id="submit">Submit</button>
                    <h4 id="msH4" class="text-center"></h4>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="script.js" type="text/javascript"></script>
    </body>
</html>
