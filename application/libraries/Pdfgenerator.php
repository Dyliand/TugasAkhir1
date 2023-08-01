<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require_once("./vendor/dompdf/dompdf/autoload.inc.php");
require_once("./vendor/autoload.php");

use Dompdf\Dompdf;

class Pdfgenerator
{

    public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = "portrait")
    {
        $dompdf = new DOMPDF();
        $dompdf->getOptions()->set('isRemoteEnabled', TRUE);
        $dompdf->getOptions()->setChroot(FCPATH);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 1));
        } else {
            return $dompdf->output();
        }
    }
}
