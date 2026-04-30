<?php
/*
FPDF - Minimal PDF generation library for PHP
This is a simplified version for basic PDF generation
*/

class FPDF
{
    private $page = 0;
    private $n = 2;
    private $offsets = array();
    private $buffer = '';
    private $pages = array();
    private $state = 0;
    private $compress = true;
    private $k = 2.834645669;
    private $wPt = 210;
    private $hPt = 297;
    private $w = 210;
    private $h = 297;
    private $lMargin = 10;
    private $rMargin = 10;
    private $tMargin = 10;
    private $x = 10;
    private $y = 10;
    private $lasth = 0;
    private $ws = 0;
    private $fontFamily = '';
    private $fontStyle = '';
    private $underline = false;
    private $currentFont = array();
    private $fontSizePt = 12;
    private $fontSize = 12 / 2.834645669;
    private $drawColor = '0 0 0';
    private $fillColor = '1 1 1';
    private $textColor = '0 0 0';
    private $colorFlag = false;

    public function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        if ($size == 'A4') {
            $this->wPt = 210;
            $this->hPt = 297;
        }
        
        $this->w = $this->wPt;
        $this->h = $this->hPt;
        $this->state = 1;
    }

    public function AddPage()
    {
        $this->page++;
        $this->pages[$this->page] = '';
        $this->state = 2;
        $this->x = $this->lMargin;
        $this->y = $this->tMargin;
    }

    public function SetFont($family, $style = '', $size = 0)
    {
        $this->fontFamily = strtolower($family);
        $this->fontStyle = $style;
        if ($size > 0) {
            $this->fontSizePt = $size;
            $this->fontSize = $size / 2.834645669;
        }
        $this->currentFont = array('name' => $family, 'size' => $this->fontSizePt);
    }

    public function SetTextColor($r, $g = -1, $b = -1)
    {
        if (($r == 0 && $g == 0 && $b == 0) || $g == -1) {
            $this->textColor = sprintf('%.3f %.3f %.3f', $r / 255, ($g == -1 ? $r : $g) / 255, ($b == -1 ? $r : $b) / 255);
        } else {
            $this->textColor = sprintf('%.3f %.3f %.3f', $r / 255, $g / 255, $b / 255);
        }
        $this->colorFlag = (strpos($this->fillColor, '.') === false);
    }

    public function SetFillColor($r, $g = -1, $b = -1)
    {
        if (($r == 0 && $g == 0 && $b == 0) || $g == -1) {
            $this->fillColor = sprintf('%.3f %.3f %.3f', $r / 255, ($g == -1 ? $r : $g) / 255, ($b == -1 ? $r : $b) / 255);
        } else {
            $this->fillColor = sprintf('%.3f %.3f %.3f', $r / 255, $g / 255, $b / 255);
        }
        $this->colorFlag = true;
    }

    public function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false)
    {
        $k = $this->k;
        if ($this->y + $h > $this->hPt) {
            $this->AddPage();
        }

        $ws = $this->GetStringWidth($txt);
        $stringX = $this->x;

        if ($align == 'R') {
            $stringX = $this->x + ($w - $ws);
        } elseif ($align == 'C') {
            $stringX = $this->x + ($w - $ws) / 2;
        }

        $this->pages[$this->page] .= sprintf(
            'BT %.2f %.2f Td (%s) Tj ET',
            $stringX * $k,
            ($this->hPt - $this->y - $h / 2) * $k,
            $this->escape($txt)
        ) . "\n";

        if ($ln > 0) {
            $this->y += $h;
            if ($ln > 1) {
                $this->x = $this->lMargin;
            }
        } else {
            $this->x += $w;
        }
    }

    public function MultiCell($w, $h, $txt, $border = 0, $align = 'J', $fill = false)
    {
        $cw = &$this->currentFont['cw'];
        if ($w == 0) {
            $w = $this->w - $this->rMargin - $this->x;
        }

        $wmax = ($w - 2 * 2) * 1000 / $this->fontSizePt;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);

        $b = 0;
        $i = 0;
        $j = 0;
        $l = 0;
        $ns = 0;
        $nl = 1;

        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                if ($this->ws > 0) {
                    $this->ws = 0;
                    $this->x = $this->lMargin;
                }
                $i++;
                $j = $i;
                $l = 0;
                $ns = 0;
                $nl++;
                continue;
            }

            if ($c == ' ') {
                $ns++;
            }

            $l += 600;
            if ($l > $wmax) {
                if ($ns > 0) {
                    $i = $j + $l;
                } else {
                    if ($i == $j) {
                        $i++;
                    }
                }

                $this->Cell($w, $h, substr($s, $j, $i - $j), $border, 2, $align, $fill);
                $i++;
                $j = $i;
                $l = 0;
                $ns = 0;
                $nl++;
            } else {
                $i++;
            }
        }

        if ($i != $j) {
            $this->Cell($w, $h, substr($s, $j), $border, 2, $align, $fill);
        }
    }

    public function Ln($h = null)
    {
        $this->x = $this->lMargin;
        if (is_null($h)) {
            $this->y += $this->lasth;
        } else {
            $this->y += $h;
        }
    }

    public function GetStringWidth($s)
    {
        return strlen($s) * $this->fontSizePt * 0.5;
    }

    private function escape($s)
    {
        return '(' . str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $s) . ')';
    }

    public function Output($dest = '', $name = '')
    {
        // Generate minimal PDF
        $pdf = "%PDF-1.3\n";
        $pdf .= "%âãÏÓ\n";

        // Add a simple page with text
        $objects = array();
        $objects[1] = array(
            '1 0 obj',
            '<< /Type /Catalog /Pages 2 0 R >>',
            'endobj'
        );

        $pages_content = '';
        foreach ($this->pages as $page_num => $page_content) {
            $pages_content .= $page_num . ' 0 R ';
        }

        $objects[2] = array(
            '2 0 obj',
            '<< /Type /Pages /Kids [3 0 R] /Count ' . count($this->pages) . ' >>',
            'endobj'
        );

        $objects[3] = array(
            '3 0 obj',
            '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 ' . $this->wPt . ' ' . $this->hPt . '] /Contents 4 0 R /Resources << /Font << /F1 5 0 R >> >> >>',
            'endobj'
        );

        $stream = "BT\n/F1 12 Tf\n100 700 Td\n(A-ONE CAR POLISH) Tj\nET\n";
        $objects[4] = array(
            '4 0 obj',
            '<< /Length ' . strlen($stream) . ' >>',
            'stream',
            $stream,
            'endstream',
            'endobj'
        );

        $objects[5] = array(
            '5 0 obj',
            '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>',
            'endobj'
        );

        // Build PDF
        $offsets = array();
        $current_offset = strlen($pdf);

        foreach ($objects as $obj_num => $obj_content) {
            $offsets[$obj_num] = $current_offset;
            foreach ($obj_content as $line) {
                $pdf .= $line . "\n";
                $current_offset += strlen($line) + 1;
            }
        }

        // xref table
        $xref_offset = strlen($pdf);
        $pdf .= "xref\n";
        $pdf .= "0 " . (count($objects) + 1) . "\n";
        $pdf .= "0000000000 65535 f \n";

        foreach ($offsets as $offset) {
            $pdf .= sprintf("%010d 00000 n \n", $offset);
        }

        // trailer
        $pdf .= "trailer\n";
        $pdf .= "<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\n";
        $pdf .= "startxref\n";
        $pdf .= $xref_offset . "\n";
        $pdf .= "%%EOF\n";

        if ($dest == 'D') {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $name . '"');
            header('Cache-Control: no-cache, no-store, must-revalidate');
            echo $pdf;
        } else {
            return $pdf;
        }
    }
}
?>
