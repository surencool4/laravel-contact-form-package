<?php 

    namespace Owc\Contact\Http\Controllers;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Owc\Contact\Mail\InquiryEmail;
    use Owc\Contact\Models\Contact;

    class ContactController extends BaseController
    {

        public function create()
        {
            return view('contact::create');
        }

        public function store(Request $request){
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]);
            
            Contact::create($validated);

            $admin_email = \config('contact.admin_email');

            if($admin_email === null || $admin_email === '' )
            {
                echo "The value of admin email not set ";
            }else{
                Mail::to($admin_email)->send(new InquiryEmail($validated));
            }

            return back()->with('success', 'Inquiry sent, please wait.');

        }
        
    }