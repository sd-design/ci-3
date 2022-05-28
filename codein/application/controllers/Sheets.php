<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH. 'vendor/autoload.php';

class Sheets extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *	 GENERAL controller class
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sheets_model', 'sheet');
    }
//	public function index()
//	{
//        $sheetId = "1YfotWSx2w6HTxdmerR5JAFNO2Joeax4eQDfY3bWD378";
//        $get_range = "LeadsFromTilda";
//        $this->sheet->readSheet($sheetId, $get_range);
//
//		echo APPPATH;
//	}
    public function index()
    {
        $sheetId = "1iFGI3rVyVHxHHVdAC3-dNwtavHzw4QNOuBoLyvtOwNQ";
        $get_range = "patmos_members!A2:I";
        $this->sheet->readSheet($sheetId, $get_range);
    }

    public function read()
    {
        $spreadsheetId = "1iFGI3rVyVHxHHVdAC3-dNwtavHzw4QNOuBoLyvtOwNQ";
        $get_range = "patmos_members!A2:I";
        $this->sheet->readSheet($spreadsheetId, $get_range);
    }

    public function registration()
    {
        // $data = $this->sheet->fail_data();
        // var_dump($data);
         $spreadsheetId = '1iFGI3rVyVHxHHVdAC3-dNwtavHzw4QNOuBoLyvtOwNQ';
         $sheetID = "patmos_members";
        $this->sheet->insertData($sheetID, $spreadsheetId);
        
    }

    public function token()
    {
        echo $this->security->get_csrf_hash();
    }

}
