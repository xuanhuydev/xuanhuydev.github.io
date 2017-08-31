<?php
$access_token = '';
if (isset($_POST['get'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  /***			OKKKKKKKKKKKKKKKKKK
  ***			Facebook Android Access_Token:ShareFBScripts
  ***				Copyright (c) 2016 @ ShareFBScripts.BlogSpot.Com
  ***						ShareFBScripts
  http://localhost/Facebook%20Access%20Token%20FULL/android.php?u=daylaitai@gmail.com&p=12351235
  **/
  error_reporting(E_ALL & ~ E_NOTICE);

  header('Origin: https://facebook.com');
  define('API_SECRET', '62f8ce9f74b12f84c123cc23437a4a32');

  define('BASE_URL', 'https://api.facebook.com/restserver.php');

  function sign_creator(&$data){
  	$sig = "";
  	foreach($data as $key => $value){
  		$sig .= "$key=$value";
  	}
  	$sig .= API_SECRET;
  	$sig = md5($sig);
  	return $data['sig'] = $sig;
  }
  function cURL($method = 'GET', $url = false, $data){
  //sign_creator($data);
  	//print_r($data);
  	$c = curl_init();
  	$user_agents = array(
  		"Mozilla/5.0 (Linux; Android 5.0.2; Andromax C46B2G Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/37.0.0.0 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/60.0.0.16.76;]",
  		"[FBAN/FB4A;FBAV/35.0.0.48.273;FBDM/{density=1.33125,width=800,height=1205};FBLC/en_US;FBCR/;FBPN/com.facebook.katana;FBDV/Nexus 7;FBSV/4.1.1;FBBK/0;]",
  		"Mozilla/5.0 (Linux; Android 5.1.1; SM-N9208 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36",
  		"Mozilla/5.0 (Linux; U; Android 5.0; en-US; ASUS_Z008 Build/LRX21V) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.8.0.718 U3/0.8.0 Mobile Safari/534.30",
  		"Mozilla/5.0 (Linux; U; Android 5.1; en-US; E5563 Build/29.1.B.0.101) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.10.0.796 U3/0.8.0 Mobile Safari/534.30",
  		"Mozilla/5.0 (Linux; U; Android 4.4.2; en-us; Celkon A406 Build/MocorDroid2.3.5) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1"
  	);
  	$useragent = $user_agents[array_rand($user_agents)];
  	$opts = array(
  		CURLOPT_URL => ($url ? $url : BASE_URL).($method == 'GET' ? '?'.http_build_query($data) : ''),
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_SSL_VERIFYPEER => false,
  		CURLOPT_USERAGENT => $useragent
  	);
  	if($method == 'POST'){
  		$opts[CURLOPT_POST] = true;
  		$opts[CURLOPT_POSTFIELDS] = $data;
  	}
  	curl_setopt_array($c, $opts);
  	$d = curl_exec($c);
  	curl_close($c);
  	return $d;
  }

  $data = array(
  	"api_key" => "882a8490361da98702bf97a021ddc14d",
  	//"credentials_type" => "password",
  	"email" => $email,
  	"format" => "JSON",
  //	"generate_machine_id" => "1",
  //	"generate_session_cookies" => "1",
  	"locale" => "vi_vn",
  	"method" => "auth.login",
  	"password" => $password,
  	"return_ssl_resources" => "0",
  	"v" => "1.0"
  );
  sign_creator($data);
  $response = cURL('GET', false, $data);
  $access_token = json_decode($response)->access_token;
}
?>


<!DOCTYPE html>


<html encoding="utf-8">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="//code.jquery.com/jquery.min.js"></script>
<title>Get Facebook Tokens | Full Script | HTC,IOS,IPHONE,ANDRIOD |</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body id="dashboard" class="background-dark template-product" ><br>
<div class="container">


<div class="col-sm-3 blog-main"></div>

          <div class="col-sm-6 blog-main">
              <div class="panel panel-default">
                    <div class="panel-heading">
                         <h3 class="panel-title">Get Facebook Tokens with Full Permissions</h3>
                    </div>
               <div class="panel-body">
                 <a href="http://localhost/Facebook%20Access%20Token%20FULL/getToken/"><img src="logo.jpg" alt="" width="100"><br></a>
                <form class="" action="index.php" method="post">
                      <!-- Start nhập email -->
                     <div class="form-group">
                          <label for="email">Enter Your Facebook Email</label>
                          <input name="email" id="email" placeholder="Email here..." class="form-control"/>
                     </div>
                     <!-- End nhập email -->
                     <div class="form-group">
                          <label for="password">Enter Your Facebook Password</label>
                          <input name="password" id="password" type="password" placeholder="Password here..." class="form-control"/>
                     </div>
                     <div class="form-group">
                          <label for="app_id">Select Token Type</label>
                          <select id="app_id" class="form-control">
                            <option value="350685531728" selected >FACEBOOK FOR ANDROID</option>
            								<option value="6628568379" disabled >FACEBOOK FOR IPHONE</option>
            								<option value="165907476854626" disabled>PAGES MANAGER FOR IOS</option>
            								<option value="41158896424" disabled>HTC Sense</option>
                          </select>
                     </div>
                     <div class="form-group text-center">
                         <button name="get" type="submit" class="btn btn-sm btn-primary">Get Token</button>
                     </div>
                 </form>
                         <div class="form-group text-center" id="load_result" style="display:none">
                              <label for="result"><center>Access Token Below :</center></label>
                              <textarea id="result" onclick="this.focus();this.select()" class="form-control" rows="4"></textarea>
                         </div>

                         <div class="form-group">
                          <label for="exampleFormControlTextarea1">Example textarea</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $access_token;?></textarea>
                        </div>
                    </div>
               </div>
               <div class="panel panel-default">
                    <div class="panel-heading">
                   <center>    <h3 class="panel-title">@ngaoduky <a href="http://facebook.com/ngaoduky.com" target="_blank"> NGAO DU KÝ</a></h3> <center>
                    </div>
                    <div class="panel-heading">
                   <center>    <h3 class="panel-title"><a href="https://developers.facebook.com/tools/debug/accesstoken/" target="_blank"> Access Token Debugger</a></h3> <center>
                    </div>
               </div>
     </div>
</div>
</body>
</html>
