
<?php 
class interhome_reservations extends ActiveRecord\Model{
    static $table_name = "interhome_reservations";
    static $primary_key = "reservation_code";
    
    static $validates_presence_of = array(
        array("accommodation_key"),
        array("reservation_status"),
        array("check_in"),
        array("check_out"),
        array("duration"),
        array("language_code"),
        array("insert_date"),
        array("update_date")
    );
    
    static $validates_size_of = array(
        array("accommodation_key", "maximum" => 255, "too_long" =>  "should be short and sweet"),
        array("duration", "maximum" => 11, "too_long" =>  "should be short and sweet"),
    );
}
?>
