<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mails\ForgotPassword;
class DangKyController extends Controller
{
	
    public function them(Request $request){

    	//Xử lý thông tin trong file json 

    		/*$vd = file_get_contents(storage_path()."/account/data.json");
    		$data_vd = json_decode($vd);*/

    		echo $request->username."<br>";
    		echo $request->pass;
    		die;



			/*$add = (file_get_contents(storage_path()."/account/data.json"));
			$array = json_decode($add,true);
		 	$array[]=[
		 		'name' => $request->user,
		 		'pass' => $request->pass,
		 		'name_image' => $request->file('fImage')->getClientOriginalName()
		 	];
		 	 $name_image = $request->file('fImage')->getClientOriginalName();
		 	 $des_img = 'public/upload';
		 	$data = json_encode($array);
		 	file_put_contents(storage_path().'/account/data.json', $data);*/
		 	$test1 = file_get_contents(storage_path()."/account/data.json",true);
		 	$data_test = json_decode($test1,true);
		 	$dem=0;
		 	foreach ($data_test as $key => $value) {
		 		if($request->username == $value['name'] && $request->pass == $value['pass']){
		 			$dem++;
		 		}
		 	}
		 	if ($dem == 1) {
		 		echo "Ok";
		 	}
		 	else
		 		echo "Đăng nhập thất bại";
		 	die;

		 	// file_get_contents(filename);

		 	//UpLoad hình ảnh


		 	/*$name  = $request->file('fImage')->getClientOriginalName();
		 	// echo $name."<br>";
		 	print_r($request->file('fImage')->getClientOriginalName()."<br>");
		 	print_r($request->file('fImage')->getMimeType());
		 	$des = 'public/upload/image';
			$request->file('fImage')->move($des,$name);
			// return view('form.', compact('data'));
			echo 'Đã upload hình: '.$name."<br>";*/
 	

	}
	// từ trang form lấy dữ liệu từ json
	public function login(){

		$data = $this->getContentFile(storage_path().'/image/dataimage.json');
		return view('form.layout', compact('data'));
	}
	// Function gọi để lấy dữ liệu từ json ra mảng
	public function getContentFile($path){
		$ContentFile = file_get_contents($path);
		$datas = json_decode($ContentFile,true);
		return $datas;
	}
	
