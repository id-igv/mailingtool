<?php
// mailer.php

function formatted_date()
{
	return date('Y-m-d/H:m:s', time());
}

function render_msg($template, $params)
{
	extract($params);
	$tmplDir = 'src/MessageTemplates';
	$emailMarkup = $tmplDir . '/' . $template;
	
	if (!file_exists($emailMarkup)) {
		throw new Exception("Message template file {$file} not found!");
	}
	
	ob_start();
	require $emailMarkup;
	return ob_get_clean();
}

$logFile = realpath('log.txt');
$logMsg = file_get_contents($logFile);
$logMsg .= "\n" . formatted_date() ." - MAILER STARTED ";

require_once "bootstrap.php";
require_once "src/Entity/Subscriber.php";
require_once "src/Entity/Category.php";
require_once "src/Entity/News.php";

try {
	if (isset($entityManager)) {
		// DB QUERIES
		$subs = $entityManager
			->getRepository('Subscriber')
			->findAll();
		
		$categories = $entityManager
			->getRepository('Category')
			->findAll();
		
		$latestNews = [];
		$newsRepo = $entityManager
			->getRepository('News');
		
		foreach ($categories as $cat) {
			$latestNews[$cat->getId()] = [
				'news' => $newsRepo->findBy(
						['categoryId' => $cat->getId()],
						['created' => 'DESC'],
						3,
						0
					),
				'categoryName' => $cat->getName()
			];
		}
		// END OF DB QUERIES
		
		// MAILING
		$transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
		$transport->setUsername($params['parameters']['mailer_user']);
		$transport->setPassword($params['parameters']['mailer_password']);
		
		$mailer = new Swift_Mailer($transport);
		
		foreach ($subs as $sub) {
			$msg = new Swift_Message('Weekly news');
			$msg->setFrom([
				$params['parameters']['mailer_user'] => 'News Portal Weekly'
			]);
			$msg->setTo($sub->getEmail());
			$msg->setBody(
				render_msg(
					'weekly_news.phtml',
					[
						'sub' => $sub,
						'categories' => $categories,
						'news' => $latestNews
					]
				),
				'text/html'
			);
			if ($mailer->send($msg, $failures)) {
				$logMsg .= "\n -> " . $sub->getEmail() . " : Sending done! ";
			} else {
				$logMsg .= "\n -> Caught an error\n    Failures list: ";
				foreach ($failures as $fail) {
					$logMsg .= "\n        {$fail}";
				}
			}
			
		}
		
		// END OF MAILING
		
	} else {
		throw new Exception(
			"\n -> "
			. formatted_date() 
			. "Entity manager was not set"
		);
	}
} catch (Exception $e) {
	$logMsg .= "\n -> Exception: " . $e->getMessage();
}

$logMsg .= "\nMAILER ENDED\n";
file_put_contents($logFile, $logMsg);
?>