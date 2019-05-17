<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Link to the CSS file-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>

    <!-- Link to External Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>



<body>




    <!-- Navigation bar -->
    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">

        <div class="p-0 container ">


            <a class="navcolor navbar-brand " href="#">Movie Hunter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a id="currentpage" class="navcolor nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="navcolor nav-link" href="#">Explore<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="navcolor nav-link" href="#">My Movies <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="navcolor nav-link" href="#">Search <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="navcolor nav-link" href="#">Start <span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item active">
                         <a class="navcolor nav-link" href="includes/logout.php">Logout <span class="sr-only">(current)</span></a></li>';
                    } else {
                        echo '<li class="nav-item active">
                         <a class="navcolor nav-link" href="support/loginform.php">Login <span class="sr-only">(current)</span></a></li>';
                    }
                    ?>


                </ul>
                <ul class=" nav navbar-nav navbar-right">
                    <li class="nav-item active"><a class="nav-link" href="#">
                            <?php
                            if (isset($_SESSION['email']))
                                echo "Hi, " . ucfirst($_SESSION['fname']);
                            ?> <span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
        </div>
        <!-- End of Navigation Bar -->
    </nav>




    <!-- The content should be inside the container -->
    <div class="container">

        <div class="jumbotron mt-4">
            <div class="container">
                <h1 class="display-4">Recommending movies based on your taste</h1>
                <div class="row">
                    <div class="col-4 border-info" style="border-right: solid 3px;">
                        <button class="bg-info">Spin the Rulette</button>
                    </div>
                    <div class="col-4 ">
                        <button class="bg-info" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Generate Movies</button>

                    </div>
                    <div class="col-4  border-info" style="border-left: solid 3px;">
                        <button class="bg-info">Random Movie</button>
                    </div>

                </div>
            </div>
        </div>








        <!-- The Movie Generator Form -->


        <div id="id03" class="modal">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="***">
                <div class="container">
                    <h1>Customize your preferences!</h1>
                    <p>Please fill in this form according to your preferences.</p>
                    <hr>

                    <b>Genres</b>
                    <br>
                    <input type="checkbox" name="genres" value="action">
                    <input type="checkbox" name="genres" value="horror">
                    <input type="checkbox" name="genres" value="drama">
                    <input type="checkbox" name="genres" value="thriller">
                    <input type="checkbox" name="genres" value="romance">
                    <input type="checkbox" name="genres" value="fantasy">
                    <br>
                    <label for="action">Action</label>
                    <label for="horror">Horror</label>
                    <label for="drama">Drama</label>
                    <label for="thriller">Thriller</label>
                    <label for="romance">Romance</label>
                    <label for="fantasy">Fantasy</label>
                    <br>

                    <label for="rating"><b>Rating</b></label><br>
                    <div class="slidecontainer">
                        <input name="rating" type="range" min="0" max="5" value="0" class="slider" id="myRange">
                        <p>Value: <span id="demo"></span></p>
                    </div>

                    <label for="year"><b>Year:</b></label><br>
                    <select id="year" name="year">
                        <option value="2020">-</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                        <option value="1938">1938</option>
                        <option value="1937">1937</option>
                        <option value="1936">1936</option>
                        <option value="1935">1935</option>
                        <option value="1934">1934</option>
                        <option value="1933">1933</option>
                        <option value="1932">1932</option>
                        <option value="1931">1931</option>
                        <option value="1930">1930</option>
                        <option value="1929">1929</option>
                        <option value="1928">1928</option>
                        <option value="1927">1927</option>
                        <option value="1926">1926</option>
                        <option value="1925">1925</option>
                        <option value="1924">1924</option>
                        <option value="1923">1923</option>
                        <option value="1922">1922</option>
                        <option value="1921">1921</option>
                        <option value="1920">1920</option>
                        <option value="1919">1919</option>
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                        <option value="1912">1912</option>
                        <option value="1911">1911</option>
                        <option value="1910">1910</option>
                        <option value="1909">1909</option>
                        <option value="1908">1908</option>
                        <option value="1907">1907</option>
                        <option value="1906">1906</option>
                        <option value="1905">1905</option>
                        <option value="1904">1904</option>
                        <option value="1903">1903</option>
                        <option value="1902">1902</option>
                        <option value="1901">1901</option>
                        <option value="1900">1900</option>
                    </select>



                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            // Get the modal
            var modal3 = document.getElementById('id03');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal3) {
                    modal3.style.display = "none";
                }
            }
        </script>

        <script>
            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
            }
        </script>


        <!-- End of Movie Generator Form -->

        <!-- Body of Home Page -->
        <div id="homeBody">

            <hr id="customHr" class="mt-3">


            <h2 class=" ml-5">Generate your Taste</h2>
            <div class="row">

                <div class="col-8 mt-4">
                    <p>Do you love movies as much as you love making cool websites? Then, boy – have we got the lorem ipsum for you! Our badass text generator will give you the best lines from some of the hardest Hollywood legends – we’re talking Eastwood, Caine, Carrey and Freeman – and mix them up ready to work their magic on your new website. In fact, we reckon you’ll love Picksum Ipsum so much, you might never want to replace it with real text.

                    </p>
                </div>
                <div class="col-3">
                    <div id="generateCard" class="card  text-center">
                        <div class="card-body ">

                            <a href="#" class="btn btn-info ">Generate</a>
                        </div>
                    </div>
                </div>
            </div>



            <hr id="customHr">
            <h2 class="text-center ml-5">Try the Rulette game</h2>
            <div class="row">
                <div class="col-3">
                    <div id="spinCard" class="card  text-center">
                        <div class="card-body p-2">

                            <a href="#" class="btn btn-info ">Spin </a>
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-4">
                    <p>Do you love movies as much as you love making cool websites? Then, boy – have we got the lorem ipsum for you! Our badass text generator will give you the best lines from some of the hardest Hollywood legends – we’re talking Eastwood, Caine, Carrey and Freeman – and mix them up ready to work their magic on your new website. In fact, we reckon you’ll love Picksum Ipsum so much, you might never want to replace it with real text.

                    </p>
                </div>

            </div>


            <hr id="customHr">

            <h2 class=" ml-5">Completely Random Movie</h2>
            <div class="row">

                <div class="col-8 mt-4">
                    <p>Do you love movies as much as you love making cool websites? Then, boy – have we got the lorem ipsum for you! Our badass text generator will give you the best lines from some of the hardest Hollywood legends – we’re talking Eastwood, Caine, Carrey and Freeman – and mix them up ready to work their magic on your new website. In fact, we reckon you’ll love Picksum Ipsum so much, you might never want to replace it with real text.

                    </p>
                </div>
                <div class="col-3">
                    <div id="randomCard" class="card  text-center">
                        <div class="card-body ">

                            <a href="#" class="btn btn-info">Randomize</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr id="customHr" class="mb-0">

            <p class="text-center text-info ">Go back to top</p>
        </div>
        <!-- End of Body of Home Page -->

        <!-- End of container -->

    </div>
    <!-- Footer -->
    <footer class="bg-dark">

        <h3 class="text-light text-center pt-4 h6">This is a footer</h3>

    </footer>
    <!-- Footer -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>