<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2017021705730744",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAyk9+COD5E3MW0FKkir3WizI6QRtew4aMN/1vD5XKYoAO/PJzdpEq0VU2gn6wgQzXDB2vo1JGSRdhUNFBe/h1ZjisqGjU+T3xBXlVqeWvfX39GFHOXyIIHERGCea14aJJN8pCcqMAMu5NVOVQOZuCaJlo4LXo0YLgqaTRus55A89KjL6jKDzXhZDFZgpVNMg4mODWH8KgQhDCI+xvofpzTtS7Tfnv2Nwa1XjuduqHHEQ6bbeaQJ9quGLDd6WM0Sf76w77+PIOOHlXfhQnjgurNqmYq/znufee91CSxxVq8LJRqOzR3SwV5a3torHXhx6rKpupYyxMHRGcRoaDSA8hVwIDAQABAoIBAQCw7SgJ18W8DrBq63teonrYLMrpWWhcknRaGtdfx93AmsGA0P/NN1M80srjAKyXj4UZ4XRS3ob9MOc4aGheZIE3LmVAur1WY6c+5EfYVzhMBTysYg6bAAYbwlGGIy/47ZYeplHKM2bfI6yZjBnG54r6sv8XVb8QSubzNWL9fcgzXS0ooID4SezGbd8plnURSEG7eGodQF+FBGEDSTQW+SWi81JdsM+iiCdAUCH9Hf0Q5smZ1YS2hL+b+FC4Ec2mRJez8eDfi+cy+9+CkhnzmQmPOlrWebKMkTOP7YMlW85p8ulGXGGRfTpuu1fAu6iZxSG8z+qcwkc8lu95d4TPd77hAoGBAO2GMymkcXCKeed5Ej7kC3hw3vkHDCr4goEpHtoegIbhm6R55VRdFiSE1cMCc4w5KJqSQ+Vb6N5sxg7Dm8aTPrDmjhI1QpT4WXZIYez/sxpMKWQhbpr2zqWf2ysYoZderm5SYsZWper6c54N42sFHu+XsRzIf9tb/+FdBpiF3OufAoGBANoMFb7HmAgHHE8fCF6at25IyF8DoxQYqhuIdOE0RMJS5sEncv/Az3NDH8c6LzNZpxjRzJArLlDC0VQbO5HNqfu2+5SvzjWoWApz2v9rV1G2TeJMTn55g/eqg98/waCJLJ5AZ3lDFV4v2p2jvs+/8Xo6On7TfCyUqUzaTL8EWm9JAoGARbO8D9xR7dS1MVg2In6JXy7AQBPxXirPIVgP1bJdxTcvlXSv97HZbZ4NnMx7XArp/3IsuoHeNGd3N53veLZ9DyyZRH6cq1q15iAXnJTs2iq/esLU0mTa/3+JsXvo76K5TWaf1dRXnD0i8J7iveUizuyU7P1ph9XXoSrLZLbjvcECgYAJFTvKqLHSk8lAGoDUwAkoFOwT2Sjv618aqoKD5xN+LMnj/eqycKuzl3Y5bFkPAIsPY53r24CgaJ0jrca7eh+8lpDATtp+LbcNKGpU/Xmzs65m4NrcNd+jb3zyzcsZDt3G8dPdn0fClqe6rVmDefFrMAXDxreDe+XZh7ZutpW10QKBgEelzfAqkGFBeRDstZU18SEkpRWCydaR/BfqbW5brCz5Y/bhks8nqYFbPtkrKAaylJ2f8F0oZ5x/I52zPfk5Zh/1tdIA0lMTXEG5/bvv5qyGlKrK6sNxxodoGQSnqV0K6HahMwZvtVn/ZX4rdLc5Mp96xGiRUpniBODbHIiuOyn5",
		
		//异步通知地址
		'notify_url' => "http://localhost:9096/training/stc_admin/laravel52/public/successUrl",
		
		//同步跳转
		'return_url' => "http://localhost:9096/training/stc_admin/laravel52/public/successUrl",

		//编码格式
		'charset' => "UTF-8",
				
		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoSrgcVs/8vs4eQ/M8mTW+XvRm06kVYCf+WxIAj3WEbHpOudZK3Z99gLw3Vg9BsugFMD4M3upsK+3Br7t7kLp6ah6ql9FhzzeLmhCXjPLrRoQOdQa8oSY9re63h2C6lEslYD9eV+gZVgmQIQPxOVfSRC6db7Qhg3G9o8WorwQX93x9hSKQkdr9C8iO3xyY4fT6fl01Jy53dAU/2g+OFug59wHIligH8AmJ3vvJLJqrybaOWTS52kpTCO6/T1DtFCcLi8yT3sMWCkgcv8Rj5dyHHKJTM+VDsyOoZHKU89ZvBE8ZzoQx8q+TjNFSMqAe4JithPaTV0NErPEPNrTgyj4CwIDAQAB",
		
	
);