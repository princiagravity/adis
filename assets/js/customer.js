
$('#user-login').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'user_login',function(data)
    {
      var data=JSON.parse(data)
        if(data.success==1)
        {
            swal("Welcome!", "Logged In Successfully!", "success");
            window.location.href = data.redirect_url;
        }
        else
        {
            swal("Login Failed!", "Invalid Username Or Password!", "error");
        }
        /* location.reload(true); */
        /*  alert(data); */
    });
    
    
    });
    
    $('#forgot-password').submit(function(e){
      e.preventDefault();
      var data=new FormData(this);
      ajaxcall(data,'forgot_password',function(data)
      {
        console.log(data);
        var data=JSON.parse(data);
        if(data.message=="")
        {
          window.location.href=base_url+'forgot-password-success';
        
        }
        else
        {
          swal('Message',data.message,'info');
        }
       
      });
      
      
      });
  
      $('#update-password').submit(function(e){
        e.preventDefault();
        var pass=$('#password').val();
        var conf_pass=$('#conf_pass').val();
        if(pass==conf_pass)
        {
        var data=new FormData(this);
        ajaxcall(data,'update_password',function(data)
        {
          var data=JSON.parse(data);
          console.log(data);
          if(data.redirect !="" && data.message=='success')
          {
            swal('Success',"Password updated Successfully!!,'success'");
            window.location.href=data.redirect;
          }
          else if(data.message !="")
          {
            swal('Message',data.message,'info');
          }
        });
      }
      else
      {
        $('.pass-error').html(`<p class="text-danger">Password Mismatch !!</p>`);
      }
  
      });
  $('#password,#conf_pass').keypress(function(e){
       $('.pass-error').html("");
  });
    
    $("#user-registration").submit(function(e){
      e.preventDefault();
    
      var data=new FormData(this);
      if($('#password').val() == $('#confirm_password').val())
      {
      ajaxcall(data,'user_signup',function(data)
      {
        console.log(data);
        var data=JSON.parse(data)
          if(data.success ==1)
          {
              window.location.href = data.redirect;
          }
          else
          {
              swal("Registration Failed!",data.msg, "error");
          }
         
     });
    }
    else
    {
        $('#pass-error').html("Password Mismatch");
    }
      
    });


    $('.closevideo').click(function(e){
      var adid=$('#adid').val();
      window.location.href=base_url+"coupon/"+adid;
    });
    $('.vidplay').click(function(e){
      $('#adid').val($(this).siblings('.adid').val());
     var videourl=$(this).siblings('.videourl').val(); 
     var closingtime= $(this).siblings('.closingtime').val();
     var videoduration=$(this).siblings('.videoduration').val();
      $('.advideo').attr('src', videourl)
      $(".advideo")[0].src += "?autoplay=1";
      setTimeout(function() {
        $('.closevideo').fadeIn(500);
     }, parseFloat(closingtime));
     setTimeout(function() {
      var adid=$('#adid').val();
      window.location.href=base_url+"coupon/"+adid;
   }, parseFloat(videoduration));
    })
   
    $('#user-type').submit(function(e){
        e.preventDefault();
        var data=new FormData(this);
        ajaxcall(data,'user_type',function(data)
        {
          console.log(data)
          var data=JSON.parse(data);
          console.log(data.success);
        if(data.success==1)
         {
           if(data.msg != "")
           {
           swal('Success!!',data.msg,'success'); 
           } 
           window.location.href=data.redirect;
         }
         else if(data.success==0)
         {
          if(data.msg != "")
          {
          swal('Error!!',data.msg,'error'); 
          } 
          else
          {
          swal('Error!!','Please Complete Primary Stage Of Registration First','error');   
          window.location.href=data.redirect;
          }
         }
       }); 
    });

  $('#user-role-details').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'user_final_registration',function(data)
    {
      console.log(data);
      var data=JSON.parse(data)
        if(data.success ==1)
        {
          swal('Success!!',data.msg,'success');
          window.location.href = data.redirect;
        }
        else if(data.success==0)
        {
          if(data.msg !="")
            swal("Registration Failed!",data.msg, "error");
            else
            window.location.href = data.redirect;
        }
       
   });


  });

  $('.referrer_check').blur(function(e){
if($(this).val() !="")
{
var data={mobile:$(this).val()};
ajaxcall1(data,'check_referrer_exists',function(data){

  if(data !='null')
  {
    var data=JSON.parse(data);
    $('#ref_stat').val(1);
    $('.ref_span').html(`<p class=text-primary>`+data.display_name+`</p>`);
  }
  else
  {
    $('#ref_stat').val(0);
    $('.ref_span').html(`<p class="text-danger">Referrer Not Found.. Please Check the Mobile no You have provided</p>`)
  }

});
}
  });
 
   $('#update_profile').submit(function(e){
    
    e.preventDefault();
    var data=new FormData(this);
    ajaxcall(data,'update_profile',function(data)
    {
       console.log(data)
       var data=JSON.parse(data);
       if(data.status=="")
      {
      swal("Updation Successfull");
      location.reload(true);
      }
      else
      {
        swal('Message',data.status,'info');
      }
     
     
    }); 
   }); 
  
  $('.get_offers').click(function(e){
    $('.modal').show();
  });
 
  
  
  function ajaxcall(formElem,ajaxurl,handle)
  {
    $.ajax({
      url: base_url+"CustomerController/"+ajaxurl,
      type: 'POST',
      data:formElem,
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success: function(data) {
        handle(data);
      }
  });
  }
  
    function ajaxcall1(data,ajaxurl,handle)
  {
    $.ajax({
      url: base_url+"CustomerController/"+ajaxurl,
      type: 'POST',
      data:data,
      datatype:'json',
      success: function(data) {
        handle(data);
      }
  });
  }
  $('#download_recipt').submit(function(e){
    e.preventDefault();
    var data=new FormData(this);
      ajaxcall(data,'download_receipt',function(data)
      {
        /* console.log(data); */
        var data=JSON.parse(data);
        if( data.url ){
          window.location = data.url;
      }
      });
    
    });
  
    $('.deli_type').click(function(e){
      if(this.checked)
      {
        if($(this).val()=='home delivery')
        {
          $('#delivery_type').val('home delivery');
          $('.current_loc').fadeIn(500);
        }
        else
        {
          $('.current_loc').fadeOut(500);
          $('#delivery_type').val('take away');
        }
      }
    });
  
  $('#search_product').on('keyup',function(e){
    if($(this).val() !="")
    {
      var data={'key':$(this).val()};
      ajaxcall1(data,'search_product',function(data)
      {
        var data=JSON.parse(data);
        $("#searchResult").empty();
        if(data.length > 0)
        {
        $.each(data,function(index,value){
        
        $("#searchResult").append("<li value='"+value.id+"'  class='list-group-item'>"+value.name+"</li>");
        });
    
        $("#searchResult li").bind("click",function(){
          setText(this);
          window.location.href= base_url+"FrontController/single_product/"+$(this).val();
      
      });
    }
    else
    {
      $("#searchResult").append("<li value=''  class='list-group-item' disabled>This product not found</li>");
    }
    
      })
    }
    else
    {
      $("#searchResult").empty();
    }
  })
  
  function setText(elem)
  {
    var value = $(elem).text();
    var prod_id = $(elem).val();
  
    $("#search_product").val(value);
    $("#searchResult").empty();
  
  }
  /* $('.search_btn').click(function(e)
  {
  e.preventDefault();
  if($('#searchResult').find('li:selected'))
  {
    var prod_id=$('#searchResult li').val();
    window.location.href= base_url+"FrontController/single_product/"+prod_id;}
    else
    {
      swal("Product you searched not found");
    }
  }); */
   
  
     