(function() {
    "use strict";
  
    document.addEventListener('DOMContentLoaded', function() {
        let eye = document.querySelector('#eye');
        
        if(eye) {
            eye.addEventListener('click', function() {
                this.classList.toggle("bi-eye");
                let password = document.querySelector('#password');
                if (password.type === 'password') {
                    password.type = 'text';
    
                } else {
                    password.type = 'password';
                   
                }
            })
            
        }
        
    // let metabox = $('#coventi-api-metaboxes');

    // console.log(metabox);

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }


        let tickets = document.querySelectorAll('.get-ticket');

        tickets.forEach((ticket)=>{
            ticket.addEventListener('click', ()=>{
                const {email, price, post_id } = ticket.dataset
                let reference = makeid(17)
                window.location.href = '/payment-success?eid='+post_id+'&reference='+reference+'&free='+true;
            })
        })


        let ticketButton = document.querySelectorAll('.buy-ticket');
        // console.log(ticketButton);

        ticketButton.forEach(function(button) {
            
            button.addEventListener('click', payWithPaystack, false);
            
          

          
            function payWithPaystack ()  {
                // console.log(this)
                // get key from ajax request
                
                
                let email = this.dataset.email;
                let amount = this.dataset.price;
                let eid = this.dataset.post_id;
                // console.log(eid);
                var handler = PaystackPop.setup({
                    key: 'pk_live_577645075f877bcfeec217cda6cf7790c1d55aa6',

                    email: email,
                    amount: amount * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    metadata: {
                       custom_fields: [
                          {
                              display_name: "Mobile Number",
                              variable_name: "mobile_number",
                              value: "+2348012345678"
                          }
                       ]
                    },
                    callback: function(response){
                        console.log(response);
                        // Redirect to the page that handles the response
                        console.log(eid);
                        window.location.href = '/payment-success?eid='+eid+'&reference='+response.reference;
                        // alert('success. transaction ref is ' + response.reference);
                    },
                    onClose: function(){
                        alert('window closed');
                    }
                  });
                  handler.openIframe();
                }
        });

       

       
    });

    

   
  
  
  })()

window.handleGoogleLogin =(googleUser)=> {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId());
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());

    sessionStorage.setItem("loggedUser", profile.getEmail().toString());
    document.location.href = 'home.html';
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        alert("You have been signed out successfully");
        $(".data").css("display", "none");
        $(".g-signin2").css("display", "block");
    });
}