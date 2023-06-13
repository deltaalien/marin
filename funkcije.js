$(document).ready(function(){
    $("#prijava").click(function(){
       let korime=$("#korime").val();
       let lozinka=$("#lozinka").val();
       if(korime=="" || lozinka=="")
       {
           $("#status").html("<span style='color:red'>Niste uneli sve podatke</span>");
           return false;
       }
       $.post("ajax.php?funkcija=prijava", {korime: korime, lozinka: lozinka}, function(response){
           let odgovor=response.trim();
           console.log(odgovor);
            if(odgovor.indexOf(".php")==-1)
                $("#status").html(odgovor);
            else {
                //window.location.assign(odgovor);
            }
       });
    });
})
