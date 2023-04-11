<?php
function CurlSendPostRequest($url,$post){
    
    $apiKey = env('TNG_API_KEY'); 
    
    try{
        
       $ch = curl_init($url);
       $options =  array(
                       CURLOPT_RETURNTRANSFER => true,         // return web page
                       CURLOPT_HEADER         => false,        // don't return headers
                       CURLOPT_FOLLOWLOCATION => false,         // follow redirects
                      // CURLOPT_ENCODING       => "utf-8",           // handle all encodings
                       CURLOPT_AUTOREFERER    => true,         // set referer on redirect
                       CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect
                       CURLOPT_TIMEOUT        => 120,          // timeout on response
                       CURLOPT_POST            => 1,            // i am sending post data
                       CURLOPT_POSTFIELDS     => json_encode($post),    // this are my post vars
                       CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl
                       CURLOPT_SSL_VERIFYPEER => false,        //
                       CURLOPT_VERBOSE        => 1,
                       CURLOPT_HTTPHEADER     => array(
                           'Authorization: ' . $apiKey,
                           "Content-Type: application/json"
                       )
                   );

       curl_setopt_array($ch,$options);
       $data = curl_exec($ch);
       $curl_errno = curl_errno($ch);
       $curl_error = curl_error($ch);
       //echo $curl_errno;
       //echo $curl_error;
       curl_close($ch);
       return $data;
       
   }
   catch(Exception $e){
       print_r($e);
       die();
   }
}



