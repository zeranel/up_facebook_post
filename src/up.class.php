<?php
class UpPostFacebook{
    
    private $host = "graph.facebook.com";
    public $access_token;
    
 public function setToken($token){
        $this->access_token = $token;
        return $this;
    }
 private function checkToken(){
        if(empty($this->access_token)){
            throw new Exception("Please set access token first!");
        }
    }    
 public function post($groupid, $postid){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://".$host."/v2.8/".$groupid."_".$postid."/comments");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"message=ðŸ‘†&access_token=".$this->access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $a = json_decode($server_output);
        return $a;
    }
 public function remove($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://".$host."/v2.8/".$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS,"access_token=".$this->access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $a = json_decode($server_output);
        return $a;
    }
 public function up($groupid, $postid){
        $this->checkToken();
        $post = $this->post($groupid, $postid);
        $id = $post->id;
        sleep(1);
        $delete = $this->remove($id);
        return $delete;
    }    
    }
?>
