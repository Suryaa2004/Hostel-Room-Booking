function sendMail() {
    var params = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      message: document.getElementById("message").value,
      rollno: document.getElementById("rollno").value,
      phone: document.getElementById("phone").value,
      roomtype: document.getElementById("roomtype").value,
      year: document.getElementById("year").value,
  
    };
  
    const serviceID = "service_05hxces";
    const templateID = "template_10u6yii";
  
      emailjs.send(serviceID, templateID, params)
      .then(res=>{
          document.getElementById("name").value = "";
          document.getElementById("email").value = "";
          document.getElementById("message").value = "";
          document.getElementById("rollno").value = "";
          document.getElementById("year").value = "";
          document.getElementById("phone").value = "";
          document.getElementById("roomtype").value = "";
          

          console.log(res);
          alert("Your message sent successfully!!")
  
      })
      .catch(err=>console.log(err));
  
  }