<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (!function_exists('dd')) {
	function dd($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die;
	}
}

if (!function_exists('debug')) {
	function debug($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die;
	}
}


if (!function_exists('upload_file')) {
	function upload_file($file, $pathFolderUpload)
	{
		$imagePath = $pathFolderUpload . time() . '-' . basename($file['name']);

		if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imagePath)) {
			return $imagePath;
		}

		return null;
	}
}

if (!function_exists('upload_multifile')) {
	function upload_multifile($image, $pathFolder)
	{
		$uploadedFiles = [];

		foreach ($image['tmp_name'] as $key => $tmp_name) {
			$fileName = $image['name'][$key];
			$fileSize = $image['size'][$key];
			$fileTmp = $image['tmp_name'][$key];
			$fileType = $image['type'][$key];

			$allowedExtensions = array("jpeg", "jpg", "png");
			$fileParts = explode('.', $fileName);
			$fileExtension = strtolower(end($fileParts));

			if (in_array($fileExtension, $allowedExtensions) === false) {
				echo "Chỉ cho phép upload file ảnh có định dạng JPEG, JPG, PNG.";
				exit();
			}

			$uploadPath = $pathFolder . time() . '-' . basename($fileName);

			if (move_uploaded_file($fileTmp, PATH_UPLOAD . $uploadPath)) {
				$uploadedFiles[] = $uploadPath; // Lưu tên file vào mảng
			} else {
				echo "Có lỗi xảy ra khi upload file.";
				exit();
			}
		}

		$imageString = implode(",", $uploadedFiles);
		return $imageString;
	}
}

if (!function_exists('sendMail')) {
	function sendMail($email, $name, $subject, $body)
	{
		$mail = new PHPMailer(true);
		try {
			$mail->SMTPDebug = SMTP::DEBUG_OFF;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'hn4206316@gmail.com';
			$mail->Password = 'ivjdpcaocyutzjky';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;

			//Recipients
			$mail->setFrom('hn4206316@gmail.com', 'LuxChill6789');
			$mail->addAddress($email, $name);

			//Content
			$mail->isHTML(true);
			$mail->Subject = $subject;
			// $mail->Body    = 'Xin chào,<br><br>Bạn đã yêu cầu đặt lại mật khẩu. Đây là ảnh đại diện của bạn:<br><br><img src="https://upload.wikimedia.org/wikipedia/en/b/bd/Doraemon_character.png" alt="Avatar"><br><br>Xin cảm ơn!';
			$mail->Body = $body;

			$mail->send();
			// echo 'Message has been sent';
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

if (!function_exists('momoPay')) {
	function momoPay($price)
	{
		$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


		$partnerCode = 'MOMOBKUN20180529';
		$accessKey = 'klm05TvNBzhg7h7j';
		$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
		$orderInfo = "Thanh toán qua MoMo";
		$amount = $price;
		$orderId = rand(00, 9999);
		$redirectUrl = "http://localhost/duan1/?act=checkout";
		$ipnUrl = "http://localhost/duan1/?act=checkout";
		$extraData = "";

		$partnerCode = $partnerCode;
		$accessKey = $accessKey;
		$serectkey = $secretKey;
		$orderId = $orderId; // Mã đơn hàng
		$orderInfo = $orderInfo;
		$amount = $amount;
		$ipnUrl = $ipnUrl;
		$redirectUrl = $redirectUrl;
		$extraData = $extraData;

		$requestId = time() . "";
		$requestType = "payWithATM";
		// $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
		//before sign HMAC SHA256 signature
		$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
		$signature = hash_hmac("sha256", $rawHash, $serectkey);
		$data = array(
			'partnerCode' => $partnerCode,
			'partnerName' => "Test",
			"storeId" => "MomoTestStore",
			'requestId' => $requestId,
			'amount' => $amount,
			'orderId' => $orderId,
			'orderInfo' => $orderInfo,
			'redirectUrl' => $redirectUrl,
			'ipnUrl' => $ipnUrl,
			'lang' => 'vi',
			'extraData' => $extraData,
			'requestType' => $requestType,
			'signature' => $signature
		);
		$result = execPostRequest($endpoint, json_encode($data));
		$jsonResult = json_decode($result, true);

		header('Location: ' . $jsonResult['payUrl']);
	}
}

if (!function_exists('middlewareAuthThor')) {
	function middlewareAuthThor()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['role'] != 1) {
				header('location: ' . BASE_URL);
			}
		} else {
			header('location: ' . BASE_URL . '?act=login');
		}
	}
}

if (!function_exists('validateImage')) {
	function validateImage($image)
	{
		if (!$image['error'][0] == UPLOAD_ERR_NO_FILE) {
			return true;
		} else {
			return false;
		}
	}
}
