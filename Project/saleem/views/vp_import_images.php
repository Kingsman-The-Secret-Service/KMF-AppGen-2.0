<?php 

$tableColumns = KMF_CRUD::tableColumns("vp_import_images");
$pk = KMF_CRUD::primaryKey("vp_import_images");

if(isset($_GET['del']) && isset($_GET['del']['vp_import_images'])  && !empty($_GET['del']['vp_import_images'])){
        
    KMF_CRUD::deleteFormData("vp_import_images",$_GET['del']['vp_import_images']);
    header("Location:?views=vp_import_images&msgd");
}

elseif(isset($_GET['edit']) && isset($_GET['edit']['vp_import_images']) && !empty($_GET['edit']['vp_import_images'])){
        
        $tableEditData = vp_import_images::find($_GET['edit']['vp_import_images']);
                
        foreach($tableColumns as $val => $key){	
                    $$val = $tableEditData->$val;
            }
    
       if(!empty($_POST) && isset($_POST['vp_import_images'])){
           
            foreach($_POST as $val => $key){	
                    $$val = $key;
            }

            $invalid = KMF_CRUD::updateFormData("vp_import_images",$_POST,$_GET['edit']['vp_import_images']);
            echo KMF_CleanUp::fail($invalid);
        } 
        
        echo '<form action="?views=vp_import_images&edit[vp_import_images]='.$_GET["edit"]["vp_import_images"].'" method="post"> ';

        require_once 'forms/vp_import_images.php';

        echo '
            <div class="form-actions">
                <button type="reset" name="reset" id="reset" value="reset" class="btn btn-medium">Reset</button>
                <button type="submit" name="vp_import_images" id="vp_import_images" value="vp_import_images" class="btn btn-medium btn-success">Update</button>
            </div> 
        </form>';  
}
elseif(isset($_GET['view']) && isset($_GET['view']['vp_import_images'])){

    $tableViewData = KMF_CRUD::readFormData("vp_import_images",$_GET['view']['vp_import_images']);

    echo '
    <table class="table table-hover table-bordered table-striped">
    <caption><h5>VP_IMPORT_IMAGES</h5></caption>
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
    <a href="?views=vp_import_images" class="pull-left btn btn-medium"><i class="icon-chevron-left icon-white"></i> Back</a>
    <a href="index.php?views=vp_import_images&edit[vp_import_images]='.$tableViewData->$pk.'" onclick="return confirm(\'Really Edit?\');" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modify </a>
    <a href="index.php?views=vp_import_images&del[vp_import_images]='.$tableViewData->$pk.'" onclick="return confirm(\'Really Delete?\');" class="btn btn-danger"><i class="icon-trash  icon-white"></i> Remove </a>
    </div>
    </center>
    ';

}
else{

$tableViewsData = KMF_CRUD::readFormData("vp_import_images","all");

echo '
<table class="table table-hover table-bordered table-striped">
<caption><h5>VP_IMPORT_IMAGES</h5></caption>
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
    <td><a href="index.php?views=vp_import_images&view[vp_import_images]='.$tbdkey->$pk.'" class="btn btn-success"><i class="icon-search icon-white"></i> </a></td>
    <td><a href="index.php?views=vp_import_images&edit[vp_import_images]='.$tbdkey->$pk.'" onclick="return confirm(\'Really Edit?\');" class="btn btn-warning"><i class="icon-pencil icon-white"></i> </a></td>
    <td><a href="index.php?views=vp_import_images&del[vp_import_images]='.$tbdkey->$pk.'" onclick="return confirm(\'Really Delete?\');" class="btn btn-danger"><i class="icon-trash  icon-white"></i> </a></td>
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