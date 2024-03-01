<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Error Page</title>
</head>
<style>
    *
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "poppins";
}

.page_404
{
    padding: 40px 0;
    background: #fff;
    font-family: 'Poppins';
}

.page_404 img
{
    width: 100%;
}

.four_zero_four_bg
{
    background: url('images/bg.gif');
    height: 400px;
    background-position: center;
}

h1
{
    font-size: 80px;
}

h3
{
    font-size: 80px;
}

a
{
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    background: #39ac31;
    display: inline-block;
}

.content_box_404
{
    margin-top: -50px;
}
a:hover
{
    text-decoration: none;
    color: #fff;
}
.button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #614385;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            }

            .button:hover {
            transform: scale(1.1); /* Scale the button by 10% on hover */
            }
</style>
<body>
   <section class="page_404">
       <div class="container">
           <div class="row">
               <div class="col-sm-12">
                   <div class="col-sm-10 col-sm-offset-1 text-center">
                       <div class="four_zero_four_bg">
                           <h1 class="text-center">404</h1>
                       </div>
                       <div class="content_box_404">
                           <h3 class="h2">Looks Like You're Lost</h3>
                           <p>The page you are looking for not available</p>
                           <a href="index.php" class="button">Move To Home Page</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
</body>
</html>