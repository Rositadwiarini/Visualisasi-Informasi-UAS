<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	/* {
		$jsonData='[{"nama":"I\/a","jumlah":"4"},{"nama":"I\/b","jumlah":"11"},{"nama":"I\/c","jumlah":"52"},{"nama":"I\/d","jumlah":"21"},{"nama":"II\/a","jumlah":"187"},{"nama":"II\/b","jumlah":"83"},{"nama":"II\/c","jumlah":"391"},{"nama":"II\/d","jumlah":"228"},{"nama":"III\/a","jumlah":"442"},{"nama":"III\/b","jumlah":"946"},{"nama":"III\/c","jumlah":"476"},{"nama":"III\/d","jumlah":"589"},{"nama":"IV\/a","jumlah":"1432"},{"nama":"IV\/b","jumlah":"118"},{"nama":"IV\/c","jumlah":"41"},{"nama":"IV\/d","jumlah":"5"},{"nama":"IV\/e","jumlah":"3"}]';

		$jsonData2='[{"tahun":"2010","val":0},{"tahun":"2011","val":0},{"tahun":"2012","val":0},{"tahun":"2013","val":0},{"tahun":"2014","val":0},{"tahun":"2015","val":0},{"tahun":"2016","val":"52943.00"},{"tahun":"2017","val":"54760.00"},{"tahun":"2018","val":0}]';

		$jumlahPangkat=json_decode($jsonData);
		$grafik_data=[];
		foreach($jumlahPangkat as $row)
		{
			$dt=array($row->nama,intval($row->jumlah));
			array_push($grafik_data, $dt);
		}

		$jsonData2Array=json_decode($jsonData2);

		$grafik_data2=[];
		foreach($jsonData2Array as $row)
		{
			$dt=array($row->tahun,intval($row->val));
			array_push($grafik_data2, $dt);
		}

		$title='Grafik Data Persentase Jomblo di UAD';		

		$data['grafik_data']=json_encode($grafik_data2);
		$data['title']=$title;
		$this->load->view('chart',$data);
	} */
	{}
	function rosita()
	{
		$chartData=file_get_contents('assets/visin.json');
		$chartData=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $chartData), true);
		$res=array();
		$keysArray=array();
	/*	foreach($chartData as $row)
		{
			$jenis=(int)$row['bayi laki-laki hidup'];
			
			
			if(!isset($res[$row['puskesmas']]))
			{
				$res[$row['puskesmas']]=array($row['bayi laki-laki hidup']);
				array_push($keysArray,$row['puskesmas']);
			}else{
				array_push($res[$row['puskesmas']], $row['bayi laki-laki hidup']);
			}
		}
	
		//$keys=array_keys($res);
		$PieChartData=array();
		foreach($keysArray as $row)
		{
			$PieChartData[]=[$row,array_sum($res[$row])];
		}
		//echo json_encode($res);
		$data['PieChartTitle']='Jumlah Kelahiran Bayi Laki-laki Hidup';
		$data['PieChartData']=json_encode($PieChartData);
	*/
//BAR PERTAMA
	$totalpuskesmas=[array('PUSKESMAS','JUMLAH SELURUH KELAHIRAN BAYI LAKI-LAKI HIDUP',array('role'=>'style'))];
	$totaldata=array();
	foreach($chartData as $row)
	{
		$rosita=$row['puskesmas'];
		
		if(!isset($totaldata[$rosita]))
		{
			$totaldata[$rosita]=[$row['bayi laki-laki hidup']];
		}else{
			array_push($totaldata[$rosita],$row['bayi laki-laki hidup']);
		}
	
}
	$rosita=array_keys($totaldata);
	foreach(array_keys($totaldata) as $row)
	{
		$dat =[$row,array_sum($totaldata[$row]),'jumlah'];
		array_push($totalpuskesmas, $dat);
	}
	$data['BarChartTitle']= ' JUMLAH SELURUH KELAHIRAN BAYI LAKI-LAKI HIDUP ';
	$data['BarChartData']=json_encode($totalpuskesmas); 


