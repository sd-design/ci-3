<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sheets_model extends CI_Model
{
    private $credentials = APPPATH. 'vendor/ap-landing-1529413281194-d6d81a575619.json';
    private $account = 'naghtigall@gmail.com';

    public function readSheet($spreadsheetId, $get_range){

        $client = new \Google_Client();
        $client->setApplicationName('PHPsheets');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig($this->credentials);
        $service = new \Google_Service_Sheets($client);
        $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
        $values = $response->getValues();

        $count = count($values)+1;
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;

        //echo $count."\n";
    }

    public function insertData($sheetID, $spreadsheetId, $values = false)
    {
        if($values){
          $insert_values = $values;
                  }
                  else{
                    $insert_values = $this->getPOST();
                            }
                 

        $client = new \Google_Client();
        $client->setApplicationName('PHPsheets');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig($this->credentials);
        $service = new Google_Service_Sheets($client);
         $append_range = $sheetID.'!A:I';
        $body = new Google_Service_Sheets_ValueRange(['values' => $insert_values]);
      $params = [
          'valueInputOption' => 'RAW'
        ];
$result = $service->spreadsheets_values->append($spreadsheetId, $append_range,
$body, $params);
$this->response($result, $spreadsheetId);
}

    private function getPOST(){
        if(empty($_POST)){
            return null;
        }
        else{
            //Basic inputs define
            $name = self::setValue('name_');
            $surname = self::setValue('lastname_');
            $church= self::setValue('church_');
            $city = self::setValue('city_');
            $age = self::setValue('age_');
            $phone = self::setValue('phone_');
            $email = self::setValue('email_');
            $dateFrom = self::setValue('dateFrom_');
            $dateTo = self::setValue('dateTo_');
            //var_dump($nominations);exit;
            //Utm-params
            $insert_values =  [[
                $surname,
                $name,
                $church,
                $city,
                $age,
                $phone,
                $email,
                $dateFrom,
                $dateTo,
                date("Y-m-d H:i:s"),
                $_SERVER['HTTP_HOST']
            ]];
            return $insert_values;
        }

    }

    private function setValue($value){
        $getValue = empty($_POST[$value]) ? "Undefined" : $_POST[$value];
        return $getValue;
    }
    public function fail_data()
    {
        $insert_values = $this->getPOST();
        return $insert_values;

    }


    public  function response($resultResponse, $spreadsheetId = '') 
    {
    
        if($spreadsheetId === $resultResponse->spreadsheetId){
            $answer = array('response'=>true, 'code'=>'200');
             header('Content-type: application/json',TRUE, 200);
              echo json_encode($answer);
          }
          else{
              $answer = array('response'=>false, 'code'=>'500');
                  header('Content-type: application/json',TRUE, 500);
                      echo json_encode($answer);
                  }
    }
    

}
