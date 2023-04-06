
jQuery(document).ready(function($) {
    
    
        /* get sysytem ip */
    
           $(".leadgenpro_form").after('<input type="hidden" name="ip" id="ip"><input type="hidden" name="extrainfo" id="extrainfo"><textarea name="dsfgsdfgf" id="lead_info" style="display:none;" ></textarea>');
           /*$(".leadgenpro_form").prepend('<label class="success_form" style="background-color: #56B68B;display: none;padding: 10px;border-radius: 5px;font-size: 17px;line-height: 20px;color: #fff">Your message has successfully been sent.</label><label style="background-color: #e74c3c;display: none;padding: 10px;border-radius: 5px;font-size: 17px;line-height: 20px;color: #fff" class="failed_form"> Something went wrong!</label>');*/
        
            jQuery.getJSON("https://jsonip.com/?callback=?", function (data) {
                $("#ip").val(data.ip);
               
                jQuery.getJSON('https://ipapi.co/'+data.ip+'/json',function(data2){
                 var jj = JSON.stringify(data2);
                 $("#lead_info").val(jj);
                 $("#lead_info").hide();
                });
                
            });
            
         /* end  sysytem ip getting*/
         
            /* start visiting Count section*/
            
               var date = new Date();
               date.setTime(date.getTime()+(120*1000));
               var expires = "; expires="+date.toGMTString();
               
            let leadgenp = getCookie("leadgenval");
            if (leadgenp === window.location.href) {
                console.log("Your Ip already exists");
                
            } else {
                var page_identity = location.protocol + '//' + location.host + location.pathname;
                
                jQuery.ajax({
                    type: "GET",
                    url: "https://leadgenpro.ca/vistingincrement",
                    data: {page_identity : page_identity},
                    success: function(data,status) {
                        if(status == 'success'){  
                            console.log('done');
                        }
                        else{
                            console.log('Something went wrong!');
                        }
                
                    }
                });
                
                
                document.cookie = "leadgenval="+window.location.href+expires+"; path=/";
             } 
             
        /* end visiting Count */
        
        /* start form submission */

        var searchParams = new URLSearchParams(window.location.search)
     
     
        $(".leadgenpro_form").submit(function(e){
       
            e.preventDefault();
            
            var ref          =  searchParams.get('ref');
            var ip = $("#ip").val();
            var url = window.location.href.split('?')[0];
            var reffer   = '123';
            var successurl = $("input[name='success_url']").val();  
            var ser_infp = $('#lead_info').val();
            
            if (navigator.userAgentData?.mobile) {
                 var device = 'mobile';
            }
            else{
               var device = 'desktop';
            }
            
            var language = navigator.language || navigator.userLanguage;
            var browser  = navigator.userAgent.split(')').reverse()[0].match(/(?!Gecko|Version|[A-Za-z]+?Web[Kk]it)[A-Z][a-z]+\/[\d.]+/g)[0].split('/');
            var platform = navigator.platform;
            
            var datastring = $(this).serialize() + '&ip=' + ip + '&referrer_domain=' + ref + '&url=' + url + '&server_info=' + ser_infp + '&device='+ device +'&language='+ language +'&browser='+ browser +'&platform='+ platform;

            // var datastring = $(this).serialize() + '&ip=' + ip + '&referrer_domain=' + ref + '&url=' + url + '&server_info=' + ser_infp;
            // console.log('https://leadgenpro.ca/leadgeneration?'+datastring);
            
             
                jQuery.ajax({
                    type: "GET",
                    url: "https://leadgenpro.ca/leadgeneration",
                    data: datastring,
                    success: function(data,status) {
                        //console.log(data)
                      
                
                        if(status == 'success'){     
                        $('form').find('input:text').val(''); 
                        $('form textarea').val("");
                            window.scrollTo(0, 0);
                            $("#submission_modal").css("display","block");
                        }
                        else{
                         alert('Something went wrong!');
                        
                        }
                
                    }
                });
           
             
         
        }); 
        
        /* end form submission */
    });
    
    /* Get Cookie name */
    
    function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    
    /* end  Cookie name getting*/
    