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
            <select id='form_type' name='form_type' class='form-control' onchange="changeSearchBox('input_box', 'form_type')">;
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
</div>
<script>
    let on_flag = null;
    function showDiv(index) {
      if (on_flag !== null){
        document.getElementById(on_flag).hidden = true;
      }
      if (on_flag === index) {
        on_flag = null
      }
      else{
        document.getElementById(index).hidden = false;
        on_flag = index;
      }
    }
</script>

  <script>
    function changeSearchBox(sBoxId, selfId){
      sBox = document.getElementById(sBoxId);
      self = document.getElementById(selfId)
      formType = self.value
      sBox.placeholder = setHint(formType);
    }

    function setHint(formType){
      switch(formType){
        case "last_name":
          return "Smith";
          break;
        case "first_name":
          return "John";
          break;
        case "date":
          return "YYYY-MM-DD";
          break;
        case "pdcity":
          return "Torrington";
          break;
      }
    }

    changeSearchBox("input_box", "form_type");
  </script>
</body>
<?php
$conn->close;
?>
</html>
