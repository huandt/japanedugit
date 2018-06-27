<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
/**
 * Class for export excel file
 *
 * @author linhvn@peacesoft.net
*/

include 'phpexcel/Classes/PHPExcel/IOFactory.php';
//include 'ExcelExportTemplate.php';

class ExcelExport {
	private $CDT;
	private $excel;
	private $current_sheet;
	
	public $template;
	
	function __construct(){
		$this->CDT 				= &get_instance();
		$objPHPExcel 			= new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		
		$this->excel			= $objPHPExcel;
		$this->current_sheet 	= $objPHPExcel->getActiveSheet();
		$this->template			= new ExcelExportTemplate($this);
	}
	function set_excel($excel_obj) {
		$this->excel 			= $excel_obj;
	}
	
	function get_excel() {
		return $this->excel;
	}
	
	function get_template() {
		return $this->template;
	}
		
	function download($file_name = '') {
		if(empty($file_name)) {
			$file_name			= date('H-i-s-d-m-Y');
		}
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$file_name.'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}
}

class ExcelExportTemplate {
	private $CDT;
	private $excel;
	private $current_sheet;
	private $excel_export;
	private $data_start_cell = array(
			0 => array( 	//Sheet 1
					0=>'A1'
			)
	);

	public $blank_char = '';

	function __construct($excel_export = null){
		$this->CDT 				= &get_instance();

		if(empty($excel_export)) {
			$this->excel_export	= new ExcelExport();
		} else {
			$this->excel_export	= $excel_export;
		}

		$this->excel			= $this->excel_export->get_excel();
		$this->current_sheet 	= $this->excel->getActiveSheet();
	}

	//Create template.
	function load_from_file($file_path) {
		$obj_excel 				= PHPExcel_IOFactory::load($file_path);

		//Get template
		$sheets					= $obj_excel->getAllSheets();
		foreach ($sheets as $skey=>$sheet) {
			$data				= $sheet->toArray(null, true, true, true);
			$state	 			= 0;
			foreach($data as $key=>$child) {
				$end_loop		= false;
				foreach ($child as $letter=>$value) {
					if($value === '{content}') {
						$this->set_data_start_cell($letter.$key, $skey);
						$sheet->fromArray(array(' '), $this->blank_char, $letter.$key);
						$end_loop	= true;
						break;
					}
					if($value === '{content['.$state.']}') {
						$this->set_data_start_cell($letter.$key, $skey, $state);
						$sheet->fromArray(array(' '), $this->blank_char, $letter.$key);
						$state ++;
					}
				}
				if($end_loop) break;
			}
		}

		//Reassign
		$this->excel_export->set_excel($obj_excel);
		$this->excel			= $obj_excel;
	}

	//Draw template
	function create_sheet($name = 'Worksheet', $index = null, $active_sheet = false) {
		$this->excel->createSheet($index);
		if($index == null) {
			$index								= count($this->excel->getAllSheets()) - 1;
			$this->excel->getSheet($index)->setTitle($name);
		} else {
			$this->excel->getSheet($index)->setTitle($name);
		}

		if($active_sheet) $this->excel->setActiveSheetIndex($index);
	}

	function set_current_sheet_title($title = '') {
		if($title != '') {
			$this->current_sheet->setTitle($title);
		}
	}
	function set_sheet_title($index = 0, $title = '') {
		if($title != '') {
			$this->excel->setActiveSheetIndex($sheet);
			$this->excel->getActiveSheet()->setTitle($title);
		}
	}

	//Get custom fields of template
	function set_data_start_cell($cell, $sheet = 0, $state = 0) {
		$this->data_start_cell[$sheet][$state] = $cell;
	}
	function get_data_start_cell($sheet = 0, $state = 0) {
		return $this->data_start_cell[$sheet][$state];
	}
	function get_current_sheet() {
		return $this->current_sheet;
	}