function action_activity_getdata($data){
  
   $data = json_decode($data);
         
   foreach($data->data as $item){
      
       $url    = $item->url;
       $post   = ['data_id' => $item->data_id];
       
       $action_id = ['id' => $item->id];
       $action_url= "https://spadmin.indigitalapi.com/api/website/action-activity-update";
     
       if($item->action == 'CREATE' || $item->action == 'UPDATE'){
         
           $result = CurlSendPostRequest($url,$post);
           $result = json_decode($result); 
         
       }
     
       if($item->function == 'Banner'){
           if($item->action == 'CREATE'){
               try{
                   $bnr = new Banner();
                   $image_name          = store_image_url("images/banners/",$result->data->picture);
                   $bnr->master_id      = $result->data->id;
                   $bnr->name           = $result->data->name;
                   $bnr->type           = $result->data->type;
                   $bnr->picture        = $image_name;
                   $bnr->link           = $result->data->link;
                   $bnr->window         = $result->data->window;
                   $bnr->status         = $result->data->status;
                   $bnr->description    = $result->data->description;
                   $bnr->weight         = $result->data->weight; 
                   $bnr->display_order  = $result->data->display_order; 
                   $bnr->save();
                   
               }
               catch(Exception $e){
                 print_r($e);
               }
           }
           elseif($item->action == 'UPDATE'){
             
               $bnr = Banner::where('master_id',$result->data->id)->first();
             
               if($bnr){
                   $bnr->name           = $result->data->name;
                   $bnr->type           = $result->data->type;
                   $bnr->link           = $result->data->link;
                   $bnr->window         = $result->data->window;
                   $bnr->status         = $result->data->status;
                   $bnr->description    = $result->data->description;
                   $bnr->weight         = $result->data->weight; 
                   $bnr->display_order  = $result->data->display_order; 
                   if($image_name = store_image_url("images/banners/",$result->data->picture)){
                       DeleteImage($bnr->picture,'images/banners/');
                       $bnr->picture        = $image_name;
                   }
                   $bnr->save();
               }
           }
           elseif($item->action == 'DELETE'){
               $bnr = Banner::where('master_id',$item->data_id)->first();
               if($bnr){
                   DeleteImage($bnr->picture,'images/banners/');
                   $bnr->delete();
               }
           }
       }
       elseif($item->function == 'Menu'){
        
           if($item->action == 'CREATE'){
                   $parent = Menu::where('master_id',$result->data->parent_id)->first();
       
                   $menu = new Menu();
                   $menu->master_id    = $result->data->id;
                   $menu->name         = $result->data->name;   
                   $menu->slug         = Str::slug($result->data->name);
                   $menu->parent_id    = $parent ? $parent->id : 0;
                   $menu->link         = $result->data->link;
                   $menu->status       = $result->data->status;
                   $menu->weight       = $result->data->weight;
                   $menu->landing_page_id = $result->data->landing_page_id;
                   $menu->level        = $parent ? $parent->level+1:0;
                    
               try{
                   $menu->save(); 
               }
               catch(Exception $e){
                 print_r($e);
               }
              
           }
           if($item->action == 'UPDATE'){
              $parent = Menu::whereId($result->data->parent_id)->first();

               $menu = Menu::where('master_id',$result->data->id)->first() ?? abort(404);
           
               $menu->name     = $result->data->name;
               $menu->slug     = Str::slug($result->data->name);
               $menu->link     = $result->data->link;
               $menu->parent_id = $result->data->parent_id;
               $menu->weight   = $result->data->weight;
               $menu->level    = $parent ? $parent->level+1:0;
               $menu->status   = $result->data->status;
               try{
                   $menu->save();
               }
               catch(Exception $e){
                 print_r($e);
               }
           }
           if($item->action == 'DELETE'){
               $menu = Menu::where('master_id',$item->data_id)->first();
               
               Menu::where('parent_id',$menu->id)->update(['parent_id'=>NULL]);
               $menu->delete();
           }
       }
       elseif($item->function == 'Page'){
          
           if($item->action == 'CREATE'){
           
               $bnr = Banner::where('master_id',$result->data->banner_id)->first();
        
               $content = new Content();
               $content->heading   = $result->data->heading;
               $content->type      = $result->data->type;
               $content->banner_id = $bnr ? $bnr->id : 0;
               $content->slug      = Str::slug($result->data->heading);
               $content->html      = $result->data->html;
               $content->published = $result->data->published;
               $content->master_id      = $result->data->id;  
            
               try{
                   $content->save(); 
               }
               catch(Exception $e){
                 print_r($e);
               }
           }
           if($item->action == 'UPDATE'){
                $content = Content::where('master_id',$result->data->id)->first();
             
               $bnr = Banner::where('master_id',$result->data->banner_id)->first();
               if($content){
                   
                   $content->heading   = $result->data->heading;
                   $content->type      = $result->data->type;
                   $content->banner_id = $bnr ? $bnr->id : 0;
                   $content->slug      = Str::slug($result->data->heading);
                   $content->html      = $result->data->html;
                   $content->published = $result->data->published;
                   try{
                   $content->save(); 
                   }
                   catch(Exception $e){
                     print_r($e);
                   }
               }
           }
           if($item->action == 'DELETE'){
               Content::where('master_id',$item->data_id)->delete();
           }
       }
       elseif($item->function == 'Landing Page'){
           if($item->action == 'CREATE'){
              
               $site                       = new SiteLandingPages;
               $site->master_id             = $result->data->id;
               $site->page_url             = $result->data->page_url;
               $site->page_name            = $result->data->page_name;
               $site->category_id          = $result->data->category_id;
               $site->seo_title            = $result->data->seo_title; 
               $site->seo_description      = $result->data->seo_description; 
               $site->seo_keywords         = $result->data->seo_keywords; 
               $site->banner1_title        = $result->data->banner1_title; 
               $site->banner1_description  = $result->data->banner1_description; 
               $site->section1_title       = $result->data->section1_title; 
               $site->section1_description = $result->data->section1_description; 
               $site->section1_button_text = $result->data->section1_button_text; 
               $site->section1_button_link = $result->data->section1_button_link; 
               $site->banner2_text         = $result->data->banner2_text; 
               $site->banner2_description  = $result->data->banner2_description; 
               $site->banner2_button_text  = $result->data->banner2_button_text;
               $site->banner2_button_link  = $result->data->banner2_button_link;
               $site->section2_title       = $result->data->section2_title; 
               $site->section2_description = $result->data->section2_description; 
               $site->section2_button_text = $result->data->section2_button_text; 
               $site->section2_button_link = $result->data->section2_button_link;
               $site->published            = $result->data->published;
             
               $site->banner1_image        = store_image_url('/images/LandingPage/',$result->data->banner1_image) ?? '';
               $site->section1_picture     = store_image_url('/images/LandingPage/',$result->data->section1_picture) ?? '';
               $site->banner2_image        = store_image_url('/images/LandingPage/',$result->data->banner2_image) ?? '';
               $site->section2_picture     = store_image_url('/images/LandingPage/',$result->data->section2_picture) ?? '';
               $site->gallery1             = store_image_url('/images/LandingPage/',$result->data->gallery1) ?? '';
               $site->gallery2             = store_image_url('/images/LandingPage/',$result->data->gallery2) ?? '';
               $site->gallery3             = store_image_url('/images/LandingPage/',$result->data->gallery3) ?? '';
            
               try{
                   $site->save();
               }
               catch(Exception $e){   dd($e);
                 print_r($e);
               }
               
           }
           if($item->action == 'UPDATE'){
               $site = SiteLandingPages::where('master_id',$result->data->id)->first();
               $site->page_url             = $result->data->page_url;
               $site->page_name            = $result->data->page_name;
               $site->category_id          = $result->data->category_id;
               $site->seo_title            = $result->data->seo_title; 
               $site->seo_description      = $result->data->seo_description; 
               $site->seo_keywords         = $result->data->seo_keywords; 
               $site->banner1_title        = $result->data->banner1_title; 
               $site->banner1_description  = $result->data->banner1_description; 
               $site->section1_title       = $result->data->section1_title; 
               $site->section1_description = $result->data->section1_description; 
               $site->section1_button_text = $result->data->section1_button_text; 
               $site->section1_button_link = $result->data->section1_button_link; 
               $site->banner2_text         = $result->data->banner2_text; 
               $site->banner2_description  = $result->data->banner2_description; 
               $site->banner2_button_text  = $result->data->banner2_button_text;
               $site->banner2_button_link  = $result->data->banner2_button_link;
               $site->section2_title       = $result->data->section2_title; 
               $site->section2_description = $result->data->section2_description; 
               $site->section2_button_text = $result->data->section2_button_text; 
               $site->section2_button_link = $result->data->section2_button_link;
               $site->published            = $result->data->published;
             
               if($p1=store_image_url('/images/LandingPage/',$result->data->banner1_image)){
                   DeleteImage($site->banner1_image,'images/LandingPage/');
                   $site->banner1_image    = $p1;    
               }
               
               if($p2=store_image_url('/images/LandingPage/',$result->data->section1_picture)){
                   DeleteImage($site->section1_picture,'images/LandingPage/');
                   $site->section1_picture = $p2;    
               }
               
               if($p3=store_image_url('/images/LandingPage/',$result->data->banner2_image)){
                   DeleteImage($site->banner2_image,'images/LandingPage/');
                   $site->banner2_image    = $p3;    
               }
               
               if($p4=store_image_url('/images/LandingPage/',$result->data->section2_picture)){
                   DeleteImage($site->section2_picture,'images/LandingPage/');
                   $site->section2_picture = $p4;    
               }
               
               if($p5=store_image_url('/images/LandingPage/',$result->data->gallery1)){
                   DeleteImage($site->gallery1,'images/LandingPage/');
                   $site->gallery1         = $p5;    
               }
               
               if($p6=store_image_url('/images/LandingPage/',$result->data->gallery2)){
                   DeleteImage($site->gallery2,'images/LandingPage/');
                   $site->gallery2         = $p6;    
               }
               
               if($p7=store_image_url('/images/LandingPage/',$result->data->gallery3)){
                   DeleteImage($site->gallery3,'images/LandingPage/');
                   $site->gallery3         = $p7;    
               }
               
               try{
                   $site->save();
               }
               catch(Exception $e){   dd($e);
                 print_r($e);
               }
               
               
           }
           if($item->action == 'DELETE'){
               $site = SiteLandingPages::where('master_id',$item->data_id)->first();
               if($site){
                   DeleteImage($site->banner1_image,'images/LandingPage/');
                   DeleteImage($site->section1_picture,'images/LandingPage/');
                   DeleteImage($site->banner2_image,'images/LandingPage/');
                   DeleteImage($site->section2_picture,'images/LandingPage/');
                   DeleteImage($site->gallery1,'images/LandingPage/');
                   DeleteImage($site->gallery2,'images/LandingPage/');
                   DeleteImage($site->gallery3,'images/LandingPage/');
                   $site->delete();
               }
           }
       }
       elseif($item->function == 'Customer'){
           if($item->action == 'CREATE'){
      
               $user = new Siteuser(); 
               $user->name           = $result->data->name;
               $user->password       = $result->data->password;
               $user->firstname      = $result->data->firstname;
               $user->lastname       = $result->data->lastname;
               $user->phone          = $result->data->phone;
               $user->email          = $result->data->email;
               $user->type           = 'customer';
               $user->master_id      = $result->data->id;
               $user->status         = $result->data->status;
               $user->reset_token    = Str::random(60);
               try{
               $user->save();
               }
               catch(Exception $e){
                 print_r($e);
               }

           }
           if($item->action == 'UPDATE'){
              
               $user =Siteuser::where('master_id',$result->data->id)->first();
               if(!$user){
                   $user             = new Siteuser(); 
               }
               $user->name           = $result->data->name;
               $user->password       = $result->data->password;
               $user->firstname      = $result->data->firstname;
               $user->lastname       = $result->data->lastname;
               $user->phone          = $result->data->phone;
               $user->email          = $result->data->email;
               $user->type           = 'customer';
               $user->status         = $result->data->status;
               $user->reset_token    = Str::random(60);
               $user->master_id      = $result->data->id;
               try{
               $user->save();
               }
               catch(Exception $e){
                 print_r($e);
               }
           }
           if($item->action == 'DELETE'){
               try{
                   $user =Siteuser::where('master_id',$item->data_id)->delete();
               }
               catch(Exception $e){
                 print_r($e);
               }
           }
       }
       elseif($item->function == 'Subscriber'){
           if($item->action == 'CREATE'){
              
           }
           if($item->action == 'UPDATE'){
              
           }
           if($item->action == 'DELETE'){
              
           }
       }
       elseif($item->function == 'Blog Category'){
           if($item->action == 'CREATE'){
               
               $parent_category = BlogCategory::where('master_id',$result->data->parent_id)->pluck('id')->first() ?? NULL;
               
               $category               = new BlogCategory();
               $category->name         = $result->data->name;
               $category->slug         = Str::slug($result->data->name);
               $category->parent_id    = $result->data->parent_id == 'null' ? NULL:$parent_category;
               $category->description  = $result->data->description;
               $category->picture      = store_image_url("images/blogs/",$result->data->picture);
               $category->status       = $result->data->status;
               $category->master_id    = $result->data->id;
               try{
               $category->save();
               }
               catch(Exception $e){
                   print_r($e);
               }
               
           }
           if($item->action == 'UPDATE'){
                
                   $parent_category = BlogCategory::where('master_id',$result->data->parent_id)->pluck('id')->first() ?? NULL;
               
                   $category               = BlogCategory::where('master_id',$result->data->id)->first();
                   $category->name         = $result->data->name;
                   $category->slug         = Str::slug($result->data->name);
                   $category->parent_id    = $result->data->parent_id == 'null' ? NULL:$parent_category;
                   $category->description  = $result->data->description;
                   $category->status       = $result->data->status;
                
                 
              try{
                   if($image_name          = store_image_url("images/blogs/",$result->data->picture)){
                       DeleteImage($category->picture,'images/blogs/');
                       $category->picture        = $image_name;
                   }
                   
                   $category->save();
               
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
                $category = BlogCategory::where('master_id',$item->data_id)->first();
               if($category){
                    BlogCategory::where('parent_id', $category->id)->update(['parent_id' => NULL]);
                   DeleteImage($category->picture,'images/blogs/');
                   $category->delete();
                   Blog_Category::where('category_id',$item->data_id)->delete();
               }
           }
       }
       elseif($item->function == 'Blog'){
          
           if($item->action == 'CREATE'){
         
         
               $blogs               = new Blog(); 
               $blogs->master_id    = $result->data->id;
               $blogs->name         = $result->data->name;
               $blogs->slug         = Str::slug($result->data->name);
               $blogs->published_at = $result->data->published_at;
               $blogs->description  = $result->data->description;
               $blogs->status       = $result->data->status;
               try{
                   
                   $blogs->picture      = store_image_url("images/blogs/",$result->data->picture);
                   $blogs->save();
                   
                       foreach($result->data->category as $cat){
                           
                           $category_id = BlogCategory::where('master_id',$cat->category_id)->pluck('id')->first() ?? 0;
                            $blogs_category = new Blog_Category();
                           $blogs_category->category_id  = 1;
                           $blogs_category->blog_id = $blogs->id;
                           $blogs_category->save();
                       }
                   
               }
               catch(Exception $e){
                   dd($e);
               }
               
           }
           if($item->action == 'UPDATE'){
               
               $blogs               = Blog::where('master_id',$result->data->id)->first();
               $blogs->name         = $result->data->name;
               $blogs->slug         = Str::slug($result->data->name);
               $blogs->published_at = $result->data->published_at;
               $blogs->description  = $result->data->description;
               $blogs->status       = $result->data->status;
               try{
                   
                   if($image_name          = store_image_url("images/blogs/",$result->data->picture)){
                       DeleteImage($blogs->picture,'images/blogs/');
                       $blogs->picture        = $image_name;
                   }
                   
                   $blogs->save();
                   
                   Blog_Category::where('blog_id',$blogs->id)->delete();
                    if(count($result->data->category) > 0){
                       foreach($result->data->category as $cat){
                           
                           $category_id = BlogCategory::where('master_id',$cat->category_id)->pluck('id')->first() ?? NULL;
                            $blogs_category = new Blog_Category();
                           $blogs_category->category_id  = $category_id;
                           $blogs_category->blog_id = $blogs->id;
                           $blogs_category->save();
                       }
                   }
                   
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
              $blogs = Blog::where('master_id',$item->data_id)->first();
               if($blogs){
                   DeleteImage($blogs->picture,'images/blogs/');
                   $blogs->delete();
                   Blog_Category::where('blog_id',$item->data_id)->delete();
               }
           }
       }
       elseif($item->function == 'Gallery'){
           if($item->action == 'CREATE'){
               $gallery               = new Gallery();
               $gallery->title        = $result->data->title;
               $gallery->position     = $result->data->position ?? 0;
               $gallery->picture      = store_image_url("images/gallery/",$result->data->picture);
               $gallery->status       = $result->data->status; 
               $gallery->master_id    = $result->data->id;
               try{
                   $gallery->save();
               }
               catch(Exception $e){
                   print_r($e);
               }
               
           }
           if($item->action == 'UPDATE'){
              
           }
           if($item->action == 'DELETE'){
               $gallery = Gallery::where('master_id',$item->data_id)->first();
               if($gallery){
                   DeleteImage($gallery->picture,'/images/gallery/');
                   $gallery->delete();
               }
           }
       }
       elseif($item->function == 'Holiday'){
           if($item->action == 'CREATE'){
              
           }
           if($item->action == 'UPDATE'){
              
           }
           if($item->action == 'DELETE'){
              
           }
       }
       elseif($item->function == 'Shipping'){
           if($item->action == 'CREATE'){
              
           }
           if($item->action == 'UPDATE'){
              
           }
           if($item->action == 'DELETE'){
              
           }
       }
       elseif($item->function == 'FAQ'){

           if($item->action == 'CREATE'){
               $faq                = new Faq;
               $faq->master_id     = $result->data->id;
               $faq->type          = $result->data->type;
               $faq->question      = $result->data->question;
               $faq->answer        = $result->data->answer;
               $faq->status        = $result->data->status;
               $faq->display_order = $result->data->display_order;
               try{
                   $faq->save();
               }
               catch(Exception $e){
                   print_r($e);
               }
               
           }
           if($item->action == 'UPDATE'){        
        
               $faq                = Faq::where('master_id',$result->data->id)->first();
               if(!$faq){
                   $faq                = new Faq;
                   $faq->master_id     = $result->data->id;
               }
               $faq->type          = $result->data->type;
               $faq->question      = $result->data->question;
               $faq->answer        = $result->data->answer;
               $faq->status        = $result->data->status;
               $faq->display_order = $result->data->display_order; 

               try{
                   $faq->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
              Faq::where('master_id',$item->data_id)->delete();
           }
       }
       elseif($item->function == 'Country'){
           if($item->action == 'CREATE'){
               $Co= new Country;
               $Co->master_id      = $result->data->id;
               $Co->name           = $result->data->name;
               $Co->code           = $result->data->code;
               $Co->base           = $result->data->base;
               $Co->status         = $result->data->status;
               $Co->page_id        = $result->data->page_id;
               try{
                   $Co->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'UPDATE'){
               $Co                = Country::where('master_id',$result->data->id)->first();
               if(!$Co){
                   $Co             = new Country;
                   $Co->master_id  = $result->data->id;
               }
               $Co->name           = $result->data->name;
               $Co->code           = $result->data->code;
               $Co->base           = $result->data->base;
               $Co->status         = $result->data->status;
               $Co->page_id        = $result->data->page_id;

               try{
                   $Co->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
              Country::where('master_id',$item->data_id)->delete();
           }
       }
       elseif($item->function == 'Province'){
           if($item->action == 'CREATE'){
               $province               = new Province;
               $province->name         = $result->data->name;
               $province->master_id    = $result->data->id;
               $province->code         = $result->data->code;
               $province->country      = $result->data->country;
               $province->base         = $result->data->base;
               $province->status       = $result->data->status;
               $province->all_products = $result->data->all_products;
               
               try{
                   $province->save();
               }
               catch(Exception $e){
                   dd($e);
               }
               
           }
           if($item->action == 'UPDATE'){
               $province                = Province::where('master_id',$result->data->id)->first();
               if(!$province){
                   $province             = new Province;
                   $province->master_id  = $result->data->id;
               }
               $province->name         = $result->data->name;
               $province->code         = $result->data->code;
               $province->country      = $result->data->country;
               $province->base         = $result->data->base;
               $province->status       = $result->data->status;
               $province->all_products = $result->data->all_products;

               try{
                   $province->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
              Province::where('master_id',$item->data_id)->delete();
           }
       }
       elseif($item->function == 'City'){
        
           if($item->action == 'CREATE'){
               $city               = new City();
               $city->name         = $result->data->name;  
               $city->master_id    = $result->data->id; 
               $city->code         = $result->data->code;
               $city->province     = $result->data->province;
               $city->status       = $result->data->status;
               try{
                   $city->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'UPDATE'){
              $city                = City::where('master_id',$result->data->id)->first();
               if(!$city){
                   $city           = new Province;
                   $city->master_id= $result->data->id;
               }
               $city->name         = $result->data->name;
               $city->master_id    = $result->data->id;
               $city->code         = $result->data->code;
               $city->province     = $result->data->province;
               $city->status       = $result->data->status;

               try{
                   $city->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
              City::where('master_id',$item->data_id)->delete();
           }
       }
       elseif($item->function == 'Category'){
           if($item->action == 'CREATE'){
               $parent_category        = Category::where('master_id',$result->data->parent_id)->pluck('id')->first() ?? NULL;
               $category               = new Category();
               $category->master_id    = $result->data->id;
               $category->name         = $result->data->name;
               $category->slug         = Str::slug($result->data->name);
               $category->parent_id    = $parent_category;
               $category->description  = $result->data->description;
               $category->status       = $result->data->status;
               $category->picture      = store_image_url("images/categories/",$result->data->picture);
               try{
                   $category->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'UPDATE'){
               
               $parent_category        = Category::where('master_id',$result->data->parent_id)->pluck('id')->first() ?? NULL;
              
               $category               = Category::where('master_id',$result->data->id)->pluck('id')->first();
               if(!$category){
                   $category           = new Category();
                   $category->master_id= $result->data->id;
               }
               $category->name         = $result->data->name;
               $category->slug         = Str::slug($result->data->name);
               $category->parent_id    = $result->data->parent_id;
               $category->description  = $result->data->description;
               $category->status       = $result->data->status;
               try{
                   if($image_name          = store_image_url("images/categories/",$result->data->picture)){
                       DeleteImage($category->picture,'images/categories/');
                       $category->picture        = $image_name;
                   }
                   
                   $category->save();
               }
               catch(Exception $e){
                   dd($e);
               }
           }
           if($item->action == 'DELETE'){
               $category = Category::where('master_id',$item->data_id)->first();
               if($category){
                   Category::where('parent_id', $category->id)->update(['parent_id' => NULL]);
                   DeleteImage($category->picture,'images/categories/');
                   $category->delete();
               }
           }
       }
       elseif($item->function == 'Product'){
           if($item->action == 'CREATE'){
               $product                    = new Product();
               $product->name              = $result->data->name;
               $product->slug              = Str::slug($result->data->name);
               $product->description       = $result->data->description ?? "";
               $product->contents          = $result->data->contents ?? "";
               $product->master_id         = $result->data->id;
               $product->menu_category_id  = $result->data->menu_category_id;
               $product->availability      = $result->data->availability;
               $product->display_order     = $result->data->display_order;
               $product->status            = $result->data->status;
               $product->seo_title         = $result->data->seo_title;
               $product->seo_alt_text      = $result->data->seo_alt_text;
               $product->seo_description   = $result->data->seo_description;
               $product->seo_keywords      = $result->data->seo_keywords;   
               try{
                   $product->save();
                   
                       if($picture = store_image_url("images/products/",$result->data->picture)){
                           $product->picture = $picture;
                           $product->picture_small = store_image_url("images/products/",$result->data->picture);
                           $product->save();
                       }
                       if($picture1 = store_image_url("images/products/",$result->data->nutrion_picture)) {
                           $product->nutrion_picture = $picture1;
                           $product->save();
                       }
                       if($picture2 = store_image_url("images/products/",$result->data->ingredients_picture)) {
                           $product->ingredients_picture = $picture2;
                           $product->save();
                       }
                       
                       if(count($result->data->product_images) > 0){
                           foreach($result->data->product_images as $more_img){
                               if($more_picture = store_image_url("images/products/",$more_img->picture)) {
                                   $product_img = new ProductImage;
                                   $product_img->picture = $more_picture;
                                   $product_img->product_id = $product['id'];
                                   $product_img->save();
                               }
                           }
                       }
                       
                       if(count($result->data->product_variation) > 0){
                           foreach($result->data->product_variation as $itms)
                           {
                               $product_variation                  = new ProductVariation();
                               $product_variation->product_id	    = $product['id'];
                               $product_variation->sku	            = $itms->sku;
                               $product_variation->variation_name	= $itms->variation_name;
                               $product_variation->weight	        = $itms->weight;
                               $product_variation->price	        = $itms->price;
                               $product_variation->stock_status    = $itms->stock_status;
                               $product_variation->in_stock        = $itms->in_stock;
                               $product_variation->save();
                           }
                       }    
                       
                       if(count($result->data->category_products) > 0){
                           foreach($result->data->category_products as $itms)
                           {
                               $category_id = Category::where('master_id',$itms->id)->pluck('id')->first();
                               $category_product                   = new CategoryProduct();
                               $category_product->category_id      = $category_id;  
                               $category_product->product_id       = $product->id; 
                               $category_product->display_order    = $product->display_order;
                               $category_product->save();
                           }
                       }
                     
                       if(count($result->data->shipping_method) > 0){
                           $shipping_id = Shipping::where('master_id',$itms->category_id)->pluck('id')->first();
                           foreach($result->data->shipping_method as $items){
                               $pdct_shipping                  = new ProductShipping();
                               $pdct_shipping->product_id	    = $product->id; 
                               $pdct_shipping->shipping_id     = $shipping_id;
                               $pdct_shipping->save();
                           }
                       }
                           
                   }
                   catch(\Exception $e) {
                       
                       die($e->getMessage());
           
                       exit;
                   }
                      
           }
           if($item->action == 'UPDATE'){
               $product                    = Product::where('master_id',$result->data->id)->first();
               if(!$product){
               $product                    = new Product();
               $product->master_id         = $result->data->id;
               }
               $product->name              = $result->data->name;
               $product->slug              = Str::slug($result->data->name);
               $product->description       = $result->data->description ?? "";
               $product->contents          = $result->data->contents ?? "";
               $product->menu_category_id  = $result->data->menu_category_id;
               $product->availability      = $result->data->availability;
               $product->display_order     = $result->data->display_order;
               $product->status            = $result->data->status;
               $product->seo_title         = $result->data->seo_title;
               $product->seo_alt_text      = $result->data->seo_alt_text;
               $product->seo_description   = $result->data->seo_description;
               $product->seo_keywords      = $result->data->seo_keywords;   
               try{
                   $product->save();
                   
                   if($picture = store_image_url("images/products/",$result->data->picture)){
                       $product->picture = $picture;
                       $product->picture_small = store_image_url("images/products/",$result->data->picture);
                       $product->save();
                   }
                   if($picture1 = store_image_url("images/products/",$result->data->nutrion_picture)) {
                       $product->nutrion_picture = $picture1;
                       $product->save();
                   }
                   if($picture2 = store_image_url("images/products/",$result->data->ingredients_picture)) {
                       $product->ingredients_picture = $picture2;
                       $product->save();
                   }
                   
                   if(count($result->data->product_images) > 0){
                       
                       ProductImage::where('product_id',$product['id'])->delete();
                       foreach($result->data->product_images as $more_img){
                           if($more_picture = store_image_url("images/products/",$more_img->picture)) {
                               $product_img = new ProductImage;
                               $product_img->picture = $more_picture;
                               $product_img->product_id = $product['id'];
                               $product_img->save();
                           }
                       }
                   }
                   
                   if(count($result->data->product_variation) > 0){
                       ProductVariation::where('product_id',$product['id'])->delete();
                       foreach($result->data->product_variation as $itms)
                       {
                           $product_variation                  = new ProductVariation();
                           $product_variation->product_id	    = $product['id'];
                           $product_variation->sku	            = $itms->sku;
                           $product_variation->variation_name	= $itms->variation_name;
                           $product_variation->weight	        = $itms->weight;
                           $product_variation->price	        = $itms->price;
                           $product_variation->stock_status    = $itms->stock_status;
                           $product_variation->in_stock        = $itms->in_stock;
                           $product_variation->save();
                       }
                   }    
                   
                   if(count($result->data->category_products) > 0){
                       CategoryProduct::where('product_id',$product['id'])->delete();
                       foreach($result->data->category_products as $itms)
                       {
                           $category_id = Category::where('master_id',$itms->id)->pluck('id')->first();
                           $category_product                   = new CategoryProduct();
                           $category_product->category_id      = $category_id;  
                           $category_product->product_id       = $product->id; 
                           $category_product->display_order    = $product->display_order;
                           $category_product->save();
                       }
                   }
                 
                   if(count($result->data->shipping_method) > 0){
                       ProductShipping::where('product_id',$product['id'])->delete();
                       $shipping_id = Shipping::where('master_id',$itms->category_id)->pluck('id')->first();
                       foreach($result->data->shipping_method as $items){
                           $pdct_shipping                  = new ProductShipping();
                           $pdct_shipping->product_id	    = $product->id; 
                           $pdct_shipping->shipping_id     = $shipping_id;
                           $pdct_shipping->save();
                       }
                   }
                       
               }
               catch(\Exception $e) {
                   
                   die($e->getMessage());
       
                   exit;
               }
           }
           if($item->action == 'DELETE'){
              try{
                   $pdct = Product::where('master_id',$item->data_id)->first();
                   if($pdct){
                       DeleteImage($pdct->picture,'images/products/');
                       DeleteImage($pdct->picture_small,'images/products/');
                       DeleteImage($pdct->nutrion_picture,'images/products/');
                       DeleteImage($pdct->ingredients_picture,'images/products/');
                       
                   }
                   
                   $pdct_image = ProductImage::where('product_id',$pdct->id)->get();
                   if($pdct_image){
                       foreach($pdct_image as $val){
                           DeleteImage($val->picture,'images/products/');
                           
                           ProductImage::where('product_id',$val->id)->delete();
                       }
                       
                   } 
                   
                   ProductVariation::where('product_id',$pdct->id)->delete();    
                   CategoryProduct::where('product_id',$pdct->id)->delete();
                   ProductShipping::where('product_id',$pdct->id)->delete(); 
                   Product::where('master_id',$pdct->id)->delete();
                  
               }
               catch(Exception $e) {
                   dd($e);
               }
           }
       }
       elseif($item->function == 'Store'){
    
           if($item->action == 'CREATE'){
       
               $store              = new Store();
               $store->master_id     = $result->data->id;
               $store->name        = $result->data->name;
               $store->store_code  = $result->data->store_code;
               $store->address     = $result->data->address;
               $store->city        = $result->data->city;
               $store->postalcode  = $result->data->postalcode;
               $store->province    = $result->data->province;
               $store->phone       = $result->data->phone;
               $store->email       = $result->data->email;
               $store->map_link    = $result->data->map_code;
               $store->shipping    = $result->data->shipping;
               
               try {
                   $store->save();
                   foreach($result->data->timing as $time) {
                       $storet = new StoreTiming();
                       $storet->store_id = $store->id;
                       $storet->day      = $day;
                       $storet->open     = $time->open;
                       $storet->close    = $time->close;
                       $storet->save();
                   }
                   
               }
               catch(Exception $e) {
                   
               }
           }
           if($item->action == 'UPDATE'){
               $store              = Store::where('master_id',$result->data->id)->first();
               if(!$store){
                   $store              = new Store();
                   $store->master_id     = $result->data->id;
               }
               $store->name        = $result->data->name;
               $store->store_code  = $result->data->store_code;
               $store->address     = $result->data->address;
               $store->city        = $result->data->city;
               $store->postalcode  = $result->data->postalcode;
               $store->province    = $result->data->province;
               $store->phone       = $result->data->phone;
               $store->email       = $result->data->email;
               $store->map_link    = $result->data->map_code;
               $store->shipping    = $result->data->shipping;
               try {
                     
                   $store->save();
                   StoreTiming::where('store_id',$store->id)->delete();
                   foreach($result->data->timing as $day => $time) {
                       $storet           = new StoreTiming();
                       $storet->store_id = $store->id;
                       $storet->day      = $day;
                       $storet->open     = $time->open;
                       $storet->close    = $time->close;
                       
                       $storet->save();
                   }
               }
               catch(Exception $e) {
                   
               }    
           }
           if($item->action == 'DELETE'){
                try {
                    $store = Store::where('master_id',$item->data_id)->first();
                   StoreTiming::where('store_id',$store->id)->delete();
                   $store->delete();
                    
                }
               catch(Exception $e) {
                   
               } 
           }
       }
       
       CurlSendPostRequest($action_url,$action_id);
       
   }
   
   return response()->json(['success' => true], 200);           
}
   
   
   
function store_image_url($path,$url){
  
       if($url != ''){
           $image_name = Str::random(30) . '.png';
           $imageData = file_get_contents($url);
           if($imageData){
           Storage::put($path.$image_name, $imageData);
           }
       }
       else
       {
           $image_name = 'dummy.png';
       }
        
       return $image_name;
}
   
   
  
function DeleteImage($existing = '',$path) {
       if($existing != '')
       @unlink($path.$existing);
}
   



