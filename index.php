<!doctype html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Bootstrap Scraper Site</title>
</head>

<body>

<div class="container-fluid">
  <div class="row">
    <div class="col">
    <?php
    $conn = include ('connect.php');
    ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <h1> Police Blotter Database (NW CT) </h1>
    </div>
  </div>


      <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES|ENT_HTML5, "UTF-8"); ?> method="get">
        <div class="form-row">
          <div class="col-auto">
            <label for="form_type">What to search for: </label>
            <select id='form_type' name='form_type' class='form-control'>;
            <?php include "select_box.php"?>
            </select>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="input_box">Search box: </label>
              <input type="text" id="input_box" name="input" autofocus autocomplete="off" class="form-control">
            </div>
          </div>
        </div>
        <button type="submit" id="search_btn" class="btn btn-primary">Search</button>
      </form>
  <div class="row">
    <div class="col">
    <?php
      include 'sql_search.php';
      ?>
    </div>
  </div>




  <div class="row">
    <div class="col">
      <div id="welcomeDiv"  hidden="true" class="answer_list"></div>
      <script>
        function showDiv($index) {
          document.getElementById($index).hidden = false;
        }
        function hideDiv() {
          document.getElementById("welcomeDiv").hidden = true;
        }
      </script>

      </div>
      </div>
      </div>






</body>
<?php
$conn->close;
?>
</html>