$(document).ready(function(){
    function validateForm() {
        var un = document.getElementById("username").value;
        var pw = document.getElementById("password").value;
        
        
    
    var unArray = ["Apple", "Google", "Microsoft"];
    var pwArray = ["AAPL", "GOOGL", "MSFT"];
        for (i=0; i < unArray.length; i++) {
          if (un=== unArray[i] && pw === pwArray[i]){
          window.location = "main.html";
          break;
        }
          else {
            alert("Invalid Login ID please try again.")
          }
        }
    }
  });