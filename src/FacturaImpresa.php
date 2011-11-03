<?php
require_once(LIB_DIR .'fpdf.php');
class FacturaImpresa extends FPDF {
	function Header() {
		$title = "Factura";
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Calculamos ancho y posición del título.
		$w = $this->GetStringWidth($title)+6;
		$this->SetX((210-$w)/2);
		// Colores de los bordes, fondo y texto
		$this->SetDrawColor(0,0,0);
		$this->SetFillColor(0,0,0);
		$this->SetTextColor(255,255,255);
		// Ancho del borde (1 mm)
		$this->SetLineWidth(1);
		// Título
		$this->Cell($w,9,$title,1,1,'C',true);
		// Salto de línea
		$this->Image('lib/logoFormatic.png',10,10,-300);
		$this->Ln(25);
	}

	function Footer() {
		// Posición a 1,5 cm del final
		$this->SetY(-15);
		// Arial itálica 8
		$this->SetFont('Arial','I',8);
		// Color del texto en gris
		$this->SetTextColor(128);
		// Número de página
		//$this->Cell(0,10,utf8_decode('Página '.$this->PageNo()),0,0,'C');
		$this->Cell(0,10,utf8_decode('Formatic Escuela de Programadores. Rúa Telleira, 10. Ourense. Telf. 988 224827. Email: formatic@mundo-r.com'),0,0,'C');
	}

	function loadData($num, $fecha, $alumno, $dni){
		$this->addPage();
		$this->setNum($num);
		$this->setFecha($fecha);
		$this->setAlumno($alumno);
		$this->setDni($dni);
		$this->setLineHeader();
	}
	function setLineHeader(){
		$this->SetFont('Arial','',12);
		// Color de fondo
		$this->SetFillColor(210,210,210);
		$this->Cell(130,6,utf8_decode("Concepto"),0,0,'L',1);
		$this->Cell(20,6,utf8_decode("Cantidad"),0,0,'R',1);
		$this->Cell(20,6,utf8_decode("Precio")  ,0,0,'R',1);
		$this->Cell(20,6,utf8_decode("Importe") ,0,0,'R',1);
		$this->Ln();
	}
	function setAlumno($alumno) {
		// Arial 12
		$this->SetFont('Arial','',12);
		// Color de fondo
		$this->SetFillColor(210,210,210);
		// Título
		$this->Cell(0,6,utf8_decode("Alumno: $alumno"),0,1,'L',true);
		// Salto de línea
		$this->Ln(4);
	}
	function setDni($dni) {
		// Arial 12
		$this->SetFont('Arial','',12);
		// Color de fondo
		$this->SetFillColor(210,210,210);
		// Título
		$this->Cell(0,6,utf8_decode("DNI/NIF: $dni"),0,1,'L',true);
		// Salto de línea
		$this->Ln(4);
	}
	function setNum($num) {
		// Arial 12
		$this->SetFont('Arial','',12);
		// Color de fondo
		$this->SetFillColor(210,210,210);
		// Título
		$this->Cell(0,6,utf8_decode("Factura número: $num"),0,1,'L',true);
		// Salto de línea
		$this->Ln(4);
	}
	function setFecha($fecha) {
		// Arial 12
		$this->SetFont('Arial','',12);
		// Color de fondo
		$this->SetFillColor(210,210,210);
		// Título
		$this->Cell(0,6,"Fecha: $fecha",0,1,'L',true);
		// Salto de línea
		$this->Ln(4);
	}

	function addText($size, $txt, $align = 'L') {
		// Times 12
		//$this->SetFont('Times','',12);
		$this->SetFont('Arial','',12);
		// Imprimimos el texto justificado
		$this->Cell($size,5,utf8_decode($txt), 0, 0, $align);
	}
	function addLine(){
		$this->Ln();
	}
	function setTotal($total) {
		// Arial 12
		$this->SetFont('Arial','',12);
		// Color de fondo
		$this->SetFillColor(210,210,210);
		// Título
		$this->Cell(190,6,"Total: $total",0,1,'R',true);
		// Salto de línea
		$this->Ln(4);
	}
}

?>
