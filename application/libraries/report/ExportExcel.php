<?php
/**
	* Xử lý xuất file excel
 */
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class ExportExcel{
	
	/**
     * Header of excel document (prepended to the rows)
     * 
     * Copied from the excel xml-specs.
     * 
     * @access private
     * @var string
     */
    private $header = '<?xml version="1.0"?>
						<?mso-application progid="Excel.Sheet"?>
						<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
						 xmlns:o="urn:schemas-microsoft-com:office:office"
						 xmlns:x="urn:schemas-microsoft-com:office:excel"
						 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
						 xmlns:html="http://www.w3.org/TR/REC-html40">
						 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
						  <Author>ThanhNH</Author>
						  <LastAuthor>HanhDT</LastAuthor>
						  
						  <Version>12.00</Version>
						 </DocumentProperties>
						 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
						  <WindowHeight>7935</WindowHeight>
						  <WindowWidth>20055</WindowWidth>
						  <WindowTopX>240</WindowTopX>
						  <WindowTopY>75</WindowTopY>
						  <ProtectStructure>False</ProtectStructure>
						  <ProtectWindows>False</ProtectWindows>
						 </ExcelWorkbook>
						 <Styles>
						  <Style ss:ID="Default" ss:Name="Normal">
						   <Alignment ss:Vertical="Bottom"/>
						   <Borders/>
						   <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
						   <Interior/>
						   <NumberFormat/>
						   <Protection/>
						  </Style>
						  <Style ss:ID="m7913184">
						   <Alignment ss:Horizontal="Left" ss:Vertical="Center"/>
						   <Borders>
							<Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
							<Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
							<Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
							<Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
						   </Borders>
						   <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="16" ss:Color="#000000"
							ss:Bold="1"/>
						   <Interior/>
						  </Style>
						  <Style ss:ID="s75">
						   <Alignment ss:Vertical="Center"/>
						   <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
						  </Style>
						  
						  <Style ss:ID="s95">
						   <Alignment ss:Horizontal="Left" ss:Vertical="Center"/>
						   <Borders>
							<Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
							<Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
							<Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
							<Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
						   </Borders>
						   <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
						  </Style>
                          
                          <Style ss:ID="s96">
						   <Alignment ss:Horizontal="Left" ss:Vertical="Center"/>
						   <Borders>
							<Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="0"/>
							<Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="0"/>
							<Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="0"/>
							<Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="0"/>
						   </Borders>
						   <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
						  </Style>
						  
						 </Styles>
					   ';

    /**
     * Footer of excel document (appended to the rows)
     * 
     * Copied from the excel xml-specs.
     * 
     * @access private
     * @var string
     */
    private $footer = '</Workbook>';

    /**
     * Document lines (rows in an array)
     * 
     * @access private
     * @var array
     */
    private $lines = array ();
    
    private $linesColumn = array();

    /**
     * Worksheet title
     *
     * Contains the title of a single worksheet
     *
     * @access private 
     * @var string
     */
    private $worksheet_title = "Table1";

    /**
     * Set header cho file excel
     *
     * @param string $header
     */
	public function setHeader($header)
    {
    	$this->lines[0] = '<Row ss:AutoFitHeight="0"><Cell ss:StyleID="s95"><Data ss:Type="String">'.$header.'</Data></Cell>\n</Row>';
    }
    /**
     * Add a single row to the $document string
     * 
     * @access private
     * @param array 1-dimensional array
     * @todo Row-creation should be done by $this->addArray
     */
    public function addRow ($array)
    {

        // initialize all cells for this row
        $cells = '';

        // foreach key -> write value into cells
        foreach ($array as $k => $v):
            //$cells .= '<Cell ss:StyleID="s95"><Data ss:Type="String">' . $v . '</Data></Cell>\n'; 
            if($array[1] == "")
                $cells .= '<Cell ss:StyleID="s96"><Data ss:Type="String">' . $v . '</Data></Cell>\n';
            else
                $cells .= '<Cell ss:StyleID="s95"><Data ss:Type="String">' . $v . '</Data></Cell>\n'; 
        endforeach;

        // transform $cells content into one row
        $this->lines[] = '<Row ss:AutoFitHeight="0">' . $cells . '</Row>';

    }
    
    public function addRowContent($array)
    {
        // initialize all cells for this row
        $cells = '';

        // foreach key -> write value into cells
        foreach ($array as $k => $v):
            if($array[1] == "")
                $cells .= '<Cell ss:StyleID="s96"><Data ss:Type="String">' . $v . '</Data></Cell>\n';
            else
                $cells .= '<Cell><Data ss:Type="String">' . $v . '</Data></Cell>\n'; 
        endforeach;

        // transform $cells content into one row
        $this->linesColumn[] = '<Row ss:AutoFitHeight="0">' . $cells . '</Row>';

    
    }
    
    public function addColumnTable($array)
    {
        // initialize all cells for this row
        $cells = '';

        // foreach key -> write value into cells
        foreach ($array as $k => $v):
            if($array[1] == "")
                $cells .= '<Cell ss:StyleID="s96"><Data ss:Type="String">' . $v . '</Data></Cell>\n';
            else
                $cells .= '<Cell><Data ss:Type="String">' . $v . '</Data></Cell>\n'; 
        endforeach;

        // transform $cells content into one row
        $this->lines[] = '<Row ss:AutoFitHeight="0">' . $cells . '</Row>';
    }

    /**
     * Add an array to the document
     * 
     * This should be the only method needed to generate an excel
     * document.
     * 
     * @access public
     * @param array 2-dimensional array
     * @todo Can be transfered to __construct() later on
     */
    public function addArray ($array)
    {
		// run through the array and add them into rows
        foreach ($array as $k => $v):
            $this->addRow ($v);
        endforeach;

    }
    
    public function addArrayContent ($array)
    {
		// run through the array and add them into rows
        foreach ($array as $k => $v):
            $this->addRowContent($v);
        endforeach;

    }

    /**
     * Set the worksheet title
     * 
     * Checks the string for not allowed characters (:\/?*),
     * cuts it to maximum 31 characters and set the title. Damn
     * why are not-allowed chars nowhere to be found? Windows
     * help's no help...
     *
     * @access public
     * @param string $title Designed title
     */
    public function setWorksheetTitle ($title)
    {

        // strip out special chars first
        $title = preg_replace ("/[\\\|:|\/|\?|\*|\[|\]]/", "", $title);

        // now cut it to the allowed length
        $title = substr ($title, 0, 31);

        // set title
        $this->worksheet_title = $title;

    }

    /**
     * Generate the excel file
     * 
     * Finally generates the excel file and uses the header() function
     * to deliver it to the browser.
     * 
     * @access public
     * @param string $filename Name of excel file to generate (...xls)
     */
    function generateXML ($filename, $isDowload = false)
    {
		/**
			* export and download to desktop
		*/
    	if($isDowload)
    	{
	        header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" ); 
	        header ( "Cache-Control: no-cache, must-revalidate" ); 
	        header ( "Pragma: no-cache" ); 
	        header ( "Content-type: application/x-msexcel" ); 
	        // deliver header (as recommended in php manual)
	        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
	        header("Content-Disposition: inline; filename=\"" . $filename . "\"");
	
	        // print out document to the browser
	        // need to use stripslashes for the damn ">"
			echo stripslashes ($this->header);
            echo "\n<Worksheet ss:Name=\"" . $this->worksheet_title . "\">\n";
	        echo "\n<Table>\n";
	        echo "<Column ss:Index=\"1\" ss:AutoFitWidth=\"0\" ss:Width=\"110\"/>\n";
            echo implode ("", $this->linesContent);
	        echo implode ("", $this->lines);
	        echo "</Table>\n";
            echo "</Worksheet>\n";
	        echo $this->footer;
			exit();
    	}
    	
		/**
			* export to folder server
			* @para: $filename is full path with extension .xls
		*/
    	else 
    	{
			$content = stripslashes ($this->header)."\n<Worksheet ss:Name=\"" . $this->worksheet_title . "\">\n<Table>\n"."<Column ss:Index=\"1\" ss:AutoFitWidth=\"0\" ss:Width=\"110\"/>\n".implode ("", $this->lines)."</Table>\n</Worksheet>\n".$this->footer;
			
			$f = fopen($filename, 'wb');
			if (!$f) {
				$this->Error('Unable to create output file.');
			}
			fwrite($f, $content);
			fclose($f);
			//echo 'Đã xuất file excel thành công!';        
			//exit();
    	}	
    }
    
    function modifyXML ($filename, $isDowload = false)
    {
		/**
			* export and download to desktop
		*/
    	if($isDowload)
    	{
	        header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" ); 
	        header ( "Cache-Control: no-cache, must-revalidate" ); 
	        header ( "Pragma: no-cache" ); 
	        header ( "Content-type: application/x-msexcel" ); 
	        // deliver header (as recommended in php manual)
	        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
	        header("Content-Disposition: inline; filename=\"" . $filename . "\"");
	
	        // print out document to the browser
	        // need to use stripslashes for the damn ">"
			echo stripslashes ($this->header);
            echo "\n<Worksheet ss:Name=\"" . $this->worksheet_title . "\">\n";
	        echo "\n<Table>\n";
	        echo "<Column ss:Index=\"1\" ss:AutoFitWidth=\"0\" ss:Width=\"110\"/>\n";
            echo implode ("", $this->linesContent);
	        echo implode ("", $this->lines);
	        echo "</Table>\n";
            echo "</Worksheet>\n";
	        echo $this->footer;
			exit();
    	}
    	
		/**
			* export to folder server
			* @para: $filename is full path with extension .xls
		*/
    	else 
    	{
			$content = stripslashes ($this->header)."\n<Worksheet ss:Name=\"" . $this->worksheet_title . "\">\n<Table>\n"."<Column ss:Index=\"1\" ss:AutoFitWidth=\"0\" ss:Width=\"110\"/>\n".implode ("", $this->lines)."</Table>\n</Worksheet>\n".$this->footer;
			
			$f = fopen($filename, 'wb');
			if (!$f) {
				$this->Error('Unable to create output file.');
			}
			fwrite($f, $content);
			fclose($f);
			//echo 'Ðã xu?t file excel thành công!';        
			//exit();
    	}	
    }
    
	
}


?>