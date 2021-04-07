<?php
		require './../inc.koneksi.php';
        require './../class/class.Project.php';
		require_once dirname(__FILE__).'/../vendor/autoload.php';
	
		use Spipu\Html2Pdf\Html2Pdf;

		
		$judul = 'LAPORAN DATA PROJECT';
		$content ='<b>'.$judul.'</b>';

		$objProject = new Project(); 
		$arrayResult = $objProject->SelectAllProject();
		$content.= '<table>';
		$content.='<tr>	
					<th>Project Number</th>
					<th>Project Name</th>
					<th>Project Location</th>
					<th>Department Name</th>	
					</tr>';	

		if(count($arrayResult) == 0){
			$content.= '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			foreach ($arrayResult as $dataProject) {
				$content.= '<tr>';
					
					$content.= '<td>'.$dataProject->pnumber.'</td>';	
					$content.= '<td>'.$dataProject->pname.'</td>';
					$content.= '<td>'.$dataProject->plocation.'</td>';
					$content.= '<td>'.$dataProject->dept->dname.'</td>';					
				    $content.= '</tr>';				
			}
		}
		$content.= '</table>';

		$html2pdf = new HTML2PDF('L', 'A4', 'fr');
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		if (ob_get_contents()) 
		   ob_end_clean();
		//$html2pdf->output();
		$html2pdf->output('Laporan_Data_Project.pdf');		
?>
