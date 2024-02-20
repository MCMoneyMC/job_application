<?php
//Object for 
class $job_application{

    private $first_name = "";
    private $last_name = "";
    private $email = "";
    private $bio = "";
    private $technologies = array();
    private $timestamp = 0;
    private $signature = "";
    private $vcs_url = "";


    //FUNCTIONS
    //Get...
    public function get_first_name(){
        return $this->$first_name;
    }
    public function get_last_name(){
        return $this->$last_name;
    }
    public function get_email(){
        return $this->$email;
    }
    public function get_bio(){
        return $this->$bio;
    }
    public function get_technologies(){
        return $this->$technologies;
    }
    public function get_timestamp(){
        return $this->$timestamp;
    }
    public function get_signature(){
        return $this->$signature;
    }
    public function get_vcs_url(){
        return $this->$vcs_url;
    }


    //Set...
    public function set_first_name(string $new_first_name){
        $this->$first_name = validate_string_length($new_first_name, 255);
    }
    public function set_last_name(string $new_last_name){
        $this->$last_name = validate_string_length($new_last_name, 255);
    }
    public function set_email(string $new_email){
        if (!is_valid_email($new_email)){
            echo date("Y-m-d H:i:s") . "{\n}Inputted email address is not valid. {\t$new_email}";
            return;
        }
        $this->$email = validate_string_length($new_email, 255);
    }
    public function set_bio(string $new_bio){
        $this->$bio = $new_bio;
    }
    public function set_technologies(array $new_technologies){
        $this->$technologies = $new_technologies;
    }
    public function set_timestamp(int $new_timestamp){
        $this->$timestamp = $new_timestamp;
    }
    public function set_signature(string $new_signature){
        $this->$signature = validate_string_length($new_signature, 255);
    }
    public function set_vcs_url(string $new_vcs_url){
        $this->$vcs_url = validate_string_length($new_vcs_url, 255);
    }

    #Validation
    private function validate_string_length($string, $length) {
        if (strlen($string) > $length){
            $string = substr($string, 0, $length);
            echo  date("Y-m-d H:i:s") . "{\t}Inputted string is too long, sliced to max length ({$length}). {\t$this\t$string}";
        }
        return $string;
    }
    private function is_valid_email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL)
    }

}
?>