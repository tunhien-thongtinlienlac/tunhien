
@for($i=1;$i<=10;$i=$i+1)
	@if($i<10)
		0{{ $i }}
	@else
		{{ $i }}
	@endif
@endfor
<hr>
<?php
	$b = 10;
?>
@while($b>0)
	{{ $b }}
	<?php $b-=2;?>
@endwhile
<hr>
<?php
$array = array(
	array(
	'stt' => 1, 
	'Name' => 'Minh',
	'Date' => '23/10/1997',
	'Year' => 2018),
	array(
	'stt' => 2, 
	'Name' => 'Tuyết',
	'Date' => '04/02/2016',
	'Year' => 2018),
	array(
	'stt' => 3, 
	'Name' => 'Uyên',
	'Date' => '06/06/1996',
	'Year' => 2018)
);
?>
@foreach ($array as $key => $value) 
	stt:{{ $value['stt'] }}
	<br>
	Name:{{ $value['Name'] }}
	<br>
	Date:{{ $value['Date'] }}
	<br>
	Year:{{ $value['Year'] }}
	<br>
@endforeach
