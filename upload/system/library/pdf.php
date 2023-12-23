<?php
namespace Opencart\System\Library;
require_once dirname(__FILE__).'../html2pdf/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


/**
 * Class Request
 */
class Pdf {
	public function generateDocument($data): void {
		try {
			ob_start();
			//include dirname(__FILE__).'/res/example00.php';
			// $content = ob_get_clean();
			//$content = "Hola mundo";
			$content = $data['content'];
			$html2pdf = new Html2Pdf('P', 'A4', 'es');
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content);
			//$html2pdf->output('cuenta_propietario.pdf', 'D');
			$html2pdf->output(DIR_DOCUMENTS.$data['name_document'].'.pdf', 'F');
		} catch (Html2PdfException $e) {
			$html2pdf->clean();

			$formatter = new ExceptionFormatter($e);
			echo $formatter->getHtmlMessage();
		}
	}
}
?>
