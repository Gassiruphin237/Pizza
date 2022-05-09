function getprix(){
    let desg = document.getElementById("pizza");
    let prix = document.getElementById("pu");
    let pt = document.getElementById("pt");
    let qte = document.getElementById("qte");
    if(desg.value=="Basquez"){
        prix.value=pt.value=8000;
    }
    else if(desg.value=="Maguaritha"){
        prix.value=pt.value=12000;
    }
    else if(desg.value=="Sebastinos"){ 
        prix.value=pt.value=4000;
    }
    else if(desg.value==""){
        prix.value=pt.value=7500;
    }
    else if(desg.value==""){
        prix.value=pt.value=5000;
    }
    else{
        prix.value=0;
    }
}


function heure(){
    var date = new Date()
    var time = date.getHours();
    // let hr = document.getElementById("hr");
    // let body = document.getElementById("body");
    //let time =13;
    let message = document.getElementById("message");
    if(time<12){
        message.innerText="bonjour"
    }
    else if(time>=12 && time<=16){
        message.innerText="bon après midi"
        console.log(time);
    }
    else{
        message.innerText="bonsoir"
        // body.style.background="#2b2a33";
        // body.style.color="white";
        // hr.style.color="white";
    }  

}