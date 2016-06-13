<?php
  require_once("template/navbar.php");
  require("config/config.php");
?>

<head>
  <link rel="stylesheet" href="css/main.css">
  <meta charset="utf-8">
</head>

<div id="wrap">
  <section id="Main" class="container clearfix border-box">
    <div class="block">

      <h2 class="headline-hr ach"><?php echo $_GET["username"];?>'s Accepted list</h1>

        <table class="table table-bordered table-striped alignCenter problem-table">
          <thead>
            <tr>
              <th class="alignCenter " style="width:7%">#</th>
              <th class="alignCenter" style="width:50%">Problem title</th>
              <th class="alignCenter" style="width:20%">Accepted Rate</th>
              <th class="alignCenter">Date</th>
            </tr>
          </thead>
          <tbody id="problem-List">
  <?php

  $query0 = "SELECT `pid`,`psubmit` FROM `sloveBoard` WHERE name='".$_GET["username"]."' AND  pstate = 'Accepted'";
  $result0= mysql_query($query0,$link) or die ("資料庫連線異常，請檢察網路設定或聯絡系統管理員");

  while($row0 = mysql_fetch_row($result0,MYSQL_ASSOC)){
    $query = "SELECT `ptitle`,`ac`,`wa` FROM `problemSet` WHERE pid='".$row0["pid"]."'";
    $result= mysql_query($query,$link) or die ("資料庫連線異常，請檢察網路設定或聯絡系統管理員");
    $row = mysql_fetch_row($result,MYSQL_ASSOC);

    $ptitle = $row["ptitle"];
    $ac = $row["ac"];
    $wa = $row["wa"];
    $ratio = $ac."/".$wa;

    $str = '<tr><th class="tElement">'.$row0["pid"].'</th>';
    $str .= '<th class="tElement"><a href="problem.php?pid='.$row0["pid"].'">'.$ptitle.'</a></th>';
    $str .= '<th class="tElement">'.$ratio.'</th>';
    $str .= '<th class="tElement">'.$row0["psubmit"].'</th></tr>';
    echo($str);
  }


  ?>
          </tbody>
      </table>
    </div>
  </section>
</div>
<?php
  require_once("template/footer.html");
?>
