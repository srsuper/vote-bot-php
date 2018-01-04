<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \LINE\LINEBot;
use \LINE\LINEBot\HttpClient\CurlHTTPClient;
use \LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use \LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;

class Webhook extends CI_Controller {

	private $bot;
	private $events;
	private $signature;
	private $user;

	function __construct()
	{
		parent::__construct();
		$this->load->model('vote_m');

		// create bot object
		$httpClient = new CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
		$this->bot = new LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);
	}

	public function index()
	{
		if($_SERVER['REQUEST_METHOD'] !== 'POST')
		{
			echo "Hello World!";
			header('HTTP/1.1 400 Only POST method allowed');
			exit;
		}

		// get request
		$body = file_get_contents('php://input');
		$this->signature = isset($_SERVER['HTTP_X_LINE_SIGNATURE']) ? $_SERVER['HTTP_X_LINE_SIGNATURE'] : "-";
		$this->events = json_decode($body, true);

		// save log evenry request
		$this->vote_m->log_events($this->signature, $body);

		// debugging data
		file_put_contents('php://stderr', 'Body: '.$body);
	}
}
