<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Home
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Home extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */

	public function index(): void {
		date_default_timezone_set($this->config->get('date_timezone'));
		$this->load->language('common/home');
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['language'] = $this->config->get('config_language');
		if (is_file(DIR_IMAGE . $this->config->get('avatar_logo'))) {
			$data['imgbot'] = $this->config->get('config_url') . 'image/' . $this->config->get('avatar_logo');
		} else {
			$data['imgbot'] = '';
		}


		$data['msg_welcome']=$this->language->get('text_welcome');
		$data['btn_dowload']=$this->language->get('text_btn_dowload');
		$data['msg_not_undertand']=$this->language->get('text_not_undertand');
		$data['current_time']=date('h:i:s A');

		$this->response->setOutput($this->load->view('common/home', $data));
	}

	public function welcomeMsg(): void {
		$this->load->language('common/home');
		date_default_timezone_set($this->config->get('date_timezone'));
		$data=[];
		$data['msg_welcome']=$this->language->get('text_welcome');
		$data['current_time']=date('h:i:s A');
		$this->response->setOutput(json_encode($data));
	}

	public function getMsgDocuemnt(): void{
		$this->load->language('common/home');
		$data['msg_request_document']=$this->language->get('text_request_document');
		$this->response->setOutput(json_encode($data));
	}
    public function generatePdfAccount(): void{
		$this->load->language('owner/account_status');
		$this->load->model('owner/account_status');
		date_default_timezone_set($this->config->get('date_timezone'));
		//var_dump($this->load->model('owner/account_status'));
		$filter_data=[];
		$owner = $this->model_owner_account_status->getAccount(1);

		$data=[];
		$data['account']['date']= date('d/m/Y');
		$data['account']['owner_name']= $owner['owner_name'];
		$data['account']['owner_name']= $owner['owner_name'];
		$data['account']['balance']= $this->currency->format($owner['balance'], $this->config->get('config_currency'));
		$data['account']['document_number']= $owner['document_number'];
		$data['content']=$this->load->view('owner/tpl_pdf', $data);
		$data['name_document']=$owner['owner_name'].$owner['document_number'];
		$this->pdf->generateDocument($data);

		$data_response=[];
		$data_response['current_time']=date('h:i:s A');
		$data_response['ruta_dowload']=HTTP_SERVER.'documents/'.$data['name_document'].'.pdf';
		$this->response->setOutput(json_encode($data_response));
	}

	public function closeChat(): void
	{
		$this->load->language('common/home');
		date_default_timezone_set($this->config->get('date_timezone'));
		$data=[];
		$data['msg_bye']=$this->language->get('text_bye');
		$data['current_time']=date('h:i:s A');
		$this->response->setOutput(json_encode($data));
	}
}
