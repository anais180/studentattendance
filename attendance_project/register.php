<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="d-flex flex-column align-items-center justify-content-center" style="width:100%; min-height: 980px ; background: #C0C0C0">

        <div id="msg" class="alert alert-dismissible fade hidde" role="alert">
            <strong id="msgText"></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="d-flex flex-column" style="width:30%" >

            <div class="d-flex flex-column align-items-center justify-content-center" style="background-color:#FFFF; padding-top: 30px">
                <div class="text-center" style="margin-top:20px; margin-bottom:20px;">
                    <h1 style="text-align:center">Student<br>
                    Attendance</h1>
                </div>
                
                <div style="margin-top:10px; margin-bottom:10px; width:80%">
                    <a  href="#" class="btn btn-primary btn-lg btn-block">Se connecter avec facebook</a>
                </div>

                <div class="row" style="margin-top:30px; margin-bottom:20px; width:80%">
                    <div class="col-5" style="padding-top:10px">
                        <p style="height: 1.25px; background: lightgray"></p>
                    </div>

                    <div class="col-2 text-center" style="color: lightgray">
                        <strong>OU</strong>
                    </div>
                    
                    <div class="col-5" style="padding-top:10px">
                        <p style="height: 1.25px; background: lightgray"></p>
                    </div>
                </div>


                <div style="width:80%; margin-bottom:20px;">
                    <form>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="emailInput" placeholder="Adresse email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="nameInput" placeholder="Nom complet">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Mot de passe">
                        </div>
                        <a  href="#" class="formSubmit btn btn-primary btn-lg btn-block">Iscription</a>
                    </form>
                </div>
                
            </div>
            
        </div>

        <div class="d-flex flex-column align-items-center justify-content-center" style="background-color:#FFFF; margin-top: 10px; text-align:center; border-style: solid; border-width: 1px; border-color: lightgray; height:60px; width:30%">
            <div>
                Vous avez un compte ? <a href="index.php?page=signature">connexion</a>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
    $('.formSubmit').click(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var values = $('form').serialize();

        $.ajax({
            url: "actions/register.php",
            type: "post",
            data: values ,
            dataType: 'JSON',
            success: function (response) {

                $("#msg").removeClass("hidde")
                $("#msg").removeClass("alert-success")
                $("#msg").removeClass("alert-danger")
                $("#msg").addClass("alert-" + response.type + " show")
                $("#msgText").text(response.message)
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            }
        });
    });

    </script>
  </body>
</html>