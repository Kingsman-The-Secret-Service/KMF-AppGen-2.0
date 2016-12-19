
<?php 
class vp_import_images extends ActiveRecord\Model{
    static $table_name = "vp_import_images";
    static $primary_key = "id";
    
    static $validates_presence_of = array(
        array("unit_id"),
        array("width"),
        array("height"),
        array("name"),
        array("image_id")
    );
    
    static $validates_size_of = array(
        array("unit_id", "maximum" => 11, "too_long" =>  "should be short and sweet"),
        array("width", "maximum" => 5, "too_long" =>  "should be short and sweet"),
        array("height", "maximum" => 5, "too_long" =>  "should be short and sweet"),
        array("name", "maximum" => 100, "too_long" =>  "should be short and sweet"),
        array("image_id", "maximum" => 11, "too_long" =>  "should be short and sweet")
    );
}
?>
