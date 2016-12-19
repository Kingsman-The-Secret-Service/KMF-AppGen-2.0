<?php

$indexStatus = NULL;
$indexStatusVal = NULL;

if(isset($_GET['forms'])){	
    $indexStatus = "forms";
}
elseif(isset($_GET['views']) && !empty ($_GET['views'])){	
    $indexStatus = "views";
    $indexStatusVal = $_GET['views'];
}

include_once 'layouts/constant.php';
include_once 'layouts/header.php';

//Start of Breadcrumb
    echo '
    <div class="row">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav">
                <li '.($indexStatus == NULL? 'class="active"':NULL).'><a href="index.php" ><i class="icon-home"></i> Home</a></li>
                <li '.($indexStatus == "forms"? 'class="active"':NULL).'><a href="?forms" style="text-transform:capitalize;"><i class=" icon-edit"></i> Form</a></li>
                <li class="dropdown '.($indexStatus == "views"? 'active':NULL).'"  role="menu" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=" icon-wrench"></i> View <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                   
                    <li '.($indexStatusVal == "interhome_reservations"? 'class="active"':NULL).'><a tabindex="-1" href="?views=interhome_reservations">INTERHOME_RESERVATIONS</a></li>

                    </ul>
                </li>
                </ul>
            </div>
        </div>
    </div>';
//End of Breadcrumb

//Start of Content
echo '
<div class="row well">';
    
if(empty($indexStatus)){
    echo '<h1>Welcome to excel</h1>';
}

################################################################################
################################################################################
################################################################################

/********** Start of Form ************/
elseif($indexStatus == "forms"){
   
if(!empty($_POST) && isset($_POST['excel'])){
    
    foreach($_POST as $val => $key){	
            $$val = $key;
    }
    
$invalid = array_merge(
    (array)KMF_CRUD::createFormData("interhome_reservations",$_POST)
    );
    
    if(empty($invalid)){
        header("Location:?forms&msgs");
    }
    else{
        echo KMF_CleanUp::fail($invalid);
    }
    
}

if(isset($_GET['msgs'])){     
    echo KMF_CleanUp::success("Your data has been successfully saved");
}

echo '
<form action="?forms" method="post"> ';

        require_once 'forms/interhome_reservations.php';

echo '
    <div class="form-actions">
        <button type="reset" name="reset" id="reset" value="reset" class="btn btn-medium">Reset</button>
        <button type="submit" name="excel" id="excel" value="excel" class="btn btn-medium btn-success">Submit</button>
    </div> 
</form>';   
}
/********** End of Form ************/

################################################################################
################################################################################
################################################################################

/********** Start of View ************/
elseif($indexStatus == 'views'){
    if(isset($_GET['msgd'])){
        echo KMF_CleanUp::success("Your data has been successfully Deleted");
    }
    
    if(isset($_GET['msge'])){     
        echo KMF_CleanUp::success("Your data has been successfully Updated");
    }

    require_once 'views/'.$_GET['views'].'.php';
 
}
/********** End of View ************/ 

echo '
</div>';	
//End of Content

include_once 'layouts/footer.php';

?>