		public function loginLaravel(){
			print_r(\Auth::check() == false);die;
		return view('login.index');
	}
	public function signup(){
		return view('signup.signup');
	}
	public function forgotpassword(){
		return view('forgotpassword.forgotpass');
	}
	public function getdatasignup(Request $request){
		$data = file_get_contents(storage_path()."/account/data.json");
		$content_data = json_decode($data);
		$content_data[] = [
			'username' => $request->username,
			'email' => $request->email,
			'pass' => $request->password
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/account/data.json', $data_json);
		echo "Sign Up succesfully!";
		echo "<br>";
		echo "username: ".$request->username."<br>";
		echo "email: ".$request->email."<br>";
		echo "pass: ".$request->password."<br>";
	}
	public function logindashboard(Request $request){
		$data_account = file_get_contents(storage_path()."/account/data.json",true);
		$array_account = json_decode($data_account,true);
		$check = 0;
		foreach ($array_account as $key => $value) {
			if ($request->username == $value['username'] && $request->pass == $value['pass']) {
				$check++;
			}
		}
		if ($check == 1) {
			return view('dashboard.dashboard');
		}
		else{
			echo "<script>alert('Đăng nhập thất bại !')</script>";
			return view('login.index');
		}
	}

	/*public function sendpassnew(Request $request){
		$data_account = file_get_contents(storage_path()."/account/data.json",true);
		$array_account = json_decode($data_account,true);
		$check = 0;
		foreach ($array_account as $key => $value) {
			if ($request->youremail == $value['email']) {
				$check++;
			}
		}
		if ($check == 1) {
			$to      = $request->youremail;
			$subject = 'new password laravel';
			$message = 'New pass is abshdhgbhrfebwygfuwevr';
			Mail::send($to, $subject, $message);
			echo "Send Mail ok!";
		}
		else{
			echo "<script>alert('Gửi mail thất bại !')</script>";
			return view('forgotpassword.forgotpass');
		}
		
	}
*/

	public function getContentsdashboard(){
		return view('dashboard.dashboard');
	}

	// send mail
	public function sendMail(){
		// $emailfrom = 'phukiendienthoaingonbore@gmail.com';
		$data = ['content' => 'aaaaaanhsnhdfdas'];
		Mail::to('congminh699669@gmail.com')->send(new ForgotPassword($data));
	}
	/*get data adress phone mail*/
	public function getdataapm(Request $request){
		$data = file_get_contents(storage_path()."/apm/dataapm.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'address' => $request->address,
			'phone' => $request->Phone,
			'email' => $request->email
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/apm/dataapm.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('apm');
	}
	/* end */
	/*edit item apm*/
	public function edititemapm(Request $request){
		$data = file_get_contents(storage_path()."/apm/dataapm.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value)
		{
	    	unset($content_data[$key]);
		}
		$content_data[] = [
			'address' => $request->address,
			'phone' => $request->Phone,
			'email' => $request->email
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/apm/dataapm.json', $data_json);
		echo "<script>alert('Edit ok!')</script>";
		return redirect()->route('apm');
	}
	/*end edit*/
	/*delete item apm*/
	public function deleteitemapm(){
		$add = file_get_contents(storage_path()."/apm/dataapm.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/apm/dataapm.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('apm');
	}
	/*end delete*/
	/*add data copy right*/
	public function getdatacopyfooter(Request $request){
		$data = file_get_contents(storage_path()."/footer/copyright.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'content1coppyright' => $request->content1coppyright,
			'content2coppyright' => $request->content2coppyright,
			'linkcoppyright' => $request->linkcoppyright
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/footer/copyright.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('footer');
	}
	/*end add copy right*/
	/*delete copyright*/
	public function deletecopyrightfooter(){
		$add = file_get_contents(storage_path()."/footer/copyright.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/footer/copyright.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('footer');
	}
	/*end delete copyright*/
	/*edit copyright*/
	public function editcopyrightfooter(Request $request){
		$data = file_get_contents(storage_path()."/footer/copyright.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value)
		{
	    	unset($content_data[$key]);
		}
		$content_data[] = [
			'content1coppyright' => $request->content1coppyright,
			'content2coppyright' => $request->content2coppyright,
			'linkcoppyright' => $request->linkcoppyright
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/footer/copyright.json', $data_json);
		echo "<script>alert('Edit ok!')</script>";
		return redirect()->route('footer');
	}
	/*end edit copyright*/
	/*Social*/
	public function getdatasocial(Request $request){
		$data = file_get_contents(storage_path()."/footer/socialfooter.json",true);
		$content_data = json_decode($data,true);
		if (json_decode($data,true)) {
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttsocial1) {
					echo "<script>alert('Stt bị trùng!')</script>";
					return redirect()->route('footer');
				}
			}
		}
		
		$content_data[] = [
			'stt' => $request->sttsocial1,
			'typesocial' => $request->typesocialfooter1,
			'linksocial' => $request->linksocial1
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/footer/socialfooter.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('footer');
	}
	public function editdatasocial(Request $request){
		$data = file_get_contents(storage_path()."/footer/socialfooter.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value) {
			if ($value['stt'] == $request->sttsocial) {
				$content_data[$key]['typesocial'] = $request->typesocialfooter;
				$content_data[$key]['linksocial'] = $request->linksocial;
			}
		}
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/footer/socialfooter.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('footer');
	}
	/*End social*/
	/*Contact form*/
	public function getdatacontact(Request $request){
		$data = file_get_contents(storage_path()."/contact/datacontact.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'titlecontatc1' => $request->titlecontact1,
			'titlecontatc2' => $request->titlecontact2,
			'titlecontatc3' => $request->titlecontact3,
			'nameimage' => $request->file('backgruondimagecontact')->getClientOriginalName()
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/contact/datacontact.json', $data_json);
		$name  = $request->file('backgruondimagecontact')->getClientOriginalName();
		$des = 'public/upload/image';
		$request->file('backgruondimagecontact')->move($des,$name);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('contact');
	}
	public function deletecontact(){
		$add = file_get_contents(storage_path()."/contact/datacontact.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/contact/datacontact.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('contact');
	}
	public function editcontact(Request $request){
		$data = file_get_contents(storage_path()."/contact/datacontact.json",true);
		$content_data = json_decode($data,true);
		// $name = null;
		if ($request->file('backgruondimagecontact')) {
			$name  = $request->file('backgruondimagecontact')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('backgruondimagecontact')->move($des,$name);
			foreach ($content_data as $key => $value) {
			unset($content_data[$key]);
			}
			$content_data[] = [
				'titlecontatc1' => $request->titlecontact1,
				'titlecontatc2' => $request->titlecontact2,
				'titlecontatc3' => $request->titlecontact3,
				'nameimage' => $name
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/contact/datacontact.json', $data_json);

			echo "<script>alert('Edit Ok!')</script>";
			return redirect()->route('contact');
		}
		else{
			foreach ($content_data as $key => $value) {
				$name = $value['nameimage'];
				unset($content_data[$key]);
			}
			$content_data[] = [
				'titlecontatc1' => $request->titlecontact1,
				'titlecontatc2' => $request->titlecontact2,
				'titlecontatc3' => $request->titlecontact3,
				'nameimage' => $name
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/contact/datacontact.json', $data_json);

			echo "<script>alert('Edit Ok!')</script>";
			return redirect()->route('contact');
		}
	}
	/* end contact form */
	/* start google map */

	public function getdatagooglemap(Request $request){
		$data = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'lat' => $request->latggm,
			'long' => $request->longggm
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/googlemap/datagooglemap.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('googlemap');
	}

	public function editdatagooglemap(Request $request){
		$data = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value)
		{
	    	unset($content_data[$key]);
		}
		$content_data[] = [
			'lat' => $request->latggm,
			'long' => $request->longggm
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/googlemap/datagooglemap.json', $data_json);
		echo "<script>alert('Edit ok!')</script>";
		return redirect()->route('googlemap');
	}

	public function deletegooglemap(){
		$add = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/googlemap/datagooglemap.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('googlemap');
	}
	/* end google map */
	/* start logoslide*/
	public function getdatalogoslide(Request $request){
		$data = file_get_contents(storage_path()."/logoslide/logoslide.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'titlelogoslide1' => $request->titlelogoslide1,
			'titlelogoslide2' => $request->titlelogoslide2,
			'nameimage' => $request->file('backgruondimagelogoslide')->getClientOriginalName()
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/logoslide/logoslide.json', $data_json);
		$name  = $request->file('backgruondimagelogoslide')->getClientOriginalName();
		$des = 'public/upload/image';
		$request->file('backgruondimagelogoslide')->move($des,$name);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('LogoSlide');
	}

	public function editdatalogoslide(Request $request){
		$data = file_get_contents(storage_path()."/logoslide/logoslide.json",true);
		$content_data = json_decode($data,true);
		if ($request->file('backgruondimagelogoslide')) {
			$name  = $request->file('backgruondimagelogoslide')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('backgruondimagelogoslide')->move($des,$name);
			foreach ($content_data as $key => $value) {
			unset($content_data[$key]);
			}
			$content_data[] = [
				'titlelogoslide1' => $request->titlelogoslide1,
				'titlelogoslide2' => $request->titlelogoslide2,
				'nameimage' => $name
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/logoslide/logoslide.json', $data_json);

			echo "<script>alert('Edit Ok!')</script>";
			return redirect()->route('LogoSlide');
		}
		else{
			foreach ($content_data as $key => $value) {
				$name = $value['nameimage'];
				unset($content_data[$key]);
			}
			$content_data[] = [
				'titlelogoslide1' => $request->titlelogoslide1,
				'titlelogoslide2' => $request->titlelogoslide2,
				'nameimage' => $name
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/logoslide/logoslide.json', $data_json);

			echo "<script>alert('Edit Ok!')</script>";
			return redirect()->route('LogoSlide');
		}
	}

	public function deletelogoslide(){
		$add = file_get_contents(storage_path()."/logoslide/logoslide.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/logoslide/logoslide.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('LogoSlide');
	}

	public function getdacontentslogoslide(Request $request){
		$data = file_get_contents(storage_path()."/logoslide/contentlogoslide.json",true);
	    $content_data = json_decode($data,true);
	    if (json_decode($data,true)) {
	      foreach ($content_data as $key => $value) {
	        if ($value['stt'] == $request->sttlogoslides1) {
	          echo "<script>alert('Stt bị trùng!')</script>";
	          return redirect()->route('LogoSlide');
	        }
	      }
	    }
	    if($request->file('logoimagelogoslides1')){
		    $content_data[] = [
		        'stt' => $request->sttlogoslides1,
				'titlesocial' => $request->titlelogoslides1,
				'description' => $request->descriptionlogoslides1,
				'linklogoslide' => $request->linklogoslides1,
				'nameimage' => $request->file('logoimagelogoslides1')->getClientOriginalName()
		    ];
		    $data_json = json_encode($content_data);
		    file_put_contents(storage_path().'/logoslide/contentlogoslide.json', $data_json);
		    $name  = $request->file('logoimagelogoslides1')->getClientOriginalName();
						$des = 'public/upload/image';
						$request->file('logoimagelogoslides1')->move($des,$name);
		    echo "<script>alert('Ok!')</script>";
		    return redirect()->route('LogoSlide');
		}
		else{
			echo "<script>alert('Chưa chọn ảnh!')</script>";
		    return redirect()->route('LogoSlide');
		}
	}

	public function editdatacontentslogoslides(Request $request){
		$data = file_get_contents(storage_path()."/logoslide/contentlogoslide.json",true);
		$content_data = json_decode($data,true);
		if($request->file('namelogos')){
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttlogoslides) {
					$content_data[$key]['titlesocial'] = $request->titlelogoslides;
					$content_data[$key]['description'] = $request->descriptionlogoslides;
					$content_data[$key]['linklogoslide'] = $request->linklogoslides;
					$content_data[$key]['nameimage'] = $request->file('namelogos')->getClientOriginalName();
				}
			}
			$name  = $request->file('namelogos')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('namelogos')->move($des,$name);
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/logoslide/contentlogoslide.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('LogoSlide');
		}
		else{
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttlogoslides) {
					$content_data[$key]['titlesocial'] = $request->titlelogoslides;
					$content_data[$key]['description'] = $request->descriptionlogoslides;
					$content_data[$key]['linklogoslide'] = $request->linklogoslides;
				}
			}
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/logoslide/contentlogoslide.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('LogoSlide');
		}
	}

	public function DeleteLogoslides(Request $request){
		$id = $request->id;
		$LogoSLidesdt = file_get_contents(storage_path()."/logoslide/contentlogoslide.json",true);
		$Datslgsl = json_decode($LogoSLidesdt,true);
		$arr_index = array();
		foreach ($Datslgsl as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Datslgsl[$i]);
		}
		$Datslgsl = array_values($Datslgsl);
		$data_json = json_encode($Datslgsl);
		file_put_contents(storage_path().'/logoslide/contentlogoslide.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('LogoSlide');
	}
	/* end logoslide*/
	/* Start Testimonial */
	public function getdatatestimonial(Request $request){
		$data = file_get_contents(storage_path()."/testimonial/backgroundimagetmn.json",true);
		$content_data = json_decode($data,true);
		if($request->file('backgruondimagetestimonial')){
			$content_data[] = [
				'nameimage' => $request->file('backgruondimagetestimonial')->getClientOriginalName()
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/testimonial/backgroundimagetmn.json', $data_json);
			$name  = $request->file('backgruondimagetestimonial')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('backgruondimagetestimonial')->move($des,$name);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('TesMonial');
		}
		else{
			return redirect()->route('TesMonial');
		}
	}

	public function deletebackgroundtmn(){
		$add = file_get_contents(storage_path()."/testimonial/backgroundimagetmn.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/testimonial/backgroundimagetmn.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('TesMonial');
	}

	public function getdacontentstmn(Request $request){
		$data = file_get_contents(storage_path()."/testimonial/datacontenttmn.json",true);
	    $content_data = json_decode($data,true);
	    if (json_decode($data,true)) {
	      foreach ($content_data as $key => $value) {
	        if ($value['stt'] == $request->stttmn1) {
	          echo "<script>alert('Stt bị trùng!')</script>";
	          return redirect()->route('TesMonial');
	        }
	      }
	    }
	    if($request->file('logoimagelogoslides1')){
		    $content_data[] = [
		        'stt' => $request->stttmn1,
				'name' => $request->nametmn1,
				'description' => $request->destmn1,
				'postion' => $request->postmn1,
				'nameimage' => $request->file('imagecontenttmn1')->getClientOriginalName()
		    ];
		    $data_json = json_encode($content_data);
		    file_put_contents(storage_path().'/testimonial/datacontenttmn.json', $data_json);
		    $name  = $request->file('imagecontenttmn1')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('imagecontenttmn1')->move($des,$name);
		    echo "<script>alert('Ok!')</script>";
		    return redirect()->route('TesMonial');
		}
		else{
			echo "<script>alert('Chưa chọn ảnh!')</script>";
		    return redirect()->route('TesMonial');
		}
	}

	public function DeleteTestiMonial(Request $request){
		$id = $request->id;
		$tmncontent = file_get_contents(storage_path()."/testimonial/datacontenttmn.json",true);
		$Datatmn = json_decode($tmncontent,true);
		$arr_index = array();
		foreach ($Datatmn as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Datatmn[$i]);
		}
		$Datatmn = array_values($Datatmn);
		$data_json = json_encode($Datatmn);
		file_put_contents(storage_path().'/testimonial/datacontenttmn.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('TesMonial');
	}

	public function editdatacontentstmn(Request $request){
		$data = file_get_contents(storage_path()."/testimonial/datacontenttmn.json",true);
		$content_data = json_decode($data,true);
		if($request->file('nameimage')){
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->stttmn) {
					$content_data[$key]['name'] = $request->nametmn;
					$content_data[$key]['description'] = $request->destmn;
					$content_data[$key]['postion'] = $request->postmn;
					$content_data[$key]['nameimage'] = $request->file('nameimage')->getClientOriginalName();
				}
			}
			$name  = $request->file('nameimage')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('nameimage')->move($des,$name);
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/testimonial/datacontenttmn.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('TesMonial');
		}
		else{
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->stttmn) {
					$content_data[$key]['name'] = $request->nametmn;
					$content_data[$key]['description'] = $request->destmn;
					$content_data[$key]['postion'] = $request->postmn;
				}
			}
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/testimonial/datacontenttmn.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('TesMonial');
		}
	}
	/* End Testimonial */

	/* Start statistical*/
	public function getdatatitleandbacgruondstt(Request $request){
		$data = file_get_contents(storage_path()."/statistical/titleandbackgroundstt.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'titlelstt1' => $request->titlstt1,
			'titlelstt2' => $request->titlstt2,
			'nameimage' => $request->file('backgruondimagestt')->getClientOriginalName()
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/statistical/titleandbackgroundstt.json', $data_json);
		$name  = $request->file('backgruondimagestt')->getClientOriginalName();
		$des = 'public/upload/image';
		$request->file('backgruondimagestt')->move($des,$name);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Statical');
	}

	public function deletetitleandbackgroundstt(){
		$add = file_get_contents(storage_path()."/statistical/titleandbackgroundstt.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/statistical/titleandbackgroundstt.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Statical');
	}

	public function editdatatitlebackgruondstt(Request $request){
		$data = file_get_contents(storage_path()."/statistical/titleandbackgroundstt.json",true);
		$content_data = json_decode($data,true);
		if ($request->file('backgruondimagestt')) {
			$name  = $request->file('backgruondimagestt')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('backgruondimagestt')->move($des,$name);
			foreach ($content_data as $key => $value) {
			unset($content_data[$key]);
			}
			$content_data[] = [
				'titlelstt1' => $request->titlstt1,
				'titlelstt2' => $request->titlstt2,
				'nameimage' => $name
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/statistical/titleandbackgroundstt.json', $data_json);

			echo "<script>alert('Edit Ok!')</script>";
			return redirect()->route('Statical');
		}
		else{
			foreach ($content_data as $key => $value) {
				$name = $value['nameimage'];
				unset($content_data[$key]);
			}
			$content_data[] = [
				'titlelstt1' => $request->titlstt1,
				'titlelstt2' => $request->titlstt2,
				'nameimage' => $name
			];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/statistical/titleandbackgroundstt.json', $data_json);

			echo "<script>alert('Edit Ok!')</script>";
			return redirect()->route('Statical');
		}
	}

	public function getdacontentrowstt(Request $request){
		$data = file_get_contents(storage_path()."/statistical/datacontentstt.json",true);
	    $content_data = json_decode($data,true);
	    if (json_decode($data,true)) {
	      foreach ($content_data as $key => $value) {
	        if ($value['stt'] == $request->sttrow1) {
	          echo "<script>alert('Stt bị trùng!')</script>";
	          return redirect()->route('Statical');
	        }
	      }
	    }
		    $content_data[] = [
		        'stt' => $request->sttrow1,
				'number' => $request->numberrow1,
				'text1' => $request->text1row1,
				'text2' => $request->text2row1
		    ];
		    $data_json = json_encode($content_data);
		    file_put_contents(storage_path().'/statistical/datacontentstt.json', $data_json);
		    echo "<script>alert('Ok!')</script>";
		    return redirect()->route('Statical');
	}

	public function DeleteRowstt(Request $request){
		$id = $request->id;
		$Rowdatastt = file_get_contents(storage_path()."/statistical/datacontentstt.json",true);
		$Datrowstt = json_decode($Rowdatastt,true);
		$arr_index = array();
		foreach ($Datrowstt as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Datrowstt[$i]);
		}
		$Datrowstt = array_values($Datrowstt);
		$data_json = json_encode($Datrowstt);
		file_put_contents(storage_path().'/statistical/datacontentstt.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Statical');
	}

	public function editdatacontentsrowstt(Request $request){
		$data = file_get_contents(storage_path()."/statistical/datacontentstt.json",true);
		$content_data = json_decode($data,true);
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttrow) {
					$content_data[$key]['number'] = $request->numberrow;
					$content_data[$key]['text1'] = $request->text1row;
					$content_data[$key]['text2'] = $request->text2row;
				}
			}
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/statistical/datacontentstt.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('Statical');
	}
	/* end statistical*/
	/* Start why*/
	public function getdatatitlewhy(Request $request){
		$data = file_get_contents(storage_path()."/why/titlewhy.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'content1title' => $request->content1titlewhy,
			'content2title' => $request->content2titlewhy
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/why/titlewhy.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Why');
	}

	public function deletetitlewhy(){
		$add = file_get_contents(storage_path()."/why/titlewhy.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/why/titlewhy.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Why');
	}

	public function editdatatitlewhy(Request $request){
		$data = file_get_contents(storage_path()."/why/titlewhy.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value)
		{
	    	unset($content_data[$key]);
		}
		$content_data[] = [
			'content1title' => $request->content1titlewhy,
			'content2title' => $request->content2titlewhy
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/why/titlewhy.json', $data_json);
		echo "<script>alert('Edit ok!')</script>";
		return redirect()->route('Why');
	}

	public function getdatarowwhy(Request $request){
		$data = file_get_contents(storage_path()."/why/datawhy.json",true);
		$content_data = json_decode($data,true);
		if (json_decode($data,true)) {
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttrowwhy1) {
					echo "<script>alert('Stt bị trùng!')</script>";
					return redirect()->route('Why');
				}
			}
		}
		
		$content_data[] = [
			'stt' => $request->sttrowwhy1,
			'typeiconwhy' => $request->typeiconwhy1,
			'textwhy' => $request->textwhy1,
			'deswhy' => $request->deswhy1
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/why/datawhy.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Why');
	}

	public function Deleterowswhy(Request $request){
		$id = $request->id;
		$Rowswhydt = file_get_contents(storage_path()."/why/datawhy.json",true);
		$Rowswhydt = json_decode($Rowswhydt,true);
		$arr_index = array();
		foreach ($Rowswhydt as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Rowswhydt[$i]);
		}
		$Rowswhydt = array_values($Rowswhydt);
		$data_json = json_encode($Rowswhydt);
		file_put_contents(storage_path().'/why/datawhy.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Why');
	}

	public function editdatarowwhy(Request $request){
		$data = file_get_contents(storage_path()."/why/datawhy.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value) {
			if ($value['stt'] == $request->sttrowwhy) {
				$content_data[$key]['typeiconwhy'] = $request->typeiconwhy;
				$content_data[$key]['textwhy'] = $request->textwhy;
				$content_data[$key]['deswhy'] = $request->deswhy;
			}
		}
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/why/datawhy.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Why');
	}
	/* End Why*/
	/* Start Product*/
	public function getdatatitleproduct(Request $request){
		$data = file_get_contents(storage_path()."/product/titleproduct.json",true);
		$content_data = json_decode($data,true);
		$content_data[] = [
			'content1title' => $request->content1titleproduct,
			'content2title' => $request->content2titleproduct
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/product/titleproduct.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Product');
	}

	public function deletetitleproduct(){
		$add = file_get_contents(storage_path()."/product/titleproduct.json",true);
		$add = json_decode($add,true);
		foreach ($add as $key => $value)
		{
	    	unset($add[$key]);
		}

		// encode array to json and save to file
		file_put_contents(storage_path().'/product/titleproduct.json', json_encode($add));
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Product');
	}

	public function editdatatitleproduct(Request $request){
		$data = file_get_contents(storage_path()."/product/titleproduct.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value)
		{
	    	unset($content_data[$key]);
		}
		$content_data[] = [
			'content1title' => $request->content1titleproduct,
			'content2title' => $request->content2titleproduct
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/product/titleproduct.json', $data_json);
		echo "<script>alert('Edit ok!')</script>";
		return redirect()->route('Product');
	}

	public function getdacontentsproduct(Request $request){
		$data = file_get_contents(storage_path()."/product/dataproduct.json",true);
	    $content_data = json_decode($data,true);
	    if (json_decode($data,true)) {
	      foreach ($content_data as $key => $value) {
	        if ($value['stt'] == $request->sttproduct1) {
	          echo "<script>alert('Stt bị trùng!')</script>";
	          return redirect()->route('Product');
	        }
	      }
	    }
	    if($request->file('nameimageproduct1')){
		    $content_data[] = [
		        'stt' => $request->sttproduct1,
				'nameproduct' => $request->nameproduct1,
				'linkproduct' => $request->linkproduct1,
				'nameimageproduct' => $request->file('nameimageproduct1')->getClientOriginalName()
		    ];
		    $data_json = json_encode($content_data);
		    file_put_contents(storage_path().'/product/dataproduct.json', $data_json);
		    $name  = $request->file('nameimageproduct1')->getClientOriginalName();
						$des = 'public/upload/image';
						$request->file('nameimageproduct1')->move($des,$name);
		    echo "<script>alert('Ok!')</script>";
		    return redirect()->route('Product');
		}
		else{
			echo "<script>alert('Chưa chọn ảnh!')</script>";
		    return redirect()->route('Product');
		}
	}

	public function DeleteProduct(Request $request){
		$id = $request->id;
		$productdt = file_get_contents(storage_path()."/product/dataproduct.json",true);
		$Dataproduct = json_decode($productdt,true);
		$arr_index = array();
		foreach ($Dataproduct as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Dataproduct[$i]);
		}
		$Dataproduct = array_values($Dataproduct);
		$data_json = json_encode($Dataproduct);
		file_put_contents(storage_path().'/product/dataproduct.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Product');
	}

	public function editdatacontentsrowproduct(Request $request){
		$data = file_get_contents(storage_path()."/product/dataproduct.json",true);
		$content_data = json_decode($data,true);
		if($request->file('nameimageproduct')){
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttproduct) {
					$content_data[$key]['nameproduct'] = $request->nameproduct;
					$content_data[$key]['linkproduct'] = $request->linkproduct;
					$content_data[$key]['nameimageproduct'] = $request->file('nameimageproduct')->getClientOriginalName();
				}
			}
			$name  = $request->file('nameimageproduct')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('nameimageproduct')->move($des,$name);
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/product/dataproduct.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('Product');
		}
		else{
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttproduct) {
					$content_data[$key]['nameproduct'] = $request->nameproduct;
					$content_data[$key]['linkproduct'] = $request->linkproduct;
				}
			}
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/product/dataproduct.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('Product');
		}
	}
	/* End Product */
	/* Start About */
	public function getdataabout(Request $request){
		$data = file_get_contents(storage_path()."/about/dataabout.json",true);
		$content_data = json_decode($data,true);
		if (json_decode($data,true)) {
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttabout1) {
					echo "<script>alert('Stt bị trùng!')</script>";
					return redirect()->route('About');
				}
			}
		}
		
		$content_data[] = [
			'stt' => $request->sttabout1,
			'typeabout' => $request->typeiconabout1,
			'linkabout' => $request->linkabout1,
			'text1' => $request->text1about1,
			'text2' => $request->text2about1,
			'desabout' => $request->descriptionabout1
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/about/dataabout.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('About');
	}

	public function DeleteContentAbout(Request $request){
		$id = $request->id;
		$aboutdt = file_get_contents(storage_path()."/about/dataabout.json",true);
		$aboutdt = json_decode($aboutdt,true);
		$arr_index = array();
		foreach ($aboutdt as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($aboutdt[$i]);
		}
		$aboutdt = array_values($aboutdt);
		$data_json = json_encode($aboutdt);
		file_put_contents(storage_path().'/about/dataabout.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('About');
	}

	public function editdataabout(Request $request){
		$data = file_get_contents(storage_path()."/about/dataabout.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value) {
			if ($value['stt'] == $request->sttabout) {
				$content_data[$key]['typeabout'] = $request->typeiconabout;
				$content_data[$key]['linkabout'] = $request->linkabout;
				$content_data[$key]['text1'] = $request->text1about;
				$content_data[$key]['text2'] = $request->text2about;
				$content_data[$key]['desabout'] = $request->descriptionabout;
			}
		}
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/about/dataabout.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('About');
	}
	/* End About */
	/* Start SLidebar */
	public function getdataslidebar(Request $request){
		$data = file_get_contents(storage_path()."/slidebar/datasldiebar.json",true);
		$content_data = json_decode($data,true);
		if (json_decode($data,true)) {
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttslidebar) {
					return redirect()->route('Slidebar');
				}
			}
		}
		if($request->file('imageslide')){
				$content_data[] = [
					'stt' => $request->sttslidebar,
					'nameimageslidebar' => $request->file('imageslide')->getClientOriginalName()
				];
				$data_json = json_encode($content_data);
				file_put_contents(storage_path().'/slidebar/datasldiebar.json', $data_json);
				$name  = $request->file('imageslide')->getClientOriginalName();
				$des = 'public/upload/image';
				$request->file('imageslide')->move($des,$name);
				echo "<script>alert('Ok!')</script>";
				return redirect()->route('Slidebar');
			}
			else{
				return redirect()->route('Slidebar');
			}
	}

	public function DeleteSLideBar(Request $request){
		$id = $request->id;
		$Slidebarcontent = file_get_contents(storage_path()."/slidebar/datasldiebar.json",true);
		$Dataalidebar = json_decode($Slidebarcontent,true);
		$arr_index = array();
		foreach ($Dataalidebar as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Dataalidebar[$i]);
		}
		$Dataalidebar = array_values($Dataalidebar);
		$data_json = json_encode($Dataalidebar);
		file_put_contents(storage_path().'/slidebar/datasldiebar.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Slidebar');
	}
	/* End SLidebar */
	/* Start heeder */
	public function getdatalogo(Request $request){
		$data = file_get_contents(storage_path()."/header/datalogo.json",true);
		$content_data = json_decode($data,true);
		if (json_decode($data,true)) {
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttlogo1) {
					echo "<script>alert('Stt bị trùng!')</script>";
					return redirect()->route('Header');
				}
			}
		}

		if($request->file('logo1')){
			$content_data[] = [
				'stt' => $request->sttlogo1,
				'typelogo' => $request->typelogo1,
				'namelogo' => $request->file('logo1')->getClientOriginalName()
				];
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/header/datalogo.json', $data_json);
			$name  = $request->file('logo1')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('logo1')->move($des,$name);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('Header');
		}
		else{
			return redirect()->route('Header');
		}
				
	}

	public function deletelogo(Request $request){
		$id = $request->id;
		$datalogo = file_get_contents(storage_path()."/header/datalogo.json",true);
		$datalogo = json_decode($datalogo,true);
		$arr_index = array();
		foreach ($datalogo as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($datalogo[$i]);
		}
		$datalogo = array_values($datalogo);
		$data_json = json_encode($datalogo);
		file_put_contents(storage_path().'/header/datalogo.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Header');
	}

	public function editdatacontentlogo(Request $request){
		$data = file_get_contents(storage_path()."/header/datalogo.json",true);
		$content_data = json_decode($data,true);
		if($request->file('logo')){
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttlogo) {
					$content_data[$key]['typelogo'] = $request->typelogo;
					$content_data[$key]['namelogo'] = $request->file('logo')->getClientOriginalName();
				}
			}
			$name  = $request->file('logo')->getClientOriginalName();
			$des = 'public/upload/image';
			$request->file('logo')->move($des,$name);
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/header/datalogo.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('Header');
		}
		else{
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttlogo) {
					$content_data[$key]['typelogo'] = $request->typelogo;
				}
			}
			$data_json = json_encode($content_data);
			file_put_contents(storage_path().'/header/datalogo.json', $data_json);
			echo "<script>alert('Ok!')</script>";
			return redirect()->route('Header');
		}
	}


	public function getdatamenu(Request $request){
		$data = file_get_contents(storage_path()."/header/datamenu.json",true);
		$content_data = json_decode($data,true);
		if (json_decode($data,true)) {
			foreach ($content_data as $key => $value) {
				if ($value['stt'] == $request->sttmenu1) {
					echo "<script>alert('Stt bị trùng!')</script>";
					return redirect()->route('Header');
				}
			}
		}
		
		$content_data[] = [
			'stt' => $request->sttmenu1,
			'namemenu' => $request->namemenu1,
			'linkmenu' => $request->linkmenu1
		];
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/header/datamenu.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Header');
	}

	public function Deletemenu(Request $request){
		$id = $request->id;
		$datamenu = file_get_contents(storage_path()."/header/datamenu.json",true);
		$datamenu = json_decode($datamenu,true);
		$arr_index = array();
		foreach ($datamenu as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($datamenu[$i]);
		}
		$datamenu = array_values($datamenu);
		$data_json = json_encode($datamenu);
		file_put_contents(storage_path().'/header/datamenu.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('Header');
	}

	public function editdatamenus(Request $request){
		$data = file_get_contents(storage_path()."/header/datamenu.json",true);
		$content_data = json_decode($data,true);
		foreach ($content_data as $key => $value) {
			if ($value['stt'] == $request->sttmenu) {
				$content_data[$key]['namemenu'] = $request->namemenu;
				$content_data[$key]['linkmenu'] = $request->linkmenu;
			}
		}
		$data_json = json_encode($content_data);
		file_put_contents(storage_path().'/header/datamenu.json', $data_json);
		echo "<script>alert('Ok!')</script>";
		return redirect()->route('Header');
	}
	/* End header*/
	//contents tu nhien
	public function getfooter(){
		return view('Contents.footer.footer');
	}
	public function getLogo(){
		return view('Contents.header.logo');
	}
	public function getAPM(){
		return view('Contents.adress-phone-mail.apm');
	}
	public function getmenuheader(){
		return view('Contents.header.menuheader');
	}
	public function getsocialheader(){
		return view('Contents.header.socialheader');
	}
	public function getcontact(){
		return view('Contents.contact.contact');
	}
	public function getgooglemap(){
		return view('Contents.google-map.googlemap');
	}
	public function getlogoslide(){
		return view('Contents.logoslide.logoslide');
	}
	public function gettesmonial(){
		return view('Contents.testimonial.testimonial');
	}
	public function getstatiscal(){
		return view('Contents.statistical.stactical');
	}
	public function getwhy(){
		return view('Contents.why.why');
	}
	public function getproduct(){
		return view('Contents.product.product');
	}
	public function getabout(){
		return view('Contents.about.about');
	}
	public function getslidebar(){
		return view('Contents.slide-bar.sildebar');
	}
	public function getheader(){
		return view('Contents.header.header');
	}
	//end

	public function editFooter($id, Request $request){

		$Socialdt = file_get_contents(storage_path()."/footer/socialfooter.json",true);
		$Socialdt = json_decode($Socialdt,true);
		$record =  array_search($id, array_column($Socialdt, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $Socialdt[$record]
		]);
	}

	public function editAbout($id, Request $request){

		$aboutdt = file_get_contents(storage_path()."/about/dataabout.json",true);
		$aboutdt = json_decode($aboutdt,true);
		$record =  array_search($id, array_column($aboutdt, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $aboutdt[$record]
		]);
	}

	public function editRowwhy($id, Request $request){

		$Rowwhydt = file_get_contents(storage_path()."/why/datawhy.json",true);
		$Rowwhydt = json_decode($Rowwhydt,true);
		$record =  array_search($id, array_column($Rowwhydt, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $Rowwhydt[$record]
		]);
	}

	public function editMenu($id, Request $request){

		$datamenu = file_get_contents(storage_path()."/header/datamenu.json",true);
		$datamenu = json_decode($datamenu,true);
		$record =  array_search($id, array_column($datamenu, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $datamenu[$record]
		]);
	}

	public function editLogo($id, Request $request){

		$datalogo = file_get_contents(storage_path()."/header/datalogo.json",true);
		$datalogo = json_decode($datalogo,true);
		$record =  array_search($id, array_column($datalogo, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $datalogo[$record]
		]);
	}

	public function editLogoSlide($id, Request $request){

		$Logoslidesdt = file_get_contents(storage_path()."/logoslide/contentlogoslide.json",true);
		$Logoslidesdt = json_decode($Logoslidesdt,true);
		$record =  array_search($id, array_column($Logoslidesdt, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $Logoslidesdt[$record]
		]);
	}

	public function editProduct($id, Request $request){

		$productdt = file_get_contents(storage_path()."/product/dataproduct.json",true);
		$productdt = json_decode($productdt,true);
		$record =  array_search($id, array_column($productdt, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $productdt[$record]
		]);
	}

	public function editrowStatiscal($id, Request $request){

		$contentrowstt = file_get_contents(storage_path()."/statistical/datacontentstt.json",true);
		$contentrowstt = json_decode($contentrowstt,true);
		$record =  array_search($id, array_column($contentrowstt, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $contentrowstt[$record]
		]);
	}

	public function editTestimonial($id, Request $request){

		$contenttmn = file_get_contents(storage_path()."/testimonial/datacontenttmn.json",true);
		$contenttmn = json_decode($contenttmn,true);
		$record =  array_search($id, array_column($contenttmn, 'stt'));
		return response()->json([
			'error' => false,
			'data' => $contenttmn[$record]
		]);
	}

	public function DeleteSocialFooter(Request $request){
		$id = $request->id;
		$Socialdt = file_get_contents(storage_path()."/footer/socialfooter.json",true);
		$Socialdt = json_decode($Socialdt,true);
		$arr_index = array();
		foreach ($Socialdt as $key => $value)
		{
		    if ($value['stt'] == $id)
		    {
		        $arr_index[] = $key;
		    }
		}

		// delete data
		foreach ($arr_index as $i)
		{
		    unset($Socialdt[$i]);
		}
		$Socialdt = array_values($Socialdt);
		$data_json = json_encode($Socialdt);
		file_put_contents(storage_path().'/footer/socialfooter.json', $data_json);
		echo "<script>alert('Deleted!')</script>";
		return redirect()->route('footer');
	}
	
}
