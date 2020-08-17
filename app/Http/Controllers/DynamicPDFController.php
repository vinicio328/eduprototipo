<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Estudiante;

class DynamicPDFController extends Controller
{

	function pdf($estudiante_id)
	{
		$pdf = \App::make('dompdf.wrapper');
		$estudiante = Estudiante::find($estudiante_id);
		$pdf->loadHTML($this->convert_customer_data_to_html($estudiante));
		return $pdf->stream();
	}

	function convert_customer_data_to_html(Estudiante $estudiante)
	{
		$output = '
		<h3 align="center">Boleta de Notas</h3>
		
		<br>
		<table width="50%" style="border: none">
			<tr>
				<td width="20%">Nombre:</td>
				<td>'.$estudiante->nombres . ' ' .$estudiante->apellidos.'</td>
				</tr>
				<tr>
				<td width="20%">Carnet:</td>
				<td>'.$estudiante->carnet.'</td>
				</tr>
				<tr>
				<td width="20%">Email:</td>
				<td>'.$estudiante->email.'</td>
			</tr>	
		</table>
		<br>
		<table width="100%" style="border-collapse: collapse; border: 0px;">
		<tr>
		<th style="border: 1px solid; padding:12px;" width="20%">Codigo</th>
		<th style="border: 1px solid; padding:12px;" width="30%">Nombre</th>
		<th style="border: 1px solid; padding:12px;" width="15%">Nota</th>
		<th style="border: 1px solid; padding:12px;" width="15%">Resultado</th>
		</tr>
		';  
		foreach($estudiante->cursos as $curso)
		{
			$nota = rand(0,100);
			$resultado = ($nota > 60) ? 'Aprobado' : 'Reprobado';
			$output .= '
			<tr>
			<td style="border: 1px solid; padding:12px;">'.$curso->codigo.'</td>
			<td style="border: 1px solid; padding:12px;">'.$curso->nombre.'</td>
			<td style="border: 1px solid; padding:12px;">'.$nota.'</td>
			<td style="border: 1px solid; padding:12px;">'.$resultado.'</td>			
			</tr>
			';
		}
		$output .= '</table>';
		return $output;

	}
}
