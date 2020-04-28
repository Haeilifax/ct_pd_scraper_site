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

  <div class="row">
    <div class="col">
      <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES|ENT_HTML5, "UTF-8"); ?> method="get">
        <div class="form-row">
          <div class="col-auto">
            <label for="first_name_box">First Name</label>
            <input type="checkbox" id="first_name_box" name="form_type" value="first_name">
            <br>
            <label for="last_name_box">Last Name</label>
            <input type="checkbox" id="last_name_box" name="form_type" value="last_name">
            <br>
            <label for="date_box">Date</label>
            <input type="checkbox" id="date_box" name="form_type" value="date">
            <br>
            <label for="pdcity_box">Police Dept. City</label>
            <input type="checkbox" id="pdcity_box" name="form_type" value="pdcity">
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
    </div>
  </div>
  <div class="row">
    <div class="col">
    <?php
      include 'sql_search.php';
      ?>
    </div>
  </div>
</div>

  <script>
    on_flag = null;
    function showDiv(index) {
      document.getElementById(index).hidden = false;
      if (on_flag !== null) {
        document.getElementById(on_flag).hidden = true;
      }
      on_flag = index;
    }
  </script>

</body>
<?php
$conn->close;
?>
</html>
