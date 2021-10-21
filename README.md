Problem:
Needed to test Codeigniter controllers but codeigniter 3 appears to have little or no support for http requests testing.  All solutions I found required using autoload.php or heavy external dependencies


Solution:
drop this model file (TestHttp.php) in application/models folder



Usage:

$this->load->library("unit_test");
$this->load->model("TestHttp");
//set base url like so (you can remove index.php if htaccess is configured):
$this->TestHttp->base_url = "http://localhost/codeigniter_test/index.php/";


To test GET request:
 $result = $this->TestHttp->perform_request("GET", {controler/method}); 
  $this->unit->run(is_string($result), true, "returned string response"); 

 
To test POST request:
 $result = $this->TestHttp->perform_request("POST", url, {controller/method}, array("param1"=>"value1", "param2"=>"value2");  
  $this->unit->run(is_string($result), true, "returned string response"); 
 

 
