<?php
session_start();
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */

//$eid = $_SESSION['eid '];
# Database name
$db = "bioreactor";

# Internet address or hostname of database host
$db_host = "127.0.0.1";

# Database username
$db_user = "root";

# Database password
$db_password = "sbn1024";

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Srno')
            ->setCellValue('B1', 'Eid')
            ->setCellValue('C1', 'Percentage');
            ->setCellValue('D1', 'HFT');
            ->setCellValue('E1', 'CFT');
            ->setCellValue('F1', 'THOUT');
            ->setCellValue('G1', 'TCOUT');
            
 # Connect to the database and report any errors on connect.
 $con = mysqli_connect($db_host,$db_user,$db_password,$db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$stuff = mysqli_query($con, "SELECT * FROM htl_datanew") or die("MySQL Login Error: ".mysql_error()); 
 # Check for errors.
if (mysqli_num_rows($stuff) > 0)
 { 
 $row=mysqli_num_rows($stuff);

while($row = mysqli_fetch_array($stuff))
  {
$srno=$row['Srno'];
$percent=$row['percent']; 
$hft=$row['hft'];
$cft=$row['cft'];
$thout=$row['thout'];
$tcout=$row['tcout'];
$srnox = intval($srno) +1;

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
	    ->setCellValue('A'.$srnox, $srno)
	    ->setCellValue('B1', 'Eid')
            ->setCellValue('C1', 'Percentage');
            ->setCellValue('D1', 'HFT');
            ->setCellValue('E1', 'CFT');
            ->setCellValue('F1', 'THOUT');
            ->setCellValue('G1', 'TCOUT');
}
}

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="experiment-data.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 2017 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