	//Content
	function set_content($data, $sheet = 0, $start_cell = null, $apply_style = true) {
		$this->excel->setActiveSheetIndex($sheet);
		$this->current_sheet 	= $this->excel->getActiveSheet();
		$current_sheet			= $this->current_sheet;
		//Get start cell of content. If it is not given, it will be retrived from template.
		if(empty($start_cell)) {
			$start_cell			= $this->get_data_start_cell($sheet);
			if(empty($start_cell)) $start_cell = 'A1';
		}
		//Get header array and content array
		$header					= null;
		if(isset($data['header'])) {
			$header				= $data['header'];
		}
		$content				= array();
		if(isset($data['content']) && ! empty($data['content'])) {
			$content			= $data['content'];
		} else {
			//return false;
			$content 			= array(' ');
		}

		$cell 					= new ExcelCell($start_cell);

		if(! empty($header)) {
			$current_sheet->fromArray($header,$this->blank_char,$start_cell);
			$end_header_cell 			= chr(ord($cell->get_letter()) + count($header) -1);
			$current_sheet	-> getStyle($start_cell.':'.$end_header_cell.$cell->get_number())
			-> applyFromArray($this->get_header_style());

			$start_content_cell			= $cell->get_number() + 1;
			$current_sheet->fromArray($content,$this->blank_char,$cell->get_letter().$start_content_cell);

			if($apply_style) {
				$data_end_row				= $cell->get_number() + count($content);
				$current_sheet	-> getStyle($start_cell.':'.$end_header_cell.$data_end_row)
				-> applyFromArray($this->get_data_style());
			}
		} else {
			$current_sheet->fromArray($content,$this->blank_char,$start_cell);
			if($apply_style) {
				$end_header_cell 			= chr(ord($cell->get_letter()) + count($content) -1);
				$data_end_row				= $cell->get_number() + count($content) - 1;
				$current_sheet	-> getStyle($start_cell.':'.$end_header_cell.$data_end_row)
				-> applyFromArray($this->get_data_style());
			}
		}
	}

	function set_contents($datas, $sheet = 0, $apply_style = true) {
		$this->excel->setActiveSheetIndex($sheet);
		$this->current_sheet 		= $this->excel->getActiveSheet();
		$current_sheet				= $this->current_sheet;

		//Each data, fill content to sheet
		$state 						= 0;
		foreach ($datas as $data) {
			//Get start cell of content. If it is not given, it will be retrived from template.
			$start_cell						= $this->get_data_start_cell($sheet, $state);
			if(empty($start_cell)) {
				$start_cell					= 'A1';
			}
			//Get header array and content array
			$header							= null;
			if(isset($data['header'])) {
				$header						= $data['header'];
			}
			$content						= array();
			if(isset($data['content']) && ! empty($data['content'])) {
				$content					= $data['content'];
			} else {				
				//return false;
				$content 				= array(' ');
			}
				
			$cell 							= new ExcelCell($start_cell);
				
			if(! empty($header)) {
				$current_sheet->fromArray($header,$this->blank_char,$start_cell);
				$end_header_cell 			= chr(ord($cell->get_letter()) + count($header) -1);
				$current_sheet	-> getStyle($start_cell.':'.$end_header_cell.$cell->get_number())
				-> applyFromArray($this->get_header_style());

				$start_content_cell			= $cell->get_number() + 1;
				$current_sheet->fromArray($content,$this->blank_char,$cell->get_letter().$start_content_cell);
				if($apply_style) {
					$data_end_row				= $cell->get_number() + count($content);
					$current_sheet	-> getStyle($start_cell.':'.$end_header_cell.$data_end_row)
					-> applyFromArray($this->get_data_style());
				}
			} else {
				$current_sheet->fromArray($content,$this->blank_char,$start_cell);
				if($apply_style) {
					$end_header_cell 			= chr(ord($cell->get_letter()) + count($content) -1);
					$data_end_row				= $cell->get_number() + count($content) - 1;
					$current_sheet	-> getStyle($start_cell.':'.$end_header_cell.$data_end_row)
					-> applyFromArray($this->get_data_style());
				}
			}
			$state++;
		}
	}

	//Style
	function get_header_style() {
		$style_title = array(
				'font' => array(
						'bold' => true
				)

		);

		return $style_title;
	}
	function get_content_style() {

	}
	function get_data_style() {
		$style = array(
				'borders' => array(
						'outline' => array(
								'style' => PHPExcel_Style_Border::BORDER_MEDIUM
						)
				)
		);
		return $style;
	}

}

class ExcelCell {
	private $letter			= 'A';
	private $number			= 1;
	function __construct($cell_str = '') {
		$this->letter			= substr($cell_str, 0, 1);
		$this->number			= substr($cell_str, 1);
	}

	function get_letter() {
		return $this->letter;
	}
	function get_number() {
		return $this->number;
	}
}

/*
 * application/library/ExcelExport.php
 */