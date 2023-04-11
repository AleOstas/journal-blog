   function validateRegisterForm() {   

            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmpassword = document.getElementById('confirmpassword');
            const form = document.getElementById('form');
            const errorElement = document.getElementById('error');

    form.addEventListener('submit', (e) => { 
        const messages = [];

        if(name.value === '' ||  name.value == null) {
            messages.push('Name is required *');
        }

        if(email.value === '' ||  email.value == null) {
            messages.push('Email is required *');
          
        }
        else if(!isValidEmail(email.value)) {
            messages.push('Please enter a valid email *');
           
        }
        
        if(password.value === '' ||  password.value == null) {
            messages.push('Password is required *');
            
        }
        else if(password.value < 8) {
            messages.push('Password must be 8 characters or longer *');
           
        }
        
        if(confirmpassword.value === '' ||  confirmpassword.value == null) {
            messages.push('Confirm your password *');

        }
        else if(confirmpassword.value !== password.value) {
            messages.push('Password doesnt match *');
        }

        if(messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join(', ');
        }

    });

}

function isValidEmail() {
    const regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return regExp.test(String(email.value).toLowerCase());
 }
    
     function validateLoginForm() {      
        
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const form = document.getElementById('form');
        const errorElement = document.getElementById('error');

form.addEventListener('submit', (e) => { 
    const messages = [];


    if(email.value === '' ||  email.value == null) {
        messages.push('Email is required *');
      
    }
    else if(!isValidEmail(email.value)) {
        messages.push('Please enter a valid email *');
       
    }
    
    if(password.value === '' ||  password.value == null) {
        messages.push('Password is required *');
        
    }
    else if(password.value < 8) {
        messages.push('Please enter a valid password *');    
    }

    if(messages.length > 0) {
    e.preventDefault();
    errorElement.innerText = messages.join(', ');
    }

});

}

function validateUserEditForm() {   

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const form = document.getElementById('form');
    const errorElement = document.getElementById('error');

form.addEventListener('submit', (e) => { 
const messages = [];

if(name.value === '' ||  name.value == null) {
    messages.push('Name is required *');
}

if(email.value === '' ||  email.value == null) {
    messages.push('Email is required *');
  
}
else if(!isValidEmail(email.value)) {
    messages.push('Please enter a valid email *');
   
}

if(password.value === '' ||  password.value == null) {
    messages.push('Password is required *');
    
}
else if(password.value < 8) {
    messages.push('Password must be 8 characters or longer *');
   
}

if(messages.length > 0) {
e.preventDefault();
errorElement.innerText = messages.join(', ');
}

});

}