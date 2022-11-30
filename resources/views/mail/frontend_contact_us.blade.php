<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Customer mail | NG International</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Mouse+Memoirs&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=BhuTuka+Expanded+One&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Square+Peg&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Tiro+Gurmukhi:ital@1&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=DynaPuff&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Rubik+Distressed&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Silkscreen:wght@400;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

            .email-title {
                position: relative;
                display: flex;
                font-size: 30pt;
                font-family: 'Source Serif Pro', serif;
                text-decoration: none;
                color: #393939;
                text-align: center;
                text-transform: capitalize;
                margin: auto;
                align-items: center;
            }
            .sender-email{
                position: relative;
                display: flex;
                font-size: 14pt;
                font-family: 'Tiro Gurmukhi', serif;
                text-decoration: none;
                color: #393939;
                text-align: center;
                text-transform: none;
            }
            .company-logo{
                width: 250px;
                height: auto;
                display: flex;
                align-content: center;
                align-items: center;
                align-items: center;
                margin-left: auto;
                margin-right: auto;
            }
            .content{
                text-decoration: none;
                font-family: 'Tiro Gurmukhi', serif;
                font-size: 12pt;
                text-align: left;
            }
            a{
                text-decoration: none;
            }
            .container-fluid{
                width: 100%;
            }
            .row{
                width: 100%;
            }
            .col-lg-12{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="email-title text-center display-1">"{{$details['name']}}" Customer Email</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a class="text-decoration-none" href="mailto:{{$details['email']}}"><h4 class="sender-email">Customer email: {{$details['email']}}</h4></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <img class="company-logo" src="{{asset('image/Logo-with-red-color.png')}}" alt="conpany-logo"/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 content">
                    {!! $details['body'] !!}
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>