<?php
include_once("../connexpdo.php");
include_once("head.php");

if(isset($_POST['btn_s'])){
    $cd=$_POST['code'];
    $de=$_POST['engin'];
    $im=$_POST['immatriculation'];

$select = connexpdo("unite")->prepare("insert into flotte (code,désignation,immatriculation) values(:c,:d,:i)");
$select->bindParam(':c',$cd);
$select->bindParam(':d',$de);
$select->bindParam(':i',$im);
$select->execute();
}
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">ENGIN</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Ajouter un Engin</h5>
                                <form action="#" method="POST">
                                    <div>
                                        <label>Code</label></br>
                                        <input type="text" name="code" placeholder="code">
                                    </div>
                                    <div>
                                        <label>Engin</label></br>
                                        <input type="text" name="engin" placeholder="Engin">
                                    </div>
                                    <div>
                                        <label>Immatriculation</label></br>
                                        <input type="text" name="immatriculation" placeholder="immatriculation">
                                    </div></br>
                                    <button type="submit" name="btn_s" style="background-color:dodgerblue;color:white">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table class="table table ">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Engin</th>
                                            <th>Immatriculation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $select = connexpdo("unite")->prepare("select * from flotte");
                                            $select->execute();
                                            while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                        <tr>
                                            <?php
                                                echo '
                                    <td>' . $row->code . '</td>
                                    <td>' . $row->désignation . '</td>
                                    <td>' . $row->immatriculation . '</td>';
                                            ?>
                                        </tr>
                                    <?php
                                            }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once("foot.php");
?>