<?php
class application
{

    private $first_name = "";
    private $last_name = "";
    private $email = "";
    private $bio = "";
    private $technologies = array();
    private $timestamp = 0;
    private $signature = "";
    private $vcs_url = "";
    private $string_length_cap = 0;


    //Get...
    public function get_first_name(): string
    {
        return $this->first_name;
    }
    public function get_last_name(): string
    {
        return $this->last_name;
    }
    public function get_email(): string
    {
        return $this->email;
    }
    public function get_bio(): string
    {
        return $this->bio;
    }
    public function get_technologies(): array
    {
        return $this->technologies;
    }
    public function get_timestamp(): int
    {
        return $this->timestamp;
    }
    public function get_signature(): string
    {
        return $this->signature;
    }
    public function get_vcs_url(): string
    {
        return $this->vcs_url;
    }
    public function get_string_length_cap(): int
    {
        return $this->string_length_cap;
    }


    //Set...
    public function set_first_name(string $new_first_name)
    {
        try {
            $this->first_name = $this->validate_string_length($new_first_name, $this->string_length_cap);
        } catch (Exception $e) {
            echo date("Y-m-d H:i:s:u e") . "{\t} Caught exception: {$e->getMessage()}\t{$new_first_name}\t" . spl_object_hash($this) . "\n";
        }
    }
    public function set_last_name(string $new_last_name)
    {
        try {
            $this->last_name = $this->validate_string_length($new_last_name, $this->string_length_cap);
        } catch (Exception $e) {
            echo date("Y-m-d H:i:s:u e") . "{\t} Caught exception: {$e->getMessage()}\t{$new_last_name}\t" . spl_object_hash($this) . "\n";
        }
    }
    public function set_email(string $new_email)
    {
        try {
            $this->email = $this->validate_string_length($this->is_valid_email($new_email), $this->string_length_cap);
        } catch (Exception $e) {
            echo date("Y-m-d H:i:s:u e") . "{\t} Caught exception: {$e->getMessage()}\t{$new_email}\t" . spl_object_hash($this) . "\n";
        }
    }
    public function set_bio(string $new_bio)
    {
        $this->bio = $new_bio;
    }
    public function set_technologies(array $new_technologies)
    {
        $this->technologies = $new_technologies;
    }
    public function set_timestamp(int $new_timestamp)
    {
        $this->timestamp = $new_timestamp;
    }
    public function set_signature(string $new_signature)
    {
        try {
            $this->signature = $this->validate_string_length($new_signature, $this->string_length_cap);
        } catch (Exception $e) {
            echo date("Y-m-d H:i:s:u e") . "{\t} Caught exception: {$e->getMessage()}\t{$new_signature}\t" . spl_object_hash($this) . "\n";
        }
    }
    public function set_vcs_url(string $new_vcs_url)
    {
        try {
            $this->vcs_url = $this->validate_string_length($new_vcs_url, $this->string_length_cap);
        } catch (Exception $e) {
            echo date("Y-m-d H:i:s:u e") . "{\t} Caught exception: {$e->getMessage()}\t{$new_vcs_url}\t" . spl_object_hash($this) . "\n";
        }
    }
    public function set_string_length_cap(int $new_string_length_cap)
    {
        $this->string_length_cap = $new_string_length_cap;
    }


    #Validation
    private function validate_string_length(string $string, int $length)
    {
        if (strlen($string) > $length) {
            throw new Exception("String too long.\t{$string}");
        }
        return $string;
    }
    private function is_valid_email(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email.\t{$email}");
        }
        return $email;
    }

    /*Application class to JSONx method*/
}

?>