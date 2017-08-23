<?php

require_once __DIR__ . '/vendor/autoload.php';
// https://api.thedogapi.co.uk/v2/dog.php

$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://api.thedogapi.co.uk/v2/dog.php');

if ($res->getStatusCode() >= 400) {
    // FAILED
}

$rsp = json_decode($res->getBody(), true);

$dog = reset($rsp['data']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DOG images</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kube CSS -->
    <link rel="stylesheet" href="https://unpkg.com/imperavi-kube">
    <style type="text/css">
    	html, body, body > .row {
    		height: 100%;
    	}
    </style>
</head>
<body>

	<div class="row align-center">
	    <div class="col col-6 push-middle push-center text-center">
	    	<img class="pure-img" src="<?php echo $dog['url'] ?>" style="max-height: 800px;">
	    </div>
	</div>

</body>
</html>
