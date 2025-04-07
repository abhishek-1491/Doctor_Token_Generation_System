function bookAppointment(){
    event.preventDefault();

    // const up = new Date();
    // const currentDate = up.toISOString().split('T')[0];
    // const currentTime = up.toTimeString().split(' ')[0];
    // var counter = 1;
    // console.log(currentDate);
    // console.log(currentTime);
    var data = {
        first_name : document.getElementById("fname").value,
        last_name : document.getElementById("lname").value,
        mobile : document.getElementById("mobile").value,
        email : document.getElementById("email").value,
        address : document.getElementById("address").value,
        reason : document.getElementById("reason").value,
        token : document.getElementById("token").value

    };

    // console.log(data);

    fetch("addAppointment.php",{
        method:"POST",
        headers: {
            "Content-Type":"application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if(result['status'] == "success"){
            console.log("Done");
            console.log(result['token']);
            
            window.location.href=`invoice.php?token=${encodeURIComponent(result['token'])}`;
        }
        else if(result['status'] == "failed"){
            console.log("failed");
        }
    })
    .catch(error => console.log("Error  " ,error))
}

