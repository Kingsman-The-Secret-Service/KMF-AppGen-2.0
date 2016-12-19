<?php 

$tableColumns = KMF_CRUD::tableColumns("interhome_reservations");
$pk = KMF_CRUD::primaryKey("interhome_reservations");

if(isset($_GET['del']) && isset($_GET['del']['interhome_reservations'])  && !empty($_GET['del']['interhome_reservations'])){
        
    KMF_CRUD::deleteFormData("interhome_reservations",$_GET['del']['interhome_reservations']);
    header("Location:?views=interhome_reservations&msgd");
}

elseif(isset($_GET['edit']) && isset($_GET['edit']['interhome_reservations']) && !empty($_GET['edit']['interhome_reservations'])){
        
        $tableEditData = interhome_reservations::find($_GET['edit']['interhome_reservations']);
                
        foreach($tableColumns as $val => $key){	
                    $$val = $tableEditData->$val;
            }
    
       if(!empty($_POST) && isset($_POST['interhome_reservations'])){
           
            foreach($_POST as $val => $key){	
                    $$val = $key;
            }

            $invalid = KMF_CRUD::updateFormData("interhome_reservations",$_POST,$_GET['edit']['interhome_reservations']);
            echo KMF_CleanUp::fail($invalid);
        } 
        
        echo '<form action="?views=interhome_reservations&edit[interhome_reservations]='.$_GET["edit"]["interhome_reservations"].'" method="post"> ';

        require_once 'forms/interhome_reservations.php';

        echo '
            <div class="form-actions">
                <button type="reset" name="reset" id="reset" value="reset" class="btn btn-medium">Reset</button>
                <button type="submit" name="interhome_reservations" id="interhome_reservations" value="interhome_reservations" class="btn btn-medium btn-success">Update</button>
            </div> 
        </form>';  
}
elseif(isset($_GET['view']) && isset($_GET['view']['interhome_reservations'])){

    $tableViewData = KMF_CRUD::readFormData("interhome_reservations",$_GET['view']['interhome_reservations']);

    echo '
    <table class="table table-hover table-bordered table-striped">
    <caption><h5>INTERHOME_RESERVATIONS</h5></caption>
    <thead>
    <tr>
    <th>Fields</th>
    <th>Data</th>
    </tr>
    </thead>
    <tbody>';

    foreach($tableColumns as $tbfval => $tbfkey){
        echo '<tr><td>'.$tbfval.'</td><td>'.$tableViewData->$tbfval.'</td></tr>';
    }
    
    echo '</tbody>
    </table>';

    echo '
    <center>
    <div class="btn-group">
    <a href="?views=interhome_reservations" class="pull-left btn btn-medium"><i class="icon-chevron-left icon-white"></i> Back</a>
    <a href="index.php?views=interhome_reservations&edit[interhome_reservations]='.$tableViewData->$pk.'" onclick="return confirm(\'Really Edit?\');" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modify </a>
    <a href="index.php?views=interhome_reservations&del[interhome_reservations]='.$tableViewData->$pk.'" onclick="return confirm(\'Really Delete?\');" class="btn btn-danger"><i class="icon-trash  icon-white"></i> Remove </a>
    </div>
    </center>
    ';

}
else{

$tableViewsData = KMF_CRUD::readFormData("interhome_reservations","all");

echo '
<table class="table table-hover table-bordered table-striped">
<caption><h5>INTERHOME_RESERVATIONS</h5></caption>
<thead>
<tr>';


foreach(array_slice($tableColumns,1,4) as $tbfval => $tbfkey){

    echo '<th>'.$tbfval.'</th>';
}

echo '<th>View</th><th>Edit</th><th>Delete</th></tr>
</thead>
<tbody>';

foreach($tableViewsData as $tbdval => $tbdkey){

    echo '<tr>';

    foreach(array_slice($tableColumns,1,4) as $tbfval => $tbfkey){
        echo '<td>'.$tbdkey->$tbfval.'</td>';
    }


    echo '
    <td><a href="index.php?views=interhome_reservations&view[interhome_reservations]='.$tbdkey->$pk.'" class="btn btn-success"><i class="icon-search icon-white"></i> </a></td>
    <td><a href="index.php?views=interhome_reservations&edit[interhome_reservations]='.$tbdkey->$pk.'" onclick="return confirm(\'Really Edit?\');" class="btn btn-warning"><i class="icon-pencil icon-white"></i> </a></td>
    <td><a href="index.php?views=interhome_reservations&del[interhome_reservations]='.$tbdkey->$pk.'" onclick="return confirm(\'Really Delete?\');" class="btn btn-danger"><i class="icon-trash  icon-white"></i> </a></td>
    </tr>';
}

echo '</tbody>
</table>';

if(empty($tableViewsData)){
    echo '<center><h5>No Record Found</h5></center>';
}
echo '<hr/>';    

}

?>