//BAR KEDUA

	$totalbayi=[array('PUSKESMAS','JUMLAH SELURUH KELAHIRAN BAYI LAKI-LAKI MATI',array('role'=>'style'))];
	$totaldata2=array();
	foreach($chartData as $row)
	{
		$rosita2=$row['puskesmas'];
		
		if(!isset($totaldata2[$rosita2]))
		{
			$totaldata2[$rosita2]=[$row['bayi laki-laki mati']];
		}else{
			array_push($totaldata2[$rosita2],$row['bayi laki-laki mati']);
		}
	
}
	$rosita2=array_keys($totaldata2);
	foreach(array_keys($totaldata2) as $row)
	{
		$dat =[$row,array_sum($totaldata2[$row]),'jumlah'];
		array_push($totalbayi, $dat);
	}
	$data['BarChartTitle2']= ' JUMLAH SELURUH KELAHIRAN BAYI LAKI-LAKI MATI ';
	$data['BarChartData2']=json_encode($totalbayi); 

//BAR KETIGA

	$totalkecamatan=[array('PUSKESMAS','JUMLAH SELURUH KELAHIRAN BAYI PEREMPUAN HIDUP',array('role'=>'style'))];
	$totaldata3=array();
	foreach($chartData as $row)
	{
		$rosita3=$row['puskesmas'];
		
		if(!isset($totaldata3[$rosita3]))
		{
			$totaldata3[$rosita3]=[$row['bayi perempuan hidup']];
		}else{
			array_push($totaldata3[$rosita3],$row['bayi perempuan hidup']);
		}
	
}
	$rosita3=array_keys($totaldata3);
	foreach(array_keys($totaldata3) as $row)
	{
		$dat =[$row,array_sum($totaldata3[$row]),'jumlah'];
		array_push($totalkecamatan, $dat);
	}
	$data['BarChartTitle3']= ' JUMLAH SELURUH KELAHIRAN BAYI PEREMPUAN HIDUP ';
	$data['BarChartData3']=json_encode($totalkecamatan);

//BAR KEEMPAT

	$totalkelahiran=[array('PUSKESMAS','JUMLAH SELURUH KELAHIRAN BAYI PEREMPUAN MATI',array('role'=>'style'))];
	$totaldata4=array();
	foreach($chartData as $row)
	{
		$rosita4=$row['puskesmas'];
		
		if(!isset($totaldata4[$rosita4]))
		{
			$totaldata4[$rosita4]=[$row['bayi perempuan mati']];
		}else{
			array_push($totaldata4[$rosita4],$row['bayi perempuan mati']);
		}
	
}
	$rosita4=array_keys($totaldata4);
	foreach(array_keys($totaldata4) as $row)
	{
		$dat =[$row,array_sum($totaldata4[$row]),'jumlah'];
		array_push($totalkelahiran, $dat);
	}
	$data['BarChartTitle4']= ' JUMLAH SELURUH KELAHIRAN BAYI PEREMPUAN MATI ';
	$data['BarChartData4']=json_encode($totalkelahiran); 

//BAR KELIMA

	$totalibu=[array('PUSKESMAS','JUMLAH SELURUH IBU MELAHIRKAN MATI',array('role'=>'style'))];
	$totaldata5=array();
	foreach($chartData as $row)
	{
		$rosita5=$row['puskesmas'];
		
		if(!isset($totaldata5[$rosita5]))
		{
			$totaldata5[$rosita5]=[$row['ibu melahirkan mati']];
		}else{
			array_push($totaldata5[$rosita5],$row['ibu melahirkan mati']);
		}
	
}
	$rosita5=array_keys($totaldata5);
	foreach(array_keys($totaldata5) as $row)
	{
		$dat =[$row,array_sum($totaldata5[$row]),'jumlah'];
		array_push($totalibu, $dat);
	}
	$data['BarChartTitle5']= ' JUMLAH SELURUH IBU MELAHIRKAN MATI ';
	$data['BarChartData5']=json_encode($totalibu); 

		$this->load->view('rosita', $data);

	}
}
