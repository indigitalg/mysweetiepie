<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Helpers;
use Mail;
use Session;
use App\Models\Contact;
class ContactController extends Controller
{

    public function create() {
        // echo $justcheck;

        $title  = 'Contact Us';
     
        return view('frontend.contact', [
            'title'        => $title
          ]
        );
    }

    public function store(Request $request){
        
        

    	$this->validate($request,[
    		'name'    => 'bail|required|string|max:100',
    		'email'	  => 'bail|required|string|email|max:50',
            //'phone'   => 'bail|nullable|numeric|digits:10'  
    	//	'message' => 'required',
            // 'captchatext' => [function ($attribute, $value, $fail) {
            //                     if ($value != Session::get('captcha_text')) {
            //                         $fail('Dot not match captch');
            //                     }
            //                 }]
    	   ]);
    	   
    	$secret = '6LdF0VAaAAAAADqcwMTTEuK0cpxUkKW7zbUBhl4e';
        $captchaId = $request->input('g-recaptcha-response');
    
        $responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));

        if($responseCaptcha->success) {

            $data   =   array(
                    'name'      =>  $request->name,
                    'email'     =>  $request->email,
                    'subject'   =>  $request->subject,
                    'phone'     =>  $request->phone,
                    'message'   =>  $request->message,
                    'ipaddress' =>  $request->ip()
                    );
               	
       	    //data inserting into table   
        	Contact::create($data);
        	//Sending mail
        	Mail::to('cesario@mysweetiepie.ca')->bcc(['marketing@mysweetiepie.ca','developer@indigitalgroup.ca','customerservice@mysweetiepie.ca','contact@mysweetiepie.ca'])->send(new ContactMail($data));
        	return redirect()->back()->with('flash_message','Thank you for contact.');
        }
        else {
            die('Invalid submission!');
        }
    }  
    
    public function support() {
        $title  = 'Technical Support';
        return view('frontend.support', ['title' => $title] );
    }
    
    public function postSupport(Request $request){
        
    	$this->validate($request,[
    		'name'    => 'bail|required|string|max:100',
    		'email'	  => 'bail|required|string|email|max:50',
    	]);
    	   
    	$secret = '6LdF0VAaAAAAADqcwMTTEuK0cpxUkKW7zbUBhl4e';
        $captchaId = $request->input('g-recaptcha-response');
    
        $responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));

        if($responseCaptcha->success) {

            $data   =   array(
                    'name'      =>  $request->name,
                    'email'     =>  $request->email,
                    'subject'   =>  'Need Technical Support: '.$request->error,
                    'phone'     =>  $request->phone,
                    'message'   =>  $request->message,
                    'ipaddress' =>  $request->ip()
                    );
               	
        	Contact::create($data);

        	Mail::to('cesario@mysweetiepie.ca')->bcc(['marketing@mysweetiepie.ca','developer@indigitalgroup.ca','customerservice@mysweetiepie.ca','contact@mysweetiepie.ca'])->send(new ContactMail($data));
        	return redirect()->back()->with('flash_message','Thank you');
        }
        else {
            die('Invalid submission!');
        }
    }  
}
