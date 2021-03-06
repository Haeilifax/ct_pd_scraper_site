<!doctype html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <?php
      require __DIR__ . '/vendor/autoload.php';
      use Symfony\Component\Dotenv\Dotenv;
      $dotenv = new Dotenv();
      $dotenv->load(__DIR__ . "/.env");
    ?>

    <title>Bootstrap Scraper Site</title>
</head>

<body>

<div class="container">
  <div class="row">
    <div class="col">
    <?php
    $conn = include ('connect.php');
    ?>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <h1> Police Blotter Database (NW CT) </h1>
    </div>
  </div>

  <div id="normalSearch">
    <div class="row">
      <div class="col">
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
          <button type="submit" id="norm-search_btn" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button class="btn btn-link btn-sm" onclick="showAdvancedSearch()">Advanced Search</button>
      </div>
    </div>
  </div>

  <div hidden id="advancedSearch">
    <div class="row">
      <div class="col">
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES|ENT_HTML5, "UTF-8"); ?> method="get" onsubmit="validateBoxInputMatch()">
          <div class="form-row">
            <div class="col-auto">
                <label for="first_name_box">First Name</label>
                <input type="checkbox" id="first_name_box" name="first_name_checked" value="first_name">
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3">
                <input type="text" id="first_name_input" name="first_name" autocomplete="off" class="form-control" placeholder="John" onclick="fillCheckbox('first_name_box')">
            </div>
        </div>
        <div class="form-row">
            <div class="col-auto">
                <label for="last_name_box">Last Name</label>
                <input type="checkbox" id="last_name_box" name="last_name_checked" value="last_name">
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3">
                <input type="text" id="last_name_input" name="last_name" autocomplete="off" class="form-control" placeholder="Smith" onclick="fillCheckbox('last_name_box')">

            </div>
        </div>
        <div class="form-row">
            <div class="col-auto">
                <label for="pdcity_box">Police Dept. City</label>
                <input type="checkbox" id="pdcity_box" name="pdcity_checked" value="pdcity">
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3">
                <input type="text" id="pdcity_input" name="pdcity" autocomplete="off" class="form-control" placeholder="Torrington" onclick="fillCheckbox('pdcity_box')">

            </div>
        </div>
        <div class="form-row">
            <div class="col-auto">
                <label for="date_box">Date</label>
                <input type="checkbox" id="date_box" name="date_checked" value="date">
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3">
                <input type="text" id="date_input" name="date" autocomplete="off" class="form-control" placeholder="YYYY-MM-DD" onclick="fillCheckbox('date_box')">
            </div>
        </div>
            <button type="submit" id="adv-search_btn" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button class="btn btn-link btn-sm" onclick="showNormalSearch()">Normal Search</button>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col">
    <?php
      include 'validate_fields.php';
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
    function showAdvancedSearch() {
      let nSearch = document.getElementById("normalSearch");
      let aSearch = document.getElementById("advancedSearch");
      nSearch.hidden = true;
      aSearch.hidden = false;
    }
    function showNormalSearch() {
      let nSearch = document.getElementById("normalSearch");
      let aSearch = document.getElementById("advancedSearch");
      nSearch.hidden = false;
      aSearch.hidden = true;
    }
</script>

  <script>
    function changeSearchBox(sBoxId, selfId){
      let sBox = document.getElementById(sBoxId);
      let self = document.getElementById(selfId);
      let formType = self.value;
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

  <script>
    function fillCheckbox(boxID){
      let box = document.getElementById(boxID);
      box.checked = true;
    }
  </script>
</body>
<?php
$conn->close;
?>
</html>
