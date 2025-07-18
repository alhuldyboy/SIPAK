<?php
include('koneksi.php');
 
if(isset($_SESSION['login_user'])){
header("location: about.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="homeadmin.php">BERANDA</a></li>
        <li><a href="penyakit.php">NAMA PENYAKIT KULIT</a></li>
        <li><a href="gejala.php">GEJALA PENYAKIT KULIT</a></li>
        <li class="active"><a href="basispengetahuan.php">BASIS PENGETAHUAN PENYAKIT KULIT MANUSIA</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
           <h2 class="text-center">DAFTAR HAMA DAN PENYAKIT</h2>
      <form id="form1" name="form1" method="post" action="hamadanpenyakit.php">
				<label for="sel1">Jenis Tanaman</label>            
				<select class="form-control"  name="tanaman" onChange='this.form.submit();'>
				<option>Tanaman</option>
                <option>Bawang</option>
                <option>Cabai</option>
  		</select>
  </form>
<br>
<a href="php/ainputpenyakit.php"><button type="button" class="btn btn-default">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button></a>
    	<br><br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Bagian Kulit</th>
                            <th>Penanganan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    if(isset($_POST['tanaman']) && $_POST['tanaman']!="Bagian Kulit"){
                        $queri="SELECT * FROM penyakit WHERE bagiankulit = '".$_POST['tanaman']."'";
                        $hasil=mysqli_query($konek_db,$queri);
                        $id = 0;
                        while ($data = mysqli_fetch_array($hasil)){
                            $id++;
                            echo "<tr>";
                            echo "<td>".$id."</td>";
                            echo "<td>".$data['idpenyakit']."</td>";
                            echo "<td>".$data['namapenyakit']."</td>";
                            echo "<td>".$data['bagiankulit']."</td>";
                            echo "<td>".substr($data['penanganan'],0,50)."...</td>";
                            echo "<td><a href='adetailpenyakit.php?id=".$data['idpenyakit']."'><i class='glyphicon glyphicon-search'></i></a> || <a href='aeditpenyakit.php?id=".$data['idpenyakit']."'><i class='glyphicon glyphicon-pencil'></i></a> || <a href='adeletepenyakit.php?id=".$data['idpenyakit']."' onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
</table><br><br><br><br><br>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus data ini?');
}
</script>

<footer class="container-fluid text-center">
  <p>Sistem Pakar Diagnosa Penyakit Kulit Manusia</p>
</footer>

</body>
</html>
