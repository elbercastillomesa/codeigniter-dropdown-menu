<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class File extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->model('partners_model');		
	}
 
    public function asesores()
    {
        
    	// Bring data from Model
    	$data = $this->partners_model->get_asesores();

    	// Create XLSX Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $writer = new Xlsx($spreadsheet); 
        $filename = 'asesoresOndas_'.date('Y_m_d_H_i_s');

        // Write data to Spreadsheet File

        var_dump($data);
        $sheet->setCellValue('A1', 'Nombres');
        $sheet->setCellValue('B1', 'Apellidos');
        $sheet->setCellValue('C1', 'Telefono');
        $sheet->setCellValue('D1', 'Celular');
        $sheet->setCellValue('E1', 'email');



 $asesor['primer_nombre'].' '.$asesor['segundo_nombre'] ; ?></td>
                <td><?php echo $asesor['primer_apellido'].' '.$asesor['segundo_apellido'] ; ?></td>
                <td><?php echo $asesor['telefono'] ; ?></td>
                <td><?php echo $asesor['celular'] ; ?></td>
                <td><?php echo $asesor['asesor_email'] </td>



        $sheet->setCellValue('A1', 'Hello World !');        
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        //$writer->save('php://output'); // download file 
 
    }

}